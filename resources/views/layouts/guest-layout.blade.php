@props(['title'])

<!DOCTYPE html>
<html lang="en" class="h-full">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }} - Simple Invoice System</title>

    @vite('resources/css/app.css')

</head>

<body class="h-full">
    <div class="container mx-auto h-full p-4 flex items-center justify-center">
        {{ $slot }}
    </div>

</body>

</html>
