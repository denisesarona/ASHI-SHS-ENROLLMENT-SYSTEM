<x-admin-dashboard-layout>
    <div class="min-h-screen flex flex-col items-center bg-white p-8 shadow-lg rounded-xl">
        <div class="pt-8">
            <h1 class="text-4xl font-bold text-center mb-10">ADD LEARNER</h1>
            <form action="{{ route('addnewlearner') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    @foreach ($enrollments as $enrollment)
                        <div>
                            <label class="block font-semibold mb-2 text-lg">School Year<span class="text-red-500 font-bold"> *</span></label>
                            <select class="w-full p-3 border rounded" name="school_year">
                                <option value="{{ $enrollment->school_year }}">{{ $enrollment->school_year }}</option>
                            </select>
                        </div>
                        <div>
                            <label class="block font-semibold mb-2 text-lg">Grade Level<span class="text-red-500 font-bold"> *</span></label>
                            <select class="w-full p-3 border rounded" name="school_year">
                                <option value="{{ $enrollment->grade_level }}">{{ $enrollment->grade_level }}</option>
                            </select>
                        </div>
                    @endforeach
                    <div>
                        <label class="block font-semibold text-lg text-gray-700 mb-2">Last Name<span class="text-red-500 font-bold"> *</span></label>
                        <input type="text" class="w-full p-3 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-2 focus:ring-blue-500" 
                               name="last_name" placeholder="Enter Last Name" required>
                    </div>
                    <div>
                        <label class="block font-semibold text-lg text-gray-700 mb-2">First Name<span class="text-red-500 font-bold"> *</span></label>
                        <input type="text" class="w-full p-3 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-2 focus:ring-blue-500" 
                               name="first_name" placeholder="Enter First Name" required>
                    </div>
                    <div>
                        <label class="block font-semibold text-lg text-gray-700 mb-2">Middle Names</label>
                        <input type="text" class="w-full p-3 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-2 focus:ring-blue-500" 
                               name="middle_name" placeholder="Enter Middle Name">
                    </div>
                    <div>
                        <label class="block font-semibold text-lg text-gray-700 mb-2">Extension Name</label>
                        <input type="text" class="w-full p-3 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-2 focus:ring-blue-500" 
                               name="extension_name" placeholder="Enter Extension Name">
                    </div>
                    <div>
                        <label class="block font-semibold text-lg text-gray-700 mb-2">Learners Reference Number (LRN)<span class="text-red-500 font-bold"> *</span></label>
                        <input type="number" class="w-full p-3 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-2 focus:ring-blue-500" 
                               name="lrn" placeholder="Enter LRN" required>
                    </div>
                    <div>
                        <label class="block font-semibold text-lg text-gray-700 mb-2">Birthdate<span class="text-red-500 font-bold"> *</span></label>
                        <input type="date" class="w-full p-3 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-2 focus:ring-blue-500" 
                               name="birthdate" required">
                    </div>
                    <div>
                        <label class="block font-semibold text-lg text-gray-700 mb-2">Age<span class="text-red-500 font-bold"> *</span></label>
                        <input type="number" class="w-full p-3 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-2 focus:ring-blue-500" 
                               name="age" placeholder="Enter Age" required>
                    </div>
                    <div>
                        <label class="block font-semibold mb-2 text-lg">Gender<span class="text-red-500 font-bold"> *</span></label>
                        <div class="flex items-center space-x-4">
                            <label class="flex items-center">
                                <input type="radio" name="gender" value="Male" class="mr-2 w-6 h-6" required> Male
                            </label>
                            <label class="flex items-center">
                                <input type="radio" name="gender" value="Female" class="mr-2 w-6 h-6" required> Female
                            </label>
                        </div>
                    </div>
                    <div>
                        <label class="block font-semibold mb-2 text-lg">Are you a beneficiary of 4Ps? (Ikaw ba ay benepisyaryo ng 4Ps?)<span class="text-red-500 font-bold"> *</span></label>
                        <div class="flex items-center space-x-4">
                            <label class="flex items-center">
                                <input type="radio" name="beneficiary" value="Yes" class="mr-2 w-6 h-6" required> Yes
                            </label>
                            <label class="flex items-center">
                                <input type="radio" name="beneficiary" value="No" class="mr-2 w-6 h-6" required> No
                            </label>
                        </div>
                    </div>
                    
                    <div>
                        <label class="block font-semibold text-lg text-gray-700 mb-2">House No./ Street<span class="text-red-500 font-bold"> *</span></label>
                        <input type="text" class="w-full p-3 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-2 focus:ring-blue-500" 
                            name="street" placeholder="Enter House No./ Street" required>
                    </div>

                    <div>
                        <label class="block font-semibold text-lg text-gray-700 mb-2">Baranggay<span class="text-red-500 font-bold"> *</span></label>
                        <input type="text" class="w-full p-3 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-2 focus:ring-blue-500" 
                               name="baranggay" placeholder="Enter Baranggay" required>
                    </div>
                    <div>
                        <label class="block font-semibold text-lg text-gray-700 mb-2">Municipality<span class="text-red-500 font-bold"> *</span></label>
                        <input type="text" class="w-full p-3 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-2 focus:ring-blue-500" 
                               name="municipality" placeholder="Enter Municipality" required>
                    </div>
                    <div>
                        <label class="block font-semibold text-lg text-gray-700 mb-2">Province<span class="text-red-500 font-bold"> *</span></label>
                        <input type="text" class="w-full p-3 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-2 focus:ring-blue-500" 
                               name="province" placeholder="Enter Province" required>
                    </div>
                    <div>
                        <label class="block font-semibold text-lg text-gray-700 mb-2">Guardian Name<span class="text-red-500 font-bold"> *</span></label>
                        <input type="text" class="w-full p-3 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-2 focus:ring-blue-500" 
                               name="guardian_name" placeholder="Enter Guardian Name" required>
                    </div>
                    <div>
                        <label class="block font-semibold text-lg text-gray-700 mb-2">Guardian's Contact<span class="text-red-500 font-bold"> *</span></label>
                        <input type="number" class="w-full p-3 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-2 focus:ring-blue-500" 
                               name="guardian_contact" placeholder="Enter Guardian's Contact" required>
                    </div>

                    <div>
                        <label class="block font-semibold mb-2 text-lg">Relationship with the Guardian (Kaano-ano mo ang iyong Guardian?)<span class="text-red-500 font-bold"> *</span></label>
                        <div class="flex items-center space-x-4">
                            <label class="flex items-center">
                                <input type="radio" name="relationship_guardian" value="Mother" class="mr-2 w-6 h-6"> Mother
                            </label>
                            <label class="flex items-center">
                                <input type="radio" name="relationship_guardian" value="Father" class="mr-2 w-6 h-6"> Father
                            </label>
                            <div class="w-full">
                                <label class="text-md block mb-1">Others:</label>
                                <input type="text" class="p-2 border rounded w-full" id="relationship_other" placeholder="Enter Relationship with the Guardian">
                            
                                <input type="hidden" name="relationship_guardian" id="relationship_hidden">
                            </div>
                        </div>
                    </div>
                    <div>
                        <label class="block font-semibold text-lg text-gray-700">Last School Year Attended<span class="text-red-500 font-bold"> *</span></label>
                        <label class="text-sm font-normal mb-2"><i> EXAMPLE: 2024-2025</i></label>
                        <input type="text" class="w-full p-3 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-2 focus:ring-blue-500" 
                               name="lastt_sy" placeholder="Enter Last School Year Attended" required>
                    </div>
                    <div>
                        <label class="block font-semibold text-lg text-gray-700">Last School Attended<span class="text-red-500 font-bold"> *</span></label>
                        <label class="text-sm font-normal mb-2"><i> Buong pangalan ng Paaralan (e.g. Amaya School of Home Industries)</i></label>
                        <input type="text" class="w-full p-3 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-2 focus:ring-blue-500" 
                               name="last_school" placeholder="Enter Last School Attended" required>
                    </div>
                </div>

                <div class="w-full mt-6 p-4 bg-gray-100 mb-4">
                    <label class="block font-semibold mb-2 text-lg p-2 text-center">Choose a Learner's Category <span class="text-red-500 font-bold"> *</span></label>
                    <div class="bg-white p-4 border shadow rounded-md mb-2">
                
                        @foreach ($categories as $category)
                            <p class="text-sm"><i>
                                <strong class="uppercase">{{ $category->name }}</strong> - {{ $category->description }}
                            </i></p>
                        @endforeach
                    </div>

                    <select name="learner_category" class="w-full p-3 border rounded-md mb-4">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>                             
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block font-semibold text-lg text-gray-700 mb-2">Grade 10 section<span class="text-red-500 font-bold"> *</span></label>
                        <input type="text" class="w-full p-3 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-2 focus:ring-blue-500" 
                               name="grade10_section" placeholder="Enter Grade 10 section" required>
                    </div>
                    <div>
                        <label class="block font-semibold text-lg text-gray-700 mb-2">Picture of Grade 10 Card<span class="text-red-500 font-bold"> *</span><span class="text-sm font-normal"><i> FRONT and BACK of the Card</i></span></label>
                        <input type="file" class="w-full p-3 border rounded" name="image" accept="image/*">
                    </div>
                </div>
                <div class="w-full mt-6 p-4 bg-gray-100">
                    <label class="block font-semibold mb-4 text-lg bg-blue-200 p-4 text-center">OFFERED STRANDS AND SPECIALIZATION</label>
                    <div class="bg-white p-4 border rounded-md mb-2">
                
                        @foreach ($tracks as $track)
                            @foreach ($track->strands as $strand)
                                <p class="text-md">
                                    <strong>{{ $track->name }}</strong> - {{ $strand->name }}
                                </p>
                            @endforeach
                        @endforeach
                    </div>

                    <select name="chosen_strand" class="w-full p-3 border rounded-md mb-4">
                        @foreach ($tracks as $track)
                            @foreach ($track->strands as $strand)
                                <option value="{{ $strand->id }}">
                                    {{ $track->name }} - {{ $strand->name }}
                                </option>
                            @endforeach
                        @endforeach
                    </select>                             
                </div>

                <input type="hidden" value="pending" name="status">

                <div class="mt-6 text-center">
                    <button type="submit" class="bg-blue-500 text-white px-6 py-3 rounded-lg font-semibold hover:bg-blue-600">
                        Submit Enrollment
                    </button>
                </div>
            </form>           
        </div>
    </div>

    <script>
        // When the user types in the "Others" input field
        document.getElementById('relationship_other').addEventListener('input', function() {
            var relationshipInput = document.getElementById('relationship_other').value;
            if (relationshipInput) {
                // If "Others" is entered, set the hidden input to the value entered
                document.getElementById('relationship_hidden').value = relationshipInput;
            } else {
                // If "Others" is cleared, reset the hidden input
                document.getElementById('relationship_hidden').value = '';
            }
        });
    
        // When any radio button is selected, update the hidden input field
        document.querySelectorAll('input[name="relationship_guardian"]').forEach(function(radio) {
            radio.addEventListener('change', function() {
                // If "Mother" or "Father" is selected, disable the "Others" input field
                if (this.value === 'Mother' || this.value === 'Father') {
                    document.getElementById('relationship_other').disabled = true;
                    document.getElementById('relationship_other').value = ''; // Clear "Others" input if it's active
                    document.getElementById('relationship_hidden').value = this.value; // Set the hidden field
                } else if (this.value === 'Others') {
                    // If "Others" is selected, enable the "Others" input field
                    document.getElementById('relationship_other').disabled = false;
                    document.getElementById('relationship_hidden').value = ''; // Clear the hidden field for custom input
                }
            });
        });
    </script>
</x-admin-dashboard-layout>

