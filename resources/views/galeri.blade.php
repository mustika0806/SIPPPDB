@extends('layouts.front.app')
@section('content')
    <!-- end section title -->
    <!-- end portfolio menu list -->
    <div class="row project-list">
        @foreach ($galeries as $galery)
            <div class="col-lg-4 col-md-6 col-12 mb-lg-4 mb-md-4 mb-4 {{ $galery->kategori }}">
                <figure class="portfolio-sin-item">
                    <img class="img-fluid" src="{{ url($galery->gambar) }}" alt="{{ $galery->kategori }}" width="100" />
                    <figcaption>
                        <h3>{{ $galery->kategori }}</h3>
                        <div class="port-icon mt-3">
                            <a class="icon-ho venobox" href="{{ url($galery->gambar) }}" data-title="{{ $galery->deskripsi }}"
                                data-gall="{{ $galery->id }}"><i class="icofont-eye"></i></a>
                            <a class="icon-ho" href="#"><i class="icofont-link"></i></a>
                        </div>
                    </figcaption>
                </figure>
            </div>
        @endforeach
    </div>
    <!--  end single item -->
    </div>
    <!--- END CONTAINER -->
    </section>
    <!-- END PORTFOLIO SECTION -->
@endsection
