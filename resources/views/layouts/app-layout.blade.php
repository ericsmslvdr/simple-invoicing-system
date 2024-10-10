@props(['title'])

<!DOCTYPE html>
<html lang="en" class="h-full">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }} - Simple Invoice System</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- Roboto (Reg, Med, Bodl) Google Font --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;400;500;700&display=swap" rel="stylesheet">
</head>

<body class="h-full font-roboto">
    <div class="flex h-full">
        <aside class="border-2 border-r-gray-400 w-72 h-full p-4 flex flex-col">
            <div class="flex gap-2">
                <span class="h-16 text-lg font-bold text-gray-500">Simple Invoicing System</span>
                {{-- <img src="https://img.icons8.com/?size=100&id=Wztk8rLOk7FN&format=png&color=000000" alt=""> --}}
                <img src="https://img.icons8.com/?size=100&id=9iz1vvPFv4QK&format=png&color=000000" alt=""
                    class="cursor-pointer size-8">
            </div>

            <nav class="grow mt-4">
                <ul class="flex flex-col gap-4">
                    <li class="border-2 border-gray-400 hover:border-gray-500">
                        <a href="{{ route('dashboard') }}" class="p-4 flex items-center justify-between gap-2">
                            Dashboard
                            <img src="https://img.icons8.com/?size=100&id=yBugi9w42EET&format=png&color=000000"
                                alt="" class="size-6">
                        </a>
                    </li>
                    <li class="border-2 border-gray-400 hover:border-gray-500">
                        <a href="{{ route('customer.index') }}" class="p-4 flex items-center justify-between gap-2">
                            Customers
                            <img src="https://img.icons8.com/?size=100&id=59220&format=png&color=000000" alt=""
                                class="size-6">
                        </a>
                    </li>
                    <li class="border-2 border-gray-400 hover:border-gray-500">
                        <a href="{{ route('invoice.index') }}" class="p-4 flex items-center justify-between gap-2">
                            Invoices
                            <img src="https://img.icons8.com/?size=100&id=2ntLyKQoVn4E&format=png&color=000000"
                                alt="" class="size-6">
                        </a>
                    </li>
                    <li class="border-2 border-gray-400 hover:border-gray-500">
                        <a href="{{ route('payment.index') }}" class=" p-4 flex items-center justify-between gap-2">
                            Payments
                            <img src="https://img.icons8.com/?size=100&id=3576&format=png&color=000000" alt=""
                                class="size-6">
                        </a>
                    </li>
                </ul>
            </nav>
        </aside>

        <div class="w-full">
            <header class="border-2 border-b-gray-400 shadow w-full h-auto p-4">
                <div class="container mx-auto flex justify-between items-center">
                    <h1 class="text-2xl font-medium">{{ $header }}</h1>
                    <nav class=" h-full list-none">
                        <li>
                            <x-button variant="destroy" form="logout-form">Logout</x-button>
                        </li>
                        <form action="{{ route('logout') }}" method="POST" id="logout-form">
                            @csrf
                        </form>
                    </nav>
                </div>
            </header>

            <main class="container mx-auto h-auto">
                <div class="h-full py-8 flex flex-wrap justify-between gap-4 px-4">
                    {{ $content }}
                </div>
            </main>
        </div>
    </div>

</body>

</html>
