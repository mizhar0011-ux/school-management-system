<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @include('partials.head')
    </head>

    <body class="min-h-screen bg-slate-100 antialiased">

        <div class="min-h-screen flex items-center justify-center p-4 sm:p-6">

            <div class="w-full max-w-6xl overflow-hidden rounded-3xl bg-white shadow-2xl">

                <div class="grid min-h-[680px] lg:grid-cols-2">

                    {{-- LEFT SIDE --}}
                    <div class="relative hidden overflow-hidden bg-slate-950 lg:flex">

                        {{-- Decorative shapes --}}
                        <div class="absolute -left-28 -top-28 h-80 w-80 rounded-full bg-indigo-900/70"></div>
                        <div class="absolute -bottom-40 -right-20 h-96 w-96 rounded-full bg-indigo-900/50"></div>
                        <div class="absolute right-16 top-16 h-20 w-20 rounded-full bg-indigo-500/10"></div>

                        <div class="relative z-10 flex w-full flex-col justify-between p-12">

                            {{-- BRAND --}}
                            <div class="flex items-center gap-4">

                                <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-white shadow-lg">
                                    <x-app-logo-icon class="size-9 fill-current text-slate-950" />
                                </div>

                                <div>
                                    <h1 class="text-xl font-bold text-white">
                                        Horizon Academy
                                    </h1>

                                    <p class="text-sm text-slate-400">
                                        Student Management Portal
                                    </p>
                                </div>

                            </div>


                            {{-- CENTER CONTENT --}}
                            <div class="max-w-lg">

                                <p class="mb-5 text-sm font-semibold uppercase tracking-[0.3em] text-indigo-400">
                                    Welcome
                                </p>

                                <h2 class="text-5xl font-bold leading-tight text-white">
                                    Empowering
                                    <br>
                                    students.
                                    <span class="text-indigo-400">
                                        Building futures.
                                    </span>
                                </h2>

                                <p class="mt-6 max-w-md text-base leading-7 text-slate-400">
                                    Access your academic dashboard, manage your profile,
                                    and stay connected with your educational journey.
                                </p>

                                {{-- Decorative indicators --}}
                                <div class="mt-8 flex gap-3">
                                    <span class="h-1.5 w-10 rounded-full bg-indigo-500"></span>
                                    <span class="h-1.5 w-3 rounded-full bg-slate-700"></span>
                                    <span class="h-1.5 w-3 rounded-full bg-slate-700"></span>
                                </div>

                            </div>


                            {{-- FOOTER --}}
                            <div class="text-sm text-slate-500">
                                © {{ date('Y') }} Horizon Academy
                            </div>

                        </div>

                    </div>


                    {{-- RIGHT SIDE --}}
                    <div class="flex items-center justify-center bg-white px-6 py-12 sm:px-12 lg:px-16">

                        <div class="w-full max-w-md">

                            {{-- MOBILE BRAND --}}
                            <div class="mb-10 text-center lg:hidden">

                                <div class="mx-auto mb-4 flex h-14 w-14 items-center justify-center rounded-2xl bg-slate-950">
                                    <x-app-logo-icon class="size-9 fill-current text-white" />
                                </div>

                                <h1 class="text-xl font-bold text-slate-900">
                                    Horizon Academy
                                </h1>

                                <p class="mt-1 text-sm text-slate-500">
                                    Student Management Portal
                                </p>

                            </div>


                            {{-- LOGIN / REGISTER CONTENT --}}
                            {{ $slot }}

                        </div>

                    </div>

                </div>

            </div>

        </div>

        @fluxScripts
        <!-- for sweet alert -->

      

    </body>
</html>