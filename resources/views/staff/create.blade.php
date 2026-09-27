<x-layouts.app>

    <div class="space-y-6">

        {{-- Header --}}
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold text-zinc-900 dark:text-white">
                    Add Staff Member
                </h1>

                <p class="mt-1 text-sm text-zinc-500 dark:text-zinc-400">
                    Create a staff profile and login account.
                </p>
            </div>

            <a
                href="{{ route('staff.index') }}"
                class="rounded-lg border border-zinc-300 px-4 py-2 text-sm font-medium text-zinc-700 hover:bg-zinc-50 dark:border-zinc-600 dark:text-zinc-300"
            >
                ← Back
            </a>
        </div>

        {{-- Validation Errors --}}
        @if ($errors->any())
            <div class="rounded-lg border border-red-200 bg-red-50 p-4 dark:border-red-900 dark:bg-red-950">
                <ul class="list-disc space-y-1 pl-5 text-sm text-red-700 dark:text-red-300">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Form --}}
        <form
            action="{{ route('staff.store') }}"
            method="POST"
            class="rounded-xl border border-zinc-200 bg-white p-6 shadow-sm dark:border-zinc-700 dark:bg-zinc-900"
        >

            @csrf

            {{-- Basic Information --}}
            <div>
                <h2 class="text-lg font-semibold text-zinc-900 dark:text-white">
                    Basic Information
                </h2>

                <div class="mt-5 grid grid-cols-1 gap-5 md:grid-cols-2">

                    <flux:input
                        name="name"
                        label="Full Name"
                        placeholder="Enter staff name"
                        value="{{ old('name') }}"
                        required
                    />

                    <flux:input
                        name="employee_number"
                        label="Employee Number"
                        placeholder="e.g. STF001"
                        value="{{ old('employee_number') }}"
                        required
                    />

                    <flux:select
                        name="gender"
                        label="Gender"
                    >
                        <flux:select.option value="">
                            Select Gender
                        </flux:select.option>

                        <flux:select.option value="Male">
                            Male
                        </flux:select.option>

                        <flux:select.option value="Female">
                            Female
                        </flux:select.option>
                    </flux:select>

                    <flux:input
                        type="date"
                        name="date_of_birth"
                        label="Date of Birth"
                        value="{{ old('date_of_birth') }}"
                    />

                    <flux:input
                        name="phone"
                        label="Phone"
                        placeholder="Enter phone number"
                        value="{{ old('phone') }}"
                    />

                </div>
            </div>

            {{-- Employment Information --}}
            <div class="mt-8 border-t border-zinc-200 pt-6 dark:border-zinc-700">

                <h2 class="text-lg font-semibold text-zinc-900 dark:text-white">
                    Employment Information
                </h2>

                <div class="mt-5 grid grid-cols-1 gap-5 md:grid-cols-2">

                    <flux:input
                        name="department"
                        label="Department"
                        placeholder="e.g. Administration"
                        value="{{ old('department') }}"
                    />

                    <flux:input
                        name="designation"
                        label="Designation"
                        placeholder="e.g. Accountant"
                        value="{{ old('designation') }}"
                    />

                    <flux:input
                        type="date"
                        name="joining_date"
                        label="Joining Date"
                        value="{{ old('joining_date') }}"
                    />

                </div>
            </div>

            {{-- Address --}}
            <div class="mt-8 border-t border-zinc-200 pt-6 dark:border-zinc-700">

                <h2 class="text-lg font-semibold text-zinc-900 dark:text-white">
                    Contact Information
                </h2>

                <div class="mt-5">

                    <flux:textarea
                        name="address"
                        label="Address"
                        placeholder="Enter staff address"
                    >{{ old('address') }}</flux:textarea>

                </div>
            </div>

            {{-- Login Information --}}
            <div class="mt-8 rounded-lg border border-blue-200 bg-blue-50 p-4 dark:border-blue-900 dark:bg-blue-950">

                <h3 class="font-semibold text-blue-900 dark:text-blue-200">
                    Login Account
                </h3>

                <p class="mt-1 text-sm text-blue-700 dark:text-blue-300">
                    A staff login account will automatically be created using
                    the staff member's name and employee number.
                </p>

            </div>

            {{-- Buttons --}}
            <div class="mt-8 flex justify-end gap-3 border-t border-zinc-200 pt-6 dark:border-zinc-700">

                <flux:button
                    href="{{ route('staff.index') }}"
                    variant="ghost"
                >
                    Cancel
                </flux:button>

                <flux:button
                    type="submit"
                    variant="primary"
                >
                    Create Staff
                </flux:button>

            </div>

        </form>

    </div>

</x-layouts.app>