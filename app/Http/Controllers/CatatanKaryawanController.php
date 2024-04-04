<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use App\Models\CatatanKaryawan;
use App\Models\Penilaian;
use Illuminate\Http\Request;

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
        $catatanKaryawanGroupedByTahun = CatatanKaryawan::select('tahun_ajaran')
        ->orderBy('tahun_ajaran', 'DESC')
        ->when(request()->has('search'), function ($query) {
            $query->where('tahun_ajaran', 'like', '%' . request('search') . '%');
        })
        ->groupBy('tahun_ajaran')
        ->pluck('tahun_ajaran');

        return view('pages.kepala-sekolah.catatan-karyawan.index', [
            'title' => 'Data Catatan Karyawan',
            'catatanKaryawan' => $catatanKaryawanGroupedByTahun,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function showTahun($firstYear, $secondYear)
    {
        $tahunAjaranBreadcrumbs = $firstYear . '/' . $secondYear;

        return view('pages.kepala-sekolah.catatan-karyawan.show-tahun', [
            'title' => 'Data Catatan Karyawan Tahun Ajaran ' . $tahunAjaranBreadcrumbs,
            'catatanKaryawan' => CatatanKaryawan::with(['alternatif'])->where('tahun_ajaran', "$firstYear/$secondYear")->filter(request(['search']))->paginate(10)->withQueryString(),
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

        $alternatif = Alternatif::get();
        $pluckAlternatif = $alternatif->pluck('nama_alternatif', 'kode_alternatif')->toArray();
        
        return view('pages.kepala-sekolah.catatan-karyawan.create', [
            'title' => 'Tambah Catatan Karyawan',
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

            $notif = notify()->success('Catatan Karyawan berhasil ditambahkan');
            return redirect()->route('catatanKaryawan.index')->withInput()->with('notif', $notif);
        } catch (\Throwable $th) {
            $notif = notify()->error('Terjadi kesalahan saat menyimpan catatan karyawan');
            return back()->withInput()->with('notif', $notif);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return view('pages.kepala-sekolah.catatan-karyawan.show', [
            'title' => 'Detail Catatan Karyawan',
            'catatanKaryawan' => CatatanKaryawan::where('id_catatan_karyawan', $id)->first(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $alternatif = Alternatif::get();
        $pluckAlternatif = $alternatif->pluck('nama_alternatif', 'kode_alternatif')->toArray();

        return view('pages.kepala-sekolah.catatan-karyawan.edit', [
            'title' => 'Ubah Catatan Karyawan',
            'catatanKaryawan' => CatatanKaryawan::where('id_catatan_karyawan', $id)->first(),
            'pluckAlternatif' => $pluckAlternatif,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
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
            CatatanKaryawan::where('id_catatan_karyawan', $id)->update($validatedData);

            $notif = notify()->success('Catatan Karyawan berhasil diubah');
            return redirect()->route('catatanKaryawan.index')->withInput()->with('notif', $notif);
        } catch (\Throwable $th) {
            $notif = notify()->error('Terjadi kesalahan saat mengubah catatan karyawan');
            return back()->withInput()->with('notif', $notif);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        CatatanKaryawan::where('id_catatan_karyawan', $id)->delete();

        $notif = notify()->success('Catatan karyawan berhasil dihapus');
        return back()->with('notif', $notif);
    }
}
