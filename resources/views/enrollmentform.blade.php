<x-layout>
    <section class="min-h-screen flex items-center justify-center bg-gray-100 p-4">
        <div class="bg-white p-8 sm:p-10 rounded-lg shadow-lg w-full max-w-4xl">
            <h1 class="text-2xl sm:text-3xl font-bold text-center mb-6">Enrollment Form</h1>
            <form action="#">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block font-semibold mb-2 text-lg">School Year</label>
                        <input type="text" class="w-full p-3 border rounded" placeholder="Enter School Year">
                    </div>
                    <div>
                        <label class="block font-semibold mb-2 text-lg">Grade Level</label>
                        <select class="w-full p-3 border rounded">
                            <option value="g11">Grade 11</option>
                        </select>
                    </div>

                    <div>
                        <label class="block font-semibold mb-2 text-lg">Last Name</label>
                        <input type="text" class="w-full p-3 border rounded" placeholder="Enter Last Name">
                    </div>
                    <div>
                        <label class="block font-semibold mb-2 text-lg">First Name</label>
                        <input type="text" class="w-full p-3 border rounded" placeholder="Enter First Name">
                    </div>

                    <div>
                        <label class="block font-semibold mb-2 text-lg">Middle Name</label>
                        <input type="text" class="w-full p-3 border rounded" placeholder="Enter Middle Name">
                    </div>
                    <div>
                        <label class="block font-semibold mb-2 text-lg">Extension Name</label>
                        <input type="text" class="w-full p-3 border rounded" placeholder="Enter Extension Name">
                    </div>

                    <div>
                        <label class="block font-semibold mb-2 text-lg">LRN</label>
                        <input type="text" class="w-full p-3 border rounded" placeholder="Enter LRN">
                    </div>
                    <div>
                        <label class="block font-semibold mb-2 text-lg">Birthdate</label>
                        <input type="date" class="w-full p-3 border rounded">
                    </div>

                    <div>
                        <label class="block font-semibold mb-2 text-lg">Age</label>
                        <input type="number" class="w-full p-3 border rounded" placeholder="Enter Age">
                    </div>
                    <div>
                        <label class="block font-semibold mb-2 text-lg">Gender</label>
                        <div class="flex items-center space-x-4">
                            <label class="flex items-center">
                                <input type="radio" name="gender" value="Male" class="mr-2"> Male
                            </label>
                            <label class="flex items-center">
                                <input type="radio" name="gender" value="Female" class="mr-2"> Female
                            </label>
                        </div>
                    </div>
                </div>
                
                <!-- 4Ps Beneficiary Section -->
                <div class="w-full mt-6">
                    <label class="block font-semibold mb-2 text-lg">
                        Are you a beneficiary of 4Ps? (Ikaw ba ay benepisyaryo ng 4Ps?)
                    </label>
                    <div class="flex space-x-10">
                        <label class="flex items-center space-x-2 p-2 border rounded cursor-pointer">
                            <input type="checkbox" class="w-6 h-6">
                            <span>Yes</span> 
                        </label>
                        <label class="flex items-center space-x-2 p-2 border rounded cursor-pointer">
                            <input type="checkbox" class="w-6 h-6">
                            <span>No</span>
                        </label>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-4">
                    <div>
                        <label class="block font-semibold mb-2 text-lg">House No./ Street</label>
                        <input type="text" class="w-full p-3 border rounded" placeholder="Enter Address">
                    </div>
                    <div>
                        <label class="block font-semibold mb-2 text-lg">Barangay</label>
                        <input type="text" class="w-full p-3 border rounded" placeholder="Enter Barangay">
                    </div>

                    <div>
                        <label class="block font-semibold mb-2 text-lg">Municipality/ City</label>
                        <input type="text" class="w-full p-3 border rounded" placeholder="Enter City">
                    </div>
                    <div>
                        <label class="block font-semibold mb-2 text-lg">Province</label>
                        <input type="text" class="w-full p-3 border rounded" placeholder="Enter Province">
                    </div>

                    <div>
                        <label class="block font-semibold mb-2 text-lg">Guardian's Name</label>
                        <input type="text" class="w-full p-3 border rounded" placeholder="Enter Guardian's Name">
                    </div>
                    <div>
                        <label class="block font-semibold mb-2 text-lg">Guardian's Contact</label>
                        <input type="tel" class="w-full p-3 border rounded" placeholder="Enter Contact">
                    </div>
                </div>
                <!-- Relationship with Guardian -->
                <div class="w-full mt-6">
                    <label class="block font-semibold mb-2 text-lg">Relationship with the Guardian (Kaano-ano mo ang iyong Guardian?)</label>
                    <div class="flex justify-between items-center">
                        <div class="flex space-x-4">
                            <label class="flex items-center space-x-2 p-2 border rounded cursor-pointer">
                                <input type="checkbox" class="w-6 h-6">
                                <span>Mother (Nanay)</span> 
                            </label>
                            <label class="flex items-center space-x-2 p-2 border rounded cursor-pointer">
                                <input type="checkbox" class="w-6 h-6">
                                <span>Father (Tatay)</span>
                            </label>
                        </div>
                        <div class="w-full">
                            <label class="text-md block mb-1">Others:</label>
                            <input type="text" class="p-2 border rounded w-full" placeholder="Enter Relationship">
                        </div>
                    </div>
                </div>

                <!-- Last School Information -->
                <div class="w-full mt-6">
                    <label class="block font-semibold mb-2 text-lg">Last School Year Attended</label>
                    <input type="text" class="w-full p-3 border rounded" placeholder="Enter Last School Year">
                </div>
                <div class="w-full mt-6">
                    <label class="block font-semibold mb-2 text-lg">Last School Attended</label>
                    <input type="text" class="w-full p-3 border rounded" placeholder="Enter Last School Attended">
                </div>

                <!-- Strand Selection -->
                <div class="w-full mt-6">
                    <label class="block font-semibold mb-4 text-lg">Choose only ONE Strand</label>
                    <div class="bg-white p-4 rounded-md shadow-inner mb-4">
                        <p class="italic text-sm"><strong>REGULAR</strong> - G10 graduates of SY 2023-2024.</p>
                        <p class="italic text-sm"><strong>BALIK-ARAL</strong> - G10 graduates of SY 2022-2023 or earlier who haven't enrolled in G11.</p>
                        <p class="italic text-sm"><strong>REPEATER</strong> - Previously enrolled in G11 but didn't finish.</p>
                        <p class="italic text-sm"><strong>ALS GRADUATE</strong> - ALS Junior High School graduates.</p>
                    </div>
                    <select class="w-full p-3 border rounded-md mb-4">
                        <option value="regular">Regular</option>
                        <option value="balik-aral">Balik-Aral</option> 
                        <option value="repeater">Repeater</option> 
                        <option value="als-graduate">ALS Graduate</option>   
                    </select>
                </div>

                <div class="mt-6 text-center">
                    <button type="submit" class="bg-blue-500 text-white px-6 py-3 rounded-lg font-semibold hover:bg-blue-600">
                        Submit Enrollment
                    </button>
                </div>
            </form>
        </div>
    </section>
</x-layout>
