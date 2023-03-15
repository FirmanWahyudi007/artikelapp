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
                            <p> Indonesian is one of the 44 countries around the world with active mud volcano
                                occurrences based on well-known paper by Kopf (2002). The country is part of the rings of
                                fire surrounded by volcanic belt as a result of plate
                                interactions between, the Eurasia plate, the Indo-Australia plate, dan the Pacific plate.
                                One of the results of thesis tectonic plate interactions is mud volcanoes. Similar to other
                                mud volcanoes in other
                                countries, Indonesian mud volcanoes are associated with fluid rich, fine to very
                                fine-grained lithology and geological structures (anticline and faults). Studies of mud
                                volcanoes in Indonesia had been carried out before the country's independence from Dutch
                                colonization, where features of mud volcanoes were already indicated in the geological map
                                of Sidoarjo (Dutch
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
                        <p>hrough surface observations using Google earth, hundreds of mud volcanoes in Indonesia (Java,
                            Madura, Nusa Tenggara Timur, Maluku,
                            Kalimantan and Papua) have been identified, but only a few of them
                            has been observed and studied. We believe more new incoming mud volcanoes are likely to surface.
                            A recent example includes the new suspected mud volcano eruption in offshore Teinaman Village,
                            Tanimbar Island-Moluccas after a 7.5 magnitude earthquake on January 10, 2023. Mud volcanoes
                            in Moluccas, Papua and Kalimantan need to be given proper attention as very few works on mud
                            volcanoes in eastern Indonesia are available. In addition to active mud volcanoes, we also
                            provide on the old
                            mud volcanoes in Indonesia including Sangiran and Bekucuk. Our studies and observations have led
                            us to believe
                            that there are more old mud volcanoes in Indonesia, including in Grobogan area in (Central Java,
                            where we
                            noticed the presence of freshwater crabs (or yuyu as local people called them) nearby the
                            suspected old mud volcano in Makam Sengon, Grobogan. Samples of fluid, gas, mud, and rock were
                            collected from
                            mud volcanoes in order to better understand the characteristic and behavior of the mud volcanoes
                            in Indonesia. Materials from other researchers are also used to enrich this web.
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
                            This website is focuses on mud volcanoes in Indonesia and updates on the
                            latest findings on mud volcanoes' behaviors, characteristics or their new surface eruption. We
                            welcome contributions from other researchers to enrich this website. We hope this website will
                            be able to help educate Indonesians to understand our mud volcanoes as well as motivating other
                            researchers to study mud volcanoes in Indonesia. Last but not the least, mud
                            volcanoes are indeed blessings to the people of Indonesia and we have to take care of them, to
                            love them and use
                            them for the benefit of the people of Indonesia in particular and to science in general.
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
