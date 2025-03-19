<x-layout>
    <section class="min-h-screen flex items-center justify-center bg-gray-100 p-4 w-full" style="overflow: hidden;">
        <div class="bg-gray-200 p-12 sm:p-10 rounded-lg -mt-20 shadow-md w-full">
            <h1 class="text-2xl sm:text-3xl font-bold text-center mb-6">Enrollment Form</h1>
            <form action="#">

                <div class="flex justify-center space-x-10">
                    <div class="w-full">
                        <label class="block font-semibold mb-2 text-lg">School Year</label>
                        <input type="text" class="w-full p-3 border rounded mb-6" placeholder="Enter School Year">
                    </div>
                    <div class="w-full">
                        <label class="block font-semibold mb-2 text-lg">School Year</label>
                        <input type="text" class="w-full p-3 border rounded mb-6" placeholder="Enter School Year">
                    </div>
                    <div class="w-full">
                        <label class="block font-semibold mb-2 text-lg">School Year</label>
                        <input type="text" class="w-full p-3 border rounded mb-6" placeholder="Enter School Year">
                    </div>
                </div>
                
                <label class="block font-semibold mb-2 text-lg">Control Number</label>
                <input type="number" class="w-full p-3 border rounded mb-6" placeholder="Enter LRN">
                
                <button class="w-full bg-blue-600 text-white font-bold py-3 rounded hover:bg-blue-700 text-lg">Submit</button>
            </form>
        </div>
    </section>
</x-layout>
