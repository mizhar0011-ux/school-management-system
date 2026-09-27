<?php

use Illuminate\Auth\Events\Lockout;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Volt\Component;

new #[Layout('components.layouts.auth')] class extends Component {

    #[Validate('required|string|email')]
    public string $email = '';

    #[Validate('required|string')]
    public string $password = '';

    public bool $remember = false;


    public function login(): void
    {
        $this->validate();

        $this->ensureIsNotRateLimited();

        if (! Auth::attempt(
            [
                'email' => $this->email,
                'password' => $this->password,
            ],
            $this->remember
        )) {

            RateLimiter::hit($this->throttleKey());

            throw ValidationException::withMessages([
                'email' => __('auth.failed'),
            ]);
        }

        RateLimiter::clear($this->throttleKey());

        $user = Auth::user();

     


        // Pending account
        if ($user->status === 'pending') {

            Auth::logout();

            throw ValidationException::withMessages([
                'email' => 'Your account is waiting for administrator approval.',
            ]);
        }


        // Declined account
        if ($user->status === 'declined') {

            Auth::logout();

            throw ValidationException::withMessages([
                'email' => 'Your registration was declined. Please contact the administrator.',
            ]);
        }


        // Only approved accounts can continue
        if ($user->status !== 'approved') {

            Auth::logout();

            throw ValidationException::withMessages([
                'email' => 'Your account is not currently available for login.',
            ]);
        }


        // Successful login
        Session::regenerate();

        session()->flash(
            'success',
            'You have been logged in successfully!'
        );

        if ($user->role === 'admin') {

            $this->redirect(
                route('admin', absolute: false),
                navigate: true
            );

        } elseif ($user->role === 'teacher') {

            $this->redirect(
                route('teacher.dashboard', absolute: false),
                navigate: true
            );

        } elseif ($user->role === 'staff') {

            $this->redirect('/staff/dashboard');
        
        } else {

            $this->redirect(
                route('dashboard', absolute: false),
                navigate: true
            );
        }
    }


    protected function ensureIsNotRateLimited(): void
    {
        if (! RateLimiter::tooManyAttempts($this->throttleKey(), 5)) {
            return;
        }

        event(new Lockout(request()));

        $seconds = RateLimiter::availableIn($this->throttleKey());

        throw ValidationException::withMessages([
            'email' => __('auth.throttle', [
                'seconds' => $seconds,
                'minutes' => ceil($seconds / 60),
            ]),
        ]);
    }


    protected function throttleKey(): string
    {
        return Str::transliterate(
            Str::lower($this->email) . '|' . request()->ip()
        );
    }

}; ?>

<div>

    {{-- Heading --}}
    <div class="mb-8">

        <div class="mb-5 flex h-12 w-12 items-center justify-center rounded-xl bg-slate-950 shadow-lg">
            <span class="text-xl">🎓</span>
        </div>

        <h2 class="text-3xl font-bold tracking-tight text-slate-950">
            Welcome back
        </h2>

        <p class="mt-2 text-sm leading-6 text-slate-500">
            Sign in to continue to your school portal.
        </p>

    </div>


    {{-- FORM --}}
    <form wire:submit="login" class="space-y-5">

        {{-- Email --}}
        <div>

            <label
                for="email"
                class="mb-2 block text-sm font-semibold text-slate-700"
            >
                Email address
            </label>

            <input
                id="email"
                type="email"
                wire:model="email"
                autocomplete="email"
                placeholder="student@example.com"
                autofocus
                class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3.5 text-sm text-slate-900 outline-none transition placeholder:text-slate-400 focus:border-indigo-500 focus:bg-white focus:ring-4 focus:ring-indigo-500/10"
            >

            @error('email')
                <p class="mt-2 text-sm text-red-600">
                    {{ $message }}
                </p>
            @enderror

        </div>


        {{-- Password --}}
        <div>

            <div class="mb-2 flex items-center justify-between">

                <label
                    for="password"
                    class="block text-sm font-semibold text-slate-700"
                >
                    Password
                </label>

                @if (Route::has('password.request'))
                    <a
                        href="{{ route('password.request') }}"
                        wire:navigate
                        class="text-sm font-semibold text-indigo-600 transition hover:text-indigo-800"
                    >
                        Forgot password?
                    </a>
                @endif

            </div>

            <input
                id="password"
                type="password"
                wire:model="password"
                autocomplete="current-password"
                placeholder="Enter your password"
                class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3.5 text-sm text-slate-900 outline-none transition placeholder:text-slate-400 focus:border-indigo-500 focus:bg-white focus:ring-4 focus:ring-indigo-500/10"
            >

            @error('password')
                <p class="mt-2 text-sm text-red-600">
                    {{ $message }}
                </p>
            @enderror

        </div>


        {{-- Remember --}}
        <div class="flex items-center">

            <label class="flex cursor-pointer items-center gap-3">

                <input
                    type="checkbox"
                    wire:model="remember"
                    class="h-4 w-4 rounded border-slate-300 text-indigo-600 focus:ring-indigo-500"
                >

                <span class="text-sm text-slate-600">
                    Remember me
                </span>

            </label>

        </div>


        {{-- Button --}}
        <button
            type="submit"
            class="w-full rounded-xl bg-slate-950 px-5 py-3.5 text-sm font-semibold text-white shadow-lg shadow-slate-950/10 transition hover:-translate-y-0.5 hover:bg-indigo-700 hover:shadow-xl focus:outline-none focus:ring-4 focus:ring-indigo-500/20"
        >
            Sign in
        </button>

    </form>


    {{-- Register --}}
    @if (Route::has('register'))

        <p class="mt-8 text-center text-sm text-slate-500">

            Don't have an account?

            <a
                href="{{ route('register') }}"
                wire:navigate
                class="font-semibold text-indigo-600 hover:text-indigo-800"
            >
                Create account
            </a>

        </p>

    @endif

</div>

