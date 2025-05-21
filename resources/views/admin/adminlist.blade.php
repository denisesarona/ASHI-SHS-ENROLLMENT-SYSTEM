<x-admin-dashboard-layout>
    <div class="min-h-screen bg-white py-8 px-4 flex flex-col items-center shadow-lg rounded-xl">
        <h1 class="text-4xl font-bold mb-6 text-center mt-6">ADMINISTRATORS</h1>

        <div class="w-full max-w-5xl overflow-x-auto">
            <table class="w-full border-collapse text-sm md:text-base">
                <thead>
                    <tr class="bg-gray-100 text-gray-700 font-semibold text-center">
                        <th class="px-4 py-3 hidden md:table-cell">ID</th>
                        <th class="px-4 py-3">LAST NAME</th>
                        <th class="px-4 py-3 hidden md:table-cell">ROLE</th>
                        <th class="px-4 py-3">VIEW DETAILS</th>
                        <th class="px-4 py-3 hidden md:table-cell">REMOVE</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach ($admins as $admin)
                        <tr class="text-center hover:bg-gray-50">
                            <td class="px-4 py-3 hidden md:table-cell">{{ $admin->id }}</td>
                            <td class="px-4 py-3">{{ $admin->name }}</td>
                            <td class="px-4 py-3 hidden md:table-cell">
                                {{ $admin->role == 1 ? 'SUPER ADMIN' : 'TEACHER ADMIN' }}
                            </td>
                            <td class="px-4 py-3">
                                <a href="{{ route('admindetails', ['id' => $admin->id]) }}" 
                                   class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-md transition">
                                    VIEW DETAILS
                                </a>
                            </td>
                            <td class="px-4 py-3 hidden md:table-cell">
                                <button data-modal-target="popup-modal-{{ $admin->id }}" 
                                        data-modal-toggle="popup-modal-{{ $admin->id }}"
                                        class="bg-red-600 hover:bg-red-700 text-white font-medium py-2 px-4 rounded-md transition">
                                    REMOVE ADMIN
                                </button>

                                <div id="popup-modal-{{ $admin->id }}" tabindex="-1" 
                                     class="fixed top-0 left-0 right-0 z-50 hidden justify-center items-center w-full h-full bg-black bg-opacity-50">
                                    <div class="bg-white rounded-lg shadow-md w-full max-w-md p-6 relative">
                                        <button type="button"
                                                data-modal-hide="popup-modal-{{ $admin->id }}"
                                                class="absolute top-3 right-3 text-gray-500 hover:text-gray-800">
                                            ✕
                                        </button>
                                        <div class="text-center">
                                            <svg class="mx-auto mb-4 w-12 h-12 text-gray-400" fill="none" stroke="currentColor"
                                                 viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                      d="M13 16h-1v-4h-1m0-4h.01M12 2a10 10 0 1010 10A10 10 0 0012 2z" />
                                            </svg>
                                            <h3 class="mb-4 text-lg font-normal text-gray-700">
                                                Are you sure you want to remove this admin?
                                            </h3>
                                            <form action="{{ route('removeadmin', ['id' => $admin->id]) }}" method="POST" class="flex flex-col sm:flex-row gap-3 justify-center">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" data-modal-hide="popup-modal-{{ $admin->id }}"
                                                        class="bg-red-600 text-white px-5 py-2 rounded-md hover:bg-red-700">
                                                    Yes, I'm sure
                                                </button>
                                                <button type="button" data-modal-hide="popup-modal-{{ $admin->id }}"
                                                        class="border border-gray-300 text-gray-700 px-5 py-2 rounded-md hover:bg-gray-100">
                                                    No, cancel
                                                </button>
                                            </form>
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
</x-admin-dashboard-layout>
