<x-app-dashboard title="{{ $title }}">

    <x-molecules.breadcrumb.breadcrumb>
        <li class="xs:text-xs flex items-center gap-0.5 text-gray-800 sm:text-sm dark:text-white/90">
            <x-atoms.svg.arrow-right />
            <a class="hover:text-brand-500 dark:hover:text-brand-400 xs:text-xs flex items-center gap-1 text-gray-500 sm:text-sm dark:text-gray-400"
                href="{{ route('persetujuanPenilaian.index') }}">Persetujuan Penilaian</a>
        </li>

        <li class="xs:text-xs flex items-center gap-0.5 text-gray-800 sm:text-sm dark:text-white/90">
            <x-atoms.svg.arrow-right />
            <span class="capitalize">{{ $tahunAjaranBreadcrumbs['nama_group_karyawan'] }} Tahun Ajaran
                {{ $tahunAjaranBreadcrumbs['tahun_ajaran'] }} - Semester
                {{ $tahunAjaranBreadcrumbs['semester'] }}</span>
        </li>
    </x-molecules.breadcrumb.breadcrumb>

    <div
        class="my-8 overflow-hidden rounded-2xl border border-gray-200 bg-white px-4 pb-3 pt-4 sm:px-6 dark:border-gray-800 dark:bg-white/[0.03]">

        <div class="mb-6 mt-2 flex flex-row items-center gap-1.5 rounded-lg bg-emerald-50 p-4 text-sm text-emerald-700">
            <svg class="size-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 3.75h.008v.008H12v-.008Z" />
            </svg>


            <p class="text-sm font-medium">Total review penilaian {{ $notApprovedPenilaian }} /
                {{ $totalReviewPenilaian }}
            </p>
        </div>

        <x-molecules.table.table
            title="Persetujuan Penilaian Evaluasi Kinerja
            {{ $tahunAjaranBreadcrumbs['tahun_ajaran'] }} - Semester {{ $tahunAjaranBreadcrumbs['semester'] }}"
            :placeholderSearch="'Cari Nama Pegawai'" :request="request('nama_alternatif')" :nameSearch="'nama_alternatif'">
            <x-slot:thead>
                <tr class="border-y border-gray-100 dark:border-gray-800">
                    <th class="min-w-48 whitespace-nowrap py-3 text-left">
                        <div class="flex items-center">
                            <p class="xs:text-xs sm:text-theme-md font-medium text-gray-800">Nama Pemberi Nilai</p>
                        </div>
                    </th>
                    <th class="min-w-48 whitespace-nowrap py-3 text-left">
                        <div class="flex items-center">
                            <p class="xs:text-xs sm:text-theme-md font-medium text-gray-800">Kepada</p>
                        </div>
                    </th>
                    <th class="flex justify-center px-6 py-3">
                        <div class="flex items-center">
                            <p class="xs:text-xs sm:text-theme-md text-center font-medium text-gray-800">Aksi
                            </p>
                        </div>
                    </th>
                </tr>
            </x-slot:thead>

            @forelse ($penilaian as $item)
                <tr>
                    <td class="py-3">
                        <div class="flex items-center">
                            <p class="xs:text-sm sm:text-theme-md text-gray-700 dark:text-gray-400">
                                {{ $item->alternatifPertama->alternatifPertama->nama_alternatif }}
                            </p>
                        </div>
                    </td>
                    <td class="py-3">
                        <div class="flex items-center">
                            <p class="xs:text-sm sm:text-theme-md capitalize text-gray-700 dark:text-gray-400">
                                {{ $item->alternatifKedua->alternatifPertama->nama_alternatif }}
                            </p>
                        </div>
                    </td>
                    <td class="xs:gap-2.5 flex justify-center p-6 sm:gap-4">
                        <div x-data="{ showTooltip: false }">
                            <a class="{{ $item->penilaianIndikator->first()->status !== null ? 'text-green-500' : 'text-blue-600' }} hover:text-blue-light-500 font-medium text-gray-600"
                                href="{{ route('persetujuanPenilaian.show', $item->id_penilaian) }}"
                                @mouseenter="showTooltip = true" @mouseleave="showTooltip = false">
                                <x-atoms.svg.check />
                            </a>

                            <div class="xs:text-xs absolute z-10 -ml-2.5 mt-1 rounded-sm bg-gray-100 px-2 py-1 text-gray-900 sm:text-sm"
                                x-show="showTooltip" x-transition>
                                <span>Review</span>
                            </div>
                        </div>

                        <div x-data="{ showTooltip: false }">
                            @if ($item->catatanKaryawan === null)
                                <a class="font-medium text-gray-600 hover:text-blue-600"
                                    href="{{ route('persetujuanPenilaian.createCatatan', [
                                        'firstYear' => substr($tahunAjaranBreadcrumbs['tahun_ajaran'], 0, 4),
                                        'secondYear' => substr($tahunAjaranBreadcrumbs['tahun_ajaran'], 5),
                                        'semester' => $tahunAjaranBreadcrumbs['semester'],
                                        'id' => $item->id_penilaian,
                                    ]) }}"
                                    @mouseenter="showTooltip = true" @mouseleave="showTooltip = false">
                                    <x-atoms.svg.comment />
                                </a>
                            @else
                                <a class="font-medium text-blue-600 hover:text-blue-600"
                                    href="{{ route('catatanKaryawan.edit', [
                                        'id' => $item->catatanKaryawan->id_catatan_karyawan,
                                        'firstYear' => substr($tahunAjaranBreadcrumbs['tahun_ajaran'], 0, 4),
                                        'secondYear' => substr($tahunAjaranBreadcrumbs['tahun_ajaran'], 5),
                                        'semester' => $tahunAjaranBreadcrumbs['semester'],
                                    ]) }}"
                                    @mouseenter="showTooltip = true" @mouseleave="showTooltip = false">
                                    <x-atoms.svg.comment />
                                </a>
                            @endif

                            <div class="xs:text-xs absolute z-10 -ml-2.5 mt-1 rounded-sm bg-gray-100 px-2 py-1 text-gray-900 sm:text-sm"
                                x-show="showTooltip" x-transition>
                                <span>Catatan</span>
                            </div>
                        </div>

                        <div x-data="{ showTooltip: false, isOpen: false }">
                            <button class="text-gray-600 hover:text-red-600" type="button"
                                @mouseenter="showTooltip = true" @mouseleave="showTooltip = false"
                                @click="isOpen = true">
                                <x-atoms.svg.reload />
                            </button>

                            <div class="xs:text-xs absolute z-10 -ml-2.5 mt-1 rounded-sm bg-gray-100 px-2 py-1 text-gray-900 sm:text-sm"
                                x-show="showTooltip" x-transition>
                                <span>Atur Ulang Penilaian</span>
                            </div>

                            <x-molecules.modal.modal-delete :heading="'Konfirmasi'" :title="'Atur ulang penilaian: ' .
                                $item->alternatifPertama->alternatifPertama->nama_alternatif .
                                ' Kepada ' .
                                $item->alternatifKedua->alternatifPertama->nama_alternatif .
                                ' Tahun Ajaran ' .
                                $item->tanggalPenilaian->tahun_ajaran .
                                ' - Semester ' .
                                ucfirst($item->tanggalPenilaian->semester) .
                                '?'" :action="route('persetujuanPenilaian.destroy', $item->id_penilaian)"
                                :deleteNameButton="'Atur Ulang'" />
                        </div>
                    </td>
                </tr>
            @empty
                <tr class="border-b bg-white">
                    <td class="px-6 py-4 text-center font-medium text-gray-600" colspan="3">
                        Data belum ada.
                    </td>
                </tr>
            @endforelse
        </x-molecules.table.table>

        <div class="border-t border-gray-200 px-6 py-4 dark:border-gray-800">
            {{ $penilaian->links('vendor.pagination.tailwind') }}
        </div>
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
