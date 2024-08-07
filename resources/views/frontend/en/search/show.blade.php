@extends('layouts.frontend')
@section('content')
<style>

</style>
<section id="main-ad">
    <div class="container">
        <div class="row">

            <div class="col-md-12">
                @if($Allbikes->isNotEmpty())
                @foreach (@$Allbikes as $bike)
                <!-- <div class="single-search-result d-flex mb-3">
                    <div class="w-25">
                        <img src="{{url('storage/app/files/shares/uploads/'.$bike->path.'/'.$bike->photoone)}}" class="w-100" alt="{{$bike->title}}">
                    </div>
                    <div class="w-75 align-self-center">
                        <h4>

                            <a href="{{url('bikesale/'.$bike->slug)}}">{{$bike->title}}</a>
                        </h4>
                        <p class="mb-0">
                            {!! $bike->description !!}
                        </p>
                    </div>
                </div> -->



                <div class="row g-0 mb-4" style="border: 1px solid #ddd;">
                    <div class="col-md-3"> <img src="{{url('storage/app/files/shares/uploads/'.$bike->path.'/'.$bike->photoone)}}" class="bike-post-list" width="279px" height="180px" alt="Yamaha R15M Price In BD" style="object-fit: cover">
                    </div>
                    <div class="col-md-9">
                        <div class="card-body">
                            <h4>

                                <a href="{{url('bikesale/'.$bike->slug)}}">{{$bike->title}}</a>
                            </h4>
                            <h5>
                                Price: 00000
                            </h5>
                            <p class="mb-0">
                                {!! $bike->description !!}
                            </p>
                        </div>
                    </div>
                </div>
                @endforeach
                {{@$Allbikes->withQueryString()->onEachSide(1)->links()}}
                @else
                <div>
                    <h2 class="text-center">No Resule found</h2>
                </div>
                @endif
            </div>


        </div>
    </div>
</section>



@endsection