<x-layouts.app-dashboard title="{{ $title }}">

    <x-molecules.breadcrumb>
        <li aria-current="page">
            <div class="flex items-center">
                <x-atoms.svg.arrow-right />
                <span class="mx-2 text-base font-medium text-gray-500">Penilaian</span>
            </div>
        </li>
    </x-molecules.breadcrumb>

    <div class="mx-auto my-8 w-full">
        <h4 class="text-2xl font-semibold text-gray-900">Penilaian Kinerja Tahun Ajaran {{ $tahunAjaran }}</h4>

        <div class="my-6 w-full rounded-md bg-slate-100 p-8">
            <p class="text-base font-bold uppercase tracking-wider text-gray-900">Pengantar</p>
            <p class="mt-6 text-base font-normal text-gray-900">Mohon berikan penilaian kinerja terhadap Anda sendiri,
                rekan kerja, dan atasan Anda. Penilaian ini akan digunakan sebagai bahan evaluasi kinerja Anda selama
                satu tahun terakhir. Atas kerjasama Anda kami ucapkan terima kasih.</p>
        </div>

        <div class="flex justify-center">
            <a href="{{ route('penilaian.create') }}">
                <x-atoms.button.button-primary :customClass="'h-12 w-48 rounded-full'" :type="'button'" :name="'Mulai'" />
            </a>
        </div>
    </div>

</x-layouts.app-dashboard>
