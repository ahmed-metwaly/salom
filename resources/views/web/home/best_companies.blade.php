
<section class="best mt-5 bg-f6 py-5">
    <div class="container text-center">
        <h2 class="color-c5 wow fadeIn">افضل مراكز التجميل</h2>
        <img class="img-fluid wow fadeIn" src="{{ URL::asset('public/web/img/line.png') }}" alt="">
        <p class="color-777 mt-2 mb-5 wow fadeIn">تصفحى العديد من مراكز التجميل الممتازة</p>
        <div class="row mb-3">
            @foreach($companies as $company)
                <div class="col-md-4 col-sm-12 wow fadeInDown" data-wow-duration="1s">
                    <a href="{{ route('web.companies.show', Hashids::encode($company->id)) }}">
                        <div class="card border-0 rounded-0 mb-5 mb-md-0 text-center bg-white">
                            <hr class="mx-auto card-hr bg-c5 m-0 position-absolute">
                            <div class="card-block px-4 mt-5 mb-4 w-100 position-absolute">
                                <h4 class="card-title color-c5">{{ $company->name }}</h4>
                                <p class="card-text color-777 font-weight-bold px-1">{{ $company->location_text }}, {{ $company->city }}</p>
                            </div>
                            <div class="card-img-top rounded-0 position-absolute">
                                <img class="img-fluid trans" src="{{ url('public/uploads/users/' . $company->photo) }}" alt="{{ $company->name }}">
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
        {{--@if($companies->hasMorePages())--}}
            {{--<a href="{{ $companies->nextPageUrl() }}" class="btn btn bg-c5 font-18 py-2 px-5 text-white mt-5 wow zoomIn btn-hover" data-wow-duration="1s">مزيد من المراكز</a>--}}
        {{--@endif--}}

    </div>
</section>