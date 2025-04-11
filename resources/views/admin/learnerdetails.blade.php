<x-admin-dashboard-layout>
    <div class="min-h-screen flex flex-col items-center bg-white p-8 shadow-lg rounded-xl">
        <div class="w-full max-w-6xl h-screen mt-6 p-6 bg-gray-100 shadow-md rounded-md">
            <div class="pt-6 text-center mb-10">
                <h1 class="text-4xl font-bold text-gray-800">Learner Details</h1>
            </div>
            <form action="" method="POST">
                @csrf
                @method('PUT')
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block font-semibold text-lg text-gray-700 mb-2">Last Name</label>
                        <input type="text" class="w-full p-3 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-2 focus:ring-blue-500" 
                               name="last_name" value="{{ $learner->last_name }}" placeholder="Enter Last Name">
                    </div>
                    <div>
                        <label class="block font-semibold text-lg text-gray-700 mb-2">First Name</label>
                        <input type="text" class="w-full p-3 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-2 focus:ring-blue-500" 
                               name="first_name" value="{{ $learner->first_name }}" placeholder="Enter First Name">
                    </div>
                    <div>
                        <label class="block font-semibold text-lg text-gray-700 mb-2">Middle Name</label>
                        <input type="text" class="w-full p-3 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-2 focus:ring-blue-500" 
                               name="middle_name" value="{{ $learner->middle_name }}" placeholder="Enter Middle Name">
                    </div>
                    <div>
                        <label class="block font-semibold text-lg text-gray-700 mb-2">Extension Name</label>
                        <input type="text" class="w-full p-3 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-2 focus:ring-blue-500" 
                               name="extension_name" value="{{ $learner->extension_name }}" placeholder="Enter Extension Name">
                    </div>
                    <div>
                        <label class="block font-semibold text-lg text-gray-700 mb-2">Email</label>
                        <input type="text" class="w-full p-3 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-2 focus:ring-blue-500" 
                               name="email" value="{{ $learner->email }}">
                    </div>
                    <input type="hidden" name="id" value="{{ request('id') }}">
                </div>s
                <button type="submit" class="mt-6 text-center bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-3 rounded-md shadow-md">
                    Update Details
                </button>
            </form>
        </div>
    </div>
</x-admin-dashboard-layout>