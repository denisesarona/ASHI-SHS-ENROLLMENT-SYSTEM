<x-admin-dashboard-layout>
    <div class="min-h-screen flex flex-col items-center bg-white p-4 shadow-lg rounded-xl">
        <div class="pt-8">
            <h1 class="text-4xl font-bold text-center">ADMIN DASHBOARD</h1>
        </div>
        <div class="w-full overflow-x-auto mt-8">
            <div class="space-y-6">
            
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                    <div class="bg-white p-4 rounded-xl shadow-md flex flex-col">
                        <span class="text-sm text-gray-500">Total Students</span>
                        <span class="text-2xl font-bold text-blue-600">{{$learners_count}}</span>
                    </div>
                    <div class="bg-white p-4 rounded-xl shadow-md flex flex-col">
                        <span class="text-sm text-gray-500">New Enrollments</span>
                        <span class="text-2xl font-bold text-green-500">{{ $new_enrollments }}</span>
                    </div>
                    <div class="bg-white p-4 rounded-xl shadow-md flex flex-col">
                        <span class="text-sm text-gray-500">Pending Applications</span>
                        <span class="text-2xl font-bold text-yellow-500">{{$pending_learners}}</span>
                    </div>
                    <div class="bg-white p-4 rounded-xl shadow-md flex flex-col">
                        <span class="text-sm text-gray-500">This School Year</span>
                        <span class="text-2xl font-bold text-indigo-500">2,014</span>
                    </div>
                </div>
            
                <!-- Recent Activity Table -->
                <div class="bg-white p-6 rounded-xl shadow">
                    <h2 class="text-xl font-semibold mb-4">Recent Enrollments</h2>
                    <div class="overflow-x-auto">
                        <table class="min-w-full table-auto text-left">
                            <thead class="bg-gray-100 text-sm text-gray-600">
                                <tr>
                                    <th class="px-4 py-2">Student Name</th>
                                    <th class="px-4 py-2">STRAND/SPECIALIZATION</th>
                                    <th class="px-4 py-2">Status</th>
                                    <th class="px-4 py-2">Date</th>
                                </tr>
                            </thead>
                            <tbody class="text-sm text-gray-700">
                                @forelse ($recent_learners as $learner)
                                    <tr class="border-b">
                                        <td class="px-4 py-2">
                                            {{ $learner->last_name . ", " . $learner->first_name . " " . $learner->middle_name }}
                                        </td>                                        
                                        <td class="px-4 py-2">{{ $learner->strand->name ?? 'N/A' }}</td>
                                        <td class="px-4 py-2 font-medium 
                                            @if($learner->status == 'enrolled') text-green-600 
                                            @elseif($learner->status == 'pending') text-yellow-500 
                                            @else text-gray-500 @endif">
                                            {{ ucfirst($learner->status) }}
                                        </td>
                                        <td class="px-4 py-2">{{ $learner->created_at->format('F d, Y') }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="px-4 py-2 text-center text-gray-400">No recent enrollments.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                            
                        </table>
                    </div>
                </div>
            </div>

            <div class="bg-white p-6 rounded-xl shadow space-y-6">
                <h2 class="text-xl font-semibold">Enrolled Students by Gender</h2>
                <div class="w-full md:w-1/2 mx-auto">
                    <canvas id="genderChart"></canvas>
                </div>
                <div class="overflow-x-auto">
                    <table class="min-w-full text-sm text-left mt-6">
                        <thead class="bg-gray-100 text-gray-600">
                            <tr>
                                <th class="px-4 py-2">Gender</th>
                                <th class="px-4 py-2">Total Enrolled</th>
                                <th class="px-4 py-2">Percentage</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-700">
                            <tr class="border-b">
                                <td class="px-4 py-2">Male</td>
                                <td class="px-4 py-2">{{ $males }}</td>
                                <td class="px-4 py-2"> {{ $male_percentage }}%</td>
                            </tr>
                            <tr class="border-b">
                                <td class="px-4 py-2">Female</td>
                                <td class="px-4 py-2">{{ $females }}</td>
                                <td class="px-4 py-2">{{ $female_percentage }}%</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>                   
        </div>
    </div>
            
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('genderChart').getContext('2d');
        new Chart(ctx, {
            type: 'doughnut',
                data: {
                labels: ['Male', 'Female'],
                datasets: [{
                    label: 'Enrolled Students',
                    data: [720, 520],
                    backgroundColor: ['#3B82F6', '#EC4899'],
                    hoverOffset: 6
                }]
            },
            options: {
                plugins: {
                    legend: {
                        position: 'bottom'
                    }
                }
            }
        });
    </script>
</x-admin-dashboard-layout>