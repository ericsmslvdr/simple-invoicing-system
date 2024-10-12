@props(['title', 'header'])

<x-head title="{{ $title }}" />

<body class="font-roboto h-dvh">
    <div class="flex size-full">
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
                        <a href="{{ route('customers.index') }}" class="p-4 flex items-center justify-between gap-2">
                            Customers
                            <img src="https://img.icons8.com/?size=100&id=59220&format=png&color=000000" alt=""
                                class="size-6">
                        </a>
                    </li>
                    <li class="border-2 border-gray-400 hover:border-gray-500">
                        <a href="{{ route('invoices.index') }}" class="p-4 flex items-center justify-between gap-2">
                            Invoices
                            <img src="https://img.icons8.com/?size=100&id=2ntLyKQoVn4E&format=png&color=000000"
                                alt="" class="size-6">
                        </a>
                    </li>
                    <li class="border-2 border-gray-400 hover:border-gray-500">
                        <a href="{{ route('payments.index') }}" class=" p-4 flex items-center justify-between gap-2">
                            Payments
                            <img src="https://img.icons8.com/?size=100&id=3576&format=png&color=000000" alt=""
                                class="size-6">
                        </a>
                    </li>
                </ul>
            </nav>

            <div class="h-auto w-full flex">
                <x-button class="grow" variant="destroy" form="logout-form">Logout</x-button>
                <form action="{{ route('logout') }}" method="POST" id="logout-form">
                    @csrf
                </form>
            </div>
        </aside>

        <div class="size-full flex flex-col">
            <header class="border-2 border-b-gray-400 shadow w-full h-auto p-4">
                <div class="container mx-auto">

                    <h1 class="text-2xl font-medium">{!! $header !!}</h1>{{-- To render the strong tag passed from props --}}
                </div>
            </header>

            <main class="container mx-auto h-auto flex flex-wrap justify-between gap-4 py-8 px-4">
                {{ $slot }}
            </main>
        </div>
    </div>

</body>

</html>
