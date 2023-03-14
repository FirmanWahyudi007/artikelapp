@extends('frontend.layouts.app')

@push('css-child')
    <link rel="stylesheet" href="https://cdn.plyr.io/3.7.7/plyr.css" />
@endpush

@section('content')
    @include('frontend.components.hero')
    <main id="main">

        <!-- ======= Get Started vidio Section mud-vulcano ======= -->
        <section id="get-started" class="get-started section-bg">
            <div class="container">
                <div class="card-item row p-2">
                    <div class="plyr__video-embed" id="player">
                        <iframe src="https://www.youtube.com/embed/FTdTGDqaC4k?autoplay=1&mute=1" allowfullscreen
                            allowtransparency></iframe>
                    </div>
                </div>

            </div>
        </section><!-- End Get Started Section -->

        <!-- ======= Recent Posts Section ======= -->
        <section id="recent-blog-posts" class="recent-blog-posts">
            <div class="container" data-aos="fade-up"">



                <div class=" section-header">
                    <h2>New Post</h2>
                    {{-- <p>In commodi voluptatem excepturi quaerat nihil error autem voluptate ut et officia consequuntu</p> --}}
                </div>

                <div class="row gy-5">
                    @foreach ($data_post as $data)
                        <div class="col-xl-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                            <div class="post-item position-relative h-100">

                                <div class="post-img position-relative overflow-hidden">
                                    <img src="{{ asset($data->thumbnail) }}" class="img-fluid" alt="">
                                    <span class="post-date">
                                        {{ date('M d', strtotime($data->created_at)) }}
                                    </span>
                                </div>

                                <div class="post-content d-flex flex-column">

                                    <h3 class="post-title">{{ $data->title }}</h3>

                                    <div class="meta d-flex align-items-center">
                                        <div class="d-flex align-items-center">
                                            <i class="bi bi-person"></i> <span class="ps-2">{{ $data->user->name }}</span>
                                        </div>
                                        <span class="px-3 text-black-50">/</span>
                                        <div class="d-flex align-items-center">
                                            <i class="bi bi-folder2"></i> <span
                                                class="ps-2">{{ $data->category->name }}</span>
                                        </div>
                                    </div>

                                    <hr>

                                    <a href="/post-detail/{{ $data->slug }}" class="readmore stretched-link"><span>Read
                                            More</span><i class="bi bi-arrow-right"></i></a>

                                </div>

                            </div>
                        </div><!-- End post item -->
                    @endforeach
                </div>

            </div>
        </section>

        <section id="projects" class="projects">
            <div class="container" data-aos="fade-up">

                <div class=" section-header">
                    <h2>New Mud Vulcano</h2>
                </div>

                <div class="portfolio-isotope" data-portfolio-filter="*" data-portfolio-layout="masonry"
                    data-portfolio-sort="original-order">


                    <div class="row gy-4 portfolio-container" data-aos="fade-up" data-aos-delay="200">
                        @foreach ($data_mudvulcano as $data)
                            <div class="col-lg-4 col-md-6 portfolio-item filter-remodeling">
                                <div class="portfolio-content h-100">
                                    <img src="{{ asset($data->thumbnail) }}" class="img-fluid" alt="">
                                    <div class="portfolio-info">
                                        <h4>{{ $data->name }}</h4>
                                        <p>{{ $data->name }}</p>
                                        <a href="{{ asset($data->thumbnail) }}"></a>
                                        <a href="/mud-vulcano-detail/{{ $data->slug }}"
                                            title="Detail {{ $data->name }}" class="details-link"><i
                                                class="bi bi-link-45deg"></i></a>

                                    </div>
                                </div>
                            </div><!-- End Projects Item -->
                        @endforeach
                    </div><!-- End Projects Container -->

                </div>

            </div>
        </section><!-- End Our Projects Section -->
        <!-- End Recent Blog Posts Section -->
    </main><!-- End #main -->
@endsection


@push('child-script')
    <script src="https://cdn.plyr.io/3.7.7/plyr.polyfilled.js"></script>
    <script>
        const player = new Plyr('#player', {
            // autoplay: true,
            // muted: false,
            loop: {
                active: true
            },
            // disableContextMenu: true,
            // controls: [],
            // clickToPlay: true,
            // autoplay: true
        });
        // player.on('ready', () => {
        //     player.play();
        // })
        window.player = player;
    </script>
@endpush
