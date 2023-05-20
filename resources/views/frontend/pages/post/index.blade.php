@extends('frontend.layouts.app')
@section('content')
    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <div class="breadcrumbs d-flex align-items-center"
            style="background-image: url('{{ asset('assets/frontend/new-image/2.jpg') }}');">
            <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">

                <h2>Post</h2>
                <ol>
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li>Post</li>
                </ol>

            </div>
        </div><!-- End Breadcrumbs -->

        <!-- ======= Blog Section ======= -->
        <section id="blog" class="blog">
            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="row posts-list mt-4">
                    <form action="/search" method="post">
                        @csrf
                        <div class="row gy-4">
                            <div class="col-lg-3 form-group">
                                <input type="text" name="keyword" class="form-control" placeholder="Search"
                                    required="">
                            </div>
                            <div class="col-lg-1 form-group">
                                <div class="col-md-12 text-center">
                                    <button type="submit" class="btn btn-warning">Search</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    {{-- @dd($posts) --}}

                    @if (!isset($posts))
                        <div class="section-header">
                            <h1>Data is being processed by admin</h1>
                        </div>
                    @else
                        @foreach ($posts as $data)
                            <div class="col-xl-4 col-md-6">
                                <div class="post-item position-relative h-100">

                                    <div class="post-img position-relative overflow-hidden">
                                        <img src="{{ asset($data->thumbnail) }}" class="img-fluid" alt="">
                                        <span class="post-date">{{ date('M y', strtotime($data->created_at)) }}</span>
                                    </div>

                                    <div class="post-content d-flex flex-column">

                                        <h3 class="post-title">
                                            {{ $data->judul }}
                                        </h3>

                                        <div class="meta d-flex align-items-center">
                                            <div class="d-flex align-items-center">
                                                <i class="bi bi-person"></i> <span
                                                    class="ps-2">{{ $data->user->name }}</span>
                                            </div>
                                        </div>

                                        <p>
                                            {!! substr(strip_tags($data->content), 0, 150) !!}
                                        </p>

                                        <hr>

                                        <a href="/post-detail/{{ $data->slug }}"
                                            class="readmore stretched-link"><span>Read
                                                More</span><i class="bi bi-arrow-right"></i></a>

                                    </div>

                                </div>
                            </div><!-- End post list item -->
                        @endforeach
                    @endif

                </div><!-- End blog posts list -->


                <div class="blog-pagination">
                    <ul class="justify-content-center">
                        {{ $posts->links() }}
                    </ul>
                </div><!-- End blog pagination -->

            </div>
        </section><!-- End Blog Section -->

    </main><!-- End #main -->
@endsection
