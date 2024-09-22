<x-app-dashboard title="{{ $title }}">

    <x-molecules.breadcrumb>
        <li aria-current="page">
            <div class="flex items-center">
                <x-atoms.svg.arrow-right />
                <span class="mx-2 text-base font-medium text-gray-500">Data Subkriteria</span>
            </div>
        </li>
    </x-molecules.breadcrumb>

    <div class="my-8">
        <h4 class="mb-6 text-2xl font-semibold text-gray-900">Data Subkriteria</h4>

        <div class="flex flex-row items-center justify-between">
            <div>
                <x-molecules.search :placeholder="'Cari Subkriteria'" :request="request('nama_subkriteria')" :name="'nama_subkriteria'" :value="request('nama_subkriteria')" />
            </div>

            @can('direct.permission', 'kelola subkriteria')
                <div>
                    <a href="{{ route('subkriteria.create') }}">
                        <x-atoms.button.button-primary :customClass="'h-12 w-44 rounded-md'" :type="'button'" :name="'Tambah Subkriteria'" />
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
                        Kode Subkriteria
                    </th>
                    <th class="px-6 py-3" scope="col">
                        Nama Subkriteria
                    </th>
                    <th class="flex justify-center px-6 py-3" scope="col">
                        Aksi
                    </th>
                </tr>
            </thead>

            @if ($subkriteria != null && $subkriteria->count() > 0)
                @foreach ($subkriteria as $item)
                    <tbody>
                        <tr class="border-b bg-white hover:bg-slate-100">
                            <th class="whitespace-nowrap px-6 py-4 font-medium text-gray-900" scope="row">
                                {{ $item->kode_subkriteria }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $item->nama_subkriteria }}
                            </td>
                            <td class="flex justify-center gap-4 px-6 py-4">
                                @if (Auth::user()->hasAnyDirectPermission(['view subkriteria', 'kelola subkriteria']) ||
                                        Auth::user()->canany(['view subkriteria', 'kelola subkriteria']))
                                    <div x-data="{ showTooltip: false }">
                                        <a class="font-medium text-gray-600"
                                            href="{{ route('subkriteria.show', $item->id_subkriteria) }}"
                                            @mouseenter="showTooltip = true" @mouseleave="showTooltip = false">
                                            <x-atoms.svg.eye />
                                        </a>

                                        <div class="absolute rounded bg-gray-100 px-2 py-1 text-sm text-gray-900"
                                            x-show="showTooltip">
                                            Detail
                                        </div>
                                    </div>
                                @endif

                                @can('direct.permission', 'kelola subkriteria')
                                    <div x-data="{ showTooltip: false }">
                                        <a class="font-medium text-blue-600"
                                            href="{{ route('subkriteria.edit', $item->id_subkriteria) }}"
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

                                        <x-molecules.modal-delete :title="'Apakah Anda akan yakin ingin menghapus nama subkriteria : ' .
                                            $item->nama_subkriteria .
                                            ' ?'" :action="route('subkriteria.destroy', $item->id_subkriteria)" />
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
        {{ $subkriteria->links('vendor.pagination.tailwind') }}
    </div>

</x-app-dashboard>
