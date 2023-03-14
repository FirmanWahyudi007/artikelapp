@extends('frontend.layouts.app')
@section('content')
    <main id="main">
        <!-- ======= Breadcrumbs ======= -->
        <div class="breadcrumbs d-flex align-items-center"
            style="background-image: url('{{ asset('assets/frontend/new-image/2.jpg') }}');">
            <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">

                <h2>About</h2>
                <ol>
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li>About</li>
                </ol>

            </div>
        </div><!-- End Breadcrumbs -->

        <!-- ======= About Section ======= -->
        <section id="about" class="about">
            <div class="container" data-aos="fade-up">

                <div class="row position-relative">

                    <div class="col-lg-7 about-img"
                        style="background-image: url({{ asset('assets/frontend/new-image/7.png') }});"></div>

                    <div class="col-lg-7">
                        <h2>Mud Vulcano</h2>
                        <div class="our-story">
                            <h3>History</h3>
                            <p> Indonesian becomes one of the 44 countries around the world the has active mud volcano
                                occurrences based on well-known paper summarized by Kopf (2002). Indonesia is known to be
                                one of the ring of fire countries that surrounded by volcanic belt as the result of plates
                                interactions, Eurasia plate, Indo-Australia plate, dan Pacific plate. One of the results of
                                this tectonic plate interactions is mud volcanoes. Same as other mud volcanoes in other
                                countries, Indonesian mud volcanoes also associated with fluid rich, fine to very
                                fine-grained lithology and geological structures (anticline and faults). The study of mud
                                volcanoes in Indonesia has been done at least slightly before Indonesia independence, where
                                the feature of mud volcano was already put in the geological map of Sidoarjo (Dutch
                                version).
                            </p>
                        </div>
                    </div>

                </div>

            </div>
        </section>
        <!-- End About Section -->



        <!-- ======= Alt Services Section ======= -->
        <section id="alt-services" class="alt-services">
            <div class="container" data-aos="fade-up">

                <div class="row justify-content-around gy-4">
                    <div class="col-lg-6 img-bg"
                        style="background-image: url({{ asset('assets/frontend/new-image/8.jpg') }});" data-aos="zoom-in"
                        data-aos-delay="100"></div>

                    <div class="col-lg-5 d-flex flex-column justify-content-center">
                        <h3>Mud volcano research</h3>
                        <p>There are hundreds of mud volcanoes in Indonesia (Java, Madura, Nusa Tenggara Timur, Maluku,
                            Kalimantan and Papua) at least from surface observation in google earth, but only a few of them
                            has been observed and studied. We believe more new incoming mud volcanoes will come on surface.
                            The recent example is the new suspected mud volcano eruption in offshore Teinaman Village,
                            Tanimbar Island-Moluccas after the 7.5 magnitude Earthquake on 10th January 2023. Mud volcanoes
                            in Moluccas, Papua and Kalimantan need to be taken care as very few works on mud volcanoes in
                            eastern Indonesia. beside the active mud volcanoes, we also provide the old mud volcanoes in
                            Indonesia which is so far the good example are Sangiran and Bekucuk. we suspect that there are
                            more old mud volcanoes in Indonesia, including in Grobogan area (Central Java, where we noticed
                            the present of freshwater crab (local people called it as yuyu) surround the suspected old mud
                            volcano in Makam Sengon, Grobogan. Some samples of fluid, gas, mud, and rock were collected from
                            mud volcanoes in order to understand the characteristic and behavior of the mud volcanoes in
                            Indonesia. Some materials from other researcher were also used to enrich this web.
                        </p>
                    </div>
                </div>

            </div>
        </section><!-- End Alt Services Section -->

        <!-- ======= Alt Services Section 2 ======= -->
        <section id="alt-services-2" class="alt-services section-bg">
            <div class="container" data-aos="fade-up">

                <div class="row justify-content-around gy-4">
                    <div class="col-lg-5 d-flex flex-column justify-content-center">
                        <h3>Purpose</h3>
                        <p>
                            This web is focusing about mud volcanoes in Indonesia and all the accessed updates to the new
                            recent findings on mud volcanoes' behavior, characteristic or its new surface eruption. We are
                            expecting contributions from other researchers to enrich this web. We hope this web will help to
                            educate the people of Indonesia to understand our mud volcanoes and also to motivate other
                            researchers to study our mud volcanoes. The last but not the least, actually mud volcanoes are
                            the blessings to the people of Indonesia and we have to take care of them, to love them and use
                            them for the benefit of the people of Indonesia in specific and to the science in general.
                        </p>
                    </div>

                    <div class="col-lg-6 img-bg"
                        style="background-image: url({{ asset('assets/frontend/new-image/4.jpg') }});" data-aos="zoom-in"
                        data-aos-delay="100"></div>
                </div>

            </div>
        </section><!-- End Alt Services Section 2 -->
    </main><!-- End #main -->
@endsection
