<x-admin-dashboard-layout>
    <div class="min-h-screen flex flex-col justify-center items-center bg-white p-8 shadow-lg rounded-xl">
        <div class="w-full max-w-md p-6 bg-gray-100 shadow-md rounded-md">
            <div class="text-center mb-10">
                <h1 class="text-4xl font-bold text-gray-800">Verify Email</h1>
            </div>
            <form action="{{ route('verify.email') }}" method="POST" class="flex flex-col space-y-6">
                @csrf
                <input type="hidden" name="email" value="{{ request()->email }}"> 
                
                <div class="flex flex-col items-center">
                    <label class="block font-semibold text-lg text-gray-700 mb-2">Code</label>
                    <input type="text" class="w-full p-3 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-2 focus:ring-blue-500 text-center" 
                           name="code" required>
                </div>
            
                <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-3 rounded-md shadow-md">
                    Submit
                </button>
            </form>
        </div>
    </div>
</x-admin-dashboard-layout>
