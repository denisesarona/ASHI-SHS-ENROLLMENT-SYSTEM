<x-admin-dashboard-layout>
    <div class="min-h-screen flex flex-col bg-white p-8 shadow-lg rounded-xl w-full">
        <div class="text-center mb-10">
            <h1 class="text-4xl font-bold">LEARNERS RECORDS</h1>
        </div>
    
        <!-- Filter Section -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
            <!-- School Year -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">School Year</label>
                <select class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                    <option>2024-2025</option>
                    <option>2023-2024</option>
                    <option>2022-2023</option>
                </select>
            </div>
    
            <!-- Strand -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Strand</label>
                <select class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                    <option>BSIT</option>
                    <option>BSA</option>
                    <option>BEED</option>
                </select>
            </div>
    
            <!-- Specialization -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Specialization</label>
                <select class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                    <option>Web Development</option>
                    <option>Network Admin</option>
                    <option>Multimedia</option>
                </select>
            </div>
    
            <!-- Filter Button -->
            <div class="flex items-end">
                <button class="w-full bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
                    Filter
                </button>
            </div>
        </div>
    
        <!-- Table Section -->
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white rounded-xl shadow text-sm">
                <thead class="bg-gray-100 text-gray-700 uppercase text-xs">
                    <tr>
                        <th class="px-4 py-3">LRN</th>
                        <th class="px-4 py-3">Last Name</th>
                        <th class="px-4 py-3">First Name</th>
                        <th class="px-4 py-3">Middle Name</th>
                        <th class="px-4 py-3">Gender</th>
                        <th class="px-4 py-3 text-center">Action</th>
                    </tr>
                </thead>
                <tbody class="text-gray-800">
                    <tr class="border-t">
                        <td class="px-4 py-3">1234567890</td>
                        <td class="px-4 py-3">Dela Cruz</td>
                        <td class="px-4 py-3">Juan</td>
                        <td class="px-4 py-3">Santos</td>
                        <td class="px-4 py-3">Male</td>
                        <td class="px-4 py-3 text-center">
                            <a href="#" class="text-blue-600 hover:underline">View Details</a>
                        </td>
                    </tr>
                    <!-- More rows as needed -->
                </tbody>
            </table>
        </div>
    </div>
    
</x-admin-dashboard-layout>