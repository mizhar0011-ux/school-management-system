<x-layouts.app>

    <div class="space-y-6">

        {{-- Header --}}
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold text-zinc-900 dark:text-white">
                    Edit Staff Member
                </h1>

                <p class="mt-1 text-sm text-zinc-500 dark:text-zinc-400">
                    Update staff member information.
                </p>
            </div>

            <a
                href="{{ route('staff.show', $staff) }}"
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
            action="{{ route('staff.update', $staff) }}"
            method="POST"
            class="rounded-xl border border-zinc-200 bg-white p-6 shadow-sm dark:border-zinc-700 dark:bg-zinc-900"
        >

            @csrf
            @method('PUT')

            {{-- Basic Information --}}
            <div>
                <h2 class="text-lg font-semibold text-zinc-900 dark:text-white">
                    Basic Information
                </h2>

                <div class="mt-5 grid grid-cols-1 gap-5 md:grid-cols-2">

                    <flux:input
                        name="name"
                        label="Full Name"
                        value="{{ old('name', $staff->name) }}"
                        required
                    />

                    <flux:input
                        name="employee_number"
                        label="Employee Number"
                        value="{{ old('employee_number', $staff->employee_number) }}"
                        required
                    />

                    <flux:select
                        name="gender"
                        label="Gender"
                    >
                        <flux:select.option value="">
                            Select Gender
                        </flux:select.option>

                        <flux:select.option
                            value="Male"
                            :selected="old('gender', $staff->gender) === 'Male'"
                        >
                            Male
                        </flux:select.option>

                        <flux:select.option
                            value="Female"
                            :selected="old('gender', $staff->gender) === 'Female'"
                        >
                            Female
                        </flux:select.option>
                    </flux:select>

                    <flux:input
                        type="date"
                        name="date_of_birth"
                        label="Date of Birth"
                        value="{{ old('date_of_birth', $staff->date_of_birth?->format('Y-m-d')) }}"
                    />

                    <flux:input
                        name="phone"
                        label="Phone"
                        value="{{ old('phone', $staff->phone) }}"
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
                        value="{{ old('department', $staff->department) }}"
                    />

                    <flux:input
                        name="designation"
                        label="Designation"
                        value="{{ old('designation', $staff->designation) }}"
                    />

                    <flux:input
                        type="date"
                        name="joining_date"
                        label="Joining Date"
                        value="{{ old('joining_date', $staff->joining_date?->format('Y-m-d')) }}"
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
                    >{{ old('address', $staff->address) }}</flux:textarea>

                </div>

            </div>

            {{-- Buttons --}}
            <div class="mt-8 flex justify-end gap-3 border-t border-zinc-200 pt-6 dark:border-zinc-700">

                <flux:button
                    href="{{ route('staff.show', $staff) }}"
                    variant="ghost"
                >
                    Cancel
                </flux:button>

                <flux:button
                    type="submit"
                    variant="primary"
                >
                    Update Staff
                </flux:button>

            </div>

        </form>

    </div>

</x-layouts.app>