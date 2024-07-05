<?php

namespace App\Http\Controllers;

use App\Models\CatatanKaryawan;
use App\Models\GroupKaryawan;
use App\Models\GroupKaryawanDetail;
use App\Models\Kriteria;
use App\Models\Penilaian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PersetujuanPenilaianController extends Controller
{
    /* 
     * Constructor
     */
    private $penilaian;
    private $tahunAjaran;

    public function __construct()
    {
        $this->penilaian = Penilaian::with(['alternatifPertama'])->orderBy('alternatif_pertama', 'ASC');

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
        if (Auth::user()->role == 'kepala sekolah') {
            $checkGroupKaryawanId = GroupKaryawan::with(['alternatif'])->where('kepala_sekolah', $checkAuthAlternatif)->value('id_group_karyawan');
        } elseif (Auth::user()->role == 'guru') {
            $checkGroupKaryawanId = GroupKaryawanDetail::with(['alternatif'])->where('kode_alternatif', $checkAuthAlternatif)->value('id_group_karyawan');
        }

        // Dapatkan penilaian yang memiliki group karyawan yang sama dengan group karyawan yang dimiliki oleh auth user  $checkGroupKaryawan
        $penilaianGroupedByTahun = Penilaian::with(['alternatifPertama'])
            ->whereHas('alternatifPertama', function ($query) use ($checkGroupKaryawanId) {
            $query->where('id_group_karyawan', $checkGroupKaryawanId);
        })
            ->select('tahun_ajaran')
            ->orderBy('tahun_ajaran', 'DESC')
            ->when(request()->has('search'), function ($query) {
                $query->where('tahun_ajaran', 'like', '%' . request('search') . '%');
        })
            ->groupBy('tahun_ajaran')
            ->pluck('tahun_ajaran');

        // Menggabungkan tahun_ajaran dengan nama group karyawan
        $penilaianWithGroupKaryawan = [];
        foreach ($penilaianGroupedByTahun as $tahun) {
            $namaGroupKaryawan = GroupKaryawan::where('id_group_karyawan', $checkGroupKaryawanId)->value('nama_group_karyawan');
            $penilaianWithGroupKaryawan[] = ['tahun' => $tahun, 'namaGroupKaryawan' => $namaGroupKaryawan];
        }

        return view('pages.kepala-sekolah.persetujuan-penilaian.index', [
            'title' => 'Persetujuan Penilaian',
            'penilaianGroupedByTahun' => $penilaianGroupedByTahun,
            'penilaianWithGroupKaryawan' => $penilaianWithGroupKaryawan,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function showTahun($firstYear, $secondYear)
    {
        $tahunAjaranBreadcrumbs = $firstYear . '/' . $secondYear;

        // Cari nama alternatif berdasarkan group karyawan yang mana nama alternatif sama dengan nama auth user
        $checkAuthAlternatif = auth()->user()->alternatif->kode_alternatif;

        // checkAuthAlternatif berada di dalam group karyawan yang mana
        $checkGroupKaryawanId = null;
        if (Auth::user()->role == 'kepala sekolah') {
            $checkGroupKaryawanId = GroupKaryawan::with(['alternatif'])->where('kepala_sekolah', $checkAuthAlternatif)->value('id_group_karyawan');
        } elseif (Auth::user()->role == 'guru') {
            $checkGroupKaryawanId = GroupKaryawanDetail::with(['alternatif'])->where('kode_alternatif', $checkAuthAlternatif)->value('id_group_karyawan');
        }

        // dd($checkGroupKaryawanId);

        // Dapatkan penilaian yang memiliki group karyawan yang sama dengan group karyawan yang dimiliki oleh auth user  $checkGroupKaryawan
        $penilaian = Penilaian::with(['catatanKaryawan', 'alternatifPertama.alternatifPertama'])
         ->whereHas('alternatifPertama', function ($query) use ($checkGroupKaryawanId) {
            $query->where('id_group_karyawan', $checkGroupKaryawanId);
        })
        ->where('tahun_ajaran', "$firstYear/$secondYear")
        ->filter(request(['search']))
        ->paginate(10)
        ->withQueryString();

        return view('pages.kepala-sekolah.persetujuan-penilaian.show-tahun', [
            'title' => 'Detail Data Penilaian',
            'penilaian' => $penilaian,
            'tahunAjaranBreadcrumbs' => $tahunAjaranBreadcrumbs,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $getTahunAjaran = Penilaian::where('id_penilaian', $id)->value('tahun_ajaran');
        $tahunAjaran = explode('/', $getTahunAjaran);

        return view('pages.kepala-sekolah.persetujuan-penilaian.show', [
            'title' => 'Detail Data Penilaian',
            'kriteria' => Kriteria::with(['subkriteria', 'subkriteria.indikatorSubkriteria'])->orderBy('kode_kriteria', 'ASC')->get(),
            'penilaian' => Penilaian::with(['alternatifPertama.alternatifPertama', 'alternatifKedua', 'penilaianIndikator', 'penilaianIndikator.skalaIndikatorDetail'])->where('id_penilaian', $id)->first(),
            'tahunAjaran' => $tahunAjaran,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('pages.kepala-sekolah.persetujuan-penilaian.edit', [
            'title' => 'Ubah Persetujuan Penilaian',
            'penilaian' => Penilaian::with(['alternatifPertama', 'alternatifKedua', 'penilaianIndikator', 'penilaianIndikator.skalaIndikatorDetail'])->where('id_penilaian', $id)->first(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'tahun_ajaran' => '',
            'alternatif_pertama' => '',
            'alternatif_kedua' => '',
            'status' => 'required|in:Disetujui,Tidak Disetujui',
        ],[
            'status.required' => 'Status harus diisi',
        ]);

        try {
            $penilaian = Penilaian::findOrFail($id);
            $penilaian->update($validatedData);

            if ($validatedData['status'] == 'Tidak Disetujui') {
                $notif = notify()->success('Status persetujuan penilaian berhasil diubah');
                return redirect()->route('persetujuanPenilaian.createCatatan', $penilaian->id)->with('notif', $notif);
            } else {
                CatatanKaryawan::where('id_penilaian', $id)->delete();

                $notif = notify()->success('Status persetujuan penilaian berhasil disimpan');
                return back()->withInput()->with('notif', $notif);
            }
        } catch (\Exception $e) {
           $notif = notify()->error('Terjadi kesalahan saat mengubah status persetujuan penilaian');
           return back()->with('notif', $notif);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function createCatatan($firstYear, $secondYear, $id)
    {
        $tahunAjaran = $firstYear . '/' . $secondYear;

        return view('pages.kepala-sekolah.catatan-karyawan.create', [
            'title' => 'Tambah Catatan Karyawan',
            'penilaian' => Penilaian::with(['alternatifPertama.alternatifPertama', 'alternatifKedua'])->where('id_penilaian', $id)->first(),
            'tahunAjaran' => $tahunAjaran,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateCatatan(Request $request, $id)
    {
        $validatedData = request()->validate([
            'id_penilaian' => 'required',
            'tahun_ajaran' => 'required',
            'catatan' => 'required',
            'status' => 'required|in:Tidak Disetujui',
        ],[
            'catatan.required' => 'Catatan harus diisi',
        ]);

        // Dapatkan request data tahun ajaran dari form
        $getTahunAjaran = $validatedData['tahun_ajaran'];
        $tahunAjaran = explode('/', $getTahunAjaran);

        try {
            // Ambil data penilaian berdasarkan ID
            $penilaian = Penilaian::findOrFail($validatedData['id_penilaian']);
            
            // Update status penilaian menjadi Tidak Disetujui
            $penilaian->update(['status' => $validatedData['status']]);
            
            // Buat catatan karyawan baru
            CatatanKaryawan::create([
                'id_penilaian' => $validatedData['id_penilaian'],
                'tahun_ajaran' => $validatedData['tahun_ajaran'],
                'catatan' => $validatedData['catatan'],
            ]);

            $notif = notify()->success('Catatan Karyawan berhasil ditambahkan');
            return redirect()->route('persetujuanPenilaian.showTahun', [
                'firstYear' => $tahunAjaran[0],
                'secondYear' => $tahunAjaran[1],
            ])->with('notif', $notif);
        } catch (\Throwable $th) {
            $notif = notify()->error('Terjadi kesalahan saat menyimpan catatan karyawan');
            return back()->withInput()->with('notif', $notif);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
    }
}
