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

                            <h2 class="title">{{ $detail_post->title }}</h2>

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
                                {!! $detail_post->content !!}
                            </div><!-- End post content -->

                            <div class="meta-bottom">
                                <i class="bi bi-folder"></i>
                                <ul class="cats">
                                    <li>{{ $detail_post->category->name }}</li>
                                </ul>
                            </div><!-- End meta bottom -->

                        </article>

                        <div class="comments">

                            <h4 class="comments-count">{{ $detail_post->comments->count() }} Comments</h4>


                            @foreach ($detail_post->comments as $key => $comment)
                                @if ($comment->parent_id == null)
                                    <div id="comment-{{ $key }}" class="comment">
                                        <div class="d-flex">
                                            <div class="comment-img"><img
                                                    src="{{ asset('backend/assets/img/avatar/avatar-1.png') }}"
                                                    alt=""></div>
                                            <div>
                                                <h5><a href="">{{ $comment->user->name }}</a></h5>
                                                <time
                                                    datetime="2020-01-01">{{ date('M d, Y', strtotime($comment->created_at)) }}</time>
                                                <p>
                                                    {{ $comment->body }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                            @if (auth()->user()->name ?? null)
                                <div class="reply-form">

                                    <h4>Leave a Reply</h4>
                                    <p>Send yours comment</p>
                                    <form action="{{ route('comment.store', $detail_post->id) }}" method="post">
                                        @csrf
                                        <div class="row">
                                            <div class="col form-group">
                                                <textarea name="comment" class="form-control" placeholder="Your Comment*"></textarea>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Post Comment</button>

                                    </form>

                                </div>
                            @else
                                <div class="reply-form">
                                    <h4>Silahkan melakukan <a href="{{ route('login.index') }}">Login</a> terlebih
                                        dahulu!!!
                                    </h4>
                                </div>
                            @endif

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
                                                <h4><a href="/post-detail/{{ $post->slug }}">{{ $post->title }}</a>
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
