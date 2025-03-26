<x-admin-dashboard-layout>
    <div class="min-h-screen flex flex-col items-center bg-gray-100 p-4">
        <div class="pt-8">
            <h1 class="text-4xl font-bold text-center">ADMINISTRATORS</h1>
        </div>
        <div class="w-full max-w-3xl mt-8">
            <table class="w-full text-center">
                <thead>
                    <tr class="text-gray-600 text-lg font-semibold">
                        <th class="px-8 py-2">ID</th>
                        <th class="px-8 py-2">NAME</th>
                        <th class="px-8 py-2">ROLE</th>
                        <th class="px-8 py-2">VIEW DETAILS</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="text-gray-800 text-lg">
                        <td class="px-4 py-3">1</td>
                        <td class="px-4 py-3">Sarona</td>
                        <td class="px-4 py-3">ADMIN</td>
                        <td class="px-4 py-3">
                            <button class="bg-blue-500 text-white text-sm font-semibold py-2 px-4 rounded-md shadow-md">
                                VIEW DETAILS
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</x-admin-dashboard-layout>
