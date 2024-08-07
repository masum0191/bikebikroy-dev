@extends('layouts.frontend')
@section('page-style')
<link href="{{asset('assets/css/lightbox.min.css')}}" rel="stylesheet" type="text/css">
<style>
    @media (max-width: 767px) { 
    .bike-post-list{
        width: 100%;
    height: 240px;
    }
    .product-share ul{
text-align: left;
margin-top: 8px;
}
 
 }
 
     #social-links {
        display: inline-block;

    }
.image-container {
    width: 100px; /* Set a fixed width for the container */
    height: 70px; /* Set a fixed height for the container */
    overflow: hidden; /* Hide any overflow content */
    display: inline-block; /* Display the containers inline */
    margin-right: 10px; /* Add spacing between the containers (adjust as needed) */
}

   .xzoom-gallery5{
  width: 100%; /* Ensure the image fills the container */
    height: 100%; /* Ensure the image fills the container */
    object-fit: cover; /* Cover the entire container while maintaining aspect ratio */


   }

ul.sfty-li li {
    list-style: disc;
}
    #social-links ul {
        margin-bottom: 0 !important;
        padding-left: 0 !important;
        margin-right: 10px;
    }

    #social-links ul li {
        list-style: none;
    }

    #social-links ul li a span {
        font-size: 22px;
        color: #000;
    }
    li{
        list-style: none;
    }

    </style>
@endsection
@section('content')
<section id="product-main">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="similar-head pt-5 border-0">
                    <div class="row">
                        <div class="col-md-6">
                            <h3 class="mb-0 smlr-head">
                             {{-- {{@$Bike}} --}}
                             {{@$Bike->title}}
                            </h3>
                            <p class="mb-0 product-time">

                                Posted on {{@$Bike->created_at}} at {{@$Bike->division->division}}, {{@$Bike->district->district}}
                            </p>
                        </div>
                        <div class="col-md-6 align-self-center">
                            <div class="product-share">
                                    <ul>

                                    {!! Share::currentPage()->facebook() !!}
                                    {!! Share::currentPage()->twitter() !!}
                                   {!! Share::currentPage()->whatsapp() !!}
                                    <li><a href="{{url('user/saveadd/'.@$Bike->id)}}"><i class="far fa-star"></i> Save ad</a></li>

                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">

                <div class="row">
                    
     
                    <div class="col-md-12">
                        <div class="">
                             <section id="magnific">
    <div class="row">
      <!--<div class="large-12 column"><h3>With Magnific Pop-up</h3>Left click while zooming</div>-->
      <div class="large-7 column">
        <div class="xzoom-container ">
            <div style="text-align:center;">
                <img class="xzoom5 " style="" id="xzoom-magnific" alt="{{$Bike->title}}" src="{{@url('storage/app/files/shares/uploads/'.$Bike->path.'/'.$Bike->photoone)}}" xoriginal="{{@url('storage/app/files/shares/uploads/'.$Bike->path.'/'.$Bike->photoone)}}" height="400px" max-width="735" />
          
            </div>
          <div class="xzoom-thumbs pt-2" >
            <a class="image-container" href="{{@url('storage/app/files/shares/uploads/'.$Bike->path.'/'.$Bike->photoone)}}"><img class="xzoom-gallery5" src="{{@url('storage/app/files/shares/uploads/'.$Bike->path.'/'.$Bike->photoone)}}" title="{{$Bike->title}}"></a>

@if ($Bike->phototwo !== 'not-found.webp')
    <a class="image-container" href="{{@url('storage/app/files/shares/uploads/'.$Bike->path.'/'.$Bike->phototwo)}}"><img class="xzoom-gallery5" src="{{@url('storage/app/files/shares/uploads/'.$Bike->path.'/'.$Bike->phototwo)}}" title="{{$Bike->title}}"></a>
@endif 

@if ($Bike->photothree !== 'not-found.webp')
    <a class="image-container" href="{{@url('storage/app/files/shares/uploads/'.$Bike->path.'/'.$Bike->photothree)}}"><img class="xzoom-gallery5" src="{{@url('storage/app/files/shares/uploads/'.$Bike->path.'/'.$Bike->photothree)}}" title="{{$Bike->title}}"></a>
