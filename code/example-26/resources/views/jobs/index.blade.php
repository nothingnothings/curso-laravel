<x-layout>
    <x-slot:heading>
        Jobs Page
    </x-slot:heading>
    <ul class="space-y-4">
        @foreach($jobs as $job)
        <a class="text-gray-500 hover:underline hover:text-blue-500 block px-4 py-6 border border-gray-200 rounded-lg" href="/jobs/{{ $job['id'] }}">

            <li>
                <div class="text-blue-500 font-bold">{{ $job->employer->name }}</div>
                <strong class="text-laracasts">{{ $job->title }}: Pays {{ $job->salary }} per year.</strong>
            </li>
        </a>
        @endforeach
    </ul>

    <div>
        {{ $jobs->links() }}
    </div>

</x-layout>
