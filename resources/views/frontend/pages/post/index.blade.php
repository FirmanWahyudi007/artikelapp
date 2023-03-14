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

                <div class="col-lg-5 aos-init aos-animate" data-aos="fade">
                    <form action="/search" method="post">
                        @csrf
                        <div class="row gy-4">
                            <div class="col-lg-6 form-group">
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
                </div>

                <div class="row gy-4 posts-list mt-4">
                    @foreach ($posts as $data)
                        <div class="col-xl-4 col-md-6">
                            <div class="post-item position-relative h-100">

                                <div class="post-img position-relative overflow-hidden">
                                    <img src="{{ asset($data->thumbnail) }}" class="img-fluid" alt="">
                                    <span class="post-date">{{ date('M y', strtotime($data->created_at)) }}</span>
                                </div>

                                <div class="post-content d-flex flex-column">

                                    <h3 class="post-title">
                                        {{ $data->title }}
                                    </h3>

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

                                    <p>
                                        {!! substr(strip_tags($data->content), 0, 150) !!}
                                    </p>

                                    <hr>

                                    <a href="/post-detail/{{ $data->slug }}" class="readmore stretched-link"><span>Read
                                            More</span><i class="bi bi-arrow-right"></i></a>

                                </div>

                            </div>
                        </div><!-- End post list item -->
                    @endforeach

                    {{-- <div class="col-xl-4 col-md-6">
                        <div class="post-item position-relative h-100">

                            <div class="post-img position-relative overflow-hidden">
                                <img src="{{ asset('assets/frontend/assets/img/blog/blog-2.jpg') }}" class="img-fluid"
                                    alt="">
                                <span class="post-date">March 19</span>
                            </div>

                            <div class="post-content d-flex flex-column">

                                <h3 class="post-title">Nisi magni odit consequatur autem nulla dolorem</h3>

                                <div class="meta d-flex align-items-center">
                                    <div class="d-flex align-items-center">
                                        <i class="bi bi-person"></i> <span class="ps-2">Julia Parker</span>
                                    </div>
                                    <span class="px-3 text-black-50">/</span>
                                    <div class="d-flex align-items-center">
                                        <i class="bi bi-folder2"></i> <span class="ps-2">Economics</span>
                                    </div>
                                </div>

                                <p>
                                    Incidunt voluptate sit temporibus aperiam. Quia vitae aut sint ullam quis illum
                                    voluptatum et. Quo
                                    libero rerum voluptatem pariatur nam.
                                </p>

                                <hr>

                                <a href="blog-details.html" class="readmore stretched-link"><span>Read More</span><i
                                        class="bi bi-arrow-right"></i></a>

                            </div>

                        </div>
                    </div><!-- End post list item -->

                    <div class="col-xl-4 col-md-6">
                        <div class="post-item position-relative h-100">

                            <div class="post-img position-relative overflow-hidden">
                                <img src="{{ asset('assets/frontend/assets/img/blog/blog-3.jpg') }}" class="img-fluid"
                                    alt="">
                                <span class="post-date">June 24</span>
                            </div>

                            <div class="post-content d-flex flex-column">

                                <h3 class="post-title">Possimus soluta ut id suscipit ea ut. In quo quia et soluta libero
                                    sit sint.</h3>

                                <div class="meta d-flex align-items-center">
                                    <div class="d-flex align-items-center">
                                        <i class="bi bi-person"></i> <span class="ps-2">Maria Doe</span>
                                    </div>
                                    <span class="px-3 text-black-50">/</span>
                                    <div class="d-flex align-items-center">
                                        <i class="bi bi-folder2"></i> <span class="ps-2">Sports</span>
                                    </div>
                                </div>

                                <p>
                                    Aut iste neque ut illum qui perspiciatis similique recusandae non. Fugit autem dolorem
                                    labore omnis
                                    et. Eum temporibus fugiat voluptate enim tenetur sunt omnis.
                                </p>

                                <hr>

                                <a href="blog-details.html" class="readmore stretched-link"><span>Read More</span><i
                                        class="bi bi-arrow-right"></i></a>

                            </div>

                        </div>
                    </div><!-- End post list item -->

                    <div class="col-xl-4 col-md-6">
                        <div class="post-item position-relative h-100">

                            <div class="post-img position-relative overflow-hidden">
                                <img src="{{ asset('assets/frontend/assets/img/blog/blog-4.jpg') }}" class="img-fluid"
                                    alt="">
                                <span class="post-date">August 05</span>
                            </div>

                            <div class="post-content d-flex flex-column">

                                <h3 class="post-title">Non rem rerum nam cum quo minus. Dolor distinctio deleniti explicabo
                                    eius
                                    exercitationem.</h3>

                                <div class="meta d-flex align-items-center">
                                    <div class="d-flex align-items-center">
                                        <i class="bi bi-person"></i> <span class="ps-2">Maria Doe</span>
                                    </div>
                                    <span class="px-3 text-black-50">/</span>
                                    <div class="d-flex align-items-center">
                                        <i class="bi bi-folder2"></i> <span class="ps-2">Sports</span>
                                    </div>
                                </div>

                                <p>
                                    Aspernatur rerum perferendis et sint. Voluptates cupiditate voluptas atque quae. Rem
                                    veritatis rerum
                                    enim et autem. Saepe atque cum eligendi eaque iste omnis a qui.
                                </p>

                                <hr>

                                <a href="blog-details.html" class="readmore stretched-link"><span>Read More</span><i
                                        class="bi bi-arrow-right"></i></a>

                            </div>

                        </div>
                    </div><!-- End post list item -->

                    <div class="col-xl-4 col-md-6">
                        <div class="post-item position-relative h-100">

                            <div class="post-img position-relative overflow-hidden">
                                <img src="{{ asset('assets/frontend/assets/img/blog/blog-5.jpg') }}" class="img-fluid"
                                    alt="">
                                <span class="post-date">September 17</span>
                            </div>

                            <div class="post-content d-flex flex-column">

                                <h3 class="post-title">Accusamus quaerat aliquam qui debitis facilis consequatur</h3>

                                <div class="meta d-flex align-items-center">
                                    <div class="d-flex align-items-center">
                                        <i class="bi bi-person"></i> <span class="ps-2">John Parker</span>
                                    </div>
                                    <span class="px-3 text-black-50">/</span>
                                    <div class="d-flex align-items-center">
                                        <i class="bi bi-folder2"></i> <span class="ps-2">Politics</span>
                                    </div>
                                </div>

                                <p>
                                    In itaque assumenda aliquam voluptatem qui temporibus iusto nisi quia. Autem vitae quas
                                    aperiam
                                    nesciunt mollitia tempora odio omnis. Ipsa odit sit ut amet necessitatibus. Quo ullam ut
                                    corrupti
                                    autem consequuntur totam dolorem.
                                </p>

                                <hr>

                                <a href="blog-details.html" class="readmore stretched-link"><span>Read More</span><i
                                        class="bi bi-arrow-right"></i></a>

                            </div>

                        </div>
                    </div><!-- End post list item -->

                    <div class="col-xl-4 col-md-6">
                        <div class="post-item position-relative h-100">

                            <div class="post-img position-relative overflow-hidden">
                                <img src="{{ asset('assets/frontend/assets/img/blog/blog-6.jpg') }}" class="img-fluid"
                                    alt="">
                                <span class="post-date">December 07</span>
                            </div>

                            <div class="post-content d-flex flex-column">

                                <h3 class="post-title">Distinctio provident quibusdam numquam aperiam aut</h3>

                                <div class="meta d-flex align-items-center">
                                    <div class="d-flex align-items-center">
                                        <i class="bi bi-person"></i> <span class="ps-2">Julia White</span>
                                    </div>
                                    <span class="px-3 text-black-50">/</span>
                                    <div class="d-flex align-items-center">
                                        <i class="bi bi-folder2"></i> <span class="ps-2">Economics</span>
                                    </div>
                                </div>

                                <p>
                                    Expedita et temporibus eligendi enim molestiae est architecto praesentium dolores. Illo
                                    laboriosam
                                    officiis quis. Labore officia quia sit voluptatem nisi est dignissimos totam. Et
                                    voluptate et
                                    consectetur voluptatem id dolor magni impedit. Omnis dolores sit.
                                </p>

                                <hr>

                                <a href="blog-details.html" class="readmore stretched-link"><span>Read More</span><i
                                        class="bi bi-arrow-right"></i></a>

                            </div>

                        </div>
                    </div><!-- End post list item --> --}}

                </div><!-- End blog posts list -->


                <div class="blog-pagination">
                    <ul class="justify-content-center">
                        {{ $posts->links() }}
                        {{-- <li><a href="#">1</a></li>
                        <li class="active"><a href="#">2</a></li>
                        <li><a href="#">3</a></li> --}}
                    </ul>
                </div><!-- End blog pagination -->

            </div>
        </section><!-- End Blog Section -->

    </main><!-- End #main -->
@endsection
