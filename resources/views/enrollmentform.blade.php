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
                        <label class="block font-semibold mb-2 text-lg">Grade Level to Enrollment (Antas ng Baitang upang magpatala)    </label>
                        <Select class="w-full p-3 border rounded mb-6">
                            <option value="g11">Grade 11</option>
                        </Select>
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
                        <label class="block font-semibold mb-2 text-lg">LRN (Learner Reference Number)</label>
                        <input type="text" class="w-full p-3 border rounded mb-6" placeholder="Enter LRN">
                    </div>
                    <div class="w-full">
                        <label class="block font-semibold mb-2 text-lg">Birthdate (Araw ng kapanganakan)</label>
                        <input type="text" class="w-full p-3 border rounded mb-6" placeholder="Enter Birthdate">
                    </div>
                </div>

                <div class="flex justify-center space-x-10">
                    <div class="w-full">
                        <label class="block font-semibold mb-2 text-lg">Age (Edad)</label>
                        <input type="text" class="w-full p-3 border rounded mb-6" placeholder="Enter Age">
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
                <div class="w-full">
                    <label class="block font-semibold mb-2 text-lg">
                        "Are you a beneficiary of 4Ps? (Ikaw ba ay benepisyaryo ng 4Ps?)"
                    </label>
                    <div class="flex justify-left space-x-10">
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
                <div class="flex justify-center space-x-10 mt-4">
                    <div class="w-full">
                        <label class="block font-semibold mb-2 text-lg">House No./ Street (e.g. 416, Bocalan St.)</label>
                        <input type="text" class="w-full p-3 border rounded mb-6"  placeholder="Enter House No./ Street">
                    </div>
                    <div class="w-full">
                        <label class="block font-semibold mb-2 text-lg">Barangay</label>
                        <input type="text" class="w-full p-3 border rounded mb-6" placeholder="Enter Barangay">
                    </div>
                </div>

                <div class="flex justify-center space-x-10">
                    <div class="w-full">
                        <label class="block font-semibold mb-2 text-lg">Municipality/ City</label>
                        <input type="text" class="w-full p-3 border rounded mb-6" placeholder="Enter Municipality/ City">
                    </div>
                    <div class="w-full">
                        <label class="block font-semibold mb-2 text-lg">Province</label>
                        <input type="text" class="w-full p-3 border rounded mb-6" placeholder="Enter Province">
                    </div>
                </div>

                <div class="w-full">
                    <label class="block font-semibold mb-2 text-lg">Guardian's Name (Pangalan ng Tagapag-alaga)</label>
                    <input type="text" class="w-full p-3 border rounded mb-6" placeholder="Enter Guardian's Name">
                </div>

                <div class="flex justify-center space-x-10">
                    <div class="w-full">
                        <label class="block font-semibold mb-2 text-lg">Municipality/ City</label>
                        <input type="text" class="w-full p-3 border rounded mb-6" placeholder="Enter Municipality/ City">
                    </div>
                    <div class="w-full">
                        <label class="block font-semibold mb-2 text-lg">Province</label>
                        <input type="text" class="w-full p-3 border rounded mb-6" placeholder="Enter Province">
                    </div>
                </div>

                <div class="w-full">
                    <label class="block font-semibold mb-2 text-lg">Relationship with the Guardian (Kaano-ano mo ang iyong Guardian?)</label>
                    
                    <div class="flex items-center gap-4 mb-4">
                        <!-- Mother -->
                        <label class="flex items-center space-x-2 p-2 border rounded cursor-pointer">
                            <input type="checkbox" class="w-6 h-6">
                            <span>Mother (Nanay)</span> 
                        </label>
                        
                        <!-- Father -->
                        <label class="flex items-center space-x-2 p-2 border rounded cursor-pointer">
                            <input type="checkbox" class="w-6 h-6">
                            <span>Father (Tatay)</span>
                        </label>
                
                        <!-- Others -->
                        <div class="flex items-center space-x-2">
                            <label class="text-md">Others:</label>
                            <input type="text" class="p-2 border rounded w-48" placeholder="Enter Relationship">
                        </div>
                    </div>
                
                    <!-- Guardian's Contact Number -->
                    <div>
                        <label class="block font-semibold mb-2 text-lg">Guardian's Contact Number</label>
                        <input type="number" class="w-full p-3 border rounded" placeholder="Enter Guardian's Contact Number">
                    </div>
                </div>                       
                <div class="w-full">
                    <label class="block font-semibold mb-2 text-lg">Guardian's Contact Number</label>
                    <input type="number" class="w-full p-3 border rounded mb-6" placeholder="Enter Guardian's Contact Number">
                </div>
                <div class="flex justify-center space-x-10">
                    <div class="w-full">
                        <label class="block font-semibold text-lg">Last School attended (Huling Paaralan na Pinasukan)</label>
                        <p class="italic text-sm">Buong pangalan ng Paaralan (e.g. Amaya School of Home Industries)</p>
                        <input type="text" class="w-full p-3 border rounded mb-6" placeholder="Enter Last School attended">
                    </div>
                    <div class="w-full">
                        <label class="block font-semibold mb-2 text-lg">Last School Year attended (Huling Taong Pinasukan)</label>
                        <input type="text" class="w-full p-3 border rounded mb-6" placeholder="Enter Last School Year attended">
                    </div>
                </div>

     
                    <div>
                        <label class="block font-semibold mb-4 text-lg">Choose only ONE Strand</label>
                        
                        <div class="bg-white p-4 rounded-md shadow-inner mb-4">
                            <p class="italic text-sm"><strong>REGULAR</strong> - Mga estudyante na nagtapos ng <strong>G10 noong SY 2023-2024.</strong></p>
                            <p class="italic text-sm"><strong>BALIK-ARAL</strong> - Mga estudyante na nagtapos ng <strong>G10 noong SY 2022-2023 PABABA at hindi pa nakapag-enroll bilang G11.</strong></p>
                            <p class="italic text-sm"><strong>REPEATER</strong> - Mga estudyante na <strong>nakapag-enroll na ng G11 dati</strong> ngunit hindi natapos.</p>
                            <p class="italic text-sm"><strong>ALS GRADUATE</strong> - Mga estudyante na nakatapos ng ALS Junior High School.</p>
                        </div>
                
                        <select class="w-full p-3 border rounded-md mb-4">
                            <option value="regular">Regular</option>
                            <option value="balik-aral">Balik-Aral</option> 
                            <option value="repeater">Repeater</option> 
                            <option value="als-graduate">ALS Graduate</option>   
                        </select>
                
                     
                    </div>
          
                

                <button class="w-full bg-blue-600 text-white font-bold py-3 rounded hover:bg-blue-700 text-lg">Submit</button>
            </form>
        </div>
    </section>
</x-layout>
