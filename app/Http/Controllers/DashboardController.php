<?php

namespace App\Http\Controllers;

use App\Charts\RankingKaryawan;
use App\Models\Alternatif;
use App\Models\Dashboard;
use App\Models\Kriteria;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(RankingKaryawan $chart)
    {
        return view('pages.dashboard.home.index', [
            'title' => 'Dashboard',
            'countUser' => User::count(),
            'countAlternatif' => Alternatif::count(),
            'countKriteria' => Kriteria::count(),
            'chart' => $chart->build(),
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
    public function show(Dashboard $dashboard)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Dashboard $dashboard)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Dashboard $dashboard)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dashboard $dashboard)
    {
        //
    }
}
