<x-layout>
    <section class="min-h-screen flex items-center justify-center bg-gray-100 p-4 w-full" style="overflow: hidden;">
        <div class="bg-gray-200 p-8 sm:p-10 rounded-lg -mt-20 shadow-md w-full max-w-sm sm:max-w-lg text-center">
            <h1 class="text-xl sm:text-2xl mb-4">Your Control Number is</h1>
            <h1 class="text-4xl sm:text-5xl font-bold mb-6">#000001</h1>

            <div class="flex justify-center space-x-4">
                <button class="w-full bg-blue-600 text-white font-bold py-3 rounded hover:bg-blue-700 text-lg mt-4">Save</button>
                <a href="{{ route('trackenrollment') }}" class="w-full block bg-blue-600 text-white font-bold py-3 rounded hover:bg-blue-700 text-lg text-center mt-4">
                    Track Enrollment
                </a>
            </div>
        </div>
    </section>
</x-layout>
