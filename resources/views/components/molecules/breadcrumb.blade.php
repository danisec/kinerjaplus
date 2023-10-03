<nav class="my-2 flex justify-between text-gray-900" aria-label="Breadcrumb">
    <ol class="mb-3 inline-flex items-center space-x-3">
        <li>
            <div class="flex items-center">
                <a class="ml-1 text-base font-medium text-gray-900 hover:text-blue-600"
                    href="{{ route('dashboard.index') }}">Dashboard</a>
            </div>
        </li>
        {{ $slot }}
    </ol>
</nav>
