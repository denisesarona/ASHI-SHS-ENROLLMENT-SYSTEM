<x-layout>
    <section class="min-h-screen flex items-center justify-center bg-gray-100 p-4 w-full" style="overflow: hidden;">
        <div>
            <div id="capture" class="bg-gray-200 p-8 sm:p-10 rounded-lg -mt-20 shadow-md w-full max-w-sm sm:max-w-lg text-center">
                <h1 class="text-xl sm:text-2xl mb-4">Your Control Number is</h1>
                <h1 class="text-4xl sm:text-5xl font-bold mb-6">#{{ $learner->id }}</h1>
                <p>Learner's Name: {{ $learner->first_name }} {{ $learner->last_name }}</p>
            </div>
    
            <div class="flex justify-center space-x-4">
                <button id="saveButton" class="w-full bg-blue-600 text-white font-bold py-3 rounded hover:bg-blue-700 text-lg mt-4">Save</button>
                <a href="{{ route('trackenrollment') }}" class="w-full block bg-blue-600 text-white font-bold py-3 rounded hover:bg-blue-700 text-lg text-center mt-4">
                    Track Enrollment
                </a>
            </div>
        </div>
    </section>

    {{-- Include html2canvas --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>

    <script>
        document.getElementById('saveButton').addEventListener('click', function () {
            let captureDiv = document.getElementById('capture');

            html2canvas(captureDiv).then(canvas => {
                let link = document.createElement('a');
                link.href = canvas.toDataURL('image/png');  // Convert to image
                link.download = 'control_number.png';  // Set file name
                link.click(); // Trigger download
            });
        });
    </script>
</x-layout>
