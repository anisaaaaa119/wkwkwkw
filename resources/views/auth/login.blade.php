<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center bg-gradient-to-r from-indigo-100 to-purple-200 px-4">
        <div class="w-full max-w-lg bg-white shadow-2xl rounded-2xl p-10 space-y-6 border border-gray-200">
            <div class="text-center">
                <h2 class="text-4xl font-bold text-indigo-700">Login</h2>
                <p class="text-gray-600 mt-2 text-sm">Silakan masuk untuk melanjutkan</p>
            </div>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}" class="space-y-5">
                @csrf

                <!-- Email Address -->
                <div>
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="block mt-1 w-full rounded-xl border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500" 
                        type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div>
                    <x-input-label for="password" :value="__('Password')" />
                    <x-text-input id="password" class="block mt-1 w-full rounded-xl border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500" 
                        type="password" name="password" required autocomplete="current-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Remember Me -->
                <div class="flex items-center justify-between">
                    <label for="remember_me" class="flex items-center text-sm text-gray-600">
                        <input id="remember_me" type="checkbox" class="h-4 w-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500" name="remember">
                        <span class="ml-2">Ingat saya</span>
                    </label>

                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="text-sm text-indigo-600 hover:underline">
                            Lupa password?
                        </a>
                    @endif
                </div>

                <!-- Submit -->
                <div>
                    <x-primary-button class="w-full justify-center py-3 text-lg font-semibold rounded-xl bg-indigo-600 hover:bg-indigo-700">
                        {{ __('Masuk') }}
                    </x-primary-button>
                </div>
            </form>

            <div class="text-center text-sm text-gray-500 pt-4">
                Belum punya akun? <a href="{{ route('register') }}" class="text-indigo-600 hover:underline font-medium">Daftar sekarang</a>
            </div>
        </div>
    </div>
</x-guest-layout>
