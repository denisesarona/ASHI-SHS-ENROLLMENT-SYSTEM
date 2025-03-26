<x-admin-dashboard-layout>
    <div class="min-h-screen flex flex-col items-center bg-white p-4 shadow-lg rounded-xl">
        <div class="pt-8">
            <h1 class="text-4xl font-bold text-center">ADMINISTRATORS</h1>
        </div>
        <div class="w-full max-w-3xl mt-8">
            <table class="w-full text-center">
                <thead>
                    <tr class="text-gray-600 text-lg font-semibold">
                        <th class="px-8 py-2">ID</th>
                        <th class="px-8 py-2">LAST NAME</th>
                        <th class="px-8 py-2">ROLE</th>
                        <th class="px-8 py-2">VIEW DETAILS</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($admins as $admin)
                    <tr class="text-gray-800 text-lg">
                        <td class="px-4 py-3">{{ $admin->id }}</td>
                        <td class="px-4 py-3">{{ $admin->name }}</td>
                        <td class="px-4 py-3">{{ $admin->role == 1 ? 'ADMIN' : 'USER' }}</td>
                        <td class="px-4 py-3">
                            <a href="{{ route('admindetails', ['id' => $admin->id]) }}" 
                               class="bg-blue-500 text-white text-sm font-semibold py-2 px-4 rounded-md shadow-md">
                                VIEW DETAILS
                            </a>
                        </td>
                    </tr>
                    @endforeach                                     
                </tbody>
            </table>
        </div>
    </div>
</x-admin-dashboard-layout>
