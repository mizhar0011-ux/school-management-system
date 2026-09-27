<x-layouts.app>
    <div class="flex h-full w-full flex-1 flex-col gap-6 p-6">

        {{-- Header --}}
        <div>
            <flux:heading size="xl">
                My Teacher Profile
            </flux:heading>

            <flux:subheading>
                View and update your personal and professional information.
            </flux:subheading>
        </div>

        {{-- Success Message --}}
        @if (session('success'))
            <div
                x-data
                x-init="
                    Swal.fire({
                        icon: 'success',
                        title: 'Profile Updated',
                        text: @js(session('success')),
                        timer: 2500,
                        showConfirmButton: false
                    })
                "
            ></div>
        @endif

        {{-- Profile Information --}}
        <div class="grid gap-6 lg:grid-cols-2">

            {{-- Personal Information --}}
            <div class="rounded-xl border border-zinc-200 bg-white p-6 shadow-sm dark:border-zinc-700 dark:bg-zinc-900">

                <flux:heading size="lg">
                    Personal Information
                </flux:heading>

                <form
                    id="teacher-profile-form"
                    action="{{ route('teacher.profile.update') }}"
                    method="POST"
                    class="mt-6 space-y-5"
                >
                    @csrf
                    @method('PUT')

                    <flux:input
                        label="Full Name"
                        name="name"
                        value="{{ old('name', $teacher->name) }}"
                        required
                    />

                    <flux:select
                        label="Gender"
                        name="gender"
                    >
                        <option value="">Select Gender</option>
                        <option value="Male" @selected(old('gender', $teacher->gender) === 'Male')>
                            Male
                        </option>
                        <option value="Female" @selected(old('gender', $teacher->gender) === 'Female')>
                            Female
                        </option>
                    </flux:select>

                    <flux:input
                        label="Date of Birth"
                        type="date"
                        name="date_of_birth"
                        value="{{ old('date_of_birth', optional($teacher->date_of_birth)->format('Y-m-d')) }}"
                    />

                    <flux:input
                        label="Phone"
                        name="phone"
                        value="{{ old('phone', $teacher->phone) }}"
                    />

                    <flux:input
                        label="Address"
                        name="address"
                        value="{{ old('address', $teacher->address) }}"
                    />

                    <flux:button type="submit" variant="primary">
                        Save Changes
                    </flux:button>
                </form>
            </div>

            {{-- Professional Information --}}
            <div class="rounded-xl border border-zinc-200 bg-white p-6 shadow-sm dark:border-zinc-700 dark:bg-zinc-900">

                <flux:heading size="lg">
                    Professional Information
                </flux:heading>

                <div class="mt-6 space-y-5">

                    <flux:input
                        label="Employee Number"
                        value="{{ $teacher->employee_number }}"
                        readonly
                    />

                    <flux:input
                        label="Qualification"
                        name="qualification"
                        value="{{ old('qualification', $teacher->qualification) }}"
                        form="teacher-profile-form"
                    />

                    <flux:input
                        label="Subject"
                        name="subject"
                        value="{{ old('subject', $teacher->subject) }}"
                        form="teacher-profile-form"
                    />

                    <flux:input
                        label="Joining Date"
                        type="date"
                        name="joining_date"
                        value="{{ old('joining_date', optional($teacher->joining_date)->format('Y-m-d')) }}"
                        form="teacher-profile-form"
                    />

                </div>
            </div>
        </div>

        {{-- Account Information --}}
        <div class="rounded-xl border border-zinc-200 bg-white p-6 shadow-sm dark:border-zinc-700 dark:bg-zinc-900">

            <flux:heading size="lg">
                Account Information
            </flux:heading>

            <div class="mt-6 grid gap-5 md:grid-cols-3">

                <flux:input
                    label="Email"
                    value="{{ $teacher->user->email }}"
                    readonly
                />

                <flux:input
                    label="Role"
                    value="Teacher"
                    readonly
                />

                <flux:input
                    label="Account Status"
                    value="{{ ucfirst($teacher->user->status) }}"
                    readonly
                />

            </div>
        </div>

    </div>
</x-layouts.app>