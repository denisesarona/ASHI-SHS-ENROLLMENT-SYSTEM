<x-layout>
    <section class="min-h-screen flex items-center justify-center bg-gray-100 p-4 w-full">  
        <div class="bg-gray-200 p-12 sm:p-10 rounded-lg shadow-md w-full -mt-20 max-w-md">
            <h1 class="text-2xl sm:text-3xl font-bold text-center mb-6">Learner Enrollment Status</h1>
            <p class="block mb-4 text-lg"><strong>Last Name (Apelyido):</strong> {{ session('last_name', 'N/A') }}</p>
            <p class="block mb-4 text-lg"><strong>Control Number:</strong> {{ session('controlnum', 'N/A') }}</p>
            <p class="block mb-4 text-lg"><strong>Status:</strong> {{ session('status', 'N/A') }}</p>
            
            <div class="text-center mt-6">
                <form action="{{ route('homepage') }}" method="GET">
                    <button type="submit" class="w-full bg-blue-600 text-white font-bold py-3 rounded hover:bg-blue-700 text-lg">
                        Edit Details
                    </button>
                </form>
            </div>
        </div>
    </section>
</x-layout>
