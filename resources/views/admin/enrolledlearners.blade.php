<x-admin-dashboard-layout>
    <div class="min-h-screen flex flex-col items-center bg-white p-3 shadow-lg rounded-xl">
        <div class="pt-8">
            @foreach ($enrollments as $enrollment)
                <h1 class="text-4xl font-bold text-center">ENROLLED LEARNERS SY {{ $enrollment->school_year}}</h1>
            @endforeach
        </div>
        <div class="w-full mt-4">
            <div class="flex flex-col md:flex-row md:items-end md:justify-between gap-4">
                {{-- Filter Form --}}
                <form action="{{ route('admin.filter.section') }}" method="POST" class="flex flex-col md:flex-row flex-wrap gap-4 flex-grow">
                    @csrf
        
                    @php
                        $schoolYears = $enrollments->pluck('school_year')->unique();
                        $sectionsLearner = $sections->pluck('name')->unique();
                    @endphp
        
                    {{-- School Year --}}
                    <div class="flex-1 min-w-[180px]">
                        <label class="block text-sm font-medium text-gray-700 mb-1">School Year</label>
                        <select name="school_year" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                            @foreach ($schoolYears as $year)
                                <option value="{{ $year }}">{{ $year }}</option>
                            @endforeach
                        </select>
                    </div>
        
                    {{-- Section --}}
                    <div class="flex-1 min-w-[180px]">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Section</label>
                        <select name="section" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                            @foreach ($sectionsLearner as $section)
                                <option value="{{ $section }}">{{ $section }}</option>
                            @endforeach
                        </select>
                    </div>
        
                    {{-- Filter Button --}}
                    <div class="flex items-end min-w-[120px]">
                        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 w-full md:w-auto">
                            Filter
                        </button>
                    </div>
                </form>
        
                {{-- Auto Assign Button --}}
                <form action="{{ route('auto.assign.sections') }}" method="POST" class="flex-shrink-0">
                    @csrf
                    <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2 px-4 rounded-lg shadow-md w-full md:w-auto">
                        Auto-Assign Learners to Sections
                    </button>
                </form>
            </div>
        </div>
        
        <div class="w-full overflow-x-auto mt-8">
            <table class="w-full text-center">
                <thead>
                    <tr class="text-gray-600 text-lg font-semibold whitespace-nowrap">
                        <th class="px-8 py-2 hidden md:table-cell">LRN</th>
                        <th class="px-8 py-2">FULL NAME</th>
                        <th class="px-8 py-2 hidden md:table-cell">GRADE LEVEL</th>
                        <th class="px-8 py-2 hidden md:table-cell">STATUS</th>
                        <th class="px-8 py-2 hidden md:table-cell">SECTION</th>
                        <th class="px-5 py-2 hidden md:table-cell">EDIT SECTION</th>
                        <th class="px-6 py-2">VIEW DETAILS</th>
                        <th class="px-6 py-2 hidden md:table-cell">REMOVE</th>
                    </tr>
                </thead>                
                <tbody>
                    @foreach ($learners as $learner)
                        @if ($learner->status == 'enrolled')
                    <tr class="text-gray-800 text-md">
                        <td class="px-4 py-3 hidden md:table-cell">{{ $learner->lrn }}</td>
                        <td class="px-4 py-3">{{ $learner->last_name . ', ' . $learner->first_name }}</td>
                        <td class="px-4 py-3 hidden md:table-cell">{{ $learner->grade_level}}</td>
                        <td class="px-4 py-3 hidden md:table-cell">
                            <button data-modal-target="status-modal-{{ $learner->id }}" data-modal-toggle="status-modal-{{ $learner->id }}" class="bg-green-500 hover:bg-green-600 text-white text-sm font-semibold py-2 px-4 rounded-md shadow-sm uppercase">
                                {{ ucfirst($learner->status) }}
                            </button>
                        
                            <!-- Status Modal -->
                            <div id="status-modal-{{ $learner->id }}" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                <div class="relative p-4 w-full max-w-md max-h-full">
                                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                        <button type="button" class="absolute top-3 end-2.5 text-gray-400 hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="status-modal-{{ $learner->id }}">
                                            <svg class="w-3 h-3" fill="none" viewBox="0 0 14 14">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1l12 12M13 1 1 13" />
                                            </svg>
                                            <span class="sr-only">Close modal</span>
                                        </button>
                                        <div class="p-4 md:p-5 text-center">
                                            <h3 class="mb-4 text-lg font-medium text-gray-800 dark:text-gray-200">Update Learner Status</h3>
                                            <form action="{{ route('updatelearnerstatus', ['id' => $learner->id]) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <select name="status" class="w-full p-2 border rounded-lg mb-4">
                                                    <option value="pending" {{ $learner->status === 'pending' ? 'selected' : '' }}>Pending</option>
                                                    <option value="enrolled" {{ $learner->status === 'enrolled' ? 'selected' : '' }}>Enrolled</option>
                                                </select>
                                                <button type="submit" class="bg-green-600 hover:bg-green-700 text-white py-2 px-4 rounded-lg">Update Status</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td class="px-4 py-3 hidden md:table-cell">
                            @if($learner->section)
                                <span class="uppercase">{{ $learner->section->name }}</span>
                            @else
                                <span class="text-xs">No section assigned yet.</span>
                                        @endif
                        </td>
                        <td class="px-4 py-3 hidden md:table-cell">
                            <button data-modal-target="assign-section-modal-{{ $learner->id }}" data-modal-toggle="assign-section-modal-{{ $learner->id }}"
                                class="text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-bold rounded-lg text-sm px-4 py-2.5">
                                EDIT SECTION
                            </button>

                            <div id="assign-section-modal-{{ $learner->id }}" tabindex="-1" class="hidden overflow-y-auto fixed top-0 left-0 right-0 z-50 justify-center items-center w-full h-full">
                                <div class="relative p-4 w-full max-w-md max-h-full">
                                    <div class="relative bg-white rounded-lg shadow dark:bg-white">
                                        <button type="button" class="absolute top-3 right-2.5 text-gray-400 hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto"
                                            data-modal-hide="assign-section-modal-{{ $learner->id }}">
                                            <svg class="w-3 h-3" fill="none" viewBox="0 0 14 14">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                            </svg>
                                        </button>

                                        <div class="p-6">
                                            <h3 class="text-lg font-bold mb-4 text-gray-800">Assign Section for {{ $learner->name }}</h3>
                                        
                                            @if($learner->section)
                                                <div class="mb-4 p-3 bg-green-100 text-green-800 rounded-lg">
                                                    Current Section: <strong>{{ $learner->section->name }}</strong>
                                                </div>

                                                <div class="flex justify-end space-x-2">
                                                    @if($learner->section)
                                                        <form action="{{ route('removelearnersection', ['id' => $learner->id]) }}" method="POST" onsubmit="return confirm('Are you sure you want to remove the assigned section?');">
                                                            @csrf
                                                            @method('PUT')
                                                            <button type="submit" class="px-4 py-2 bg-red-600 text-white font-bold rounded-lg hover:bg-red-700">
                                                                REMOVE SECTION
                                                            </button>
                                                        </form>
                                                    @endif
                                                </div> 
                                            @else
                                                <div class="mb-4 p-3 bg-yellow-100 text-yellow-800 rounded-lg">
                                                    No section assigned yet.
                                                </div>
                                            @endif
                                        
                                            <form action="{{ route('assignsection', ['id' => $learner->id]) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                        
                                                <div class="mb-4 mt-4">
                                                    <label for="section_id" class="block text-sm font-medium text-gray-700 mb-2">Select Section</label>
                                                
                                                    @php
                                                        $availableSections = $sections->filter(function($section) use ($learner) {
                                                            return $section->strands->contains('id', $learner->chosen_strand);
                                                        });
                                                    @endphp
                                                
                                                    @if ($availableSections->isNotEmpty())
                                                        <select name="section_id" id="section_id" class="block w-full p-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500" required>
                                                            @foreach($availableSections as $section)
                                                                <option value="{{ $section->id }}"
                                                                    @if($learner->section && $learner->section->id == $section->id) selected @endif>
                                                                    {{ $section->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>

                                                        <div class="flex justify-end space-x-2">
                                                            <button type="submit" class="px-4 py-2 font-bold bg-blue-600 text-white rounded-lg hover:bg-blue-700 mt-2">
                                                                SAVE
                                                            </button>
                                                        </div>
                                                    @else
                                                        <div class="text-red-600 font-medium">
                                                            Strand not assigned to any section.
                                                        </div>
                                                    @endif
                                                </div>
                                        
                                            </form>
                                        </div>                                        
                                    </div>
                                </div>
                            </div>
                        </td>                        
                        
                        <td class="px-4 py-3">
                            <a href="{{ route('learnerdetails', ['id' => $learner->id]) }}" 
                               class=" bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 text-sm  text-white font-semibold px-5 py-2.5 rounded-lg">
                                VIEW DETAILS
                            </a>
                        </td>
                        <td class="px-4 py-3 hidden sm:table-cell">
                            <button data-modal-target="popup-modal-{{ $learner->id }}" data-modal-toggle="popup-modal-{{ $learner->id }}" class=" text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-bold rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-80" type="button">
                                REMOVE
                            </button>
                            <div id="popup-modal-{{ $learner->id }}" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                <div class="relative p-4 w-full max-w-md max-h-full">
                                    <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
                                        <button type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="popup-modal-{{ $learner->id }}">
                                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                            </svg>
                                            <span class="sr-only">Close modal</span>
                                        </button>
                                        <div class="p-4 md:p-5 text-center">
                                            <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                            </svg>
                                            <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to remove this learner?</h3>
                                            <div class="flex flex-col sm:flex-row justify-center items-center gap-4">
                                                <form action="{{ route('removelearner', ['id' => $learner->id]) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button data-modal-hide="popup-modal-{{ $learner->id }}" type="submit"
                                                        class="w-full sm:w-auto text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                                                        Yes, I'm sure
                                                    </button>
                                                </form>                          
                                                <button data-modal-hide="popup-modal-{{ $learner->id }}" type="button"
                                                    class="w-full sm:w-auto py-2.5 px-5 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                                                    No, cancel
                                                </button>
                                            </div>                                            
                                        </div>
                                    </div>
                                </div>
                            </div>      
                        </td>                               
                    </tr>                    
                        @endif
                    @endforeach                                     
                </tbody>
            </table>
        </div>
    </div>
</x-admin-dashboard-layout>

