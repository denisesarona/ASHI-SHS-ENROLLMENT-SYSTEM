<x-admin-dashboard-layout>
    <div class="min-h-screen flex flex-col items-center bg-gray-100 p-4">
        <div class="pt-8">
            <h1 class="text-4xl font-bold text-center">Admin Details</h1>
        </div>
        <div class="w-full max-w-2xl mt-8 p-6 bg-white shadow-lg rounded-md">

            <p><strong>ID:</strong> {{ $admin->id }}</p>
            <p><strong>Name:</strong> {{ $admin->name }}</p>
            <p><strong>Role:</strong> {{ $admin->role == 1 ? 'ADMIN' : 'USER' }}</p>

            <a href="{{ route('adminlist') }}" class="mt-4 inline-block bg-gray-500 text-white px-4 py-2 rounded-md">
                Back to List
            </a>
        </div>
    </div>
</x-admin-dashboard-layout>
