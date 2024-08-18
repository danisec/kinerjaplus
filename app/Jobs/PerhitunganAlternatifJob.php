<?php

namespace App\Jobs;

use App\Models\PerhitunganAlternatif;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class PerhitunganAlternatifJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $matriks;

    /**
     * Create a new job instance.
     */
    public function __construct(array $matriks, $idTanggalPenilaian)
    {
        $this->matriks = $matriks;
        $this->idTanggalPenilaian = $idTanggalPenilaian;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
         try {
            PerhitunganAlternatif::truncate();

            foreach ($this->matriks as $idTanggalPenilaian => $dataIdTanggalPenilaian) {
                foreach ($dataIdTanggalPenilaian as $kodeKriteria => $dataKriteria) {
                    foreach ($dataKriteria as $alternatifPertama => $dataAlternatif) {
                        foreach ($dataAlternatif as $alternatifKedua => $nilaiAlternatif) {
                            PerhitunganAlternatif::updateOrCreate(
                                [
                                    'id_tanggal_penilaian' => $idTanggalPenilaian,
                                    'kode_kriteria' => $kodeKriteria,
                                    'alternatif_pertama' => $alternatifPertama,
                                    'alternatif_kedua' => $alternatifKedua,
                                ],
                                ['nilai_alternatif' => $nilaiAlternatif]
                            );
                        }
                    }
                }
            }
        } catch (\Throwable $th) {
            // Tangani kesalahan jika terjadi
            \Log::error('Data perbandingan karyawan gagal disimpan: ' . $th->getMessage());

            // Melempar exception untuk menandakan bahwa terjadi kesalahan
            throw new \Exception('Data perbandingan karyawan gagal disimpan');
        }
    }
}
