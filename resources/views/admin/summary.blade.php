<x-admin-dashboard-layout>
    <div class="min-h-screen flex flex-col bg-white p-8 shadow-lg rounded-xl w-full">
        <div class="text-center mb-10">
            <h1 class="text-4xl font-bold">LEARNERS RECORDS</h1>
        </div>

        <div class="w-full">
            <div class="flex flex-col md:flex-row md:items-end md:justify-between gap-4">
                <form action="{{ route('admin.summary.filter') }}" method="POST" class="flex flex-col md:flex-row flex-wrap gap-4 flex-grow">
                    @csrf
                
                    <div class="flex-1 min-w-[180px]">
                        <label class="block text-sm font-medium text-gray-700 mb-1">School Year</label>
                        <select name="school_year" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                            @foreach ($schoolYear as $year)
                                <option value="{{ $year }}" {{ $year == $selectedYear ? 'selected' : '' }}>{{ $year }}</option>
                            @endforeach
                        </select>
                    </div>
                
                    <div class="flex-1 min-w-[180px]">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Section</label>
                        <select name="section" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                            @foreach ($sections as $section)
                                <option value="{{ $section }}" {{ $section == $selectedSection ? 'selected' : '' }}>{{ $section }}</option>
                            @endforeach
                        </select>
                    </div>
                
                    <div class="flex items-end min-w-[120px]">
                        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 w-full md:w-auto">
                            Filter
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <div class="w-full overflow-x-auto mt-8">
            <table class="w-full text-center">
                <thead>
                    <tr class="text-gray-600 text-lg font-semibold whitespace-nowrap">
                        <th class="px-8 py-2 hidden md:table-cell">LRN</th>
                        <th class="px-8 py-2">FULL NAME</th>
                        <th class="px-8 py-2 hidden md:table-cell">GRADE LEVEL</th>
                        <th class="px-8 py-2 hidden md:table-cell">SECTION</th>
                        <th class="px-6 py-2">VIEW DETAILS</th>
                    </tr>
                </thead>
                <tbody class="text-gray-800">
                    @foreach ($summaries as $summary)
                        <tr class="border-t">
                            <td class="px-4 py-3 hidden md:table-cell">{{ $summary->lrn }}</td>
                            <td class="px-4 py-3">
                                {{ $summary->last_name }}, {{ $summary->first_name }} {{ $summary->middle_name }}
                            </td>
                            <td class="px-4 py-3 hidden md:table-cell">{{ $summary->grade_level }}</td>
                            <td class="px-4 py-3 hidden md:table-cell">{{ $summary->section }}</td>
                            <td class="px-4 py-3">
                                <a href="{{ route('summarydetails', ['id' => $summary->id]) }}" 
                                   class=" bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 text-sm  text-white font-semibold px-5 py-2.5 rounded-lg">
                                    VIEW DETAILS
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div> 
</x-admin-dashboard-layout>