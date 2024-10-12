<x-app-layout title="Dashboard" header="Dashboard">
    
    {{-- ADmin should see all total, while users can only see entities that belongs to them --}}
    {{-- SLOT --}}
    <div class="h-32 grow border-2 border-gray-400 flex flex-col justify-between p-4">
        <div class="flex items-center justify-between">
            <h2 class="font-medium">Total Customers</h2>
            <img src="https://img.icons8.com/?size=100&id=59220&format=png&color=000000" alt="" class="size-6">
        </div>
        <span class="text-3xl"><strong>1,234</strong></span>
    </div>

    <div class="h-32 grow border-2 border-gray-400 flex flex-col justify-between p-4">
        <div class="flex items-center justify-between">
            <h2 class="font-medium">Total Invoices</h2>
            <img src="https://img.icons8.com/?size=100&id=59220&format=png&color=000000" alt="" class="size-6">
        </div>
        <span class="text-3xl"><strong>1,234</strong></span>
    </div>

    <div class="h-32 grow border-2 border-gray-400 flex flex-col justify-between p-4">
        <div class="flex items-center justify-between">
            <h2 class="font-medium">Open Invoices</h2>
            <img src="https://img.icons8.com/?size=100&id=59220&format=png&color=000000" alt="" class="size-6">
        </div>
        <span class="text-3xl"><strong>1,234</strong></span>
    </div>

    <div class="h-32 grow border-2 border-gray-400 flex flex-col justify-between p-4">
        <div class="flex items-center justify-between">
            <h2 class="font-medium">Total Payments</h2>
            <img src="https://img.icons8.com/?size=100&id=59220&format=png&color=000000" alt="" class="size-6">
        </div>
        <span class="text-3xl"><strong>1,234</strong></span>
    </div>

</x-app-layout>