@endif

@if ($Bike->photofour !== 'not-found.webp')
    <a class="image-container" href="{{@url('storage/app/files/shares/uploads/'.$Bike->path.'/'.$Bike->photofour)}}"><img class="xzoom-gallery5" src="{{@url('storage/app/files/shares/uploads/'.$Bike->path.'/'.$Bike->photofour)}}" title="{{$Bike->title}}"></a>
@endif

            <!--<a href="images/gallery/original/04_g_car.jpg"><img class="xzoom-gallery5" width="80" src="images/gallery/preview/04_g_car.jpg" title="The description goes here"></a>-->
          </div>
        </div>        
      </div>
      
    </div>
    </section>
                            {{--<div class="exzoom" id="exzoom">
                                <!-- Images -->

                                                         <li>

                                                            <a data-lightbox="roadtrip"  href="{{@url('storage/app/files/shares/uploads/'.$Bike->path.'/'.$Bike->photoone)}}">
                                                                <img src="{{@url('storage/app/files/shares/uploads/'.$Bike->path.'/'.$Bike->photoone)}}"  alt="{{$Bike->title}}" height="400px" max-width="735"  class="img-fluid" data-lightbox="roadtrip"  />


                                                            </a>
                                                        </li>
                                                        @if ($Bike->phototwo!=='not-found.webp')
                                                         <a data-lightbox="roadtrip"  href="{{@url('storage/app/files/shares/uploads/'.$Bike->path.'/'.$Bike->phototwo)}}">
                                                                <img style="width:140px;height:80px" src="{{@url('storage/app/files/shares/uploads/'.$Bike->path.'/'.$Bike->phototwo)}}"  alt="{{$Bike->title}}" class="demo-gallery card border"  id="demo-test-gallery" />
                                                            </a>
                                                            @endif
                                                            @if ($Bike->photothree!=='not-found.webp')
                                                            <a data-lightbox="roadtrip"  href="{{@url('storage/app/files/shares/uploads/'.$Bike->path.'/'.$Bike->photothree)}}">
                                                                   <img style="width:140px;height:80px" src="{{@url('storage/app/files/shares/uploads/'.$Bike->path.'/'.$Bike->photothree)}}"  alt="{{$Bike->title}}" class="demo-gallery"  id="demo-test-gallery" />
                                                               </a>
                                                               @endif
                                                               @if ($Bike->photofour!=='not-found.webp')
                                                               <a data-lightbox="roadtrip"  href="{{@url('storage/app/files/shares/uploads/'.$Bike->path.'/'.$Bike->photofour)}}">
                                                                      <img style="width:140px;height:80px" src="{{@url('storage/app/files/shares/uploads/'.$Bike->path.'/'.$Bike->photofour)}}"  alt="{{$Bike->title}}" class="demo-gallery"  id="demo-test-gallery" />
                                                                  </a>
                                                                  @endif


                            </div>--}}
                        </div>

                        <div class="sproduct-price">
                            <h3 class="">
                                Tk {{number_format($Bike->price)}} BDT
                                @if ($Bike->negotiable=='on')
                                <span>Negotiable</span>
                                @endif


                            </h3>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">

                        <div class="row">
                            <div class="col-md-6">

                                   <p class="mb-0">
                                    Bike Type:
                                    <b>{{@$Bike->biketype}}</b>

                                </p>
                                       <p class="mb-0">
                                    Model:
                                    <b>{{@$Bike->bikemodel->bikemodel}}</b>

                                </p>
                                     <p class="mb-0">
                                    Year of Manufacture:
                                    <b>{{@$Bike->manufacture}}</b>

                                </p>

                                <p>
                                    Engine Capacity:
                                    <b>{{@$Bike->cc}}CC</b>
                                </p>
                            </div>
                            <div class="col-md-6">
                                <p class="mb-0">
                                    Brand:
                                    <b> {{@$Bike->bikebrand->bikebrand}}</b>

                                </p>
                                     <p class="mb-0">
                                    Trim/Edition:
                                    <b>{{@$Bike->edition}}</b>

                                </p>
                                   <p class="mb-0">
                                    Kilometers Run:
                                    <b>{{@$Bike->kilometerrun}}</b>

                                </p>
                                  <p class="mb-0">
                                    Condition:
                                    <b style="text-transform: capitalize;">{{@$Bike->condition}}</b>


                                </p>

                            </div>
                        </div>
                        <p>
                            <b>Description</b> <br>

                           {!! @$Bike->description !!}
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="pr-sidebar">
                    <p>
                        For sale by
                        <b> {{@$Bike->user->fullname}}</b>
                    </p>
                    @if (@$Bike->user->bikeshop)
                   <p>
                       Shop :
                        <b> <a href="{{ url('bikeshop/'. @$Bike->user->bikeshop->slug)}}">{{ @$Bike->user->bikeshop->shopname }}</a></b>
                    </p>
                    @endif 
                    <div id="Hidephone">
                        <div role="button">
                         
                            {{Str::limit(@$Bike->phonenumber,5,'*******')}}</strong>
                          &nbsp; &nbsp;&nbsp; <p class="mb-0" style="font-size:12px">Click To  View Phone Number </p>
                        </div>
                    </div>
                   <p class="d-none" id="Showphone"> 
                    <i class="fas fa-phone" ></i><a href="{{'tel:'. @$Bike->phonenumber}}">  {{ $Bike->phonenumber }}</a>
                    
               
                    </p> 
                    @if (@Auth::id()!==$Bike->user_id)
                      <p>
                        <a href="{{url('user/bikesalechat/'.$Bike->id)}}"><i class="fas fa-comments"></i> Chat</a>
                    </p>
                   
                    @endif
                    <p>
                        <b><i class="fas fa-shield-alt"></i> Safety tips</b>
                    </p>
                    <ul class="sfty-li">
                        <li>Avoid offers that look unrealistic</li>
                        <li>Call with seller to clarify item details</li>
                        <li>Meet in a safe & public place</li>
                        <li>Check the item before buying it</li>
                        <li>Don’t pay in advance</li>
                       </ul>
                </div>
            </div>
        </div>

    </div>
