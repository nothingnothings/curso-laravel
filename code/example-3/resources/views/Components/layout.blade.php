<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
</head>

<body>
    <nav>
        <a href="/">Home</a>
        <a href="/about">About</a>
        <a href="/contact">Contact</a>
        <a href="/meet-the-team">Team</a>
    </nav>
    <!--  This is similar to 'props.children', for layouting -->
    <!-- <?php echo $slot ?> -->
     <!--  This is the same as 'echo $slot', but written in a simpler form, with double curly braces -->
     {{ $slot }}
</body>

</html>
