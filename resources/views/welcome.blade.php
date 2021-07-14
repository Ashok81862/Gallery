@extends('frontend.layouts')

@section('content')
<div class="container-fluid" data-aos="fade" data-aos-delay="500">
    @if(count($categories) > 0)
    <div class="row">
        @foreach($categories as $category)
          <div class="col-lg-4">
              <div class="image-wrap-2">
              <div class="image-info">
                  <h2 class="mb-3">{{ $category->name }}</h2>
                  <a href="{{ route('gallery', $category->id) }}" class="btn btn-outline-white py-2 px-4">More Photos</a>
              </div>
              @if(count($category->medias) > 0)
                  <img src="/storage/{{ $category->medias->first()->path }}" alt="Image" class="img-fluid">
              @else
                  <img src="https://placekitten.com/350/350" alt="Image" class="img-fluid">
              @endif
              </div>
          </div>
        @endforeach
      </div>
    @else
    <div class="footer py-4">
        <div class="container-fluid text-center">
          <h1>
            No collections
          </h1>
        </div>
    </div>
    @endif
</div>
@endsection
