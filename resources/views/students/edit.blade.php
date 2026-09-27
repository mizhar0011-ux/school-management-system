<x-layouts.app>

<div class="mx-auto w-full max-w-5xl space-y-6">



    {{-- Header --}}
    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">

        <div>
            <p class="text-sm font-medium text-indigo-600 dark:text-indigo-400">
                Horizon Academy
            </p>

            <h1 class="mt-1 text-2xl font-bold text-slate-900 dark:text-white">
                Edit Student
            </h1>

            <p class="mt-2 text-sm text-slate-500 dark:text-neutral-400">
                Update the student's personal and academic information.
            </p>
        </div>

        <a
            href="{{ route('students.show', $student) }}"
            class="inline-flex items-center justify-center rounded-xl border border-slate-300 px-5 py-2.5 text-sm font-medium text-slate-700 transition hover:bg-indigo-700 dark:border-neutral-700 dark:text-neutral-300 dark:hover:bg-neutral-800"
        >
            ← Back to Profile
        </a>

    </div>

    {{-- Validation Errors --}}
    @if ($errors->any())
        <div class="rounded-xl border border-red-200 bg-red-50 p-4 dark:border-red-900 dark:bg-red-950/30">

            <p class="font-semibold text-red-700 dark:text-red-400">
                Please correct the following errors:
            </p>

            <ul class="mt-2 list-inside list-disc text-sm text-red-600 dark:text-red-400">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>

        </div>
    @endif

    {{-- Edit Form --}}
    <form
        method="POST"
        action="{{ route('students.update', $student) }}"
        class="space-y-6"
    >

        @csrf
        @method('PUT')

        {{-- Personal Information --}}
        <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm dark:border-neutral-700 dark:bg-neutral-900">

            <div class="mb-6">
                <h2 class="text-lg font-bold text-slate-900 dark:text-white">
                    Personal Information
                </h2>

                <p class="mt-1 text-sm text-slate-500 dark:text-neutral-400">
                    Update the student's basic personal details.
                </p>
            </div>

            <div class="grid gap-5 md:grid-cols-2">

                {{-- Name --}}
                <div>
                    <label
                        for="name"
                        class="mb-2 block text-sm font-medium text-slate-700 dark:text-neutral-300"
                    >
                        Full Name
                    </label>

                    <input
                        id="name"
                        name="name"
                        type="text"
                        value="{{ old('name', $student->name) }}"
                        required
                        class="w-full rounded-xl border border-slate-300 bg-white px-4 py-2.5 text-sm text-slate-900 outline-none transition focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/20 dark:border-neutral-700 dark:bg-neutral-950 dark:text-white"
                    >
                </div>

                {{-- Admission Number --}}
                <div>
                    <label
                        for="admission_number"
                        class="mb-2 block text-sm font-medium text-slate-700 dark:text-neutral-300"
                    >
                        Admission Number
                    </label>

                    <input
                        id="admission_number"
                        name="admission_number"
                        type="text"
                        value="{{ old('admission_number', $student->admission_number) }}"
                        required
                        class="w-full rounded-xl border border-slate-300 bg-white px-4 py-2.5 text-sm text-slate-900 outline-none transition focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/20 dark:border-neutral-700 dark:bg-neutral-950 dark:text-white"
                    >
                </div>

                {{-- Gender --}}
                <div>
                    <label
                        for="gender"
                        class="mb-2 block text-sm font-medium text-slate-700 dark:text-neutral-300"
                    >
                        Gender
                    </label>

                    <select
                        id="gender"
                        name="gender"
                        class="w-full rounded-xl border border-slate-300 bg-white px-4 py-2.5 text-sm text-slate-900 outline-none transition focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/20 dark:border-neutral-700 dark:bg-neutral-950 dark:text-white"
                    >

                        <option value="">Select Gender</option>

                        @if (old('gender', $student->gender) === 'Male')
                            <option value="Male" selected>Male</option>
                        @else
                            <option value="Male">Male</option>
                        @endif

                        @if (old('gender', $student->gender) === 'Female')
                            <option value="Female" selected>Female</option>
                        @else
                            <option value="Female">Female</option>
                        @endif

                    </select>
                </div>

                {{-- Date of Birth --}}
                <div>
                    <label
                        for="date_of_birth"
                        class="mb-2 block text-sm font-medium text-slate-700 dark:text-neutral-300"
                    >
                        Date of Birth
                    </label>

                    <input
                        id="date_of_birth"
                        name="date_of_birth"
                        type="date"
                        value="{{ old('date_of_birth', optional($student->date_of_birth)->format('Y-m-d')) }}"
                        class="w-full rounded-xl border border-slate-300 bg-white px-4 py-2.5 text-sm text-slate-900 outline-none transition focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/20 dark:border-neutral-700 dark:bg-neutral-950 dark:text-white"
                    >
                </div>

                {{-- Phone --}}
                <div>
                    <label
                        for="phone"
                        class="mb-2 block text-sm font-medium text-slate-700 dark:text-neutral-300"
                    >
                        Phone Number
                    </label>

                    <input
                        id="phone"
                        name="phone"
                        type="text"
                        value="{{ old('phone', $student->phone) }}"
                        placeholder="03XX-XXXXXXX"
                        class="w-full rounded-xl border border-slate-300 bg-white px-4 py-2.5 text-sm text-slate-900 outline-none transition focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/20 dark:border-neutral-700 dark:bg-neutral-950 dark:text-white"
                    >
                </div>

            </div>

        </div>

        {{-- Academic Information --}}
        <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm dark:border-neutral-700 dark:bg-neutral-900">

            <div class="mb-6">
                <h2 class="text-lg font-bold text-slate-900 dark:text-white">
                    Academic Information
                </h2>

                <p class="mt-1 text-sm text-slate-500 dark:text-neutral-400">
                    Update the student's academic information.
                </p>
            </div>

            <div class="grid gap-5 md:grid-cols-2">

                {{-- Class --}}
                <div>
                    <label
                        for="class_name"
                        class="mb-2 block text-sm font-medium text-slate-700 dark:text-neutral-300"
                    >
                        Class
                    </label>

                    <input
                        id="class_name"
                        name="class_name"
                        type="text"
                        value="{{ old('class_name', $student->class_name) }}"
                        placeholder="e.g. Grade 10"
                        class="w-full rounded-xl border border-slate-300 bg-white px-4 py-2.5 text-sm text-slate-900 outline-none transition focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/20 dark:border-neutral-700 dark:bg-neutral-950 dark:text-white"
                    >
                </div>

                {{-- Section --}}
                <div>
                    <label
                        for="section"
                        class="mb-2 block text-sm font-medium text-slate-700 dark:text-neutral-300"
                    >
                        Section
                    </label>

                    <input
                        id="section"
                        name="section"
                        type="text"
                        value="{{ old('section', $student->section) }}"
                        placeholder="e.g. A"
                        class="w-full rounded-xl border border-slate-300 bg-white px-4 py-2.5 text-sm text-slate-900 outline-none transition focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/20 dark:border-neutral-700 dark:bg-neutral-950 dark:text-white"
                    >
                </div>

            </div>

        </div>

        {{-- Guardian Information --}}
        <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm dark:border-neutral-700 dark:bg-neutral-900">

            <div class="mb-6">
                <h2 class="text-lg font-bold text-slate-900 dark:text-white">
                    Guardian Information
                </h2>

                <p class="mt-1 text-sm text-slate-500 dark:text-neutral-400">
                    Update the parent or guardian information.
                </p>
            </div>

            <div class="grid gap-5 md:grid-cols-2">

                {{-- Guardian Name --}}
                <div>
                    <label
                        for="guardian_name"
                        class="mb-2 block text-sm font-medium text-slate-700 dark:text-neutral-300"
                    >
                        Guardian Name
                    </label>

                    <input
                        id="guardian_name"
                        name="guardian_name"
                        type="text"
                        value="{{ old('guardian_name', $student->guardian_name) }}"
                        placeholder="Parent or guardian name"
                        class="w-full rounded-xl border border-slate-300 bg-white px-4 py-2.5 text-sm text-slate-900 outline-none transition focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/20 dark:border-neutral-700 dark:bg-neutral-950 dark:text-white"
                    >
                </div>

                {{-- Guardian Phone --}}
                <div>
                    <label
                        for="guardian_phone"
                        class="mb-2 block text-sm font-medium text-slate-700 dark:text-neutral-300"
                    >
                        Guardian Phone
                    </label>

                    <input
                        id="guardian_phone"
                        name="guardian_phone"
                        type="text"
                        value="{{ old('guardian_phone', $student->guardian_phone) }}"
                        placeholder="03XX-XXXXXXX"
                        class="w-full rounded-xl border border-slate-300 bg-white px-4 py-2.5 text-sm text-slate-900 outline-none transition focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/20 dark:border-neutral-700 dark:bg-neutral-950 dark:text-white"
                    >
                </div>

            </div>

        </div>

        {{-- Address --}}
        <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm dark:border-neutral-700 dark:bg-neutral-900">

            <div class="mb-6">
                <h2 class="text-lg font-bold text-slate-900 dark:text-white">
                    Address
                </h2>

                <p class="mt-1 text-sm text-slate-500 dark:text-neutral-400">
                    Update the student's residential address.
                </p>
            </div>

            <textarea
                id="address"
                name="address"
                rows="4"
                placeholder="Enter complete address"
                class="w-full resize-none rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm text-slate-900 outline-none transition focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/20 dark:border-neutral-700 dark:bg-neutral-950 dark:text-white"
            >{{ old('address', $student->address) }}</textarea>

        </div>

        {{-- Actions --}}
        <div class="flex items-center justify-end gap-3">

            <a
                href="{{ route('students.show', $student) }}"
                class="rounded-xl border border-slate-300 px-5 py-2.5 text-sm font-medium text-slate-700 transition hover:bg-slate-100 dark:border-neutral-700 dark:text-neutral-300 dark:hover:bg-neutral-800"
            >
                Cancel
            </a>

            <button
                type="submit"
                class="rounded-xl bg-indigo-600 px-5 py-2.5 text-sm font-semibold text-black shadow-sm transition hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-neutral-900"
            >
                Save Changes
            </button>

        </div>

    </form>

</div>

</x-layouts.app>
