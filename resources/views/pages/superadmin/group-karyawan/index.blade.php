<x-app-dashboard title="{{ $title }}">

    <x-molecules.breadcrumb>
        <li aria-current="page">
            <div class="flex items-center">
                <x-atoms.svg.arrow-right />
                <span class="mx-2 text-base font-medium text-gray-500">Data Group Pegawai</span>
            </div>
        </li>
    </x-molecules.breadcrumb>

    <div class="my-8">
        <h4 class="mb-6 text-2xl font-semibold text-gray-900">Data Group Pegawai</h4>

        <div class="flex flex-row items-center justify-between">
            <div>
                <x-molecules.search :placeholder="'Cari Group Pegawai'" :request="request('nama_group_karyawan')" :name="'nama_group_karyawan'" :value="request('nama_group_karyawan')" />
            </div>

            @can('direct.permission', 'kelola group pegawai')
                <div>
                    <a href="{{ route('groupKaryawan.create') }}">
                        <x-atoms.button.button-primary :customClass="'h-12 w-56 rounded-md'" :type="'button'" :name="'Tambah Group Pegawai'" />
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
                        Nama Group Pegawai
                    </th>
                    <th class="px-6 py-3" scope="col">
                        Kepala Sekolah
                    </th>
                    <th class="flex justify-center px-6 py-3" scope="col">
                        Aksi
                    </th>
                </tr>
            </thead>

            @if ($groupKaryawan != null && $groupKaryawan->count() > 0)
                @foreach ($groupKaryawan as $item)
                    <tbody>
                        <tr class="border-b bg-white hover:bg-slate-100">
                            <th class="whitespace-nowrap px-6 py-4 font-medium text-gray-900" scope="row">
                                {{ ($groupKaryawan->currentPage() - 1) * $groupKaryawan->perPage() + $loop->iteration }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $item->nama_group_karyawan }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $item->alternatif->nama_alternatif }}
                            </td>
                            <td class="flex justify-center gap-4 px-6 py-4">
                                @if (Auth::user()->hasAnyDirectPermission(['view group pegawai', 'kelola group pegawai']) ||
                                        Auth::user()->canany(['view group pegawai', 'kelola group pegawai']))
                                    <div x-data="{ showTooltip: false }">
                                        <a class="font-medium text-gray-600"
                                            href="{{ route('groupKaryawan.show', $item->id_group_karyawan) }}"
                                            @mouseenter="showTooltip = true" @mouseleave="showTooltip = false">
                                            <x-atoms.svg.eye />
                                        </a>

                                        <div class="absolute rounded bg-gray-100 px-2 py-1 text-sm text-gray-900"
                                            x-show="showTooltip">
                                            Detail
                                        </div>
                                    </div>
                                @endif

                                @can('direct.permission', 'kelola group pegawai')
                                    <div x-data="{ showTooltip: false }">
                                        <a class="font-medium text-blue-600"
                                            href="{{ route('groupKaryawan.edit', $item->id_group_karyawan) }}"
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

                                        <x-molecules.modal-delete :title="'Apakah Anda akan yakin ingin menghapus group pegawai : ' .
                                            $item->nama_group_karyawan .
                                            ' ?'" :action="route('groupKaryawan.destroy', $item->id_group_karyawan)" />
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
        {{ $groupKaryawan->links('vendor.pagination.tailwind') }}
    </div>

</x-app-dashboard>
