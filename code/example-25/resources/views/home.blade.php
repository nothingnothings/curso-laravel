<!-- THIS IS HOW WE REFERENCE COMPONENTS, IN LARAVEL: -->
<x-layout>
    <x-slot:heading>
        Home Page
    </x-slot:heading>
    {{-- <h1>{{ $greeting }} from the HOME page. My name is {{ $name }}, {{ $age }}, I'm a {{ $job }} </h1> --}}

    {{-- @foreach($jobs as $job)
        <li><strong>{{ $job['title'] }}: Pays {{ $job['salary'] }} per year.</strong></li>
    @endforeach --}}


</x-layout>
