<x-admin-dashboard-layout>
    <div class="min-h-screen flex flex-col items-center bg-white p-8 shadow-lg rounded-xl">
        <div class="pt-8">
            <h1 class="text-4xl font-bold text-center mb-10">LEARNERS DETAILS</h1>
            <form action="{{ route('updatelearner', $learner->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block font-semibold text-lg text-gray-700 mb-2">School Year<span class="text-red-500 font-bold"> *</span></label>
                        <input type="number" class="w-full p-3 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-2 focus:ring-blue-500" 
                               name="school_year" value="{{ $learner->school_year }}" disabled>
                    </div>
                    <div>
                        <label class="block font-semibold text-lg text-gray-700 mb-2">Grade Level<span class="text-red-500 font-bold"> *</span></label>
                        <input type="number" class="w-full p-3 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-2 focus:ring-blue-500" 
                               name="grade_level" value="{{ $learner->grade_level }}" disabled>
                    </div>
                    <div>
                        <label class="block font-semibold text-lg text-gray-700 mb-2">Last Name<span class="text-red-500 font-bold"> *</span></label>
                        <input type="text" class="w-full p-3 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-2 focus:ring-blue-500" 
                               name="last_name" value="{{ $learner->last_name }}" placeholder="Enter Last Name" required>
                    </div>
                    <div>
                        <label class="block font-semibold text-lg text-gray-700 mb-2">First Name<span class="text-red-500 font-bold"> *</span></label>
                        <input type="text" class="w-full p-3 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-2 focus:ring-blue-500" 
                               name="first_name" value="{{ $learner->first_name }}" placeholder="Enter First Name" required>
                    </div>
                    <div>
                        <label class="block font-semibold text-lg text-gray-700 mb-2">Middle Name<span class="text-red-500 font-bold"> *</span></label>
                        <input type="text" class="w-full p-3 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-2 focus:ring-blue-500" 
                               name="middle_name" value="{{ $learner->middle_name }}" placeholder="Enter Middle Name" required>
                    </div>
                    <div>
                        <label class="block font-semibold text-lg text-gray-700 mb-2">Extension Name</label>
                        <input type="text" class="w-full p-3 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-2 focus:ring-blue-500" 
                               name="extension_name" value="{{ $learner->extension_name }}" placeholder="Enter Extension Name">
                    </div>
                    <div>
                        <label class="block font-semibold text-lg text-gray-700 mb-2">Learners Reference Number (LRN)<span class="text-red-500 font-bold"> *</span></label>
                        <input type="number" class="w-full p-3 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-2 focus:ring-blue-500" 
                               name="lrn" value="{{ $learner->lrn }}" placeholder="Enter LRN" required>
                    </div>
                    <div>
                        <label class="block font-semibold text-lg text-gray-700 mb-2">Birthdate<span class="text-red-500 font-bold"> *</span></label>
                        <input type="date" class="w-full p-3 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-2 focus:ring-blue-500" 
                               name="birthdate" value="{{ $learner->birthdate }}">
                    </div>
                    <div>
                        <label class="block font-semibold text-lg text-gray-700 mb-2">Age<span class="text-red-500 font-bold"> *</span></label>
                        <input type="number" class="w-full p-3 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-2 focus:ring-blue-500" 
                               name="age" value="{{ $learner->age }}" placeholder="Enter Age" required>
                    </div>
                    <div>
                        <label class="block font-semibold mb-2 text-lg">Gender<span class="text-red-500 font-bold"> *</span></label>
                        <div class="flex items-center space-x-4">
                            <label class="flex items-center">
                                <input type="radio" name="gender" value="Male" class="mr-2 w-6 h-6" required {{ $learner->gender == 'Male' ? 'checked' : '' }}> Male
                            </label>
                            <label class="flex items-center">
                                <input type="radio" name="gender" value="Female" class="mr-2 w-6 h-6" required {{ $learner->gender == 'Female' ? 'checked' : '' }}> Female
                            </label>
                        </div>
                    </div>
                    <div>
                        <label class="block font-semibold mb-2 text-lg">Are you a beneficiary of 4Ps? (Ikaw ba ay benepisyaryo ng 4Ps?)<span class="text-red-500 font-bold"> *</span></label>
                        <div class="flex items-center space-x-4">
                            <label class="flex items-center">
                                <input type="radio" name="beneficiary" value="Yes" class="mr-2 w-6 h-6" required {{ $learner->beneficiary == 'Yes' ? 'checked' : '' }}> Yes
                            </label>
                            <label class="flex items-center">
                                <input type="radio" name="beneficiary" value="No" class="mr-2 w-6 h-6" required {{ $learner->beneficiary == 'No' ? 'checked' : '' }}> No
                            </label>
                        </div>
                    </div>
                    
                    <div>
                        <label class="block font-semibold text-lg text-gray-700 mb-2">House No./ Street<span class="text-red-500 font-bold"> *</span></label>
                        <input type="text" class="w-full p-3 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-2 focus:ring-blue-500" 
                            name="street" value="{{ $learner->street }}" placeholder="Enter House No./ Street" required>
                    </div>

                    <div>
                        <label class="block font-semibold text-lg text-gray-700 mb-2">Baranggay<span class="text-red-500 font-bold"> *</span></label>
                        <input type="text" class="w-full p-3 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-2 focus:ring-blue-500" 
                               name="baranggay" value="{{ $learner->baranggay }}" placeholder="Enter Baranggay" required>
                    </div>
                    <div>
                        <label class="block font-semibold text-lg text-gray-700 mb-2">Municipality<span class="text-red-500 font-bold"> *</span></label>
                        <input type="text" class="w-full p-3 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-2 focus:ring-blue-500" 
                               name="municipality" value="{{ $learner->municipality }}" placeholder="Enter Municipality" required>
                    </div>
                    <div>
                        <label class="block font-semibold text-lg text-gray-700 mb-2">Province<span class="text-red-500 font-bold"> *</span></label>
                        <input type="text" class="w-full p-3 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-2 focus:ring-blue-500" 
                               name="province" value="{{ $learner->province }}" placeholder="Enter Province" required>
                    </div>
                    <div>
                        <label class="block font-semibold text-lg text-gray-700 mb-2">Guardian Name<span class="text-red-500 font-bold"> *</span></label>
                        <input type="text" class="w-full p-3 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-2 focus:ring-blue-500" 
                               name="guardian_name" value="{{ $learner->guardian_name }}" placeholder="Enter Guardian Name" required>
                    </div>
                    <div>
                        <label class="block font-semibold text-lg text-gray-700 mb-2">Guardian's Contact<span class="text-red-500 font-bold"> *</span></label>
                        <input type="number" class="w-full p-3 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-2 focus:ring-blue-500" 
                               name="guardian_contact" value="{{ $learner->guardian_contact }}" placeholder="Enter Guardian's Contact" required>
                    </div>

                    <div>
                        <label class="block font-semibold mb-2 text-lg">Relationship with the Guardian (Kaano-ano mo ang iyong Guardian?)<span class="text-red-500 font-bold"> *</span></label>
                        <div class="flex items-center space-x-4">
                            <label class="flex items-center">
                                <input type="radio" name="relationship_guardian" value="Mother" class="mr-2 w-6 h-6"{{ $learner->relationship_guardian == 'Mother' ? 'checked' : '' }}> Mother
                            </label>
                            <label class="flex items-center">
                                <input type="radio" name="relationship_guardian" value="Father" class="mr-2 w-6 h-6"{{ $learner->relationship_guardian == 'Father' ? 'checked' : '' }}> Father
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
                    <div>
                        <label class="block font-semibold text-lg text-gray-700">Last School Year Attended<span class="text-red-500 font-bold"> *</span></label>
                        <label class="text-sm font-normal mb-2"><i> EXAMPLE: 2024-2025</i></label>
                        <input type="text" class="w-full p-3 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-2 focus:ring-blue-500" 
                               name="lastt_sy" value="{{ $learner->last_sy }}" placeholder="Enter Last School Year Attended" required>
                    </div>
                    <div>
                        <label class="block font-semibold text-lg text-gray-700">Last School Attended<span class="text-red-500 font-bold"> *</span></label>
                        <label class="text-sm font-normal mb-2"><i> Buong pangalan ng Paaralan (e.g. Amaya School of Home Industries)</i></label>
                        <input type="text" class="w-full p-3 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-2 focus:ring-blue-500" 
                               name="last_school" value="{{ $learner->last_school }}" placeholder="Enter Last School Attended" required>
                    </div>
                </div>
                <div class="w-full mt-6 justify-items-center text-center bg-gray-100 p-4 mb-4">
                    <label class="block font-semibold mb-4 text-lg">
                        Choose a Learner's Category <span class="text-red-500 font-bold"> *</span>
                    </label>
                    <div class="w-full bg-white p-4 rounded-md mb-4 text-start">
                        <p class="italic text-sm"><strong>REGULAR</strong> - G10 graduates of SY 2023-2024.</p>
                        <p class="italic text-sm"><strong>BALIK-ARAL</strong> - G10 graduates of SY 2022-2023 or earlier who haven't enrolled in G11.</p>
                        <p class="italic text-sm"><strong>REPEATER</strong> - Previously enrolled in G11 but didn't finish.</p>
                        <p class="italic text-sm"><strong>ALS GRADUATE</strong> - ALS Junior High School graduates.</p>
                    </div>
                    <select class="w-full block p-4 border rounded-md mb-4" name="learner_category">
                        <option value="regular" {{ $learner->learner_category == 'regular' ? 'selected' : '' }}>Regular</option>
                        <option value="balik-aral" {{ $learner->learner_category == 'balik-aral' ? 'selected' : '' }}>Balik-Aral</option>
                        <option value="repeater" {{ $learner->learner_category == 'repeater' ? 'selected' : '' }}>Repeater</option>
                        <option value="als-graduate" {{ $learner->learner_category == 'als-graduate' ? 'selected' : '' }}>ALS Graduate</option>
                    </select>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block font-semibold text-lg text-gray-700 mb-2">Grade 10 section<span class="text-red-500 font-bold"> *</span></label>
                        <input type="text" class="w-full p-3 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-2 focus:ring-blue-500" 
                               name="grade10_section" value="{{ $learner->grade10_section }}" placeholder="Enter Grade 10 section" required>
                    </div>
                    <div>
                        <label class="block font-semibold text-lg text-gray-700 mb-2">Picture of Grade 10 Card<span class="text-red-500 font-bold"> *</span><span class="text-sm font-normal"><i> FRONT and BACK of the Card</i></span></label>
                        <input type="file" class="w-full p-3 border rounded" name="image" accept="image/*">
                    
                        @if($learner->image)
                            <div class="mt-2">
                                <img src="{{ asset('storage/' . $learner->image) }}" alt="Grade 10 Card" class="w-64 h-auto rounded">
                            </div>
                        @endif
                    </div>
                </div>
                <div class="w-full mt-6 bg-gray-100 p-4">
                    <label class="block font-semibold mb-4 text-lg bg-blue-200 p-4 text-center">OFFERED STRANDS<span class="text-red-500 font-bold"> *</span></label>
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

                <input type="hidden" name="id" value="{{ request('id') }}">
                <div class="mt-6 text-center">
                    <button type="submit" class="bg-blue-500 text-white px-6 py-3 rounded-lg font-semibold hover:bg-blue-600">
                        Submit Enrollment
                    </button>
                </div>
            </form>           
        </div>
    </div>
</x-admin-dashboard-layout>

