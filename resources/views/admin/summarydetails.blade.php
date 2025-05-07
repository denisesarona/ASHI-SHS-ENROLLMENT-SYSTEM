<x-admin-dashboard-layout>
    <div class="min-h-screen flex flex-col items-center bg-white p-8 shadow-lg rounded-xl">
        <div class="pt-8">
            <h1 class="text-4xl font-bold text-center mb-10">LEARNERS DETAILS</h1>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block font-semibold text-lg text-gray-700 mb-2">School Year<span class="text-red-500 font-bold"> *</span></label>
                    <div class="w-full p-3 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-2 focus:ring-blue-500">
                        {{ $summaries->school_year }}
                    </div>
                </div>

                <div>
                    <label class="block font-semibold text-lg text-gray-700 mb-2">Grade Level<span class="text-red-500 font-bold"> *</span></label>
                    <div class="w-full p-3 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-2 focus:ring-blue-500">
                        {{ $summaries->grade_level }}
                    </div>
                </div>

                <div>
                    <label class="block font-semibold text-lg text-gray-700 mb-2">Last Name<span class="text-red-500 font-bold"> *</span></label>
                    <div class="w-full p-3 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-2 focus:ring-blue-500">
                        {{ $summaries->last_name }}
                    </div>
                </div>
                <div>
                    <label class="block font-semibold text-lg text-gray-700 mb-2">First Name<span class="text-red-500 font-bold"> *</span></label>
                    <div class="w-full p-3 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-2 focus:ring-blue-500">
                        {{ $summaries->first_name }}
                    </div>
                </div>
                <div>
                    <label class="block font-semibold text-lg text-gray-700 mb-2">Middle Name</label>
                    <div class="w-full p-3 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-2 focus:ring-blue-500">
                        {!! $summaries->middle_name ?: 'N/A' !!}
                    </div>
                </div>
                <div>
                    <label class="block font-semibold text-lg text-gray-700 mb-2">Extension Name</label>
                    <div class="w-full p-3 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-2 focus:ring-blue-500">
                        {{!! $summaries->extension_name ?: 'N/A' !!}}
                    </div>
                </div>
                <div>
                    <label class="block font-semibold text-lg text-gray-700 mb-2">Learners Reference Number (LRN)<span class="text-red-500 font-bold"> *</span></label>
                    <div class="w-full p-3 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-2 focus:ring-blue-500">
                        {{ $summaries->lrn }}
                    </div>
                </div>
                <div>
                    <label class="block font-semibold text-lg text-gray-700 mb-2">Birthdate<span class="text-red-500 font-bold"> *</span></label>
                    <div class="w-full p-3 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-2 focus:ring-blue-500">
                        {{ $summaries->birthdate }}
                    </div>
                </div>
                <div>
                    <label class="block font-semibold text-lg text-gray-700 mb-2">Age<span class="text-red-500 font-bold"> *</span></label>
                    <div class="w-full p-3 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-2 focus:ring-blue-500">
                        {{ $summaries->age }}
                    </div>
                </div>
                <div>
                    <label class="block font-semibold mb-2 text-lg">Gender<span class="text-red-500 font-bold"> *</span></label>
                    <div class="flex items-center space-x-4">
                        <label class="flex items-center">
                            <input type="radio" name="gender" value="Male" class="mr-2 w-6 h-6" required {{ $summaries->gender == 'Male' ? 'checked' : '' }}> Male
                        </label>
                        <label class="flex items-center">
                            <input type="radio" name="gender" value="Female" class="mr-2 w-6 h-6" required {{ $summaries->gender == 'Female' ? 'checked' : '' }}> Female
                        </label>
                    </div>
                </div>
                <div>
                    <label class="block font-semibold mb-2 text-lg">Are you a beneficiary of 4Ps? (Ikaw ba ay benepisyaryo ng 4Ps?)<span class="text-red-500 font-bold"> *</span></label>
                    <div class="flex items-center space-x-4">
                        <label class="flex items-center">
                            <input type="radio" name="beneficiary" value="Yes" class="mr-2 w-6 h-6" required {{ $summaries->beneficiary == 'Yes' ? 'checked' : '' }}> Yes
                        </label>
                        <label class="flex items-center">
                            <input type="radio" name="beneficiary" value="No" class="mr-2 w-6 h-6" required {{ $summaries->beneficiary == 'No' ? 'checked' : '' }}> No
                        </label>
                    </div>
                </div>
                
                <div>
                    <label class="block font-semibold text-lg text-gray-700 mb-2">House No./ Street<span class="text-red-500 font-bold"> *</span></label>
                    <div class="w-full p-3 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-2 focus:ring-blue-500">
                        {{ $summaries->street }}
                    </div>
                </div>

                <div>
                    <label class="block font-semibold text-lg text-gray-700 mb-2">Baranggay<span class="text-red-500 font-bold"> *</span></label>
                    <div class="w-full p-3 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-2 focus:ring-blue-500">
                        {{ $summaries->baranggay }}
                    </div>
                </div>
                <div>
                    <label class="block font-semibold text-lg text-gray-700 mb-2">Municipality<span class="text-red-500 font-bold"> *</span></label>
                    <div class="w-full p-3 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-2 focus:ring-blue-500">
                        {{ $summaries->municipality }}
                    </div>
                </div>
                <div>
                    <label class="block font-semibold text-lg text-gray-700 mb-2">Province<span class="text-red-500 font-bold"> *</span></label>
                    <div class="w-full p-3 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-2 focus:ring-blue-500">
                        {{ $summaries->province }}
                    </div>
                </div>
                <div>
                    <label class="block font-semibold text-lg text-gray-700 mb-2">Guardian Name<span class="text-red-500 font-bold"> *</span></label>
                    <div class="w-full p-3 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-2 focus:ring-blue-500">
                        {{ $summaries->guardian_name }}
                    </div>
                </div>
                <div>
                    <label class="block font-semibold text-lg text-gray-700 mb-2">Guardian's Contact<span class="text-red-500 font-bold"> *</span></label>
                    <div class="w-full p-3 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-2 focus:ring-blue-500">
                        {{ $summaries->guardian_contact }}
                    </div>
                </div>

                <div>
                    <label class="block font-semibold mb-2 text-lg">Relationship with the Guardian (Kaano-ano mo ang iyong Guardian?)<span class="text-red-500 font-bold"> *</span></label>
                    <div class="flex items-center space-x-4">
                        <label class="flex items-center">
                            <input type="radio" name="relationship_guardian" raedonly value="Mother" class="mr-2 w-6 h-6"{{ $summaries->relationship_guardian == 'Mother' ? 'checked' : '' }}> Mother
                        </label>
                        <label class="flex items-center">
                            <input type="radio" name="relationship_guardian" readonly value="Father" class="mr-2 w-6 h-6"{{ $summaries->relationship_guardian == 'Father' ? 'checked' : '' }}> Father
                        </label>
                        <div class="w-full">
                            <label class="text-md block mb-1">Others:</label>
                            <input type="text" class="p-2 border rounded w-full" readonly id="relationship_other"
                                value="{{ (!in_array($summaries->relationship_guardian, ['Mother', 'Father'])) ? $learner->relationship_guardian : '' }}">
                            <input type="hidden" name="relationship_guardian" id="relationship_hidden"
                                value="{{$summaries->relationship_guardian}}">
                        </div>
                    </div>
                </div>
                
                <div>
                    <label class="block font-semibold text-lg text-gray-700">Last School Year Attended<span class="text-red-500 font-bold"> *</span></label>
                    <label class="text-sm font-normal mb-2"><i> EXAMPLE: 2024-2025</i></label>
                    <div class="w-full p-3 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-2 focus:ring-blue-500">
                        {{ $summaries->last_sy }}
                    </div>
                </div>
                <div>
                    <label class="block font-semibold text-lg text-gray-700">Last School Attended<span class="text-red-500 font-bold"> *</span></label>
                    <label class="text-sm font-normal mb-2"><i> Buong pangalan ng Paaralan (e.g. Amaya School of Home Industries)</i></label>
                    <div class="w-full p-3 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-2 focus:ring-blue-500">
                        {{ $summaries->last_school }}
                    </div>
                </div>

                <div>
                    <label class="block font-semibold text-lg text-gray-700 mb-2">Grade 10 section<span class="text-red-500 font-bold"> *</span></label>
                    <div class="w-full p-3 border border-gray-300 rounded-md bg-white focus:outline-none focus:ring-2 focus:ring-blue-500">
                        {{ $summaries->grade10_section }}
                    </div>
                </div>
                <div>
                    <label class="block font-semibold text-lg text-gray-700 mb-2">Picture of Grade 10 Card<span class="text-red-500 font-bold"> *</span><span class="text-sm font-normal"><i> FRONT and BACK of the Card</i></span></label>
                
                    @if($summaries->image)
                        <div class="mt-2">
                            <img src="{{ asset('storage/' . $summaries->image) }}" alt="Grade 10 Card" class="w-64 h-auto rounded">
                        </div>
                    @endif
                </div>
            </div>  


        </div>
    </div>
</x-admin-dashboard-layout>