</section>

<section id="similar-add">
    <div class="container">
        <div class="similar-head">
            <div class="row">
                <div class="col-md-6">
                    <h3 class="mb-0 smlr-head">
                        Similar Ads
                    </h3>
                </div>
                <div class="col-md-6 text-end">
                    <a href="{{ url('bikesale') }}">Show more ads</a>
                </div>
            </div>
        </div>
        <div class="similar-main">
            <div class="row">
                @foreach ($Similarbike as $bike)


                <div class="col-md-6">
                    <div class="card ad-card-single border" style="">
                        <a href="{{url('bikesale/'.$bike->slug)}}">
                            <div class="row g-0">
                                <div class="col-md-5">
                                    <img src="{{url('storage/app/files/shares/uploads/'.$bike->path.'/'.$bike->photoone)}}" class="w-100 bike-post-list" height="150px" width="225px;" alt="{{$bike->title}}" style="object-fit: cover;">

                                </div>
                                <div class="col-md-7">
                                    <div class="card-body">
                                        <h5 class="card-title">{{$bike->title}}</h5>
                                        <h6 class="price">
                                            {{number_format($bike->price)}} BDT
                                        </h6>
                                        <p class="card-text mb-0">{{@$bike->district->district}}, {{@$bike->bikebrand->bikebrand}}</p>
                                        <p class="card-text"><small class="text-muted">{{@$bike->created_at->diffForHumans()}}</small></p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>


        </div>
    </div>
</section>



@endsection
@section('page-script')
<script src="{{asset('assets/js/lightbox.min.js')}}"></script>
<script>
      $(document).ready(function () {
       $('#Hidephone').click(function(){
        $('#Hidephone').addClass('d-none');
        $('#Showphone').removeClass('d-none');
       });

});


</script>
@endsection