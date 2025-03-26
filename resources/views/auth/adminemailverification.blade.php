<x-admin-dashboard-layout>
    <div class="min-h-screen flex flex-col items-center bg-white p-8 shadow-lg rounded-xl">
        <div class="w-full max-w-6xl h-screen mt-6 p-6 bg-gray-100 shadow-md rounded-md">
            <div class="pt-6 text-center mb-10">
                <h1 class="text-4xl font-bold text-gray-800">Verify Code</h1>
                <p>A verification code has been sent to {{ request('email') }}. Please enter the code below:</p>
            </div>
            <form action="{{ route('sentadmincode') }}" method="POST">
                @csrf
                <input type="hidden" name="email" value="{{ request('email') }}">
                <input type="text" name="code" placeholder="Enter Code" required>
                <button type="submit">Verify</button>
            </form>
        </div>
    </div>
</x-admin-dashboard-layout>


