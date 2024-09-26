<x-layout>
    <x-slot:heading>
        Jobs Page
    </x-slot:heading>
    <ul>
        @foreach($jobs as $job)
            <a class="text-gray-500 hover:underline hover:text-blue-500" href="/jobs/{{ $job['id'] }}">
                <li><strong>{{ $job['title'] }}: Pays {{ $job['salary'] }} per year.</strong></li>
            </a>
        @endforeach
    </ul>

</x-layout>
