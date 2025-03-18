<x-layout>
    <div class="col-md-12">
        <div id="HomePage" class="HomePage">
            <div class="hero-section shadow-lg">
                <div class="hero-text">
                    <h2>Start your journey with ASHI today!</h2>
                    <a href="{{ route('enrollment') }}#EnrollmentForm" class="btn btn-primary py-3 BlueBtn">Enroll Now!</a>
                </div>
            </div>    
        </div>
    </div>
    
    <section id="AboutUs" class="AboutUs py-5 shadow-lg">
        <div class="container text-center">
            <h2 class="fw-bold">ACADEMIC PROGRAMS</h2>
    
            <div class="mt-4">
                <h4 class="fw-bold">Academic Track</h4>
                <p>Humanities and Social Sciences (HUMSS)</p>
            </div>
    
            <div class="mt-4">
                <h4 class="fw-bold">Technical–Vocational–Livelihood (TVL) Track</h4>
                <p>ICT (Information and Communications Technology)</p>
                <p>Home Economics (HE)</p>
                <p>Industrial Arts (IA)</p>
            </div>
        </div>
    </section>
    
    <section id="Contact" class="Contact py-2">
        <div class="container text-center">
            <div class="row">
                <div class="col-md-4">
                    <img src="{{ asset('images/ASHIlogowbg.png') }}" alt="ASHI Logo" draggable="false" height=200 class="mt-2">
                    <p class="clogo-text mt-2">Copyright © 2025 | All rights reserved.</p>
                </div>
                <div class="col-md-8 mt-5">
                    <div class="row align-text-center">
                        <div class="col-md-6">
                            <h5 class="c-bold">CONTACT</h5>
                            <div class="mt-4">
                                <p class="c-text">Bocalan St., Sahud-ulan, Tanza, Philippines</p>
                                <p class="c-text">Phone: (046) 481 7791</p>
                                <p class="c-text">Email: depedcavite.ashisenior@gmail.com</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <h5 class="c-bold">FOLLOW US</h5>
                            <a href="https://www.facebook.com/profile.php?id=61550700366483" target="_blank" id="fb-icon">
                                <i class="bx bxl-facebook-square"></i>
                            </a>
                        </div>                        
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layout>
