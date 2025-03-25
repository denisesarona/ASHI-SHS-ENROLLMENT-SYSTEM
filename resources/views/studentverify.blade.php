<x-layout>
    <section class="min-h-screen flex items-center justify-center bg-gray-100 p-4 w-full">
        <div class="bg-gray-200 p-12 sm:p-10 rounded-lg -mt-20 shadow-md w-full max-w-sm sm:max-w-lg">
            <h1 class="text-2xl sm:text-3xl font-bold text-center mb-6">Student Record Verification</h1>
            <form action="{{ route('studentVerify') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <label class="block font-semibold mb-2 text-lg">Last Name (Apelyido):</label>
                <input type="text" class="w-full p-3 border rounded mb-6" name="last_name" placeholder="Enter Last Name">
                
                <label class="block font-semibold mb-2 text-lg">Learner Reference Number:</label>
                <input type="number" class="w-full p-3 border rounded mb-6" name="lrn" placeholder="Enter LRN">
                
                <button class="w-full bg-blue-600 text-white font-bold py-3 rounded hover:bg-blue-700 text-lg">Submit</button>
            </form>
        </div>
    </section>
</x-layout>
