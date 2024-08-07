@extends('layouts.frontend')
@section('content')
<section id="main-ad">
        <div class="container">
             <div class="row">

                <div class="col-md-12">


                    <div class="row">
                        <div class="col-md-12">
                            <p class="category-tittle mb-0">
                              Top Bike & Scooter Brand 
                            </p>
                        </div>

                    </div>
                    <div class="main-category">
                        <div class="row">
                            @foreach ($Bikebradtop as $brand)
                            <div class="col-md-2 col-sm-1">
                                <a href="{{url('bikebrand/'.$brand->slug)}}">
                                    <div class="single-category">
                                        <div class="cat-icon align-self-center">
                                            <img src="{{$brand->photo}}" alt="{{$brand->bikebrand}}" class="img-fluid">
                                        </div>
                                        <div class="cat-text align-self-center">
                                      <span>{{$brand->bikesale->count('id')}}ads</span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            @endforeach
                        </div>


                    </div>
                </div>
              </div>
            <div class="row">

                <div class="col-md-12">


                    <div class="row">
                        <div class="col-md-12 pt-5">
                            <p class="category-tittle mb-0">
                                All Bike Brand
                            </p>
                        </div>

                    </div>
                    <div class="main-category">
                        <div class="row">
                            @foreach ($Bikebrad as $brand)
                            <div class="col-md-2 col-sm-1">
                                <a href="{{url('bikebrand/'.$brand->slug)}}">
                                    <div class="single-category">
                                        <div class="cat-icon align-self-center">
                                            <img src="{{$brand->photo}}" alt="{{$brand->bikebrand}}" class="img-fluid">
                                        </div>
                                        <div class="cat-text align-self-center">
                                      <span>{{$brand->bikesale->count('id')}}ads</span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            @endforeach
                        </div>


                    </div>
                </div>
              </div>
              
        </div>
    </section>

@endsection

