<x-layout>
    <section class="min-h-screen flex items-center justify-center bg-gray-100 p-4">
        <div class="bg-white p-8 sm:p-10 rounded-lg shadow-lg w-full max-w-4xl">
            <h1 class="text-2xl sm:text-3xl font-bold text-center mb-6">Enrollment Form</h1>
            <form action="{{ route('registerLearner') }}" method="POST" enctype="multipart/form-data">
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
                        <select class="w-full p-3 border rounded" name="grade_level">
                            <option value="{{ $enrollment->grade_level }}">{{ $enrollment->grade_level }}</option>
                        </select>
                    </div>

                    <div>
                        <label class="block font-semibold mb-2 text-lg">Last Name<span class="text-red-500 font-bold"> *</span></label>
                        <input type="text" class="w-full p-3 border rounded" name="last_name" placeholder="Enter Last Name" required>
                    </div>
                    <div>
                        <label class="block font-semibold mb-2 text-lg">First Name<span class="text-red-500 font-bold"> *</span></label>
                        <input type="text" class="w-full p-3 border rounded" name="first_name" placeholder="Enter First Name" required>
                    </div>

                    <div>
                        <label class="block font-semibold mb-2 text-lg">Middle Name</label>
                        <input type="text" class="w-full p-3 border rounded" name="middle_name" placeholder="Enter Middle Name">
                    </div>
                    <div>
                        <label class="block font-semibold mb-2 text-lg">Extension Name</label>
                        <input type="text" class="w-full p-3 border rounded" name="extension_name" placeholder="Enter Extension Name">
                    </div>

                    <div>
                        <label class="block font-semibold mb-2 text-lg">LRN (Learner Reference Number)<span class="text-red-500 font-bold"> *</span></label>
                        <input type="number" class="w-full p-3 border rounded" name="lrn" placeholder="Enter LRN" required>
                    </div>
                    <div>
                        <label class="block font-semibold mb-2 text-lg">Birthdate<span class="text-red-500 font-bold"> *</span></label>
                        <input type="date" name="birthdate" class="w-full p-3 border rounded" required>
                    </div>

                    <div>
                        <label class="block font-semibold mb-2 text-lg">Age<span class="text-red-500 font-bold"> *</span></label>
                        <input type="number" class="w-full p-3 border rounded" name="age" placeholder="Enter Age" required>
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
                </div>
                
                <div>
                    <label class="block font-semibold mb-2 text-lg mt-4">
                        Are you a beneficiary of 4Ps? (Ikaw ba ay benepisyaryo ng 4Ps?)<span class="text-red-500 font-bold"> *</span>
                    </label>
                    <div class="flex items-center space-x-4">
                        <label class="flex items-center">
                            <input type="radio" name="beneficiary" value="Yes" class="mr-2 w-6 h-6" required> Yes
                        </label>
                        <label class="flex items-center">
                            <input type="radio" name="beneficiary" value="No" class="mr-2 w-6 h-6" required> No
                        </label>
                    </div>
                </div>  

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-4">
                    <div>
                        <label class="block font-semibold mb-2 text-lg">House No./ Street<span class="text-red-500 font-bold"> *</span></label>
                        <input type="text" class="w-full p-3 border rounded" name="street" placeholder="Enter Address">
                    </div>
                    <div>
                        <label class="block font-semibold mb-2 text-lg">Barangay<span class="text-red-500 font-bold"> *</span></label>
                        <input type="text" class="w-full p-3 border rounded" name="baranggay" placeholder="Enter Barangay" required>
                    </div>

                    <div>
                        <label class="block font-semibold mb-2 text-lg">Municipality/ City<span class="text-red-500 font-bold"> *</span></label>
                        <input type="text" class="w-full p-3 border rounded" name="municipality" placeholder="Enter City" required>
                    </div>
                    <div>
                        <label class="block font-semibold mb-2 text-lg">Province<span class="text-red-500 font-bold"> *</span></label>
                        <input type="text" class="w-full p-3 border rounded" name="province" placeholder="Enter Province" required>
                    </div>

                    <div>
                        <label class="block font-semibold mb-2 text-lg">Guardian's Name<span class="text-red-500 font-bold"> *</span></label>
                        <input type="text" class="w-full p-3 border rounded" name="guardian_name" placeholder="Enter Guardian's Name" required>
                    </div>
                    <div>
                        <label class="block font-semibold mb-2 text-lg">Guardian's Contact<span class="text-red-500 font-bold"> *</span></label>
                        <input type="number" class="w-full p-3 border rounded" name="guardian_contact" placeholder="Enter Contact" required>
                    </div>
                </div>

                <div>
                    <label class="block font-semibold mb-2 text-lg mt-4">
                        Relationship with the Guardian (Kaano-ano mo ang iyong Guardian?)
                        <span class="text-red-500 font-bold"> *</span>
                    </label>
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
                

                <!-- Last School Information -->
                <div class="w-full mt-6">
                    <label class="block font-semibold text-lg">Last School Year Attended<span class="text-red-500 font-bold"> *</span></label>
                    <input type="text" class="w-full p-3 border rounded mt-2" name="last_sy" placeholder="Enter Last School Year" required>
                </div>
                <div class="w-full mt-6">
                    <label class="block font-semibold text-lg">Last School Attended<span class="text-red-500 font-bold"> *</span></label>
                    <label class="text-sm font-normal mb-2"><i> Buong pangalan ng Paaralan (e.g. Amaya School of Home Industries)</i></label>
                    <input type="text" class="w-full p-3 border rounded" name="last_school" placeholder="Enter Last School Attended" required>
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
                            <option value="{{ $category->id }}"
                                {{ old('learner_category', $learner->learner_category ?? '') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>                             
                </div>

                <div class="w-full mt-6">
                    <label class="block font-semibold mb-2 text-lg">Grade 10 Section<span class="text-red-500 font-bold"> *</span></label>
                    <input type="text" class="w-full p-3 border rounded" name="grade10_section" placeholder="Enter Grade 10 section" required>
                </div>

                <div class="w-full mt-6">
                    <label class="block font-semibold text-lg">Picture of Grade 10 Card<span class="text-red-500 font-bold"> *</span></label>
                    <label class="text-sm font-normal"><i> FRONT and BACK of the Card</i></label>
                    <input type="file" class="w-full p-3 border rounded mt-3"  name="image" accept="image/*" required>
                </div>

                <div class="w-full mt-6">
                    <label class="block font-semibold mb-4 text-lg bg-blue-200 p-4 text-center">OFFERED STRANDS AND SPECIALIZATION</label>
                    <div class="bg-white p-4 rounded-md border shadow mb-2">
                
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
                                <option value="{{ $strand->id }}"
                                    {{ old('chosen_strand', $enrollment->chosen_strand ?? '') == $strand->id ? 'selected' : '' }}>
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
                @endforeach
            </form>
        </div>
    </section>

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
    
</x-layout>
