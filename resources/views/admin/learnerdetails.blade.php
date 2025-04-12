<x-admin-dashboard-layout>
    <div class="min-h-screen flex flex-col items-center bg-white p-8 shadow-lg rounded-xl">
        <div class="w-full max-w-6xl h-screen mt-6 p-6 bg-gray-100 shadow-md rounded-md">
            <div class="pt-6 text-center mb-10">
                <h1 class="text-4xl font-bold text-gray-800">Learner Details</h1>
            </div>
            <form action="" method="POST">
                @csrf
                @method('PUT')
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Last Name -->
                    <div>
                        <label class="block font-semibold text-lg text-gray-700 mb-2">Last Name</label>
                        <input type="text" name="last_name" value="{{ $learner->last_name }}" placeholder="Enter Last Name" class="input" />
                    </div>
            
                    <!-- First Name -->
                    <div>
                        <label class="block font-semibold text-lg text-gray-700 mb-2">First Name</label>
                        <input type="text" name="first_name" value="{{ $learner->first_name }}" placeholder="Enter First Name" class="input" />
                    </div>
            
                    <!-- Middle Name -->
                    <div>
                        <label class="block font-semibold text-lg text-gray-700 mb-2">Middle Name</label>
                        <input type="text" name="middle_name" value="{{ $learner->middle_name }}" placeholder="Enter Middle Name" class="input" />
                    </div>
            
                    <!-- Extension Name -->
                    <div>
                        <label class="block font-semibold text-lg text-gray-700 mb-2">Extension Name</label>
                        <input type="text" name="extension_name" value="{{ $learner->extension_name }}" placeholder="Enter Extension Name" class="input" />
                    </div>
            
                    <!-- LRN -->
                    <div>
                        <label class="block font-semibold text-lg text-gray-700 mb-2">LRN</label>
                        <input type="text" name="lrn" value="{{ $learner->lrn }}" class="input" />
                    </div>
            
                    <!-- Birthdate -->
                    <div>
                        <label class="block font-semibold text-lg text-gray-700 mb-2">Birthdate</label>
                        <input type="date" name="birthdate" value="{{ $learner->birthdate }}" class="input" />
                    </div>
            
                    <!-- Age -->
                    <div>
                        <label class="block font-semibold text-lg text-gray-700 mb-2">Age</label>
                        <input type="number" name="age" value="{{ $learner->age }}" class="input" />
                    </div>
            
                    <!-- Gender -->
                    <div>
                        <label class="block font-semibold text-lg text-gray-700 mb-2">Gender</label>
                        <select name="gender" class="input">
                            <option value="Male" {{ $learner->gender === 'Male' ? 'selected' : '' }}>Male</option>
                            <option value="Female" {{ $learner->gender === 'Female' ? 'selected' : '' }}>Female</option>
                        </select>
                    </div>
            
                    <!-- Beneficiary -->
                    <div>
                        <label class="block font-semibold text-lg text-gray-700 mb-2">Beneficiary</label>
                        <input type="text" name="beneficiary" value="{{ $learner->beneficiary }}" class="input" />
                    </div>
            
                    <!-- Address: Street -->
                    <div>
                        <label class="block font-semibold text-lg text-gray-700 mb-2">Street</label>
                        <input type="text" name="street" value="{{ $learner->street }}" class="input" />
                    </div>
            
                    <!-- Baranggay -->
                    <div>
                        <label class="block font-semibold text-lg text-gray-700 mb-2">Baranggay</label>
                        <input type="text" name="baranggay" value="{{ $learner->baranggay }}" class="input" />
                    </div>
            
                    <!-- Municipality -->
                    <div>
                        <label class="block font-semibold text-lg text-gray-700 mb-2">Municipality</label>
                        <input type="text" name="municipality" value="{{ $learner->municipality }}" class="input" />
                    </div>
            
                    <!-- Province -->
                    <div>
                        <label class="block font-semibold text-lg text-gray-700 mb-2">Province</label>
                        <input type="text" name="province" value="{{ $learner->province }}" class="input" />
                    </div>
            
                    <!-- Guardian Name -->
                    <div>
                        <label class="block font-semibold text-lg text-gray-700 mb-2">Guardian Name</label>
                        <input type="text" name="guardian_name" value="{{ $learner->guardian_name }}" class="input" />
                    </div>
            
                    <!-- Guardian Contact -->
                    <div>
                        <label class="block font-semibold text-lg text-gray-700 mb-2">Guardian Contact</label>
                        <input type="text" name="guardian_contact" value="{{ $learner->guardian_contact }}" class="input" />
                    </div>
            
                    <!-- Relationship to Guardian -->
                    <div>
                        <label class="block font-semibold text-lg text-gray-700 mb-2">Relationship to Guardian</label>
                        <input type="text" name="relationship_guardian" value="{{ $learner->relationship_guardian }}" class="input" />
                    </div>
            
                    <!-- Last School Year -->
                    <div>
                        <label class="block font-semibold text-lg text-gray-700 mb-2">Last School Year Attended</label>
                        <input type="text" name="last_sy" value="{{ $learner->last_sy }}" class="input" />
                    </div>
            
                    <!-- Last School Attended -->
                    <div>
                        <label class="block font-semibold text-lg text-gray-700 mb-2">Last School Attended</label>
                        <input type="text" name="last_school" value="{{ $learner->last_school }}" class="input" />
                    </div>
            
                    <!-- Learner Category -->
                    <div>
                        <label class="block font-semibold text-lg text-gray-700 mb-2">Learner Category</label>
                        <input type="text" name="learner_category" value="{{ $learner->learner_category }}" class="input" />
                    </div>
            
                    <!-- Grade 10 Section -->
                    <div>
                        <label class="block font-semibold text-lg text-gray-700 mb-2">Grade 10 Section</label>
                        <input type="text" name="grade10_section" value="{{ $learner->grade10_section }}" class="input" />
                    </div>
            
                    <!-- Chosen Strand -->
                    <div>
                        <label class="block font-semibold text-lg text-gray-700 mb-2">Chosen Strand</label>
                        <input type="text" name="chosen_strand" value="{{ $learner->chosen_strand }}" class="input" />
                    </div>
            
                    <!-- Status -->
                    <div>
                        <label class="block font-semibold text-lg text-gray-700 mb-2">Status</label>
                        <input type="text" name="status" value="{{ $learner->status }}" class="input" />
                    </div>
            
                    <!-- Image (optional) -->
                    <div>
                        <label class="block font-semibold text-lg text-gray-700 mb-2">Image</label>
                        <input type="file" name="image" class="input" />
                        @if ($learner->image)
                            <p class="text-sm mt-2">Current: {{ $learner->image }}</p>
                        @endif
                    </div>
            
                    <!-- School Year -->
                    <div>
                        <label class="block font-semibold text-lg text-gray-700 mb-2">School Year</label>
                        <input type="text" name="school_year" value="{{ $learner->school_year }}" class="input" />
                    </div>
            
                    <!-- Grade Level -->
                    <div>
                        <label class="block font-semibold text-lg text-gray-700 mb-2">Grade Level</label>
                        <input type="text" name="grade_level" value="{{ $learner->grade_level }}" class="input" />
                    </div>
            
                    <!-- Hidden ID -->
                    <input type="hidden" name="id" value="{{ request('id') }}">
                </div>
            
                <button type="submit" class="mt-6 text-center bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-3 rounded-md shadow-md">
                    Update Details
                </button>
            </form>            
        </div>
    </div>
</x-admin-dashboard-layout>