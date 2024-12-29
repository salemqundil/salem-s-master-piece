@include('partials.links')

<x-guest-layout>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
    
    <form method="POST" action="{{ route('login') }}" class="mb-30 mt-30">
        @csrf
        <div>
            <div class="border border-gray-100 hover-border-main-600 transition-1 rounded-16 px-24 py-40 h-100 bg-white shadow">
                <h6 class="text-xl mb-32">Login</h6>
                
                <!-- Email Address -->
                <div class="mb-24">
                    <label for="email" class="text-neutral-900 text-lg mb-8 fw-medium">
                        Email address <span class="text-danger">*</span>
                    </label>
                    <input 
                        id="email" 
                        type="email" 
                        name="email"
                        class="common-input" 
                        placeholder="Your Email" 
                        required 
                        autocomplete="username"
                        value="{{ old('email') }}"
                    >
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mb-24">
                    <label for="password" class="text-neutral-900 text-lg mb-8 fw-medium">Password</label>
                    <div class="position-relative">
                        <input 
                            type="password"
                            name="password"
                            class="common-input" 
                            id="password" 
                            placeholder="Enter Password"
                            required 
                            autocomplete="current-password"
                        >
                        <span class="toggle-password position-absolute top-50 inset-inline-end-0 me-16 translate-middle-y cursor-pointer ph ph-eye-slash" id="#password"></span>
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>
                </div>

                <!-- Remember Me and Login Button -->
                <div class="mb-24 mt-48">
                    <div class="flex-align gap-48 flex-wrap">
                        <button type="submit" class="btn btn-main py-18 px-40">Log in</button>
                        <div class="form-check common-check">
                            <input 
                                id="remember_me" 
                                name="remember"
                                class="form-check-input" 
                                type="checkbox"
                            >
                            <label class="form-check-label flex-grow-1" for="remember_me">Remember me</label>
                        </div>
                    </div>
                </div>

                <!-- Forgot Password Link -->
                <div class="mt-48">
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="text-danger-600 text-sm fw-semibold hover-text-decoration-underline">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </form>
</x-guest-layout>