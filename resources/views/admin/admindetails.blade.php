<x-admin-dashboard-layout>
    <div class="min-h-screen flex flex-col items-center bg-white p-8 shadow-lg rounded-xl">
        <div class="w-full max-w-6xl h-screen mt-6 p-6 bg-gray-100 shadow-md rounded-md">
            <div class="pt-6 text-center mb-10">
                <h1 class="text-4xl font-bold text-gray-800">Admin Details</h1>
            </div>
            <form action="{{ route('updatepassword', $admins->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block font-semibold text-lg text-gray-700 mb-2">Name</label>
                        <input type="text" class="w-full p-3 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-2 focus:ring-blue-500" 
                               name="name" value="{{ $admins->name }}">
                    </div>
                    <div>
                        <label class="block font-semibold text-lg text-gray-700 mb-2">Email</label>
                        <input type="text" class="w-full p-3 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-2 focus:ring-blue-500" 
                               name="email" value="{{ $admins->email }}">
                    </div>

                    <div>
                        <label class="block font-semibold text-lg text-gray-700 mb-2">Role</label>
                        <select name="role" class="w-full p-3 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-2 focus:ring-blue-500">
                            @foreach ($roles as $roleId => $roleName)
                                <option value="{{ $roleId }}" {{ $admins->role == $roleId ? 'selected' : '' }}>
                                    {{ $roleName }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label class="block font-semibold text-lg text-gray-700 mb-2">New Password</label>
                        <input type="password" class="w-full p-3 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-2 focus:ring-blue-500" 
                               name="password" placeholder="Enter new password">
                    </div>
                    <div>
                        <label class="block font-semibold text-lg text-gray-700 mb-2">Confirm Password</label>
                        <input type="password" class="w-full p-3 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-2 focus:ring-blue-500" 
                               name="password_confirmation" placeholder="Enter confirm password">
                    </div>
                    <input type="hidden" name="id" value="{{ request('id') }}">
                </div>

                <button type="submit" class="mt-6 text-center bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-3 rounded-md shadow-md">
                    Update Details
                </button>
            </form>
        </div>
    </div>
</x-admin-dashboard-layout>