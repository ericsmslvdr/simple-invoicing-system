@props(['title', 'header'])

<x-head title="{{ $title }}" />

<body class="h-dvh font-roboto">
    {{-- workaround to prevent fouc on firefox --}}
    <script>
        0
    </script>

    <div class="size-full flex">

        {{-- SIDEBAR --}}
        <x-sidebar />

        <div class="size-full flex flex-col bg-gray-50">
            <header class="h-auto w-full border-2 border-b-gray-400 p-4 shadow bg-white">
                <div class="container mx-auto">
                    <h1 class="text-2xl font-medium">{!! $header !!}</h1>{{-- To render the strong tag passed from props --}}
                </div>
            </header>

            <main class="container mx-auto flex h-auto flex-wrap justify-between gap-4 px-4 py-8 overflow-auto">
                {{ $slot }}
            </main>
        </div>
    </div>

</body>

</html>
