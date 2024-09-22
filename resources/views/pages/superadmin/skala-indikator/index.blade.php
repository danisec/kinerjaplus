<x-app-dashboard title="{{ $title }}">

    <x-molecules.breadcrumb>
        <li aria-current="page">
            <div class="flex items-center">
                <x-atoms.svg.arrow-right />
                <span class="mx-2 text-base font-medium text-gray-500">Data Skala Indikator</span>
            </div>
        </li>
    </x-molecules.breadcrumb>

    <div class="my-8">
        <h4 class="mb-6 text-2xl font-semibold text-gray-900">Data Skala Indikator</h4>

        <div class="flex flex-row items-center justify-between">
            <div>
                <x-molecules.search :placeholder="'Cari Indikator'" :request="request('indikator_subkriteria')" :name="'indikator_subkriteria'" :value="request('indikator_subkriteria')" />
            </div>

            @can('direct.permission', 'kelola skala indikator')
                <div class="flex flex-row gap-4">
                    @if ($nilaiSkala->isEmpty())
                        <a href="{{ route('nilaiSkala.create') }}">
                            <x-atoms.button.button-primary :customClass="'h-12 w-32 rounded-md'" :type="'button'" :name="'Nilai Skala'" />
                        </a>
                    @else
                        <a href="{{ route('nilaiSkala.edit') }}">
                            <x-atoms.button.button-primary :customClass="'h-12 w-32 rounded-md'" :type="'button'" :name="'Nilai Skala'" />
                        </a>
                    @endif

                    <a href="{{ route('skalaIndikator.create') }}">
                        <x-atoms.button.button-primary :customClass="'h-12 w-52 rounded-md'" :type="'button'" :name="'Tambah Skala Indikator'" />
                    </a>
                </div>
            @endcan
        </div>
    </div>

    <div class="relative overflow-x-auto rounded-lg shadow-sm">
        <table class="w-full text-left text-base text-gray-900">
            <thead class="bg-slate-100 text-sm uppercase text-gray-900">
                <tr>
                    <th class="px-6 py-3" scope="col">
                        No.
                    </th>
                    <th class="px-6 py-3" scope="col">
                        Nama Subkriteria
                    </th>
                    <th class="px-6 py-3" scope="col">
                        Nama Indikator
                    </th>
                    <th class="flex justify-center px-6 py-3" scope="col">
                        Aksi
                    </th>
                </tr>
            </thead>

            @if ($skalaIndikator != null && $skalaIndikator->count() > 0)
                @foreach ($skalaIndikator as $item)
                    <tbody>
                        <tr class="border-b bg-white hover:bg-slate-100">
                            <th class="whitespace-nowrap px-6 py-4 font-medium text-gray-900" scope="row">
                                {{ ($skalaIndikator->currentPage() - 1) * $skalaIndikator->perPage() + $loop->iteration }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $item->indikatorSubkriteria->subkriteria->nama_subkriteria }}
                            </td>
                            <td class="px-6 py-4">
                                {{ Str::limit($item->indikatorSubkriteria->indikator_subkriteria, 100, '...') }}
                            </td>
                            <td class="flex justify-center gap-4 px-6 py-4">
                                @if (Auth::user()->hasAnyDirectPermission(['view skala indikator', 'kelola skala indikator']) ||
                                        Auth::user()->canany(['view skala indikator', 'kelola skala indikator']))
                                    <div x-data="{ showTooltip: false }">
                                        <a class="font-medium text-gray-600"
                                            href="{{ route('skalaIndikator.show', $item->id_skala_indikator) }}"
                                            @mouseenter="showTooltip = true" @mouseleave="showTooltip = false">
                                            <x-atoms.svg.eye />
                                        </a>

                                        <div class="absolute rounded bg-gray-100 px-2 py-1 text-sm text-gray-900"
                                            x-show="showTooltip">
                                            Detail
                                        </div>
                                    </div>
                                @endif

                                @can('direct.permission', 'kelola skala indikator')
                                    <div x-data="{ showTooltip: false }">
                                        <a class="font-medium text-blue-600"
                                            href="{{ route('skalaIndikator.edit', $item->id_skala_indikator) }}"
                                            @mouseenter="showTooltip = true" @mouseleave="showTooltip = false">
                                            <x-atoms.svg.pen />
                                        </a>

                                        <div class="absolute rounded bg-gray-100 px-2 py-1 text-sm text-gray-900"
                                            x-show="showTooltip">
                                            <span>Ubah</span>
                                        </div>
                                    </div>

                                    <div x-data="{ isOpen: false }">
                                        <button class="text-red-600 focus:outline-none" type="button"
                                            @click="isOpen = true">
                                            <x-atoms.svg.trash />
                                        </button>

                                        <x-molecules.modal-delete :title="'Apakah Anda akan yakin ingin menghapus nama indikator : ' .
                                            $item->indikatorSubkriteria->indikator_subkriteria .
                                            ' ?'" :action="route('skalaIndikator.destroy', $item->id_skala_indikator)" />
                                    </div>
                                @endcan
                            </td>
                        </tr>
                    </tbody>
                @endforeach
            @else
                <tbody>
                    <tr class="border-b bg-white">
                        <td class="px-6 py-4 text-center font-medium text-gray-600" colspan="3">
                            Data belum ada.
                        </td>
                    </tr>
                </tbody>
            @endif
        </table>
    </div>

    <div class="bg-white p-6">
        {{ $skalaIndikator->links('vendor.pagination.tailwind') }}
    </div>

</x-app-dashboard>
