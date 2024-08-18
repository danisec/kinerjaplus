<x-app-dashboard title="{{ $title }}">

    <div class="my-2 flex flex-row flex-wrap gap-6">
        @if (Auth::user()->hasAnyRole('superadmin', 'IT'))
            <div class="h-28 w-52 rounded-md bg-blue-200/50 shadow-md shadow-blue-100">
                <div class="mt-6 p-2">
                    <p class="flex justify-center text-xl font-semibold text-gray-900">{{ $countUser }}</p>
                    <p class="flex justify-center text-lg font-normal text-gray-900">Jumlah User</p>
                </div>
            </div>
        @endif

        @if (Auth::user()->hasAnyRole('superadmin', 'admin'))
            <div class="h-28 w-52 rounded-md bg-purple-200/50 shadow-md shadow-purple-100">
                <div class="mt-6 p-2">
                    <p class="flex justify-center text-xl font-semibold text-gray-900">{{ $countKriteria }}</p>
                    <p class="flex justify-center text-lg font-normal text-gray-900">Jumlah Kriteria</p>
                </div>
            </div>

            <div class="h-28 w-52 rounded-md bg-violet-200/50 shadow-md shadow-violet-100">
                <div class="mt-6 p-2">
                    <p class="flex justify-center text-xl font-semibold text-gray-900">{{ $countSubkriteria }}</p>
                    <p class="flex justify-center text-lg font-normal text-gray-900">Jumlah Subkriteria</p>
                </div>
            </div>

            <div class="h-28 w-52 rounded-md bg-emerald-200/50 shadow-md shadow-emerald-100">
                <div class="mt-6 p-2">
                    <p class="flex justify-center text-xl font-semibold text-gray-900">{{ $countAlternatif }}</p>
                    <p class="flex justify-center text-lg font-normal text-gray-900">Jumlah Pegawai</p>
                </div>
            </div>
        @endif
    </div>

    @if (Auth::user()->hasAnyRole('superadmin', 'admin'))
        <div class="my-12">
            <div class="flex flex-row items-center gap-4">
                <h4 class="mb-6 text-xl font-bold text-gray-700">Daftar Pegawai
                </h4>
            </div>

            <div class="relative overflow-x-auto rounded-lg shadow-sm">
                <table class="w-full text-left text-base text-gray-900">
                    <thead class="bg-slate-100 text-sm uppercase text-gray-900">
                        <tr>
                            <th class="px-6 py-3" scope="col">
                                Kode Alternatif
                            </th>
                            <th class="px-6 py-3" scope="col">
                                Nama Pegawai
                            </th>
                            <th class="flex justify-center px-6 py-3" scope="col">
                                Aksi
                            </th>
                        </tr>
                    </thead>

                    @if ($alternatif != null && $alternatif->count() > 0)
                        @foreach ($alternatif as $item)
                            <tbody>
                                <tr class="border-b bg-white hover:bg-slate-100">
                                    <th class="whitespace-nowrap px-6 py-4 font-medium text-gray-900" scope="row">
                                        {{ $item->kode_alternatif }}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ $item->nama_alternatif }}
                                    </td>
                                    <td class="flex justify-center gap-4 px-6 py-4">
                                        <div x-data="{ showTooltip: false }">
                                            <a class="font-medium text-gray-600"
                                                href="{{ route('alternatif.show', $item->id_alternatif) }}"
                                                @mouseenter="showTooltip = true" @mouseleave="showTooltip = false">
                                                <x-atoms.svg.eye />
                                            </a>

                                            <div class="absolute rounded bg-gray-100 px-2 py-1 text-sm text-gray-900"
                                                x-show="showTooltip">
                                                Detail
                                            </div>
                                        </div>

                                        <div x-data="{ showTooltip: false }">
                                            <a class="font-medium text-blue-600"
                                                href="{{ route('alternatif.edit', $item->id_alternatif) }}"
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

                                            <x-molecules.modal-delete :title="'Apakah Anda akan yakin ingin menghapus nama pegawai : ' .
                                                $item->nama_alternatif .
                                                '?'" :action="route('alternatif.destroy', $item->id_alternatif)" />
                                        </div>
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
                {{ $alternatif->links('vendor.pagination.tailwind') }}
            </div>
        </div>
    @endif

    @if (Auth::user()->hasRole('IT'))
        <div class="my-12">
            <div class="flex flex-row items-center gap-4">
                <h4 class="mb-6 text-xl font-bold text-gray-700">Daftar Pengguna
                </h4>
            </div>

            <div class="relative overflow-x-auto rounded-lg shadow-sm">
                <table class="w-full text-left text-base text-gray-900">
                    <thead class="bg-slate-100 text-sm uppercase text-gray-900">
                        <tr>
                            <th class="px-6 py-3" scope="col">
                                No.
                            </th>
                            <th class="px-6 py-3" scope="col">
                                Nama Lengkap
                            </th>
                            <th class="px-6 py-3" scope="col">
                                Nama Pengguna
                            </th>
                            <th class="px-6 py-3 text-center" scope="col">
                                Peran
                            </th>
                            <th class="flex justify-center px-6 py-3" scope="col">
                                Aksi
                            </th>
                        </tr>
                    </thead>

                    @if ($user != null && $user->count() > 0)
                        @foreach ($user as $item)
                            <tbody>
                                <tr class="border-b bg-white hover:bg-slate-100">
                                    <th class="whitespace-nowrap px-6 py-4 font-medium text-gray-900" scope="row">
                                        {{ ($user->currentPage() - 1) * $user->perPage() + $loop->iteration }}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ $item->fullname }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $item->username }}
                                    </td>
                                    <td class="px-6 py-4 text-center">
                                        <p
                                            class="{{ $item->role == 'superadmin' || $item->role == 'admin'
                                                ? 'bg-red-100/40 text-red-600'
                                                : ($item->role == 'yayasan'
                                                    ? 'bg-emerald-100/40 text-emerald-600'
                                                    : ($item->role == 'deputi'
                                                        ? 'bg-violet-100/40 text-violet-600'
                                                        : ($item->role == 'kepala sekolah'
                                                            ? 'bg-lime-100/40 text-lime-600'
                                                            : ($item->role == 'guru'
                                                                ? 'bg-fuchsia-100/40 text-fuchsia-600'
                                                                : ($item->role == 'IT'
                                                                    ? 'bg-blue-100/40 text-blue-600'
                                                                    : ''))))) }} whitespace-nowrap rounded-full px-2.5 py-1 capitalize">

                                            {{ $item->role }}
                                        </p>
                                    </td>
                                    <td class="flex justify-center gap-4 px-6 py-4">
                                        <div x-data="{ showTooltip: false }">
                                            <a class="font-medium text-gray-600"
                                                href="{{ route('kelolaAkun.show', $item->id) }}"
                                                @mouseenter="showTooltip = true" @mouseleave="showTooltip = false">
                                                <x-atoms.svg.eye />
                                            </a>

                                            <div class="absolute rounded bg-gray-100 px-2 py-1 text-sm text-gray-900"
                                                x-show="showTooltip">
                                                Detail
                                            </div>
                                        </div>

                                        <div x-data="{ showTooltip: false }">
                                            <a class="font-medium text-blue-600"
                                                href="{{ route('kelolaAkun.edit', $item->id) }}"
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

                                            <x-molecules.modal-delete :title="'Apakah Anda akan yakin ingin menghapus nama akun : ' .
                                                $item->fullname .
                                                '?'" :action="route('kelolaAkun.destroy', $item->id)" />
                                        </div>
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
                {{ $user->links('vendor.pagination.tailwind') }}
            </div>
        </div>
    @endif

    <script>
        window.currentUser = @json([
            'user' => auth()->user(),
            'roles' => auth()->user()->getRoleNames(),
        ]);
    </script>

    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>

</x-app-dashboard>
