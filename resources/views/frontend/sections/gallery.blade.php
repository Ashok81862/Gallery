
<div class="site-section"  data-aos="fade">
    <div class="container-fluid">

      <div class="row justify-content-center">

        <div class="col-md-7">
          <div class="row mb-5">
            <div class="col-12 ">
              <h2 class="site-section-heading text-center">{{ $category->name }} Gallery</h2>
            </div>
          </div>
        </div>

      </div>
      <div class="row" id="lightgallery">
        @if(count($category->medias)>0)
            @foreach ($category->medias as $media )
            <div class="col-sm-6 col-md-4 col-lg-3 col-xl-3 item"       data-aos="fade" data-src="/storage/{{ $media->path }}">
                <a href="#"><img src="/storage/{{ $media->path }}" alt={{ $category->name }} class="img-fluid"></a>
            </div>
            @endforeach
        @else
        <div class="col">
            <div class="row mb-5">
              <div class="col-12 ">
                <h3 class="text-center">No Photos</h2>
              </div>
            </div>
          </div>
        @endif
      </div>
    </div>
  </div>
