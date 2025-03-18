<x-layout>
    <div class="col-md-12">
        <div id="HomePage" class="HomePage">
            <div class="hero-section shadow-lg">
                <div class="hero-text">
                    <h2>Start your journey with ASHI today!</h2>
                    <a href="{{ route('enrollment') }}#EnrollmentForm" class="btn btn-primary">Enroll Now!</a>
                </div>
            </div>    
        </div>
    </div>
    
    <section id="AboutUs" class="AboutUs py-5">
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
                    <img src="{{ asset('images/ASHIlogowbg.png') }}" alt="ASHI Logo" draggable="false" height=300 class="mt-2">
                </div>
                <div class="col-md-8">
                    <h2 class="c-bold">CONTACT</h2>
    
                    <div class="mt-4">
                        <h4 class="c-bold">Academic Track</h4>
                        <p>Humanities and Social Sciences (HUMSS)</p>
                    </div>
            
                    <div class="mt-4">
                        <h4 class="c-bold">Technical–Vocational–Livelihood (TVL) Track</h4>
                        <p>ICT (Information and Communications Technology)</p>
                        <p>Home Economics (HE)</p>
                        <p>Industrial Arts (IA)</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layout>
