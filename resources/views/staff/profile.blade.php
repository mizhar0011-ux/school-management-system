<x-layouts.app>

    <div class="space-y-6">

        {{-- Header --}}
        <div>
            <h1 class="text-2xl font-bold text-zinc-900 dark:text-white">
                My Staff Profile
            </h1>

            <p class="mt-1 text-sm text-zinc-500 dark:text-zinc-400">
                View and update your personal staff information.
            </p>
        </div>


        {{-- Success Message --}}
        @if (session('success'))
            <div class="rounded-lg border border-green-200 bg-green-50 px-4 py-3 text-sm text-green-700 dark:border-green-800 dark:bg-green-900/20 dark:text-green-400">
                {{ session('success') }}
            </div>
        @endif


        {{-- Validation Errors --}}
        @if ($errors->any())
            <div class="rounded-lg border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-700 dark:border-red-800 dark:bg-red-900/20 dark:text-red-400">
                <ul class="list-disc space-y-1 pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


        {{-- Profile Form --}}
        <form
            method="POST"
            action="{{ route('staff.profile.update') }}"
            class="space-y-6"
        >
            @csrf
            @method('PUT')


            {{-- Personal Information --}}
            <div class="rounded-xl border border-zinc-200 bg-white p-6 shadow-sm dark:border-zinc-700 dark:bg-zinc-900">

                <h2 class="text-lg font-semibold text-zinc-900 dark:text-white">
                    Personal Information
                </h2>

                <div class="mt-5 grid grid-cols-1 gap-5 md:grid-cols-2">

                    {{-- Name --}}
                    <div>
                        <label class="block text-sm font-medium text-zinc-700 dark:text-zinc-300">
                            Full Name
                        </label>

                        <input
                            type="text"
                            name="name"
                            value="{{ old('name', $staff->name) }}"
                            required
                            class="mt-1 block w-full rounded-lg border-zinc-300 bg-white px-3 py-2 text-sm shadow-sm focus:border-zinc-500 focus:ring-zinc-500 dark:border-zinc-700 dark:bg-zinc-800 dark:text-white"
                        >
                    </div>


                    {{-- Employee Number --}}
                    <div>
                        <label class="block text-sm font-medium text-zinc-700 dark:text-zinc-300">
                            Employee Number
                        </label>

                        <input
                            type="text"
                            value="{{ $staff->employee_number }}"
                            disabled
                            class="mt-1 block w-full rounded-lg border-zinc-300 bg-zinc-100 px-3 py-2 text-sm text-zinc-500 dark:border-zinc-700 dark:bg-zinc-800 dark:text-zinc-400"
                        >

                        <p class="mt-1 text-xs text-zinc-500">
                            Employee number cannot be changed here.
                        </p>
                    </div>


                    {{-- Gender --}}
                    <div>
                        <label class="block text-sm font-medium text-zinc-700 dark:text-zinc-300">
                            Gender
                        </label>

                        <select
                            name="gender"
                            class="mt-1 block w-full rounded-lg border-zinc-300 bg-white px-3 py-2 text-sm shadow-sm dark:border-zinc-700 dark:bg-zinc-800 dark:text-white"
                        >
                            <option value="">Select Gender</option>

                            <option value="Male" @selected(old('gender', $staff->gender) === 'Male')>
                                Male
                            </option>

                            <option value="Female" @selected(old('gender', $staff->gender) === 'Female')>
                                Female
                            </option>
                        </select>
                    </div>


                    {{-- Date of Birth --}}
                    <div>
                        <label class="block text-sm font-medium text-zinc-700 dark:text-zinc-300">
                            Date of Birth
                        </label>

                        <input
                            type="date"
                            name="date_of_birth"
                            value="{{ old('date_of_birth', $staff->date_of_birth?->format('Y-m-d')) }}"
                            class="mt-1 block w-full rounded-lg border-zinc-300 bg-white px-3 py-2 text-sm shadow-sm dark:border-zinc-700 dark:bg-zinc-800 dark:text-white"
                        >
                    </div>


                    {{-- Phone --}}
                    <div>
                        <label class="block text-sm font-medium text-zinc-700 dark:text-zinc-300">
                            Phone
                        </label>

                        <input
                            type="text"
                            name="phone"
                            value="{{ old('phone', $staff->phone) }}"
                            class="mt-1 block w-full rounded-lg border-zinc-300 bg-white px-3 py-2 text-sm shadow-sm dark:border-zinc-700 dark:bg-zinc-800 dark:text-white"
                        >
                    </div>

                </div>

            </div>


            {{-- Employment Information --}}
            <div class="rounded-xl border border-zinc-200 bg-white p-6 shadow-sm dark:border-zinc-700 dark:bg-zinc-900">

                <h2 class="text-lg font-semibold text-zinc-900 dark:text-white">
                    Employment Information
                </h2>

                <div class="mt-5 grid grid-cols-1 gap-5 md:grid-cols-2">

                    {{-- Department --}}
                    <div>
                        <label class="block text-sm font-medium text-zinc-700 dark:text-zinc-300">
                            Department
                        </label>

                        <input
                            type="text"
                            name="department"
                            value="{{ old('department', $staff->department) }}"
                            class="mt-1 block w-full rounded-lg border-zinc-300 bg-white px-3 py-2 text-sm shadow-sm dark:border-zinc-700 dark:bg-zinc-800 dark:text-white"
                        >
                    </div>


                    {{-- Designation --}}
                    <div>
                        <label class="block text-sm font-medium text-zinc-700 dark:text-zinc-300">
                            Designation
                        </label>

                        <input
                            type="text"
                            name="designation"
                            value="{{ old('designation', $staff->designation) }}"
                            class="mt-1 block w-full rounded-lg border-zinc-300 bg-white px-3 py-2 text-sm shadow-sm dark:border-zinc-700 dark:bg-zinc-800 dark:text-white"
                        >
                    </div>


                    {{-- Joining Date --}}
                    <div>
                        <label class="block text-sm font-medium text-zinc-700 dark:text-zinc-300">
                            Joining Date
                        </label>

                        <input
                            type="date"
                            name="joining_date"
                            value="{{ old('joining_date', $staff->joining_date?->format('Y-m-d')) }}"
                            class="mt-1 block w-full rounded-lg border-zinc-300 bg-white px-3 py-2 text-sm shadow-sm dark:border-zinc-700 dark:bg-zinc-800 dark:text-white"
                        >
                    </div>

                </div>

            </div>


            {{-- Address --}}
            <div class="rounded-xl border border-zinc-200 bg-white p-6 shadow-sm dark:border-zinc-700 dark:bg-zinc-900">

                <h2 class="text-lg font-semibold text-zinc-900 dark:text-white">
                    Address
                </h2>

                <div class="mt-5">

                    <label class="block text-sm font-medium text-zinc-700 dark:text-zinc-300">
                        Address
                    </label>

                    <textarea
                        name="address"
                        rows="4"
                        class="mt-1 block w-full rounded-lg border-zinc-300 bg-white px-3 py-2 text-sm shadow-sm focus:border-zinc-500 focus:ring-zinc-500 dark:border-zinc-700 dark:bg-zinc-800 dark:text-white"
                    >{{ old('address', $staff->address) }}</textarea>

                </div>

            </div>


            {{-- Buttons --}}
            <div class="flex items-center justify-end gap-3">

                <a
                    href="{{ route('staff.dashboard') }}"
                    class="rounded-lg border border-zinc-300 px-4 py-2 text-sm font-medium text-zinc-700 hover:bg-zinc-100 dark:border-zinc-700 dark:text-zinc-300 dark:hover:bg-zinc-800"
                >
                    Cancel
                </a>

                <button
                    type="submit"
                    class="rounded-lg bg-zinc-900 px-5 py-2 text-sm font-medium text-white hover:bg-zinc-700 dark:bg-white dark:text-zinc-900 dark:hover:bg-zinc-200"
                >
                    Save Changes
                </button>

            </div>

        </form>

    </div>

</x-layouts.app>