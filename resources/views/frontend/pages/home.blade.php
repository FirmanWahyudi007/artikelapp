@extends('frontend.layouts.app')

@push('css-child')
    <link rel="stylesheet" href="https://cdn.plyr.io/3.7.7/plyr.css" />
@endpush

@section('content')
    @include('frontend.components.hero')
    <main id="main">
        <!-- ======= Recent Posts Section ======= -->
        <section id="recent-blog-posts" class="recent-blog-posts">
            <div class="container" data-aos="fade-up"">

                @if (isset($data_post))
                @else
                    <div class=" section-header">
                        <h2>New Post</h2>
                    </div>
                @endif

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
        <!-- End Recent Blog Posts Section -->
    </main><!-- End #main -->
@endsection


@push('child-script')
    <script src="https://cdn.plyr.io/3.7.7/plyr.polyfilled.js"></script>
    <script>
        const player = new Plyr('#player', {
            loop: {
                active: true
            },
        });
        window.player = player;
    </script>
@endpush
