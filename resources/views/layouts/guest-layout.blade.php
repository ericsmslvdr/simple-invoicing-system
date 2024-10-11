<x-head :title="$title" />

<body class="font-roboto h-dvh">
    <div class="container mx-auto h-full p-4 flex flex-col items-center justify-center gap-6">
        {{ $slot }}
    </div>

</body>

</html>
