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
                        <label class="block font-semibold mb-2 text-lg">Grade Level to Enrollment</label>
                        <Select class="w-full p-3 border rounded mb-6">
                            <option value="g11">Grade 11</option>
                            <option value="g12">Grade 12</option>   
                        </Select>
                    </div>
                    <div class="w-full">
                        <label class="block font-semibold mb-2 text-lg">Birthdate (Araw ng kapanganakan)</label>
                        <input type="text" class="w-full p-3 border rounded mb-6" placeholder="Enter Birthdate">
                    </div>
                </div>

                <div class="flex justify-center space-x-10">
                    <div class="w-full">
                        <label class="block font-semibold mb-2 text-lg">Last Name (Apelyido)</label>
                        <input type="text" class="w-full p-3 border rounded mb-6" placeholder="Enter Last Name">
                    </div>
                    <div class="w-full">
                        <label class="block font-semibold mb-2 text-lg">First Name (Pangalan)</label>
                        <input type="text" class="w-full p-3 border rounded mb-6" placeholder="Enter First Name">
                    </div>
                </div>

                <div class="flex justify-center space-x-10">
                    <div class="w-full">
                        <label class="block font-semibold mb-2 text-lg">Middle Name (Gitnang Pangalan)</label>
                        <input type="text" class="w-full p-3 border rounded mb-6" placeholder="Enter Middle Name">
                    </div>
                    <div class="w-full">
                        <label class="block font-semibold mb-2 text-lg">Extension Name (e.g. Jr., III if applicable)</label>
                        <input type="text" class="w-full p-3 border rounded mb-6" placeholder="Enter Extension Name">
                    </div>
                </div>

                <div class="flex justify-center space-x-10">
                    <div class="w-full">
                        <label class="block font-semibold mb-2 text-lg">Learner Reference Number</label>
                        <input type="text" class="w-full p-3 border rounded mb-6" placeholder="Enter LRN">
                    </div>
                    <div class="w-full">
                        <label class="block font-semibold mb-2 text-lg">Gender (Kasarian)</label>
                        <div class="flex justify-center space-x-10">
                            <div class="w-full p-3">
                                <label class="flex items-center space-x-2 w-full p-1 border rounded mb-6 cursor-pointer">
                                    <input type="checkbox" class="w-6 h-6">
                                    <span>Male</span>
                                </label>
                            </div>                            
                            <div class="w-full p-3">
                                <label class="flex items-center space-x-2 w-full p-1 border rounded mb-6 cursor-pointer">
                                    <input type="checkbox" class="w-6 h-6">
                                    <span>Female</span>
                                </label>
                            </div>                            
                        </div>
                    </div>
                </div>

                <div class="flex justify-center space-x-10">
                    <div class="w-full">
                        <label class="block font-semibold mb-2 text-lg">Age (Edad)</label>
                        <input type="text" class="w-full p-3 border rounded mb-6" placeholder="Enter Age">
                    </div>
                    <div class="w-full">
                        <label class="block font-semibold mb-2 text-lg">"Are you a beneficiary of 4Ps? (Ikaw ba ay benipisyaryo ng 4Ps?)"</label>
                        <div class="flex justify-center space-x-10">
                            <div class="w-full p-3">
                                <label class="flex items-center space-x-2 w-full p-1 border rounded mb-6 cursor-pointer">
                                    <input type="checkbox" class="w-6 h-6">
                                    <span>Yes</span>
                                </label>
                            </div>                            
                            <div class="w-full p-3">
                                <label class="flex items-center space-x-2 w-full p-1 border rounded mb-6 cursor-pointer">
                                    <input type="checkbox" class="w-6 h-6">
                                    <span>No</span>
                                </label>
                            </div>                            
                        </div>
                    </div>
                </div>

                
                
                <label class="block font-semibold mb-2 text-lg">Control Number</label>
                <input type="number" class="w-full p-3 border rounded mb-6" placeholder="Enter LRN">
                
                <button class="w-full bg-blue-600 text-white font-bold py-3 rounded hover:bg-blue-700 text-lg">Submit</button>
            </form>
        </div>
    </section>
</x-layout>
