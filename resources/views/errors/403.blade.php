<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Access Restricted | Horizon Academy</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-slate-100 antialiased">

    <div class="flex min-h-screen items-center justify-center px-6 py-12">

        <div class="w-full max-w-lg text-center">

            {{-- Logo --}}
            <div class="mx-auto flex h-20 w-20 items-center justify-center rounded-3xl bg-slate-950 shadow-xl">
                <span class="text-4xl">🔐</span>
            </div>

            {{-- Error code --}}
            <p class="mt-8 text-sm font-bold uppercase tracking-[0.3em] text-indigo-600">
                Error 403
            </p>

            {{-- Heading --}}
            <h1 class="mt-3 text-4xl font-bold tracking-tight text-slate-950 sm:text-5xl">
                Access Restricted
            </h1>

            {{-- Description --}}
            <p class="mx-auto mt-5 max-w-md text-base leading-7 text-slate-500">
                You don't have permission to access this page.
                Please return to your dashboard or contact an administrator
                if you believe this is a mistake.
            </p>

            {{-- Buttons --}}
            <div class="mt-8 flex flex-col justify-center gap-3 sm:flex-row">

                <a href="{{ route('dashboard') }}"
                   class="rounded-xl bg-slate-950 px-6 py-3.5 text-sm font-semibold text-white shadow-lg transition hover:-translate-y-0.5 hover:bg-indigo-700">
                    ← Back to Dashboard
                </a>

                <button onclick="history.back()"
                        class="rounded-xl border border-slate-200 bg-white px-6 py-3.5 text-sm font-semibold text-slate-700 shadow-sm transition hover:bg-slate-50">
                    Go Back
                </button>

            </div>

            {{-- Footer --}}
            <p class="mt-12 text-sm text-slate-400">
                © {{ date('Y') }} Horizon Academy
            </p>

        </div>

    </div>

</body>
</html>