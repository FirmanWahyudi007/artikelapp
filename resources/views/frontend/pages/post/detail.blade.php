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
                    <li>Post Details</li>
                </ol>

            </div>
        </div><!-- End Breadcrumbs -->

        <!-- ======= Blog Details Section ======= -->
        <section id="blog" class="blog">
            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="row g-5">

                    <div class="col-lg-8">

                        <article class="blog-details">

                            <div class="post-img">
                                <img src="{{ asset($detail_post->thumbnail) }}" alt="" class="img-fluid">
                            </div>

                            <h2 class="title">{{ $detail_post->judul }}</h2>

                            <div class="meta-top">
                                <ul>
                                    <li class="d-flex align-items-center"><i class="bi bi-person"></i>
                                        {{ $detail_post->user->name }}
                                    </li>
                                    <li class="d-flex align-items-center"><i class="bi bi-clock"></i>
                                        <time datetime="2020-01-01">
                                            {{ date('M d, Y', strtotime($detail_post->created_at)) }}
                                        </time>
                                    </li>
                                </ul>
                            </div><!-- End meta top -->

                            <div class="content">
                                {!! $detail_post->isi_artikel !!}
                            </div><!-- End post content -->

                        </article>

                        <div class="comments">

                            <h4 class="comments-count">{{ $detail_post->details->count() }} Comments</h4>

                            {{-- {{ dd($detail_post->details) }} --}}
                            @foreach ($detail_post->details as $key => $detail)
                                <div class="comment">
                                    <div class="d-flex">
                                        <div class="comment-img"><img
                                                src="{{ asset('assets/frontend/img/blog/blog-1.jpg') }}" alt="">
                                        </div>
                                        <div>
                                            <h5><a href="">{{ $detail->comment->nama }} -
                                                    {{ $detail->comment->email }}</h5>
                                            <time
                                                datetime="2020-01-01">{{ date('M d, Y', strtotime($detail->comment->created_at)) }}</time>
                                            <p>
                                                {{ $detail->comment->isi_komentar }}
                                            </p>
                                        </div>
                                    </div>
                                </div><!-- End comment #1 -->
                            @endforeach
                            <div class="reply-form">

                                <h4>Leave a Reply</h4>
                                <p>Send yours comment</p>
                                <form action="{{ route('comment.store', $detail_post->id) }}" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col form-group">
                                            <input type="text" name="nama" class="form-control"
                                                placeholder="Your Name*">
                                        </div>
                                        <div class="col form-group">
                                            <input type="email" name="email" class="form-control"
                                                placeholder="Your Email*">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col form-group">
                                            <textarea name="comment" class="form-control" placeholder="Your Comment*"></textarea>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Post Comment</button>

                                </form>

                            </div>

                        </div><!-- End blog comments -->

                    </div>

                    <div class="col-lg-4">

                        <div class="sidebar">
                            <div class="sidebar-item recent-posts">
                                <h3 class="sidebar-title">New Post</h3>

                                <div class="mt-3">

                                    @foreach ($recent_posts as $post)
                                        <div class="post-item mt-3">
                                            <img src="{{ asset($post->thumbnail) }}" alt="">
                                            <div>
                                                <h4><a href="/post-detail/{{ $post->slug }}">{{ $post->judul }}</a>
                                                </h4>
                                                <time
                                                    datetime="2020-01-01">{{ date('M d, y', strtotime($detail_post->created_at)) }}</time>
                                            </div>
                                        </div><!-- End recent post item-->
                                    @endforeach

                                </div>

                            </div><!-- End sidebar recent posts-->

                        </div><!-- End Blog Sidebar -->

                    </div>
                </div>

            </div>
        </section><!-- End Blog Details Section -->

    </main><!-- End #main -->
@endsection
