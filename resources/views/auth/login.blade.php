<x-guest-layout>
    <h2 class="text-lg font-bold text-gray-900 mb-6 text-center">Masuk ke Dashboard</h2>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="space-y-4">
        @csrf

        <!-- Email Address -->
        <div>
            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username"
                   class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-yellow-500">
            <x-input-error :messages="$errors->get('email')" class="mt-1" />
        </div>

        <!-- Password -->
        <div>
            <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
            <input id="password" type="password" name="password" required autocomplete="current-password"
                   class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-yellow-500">
            <x-input-error :messages="$errors->get('password')" class="mt-1" />
        </div>

        <!-- Remember Me -->
        <div class="flex items-center justify-between">
            <label class="flex items-center gap-2 text-sm text-gray-600">
                <input type="checkbox" name="remember" class="accent-yellow-500 rounded">
                Ingat saya
            </label>

            @if (Route::has('password.request'))
                <a class="text-sm text-yellow-600 hover:text-yellow-700 hover:underline" href="{{ route('password.request') }}">
                    Lupa password?
                </a>
            @endif
        </div>

        <button type="submit"
                class="w-full bg-yellow-500 hover:bg-yellow-600 text-gray-900 font-semibold text-sm py-2.5 rounded-lg transition">
            Masuk
        </button>
    </form>
</x-guest-layout>