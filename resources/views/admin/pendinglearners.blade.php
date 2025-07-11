<x-admin-dashboard-layout>
    <div class="min-h-screen flex flex-col items-center bg-white p-4 shadow-lg rounded-xl">
        <div class="pt-8">
            <h1 class="text-4xl font-bold text-center">PENDING LEARNERS</h1>
        </div>
        <div class="flex justify-end w-full mt-6">
            <form action="{{ route('auto.enroll.learners') }}" method="POST">
                @csrf
                <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2 px-4 rounded-lg shadow-md">
                    Auto-Enroll Learners
                </button>
            </form>
        </div>
        <div class="w-full overflow-x-auto mt-8">
            <table class="w-full text-center">
                <thead>
                    <tr class="bg-gray-100 text-gray-700 font-semibold text-center">
                        <th class="px-8 py-2 hidden md:table-cell">LRN</th>
                        <th class="px-8 py-2">FULL NAME</th>
                        <th class="px-8 py-2 hidden md:table-cell">GRADE LEVEL</th>
                        <th class="px-8 py-2 hidden md:table-cell">STATUS</th>
                        <th class="px-8 py-2">VIEW DETAILS</th>
                        <th class="px-8 py-2 hidden md:table-cell">REMOVE</th>
                    </tr>
                </thead>                
                <tbody>
                    @foreach ($learners as $learner)
                        @if ($learner->status == 'pending')
                    <tr class="text-gray-800 text-md">
                        <td class="px-4 py-3 hidden md:table-cell">{{ $learner->lrn }}</td>
                        <td class="px-4 py-3">{{ $learner->last_name . ', ' . $learner->first_name }}</td>
                        <td class="px-4 py-3 hidden md:table-cell">{{ $learner->grade_level}}</td>
                        <td class="px-4 py-3 hidden md:table-cell">
                            <button data-modal-target="status-modal-{{ $learner->id }}" data-modal-toggle="status-modal-{{ $learner->id }}" class="bg-yellow-500 hover:bg-yellow-600 text-white text-sm font-semibold py-2 px-4 rounded-md shadow-sm uppercase">
                                {{ ucfirst($learner->status) }}
                            </button>
                        
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
                        
                        <td class="px-4 py-3">
                            <a href="{{ route('learnerdetails', ['id' => $learner->id]) }}" 
                               class="bg-blue-500 text-white text-sm font-semibold py-2 px-4 rounded-md shadow-md">
                                DETAILS
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

