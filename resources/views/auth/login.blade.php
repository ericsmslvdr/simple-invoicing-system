<x-guest-layout>
    <x-slot name="title">Login</x-slot>

    <h1 class="text-2xl font-bold text-gray-700">{{ config('app.name') }}</h1>

    <form action="{{ route('login') }}" method="POST" class="w-96 px-8 py-6 border-2 border-gray-500">
        @csrf

        <span class="text-2xl font-medium text-gray-700">Login</span>

        <div class="pt-4">
            <x-label for="email">Email</x-label>
            <x-input type="email" name="email" id="email" placeholder="Enter your email" required />
        </div>

        <div class="pt-4">
            <x-label for="password">Password</x-label>
            <x-input type="password" name="password" id="password" placeholder="Enter your password" required />
        </div>

        <div class="flex justify-between items-center pt-8">
            <a class="text-sm text-gray-600 hover:underline cursor-pointer hover:text-gray-900">Already have an
                account?</a>
            <x-button>Login</x-button>
        </div>
    </form>

</x-guest-layout>
