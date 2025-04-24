<x-admin-dashboard-layout>
    <div class="min-h-screen flex flex-col items-center bg-white p-8 shadow-lg rounded-xl">
        <div class="pt-8">
            <h1 class="text-4xl font-bold text-center mb-10">Add New Section</h1>
        </div>
        <form action="" method="POST" class="w-full max-w-md mx-auto">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Section Name</label>
                <input type="text" id="name" name="name" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 mt-2" />
            </div>

            <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-lg">Add Section</button>
        </form>

        <div class="pt-8">
            <h1 class="text-4xl font-bold text-center mb-10">View Sections</h1>
        </div>
        <table class="min-w-full table-auto text-left">
            <thead class="bg-gray-100 text-sm text-gray-600">
                <tr>
                    <th class="px-4 py-2">Section Name</th>
                    <th class="px-4 py-2">Action</th>
                </tr>
            </thead>
            <tbody class="text-sm text-gray-700">
                @foreach($sections as $section)
                    <tr class="border-b">
                        <td class="px-4 py-2">{{ $section->name }}</td>
                        <td class="px-4 py-2">
                            <form action="{{ route('admin.deleteSection', $section->id) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-admin-dashboard-layout>
