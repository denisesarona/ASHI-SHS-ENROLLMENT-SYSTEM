<x-layout>
    <section class="min-h-screen flex items-center justify-center bg-gray-100 p-4">
        <div class="bg-white p-8 sm:p-10 rounded-lg shadow-lg w-full max-w-4xl">
            <h1 class="text-2xl sm:text-3xl font-bold text-center mb-6">Enrollment Form</h1>
            <form action="#">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block font-semibold mb-2 text-lg">School Year<span class="text-red-500 font-bold"> *</span></label>
                        <input type="text" class="w-full p-3 border rounded" placeholder="Enter School Year">
                    </div>
                    <div>
                        <label class="block font-semibold mb-2 text-lg">Grade Level<span class="text-red-500 font-bold"> *</span></label>
                        <select class="w-full p-3 border rounded">
                            <option value="g11">Grade 11</option>
                        </select>
                    </div>

                    <div>
                        <label class="block font-semibold mb-2 text-lg">Last Name<span class="text-red-500 font-bold"> *</span></label>
                        <input type="text" class="w-full p-3 border rounded" placeholder="Enter Last Name">
                    </div>
                    <div>
                        <label class="block font-semibold mb-2 text-lg">First Name<span class="text-red-500 font-bold"> *</span></label>
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
                        <label class="block font-semibold mb-2 text-lg">LRN<span class="text-red-500 font-bold"> *</span></label>
                        <input type="text" class="w-full p-3 border rounded" placeholder="Enter LRN">
                    </div>
                    <div>
                        <label class="block font-semibold mb-2 text-lg">Birthdate<span class="text-red-500 font-bold"> *</span></label>
                        <input type="date" class="w-full p-3 border rounded">
                    </div>

                    <div>
                        <label class="block font-semibold mb-2 text-lg">Age<span class="text-red-500 font-bold"> *</span></label>
                        <input type="number" class="w-full p-3 border rounded" placeholder="Enter Age">
                    </div>
                    <div>
                        <label class="block font-semibold mb-2 text-lg">Gender<span class="text-red-500 font-bold"> *</span></label>
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
                        Are you a beneficiary of 4Ps? (Ikaw ba ay benepisyaryo ng 4Ps?)<span class="text-red-500 font-bold"> *</span>
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
                        <label class="block font-semibold mb-2 text-lg">House No./ Street<span class="text-red-500 font-bold"> *</span></label>
                        <input type="text" class="w-full p-3 border rounded" placeholder="Enter Address">
                    </div>
                    <div>
                        <label class="block font-semibold mb-2 text-lg">Barangay<span class="text-red-500 font-bold"> *</span></label>
                        <input type="text" class="w-full p-3 border rounded" placeholder="Enter Barangay">
                    </div>

                    <div>
                        <label class="block font-semibold mb-2 text-lg">Municipality/ City<span class="text-red-500 font-bold"> *</span></label>
                        <input type="text" class="w-full p-3 border rounded" placeholder="Enter City">
                    </div>
                    <div>
                        <label class="block font-semibold mb-2 text-lg">Province<span class="text-red-500 font-bold"> *</span></label>
                        <input type="text" class="w-full p-3 border rounded" placeholder="Enter Province">
                    </div>

                    <div>
                        <label class="block font-semibold mb-2 text-lg">Guardian's Name<span class="text-red-500 font-bold"> *</span></label>
                        <input type="text" class="w-full p-3 border rounded" placeholder="Enter Guardian's Name">
                    </div>
                    <div>
                        <label class="block font-semibold mb-2 text-lg">Guardian's Contact<span class="text-red-500 font-bold"> *</span></label>
                        <input type="tel" class="w-full p-3 border rounded" placeholder="Enter Contact">
                    </div>
                </div>
                <!-- Relationship with Guardian -->
                <div class="w-full mt-6">
                    <label class="block font-semibold mb-2 text-lg">Relationship with the Guardian (Kaano-ano mo ang iyong Guardian?)<span class="text-red-500 font-bold"> *</span></label>
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
                    <label class="block font-semibold text-lg">Last School Year Attended<span class="text-red-500 font-bold"> *</span></label>
                    <input type="text" class="w-full p-3 border rounded mt-2" placeholder="Enter Last School Year">
                </div>
                <div class="w-full mt-6">
                    <label class="block font-semibold text-lg">Last School Attended<span class="text-red-500 font-bold"> *</span></label>
                    <label class="text-sm font-normal mb-2"><i> Buong pangalan ng Paaralan (e.g. Amaya School of Home Industries)</i></label>
                    <input type="text" class="w-full p-3 border rounded" placeholder="Enter Last School Attended">
                </div>

                <!-- Strand Selection -->
                <div class="w-full mt-6">
                    <label class="block font-semibold mb-4 text-lg">Choose only ONE Strand<span class="text-red-500 font-bold"> *</span></label>
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

                <div class="w-full mt-6">
                    <label class="block font-semibold mb-2 text-lg">Grade 10 Section<span class="text-red-500 font-bold"> *</span></label>
                    <input type="text" class="w-full p-3 border rounded" placeholder="Enter Grade 10 section">
                </div>

                <div class="w-full mt-6">
                    <label class="block font-semibold text-lg">Picture of Grade 10 Card<span class="text-red-500 font-bold"> *</span></label>
                    <label class="text-sm font-normal"><i> FRONT and BACK of the Card</i></label>
                    <input type="file" class="w-full p-3 border rounded mt-3">
                </div>

                <div class="w-full mt-6 ">
                    <label class="block font-semibold mb-4 text-lg bg-blue-200 p-4 text-center">OFFERED STRANDS</label>
                    <div class="bg-white p-4 rounded-md shadow-inner mb-2">
                        <p class="text-md"><strong>HUMSS</strong> - Humanities and Social Sciences</p>
                        <p class="text-md"><strong>Industrial Arts</strong> - Automotive Servicing (NC II)</p>
                        <p class="text-md"><strong>Industrial Arts</strong> - Electrical Installation and Maintenance (NC II)</p>
                        <p class="text-md"><strong>Industrial Arts</strong> - Electronic Products Assembly and Servicing (NC II)</p>
                        <p class="text-md"><strong>Industrial Arts</strong> - Shielded Metal Arc Welding (NC I & NC II)</p>
                        <p class="text-md"><strong>Home Economics</strong> - Bread & Pastry Production (NC II), Food & Beverage Services (NC II) and Cookery (NC II)</p>
                        <p class="text-md"><strong>Home Economics</strong> - Dressmaking (NC II) and Tailoring (NC II)</p>
                        <p class="text-md"><strong>Home Economics</strong> - Hairdressing (NC II), Beauty Care (NC II) and Nail Care (NC II)</p>
                        <p class="text-md"><strong>Information and Communication Technology</strong> - Computer Systems Servicing (NC II)</p>
                        <p class="text-md"><strong>Information and Communication Technology</strong> - Technical Drafting (NC II) and Illustration (NC II)</p>
                    </div>
                    <select class="w-full p-3 border rounded-md mb-4">
                        <option value="hums">HUMSS - Humanities and Social Sciences</option>
                        <option value="ia-as">Industrial Arts - Automotive Servicing (NC II)</option> 
                        <option value="ia-eim">Industrial Arts - Electrical Installation and Maintenance (NC II)</option> 
                        <option value="ia-epas">Industrial Arts - Electronic Products Assembly and Servicing (NC II)</option>   
                        <option value="ia-smaw">Industrial Arts - Shielded Metal Arc Welding (NC I & NC II)</option>
                        <option value="he-brpfbs">Home Economics - Bread & Pastry Production (NC II), Food & Beverage Services (NC II) and Cookery (NC II)</option> 
                        <option value="he-dt">Home Economics - Dressmaking (NC II) and Tailoring (NC II)</option> 
                        <option value="he-hbc">Home Economics - Hairdressing (NC II), Beauty Care (NC II) and Nail Care (NC II)</option>   
                        <option value="ict-css">Information and Communication Technology - Computer Systems Servicing (NC II)</option>
                        <option value="ict-td">Information and Communication Technology - Technical Drafting (NC II) and Illustration (NC II)</option>  
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
