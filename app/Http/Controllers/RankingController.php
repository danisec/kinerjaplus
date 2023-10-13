<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use App\Models\BobotPrioritasAlternatif;
use App\Models\BobotPrioritasKriteria;
use App\Models\Kriteria;
use App\Models\Ranking;
use Illuminate\Http\Request;

class RankingController extends Controller
{
    /* 
     * Constructor
     */
    private $kriteria;
    private $bobotPrioritasKriteria;
    private $alternatif;
    private $bobotAlternatif;

    public function __construct()
    {
        $this->kriteria = Kriteria::orderBy('kode_kriteria', 'asc')->get();
        $this->bobotPrioritasKriteria = BobotPrioritasKriteria::with('kriteria')->get();
        $this->alternatif = Alternatif::orderBy('kode_alternatif', 'asc')->get();
        $this->bobotAlternatif = BobotPrioritasAlternatif::orderBy('kode_kriteria', 'asc')->get();
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kriteria = $this->kriteria;
        $bobotPrioritasKriteria = $this->bobotPrioritasKriteria;
        $alternatif = $this->alternatif;
        $bobotAlternatif = $this->bobotAlternatif;

        /* Menghitung total per baris perankingan
           Rumus = (bobot prioritas kriteria * bobot prioritas alternatif) + (bobot prioritas kriteria * bobot prioritas alternatif) + ...
         */
        $rowTotalsRanking = [];
        foreach ($alternatif as $alternatifItem) {
            $total = 0;

            foreach ($kriteria as $kriteriaItem) {
                // Periksa apakah bobotPrioritasKriteria dengan kode_kriteria yang sesuai ada
                $bobotPrioritasKriteriaItem = $bobotPrioritasKriteria->where('kriteria.kode_kriteria', $kriteriaItem->kode_kriteria)->first();

                // Periksa apakah bobotPrioritasAlternatif dengan kode_kriteria yang sesuai ada
                $bobotPrioritasAlternatifItem = $bobotAlternatif->where('kode_kriteria', $kriteriaItem->kode_kriteria)->where('kode_alternatif', $alternatifItem->kode_alternatif)->first();

                // Jika ada, maka hitung totalnya
                if ($bobotPrioritasKriteriaItem && $bobotPrioritasAlternatifItem) {
                    $total += ($bobotPrioritasKriteriaItem->bobot_prioritas * $bobotPrioritasAlternatifItem->bobot_prioritas);
                }
            }

            $rowTotalsRanking[$alternatifItem->kode_alternatif] = $total;

            // Dapatkan 4 angka di belakang koma tanpa round()
            $rowTotalsRanking[$alternatifItem->kode_alternatif] = substr($rowTotalsRanking[$alternatifItem->kode_alternatif], 0, 6);
        }

        // Urutkan $rowTotalsRanking secara descending (dari yang tertinggi)
        arsort($rowTotalsRanking);

        // Mengatur urutan rank
        $rank = 0;
        $prevTotal = null;
        $resultRank = [];
        foreach ($rowTotalsRanking as $alternatifKode => $total) {
            if ($prevTotal === null || $prevTotal != $total) {
                $rank++;
            }
            $resultRank[] = [
                'alternatif' => $alternatifKode,
                'total' => $total,
                'rank' => $rank
            ];
            $prevTotal = $total;
        }
    
        return view('pages.dashboard.ranking.index', [
            'title' => 'Perankingan',
            'kriteria' => $kriteria,
            'bobotPrioritasKriteria' => $bobotPrioritasKriteria,
            'alternatif' => $alternatif,
            'bobotAlternatif' => $bobotAlternatif,
            'ranking' => $resultRank,
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
        $validatedData = $request->validate([
            'kode_alternatif' => 'required',
            'nilai' => 'required',
            'rank' => 'required',
        ], [
            'kode_alternatif.required' => 'Kode alternatif harus diisi',
            'nilai.required' => 'Nilai harus diisi',
            'rank' => 'Rank harus diisi',
        ]);

        try {
            foreach ($validatedData['kode_alternatif'] as $key => $value) {
                Ranking::create([
                    'kode_alternatif' => $value,
                    'nilai' => $validatedData['nilai'][$key],
                    'rank' => $validatedData['rank'][$key],
                ]);
            }

            $notif = notify()->success('Data ranking berhasil ditambahkan');
            return back()->with('notif', $notif);
        } catch (\Throwable $th) {
            $notif = notify()->error('Terjadi kesalahan saat menyimpan data ranking');
            return back()->with('notif', $notif);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Ranking $ranking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ranking $ranking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ranking $ranking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ranking $ranking)
    {
        //
    }
}
