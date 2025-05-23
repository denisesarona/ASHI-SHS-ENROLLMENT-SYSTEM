<x-layout>
    <div class="w-full">
        <div id="HomePage" class="w-full">
            <div class="hero-section shadow-lg w-full h-screen bg-cover bg-center flex items-end justify-end p-10" style="background-image: url('/images/ashibg.jpg');">
                <div class="text-white text-center w-full pb-12">
                    <h2 class="text-5xl font-bold text-white 
                    drop-shadow-md md:drop-shadow-lg lg:drop-shadow-xl 
                    shadow-black">
                    Start your journey with ASHI today!
                </h2>                                   
                    <a href="{{ route('studentverify') }}" class="mt-4 inline-block bg-blue-600 hover:bg-blue-800 text-white font-bold py-3 px-6 rounded">Enroll Now!</a>
                </div>
            </div>
        </div>
    </div>
    
    <section id="AboutUs" class="py-16 bg-gray-100 shadow-lg w-full flex items-center h-screen text-center">
        <div class="max-w-5xl mx-auto px-4 py-8">
            <h2 class="text-3xl font-bold text-blue-900 mb-4">Academic Programs</h2>

            <div class="mt-6">
                <h4 class="text-xl font-semibold text-gray-800 mb-2">Available Strands / Specializations</h4>
                
                <ul class="list-disc list-inside space-y-1 text-gray-700">
                    @forelse ($strands as $strand)
                        <li class="list-none">{{ $strand->name }}</li>
                    @empty
                        <li>No strands or specializations available at this time.</li>
                    @endforelse
                </ul>
            </div>
        </div>
    </section>
    
    <section id="Contact" class="py-10 bg-black text-white w-full">
        <div class="max-w-6xl mx-auto text-center">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
                <div>
                    <img src="{{ asset('images/ASHIlogowbg.png') }}" alt="ASHI Logo" draggable="false" class="h-40 mx-auto">
                    <p class="text-gray-400 mt-4">Copyright © 2025 | All rights reserved.</p>
                </div>
                <div class="flex flex-col items-center text-center md:text-left md:items-start">
                    <h5 class="font-bold text-lg">CONTACT</h5>
                    <div class="mt-4 text-gray-400">
                        <p>Bocalan St., Sahud-ulan, Tanza, Philippines</p>
                        <p>Phone: (046) 481 7791</p>
                        <p>Email: depedcavite.ashisenior@gmail.com</p>
                    </div>
                </div>
                <div class="flex flex-col items-center text-center md:text-left md:items-start">
                    <h5 class="font-bold text-lg">FOLLOW US</h5>
                    <a href="https://www.facebook.com/profile.php?id=61550700366483" target="_blank" class="text-blue-500 text-4xl inline-block mt-4">
                        <i class="bx bxl-facebook-square"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>
</x-layout>