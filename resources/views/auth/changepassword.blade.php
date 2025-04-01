<x-admin-layout>
    <div class="w-full max-w-md bg-white p-8 rounded-lg shadow-lg text-center">
        <div class="flex justify-start">
          <a href="{{ route('verifycode') }}"><i class='bx bx-arrow-back text-gray-500 text-2xl font-bold'></i></a>
        </div>
        <h2 class="text-2xl font-bold text-black">Change Password</h2> 
        <div class="mt-6">
            <form action="">
                @csrf
                <div class="grid grid-cols-1 gap-4">
                    <div class="relative">
                        <input type="password" class="block w-full p-3 border rounded" placeholder="Password">
                    </div>
                    <div class="relative">
                        <input type="password" class="block w-full p-3 border rounded" placeholder="Confirm the Password">
                    </div>
                </div>
                <button type="submit" class="w-full bg-blue-500 text-white px-6 py-3 rounded-lg font-semibold hover:bg-blue-600 mt-4">SUBMIT</button>
            </form>
        </div>
    </div>
</x-admin-layout>
