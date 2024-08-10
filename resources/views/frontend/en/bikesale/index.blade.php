@extends('layouts.frontend')
@section('content')
<style>
    @media (max-width: 767px) { 
    .bike-post-list{
        width: 100%;
    }
 
 }


@media (min-width: 768px) and (max-width: 991px) { 
    .bike-post-list{
     height: 190px;
     width: 198px;   
    }
 }


@media (min-width: 992px) and (max-width: 1199px) {
    .bike-post-list{
        height: 240px;
        width: 198px;   
       }
 }


 .search-bar .select2-container--default .select2-selection--single .select2-selection__arrow{
    height: 36px;
}
.search-bar span.select2.select2-container.select2-container--default.select2-container--focus{
    height: 100%;
}
.search-bar .select2-container{
    height: 100%;
}
.search-bar .selection{
    height: 100%;
}
.search-bar .select2-container--default .select2-selection--single{
    height: 100%;
}
.search-bar .select2-container--default .select2-selection--single .select2-selection__rendered{
    height: 100%;
    line-height: 36px;
}
</style>
 <section id="ad-src-area">
     <form action="{{url('/bikesalesearch')}}" method="get" class="d-flex">
        <div class="container">
            <div class="search-bar">
                <div class="row">
                    <div class="col-md-2">
                        {!! Form::select('district',CommonFx::Districtname(),null,array('class'=>'form-select js-example-basic-single','required','placeholder'=>'Select District'))!!}

                    </div>
                    <div class="col-md-2">
                        {!! Form::select('brand',CommonFx::Brandnane(),null,array('class'=>'form-select js-example-basic-single','required','placeholder'=>'Select Brand'))!!}
                    </div>
                    <div class="col-md-2">
                         <select class="form-select me-2 js-example-basic-single" id="selectOption"> >
                                <option value="">Select Price Type</option>
                                <option <?php if(@$type=='low') echo 'selected'; ?> value="low">Price Low to High</option>
                                <option <?php if(@$type=='high') echo 'selected'; ?> value="high">Price High to Low</option>
                            </select> 
                    </div>
                    <div class="col-md-6  d-flex">
                           
                            <input class="form-control me-2" type="search" name="keyword" placeholder="Search" aria-label="Search">
                            
                          
                            
                        
                            <button class="btn btn-outline-primary" type="submit">Search</button>

                    </div>
                </div>
            </div>
        </div>
     </form>
    </section>


    <section id="main-ad">
        <div class="container">
            <div class="row">
                <div class="col-md-2">
                    <div class="sidebar mobile-none">
                        
                        
                        <!--<p class="mb-2 sidebar-head">-->
                        <!--    Sort results by-->
                        <!--</p>-->
                        <!--{!! Form::select('district',CommonFx::Districtname(),null,array('class'=>'form-select js-example-basic-single','placeholder'=>'Select District'))!!}-->
                        <!--<p class="mb-2 pt-2 sidebar-head">-->
                        <!--    Sort results by-->
                        <!--</p>-->
                        <!--{!! Form::select('district',CommonFx::Districtname(),null,array('class'=>'form-select js-example-basic-single','placeholder'=>'Select District'))!!}-->

                        <!--  <p class="mb-2 pt-2 sidebar-head">-->
                        <!--  {{@$brandtype}}-->
                        <!--</p>-->
                        <ul class="ps-0 sidebar-brand">
                            @foreach ($Bikebrad as $brand)
                             <li><a  href="{{url('bikebrand/'.$brand->slug)}}"> <i class="fas fa-motorcycle"></i> {{$brand->bikebrand}} <span>({{$brand->bikesale->count('id')}})</span></a></li>
                            @endforeach


                        </ul>
                         <p class="mb-2 pt-2 sidebar-head">
                            Location
                        </p>
                        <ul class="ps-0 sidebar-brand">
                            @foreach ($Divisionalbike as $divison)
                            <li><a  href="{{url('bikesale-divison/'.$divison->slug)}}"> <i class="fas fa-map"></i> {{$divison->division}} <span>({{$divison->bikesale->count('id')}})</span></a></li>
                           @endforeach

                        </ul>
                    </div>
                </div>
                <div class="col-md-8">
                    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-indicators">
                            @foreach($Bikeslider as  $slider)
                            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="{{$loop->index}}" class="{{$loop->iteration == 1 ? 'active' : ''}}" aria-current="true" aria-label="Slide 1"></button>
                            @endforeach
                        </div>
                        <div class="carousel-inner">
                            @foreach($Bikeslider as  $slider)
                            <div class="carousel-item {{$loop->iteration == 1 ? 'active' : ''}}">
                                <img src="{{url('storage/app/files/shares/uploads/'.$slider->path.'/'.$slider->photoone)}}" class="d-block w-100" max-width="736px" height="400px" alt="{{$slider->title}}" style="object-fit: cover">
                                <a href="{{url('bikesale/'.$slider->slug)}}">
                                <div class="carousel-caption d-none d-md-block">
                                    <h5>{{$slider->title}}</h5>
                                    <p class="mb-0">{{$slider->title}}</p>
                                </div>
                            </a>
                            </div>

                            @endforeach
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>


                    <div class="ad-card">
                    @foreach (@$Allbikes as $bike)
                       <div class="card ad-card-single mb-3 border"  style="">
                            <a href="{{url('bikesale/'.$bike->slug)}}">
                                <div class="row g-0">
                                    <div class="col-md-5"> <img src="{{url('storage/app/files/shares/uploads/'.$bike->path.'/'.$bike->photoone)}}" class="bike-post-list" width="307px" height="215px" alt="{{$bike->title}}" style="object-fit: cover">
                                    </div>
                                    <div class="col-md-7">
                                        <div class="card-body">
                                            <h5 class="card-title mb-0">{{$bike->title}}</h5>
                                            <p class="card-text mb-1">{{@$bike->thana->thana}}, {{@$bike->district->district}}, {{ @$bike->division->division}}  </p>

                                               <span class="member-btn"><i class="fas fa-star"></i>
                                                {{@$bike->user->package->packagename}}</span>
                                            <h6 class="price text-primary mb-3 mt-1">
                                                Tk {{$bike->price}}

                                            <p class="card-text text-end"><small class="text-muted">{{@$bike->updated_at->diffForHumans()}}</small></p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        @endforeach
                    </div>
                    {{@$Allbikes->onEachSide(1)->links()}}
                </div>

                <div class="col-md-2">
                    <img src="assets/images/ad-space-160x600.jpg" class="" alt="">
                </div>
            </div>
        </div>
    </section>

@endsection