<x-layouts.app-dashboard title="{{ $title }}">

    <div class="my-2 flex flex-row gap-6">
        <div class="h-28 w-52 rounded-md bg-blue-200/50 shadow-md shadow-blue-100">
            <div class="mt-6 p-2">
                <p class="flex justify-center text-xl font-semibold text-gray-900">{{ $countUser }}</p>
                <p class="flex justify-center text-lg font-normal text-gray-900">Jumlah User</p>
            </div>
        </div>

        <div class="h-28 w-52 rounded-md bg-indigo-200/50 shadow-md shadow-indigo-100">
            <div class="mt-6 p-2">
                <p class="flex justify-center text-xl font-semibold text-gray-900">{{ $countKriteria }}</p>
                <p class="flex justify-center text-lg font-normal text-gray-900">Jumlah Kriteria</p>
            </div>
        </div>

        <div class="h-28 w-52 rounded-md bg-emerald-200/50 shadow-md shadow-emerald-100">
            <div class="mt-6 p-2">
                <p class="flex justify-center text-xl font-semibold text-gray-900">{{ $countAlternatif }}</p>
                <p class="flex justify-center text-lg font-normal text-gray-900">Jumlah Karyawan</p>
            </div>
        </div>
    </div>

    <div class="mb-4 mt-12">
        <h4 class="text-xl font-bold text-gray-700">Ranking Kinerja Karyawan</h4>

        <div class="container mt-6">

            <div class="rounded-md bg-white p-4 shadow-md shadow-slate-100">
                {{-- {!! $chart->container() !!} --}}
            </div>

        </div>

    </div>

    {{--     <script src="{{ $chart->cdn() }}"></script>
    {{ $chart->script() }} --}}

</x-layouts.app-dashboard>
