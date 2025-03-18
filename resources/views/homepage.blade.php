<x-layout>
    <div class="w-full">
        <div id="HomePage" class="w-full">
            <div class="hero-section shadow-lg w-full h-screen bg-cover bg-center flex items-end justify-end p-10" style="background-image: url('/images/ashibg.jpg');">
                <div class="text-white text-center w-full pb-12">
                    <h2 class="text-4xl font-bold shadow-md">Start your journey with ASHI today!</h2>
                    <a href="{{ route('enrollment') }}#EnrollmentForm" class="mt-4 inline-block bg-blue-600 hover:bg-blue-800 text-white font-bold py-3 px-6 rounded">Enroll Now!</a>
                </div>
            </div>
        </div>
    </div>
    
    <section id="AboutUs" class="py-16 bg-gray-100 shadow-lg w-full text-center">
        <div class="max-w-5xl mx-auto">
            <h2 class="text-3xl font-bold text-blue-900">ACADEMIC PROGRAMS</h2>
            <div class="mt-6">
                <h4 class="text-xl font-bold">Academic Track</h4>
                <p>Humanities and Social Sciences (HUMSS)</p>
            </div>
            <div class="mt-6">
                <h4 class="text-xl font-bold">Technical–Vocational–Livelihood (TVL) Track</h4>
                <p>ICT (Information and Communications Technology)</p>
                <p>Home Economics (HE)</p>
                <p>Industrial Arts (IA)</p>
            </div>
        </div>
    </section>
    
    <section id="Contact" class="py-10 bg-black text-white w-full">
        <div class="max-w-6xl mx-auto text-center">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div>
                    <img src="{{ asset('images/ASHIlogowbg.png') }}" alt="ASHI Logo" draggable="false" class="h-40 mx-auto">
                    <p class="text-gray-400 mt-4">Copyright © 2025 | All rights reserved.</p>
                </div>
                <div class="text-left md:text-center">
                    <h5 class="font-bold text-lg">CONTACT</h5>
                    <div class="mt-4 text-gray-400">
                        <p>Bocalan St., Sahud-ulan, Tanza, Philippines</p>
                        <p>Phone: (046) 481 7791</p>
                        <p>Email: depedcavite.ashisenior@gmail.com</p>
                    </div>
                </div>
                <div class="text-left md:text-center">
                    <h5 class="font-bold text-lg">FOLLOW US</h5>
                    <a href="https://www.facebook.com/profile.php?id=61550700366483" target="_blank" class="text-blue-500 text-4xl inline-block mt-4">
                        <i class="bx bxl-facebook-square"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>
</x-layout>