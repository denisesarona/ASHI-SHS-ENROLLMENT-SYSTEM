<x-admin-layout>
    <div class="w-full max-w-md bg-white p-8 rounded-lg shadow-lg text-center">
        <div class="flex justify-start">
            <a href="{{ route('homepage') }}">
                <i class='bx bx-arrow-back text-gray-500 text-2xl font-bold'></i>
            </a>
        </div>
        <h2 class="text-2xl font-bold text-black">ADMIN LOGIN</h2> 
        <div class="mt-6">
            <form action="{{ route('login') }}" method="POST">
                @csrf
                <div class="grid grid-cols-1 gap-4">
                    <div class="relative">
                        <input type="text" name="username" class="block w-full p-3 border rounded pl-10" placeholder="Username">
                        <i class='bx bx-user absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400'></i>
                    </div>
                    <div class="relative">
                        <input type="password" name="password" class="block w-full p-3 border rounded pl-10" placeholder="Password">
                        <i class='bx bx-lock-alt absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400'></i>
                    </div>
                </div>
                <a class="text-sm text-black hover:underline block mt-4" href="{{ route('forgotpassword') }}">Forgot Password?</a>
                <button type="submit" class="w-full bg-blue-500 text-white px-6 py-3 rounded-lg font-semibold hover:bg-blue-600 mt-4">LOGIN</button>
            </form>
        </div>
    </div>
</x-admin-layout>
