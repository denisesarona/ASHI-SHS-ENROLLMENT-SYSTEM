<x-admin-dashboard-layout>
    <div class="min-h-screen flex flex-col items-center bg-white p-6 sm:p-8 shadow-lg rounded-xl">
        <div class="w-full max-w-6xl mt-6 space-y-8">
            <div class="text-center">
                <h1 class="text-3xl sm:text-4xl font-bold text-gray-800">Enrollment Form Configuration</h1>
            </div>

            <div class="bg-white p-5 mt-4 rounded-xl">
                @foreach ($enrollments as $enrollment)
                    <div class="flex items-center justify-between mb-3">
                        <h3 class="text-xl font-semibold text-gray-700">
                            Save School Year {{ $enrollment->school_year }} data?
                        </h3>
                        <form action="{{ route('savesydata') }}" method="POST">
                            @csrf
                            <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2 px-4 rounded-lg shadow-md">
                                Save School Year Data
                            </button>
                        </form>
                    </div>
                @endforeach
            </div>
            
            <form action="{{ url('/admin/upload-form') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="file" name="form" required>
                <button type="submit">Upload PDF Form</button>
            </form>

            

            <form action="{{ route('updatesy') }}" method="POST" class="bg-gray-100 p-6 rounded-lg shadow-md">
                @csrf
                @method('PUT')
                @foreach ($enrollments as $enrollment)
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div>
                            <label class="block font-semibold text-lg text-gray-700 mb-2">School Year</label>
                            <input type="text" name="school_year" value="{{ old('school_year', $enrollment->school_year) }}" class="w-full p-3 border border-gray-300 rounded-md" placeholder="e.g. 2025-2026">
                        </div>
                        <div>
                            <label class="block font-semibold text-lg text-gray-700 mb-2">Grade Level</label>
                            <input type="text" name="grade_level" value="{{ old('grade_level', $enrollment->grade_level) }}" class="w-full p-3 border border-gray-300 rounded-md" placeholder="e.g. Grade 11">
                        </div>
                    </div>
                    <input type="hidden" name="id" value="{{ $enrollment->id }}">
                @endforeach
                <div class="flex justify-end mt-6">
                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-2 rounded-md shadow-md">Save</button>
                </div>
            </form>

            <div class="bg-gray-100 p-6 rounded-lg shadow-md">
                <h2 class="text-2xl font-bold text-gray-800 mb-4 text-center">Learner's Category Configuration</h2>
                <form action="{{ route('updatecategory') }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div class="col-span-1 sm:col-span-2">
                            <label class="block font-semibold text-lg text-gray-700 mb-2">Category Name</label>
                            <input type="text" name="name" class="w-full p-3 border border-gray-300 rounded-md" placeholder="e.g. Repeater">
                        </div>
                        <div class="col-span-1 sm:col-span-2">
                            <label class="block font-semibold text-lg text-gray-700 mb-2">Category's Description</label>
                            <input type="text" name="description" class="w-full p-3 border border-gray-300 rounded-md" placeholder="e.g. Previously enrolled in G11 but didn't finish.">
                        </div>
                    </div>
                    <div class="flex justify-end mt-6">
                        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-2 rounded-md shadow-md">Save</button>
                    </div>
                </form>

                <div class="bg-white p-5 mt-4 rounded-1xl">
                    <h3 class="text-xl font-semibold text-gray-700 mb-3">Existing Categories</h3>
                    <div class="overflow-x-auto">
                        <table class="min-w-full rounded-lg shadow">
                            <thead class="bg-blue-100 text-left">
                                <tr>
                                    <th class="px-6 py-3 text-md font-semibold text-gray-700 border-b">CATEGORY NAME</th>
                                    <th class="px-14 py-3 text-md font-semibold text-gray-700 border-b">DESCRIPTION</th>
                                    <th class="px-6 py-3 text-md font-semibold text-gray-700 border-b hidden md:table-cell">DELETE</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white">
                                @forelse ($categories as $category)
                                    <tr class="border-b">
                                        <td class="px-6 py-4 text-gray-800 font-medium flex justify-between">
                                            {{ $category->name }}
                                        </td>
                                        <td class="px-14 py-4">{{ $category->description }}</td>

                                        <td class="px-6 py-4 hidden md:table-cell">
                                            <button data-modal-target="delete-category-{{ $category->id }}" data-modal-toggle="delete-category-{{ $category->id }}" class="bg-red-600 hover:bg-red-700 text-white font-semibold px-6 py-1 rounded-md shadow-md">Delete</button>
                                            <div id="delete-category-{{ $category->id }}" tabindex="-1" class="hidden fixed top-0 left-0 right-0 z-50 justify-center items-center w-full h-full bg-black bg-opacity-50">
                                                <div class="bg-white p-6 text-center rounded-lg shadow-lg max-w-md w-full">
                                                    <h3 class="text-lg font-semibold mb-8">Are you sure you want to delete this category?</h3>
                                                    <form action="{{ route('removecategory', ['id' => $category->id]) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <div class="flex justify-end gap-4">
                                                            <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg">Yes</button>
                                                            <button type="button" data-modal-hide="delete-category-{{ $category->id }}" class="bg-gray-200 hover:bg-gray-300 px-4 py-2 rounded-lg">Cancel</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr><td colspan="3" class="px-6 py-4 text-center text-gray-500">No categories available.</td></tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="bg-gray-100 p-6 rounded-lg shadow-md">
                <h2 class="text-2xl font-bold text-gray-800 mb-4 text-center">Strand and Specilization Configuration</h2>
                <form action="{{ route('updatetrackstrand') }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div class="col-span-1 sm:col-span-2">
                            <label class="block font-semibold text-lg text-gray-700 mb-2">Strand Name</label>
                            <input type="text" name="new_track_name" class="w-full p-3 border border-gray-300 rounded-md" placeholder="e.g. ICT">
                        </div>
                        <div class="col-span-1 sm:col-span-2">
                            <label class="block font-semibold text-lg text-gray-700 mb-2">Specialization Name</label>
                            <input type="text" name="new_strand_name" class="w-full p-3 border border-gray-300 rounded-md" placeholder="e.g. Computer Systems Servicing">
                        </div>
                        <div class="col-span-1 sm:col-span-2">
                            <label class="block font-semibold text-lg text-gray-700 mb-2">Assign to Specialization</label>
                            <select name="track_id" class="w-full p-3 border border-gray-300 rounded-md">
                                <option value="">Select Existing Strand</option>
                                @foreach ($tracks as $track)
                                    <option value="{{ $track->id }}">{{ $track->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        
                    </div>
                    <input type="hidden" name="id" value="{{ $enrollment->id }}">
                    <div class="flex justify-end mt-6">
                        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-2 rounded-md shadow-md">Save</button>
                    </div>
                </form>

                <div class="bg-white p-5 mt-4 rounded-1xl">
                    <h3 class="text-xl font-semibold text-gray-700 mb-3">Existing Strands and Specialization</h3>
                    <div class="overflow-x-auto">
                        <table class="min-w-full rounded-lg shadow">
                            <thead class="bg-blue-100 text-left">
                                <tr>
                                    <th class="px-6 py-3 text-md font-semibold text-gray-700 border-b">STRAND NAME</th>
                                    <th class="px-6 py-3 text-md font-semibold text-gray-700 border-b">SPECIALIZATIONS</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white">
                                @forelse ($tracks as $track)
                                    <tr class="border-b">
                                        <td class="px-6 py-4 text-gray-800 font-medium flex justify-between">
                                            {{ $track->name }}
                                            <button data-modal-target="delete-track-{{ $track->id }}" data-modal-toggle="delete-track-{{ $track->id }}" class="text-red-400 hover:text-red-600 text-xs ml-2">Delete</button>
                                            <div id="delete-track-{{ $track->id }}" tabindex="-1" class="hidden fixed top-0 left-0 right-0 z-50 justify-center items-center w-full h-full bg-black bg-opacity-50">
                                                <div class="bg-white p-6 text-center rounded-lg shadow-lg max-w-md w-full">
                                                    <h3 class="text-lg font-semibold mb-8">Are you sure you want to delete this track and its strands?</h3>
                                                    <form action="{{ route('removetrack', ['id' => $track->id]) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <div class="flex justify-end gap-4">
                                                            <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg">Yes</button>
                                                            <button type="button" data-modal-hide="delete-track-{{ $track->id }}" class="bg-gray-200 hover:bg-gray-300 px-4 py-2 rounded-lg">Cancel</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4">
                                            <ul class="space-y-2">
                                                @foreach ($track->strands as $strand)
                                                    <li class="flex items-center justify-between">
                                                        {{ $strand->name }}
                                                        <button data-modal-target="delete-strand-{{ $strand->id }}" data-modal-toggle="delete-strand-{{ $strand->id }}" class="text-red-500 hover:text-red-700 text-xs ml-2">Delete</button>
                                                        <div id="delete-strand-{{ $strand->id }}" tabindex="-1" class="hidden fixed top-0 left-0 right-0 z-50 justify-center items-center w-full h-full bg-black bg-opacity-50">
                                                            <div class="bg-white p-6 text-center rounded-lg shadow-lg max-w-md w-full">
                                                                <h3 class="text-lg font-semibold mb-8">Are you sure you want to delete this strand?</h3>
                                                                <form action="{{ route('removestrand', ['id' => $strand->id]) }}" method="POST">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <div class="flex justify-end gap-4">
                                                                        <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg">Yes</button>
                                                                        <button type="button" data-modal-hide="delete-strand-{{ $strand->id }}" class="bg-gray-200 hover:bg-gray-300 px-4 py-2 rounded-lg">Cancel</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="px-6 py-4 text-center text-gray-500">No tracks and strands available.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-dashboard-layout>
