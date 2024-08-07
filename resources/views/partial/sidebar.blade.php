  <div class="col-md-3">

                <img src="{{url('assets/image/300px-ad.gif')}}" alt="" class="mb-4 sidebar-ad">
                <img src="{{url('assets/image/300px-ad.gif')}}" alt="" class="mb-4 sidebar-ad">
                <div class="bp-sidebar">
                    <div class="filter-side-card flt-side-main-area shadow-none border-0 bg-transparent">
                        <p class="filter-side-head mb-0">Best Bikes</p>
                           @foreach (@CommonFx::Bestbike() as $best)
                              
                        <div class="single-filter-side">
                            <div class="row">
                                <div class="col-md-5 col-sm-5 align-self-center">
                                    <img src="{{url('den/storage/app/files/shares/images/productimages/thumb/'.$best->featureimage)}}" width="50" height="80" alt="{{$best->bikename}}" class="w-100">
                                </div>
                                <div class="col-md-7 col-sm-7 ps-0 align-self-center">
                                    <p class="mb-0 filter-side-name')}}">
                                        <a href="{{url('/price/'.$best->slug)}}">{{$best->bikename}}</a>
                                    </p>
                                    <p class="mb-0 filter-side-name">
                                        Price: <strong>{{$best->regularprice}}</strong>
                                    </p>
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>

                    <p class="view-all-btn mb-0">
                        <a href="#">
                            View all Best Bikes
                        </a>
                    </p>

                </div>


                <div class="bp-sidebar">
                    <div class="filter-side-card flt-side-main-area shadow-none border-0 bg-transparent">
                        <p class="filter-side-head mb-0">Latest Bikes</p>

                      
                        
                        @foreach (@CommonFx::Latest() as $best)
                              
                        <div class="single-filter-side">
                            <div class="row">
                                <div class="col-md-5 col-sm-5 align-self-center">
                                    <img data-original="{{url('den/storage/app/files/shares/images/productimages/thumb/'.$best->featureimage)}}" width="50" height="80" alt="{{$best->bikename}}" class="w-100">
                                </div>
                                <div class="col-md-7 col-sm-7 ps-0 align-self-center">
                                    <p class="mb-0 filter-side-name')}}">
                                        <a href="{{url('/price/'.$best->slug)}}">{{$best->bikename}}</a>
                                    </p>
                                    <p class="mb-0 filter-side-name">
                                        Price: <strong>{{$best->regularprice}}</strong>
                                    </p>
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>

                    <p class="view-all-btn mb-0">
                        <a href="#">
                            View all Latest Bikes
                        </a>
                    </p>

                </div>



                <div class="bp-sidebar">
                    <div class="filter-side-card flt-side-main-area shadow-none border-0 bg-transparent">
                        <p class="filter-side-head mb-0">Upcoming Bikes</p>

                      
                        @foreach (@CommonFx::Upcoming() as $best)
                              
                        <div class="single-filter-side">
                            <div class="row">
                                <div class="col-md-5 col-sm-5 align-self-center">
                                    <img data-original="{{url('den/storage/app/files/shares/images/productimages/thumb/'.$best->featureimage)}}" width="50" height="80" alt="{{$best->bikename}}" class="w-100">
                                </div>
                                <div class="col-md-7 col-sm-7 ps-0 align-self-center">
                                    <p class="mb-0 filter-side-name')}}">
                                        <a href="{{url('/price/'.$best->slug)}}">{{$best->bikename}}</a>
                                    </p>
                                    <p class="mb-0 filter-side-name">
                                        Price: <strong>{{$best->regularprice}}</strong>
                                    </p>
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>

                    <p class="view-all-btn mb-0">
                        <a href="#">
                            View all Upcoming Bikes
                        </a>
                    </p>

                </div>


            </div>