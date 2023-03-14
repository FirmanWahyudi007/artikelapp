@extends('frontend.layouts.app')
@section('content')
    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <div class="breadcrumbs d-flex align-items-center"
            style="background-image: url('{{ asset('assets/frontend/new-image/2.jpg') }}');">
            <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">

                <h2>Mud Vulcano Detail</h2>
                <ol>
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li>Mud vulcano detail</li>
                </ol>

            </div>
        </div><!-- End Breadcrumbs -->

        <!-- ======= Projet Details Section ======= -->
        <section id="project-details" class="project-details">
            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <img src="{{ asset($detail->thumbnail) }}" alt="" class="img-fluid">

                <div class="row justify-content-between gy-4 mt-4">

                    <div class="col-lg-8">
                        <div class="portfolio-description">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th style="width: 20%">Name</th>
                                        <th style="width: 1%">:</th>
                                        <td>{{ $detail->name }}</td>
                                    </tr>
                                    <tr>
                                        <th style="width: 20%">Address</th>
                                        <th style="width: 1%">:</th>
                                        <td class="description">{{ $detail->address }}</td>
                                    </tr>
                                    <tr>
                                        <th style="width: 20%">Description</th>
                                        <th style="width: 1%">:</th>
                                        <td>{!! $detail->content !!}</td>
                                    </tr>
                                    <tr>
                                        <th style="width: 20%">Maps</th>
                                        <th style="width: 1%">:</th>
                                        <td><a href="https://maps.google.com?q={{ $detail->latitude }},{{ $detail->longitude }}"
                                                target="_blank" rel="noopener noreferrer">
                                                Open in Maps
                                            </a></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <div class="portfolio-info">
                            <h3>Information</h3>
                            <ul>
                                <li><strong>Author</strong> <span>{{ $detail->user->name }}</span></li>
                            </ul>
                        </div>
                    </div>

                </div>


                <div class="portfolio-isotope" data-portfolio-filter="*" data-portfolio-layout="masonry"
                    data-portfolio-sort="original-order">
                    <div class="section-header mt-4">
                        <h2>Gallery</h2>
                    </div>
                    <div class="row gy-4 portfolio-container" data-aos="fade-up" data-aos-delay="200">
                        @foreach ($detail->images as $data)
                            <div class="col-lg-4 col-md-6 portfolio-item filter-remodeling">
                                <div class="portfolio-content h-100">
                                    <img src="{{ asset($data->path_image) }}" class="img-fluid" alt="">
                                </div>
                            </div><!-- End Projects Item -->
                        @endforeach
                    </div>
                </div>
                {{-- <iframe


            {{-- </div> --}}

        </section><!-- End Projet Details Section -->

    </main><!-- End #main -->
@endsection
