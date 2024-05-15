<?php

namespace App\Jobs;

use App\Models\BobotPrioritasAlternatif;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class BobotPrioritasAlternatifJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $bobotPrioritasAlternatif;
    protected $tahunAjaran;

    /**
     * Create a new job instance.
     */
    public function __construct($bobotPrioritasAlternatif, $tahunAjaran)
    {
        $this->bobotPrioritasAlternatif = $bobotPrioritasAlternatif;
        $this->tahunAjaran = $tahunAjaran;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        try {
            $this->storeData();
        } catch (\Throwable $th) {
            // Tangani kesalahan jika terjadi
            \Log::error('Data bobot prioritas alternatif gagal disimpan: ' . $th->getMessage());

            // Melempar exception untuk menandakan bahwa terjadi kesalahan
            throw new \Exception('Data bobot prioritas alternatif gagal disimpan');
        }
    }

    /**
     * Store the data bobot prioritas alternatif.
     */
    private function storeData(): void
    {
        foreach ($this->bobotPrioritasAlternatif as $keyTahunAjaran => $valueTahunAjaran) {
            foreach ($valueTahunAjaran as $kodeKriteria => $matriksKriteria) {
                foreach ($matriksKriteria as $dataAlternatif => $bobotPrioritas) {
                    BobotPrioritasAlternatif::updateOrCreate(
                        [
                            'tahun_ajaran' => $keyTahunAjaran,
                            'kode_kriteria' => $kodeKriteria,
                            'kode_alternatif' => $dataAlternatif,
                        ],
                        ['bobot_prioritas' => $bobotPrioritas]
                    );
                }
            }
        }
    }
}
