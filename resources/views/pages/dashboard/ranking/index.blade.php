<x-layouts.app-dashboard title="{{ $title }}">

    <x-molecules.breadcrumb>
        <li aria-current="page">
            <div class="flex items-center">
                <x-atoms.svg.arrow-right />
                <span class="mx-2 text-base font-medium text-gray-500">Perankingan</span>
            </div>
        </li>
    </x-molecules.breadcrumb>

    <div>

        @if (Auth::user()->role === 'manajer')
            <div class="relative my-8 overflow-x-auto rounded-lg shadow-sm">
                <table class="w-full text-left text-base text-gray-900">
                    <thead class="bg-slate-100 text-base capitalize text-gray-900">
                        <p class="border-b bg-slate-100 py-2 text-center font-bold text-gray-900">Perankingan
                        </p>

                        <tr>
                            <th class="px-6 py-3" scope="col">
                            </th>

                            @foreach ($kriteria as $dataKriteria)
                                <th class="px-3 py-3 text-center" scope="col">
                                    {{ $dataKriteria->nama_kriteria }}
                                </th>
                            @endforeach

                            {{-- <th class="px-3 py-3 text-center" scope="col">
                            Nilai
                        </th> --}}
                        </tr>
                    </thead>

                    <tbody>
                        <tr class="border-b bg-white">
                            <th class="w-12 whitespace-nowrap bg-orange-100 px-6 py-4 font-medium text-gray-900"
                                scope="row">
                                Bobot Prioritas Kriteria
                            </th>

                            @foreach ($bobotPrioritasKriteria as $bobotKriteria)
                                <td class="px-3 py-3 text-center">
                                    <input
                                        class="w-24 rounded-md border-none bg-orange-100 text-center focus:ring-slate-100"
                                        type="text" value="{{ $bobotKriteria->bobot_prioritas }}" readonly>
                                </td>
                            @endforeach
                        </tr>

                        @foreach ($alternatif as $dataAlternatif)
                            <tr class="border-b bg-white">
                                <th class="w-12 whitespace-nowrap bg-slate-100 px-6 py-4 font-medium text-gray-900"
                                    scope="row">
                                    {{ $dataAlternatif->nama_alternatif }}
                                </th>

                                @foreach ($bobotAlternatif as $bobot)
                                    @if ($bobot->kode_alternatif == $dataAlternatif->kode_alternatif)
                                        <td class="px-3 py-3 text-center">
                                            <input
                                                class="w-24 rounded-md border-none bg-slate-100 text-center focus:ring-slate-100"
                                                type="text" value="{{ $bobot->bobot_prioritas }}" readonly>
                                        </td>
                                    @endif
                                @endforeach

                                {{-- @foreach ($ranking as $keyRanking => $valueRanking)
                                @if ($keyRanking == $dataAlternatif->kode_alternatif)
                                    <td class="px-3 py-3 text-center">
                                        <input
                                            class="w-24 rounded-md border-none bg-slate-100 text-center focus:ring-slate-100"
                                            type="text" value="{{ $valueRanking }}" readonly>
                                    </td>
                                @endif
                            @endforeach --}}
                            </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>
        @endif

        <form @if (Auth::user()->role === 'manajer') action="{{ route('ranking.store') }}"
            method="POST" @endif>
            @csrf

            <div class="relative my-8 overflow-x-auto rounded-lg shadow-sm">
                <table class="w-full text-left text-base text-gray-900">
                    <thead class="bg-slate-100 text-base capitalize text-gray-900">
                        <p class="border-b bg-slate-100 py-2 text-center font-bold text-gray-900">Urutan Perankingan
                            Alternatif
                        </p>

                        <tr>
                            <th class="px-6 py-3" scope="col">
                                Nama Alternatif
                            </th>

                            <th class="px-3 py-3 text-center" scope="col">
                                Nilai
                            </th>

                            <th class="px-3 py-3 text-center" scope="col">
                                Rank
                            </th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($alternatif as $dataAlternatif)
                            <tr class="border-b bg-white">
                                <input name="kode_alternatif[]" type="hidden"
                                    value="{{ $dataAlternatif->kode_alternatif }}">

                                <th class="w-12 whitespace-nowrap bg-slate-100 px-6 py-4 font-medium text-gray-900"
                                    scope="row">
                                    <input class="border-none bg-slate-100 px-0 focus:ring-slate-100" type="text"
                                        value="{{ $dataAlternatif->nama_alternatif }}" readonly>
                                </th>

                                @foreach ($ranking as $keyRanking => $valueRanking)
                                    @if ($valueRanking['alternatif'] == $dataAlternatif->kode_alternatif)
                                        <td class="px-3 py-3 text-center">
                                            <input
                                                class="w-24 rounded-md border-none bg-slate-100 text-center focus:ring-slate-100"
                                                name="nilai[]" type="text" value="{{ $valueRanking['total'] }}"
                                                readonly>
                                        </td>

                                        <td class="px-3 py-3 text-center">
                                            <input
                                                class="w-24 rounded-md border-none bg-slate-100 text-center focus:ring-slate-100"
                                                name="rank[]" type="text" value="{{ $valueRanking['rank'] }}"
                                                readonly>
                                        </td>
                                    @endif
                                @endforeach
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            @if (Auth::user()->role === 'manajer')
                <div class="flex justify-end">
                    <x-atoms.button.button-primary :customClass="'h-12 w-40 rounded-md'" :type="'submit'" :name="'Simpan Ranking'" />
                </div>
            @endif

        </form>

    </div>

</x-layouts.app-dashboard>
