<x-admin-dashboard-layout>
    <div class="min-h-screen flex flex-col items-center bg-white p-8 shadow-lg rounded-xl">
        <div class="pt-8">
            <div class="pt-6 text-center mb-10">
                <h1 class="text-4xl font-bold text-gray-800">Learner Details</h1>
            </div>
            <form action="" method="POST">
                @csrf
                @method('PUT')
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block font-semibold text-lg text-gray-700 mb-2">School Year</label>
                        <input type="number" class="w-full p-3 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-2 focus:ring-blue-500" 
                               name="school_year" value="{{ $learner->school_year }}" disabled>
                    </div>
                    <div>
                        <label class="block font-semibold text-lg text-gray-700 mb-2">Grade Level</label>
                        <input type="number" class="w-full p-3 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-2 focus:ring-blue-500" 
                               name="grade_level" value="{{ $learner->grade_level }}" disabled>
                    </div>
                    <div>
                        <label class="block font-semibold text-lg text-gray-700 mb-2">Last Name</label>
                        <input type="text" class="w-full p-3 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-2 focus:ring-blue-500" 
                               name="last_name" value="{{ $learner->last_name }}" placeholder="Enter Last Name">
                    </div>
                    <div>
                        <label class="block font-semibold text-lg text-gray-700 mb-2">First Name</label>
                        <input type="text" class="w-full p-3 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-2 focus:ring-blue-500" 
                               name="first_name" value="{{ $learner->first_name }}" placeholder="Enter First Name">
                    </div>
                    <div>
                        <label class="block font-semibold text-lg text-gray-700 mb-2">Middle Name</label>
                        <input type="text" class="w-full p-3 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-2 focus:ring-blue-500" 
                               name="middle_name" value="{{ $learner->middle_name }}" placeholder="Enter Middle Name">
                    </div>
                    <div>
                        <label class="block font-semibold text-lg text-gray-700 mb-2">Extension Name</label>
                        <input type="text" class="w-full p-3 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-2 focus:ring-blue-500" 
                               name="extension_name" value="{{ $learner->extension_name }}" placeholder="Enter Extension Name">
                    </div>
                    <div>
                        <label class="block font-semibold text-lg text-gray-700 mb-2">Learners Reference Number (LRN)</label>
                        <input type="number" class="w-full p-3 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-2 focus:ring-blue-500" 
                               name="lrn" value="{{ $learner->lrn }}" placeholder="Enter LRN">
                    </div>
                    <div>
                        <label class="block font-semibold text-lg text-gray-700 mb-2">Birthdate</label>
                        <input type="date" class="w-full p-3 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-2 focus:ring-blue-500" 
                               name="birthdate" value="{{ $learner->birthdate }}">
                    </div>
                    <div>
                        <label class="block font-semibold text-lg text-gray-700 mb-2">Age</label>
                        <input type="number" class="w-full p-3 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-2 focus:ring-blue-500" 
                               name="age" value="{{ $learner->age }}" placeholder="Enter Age">
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
                        <label class="block font-semibold text-lg text-gray-700 mb-2">House No./ Street</label>
                        <input type="text" class="w-full p-3 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-2 focus:ring-blue-500" 
                            name="street" value="{{ $learner->street }}" placeholder="Enter House No./ Street">
                    </div>

                    <div>
                        <label class="block font-semibold text-lg text-gray-700 mb-2">Baranggay</label>
                        <input type="text" class="w-full p-3 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-2 focus:ring-blue-500" 
                               name="baranggay" value="{{ $learner->baranggay }}" placeholder="Enter Baranggay">
                    </div>
                    <div>
                        <label class="block font-semibold text-lg text-gray-700 mb-2">Municipality</label>
                        <input type="text" class="w-full p-3 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-2 focus:ring-blue-500" 
                               name="municipality" value="{{ $learner->municipality }}" placeholder="Enter Municipality">
                    </div>
                    <div>
                        <label class="block font-semibold text-lg text-gray-700 mb-2">Province</label>
                        <input type="text" class="w-full p-3 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-2 focus:ring-blue-500" 
                               name="province" value="{{ $learner->province }}" placeholder="Enter Province">
                    </div>
                    <div>
                        <label class="block font-semibold text-lg text-gray-700 mb-2">Guardian Name</label>
                        <input type="text" class="w-full p-3 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-2 focus:ring-blue-500" 
                               name="guardian_name" value="{{ $learner->guardian_name }}" placeholder="Enter Guardian Name">
                    </div>
                    <div>
                        <label class="block font-semibold text-lg text-gray-700 mb-2">Guardian's Contact</label>
                        <input type="number" class="w-full p-3 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-2 focus:ring-blue-500" 
                               name="guardian_contact" value="{{ $learner->guardian_contact }}" placeholder="Enter Guardian's Contact">
                    </div>

                    <div>
                        <label class="block font-semibold mb-2 text-lg">Relationship with the Guardian (Kaano-ano mo ang iyong Guardian?)<span class="text-red-500 font-bold"> *</span></label>
                        <div class="flex items-center space-x-4">
                            <label class="flex items-center">
                                <input type="radio" name="relationship_guardian" value="Mother" class="mr-2 w-6 h-6" required {{ $learner->relationship_guardian == 'Mother' ? 'checked' : '' }}> Mother
                            </label>
                            <label class="flex items-center">
                                <input type="radio" name="relationship_guardian" value="Father" class="mr-2 w-6 h-6" required {{ $learner->relationship_guardian == 'Father' ? 'checked' : '' }}> Father
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
                        <label class="block font-semibold text-lg text-gray-700 mb-2">Last School Year Attended</label>
                        <input type="number" class="w-full p-3 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-2 focus:ring-blue-500" 
                               name="lastt_sy" value="{{ $learner->last_sy }}" placeholder="Enter Last School Year Attended">
                    </div>
                    <div>
                        <label class="block font-semibold text-lg text-gray-700">Last School Attended</label>
                        <label class="text-sm font-normal mb-2"><i> Buong pangalan ng Paaralan (e.g. Amaya School of Home Industries)</i></label>
                        <input type="number" class="w-full p-3 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-2 focus:ring-blue-500" 
                               name="last_school" value="{{ $learner->guardian_contact }}" placeholder="Enter Guardian's Contact">
                    </div>

                    <!-- Hidden ID -->
                    <input type="hidden" name="id" value="{{ request('id') }}">
            
                    <div class="mt-6 text-center">
                        <button type="submit" class="bg-blue-500 text-white px-6 py-3 rounded-lg font-semibold hover:bg-blue-600">
                            Submit Enrollment
                        </button>
                    </div>
                </div>
            </form>           
        </div>
    </div>
</x-admin-dashboard-layout>

