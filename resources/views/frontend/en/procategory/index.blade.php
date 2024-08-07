@extends('layouts.frontend')
@section('content')
   

   
    <section id="similar-add">
    <div class="container">
        <div class="similar-head">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="mb-0 smlr-head">
                        {{$info->title}}
                    </h3>
                    <P> {{$info->shortdescription}}</P>
                    
                    
                </div>
                
            </div>
        </div>
        @if($info->type)
        <div class="similar-main" style="padding: 30px 0;">
            <h3  class="mb-0 smlr-head">Type of {{$info->type}} Bike</h3>
            <div class="row">
                @foreach (App\Models\Bikesale::where('biketype',$info->type)->get()->take(8) as $bike)

                    <div class="col-md-3">
                        
                        <div class="card ad-card-single border mb-0">
                            <a href="{{url('bikesale/'.$bike->slug)}}">
                                <img src="{{url('storage/app/files/shares/uploads/'.$bike->path.'/'.$bike->photoone)}}" class="w-100 bike-post-list" height="150px" width="225px;" alt="{{$bike->title}}" style="object-fit: cover;">
                                <div class="card-body">
                                    <h5 class="card-title">
                                        @if(Str::of($bike->title)->wordCount()>2)
                                        {{substr($bike->title, 0, 20) . '...'}}
                                        @else
                                        {{substr($bike->title, 0, 20) . '...'}} 
                                        @endif
                                    
                                    </h5>
                                    <h6 class="price">
                                       {{number_format($bike->price)}} BDT
                                    </h6>
                                    <p class="card-text mb-0"><?php $area=App\Models\Area::where('thana_id',$bike->thana_id)->first(); ?>{{@$area->areaname}}, {{@$bike->thana->thana}}, {{ @$bike->district->district}} </p>
                                    
                                </div>
                            </a>
                        </div>
                       
                    </div>

              
                @endforeach
            </div>
        </div>
        @endif
         @if($info->location)
        <div class="similar-main" style="padding: 30px 0;">
            <h3  class="mb-0 smlr-head">Location Bike</h3>
            <div class="row">
                @foreach (App\Models\Bikesale::where('district_id',$info->location)->get()->take(8) as $bike)

                    <div class="col-md-3">
                        
                      <div class="card ad-card-single border mb-0">
                            <a href="{{url('bikesale/'.$bike->slug)}}">
                                <img src="{{url('storage/app/files/shares/uploads/'.$bike->path.'/'.$bike->photoone)}}" class="w-100 bike-post-list" height="150px" width="225px;" alt="{{$bike->title}}" style="object-fit: cover;">
                                <div class="card-body">
                                    <h5 class="card-title">
                                        @if(Str::of($bike->title)->wordCount()>2)
                                        {{substr($bike->title, 0, 20) . '...'}}
                                        @else
                                        {{substr($bike->title, 0, 20) . '...'}} 
                                        @endif
                                    
                                    </h5>
                                    <h6 class="price">
                                       {{number_format($bike->price)}} BDT
                                    </h6>
                                    <p class="card-text mb-0"><?php $area=App\Models\Area::where('thana_id',$bike->thana_id)->first(); ?>{{@$area->areaname}}, {{@$bike->thana->thana}}, {{ @$bike->district->district}} </p>
                                    
                                </div>
                            </a>
                        </div>
                       
                    </div>

              
                @endforeach
            </div>
        </div>
        @endif
         @if($info->cc)
        <div class="similar-main" style="padding: 30px 0;">
            <h3  class="mb-0 smlr-head">{{$info->cc}} CC Bike</h3>
            <div class="row">
                @foreach (App\Models\Bikesale::where('cc',$info->cc)->get()->take(8) as $bike)

                    <div class="col-md-3">
                        
                      <div class="card ad-card-single border mb-0">
                            <a href="{{url('bikesale/'.$bike->slug)}}">
                                <img src="{{url('storage/app/files/shares/uploads/'.$bike->path.'/'.$bike->photoone)}}" class="w-100 bike-post-list" height="150px" width="225px;" alt="{{$bike->title}}" style="object-fit: cover;">
                                <div class="card-body">
                                    <h5 class="card-title">
                                        @if(Str::of($bike->title)->wordCount()>2)
                                        {{substr($bike->title, 0, 20) . '...'}}
                                        @else
                                        {{substr($bike->title, 0, 20) . '...'}} 
                                        @endif
                                    
                                    </h5>
                                    <h6 class="price">
                                       {{number_format($bike->price)}} BDT
                                    </h6>
                                    <p class="card-text mb-0"><?php $area=App\Models\Area::where('thana_id',$bike->thana_id)->first(); ?>{{@$area->areaname}}, {{@$bike->thana->thana}}, {{ @$bike->district->district}} </p>
                                    
                                </div>
                            </a>
                        </div>
                       
                    </div>

              
                @endforeach
            </div>
        </div>
        @endif
          @if($info->Ymanufacture)
        <div class="similar-main" style="padding: 30px 0;">
            <h3 class="mb-0 smlr-head">{{$info->Ymanufacture}} of Manufacture  Bike</h3>
            <div class="row">
                @foreach (App\Models\Bikesale::where('year',$info->Ymanufacture)->get()->take(8) as $bike)

                    <div class="col-md-3">
                        
                      <div class="card ad-card-single border mb-0">
                            <a href="{{url('bikesale/'.$bike->slug)}}">
                                <img src="{{url('storage/app/files/shares/uploads/'.$bike->path.'/'.$bike->photoone)}}" class="w-100 bike-post-list" height="150px" width="225px;" alt="{{$bike->title}}" style="object-fit: cover;">
                                <div class="card-body">
                                    <h5 class="card-title">
                                        @if(Str::of($bike->title)->wordCount()>2)
                                        {{substr($bike->title, 0, 20) . '...'}}
                                        @else
                                        {{substr($bike->title, 0, 20) . '...'}} 
                                        @endif
                                    
                                    </h5>
                                    <h6 class="price">
                                       {{number_format($bike->price)}} BDT
                                    </h6>
                                    <p class="card-text mb-0"><?php $area=App\Models\Area::where('thana_id',$bike->thana_id)->first(); ?>{{@$area->areaname}}, {{@$bike->thana->thana}}, {{ @$bike->district->district}} </p>
                                    
                                </div>
                            </a>
                        </div>
                       
                    </div>

              
                @endforeach
            </div>
        </div>
        @endif
         @if($info->enginecapacity)
        <div class="similar-main" style="padding: 30px 0;">
            <h3 class="mb-0 smlr-head">{{$info->enginecapacity}} CC Bike</h3>
            <div class="row">
                @foreach (App\Models\Bikesale::where('cc',$info->enginecapacity)->get()->take(8) as $bike)

                    <div class="col-md-3">
                        
                     <div class="card ad-card-single border mb-0">
                            <a href="{{url('bikesale/'.$bike->slug)}}">
                                <img src="{{url('storage/app/files/shares/uploads/'.$bike->path.'/'.$bike->photoone)}}" class="w-100 bike-post-list" height="150px" width="225px;" alt="{{$bike->title}}" style="object-fit: cover;">
                                <div class="card-body">
                                    <h5 class="card-title">
                                        @if(Str::of($bike->title)->wordCount()>2)
                                        {{substr($bike->title, 0, 20) . '...'}}
                                        @else
                                        {{substr($bike->title, 0, 20) . '...'}} 
                                        @endif
                                    
                                    </h5>
                                    <h6 class="price">
                                       {{number_format($bike->price)}} BDT
                                    </h6>
                                    <p class="card-text mb-0"><?php $area=App\Models\Area::where('thana_id',$bike->thana_id)->first(); ?>{{@$area->areaname}}, {{@$bike->thana->thana}}, {{ @$bike->district->district}} </p>
                                    
                                </div>
                            </a>
                        </div>
                       
                    </div>

              
                @endforeach
            </div>
        </div>
        @endif
          @if($info->enginecapacity)
        <div class="similar-main" style="padding: 30px 0;">
            <h3 class="mb-0 smlr-head">Brand Bike</h3>
            <div class="row">
                @foreach (App\Models\Bikesale::whereIn('bikebrand_id',[json_decode($info->queryinfo)])->get()->take(8) as $bike)

                    <div class="col-md-3">
                        
                       <div class="card ad-card-single border mb-0">
                            <a href="{{url('bikesale/'.$bike->slug)}}">
                                <img src="{{url('storage/app/files/shares/uploads/'.$bike->path.'/'.$bike->photoone)}}" class="w-100 bike-post-list" height="150px" width="225px;" alt="{{$bike->title}}" style="object-fit: cover;">
                                <div class="card-body">
                                    <h5 class="card-title">
                                        @if(Str::of($bike->title)->wordCount()>2)
                                        {{substr($bike->title, 0, 20) . '...'}}
                                        @else
                                        {{substr($bike->title, 0, 20) . '...'}} 
                                        @endif
                                    
                                    </h5>
                                    <h6 class="price">
                                       {{number_format($bike->price)}} BDT
                                    </h6>
                                    <p class="card-text mb-0"><?php $area=App\Models\Area::where('thana_id',$bike->thana_id)->first(); ?>{{@$area->areaname}}, {{@$bike->thana->thana}}, {{ @$bike->district->district}} </p>
                                    
                                </div>
                            </a>
                        </div>
                       
                    </div>

              
                @endforeach
            </div>
        </div>
        @endif
    </div>
</section>
   
   

    


    <section id="quick-link">
        <div class="container">
           
            <p>{!!$info->headerinfo!!}</p>

             <p>{!!$info->footerinfo!!}</p>
          
        </div>
    </section>


@endsection