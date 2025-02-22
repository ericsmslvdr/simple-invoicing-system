<x-app-layout title="Edit Customer" header="Edit customer - <strong>{{ $customer->name }}</strong>">

    {{-- SLOT --}}
    <div class="h-full w-full space-y-8">
        <div class="w-full flex">
            <x-back-button />
        </div>

        {{-- CREATE CUSTOMER FORM --}}
        <div class="border-2 border-gray-500 w-96 mx-auto p-8">
            <form action="{{ route('customers.update', $customer->id) }}" method="POST" class="space-y-4 w-full mx-auto">
                @csrf
                @method('PATCH')

                <div class="space-y-2">
                    <x-label for="name">Customer Name</x-label>
                    <x-input name="name" id="name" placeholder="Enter customer name" required
                        :value="old('name', $customer->name)" />
                </div>
                <div class="space-y-2">
                    <x-label for="phone_number">Phone Number</x-label>
                    <x-input name="phone_number" id="phone_number" placeholder="Enter customer phone number" required
                        :value="old('phone_number', $customer->phone_number)" />
                </div>
                <div class="space-y-2">
                    <x-label for="email">Email Address</x-label>
                    <x-input name="email" id="email" placeholder="Enter customer email address" required
                        :value="old('email', $customer->email)" />
                </div>
                <div>
                    <x-button class="block ml-auto mt-8">Update</x-button>
                </div>
            </form>
        </div>
    </div>

</x-app-layout>
