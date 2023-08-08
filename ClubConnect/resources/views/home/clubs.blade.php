<section class="about-section section-padding" id="section_2">
            <div class="container">
                <div class="row">

                    <div class="col-lg-6 col-12 mb-4 mb-lg-0 d-flex align-items-center">
                        <div class="services-info">
                            <h2 class="text-white mb-4">Clubs</h2>
                            @foreach($clubs as $club)
                            <p class="text-white">{{ $club->club_name }}</p>
                            @endforeach
                        </div>
                    </div>

                    <div class="col-lg-6 col-12">
                        <div class="about-text-wrap">
                            <img src="images/pexels-alexander-suhorucov-6457579.jpg" class="about-image img-fluid">

                            <div class="about-text-info d-flex">
                                <div class="d-flex">
                                    <i class="about-text-icon bi-person"></i>
                                </div>


                                <div class="ms-4">
                                    <h3>Club Pic</h3>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>