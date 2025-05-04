<x-app-dashboard title="{{ $title }}">

    <x-molecules.breadcrumb>
        <li aria-current="page">
            <div class="flex items-center">
                <x-atoms.svg.arrow-right />
                <a class="ml-1 text-base font-medium text-gray-900 hover:text-blue-600"
                    href="{{ route('persetujuanPenilaian.index') }}">Persetujuan Penilaian</a>
            </div>
        </li>

        <li aria-current="page">
            <div class="flex items-center">
                <x-atoms.svg.arrow-right />
                <span class="mx-2 text-base font-medium capitalize text-gray-500">Tahun Ajaran
                    {{ $tahunAjaranBreadcrumbs['tahun_ajaran'] }} - Semester
                    {{ $tahunAjaranBreadcrumbs['semester'] }}</span>
            </div>
        </li>
    </x-molecules.breadcrumb>

    <div class="my-8">
        <h4 class="mb-6 text-2xl font-semibold capitalize text-gray-900">Persetujuan Penilaian Evaluasi Kinerja
            {{ $tahunAjaranBreadcrumbs['tahun_ajaran'] }} - Semester {{ $tahunAjaranBreadcrumbs['semester'] }}</h4>

        <div class="flex flex-row items-center justify-between">
            <div>
                <x-molecules.search :placeholder="'Cari Nama Pegawai'" :request="request('nama_alternatif')" :name="'nama_alternatif'" :value="request('nama_alternatif')" />
            </div>
        </div>
    </div>

    <div class="mb-8 flex flex-row items-center gap-1.5 rounded-lg bg-emerald-50 p-4 text-sm text-emerald-700">
        <svg class="size-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
            stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 3.75h.008v.008H12v-.008Z" />
        </svg>


        <p class="text-sm font-medium">Total review penilaian {{ $notApprovedPenilaian }} / {{ $totalReviewPenilaian }}
        </p>
    </div>

    <div class="relative overflow-x-auto rounded-lg shadow-sm">
        <table class="w-full text-left text-base text-gray-900">
            <thead class="bg-slate-100 text-sm uppercase text-gray-900">
                <tr>
                    <th class="px-6 py-3" scope="col" rowspan="2">
                        No.
                    </th>
                    <th class="px-6 py-3" scope="col" rowspan="2">
                        Tahun Ajaran
                    </th>
                    <th class="px-6 py-3" scope="col" rowspan="2">
                        Semester
                    </th>
                    <th class="px-6 py-3" scope="col" rowspan="2">
                        Nama Pemberi Nilai
                    </th>
                    <th class="px-6 py-3" scope="col" rowspan="2">
                        Kepada
                    </th>
                    <th class="px-6 py-3 text-center" scope="colgroup" rowspan="2">
                        Aksi
                    </th>
                </tr>
            </thead>

            @if ($penilaian != null && $penilaian->count() > 0)
                @foreach ($penilaian as $item)
                    <tbody>
                        <tr class="border-b bg-white hover:bg-slate-100">
                            <th class="whitespace-nowrap px-6 py-4 font-medium text-gray-900" scope="row">
                                {{ ($penilaian->currentPage() - 1) * $penilaian->perPage() + $loop->iteration }}
                            </th>
                            <td class="whitespace-nowrap px-6 py-4">
                                {{ $item->tanggalPenilaian->tahun_ajaran }}
                            </td>
                            <td class="whitespace-nowrap px-6 py-4 capitalize">
                                {{ $item->tanggalPenilaian->semester }}
                            </td>
                            <td class="whitespace-nowrap px-6 py-4">
                                {{ $item->alternatifPertama->alternatifPertama->nama_alternatif }}
                            </td>
                            <td class="whitespace-nowrap px-6 py-4">
                                {{ $item->alternatifKedua->alternatifPertama->nama_alternatif }}
                            </td>
                            <td class="flex justify-center gap-4 px-6 py-4">
                                <div x-data="{ showTooltip: false }">
                                    <a class="{{ $item->penilaianIndikator->first()->status !== null ? 'text-green-500' : 'text-blue-600' }} font-medium focus:outline-none"
                                        href="{{ route('persetujuanPenilaian.show', $item->id_penilaian) }}"
                                        target="_blank" rel="noreferrer noopener" @mouseenter="showTooltip = true"
                                        @mouseleave="showTooltip = false">
                                        <x-atoms.svg.check />
                                    </a>

                                    <div class="absolute rounded bg-gray-100 text-xs text-gray-900"
                                        x-show="showTooltip">
                                        <span>Review</span>
                                    </div>
                                </div>

                                <div x-data="{ showTooltip: false }">
                                    @if ($item->catatanKaryawan === null)
                                        <a class="font-medium text-gray-800 focus:outline-none"
                                            href="{{ route('persetujuanPenilaian.createCatatan', [
                                                'firstYear' => substr($tahunAjaranBreadcrumbs['tahun_ajaran'], 0, 4),
                                                'secondYear' => substr($tahunAjaranBreadcrumbs['tahun_ajaran'], 5),
                                                'semester' => $tahunAjaranBreadcrumbs['semester'],
                                                'id' => $item->id_penilaian,
                                            ]) }}"
                                            rel="noreferrer noopener" @mouseenter="showTooltip = true"
                                            @mouseleave="showTooltip = false">
                                            <x-atoms.svg.comment />
                                        </a>
                                    @else
                                        <a class="font-medium text-blue-600"
                                            href="{{ route('catatanKaryawan.edit', [
                                                'id' => $item->catatanKaryawan->id_catatan_karyawan,
                                                'firstYear' => substr($tahunAjaranBreadcrumbs['tahun_ajaran'], 0, 4),
                                                'secondYear' => substr($tahunAjaranBreadcrumbs['tahun_ajaran'], 5),
                                                'semester' => $tahunAjaranBreadcrumbs['semester'],
                                            ]) }}"
                                            @mouseenter="showTooltip = true" @mouseleave="showTooltip = false">
                                            <x-atoms.svg.pen />
                                        </a>
                                    @endif

                                    <div class="absolute rounded bg-gray-100 text-xs text-gray-900"
                                        x-show="showTooltip">
                                        <span>Catatan</span>
                                    </div>
                                </div>

                                <div x-data="{ isOpen: false, showTooltip: false }">
                                    <button class="text-red-600 focus:outline-none" type="button"
                                        @mouseenter="showTooltip = true" @mouseleave="showTooltip = false"
                                        @click="isOpen = true">
                                        <x-atoms.svg.reload />
                                    </button>

                                    <div class="absolute rounded bg-gray-100 text-xs text-gray-900"
                                        x-show="showTooltip">
                                        <span>Atur Ulang Penilaian</span>
                                    </div>

                                    <x-molecules.modal-delete :title="'Atur ulang penilaian : ' .
                                        $item->alternatifPertama->alternatifPertama->nama_alternatif .
                                        ' Kepada ' .
                                        $item->alternatifKedua->alternatifPertama->nama_alternatif .
                                        ' Tahun Ajaran ' .
                                        $item->tanggalPenilaian->tahun_ajaran .
                                        ' - Semester ' .
                                        $item->tanggalPenilaian->semester .
                                        '?'" :action="route('persetujuanPenilaian.destroy', $item->id_penilaian)" :deleteNameButton="'Atur Ulang'" />
                                </div>
                            </td>
                        </tr>
                    </tbody>
                @endforeach
            @else
                <tbody>
                    <tr class="border-b bg-white">
                        <td class="px-6 py-4 text-center font-medium text-gray-600" colspan="6">
                            Data belum ada.
                        </td>
                    </tr>
                </tbody>
            @endif
        </table>
    </div>

    <div class="bg-white p-6">
        {{ $penilaian->links('vendor.pagination.tailwind') }}
    </div>

    <script>
        document.querySelectorAll('.updateStatusButton').forEach(button => {
            button.addEventListener('click', function() {
                const status = this.getAttribute('data-status');
                const input = document.getElementById('status_' + this.closest('form').id.split('_')[1]);
                const form = this.closest('form');

                input.value = status;
                form.submit();
            });
        });
    </script>

</x-app-dashboard>
