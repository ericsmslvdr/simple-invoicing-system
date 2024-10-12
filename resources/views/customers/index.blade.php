<x-app-layout title="Customers">
    <x-slot name="title">Customers</x-slot>
    <x-slot name="header">Customers</x-slot>

    {{-- SLOT --}}
    <div class="h-full w-full space-y-8">

        {{-- ADD NEW CUSTOMER BUTTON --}}
        <div class="w-full flex justify-end">
            <a href="{{ route('customers.create') }}">
                <x-button class="flex gap-4 items-center group">
                    Add New Customer
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px"
                        class="fill-black group-hover:fill-white transition-all duration-150 ease-in-out">
                        <path
                            d="M440-280h80v-160h160v-80H520v-160h-80v160H280v80h160v160ZM120-120v-720h720v720H120Zm80-80h560v-560H200v560Zm0 0v-560 560Z" />
                    </svg>
                </x-button>
            </a>
        </div>

        {{-- LIST OF ALL CUSTOMERS --}}
        <table class="w-full">
            <thead class="text-sm uppercase bg-gray-300 text-gray-700 text-left">
                <tr>
                    <th class="px-6 py-3">Customer Name</th>
                    <th class="px-6 py-3">Phone Number</th>
                    <th class="px-6 py-3">Email</th>
                    <th class="px-6 py-3">Actions</th>
                </tr>
            </thead>
            <tbody>
                @if (count($customers) > 0)
                    @foreach ($customers as $customer)
                        <tr class="odd:bg-gray-50 even:bg-gray-100">
                            <td class="px-6 py-4">{{ $customer->name }}</td>
                            <td class="px-6 py-4">{{ $customer->phone_number }}</td>
                            <td class="px-6 py-4">{{ $customer->email }}</td>
                            <td class="px-6 py-4">
                                <x-button>Edit</x-button>
                                <x-button>Create Invoice</x-button>
                                <x-button variant="destroy">Delete</x-button>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr class="odd:bg-gray-50 even:bg-gray-100 text-center">
                        <td colspan="4" class="px-6 py-4 font-bold text-gray-700">No Customers</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>

</x-app-layout>
