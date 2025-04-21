<x-admin-dashboard-layout>
    <div class="min-h-screen flex flex-col items-center bg-white p-6 sm:p-8 shadow-lg rounded-xl">
        <div class="w-full max-w-6xl mt-6 space-y-8">
            <div class="text-center">
                <h1 class="text-3xl sm:text-4xl font-bold text-gray-800">Enrollment Form Configuration</h1>
            </div>

            <form action="{{ route('updateform') }}" method="POST" class="bg-gray-100 p-6 rounded-lg shadow-md">
                @csrf
                @method('PUT')
            
                @foreach ($enrollments as $enrollment)
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
            
                        <!-- School Year and Grade Level -->
                        <div>
                            <label class="block font-semibold text-lg text-gray-700 mb-2">School Year</label>
                            <input type="text" name="school_year" placeholder="e.g. 2025-2026"
                                   value="{{ old('school_year', $enrollment->school_year) }}"
                                   class="w-full p-3 border border-gray-300 rounded-md">
                        </div>
            
                        <div>
                            <label class="block font-semibold text-lg text-gray-700 mb-2">Grade Level</label>
                            <input type="text" name="grade_level" placeholder="e.g. Grade 11"
                                   value="{{ old('grade_level', $enrollment->grade_level) }}"
                                   class="w-full p-3 border border-gray-300 rounded-md">
                        </div>
            
                        <!-- Enter New Strand -->
                        <div class="col-span-1 sm:col-span-2">
                            <label class="block font-semibold text-lg text-gray-700 mb-2">Enter New Strand Name</label>
                            <input type="text" name="new_strand_name" placeholder="e.g. ICT Strand"
                                   class="w-full p-3 border border-gray-300 rounded-md">
                        </div>
            
                        <!-- Select Existing Track or Enter New Track -->
                        <div class="col-span-1 sm:col-span-2">
                            <label class="block font-semibold text-lg text-gray-700 mb-2">Assign to Track</label>
                            <select name="track_id" class="w-full p-3 border border-gray-300 rounded-md">
                                <option value="">Select Existing Track</option>
                                @foreach ($tracks as $track)
                                    <option value="{{ $track->id }}">{{ $track->name }}</option>
                                @endforeach
                            </select>
                        </div>
            
                        <div class="col-span-1 sm:col-span-2">
                            <label class="block font-semibold text-lg text-gray-700 mb-2">Or Enter a New Track Name</label>
                            <input type="text" name="new_track_name" placeholder="e.g. Academic Track"
                                   class="w-full p-3 border border-gray-300 rounded-md">
                        </div>
                    </div>
            
                    <!-- Hidden Enrollment ID -->
                    <input type="hidden" name="id" value="{{ $enrollment->id }}">
            
                    <div class="flex justify-end mt-6">
                        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-2 rounded-md shadow-md">
                            Save
                        </button>
                    </div>
                @endforeach
            </form>            
            <!-- Display Tracks and Associated Strands -->
            <div class="w-full max-w-6xl mt-12">
                <h2 class="text-2xl font-bold text-gray-800 mb-4">Existing Tracks and Strands</h2>
                <div class="overflow-x-auto">
                    <table class="min-w-full no-border rounded-lg shadow">
                        <thead class="bg-gray-100 text-left">
                            <tr>
                                <th class="px-6 py-3 text-md font-semibold text-gray-700 border-b">TRACK NAME</th>
                                <th class="px-6 py-3 text-md font-semibold text-gray-700 border-b">STRANDS</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($tracks as $track)
                                <tr class="border-b hover:bg-gray-50">
                                    <td class="px-6 py-4 text-gray-800 font-medium">{{ $track->name }}</td>
                                    <td class="px-6 py-4 text-gray-700">
                                        @if ($track->strands->count())
                                            <ul class="list-disc ml-4">
                                                @foreach ($track->strands as $strand)
                                                    <li>{{ $strand->name }}</li>
                                                @endforeach
                                            </ul>
                                        @else
                                            <span class="italic text-gray-400">No strands</span>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="2" class="px-6 py-4 text-center text-gray-500 italic">No tracks found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</x-admin-dashboard-layout>
