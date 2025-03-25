<x-layout>
    <section class="min-h-screen flex items-center justify-center bg-gray-100 p-4">
        <div class="bg-white p-8 sm:p-10 rounded-lg shadow-lg w-full max-w-4xl">
            <h1 class="text-2xl sm:text-3xl font-bold text-center mb-6">Edit Enrollment Form</h1>
            <form action="{{ route('updateLearnerDetails', $learner->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block font-semibold mb-2 text-lg">School Year<span class="text-red-500 font-bold"> *</span></label>
                        <select class="w-full p-3 border rounded" name="school_year">
                            <option value="{{$learner->school_year}}">2025-2026</option>
                        </select>
                    </div>
                    <div>
                        <label class="block font-semibold mb-2 text-lg">Grade Level<span class="text-red-500 font-bold"> *</span></label>
                        <select class="w-full p-3 border rounded" name="grade_level">/
                            <option value="{{$learner->grade_level}}">Grade 11</option>
                        </select>
                    </div>

                    <div>
                        <label class="block font-semibold mb-2 text-lg">Last Name<span class="text-red-500 font-bold"> *</span></label>
                        <input type="text" class="w-full p-3 border rounded" value="{{$learner->last_name}}" name="last_name" placeholder="Enter Last Name">
                    </div>            
                    <div>
                        <label class="block font-semibold mb-2 text-lg">First Name<span class="text-red-500 font-bold"> *</span></label>
                        <input type="text" class="w-full p-3 border rounded" value="{{$learner->first_name}}" name="first_name" placeholder="Enter First Name">
                    </div>

                    <div>
                        <label class="block font-semibold mb-2 text-lg">Middle Name</label>
                        <input type="text" class="w-full p-3 border rounded" value="{{$learner->middle_name}}" name="middle_name" placeholder="Enter Middle Name">
                    </div>
                    <div>
                        <label class="block font-semibold mb-2 text-lg">Extension Name</label>
                        <input type="text" class="w-full p-3 border rounded" value="{{$learner->extension_name}}" name="extension_name" placeholder="Enter Extension Name">
                    </div>

                    <div>
                        <label class="block font-semibold mb-2 text-lg">LRN (Learner Reference Number)<span class="text-red-500 font-bold"> *</span></label>
                        <input type="number" class="w-full p-3 border rounded" value="{{$learner->lrn}}" name="lrn" placeholder="Enter LRN">
                    </div>
                    <div>
                        <label class="block font-semibold mb-2 text-lg">Birthdate<span class="text-red-500 font-bold"> *</span></label>
                        <input type="date" value="{{$learner->birthdate}}" name="birthdate" class="w-full p-3 border rounded">
                    </div>

                    <div>
                        <label class="block font-semibold mb-2 text-lg">Age<span class="text-red-500 font-bold"> *</span></label>
                        <input type="number" class="w-full p-3 border rounded" value="{{$learner->age}}" name="age" placeholder="Enter Age">
                    </div>
                    <div>
                        <label class="block font-semibold mb-2 text-lg">Gender<span class="text-red-500 font-bold"> *</span></label>
                        <div class="flex items-center space-x-4">
                            <label class="flex items-center">
                                <input type="radio" name="gender" value="Male" class="mr-2 w-6 h-6" required 
                                    {{ $learner->gender == 'Male' ? 'checked' : '' }}> Male
                            </label>
                            <label class="flex items-center">
                                <input type="radio" name="gender" value="Female" class="mr-2 w-6 h-6" required 
                                    {{ $learner->gender == 'Female' ? 'checked' : '' }}> Female
                            </label>
                        </div>
                    </div>                              
                </div>
                <div>
                    <label class="block font-semibold mb-2 text-lg mt-4">
                        Are you a beneficiary of 4Ps? (Ikaw ba ay benepisyaryo ng 4Ps?)
                        <span class="text-red-500 font-bold"> *</span>
                    </label>
                    <div class="flex items-center space-x-4">
                        <label class="flex items-center">
                            <input type="radio" name="beneficiary" value="Yes" class="mr-2 w-6 h-6" required 
                                {{ $learner->beneficiary == 'Yes' ? 'checked' : '' }}> Yes
                        </label>
                        <label class="flex items-center">
                            <input type="radio" name="beneficiary" value="No" class="mr-2 w-6 h-6" required 
                                {{ $learner->beneficiary == 'No' ? 'checked' : '' }}> No
                        </label>
                    </div>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-4">
                    <div>
                        <label class="block font-semibold mb-2 text-lg">House No./ Street<span class="text-red-500 font-bold"> *</span></label>
                        <input type="text" class="w-full p-3 border rounded" value="{{$learner->street}}" name="street" placeholder="Enter Address">
                    </div>
                    <div>
                        <label class="block font-semibold mb-2 text-lg">Barangay<span class="text-red-500 font-bold"> *</span></label>
                        <input type="text" class="w-full p-3 border rounded" value="{{$learner->baranggay}}" name="baranggay" placeholder="Enter Barangay">
                    </div>

                    <div>
                        <label class="block font-semibold mb-2 text-lg">Municipality/ City<span class="text-red-500 font-bold"> *</span></label>
                        <input type="text" class="w-full p-3 border rounded" value="{{$learner->municipality}}" name="municipality" placeholder="Enter City">
                    </div>
                    <div>
                        <label class="block font-semibold mb-2 text-lg">Province<span class="text-red-500 font-bold"> *</span></label>
                        <input type="text" class="w-full p-3 border rounded" value="{{$learner->province}}" name="province" placeholder="Enter Province">
                    </div>

                    <div>
                        <label class="block font-semibold mb-2 text-lg">Guardian's Name<span class="text-red-500 font-bold"> *</span></label>
                        <input type="text" class="w-full p-3 border rounded" value="{{$learner->guardian_name}}" name="guardian_name" placeholder="Enter Guardian's Name">
                    </div>
                    <div>
                        <label class="block font-semibold mb-2 text-lg">Guardian's Contact<span class="text-red-500 font-bold"> *</span></label>
                        <input type="number" class="w-full p-3 border rounded" value="{{$learner->guardian_contact}}" name="guardian_contact" placeholder="Enter Contact">
                    </div>
                </div>
                <div>
                    <label class="block font-semibold mb-2 text-lg mt-4">
                        Relationship with the Guardian (Kaano-ano mo ang iyong Guardian?)
                        <span class="text-red-500 font-bold"> *</span>
                    </label>
                    <div class="flex items-center space-x-4">
                        <label class="flex items-center">
                            <input type="radio" name="relationship_guardian" value="Mother" class="mr-2 w-6 h-6"
                                {{ $learner->relationship_guardian == 'Mother' ? 'checked' : '' }}> Mother
                        </label>
                        <label class="flex items-center">
                            <input type="radio" name="relationship_guardian" value="Father" class="mr-2 w-6 h-6"
                                {{ $learner->relationship_guardian == 'Father' ? 'checked' : '' }}> Father
                        </label>
                        <div class="w-full">
                            <label class="text-md block mb-1">Others:</label>
                            <input type="text" class="p-2 border rounded w-full" id="relationship_other"
                                placeholder="Enter Relationship with the Guardian"
                                value="{{ (!in_array($learner->relationship_guardian, ['Mother', 'Father'])) ? $learner->relationship_guardian : '' }}">
                            <input type="hidden" name="relationship_guardian" id="relationship_hidden"
                                value="{{$learner->relationship_guardian}}">
                        </div>
                    </div>
                </div>
            
                <!-- Last School Information -->
                <div class="w-full mt-6">
                    <label class="block font-semibold text-lg">Last School Year Attended<span class="text-red-500 font-bold"> *</span></label>
                    <input type="text" class="w-full p-3 border rounded mt-2" value="{{$learner->last_sy}}" name="last_sy" placeholder="Enter Last School Year">
                </div>
                <div class="w-full mt-6">
                    <label class="block font-semibold text-lg">Last School Attended<span class="text-red-500 font-bold"> *</span></label>
                    <label class="text-sm font-normal mb-2"><i> Buong pangalan ng Paaralan (e.g. Amaya School of Home Industries)</i></label>
                    <input type="text" class="w-full p-3 border rounded" value="{{$learner->last_school}}" name="last_school" placeholder="Enter Last School Attended">
                </div>

                <div class="w-full mt-6">
                    <label class="block font-semibold mb-4 text-lg">
                        Choose a Learner's Category <span class="text-red-500 font-bold"> *</span>
                    </label>
                    <div class="bg-white p-4 rounded-md shadow-inner mb-4">
                        <p class="italic text-sm"><strong>REGULAR</strong> - G10 graduates of SY 2023-2024.</p>
                        <p class="italic text-sm"><strong>BALIK-ARAL</strong> - G10 graduates of SY 2022-2023 or earlier who haven't enrolled in G11.</p>
                        <p class="italic text-sm"><strong>REPEATER</strong> - Previously enrolled in G11 but didn't finish.</p>
                        <p class="italic text-sm"><strong>ALS GRADUATE</strong> - ALS Junior High School graduates.</p>
                    </div>
                    <select class="w-full p-3 border rounded-md mb-4" name="learner_category">
                        <option value="regular" {{ $learner->learner_category == 'regular' ? 'selected' : '' }}>Regular</option>
                        <option value="balik-aral" {{ $learner->learner_category == 'balik-aral' ? 'selected' : '' }}>Balik-Aral</option>
                        <option value="repeater" {{ $learner->learner_category == 'repeater' ? 'selected' : '' }}>Repeater</option>
                        <option value="als-graduate" {{ $learner->learner_category == 'als-graduate' ? 'selected' : '' }}>ALS Graduate</option>
                    </select>
                </div>
                

                <div class="w-full mt-6">
                    <label class="block font-semibold mb-2 text-lg">Grade 10 Section<span class="text-red-500 font-bold"> *</span></label>
                    <input type="text" class="w-full p-3 border rounded" value="{{$learner->grade10_section}}" name="grade10_section" placeholder="Enter Grade 10 section">
                </div>

                <div class="w-full mt-6">
                    <label class="block font-semibold text-lg">Picture of Grade 10 Card<span class="text-red-500 font-bold"> *</span></label>
                    <label class="text-sm font-normal"><i> FRONT and BACK of the Card</i></label>
                    <input type="file" class="w-full p-3 border rounded mt-3"  name="image" accept="image/*">
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
                    <select class="w-full p-3 border rounded-md mb-4" value="{{$learner->chosen_strand}}" name="chosen_strand">
                        <option value="hums" {{ $learner->chosen_strand == 'hums' ? 'selected' : '' }}>HUMSS - Humanities and Social Sciences</option>
                        <option value="ia-as" {{ $learner->chosen_strand == 'ia-as' ? 'selected' : '' }}>Industrial Arts - Automotive Servicing (NC II)</option> 
                        <option value="ia-eim" {{ $learner->chosen_strand == 'ia-eim' ? 'selected' : '' }}>Industrial Arts - Electrical Installation and Maintenance (NC II)</option> 
                        <option value="ia-epas" {{ $learner->chosen_strand == 'ia-epas' ? 'selected' : '' }}>Industrial Arts - Electronic Products Assembly and Servicing (NC II)</option>   
                        <option value="ia-smaw" {{ $learner->chosen_strand == 'ia-smaw' ? 'selected' : '' }}>Industrial Arts - Shielded Metal Arc Welding (NC I & NC II)</option>
                        <option value="he-brpfbs" {{ $learner->chosen_strand == 'he-brpfbs' ? 'selected' : '' }}>Home Economics - Bread & Pastry Production (NC II), Food & Beverage Services (NC II) and Cookery (NC II)</option> 
                        <option value="he-dt" {{ $learner->chosen_strand == 'he-dt' ? 'selected' : '' }}>Home Economics - Dressmaking (NC II) and Tailoring (NC II)</option> 
                        <option value="he-hbc" {{ $learner->chosen_strand == 'he-hbc' ? 'selected' : '' }}>Home Economics - Hairdressing (NC II), Beauty Care (NC II) and Nail Care (NC II)</option>   
                        <option value="ict-css" {{ $learner->chosen_strand == 'ict-css' ? 'selected' : '' }}>Information and Communication Technology - Computer Systems Servicing (NC II)</option>
                        <option value="ict-td" {{ $learner->chosen_strand == 'ict-td' ? 'selected' : '' }}>Information and Communication Technology - Technical Drafting (NC II) and Illustration (NC II)</option>  
                    </select>
                </div>

                <input type="hidden" value="Pending" name="status">

                <div class="mt-6 text-center">
                    <button type="submit" class="bg-blue-500 text-white px-6 py-3 rounded-lg font-semibold hover:bg-blue-600">
                        Submit Enrollment
                    </button>
                </div>
            </form>
        </div>
    </section>
</x-layout>
