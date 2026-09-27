<x-layouts.app :title="__('Add Teacher')">

    <div class="mx-auto max-w-4xl">

        {{-- Header --}}
        <div class="mb-6">
            <flux:heading size="xl">
                Add Teacher
            </flux:heading>

            <flux:text class="mt-1">
                Create a teacher profile and login account.
            </flux:text>
        </div>

        {{-- Validation Errors --}}
        @if ($errors->any())
            <div class="mb-6 rounded-lg border border-red-200 bg-red-50 p-4 dark:border-red-800 dark:bg-red-900/20">
                <div class="font-semibold text-red-700 dark:text-red-400">
                    Please fix the following errors:
                </div>

                <ul class="mt-2 list-disc pl-5 text-sm text-red-600 dark:text-red-400">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form
            action="{{ route('teachers.store') }}"
            method="POST"
            class="space-y-6"
        >
            @csrf

            {{-- Personal Information --}}
            <div class="rounded-xl border border-zinc-200 bg-white p-6 dark:border-zinc-700 dark:bg-zinc-900">

                <flux:heading size="lg">
                    Personal Information
                </flux:heading>

                <div class="mt-6 grid gap-6 md:grid-cols-2">

                    <flux:input
                        name="name"
                        label="Full Name"
                        placeholder="Enter teacher's full name"
                        value="{{ old('name') }}"
                        required
                    />

                    <flux:input
                        name="employee_number"
                        label="Employee Number"
                        placeholder="e.g. TCH001"
                        value="{{ old('employee_number') }}"
                        required
                    />

                    <flux:select
                        name="gender"
                        label="Gender"
                    >
                        <option value="">Select Gender</option>
                        <option value="Male" @selected(old('gender') === 'Male')>
                            Male
                        </option>
                        <option value="Female" @selected(old('gender') === 'Female')>
                            Female
                        </option>
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

                    <flux:input
                        name="address"
                        label="Address"
                        placeholder="Enter address"
                        value="{{ old('address') }}"
                    />

                </div>

            </div>

            {{-- Professional Information --}}
            <div class="rounded-xl border border-zinc-200 bg-white p-6 dark:border-zinc-700 dark:bg-zinc-900">

                <flux:heading size="lg">
                    Professional Information
                </flux:heading>

                <div class="mt-6 grid gap-6 md:grid-cols-2">

                    <flux:input
                        name="qualification"
                        label="Qualification"
                        placeholder="e.g. BS Mathematics"
                        value="{{ old('qualification') }}"
                    />

                    <flux:input
                        name="subject"
                        label="Subject"
                        placeholder="e.g. Mathematics"
                        value="{{ old('subject') }}"
                    />

                    <flux:input
                        type="date"
                        name="joining_date"
                        label="Joining Date"
                        value="{{ old('joining_date') }}"
                    />

                </div>

            </div>

            {{-- Login Information --}}
            <div class="rounded-xl border border-indigo-200 bg-indigo-50 p-6 dark:border-indigo-800 dark:bg-indigo-900/20">

                <flux:heading size="lg">
                    Login Account
                </flux:heading>

                <flux:text class="mt-2">
                    The teacher's login credentials will be generated automatically.
                </flux:text>

                <div class="mt-4 space-y-2 text-sm">

                    <p>
                        <strong>Email:</strong>
                        Name + Employee Number + @teacher.local
                    </p>

                    <p>
                        <strong>Password:</strong>
                        Name without spaces + 123@
                    </p>

                </div>

            </div>

            {{-- Actions --}}
            <div class="flex items-center justify-end gap-3">

                <flux:button
                    type="button"
                    :href="route('teachers.index')"
                    wire:navigate
                >
                    Cancel
                </flux:button>

                <flux:button
                    type="submit"
                    variant="primary"
                >
                    Create Teacher
                </flux:button>

            </div>

        </form>

    </div>

</x-layouts.app>