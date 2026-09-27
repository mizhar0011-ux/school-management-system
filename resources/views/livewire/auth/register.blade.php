<?php

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('components.layouts.auth')] class extends Component {

    public string $name = '';

    public string $email = '';

    public string $role = 'student';

    public string $password = '';

    public string $password_confirmation = '';


    public function register(): void
    {
        $validated = $this->validate([

            'name' => [
                'required',
                'string',
                'max:255',
            ],

            'email' => [
                'required',
                'string',
                'lowercase',
                'email',
                'max:255',
                'unique:' . User::class,
            ],

            'role' => [
                'required',
                'in:student,teacher,staff',
            ],

            'password' => [
                'required',
                'string',
                'confirmed',
                Rules\Password::defaults(),
            ],

        ]);


        $validated['password'] = Hash::make(
            $validated['password']
        );

        $validated['status'] = 'pending';


        event(
            new Registered(
                $user = User::create($validated)
            )
        );


        session()->flash(
            'success',
            'Your registration has been submitted and is waiting for administrator approval.'
        );

        $this->redirect(
            route('login', absolute: false),
            navigate: true
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
            Create your account
        </h2>

        <p class="mt-2 text-sm leading-6 text-slate-500">
            Register for Horizon Academy and wait for administrator approval.
        </p>

    </div>


    {{-- FORM --}}
    <form wire:submit="register" class="space-y-5">

        {{-- Name --}}
        <div>

            <label
                for="name"
                class="mb-2 block text-sm font-semibold text-slate-700"
            >
                Full name
            </label>

            <input
                id="name"
                type="text"
                wire:model="name"
                autocomplete="name"
                placeholder="Enter your full name"
                autofocus
                class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3.5 text-sm text-slate-900 outline-none transition placeholder:text-slate-400 focus:border-indigo-500 focus:bg-white focus:ring-4 focus:ring-indigo-500/10"
            >

            @error('name')
                <p class="mt-2 text-sm text-red-600">
                    {{ $message }}
                </p>
            @enderror

        </div>


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
                placeholder="example@school.com"
                class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3.5 text-sm text-slate-900 outline-none transition placeholder:text-slate-400 focus:border-indigo-500 focus:bg-white focus:ring-4 focus:ring-indigo-500/10"
            >

            @error('email')
                <p class="mt-2 text-sm text-red-600">
                    {{ $message }}
                </p>
            @enderror

        </div>


        {{-- Role --}}
        <div>

            <label
                for="role"
                class="mb-2 block text-sm font-semibold text-slate-700"
            >
                Register as
            </label>

            <select
                id="role"
                wire:model="role"
                class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3.5 text-sm text-slate-900 outline-none transition focus:border-indigo-500 focus:bg-white focus:ring-4 focus:ring-indigo-500/10"
            >
                <option value="student">Student</option>
                <option value="teacher">Teacher</option>
                <option value="staff">Staff</option>
            </select>

            @error('role')
                <p class="mt-2 text-sm text-red-600">
                    {{ $message }}
                </p>
            @enderror

            <p class="mt-2 text-xs leading-5 text-slate-500">
                Your selected role will be reviewed by an administrator before your account is approved.
            </p>

        </div>


        {{-- Password --}}
        <div>

            <label
                for="password"
                class="mb-2 block text-sm font-semibold text-slate-700"
            >
                Password
            </label>

            <input
                id="password"
                type="password"
                wire:model="password"
                autocomplete="new-password"
                placeholder="Create a password"
                class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3.5 text-sm text-slate-900 outline-none transition placeholder:text-slate-400 focus:border-indigo-500 focus:bg-white focus:ring-4 focus:ring-indigo-500/10"
            >

            @error('password')
                <p class="mt-2 text-sm text-red-600">
                    {{ $message }}
                </p>
            @enderror

        </div>


        {{-- Confirm Password --}}
        <div>

            <label
                for="password_confirmation"
                class="mb-2 block text-sm font-semibold text-slate-700"
            >
                Confirm password
            </label>

            <input
                id="password_confirmation"
                type="password"
                wire:model="password_confirmation"
                autocomplete="new-password"
                placeholder="Confirm your password"
                class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3.5 text-sm text-slate-900 outline-none transition placeholder:text-slate-400 focus:border-indigo-500 focus:bg-white focus:ring-4 focus:ring-indigo-500/10"
            >

        </div>


        {{-- Notice --}}
        <div class="rounded-xl border border-indigo-100 bg-indigo-50 px-4 py-3">
            <p class="text-sm leading-6 text-indigo-700">
                Your account will remain <strong>pending</strong> until an administrator reviews and approves your registration.
            </p>
        </div>


        {{-- Button --}}
        <button
            type="submit"
            class="w-full rounded-xl bg-slate-950 px-5 py-3.5 text-sm font-semibold text-white shadow-lg shadow-slate-950/10 transition hover:-translate-y-0.5 hover:bg-indigo-700 hover:shadow-xl focus:outline-none focus:ring-4 focus:ring-indigo-500/20"
        >
            Submit Registration
        </button>

    </form>


    {{-- Login --}}
    <p class="mt-8 text-center text-sm text-slate-500">

        Already have an account?

        <a
            href="{{ route('login') }}"
            wire:navigate
            class="font-semibold text-indigo-600 hover:text-indigo-800"
        >
            Sign in
        </a>

    </p>

</div>