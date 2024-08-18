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
                <x-molecules.search :placeholder="'Cari Persetujuan Penilaian'" :request="request('nama_alternatif')" :name="'nama_alternatif'" :value="request('nama_alternatif')" />
            </div>
        </div>
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
                    <th class="px-6 py-3 text-center" scope="colgroup" colspan="2">
                        Status
                    </th>
                    <th class="px-6 py-3 text-center" scope="colgroup" rowspan="2">
                        Aksi
                    </th>
                </tr>

                <tr>
                    <th class="px-6 py-3 text-center">
                        Disetujui
                    </th>
                    <th class="px-3 py-3 text-center">
                        Tidak Disetujui
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
                            <td class="whitespace-nowrap px-6 py-4 text-center">
                                <div class="flex items-center justify-center">
                                    <input
                                        class="focus:ring-3 h-5 w-5 rounded border-gray-300 bg-gray-50 text-blue-600 focus:ring-indigo-200"
                                        type="checkbox" {{ $item->status == 'Disetujui' ? 'checked' : '' }}
                                        @disabled(true)>
                                </div>
                            </td>
                            <td class="whitespace-nowrap px-6 py-4 text-center">
                                <div class="flex items-center justify-center">
                                    <input
                                        class="focus:ring-3 h-5 w-5 rounded border-gray-300 bg-gray-50 text-red-600 focus:ring-indigo-200"
                                        type="checkbox" {{ $item->status == 'Tidak Disetujui' ? 'checked' : '' }}
                                        @disabled(true)>
                                </div>
                            </td>
                            <td class="flex justify-center gap-4 px-6 py-4">
                                <div x-data="{ showTooltip: false }">
                                    <a class="font-medium text-gray-600"
                                        href="{{ route('persetujuanPenilaian.show', $item->id_penilaian) }}"
                                        target="_blank" rel="noreferrer noopener" @mouseenter="showTooltip = true"
                                        @mouseleave="showTooltip = false">
                                        <x-atoms.svg.eye />
                                    </a>

                                    <div class="absolute rounded bg-gray-100 px-2 py-1 text-xs text-gray-900"
                                        x-show="showTooltip">
                                        Detail
                                    </div>
                                </div>

                                <div x-data="{ isOpen: false }">
                                    <button class="text-blue-600 focus:outline-none" type="button"
                                        @click="isOpen = true">
                                        <x-atoms.svg.check />
                                    </button>

                                    <x-molecules.modal-update :title="'Ubah Status Persetujuan Penilaian : ' .
                                        $item->alternatifPertama->alternatifPertama->nama_alternatif .
                                        ' Kepada ' .
                                        $item->alternatifKedua->alternatifPertama->nama_alternatif .
                                        ' Tahun Ajaran ' .
                                        $item->tanggalPenilaian->tahun_ajaran .
                                        ' - Semester ' .
                                        $item->tanggalPenilaian->semester .
                                        ' ?'" :action="route('persetujuanPenilaian.update', $item->id_penilaian)" :modalId="'modal_' . $item->id_penilaian">

                                        <div class="flex flex-row items-center gap-4">
                                            <input id="status_{{ $item->id_penilaian }}" name="status" type="hidden"
                                                value="">

                                            <div>
                                                <button
                                                    class="updateStatusButton rounded-md bg-indigo-700 px-8 py-2.5 text-white hover:bg-indigo-600 focus:bg-indigo-600 focus:ring-indigo-600"
                                                    data-status="Disetujui" type="button">
                                                    Disetujui
                                                </button>
                                            </div>

                                            <div>
                                                @if ($item->catatanKaryawan != null)
                                                    <a
                                                        href="{{ route('catatanKaryawan.edit', ['id' => $item->catatanKaryawan->id_catatan_karyawan, 'firstYear' => substr($tahunAjaranBreadcrumbs['tahun_ajaran'], 0, 4), 'secondYear' => substr($tahunAjaranBreadcrumbs['tahun_ajaran'], 5), 'semester' => $tahunAjaranBreadcrumbs['semester']]) }}">
                                                        <button
                                                            class="updateStatusButton rounded-md bg-red-700 px-8 py-2.5 text-white hover:bg-red-600 focus:bg-red-600 focus:ring-red-600"
                                                            data-status="Tidak Disetujui" type="button">
                                                            Tidak Disetujui
                                                        </button>
                                                    </a>
                                                @else
                                                    <a
                                                        href="{{ route('persetujuanPenilaian.createCatatan', ['firstYear' => substr($tahunAjaranBreadcrumbs['tahun_ajaran'], 0, 4), 'secondYear' => substr($tahunAjaranBreadcrumbs['tahun_ajaran'], 5), 'semester' => $tahunAjaranBreadcrumbs['semester'], 'id' => $item->id_penilaian]) }}">
                                                        <button
                                                            class="updateStatusButton rounded-md bg-red-700 px-8 py-2.5 text-white hover:bg-red-600 focus:bg-red-600 focus:ring-red-600"
                                                            data-status="Tidak Disetujui" type="button">
                                                            Tidak Disetujui
                                                        </button>
                                                    </a>
                                                @endif
                                            </div>
                                        </div>
                                    </x-molecules.modal-update>
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
