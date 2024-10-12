@php
    $selectedCustomerName = $customer->name ?? '';
    $selectedCustomerId = $customer->id ?? '';
@endphp

<x-app-layout title="Create Invoice" header="Create invoice for <strong>{{ $selectedCustomerName }}</strong>">

    {{-- SLOT --}}
    <div class="h-full w-full space-y-8">
        <div class="w-full flex">
            <x-back-button />
        </div>

        {{-- CREATE CUSTOMER FORM --}}
        <div class="border-2 border-gray-500 w-full mx-auto p-8">
            <form action="{{ route('customers.store') }}" method="POST" class="space-y-4 w-full mx-auto">
                @csrf

                <div class="flex gap-4">
                    <div class="space-y-2">
                        <x-label for="name">Invoice Number</x-label>
                        <x-input name="name" id="name" placeholder="Enter customer name" required
                            :value="old('name')" />
                    </div>

                    <div class="space-y-2">
                        <x-label for="phone_number">Invoice Date</x-label>
                        <x-input name="phone_number" id="phone_number" placeholder="Enter customer phone number"
                            required maxlength="11" :value="old('phone_number')" />
                    </div>

                    <div class="space-y-2 flex flex-col">
                        <x-label>Select existing customer: </x-label>
                        <select name="created_for" id="created_for" class="p-2 w-fit h-10">
                            <option value="">Select customer</option>
                            @foreach ($existingCustomers as $xCustomer)
                                <option value="{{ $xCustomer->id }}" @selected($selectedCustomerId === $xCustomer->id)>
                                    {{ $xCustomer->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="space-y-2">
                    <x-label for="email">Line Items</x-label>
                    {{-- TODO: type (product or service, radio btn? dropdown?), quantity, base price, subtotal (quantity * base_price) --}}
                    <div></div>
                </div>

                {{-- Add input for discount --}}
                {{-- Add input for vat (default 12% base from google, should this be manually input?) --}}
                {{-- Display grand price (((subtotal * discount) - subtotal) * vat + the output of the first parenthesis) --}}

                <div>
                    <x-button class="block ml-auto mt-8">Add Customer</x-button>
                </div>
            </form>
        </div>
    </div>

</x-app-layout>
