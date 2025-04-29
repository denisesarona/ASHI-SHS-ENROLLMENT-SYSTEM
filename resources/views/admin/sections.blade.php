<x-admin-dashboard-layout>
    <div class="min-h-screen flex flex-col items-center bg-white p-6 sm:p-8 shadow-lg rounded-xl">
        <div class="w-full max-w-6xl mt-6 space-y-8">
            <div class="pt-4">
                <h1 class="text-4xl font-bold text-center mb-6">Add New Section</h1>
            </div>
            <div class="bg-gray-100 p-6 rounded-lg shadow-md">
                <form action="{{ route('createsection') }}" method="POST" class="w-full max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-4">
                    @csrf
                    <!-- Section Name on Left -->
                    <div class="mb-4">
                        <label for="name" class="block text-lg font-bold text-gray-700">Section Name</label>
                        <input type="text" id="name" name="name" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 mt-2" />
                    </div>

                    <!-- Strands on Right -->
                    <div class="mb-6">
                        <label class="block text-lg font-bold text-gray-700 mb-2">Assign Strands</label>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            @foreach($strands as $strand)
                                <div class="flex items-center">
                                    <input 
                                        id="strand-{{ $strand->id }}" 
                                        type="checkbox" 
                                        name="strands[]" 
                                        value="{{ $strand->id }}"
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2"
                                    >
                                    <label for="strand-{{ $strand->id }}" class="ml-2 text-sm text-gray-700">{{ $strand->name }}</label>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Submit Button on Left -->
                    <div class="flex justify-start">
                        <button type="submit" class="px-4 py-2 bg-blue-500 font-bold text-white rounded-lg">ADD SECTION</button>
                    </div>
                </form>
            </div>

            <div class="pt-4">
                <h1 class="text-4xl font-bold text-center mb-6">View Sections</h1>
            </div>
            <div class="bg-gray-100 p-6 rounded-lg shadow-md">
                <table class="min-w-full table-auto text-left">
                    <thead class="bg-gray-100 text-md text-gray-600 text-center">
                        <tr>
                            <th class="px-4 py-2">SECTION NAME</th>
                            <th class="px-4 py-2">STRANDS/SPECIALIZATON</th>
                            <th class="px-4 py-2">NO. OF STUDENTS SY 
                                @foreach($enrollments as $enrollment)
                                    {{ $enrollment->school_year }}
                                @endforeach
                            </th>
                            <th class="px-4 py-2 hidden md:table-cell">EDIT STRANDS/SPECIALIZATION</th>
                            <th class="px-4 py-2 hidden md:table-cell">DELETE</th>
                        </tr>
                    </thead>
                    <tbody class="text-sm text-gray-700 text-center">
                        @foreach($sections as $section)
                            <tr class="border-b">
                                <td class="px-4 py-2">{{ $section->name }}</td>
                                <td class="px-4 py-2">
                                    @if($section->strands->count() > 0)
                                        <ul>
                                            @foreach($section->strands as $strand)
                                                <li>{{ $strand->name }}</li>
                                            @endforeach
                                        </ul>
                                    @else
                                        <span class="text-gray-400 italic">No strands assigned</span>
                                    @endif
                                </td>
                                <td class="px-4 py-2">{{$section->learners_count}}</td>

                                <!-- Edit Strands Button and Modal -->
                                <td class="px-4 py-2 hidden md:table-cell">
                                    <button data-modal-target="edit-strand-modal-{{ $section->id }}" data-modal-toggle="edit-strand-modal-{{ $section->id }}" 
                                        class="text-white bg-green-600 hover:bg-green-700 focus:ring-4 focus:outline-none focus:ring-green-300 font-bold rounded-lg text-sm px-5 py-2.5 text-center">
                                        EDIT STRANDS/SPECIALIZATION
                                    </button>
                                    <!-- Edit Strands Modal -->
                                    <div id="edit-strand-modal-{{ $section->id }}" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                        <div class="relative p-4 w-full max-w-md max-h-full">
                                            <div class="relative bg-white rounded-lg shadow dark:bg-white-700">
                                                <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center" data-modal-hide="edit-strand-modal-{{ $section->id }}">
                                                    <svg class="w-3 h-3" aria-hidden="true" fill="none" viewBox="0 0 14 14">
                                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                                    </svg>
                                                    <span class="sr-only">Close modal</span>
                                                </button>
                                                <div class="p-6">
                                                    <h3 class="text-lg font-bold mb-4 text-gray-800">Edit Strands for {{ $section->name }}</h3>
                                                    <form action="{{ route('updatestrandsection', ['id' => $section->id]) }}" method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-4">
                                                            @foreach($strands as $strand)
                                                                <div class="flex items-center">
                                                                    <input 
                                                                        id="edit-strand-{{ $section->id }}-{{ $strand->id }}" 
                                                                        type="checkbox" 
                                                                        name="strands[]" 
                                                                        value="{{ $strand->id }}"
                                                                        {{ $section->strands->contains($strand->id) ? 'checked' : '' }}
                                                                        class="w-4 h-4 text-green-600 bg-gray-100 border-gray-300 rounded focus:ring-green-500 focus:ring-2"
                                                                    >
                                                                    <label for="edit-strand-{{ $section->id }}-{{ $strand->id }}" class="ml-2 text-sm text-gray-700">{{ $strand->name }}</label>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                        <div class="flex justify-end">
                                                            <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700">
                                                                Save Changes
                                                            </button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>

                                <!-- Delete Button and Modal -->
                                <td class="px-4 py-2 hidden md:table-cell">
                                    <button data-modal-target="popup-modal-{{ $section->id }}" data-modal-toggle="popup-modal-{{ $section->id }}" 
                                        class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-bold rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                                        REMOVE
                                    </button>
                                    <!-- Delete Confirmation Modal -->
                                    <div id="popup-modal-{{ $section->id }}" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                        <div class="relative p-4 w-full max-w-md max-h-full">
                                            <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
                                                <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center" data-modal-hide="popup-modal-{{ $section->id }}">
                                                    <svg class="w-3 h-3" aria-hidden="true" fill="none" viewBox="0 0 14 14">
                                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                                    </svg>
                                                    <span class="sr-only">Close modal</span>
                                                </button>
                                                <div class="p-6 text-center">
                                                    <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                                    </svg>
                                                    <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to remove this section?</h3>
                                                    <div class="flex flex-col sm:flex-row justify-center items-center gap-4">
                                                        <form action="{{ route('removesection', ['id' => $section->id]) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button data-modal-hide="popup-modal-{{ $section->id }}" type="submit"
                                                                class="w-full sm:w-auto text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                                                                Yes, I'm sure
                                                            </button>
                                                        </form>
                                                        <button data-modal-hide="popup-modal-{{ $section->id }}" type="button"
                                                            class="w-full sm:w-auto py-2.5 px-5 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700">
                                                            No, cancel
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-admin-dashboard-layout>
