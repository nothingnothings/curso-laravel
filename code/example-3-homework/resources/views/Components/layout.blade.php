<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
</head>

<body>
    <nav>
        <x-navlink href="/">Home</x-navlink>
        <x-navlink href="/about" style="color: green">About</x-navlink>
        <x-navlink href="/contact">Contact</x-navlink>
        <x-navlink href="/meet-the-team">Team</x-navlink>
    </nav>
    {{ $slot }}
</body>

</html>
