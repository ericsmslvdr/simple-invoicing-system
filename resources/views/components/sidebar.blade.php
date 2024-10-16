<aside class="flex h-full grow w-72 flex-col border-2 border-r-gray-400 bg-white p-4">
    <div class="flex gap-2">
        <span class="h-16 text-lg font-bold text-gray-500">Simple Invoicing System</span>
        {{-- <img src="https://img.icons8.com/?size=100&id=Wztk8rLOk7FN&format=png&color=000000" alt=""> --}}
        <img src="https://img.icons8.com/?size=100&id=9iz1vvPFv4QK&format=png&color=000000" alt=""
            class="size-8 cursor-pointer">
    </div>

    <nav class="mt-4 grow">
        <ul class="flex flex-col gap-4">
            <li class="group border-2 border-gray-400 hover:border-gray-600">
                <a href="{{ route('dashboard') }}" class="flex items-center justify-between gap-2 p-4">
                    Dashboard
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960"
                        class="size-6 fill-gray-400 group-hover:fill-gray-600">
                        <path
                            d="M520-600v-240h320v240H520ZM120-440v-400h320v400H120Zm400 320v-400h320v400H520Zm-400 0v-240h320v240H120Zm80-400h160v-240H200v240Zm400 320h160v-240H600v240Zm0-480h160v-80H600v80ZM200-200h160v-80H200v80Zm160-320Zm240-160Zm0 240ZM360-280Z" />
                    </svg>
                </a>
            </li>
            <li class="group border-2 border-gray-400 hover:border-gray-600">
                <a href="{{ route('customers.index') }}" class="flex items-center justify-between gap-2 p-4">
                    Customers
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960"
                        class="size-6 fill-gray-400 group-hover:fill-gray-600">
                        <path
                            d="M40-160v-160q0-34 23.5-57t56.5-23h131q20 0 38 10t29 27q29 39 71.5 61t90.5 22q49 0 91.5-22t70.5-61q13-17 30.5-27t36.5-10h131q34 0 57 23t23 57v160H640v-91q-35 25-75.5 38T480-200q-43 0-84-13.5T320-252v92H40Zm440-160q-38 0-72-17.5T351-386q-17-25-42.5-39.5T253-440q22-37 93-58.5T480-520q63 0 134 21.5t93 58.5q-29 0-55 14.5T609-386q-22 32-56 49t-73 17ZM160-440q-50 0-85-35t-35-85q0-51 35-85.5t85-34.5q51 0 85.5 34.5T280-560q0 50-34.5 85T160-440Zm640 0q-50 0-85-35t-35-85q0-51 35-85.5t85-34.5q51 0 85.5 34.5T920-560q0 50-34.5 85T800-440ZM480-560q-50 0-85-35t-35-85q0-51 35-85.5t85-34.5q51 0 85.5 34.5T600-680q0 50-34.5 85T480-560Z" />
                    </svg>
                </a>
            </li>
            <li class="group border-2 border-gray-400 hover:border-gray-600">
                <a href="{{ route('invoices.index') }}" class="flex items-center justify-between gap-2 p-4">
                    Invoices
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960"
                        class="size-6 fill-gray-400 group-hover:fill-gray-600">
                        <path
                            d="M240-80q-50 0-85-35t-35-85v-120h120v-560l60 60 60-60 60 60 60-60 60 60 60-60 60 60 60-60 60 60 60-60v680q0 50-35 85t-85 35H240Zm480-80q17 0 28.5-11.5T760-200v-560H320v440h360v120q0 17 11.5 28.5T720-160ZM360-600v-80h240v80H360Zm0 120v-80h240v80H360Zm320-120q-17 0-28.5-11.5T640-640q0-17 11.5-28.5T680-680q17 0 28.5 11.5T720-640q0 17-11.5 28.5T680-600Zm0 120q-17 0-28.5-11.5T640-520q0-17 11.5-28.5T680-560q17 0 28.5 11.5T720-520q0 17-11.5 28.5T680-480ZM240-160h360v-80H200v40q0 17 11.5 28.5T240-160Zm-40 0v-80 80Z" />
                    </svg>
                </a>
            </li>
            <li class="group border-2 border-gray-400 hover:border-gray-600">
                <a href="{{ route('payments.index') }}" class="flex items-center justify-between gap-2 p-4">
                    Payments
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960"
                        class="size-6 fill-gray-400 group-hover:fill-gray-600">
                        <path
                            d="M440-200h80v-40h80v-200H440v-40h160v-80h-80v-40h-80v40h-80v200h160v40H360v80h80v40ZM160-80v-800h440l200 200v600H160Zm80-80h480v-480H560v-160H240v640Zm0-640v160-160 640-640Z" />
                    </svg>
                </a>
            </li>
        </ul>
    </nav>


    <div class="flex h-auto w-full">
        <x-button class="grow" variant="destroy" form="logout-form">Logout</x-button>
        <form action="{{ route('logout') }}" method="POST" id="logout-form">
            @csrf
        </form>
    </div>
</aside>
