<x-layouts.app :title="'Add Student'"> <div class="space-y-8">

    {{-- Header --}}
    <div>
        <p class="text-sm font-semibold uppercase tracking-widest text-indigo-600">
            Student Management
        </p>

        <h1 class="mt-2 text-3xl font-bold tracking-tight text-slate-950 dark:text-white">
            Add Student
        </h1>

        <p class="mt-2 text-sm text-slate-500 dark:text-slate-400">
            Add a new student to the school records.
        </p>
    </div>

    {{-- Form --}}
    <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm dark:border-slate-800 dark:bg-slate-900">

        <form method="POST" action="{{ route('students.store') }}" class="space-y-6">
            @csrf

            {{-- Student Information --}}
            <div>
                <h2 class="text-lg font-semibold text-slate-950 dark:text-white">
                    Student Information
                </h2>

                <p class="mt-1 text-sm text-slate-500 dark:text-slate-400">
                    Enter the student's basic information.
                </p>
            </div>

            <div class="grid gap-6 md:grid-cols-2">

                {{-- Admission Number --}}
                <div>
                    <label for="admission_number"
                           class="mb-2 block text-sm font-medium text-slate-700 dark:text-slate-300">
                        Admission Number
                    </label>

                    <input
                        id="admission_number"
                        name="admission_number"
                        type="text"
                        value="{{ old('admission_number') }}"
                        required
                        class="w-full rounded-xl border border-slate-300 px-4 py-3 text-sm outline-none transition focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/20 dark:border-slate-700 dark:bg-slate-800 dark:text-white"
                        placeholder="e.g. STU-2026-001"
                    >

                    @error('admission_number')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Name --}}
                <div>
                    <label for="name"
                           class="mb-2 block text-sm font-medium text-slate-700 dark:text-slate-300">
                        Student Name
                    </label>

                    <input
                        id="name"
                        name="name"
                        type="text"
                        value="{{ old('name') }}"
                        required
                        class="w-full rounded-xl border border-slate-300 px-4 py-3 text-sm outline-none transition focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/20 dark:border-slate-700 dark:bg-slate-800 dark:text-white"
                        placeholder="Enter student name"
                    >

                    @error('name')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Guardian --}}
                <div>
                    <label for="guardian_name"
                           class="mb-2 block text-sm font-medium text-slate-700 dark:text-slate-300">
                        Guardian Name
                    </label>
                    
                    <input
                        id="guardian_name"
                        name="guardian_name"
                        type="text"
                        value="{{ old('guardian_name') }}"
                        required
                        class="w-full rounded-xl border border-slate-300 px-4 py-3 text-sm outline-none transition focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/20 dark:border-slate-700 dark:bg-slate-800 dark:text-white"
                        placeholder="Enter guardian name"
                    >

                    <div>
                        <label for="guardian_phone" class="block text-sm font-medium text-gray-700">
                            Guardian Phone
                        </label>
                        

                        <input
                            type="text"
                            id="guardian_phone"
                            name="guardian_phone"
                            value="{{ old('guardian_phone') }}"
                            class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                            placeholder="03XX-XXXXXXX"
                        >

                        @error('guardian_phone')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>


                    @error('guardian_name')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Class --}}
                <div>
                    <label for="class_name"
                           class="mb-2 block text-sm font-medium text-slate-700 dark:text-slate-300">
                        Class
                    </label>

                    <input
                        id="class_name"
                        name="class_name"
                        type="text"
                        value="{{ old('class_name') }}"
                        required
                        class="w-full rounded-xl border border-slate-300 px-4 py-3 text-sm outline-none transition focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/20 dark:border-slate-700 dark:bg-slate-800 dark:text-white"
                        placeholder="e.g. Grade 8"
                    >

                    @error('class_name')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Section --}}
                <div>
                    <label for="section"
                           class="mb-2 block text-sm font-medium text-slate-700 dark:text-slate-300">
                        Section
                    </label>

                    <input
                        id="section"
                        name="section"
                        type="text"
                        value="{{ old('section') }}"
                        required
                        class="w-full rounded-xl border border-slate-300 px-4 py-3 text-sm outline-none transition focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/20 dark:border-slate-700 dark:bg-slate-800 dark:text-white"
                        placeholder="e.g. A"
                    >

                    @error('section')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Gender --}}
                <div>
                    <label for="gender"
                           class="mb-2 block text-sm font-medium text-slate-700 dark:text-slate-300">
                        Gender
                    </label>

                    <select
                        id="gender"
                        name="gender"
                        required
                        class="w-full rounded-xl border border-slate-300 px-4 py-3 text-sm outline-none transition focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/20 dark:border-slate-700 dark:bg-slate-800 dark:text-white"
                    >
                        <option value="">Select gender</option>
                        <option value="Male" @selected(old('gender') === 'Male')>Male</option>
                        <option value="Female" @selected(old('gender') === 'Female')>Female</option>
                        <option value="Other" @selected(old('gender') === 'Other')>Other</option>
                    </select>

                    @error('gender')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

            </div>

            {{-- Buttons --}}
            <div class="flex items-center justify-end gap-3 border-t border-slate-200 pt-6 dark:border-slate-800">

                <a
                    href="{{ route('students.index') }}"
                    class="rounded-xl border border-slate-300 px-5 py-3 text-sm font-semibold text-slate-700 transition hover:bg-slate-50 dark:border-slate-700 dark:text-slate-300 dark:hover:bg-slate-800"
                >
                    Cancel
                </a>

                <button
                    type="submit"
                    class="rounded-xl bg-slate-950 px-5 py-3 text-sm font-semibold text-white shadow-lg transition hover:bg-indigo-700"
                >
                    Save Student
                </button>

            </div>

        </form>

    </div>

</div>


</x-layouts.app>
