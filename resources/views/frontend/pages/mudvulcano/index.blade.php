@extends('frontend.layouts.app')
@section('content')
    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <div class="breadcrumbs d-flex align-items-center"
            style="background-image: url('{{ asset('assets/frontend/new-image/2.jpg') }}');">
            <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">

                <h2>Mud Vulcano</h2>
                <ol>
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li>mud vulcano</li>
                </ol>

            </div>
        </div><!-- End Breadcrumbs -->

        <!-- ======= Our Projects Section ======= -->
        <section id="projects" class="projects">
            <div class="container" data-aos="fade-up">

                <div class="portfolio-isotope" data-portfolio-filter="*" data-portfolio-layout="masonry"
                    data-portfolio-sort="original-order">


                    <div class="row gy-4 portfolio-container" data-aos="fade-up" data-aos-delay="200">
                        {{-- @dd($datas) --}}
                        @if (!isset($datas))
                            <div class="container" data-aos="fade-up">
                                <div class="section-header">
                                    <h1>Data is being processed by admin</h1>
                                </div>
                            </div>
                            <section id="projects" class="projects">
                            </section><!-- End Our Projects Section -->
                        @else
                            @foreach ($datas as $data)
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
                        @endif

                    </div><!-- End Projects Container -->
                    <br>
                    <hr>
                    <br>
                    <div class="d-flex flex-column align-items-center justify-content-center">
                        <h2>Kontribusi Pengguna</h2>
                        <div class="col-sm-6">
                            <canvas id="chart"></canvas>
                        </div>
                    </div>
                </div>

            </div>
        </section><!-- End Our Projects Section -->

    </main><!-- End #main -->
@endsection
@push('child-script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
    <script>
        const data = {
            labels: {!! json_encode($users->pluck('name')) !!},
            datasets: [{
                label: 'Jumlah Gunung Lumpur',
                backgroundColor: 'rgb(255, 99, 132)',
                borderColor: 'rgb(255, 99, 132)',
                data: {!! json_encode($users->pluck('vulcanos_count')) !!}
            }]
        };

        const config = {
            type: 'bar',
            data,
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true,
                            stepSize: 1,
                            callback: function(value, index, values) {
                                return index % 2 === 0 ? value : '';
                            }
                        }
                    }],
                    //xAxes tampilkan 
                }
            }
        };

        var myChart = new Chart(
            document.getElementById('chart'),
            config
        );
    </script>
@endpush
