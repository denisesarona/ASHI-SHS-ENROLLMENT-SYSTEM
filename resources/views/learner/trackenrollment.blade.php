<x-layout>
    <section class="min-h-screen flex items-center justify-center bg-gray-100 p-4 w-full" style="overflow: hidden;">
        <div class="bg-gray-200 w-full p-6 sm:p-10 md:p-16 rounded-lg shadow-md max-w-sm sm:max-w-4xl">
            <h1 class="text-2xl sm:text-3xl font-bold text-center mb-6">Track Enrollment Status</h1>
            <form action="{{ route('trackEnrollment') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="flex flex-col space-y-2">
                        <label class="font-semibold text-lg">Last Name (Apelyido):</label>
                        <input type="text" class="p-3 border rounded" name="last_name" placeholder="Enter Last Name">
                    </div>
                    <div class="flex flex-col space-y-2">
                        <label class="font-semibold text-lg">First Name (Pangalan):</label>
                        <input type="text" class="p-3 border rounded" name="first_name" placeholder="Enter First Name">
                    </div>
                    <div class="flex flex-col space-y-2">
                        <label class="font-semibold text-lg">LRN (Learner's Reference Number):</label>
                        <input type="number" class="p-3 border rounded" name="lrn" placeholder="Enter LRN">
                    </div>
                    <div class="flex flex-col space-y-2">
                        <label class="font-semibold text-lg">Control Number:</label>
                        <input type="number" class="p-3 border rounded" name="controlnum" placeholder="Enter Control Number">
                    </div>
                </div>

                <div class="mt-8">
                    <button class="w-full bg-blue-600 text-white font-bold py-3 rounded hover:bg-blue-700 text-lg">Submit</button>
                </div>
            </form>
        </div>
    </section>
</x-layout>
