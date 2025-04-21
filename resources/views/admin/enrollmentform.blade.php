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
                        <!-- Enrollment Fields -->
                        <div>
                            <label class="block font-semibold text-lg text-gray-700 mb-2">School Year</label>
                            <input type="text" name="school_year" placeholder="e.g. 2025-2026"
                                   value="{{ old('school_year', $enrollment->school_year) }}"
                                   class="w-full p-3 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>

                        <div>
                            <label class="block font-semibold text-lg text-gray-700 mb-2">Grade Level</label>
                            <input type="text" name="grade_level" placeholder="e.g. Grade 11"
                                   value="{{ old('grade_level', $enrollment->grade_level) }}"
                                   class="w-full p-3 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>

                        <!-- Track and Strands Selection -->
                        <div class="col-span-1 sm:col-span-2">
                            <label class="block font-semibold text-lg text-gray-700 mb-2">Select Track</label>
                            <select name="track_id" id="track_id" class="w-full p-3 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-2 focus:ring-blue-500">
                                <option value="" disabled>Select a track</option>
                                @foreach ($tracks as $track)
                                    <option value="{{ $track->id }}" 
                                            @if ($track->id == $enrollment->track_id) selected @endif>
                                        {{ $track->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Option to Create New Track -->
                        <div class="col-span-1 sm:col-span-2 mt-4">
                            <label class="block font-semibold text-lg text-gray-700 mb-2">Or Enter a New Track</label>
                            <input type="text" name="new_track_name" id="new_track_name" placeholder="e.g. New Track Name"
                                   value="{{ old('new_track_name') }}"
                                   class="w-full p-3 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>

                        <div class="col-span-1 sm:col-span-2">
                            <label class="block font-semibold text-lg text-gray-700 mb-2">Select Associated Strands</label>
                            <div class="space-y-2">
                                @foreach ($tracks as $track)
                                    @if ($track->id == $enrollment->track_id)  <!-- Only show strands for the selected track -->
                                        @foreach ($track->strands as $strand)
                                            <label class="flex items-center space-x-2">
                                                <input type="checkbox" name="strand_ids[]" value="{{ $strand->id }}"
                                                       @if(in_array($strand->id, $enrollment->strands->pluck('id')->toArray())) checked @endif>
                                                <span>{{ $strand->name }}</span>
                                            </label>
                                        @endforeach
                                    @endif
                                @endforeach
                            </div>
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
        </div>
    </div>
</x-admin-dashboard-layout>
