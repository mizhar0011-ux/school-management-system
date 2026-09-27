<x-layouts.app>

    <div class="flex h-full w-full flex-1 flex-col gap-6">

        {{-- Header --}}
        <div>
            <p class="text-sm font-semibold uppercase tracking-wider text-indigo-600 dark:text-indigo-400">
                User Management
            </p>

            <h1 class="mt-1 text-3xl font-bold text-slate-900 dark:text-white">
                Edit User
            </h1>

            <p class="mt-2 text-sm text-slate-500 dark:text-neutral-400">
                Update {{ $user->name }}'s account information and role.
            </p>
        </div>


        {{-- Edit Form --}}
        <div class="max-w-3xl rounded-2xl border border-slate-200 bg-white p-6 shadow-sm dark:border-neutral-700 dark:bg-neutral-900">

            <form method="POST" action="{{ route('admin.users.update', $user) }}" class="space-y-6">

                @csrf
                @method('PUT')


                {{-- Name --}}
                <div>
                    <label class="mb-2 block text-sm font-semibold text-slate-700 dark:text-neutral-200">
                        Full Name
                    </label>

                    <input
                        type="text"
                        name="name"
                        value="{{ old('name', $user->name) }}"
                        class="w-full rounded-xl border border-slate-200 bg-white px-4 py-3 text-sm text-slate-700 shadow-sm outline-none transition
                               focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/20
                               dark:border-neutral-700 dark:bg-neutral-800 dark:text-neutral-200"
                    >

                    @error('name')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>


                {{-- Email --}}
                <div>
                    <label class="mb-2 block text-sm font-semibold text-slate-700 dark:text-neutral-200">
                        Email Address
                    </label>

                    <input
                        type="email"
                        name="email"
                        value="{{ old('email', $user->email) }}"
                        class="w-full rounded-xl border border-slate-200 bg-white px-4 py-3 text-sm text-slate-700 shadow-sm outline-none transition
                               focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/20
                               dark:border-neutral-700 dark:bg-neutral-800 dark:text-neutral-200"
                    >

                    @error('email')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>


                {{-- Role --}}
                <div>
                    <label class="mb-2 block text-sm font-semibold text-slate-700 dark:text-neutral-200">
                        User Role
                    </label>

                    <select
                        name="role"
                        class="w-full rounded-xl border border-slate-200 bg-white px-4 py-3 text-sm font-semibold text-slate-700 shadow-sm outline-none transition
                               focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/20
                               dark:border-neutral-700 dark:bg-neutral-800 dark:text-neutral-200"
                    >
                        <option value="student" @selected(old('role', $user->role) === 'student')}>
                            🎓 Student
                        </option>

                        <option value="admin" @selected(old('role', $user->role) === 'admin')}>
                            🛡️ Administrator
                        </option>
                    </select>

                    @error('role')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>


                {{-- Buttons --}}
                <div class="flex flex-col gap-3 border-t border-slate-100 pt-6 sm:flex-row dark:border-neutral-800">

                    <button
                        type="submit"
                        class="rounded-xl bg-slate-950 px-6 py-3 text-sm font-semibold text-white shadow-sm transition
                               hover:-translate-y-0.5 hover:bg-indigo-700
                               focus:outline-none focus:ring-2 focus:ring-indigo-500/20"
                    >
                        Save Changes
                    </button>

                    <a
                        href="{{ route('admin.users') }}"
                        class="rounded-xl border border-slate-200 bg-white px-6 py-3 text-center text-sm font-semibold text-slate-600 shadow-sm transition
                               hover:bg-slate-50
                               dark:border-neutral-700 dark:bg-neutral-800 dark:text-neutral-300"
                    >
                        Cancel
                    </a>

                </div>

            </form>

        </div>

    </div>

</x-layouts.app>