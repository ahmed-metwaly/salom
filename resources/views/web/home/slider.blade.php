
<section class="slider mb-5 wow zoomIn">
    <div class="container-fluid">
        <div class="row">
            <div class="owl-carousel">
                @foreach($sliderImages as $image)
                    <div class="item">
                        <a href="{{ $image->url }}" style="
                        position: absolute;
                        left: 30%;
                        top: 60%;
                    " class="btn bg-c5 font-18 py-2 px-5 text-white btn-hover rounded-0"> المزيد </a>

                            <img class="img-fluid" src="{{ url('/public/uploads/slider/' . $image->image) }}" alt="">
                       
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>