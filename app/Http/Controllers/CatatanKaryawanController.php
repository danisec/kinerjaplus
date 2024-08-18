<?php

namespace App\Http\Controllers;

use App\Models\CatatanKaryawan;
use App\Models\GroupKaryawan;
use App\Models\GroupKaryawanDetail;
use App\Models\Penilaian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PHPUnit\Framework\Attributes\Group;

class CatatanKaryawanController extends Controller
{
    /* 
     * Constructor
     */
    private $tahunAjaran;
    
    public function __construct()
    {
        $currentMonth = date('m');
        $isAfterJune = $currentMonth >= 6;
        $currentYear = date('Y');
        $lastYear = $currentYear - 1;
        $nextYear = $currentYear + 1;

        $this->tahunAjaran = $isAfterJune ? "$currentYear/$nextYear" : "$lastYear/$currentYear";
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Cari nama alternatif berdasarkan group karyawan yang mana nama alternatif sama dengan nama auth user
        $checkAuthAlternatif = Auth::user()->alternatif->kode_alternatif;

        // checkAuthAlternatif berada di dalam group karyawan yang mana
        $checkGroupKaryawanId = null;
        if (Auth::user()->hasRole('kepala sekolah')) {
            $checkGroupKaryawanId = GroupKaryawan::with(['alternatif'])->where('kepala_sekolah', $checkAuthAlternatif)->value('id_group_karyawan');
        } elseif (Auth::user()->hasRole('guru')) {
            $checkGroupKaryawanId = GroupKaryawanDetail::with(['alternatif'])->where('kode_alternatif', $checkAuthAlternatif)->value('id_group_karyawan');
        }

        // Dapatkan catatan karyawan yang memiliki group karyawan yang sama dengan group karyawan yang dimiliki oleh auth user  $checkGroupKaryawan
        $catatanKaryawanGroupedByTahun = CatatanKaryawan::with(['tanggalPenilaian', 'penilaian', 'penilaian.alternatifPertama'])
        ->whereHas('penilaian.alternatifPertama', function ($query) use ($checkGroupKaryawanId) {
            $query->where('id_group_karyawan', $checkGroupKaryawanId);
        })
        ->join('tanggal_penilaian', 'catatan_karyawan.id_tanggal_penilaian', '=', 'tanggal_penilaian.id_tanggal_penilaian')
        ->select('tanggal_penilaian.tahun_ajaran', 'tanggal_penilaian.semester')
        ->orderBy('tanggal_penilaian.tahun_ajaran', 'DESC')
        ->when(request()->has('search'), function ($query) {
        $query->where('tanggal_penilaian.tahun_ajaran', 'like', '%' . request('search') . '%')
              ->orWhere('tanggal_penilaian.semester', 'like', '%' . request('search') . '%');
        })
        ->get()->unique('id_tanggal_penilaian');

        // Menggabungkan tahun_ajaran dengan nama group karyawan
        $catatanWithGroupKaryawan = [];
        foreach ($catatanKaryawanGroupedByTahun as $tahun) {
            $namaGroupKaryawan = GroupKaryawan::where('id_group_karyawan', $checkGroupKaryawanId)->value('nama_group_karyawan');
            $catatanWithGroupKaryawan[] = ['tahun' => $tahun->tahun_ajaran, 'semester' => $tahun->semester, 'namaGroupKaryawan' => $namaGroupKaryawan];
        }

        return view('pages.kepala-sekolah.catatan-karyawan.index', [
            'title' => 'Data Catatan Pegawai',
            'catatanKaryawan' => $catatanKaryawanGroupedByTahun,
            'catatanWithGroupKaryawan' => $catatanWithGroupKaryawan,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function showTahun($firstYear, $secondYear, $semester)
    {
        $tahunAjaranBreadcrumbs = [
            'tahun_ajaran' => $firstYear . '/' . $secondYear,
            'semester' => $semester,
        ];

        $catatanKaryawan = CatatanKaryawan::with(['tanggalPenilaian', 'penilaian', 'penilaian.alternatifPertama.alternatifPertama', 'penilaian.alternatifKedua.alternatifPertama'])
        ->where('id_tanggal_penilaian', function ($query) use ($firstYear, $secondYear, $semester) {
            $query->select('id_tanggal_penilaian')
                ->from('tanggal_penilaian')
                ->where('tahun_ajaran', $firstYear . '/' . $secondYear)
                ->where('semester', $semester);
        })
        ->filter(request(['search']))->paginate(10)->withQueryString();

        return view('pages.kepala-sekolah.catatan-karyawan.show-tahun', [
            'title' => 'Data Catatan Pegawai Tahun Ajaran ' . $tahunAjaranBreadcrumbs['tahun_ajaran'] . ' Semester ' . $tahunAjaranBreadcrumbs['semester'],
            'catatanKaryawan' => $catatanKaryawan,
            'tahunAjaranBreadcrumbs' => $tahunAjaranBreadcrumbs,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Dapatkan list tahun ajaran yang unik dari table penilaian
        $tahunAjaranPenilaian = Penilaian::select('tahun_ajaran')->orderBy('tahun_ajaran','DESC')->groupBy('tahun_ajaran')->pluck('tahun_ajaran');

        // Cari nama alternatif berdasarkan group karyawan yang mana nama alternatif sama dengan nama auth user
        $checkAuthAlternatif = Auth::user()->alternatif->kode_alternatif;

        // checkAuthAlternatif berada di dalam group karyawan yang mana
        $checkGroupKaryawanId = null;
        if (Auth::user()->hasRole('kepala sekolah')) {
            $checkGroupKaryawanId = GroupKaryawan::with(['alternatif'])->where('kepala_sekolah', $checkAuthAlternatif)->value('id_group_karyawan');
        } elseif (Auth::user()->hasRole('guru')) {
            $checkGroupKaryawanId = GroupKaryawanDetail::with(['alternatif'])->where('kode_alternatif', $checkAuthAlternatif)->value('id_group_karyawan');
        }

        // Dapatkan semua nama alternatif yang berada di dalam group karyawan yang sama dengan kode alternatif auth user
        $alternatif = GroupKaryawanDetail::with(['alternatif'])->where('id_group_karyawan', $checkGroupKaryawanId)->get();
        $pluckAlternatif = $alternatif->pluck('alternatif.nama_alternatif', 'alternatif.kode_alternatif')->toArray();
        
        return view('pages.kepala-sekolah.catatan-karyawan.create', [
            'title' => 'Tambah Catatan Pegawai',
            'tahunAjaranPenilaian' => $tahunAjaranPenilaian,
            'pluckAlternatif' => $pluckAlternatif,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'kode_alternatif' => 'required',
            'tahun_ajaran' => 'required',
            'catatan' => 'required',
        ],[
            'kode_alternatif.required' => 'Nama karyawan harus diisi',
            'tahun_ajaran.required' => 'Tahun ajaran harus diisi',
            'catatan.required' => 'Catatan harus diisi',
        ]);

        try {
            // check kode alternatif sudah ada atau belum di table catatan karyawan berdasarkan tahun ajaran
            $isExist = CatatanKaryawan::where('kode_alternatif', $validatedData['kode_alternatif'])
            ->where('tahun_ajaran', $validatedData['tahun_ajaran'])
            ->exists();

            if ($isExist) {
                $notif = notify()->info( 'Catatan Karyawan sudah ada');
                return back()->withInput()->with('notif', $notif);
            }
            
            CatatanKaryawan::create($validatedData);

            $notif = notify()->success('Catatan pegawai berhasil ditambahkan');
            return redirect()->route('catatanKaryawan.index')->withInput()->with('notif', $notif);
        } catch (\Throwable $th) {
            $notif = notify()->error('Terjadi kesalahan saat menyimpan catatan pegawai');
            return back()->withInput()->with('notif', $notif);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return view('pages.kepala-sekolah.catatan-karyawan.show', [
            'title' => 'Detail Catatan Pegawai',
            'catatanKaryawan' => CatatanKaryawan::with(['tanggalPenilaian'])->where('id_catatan_karyawan', $id)->first(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id, $firstYear, $secondYear, $semester)
    {
        $tahunAjaranBreadcrumbs = [
            'tahun_ajaran' => $firstYear . '/' . $secondYear,
            'semester' => $semester,
        ];

        // Cari nama alternatif berdasarkan group karyawan yang mana nama alternatif sama dengan nama auth user
        $checkAuthAlternatif = Auth::user()->alternatif->kode_alternatif;

        // checkAuthAlternatif berada di dalam group karyawan yang mana
        $checkGroupKaryawanId = null;
        if (Auth::user()->hasRole('kepala sekolah')) {
            $checkGroupKaryawanId = GroupKaryawan::with(['alternatif'])->where('kepala_sekolah', $checkAuthAlternatif)->value('id_group_karyawan');
        } elseif (Auth::user()->hasRole('guru')) {
            $checkGroupKaryawanId = GroupKaryawanDetail::with(['alternatif'])->where('kode_alternatif', $checkAuthAlternatif)->value('id_group_karyawan');
        }

        // Dapatkan semua nama alternatif yang berada di dalam group karyawan yang sama dengan kode alternatif auth user
        $alternatif = GroupKaryawanDetail::with(['alternatif'])->where('id_group_karyawan', $checkGroupKaryawanId)->get();
        $pluckAlternatif = $alternatif->pluck('alternatif.nama_alternatif', 'alternatif.kode_alternatif')->toArray();

        return view('pages.kepala-sekolah.catatan-karyawan.edit', [
            'title' => 'Ubah Catatan Pegawai',
            'catatanKaryawan' => CatatanKaryawan::with(['penilaian', 'penilaian.alternatifPertama', 'penilaian.alternatifKedua.alternatifPertama'])->where('id_catatan_karyawan', $id)->first(),
            'pluckAlternatif' => $pluckAlternatif,
            'tahunAjaranBreadcrumbs' => $tahunAjaranBreadcrumbs,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'id_penilaian' => '',
            'id_tanggal_penilaian' => '',
            'catatan' => 'required',
        ],[
            'catatan.required' => 'Catatan harus diisi',
        ]);

        try {
            CatatanKaryawan::where('id_catatan_karyawan', $id)->update($validatedData);

            $notif = notify()->success('Catatan pegawai berhasil diubah');
            return back()->withInput()->with('notif', $notif);
        } catch (\Throwable $th) {
            $notif = notify()->error('Terjadi kesalahan saat mengubah catatan pegawai');
            return back()->withInput()->with('notif', $notif);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        CatatanKaryawan::where('id_catatan_karyawan', $id)->delete();

        $notif = notify()->success('Catatan pegawai berhasil dihapus');
        return back()->with('notif', $notif);
    }
}
