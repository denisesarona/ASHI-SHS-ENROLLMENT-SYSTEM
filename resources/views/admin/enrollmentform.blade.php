<x-admin-dashboard-layout>
    <div class="min-h-screen flex flex-col items-center bg-white p-8 shadow-lg rounded-xl">
        <div class="w-full max-w-6xl h-auto mt-6 p-6 bg-gray-100 shadow-md rounded-md">
            <div class="pt-6 text-center mb-10">
                <h1 class="text-4xl font-bold text-gray-800">Admin Settings - Enrollment Configuration</h1>
            </div>

            <form action="" method="POST">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- School Year -->
                    <div>
                        <label class="block font-semibold text-lg text-gray-700 mb-2">School Year</label>
                        <input type="text" name="school_year" placeholder="e.g. 2025-2026"
                               class="w-full p-3 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>

                    <!-- Grade Level -->
                    <div>
                        <label class="block font-semibold text-lg text-gray-700 mb-2">Grade Level Required</label>
                        <input type="text" name="grade_level" placeholder="e.g. Grade 11"
                               class="w-full p-3 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>

                    <!-- Offered Strands -->
                    <div class="col-span-2">
                        <label class="block font-semibold text-lg text-gray-700 mb-2">Offered Strands</label>
                        <input type="text" name="strands" placeholder="e.g. STEM, ABM, HUMSS"
                               class="w-full p-3 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                </div>

                <button type="submit"
                        class="mt-6 bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-3 rounded-md shadow-md">
                    Save Settings
                </button>
            </form>
        </div>
    </div>
</x-admin-dashboard-layout>
