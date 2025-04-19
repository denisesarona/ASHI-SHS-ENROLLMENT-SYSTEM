<x-admin-dashboard-layout>
    <div class="min-h-screen flex flex-col items-center bg-white p-6 sm:p-8 shadow-lg rounded-xl">
        <div class="w-full max-w-6xl mt-6 space-y-8">
            <div class="text-center">
                <h1 class="text-3xl sm:text-4xl font-bold text-gray-800">Enrollment Form Configuration</h1>
            </div>

            @foreach ($enrollments as $enrollment)
                <form action="{{ route('updateform')}}" method="POST"
                      class="bg-gray-100 p-6 rounded-lg shadow-md">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div>
                            <label class="block font-semibold text-lg text-gray-700 mb-2">School Year</label>
                            <input type="text" name="school_year" placeholder="e.g. 2025-2026"
                                   value="{{ $enrollment->school_year }}"
                                   class="w-full p-3 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>

                        <div>
                            <label class="block font-semibold text-lg text-gray-700 mb-2">Grade Level</label>
                            <input type="text" name="grade_level" placeholder="e.g. Grade 11"
                                   value="{{ $enrollment->grade_level}}"
                                   class="w-full p-3 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>

                        <div class="col-span-1 sm:col-span-2">
                            <label class="block font-semibold text-lg text-gray-700 mb-2">Offered Strands</label>
                            <input type="text" name="strands" placeholder="e.g. STEM, ABM, HUMSS"
                                   value="{{ old('strands', $enrollment->strands) }}"
                                   class="w-full p-3 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>
                    </div>

                    <input type="hidden" name="id" value="{{ $enrollment->id }}">
                    <div class="flex justify-end mt-6">
                        <button type="submit"
                                class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-2 rounded-md shadow-md">
                            Save
                        </button>
                    </div>
                </form>
            @endforeach
        </div>
    </div>
</x-admin-dashboard-layout>
