@extends('layouts.frontend')
@section('content')
    <section id="banner">

        <div class="container">
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-10">
                    <div class="banner-item text-center">
                        <button class="all-bd-btn">
                            <i class="fas fa-map-marker-alt"></i> All of Bangladesh
                        </button>
                        <form action="{{url('searchbike')}}" method="get" class="d-flex banner-src-form">
                        <input class="form-control banner-src-box" type="search" name="keyword" placeholder="What are you looking for?" aria-label="Search">
                            <button class="btn" type="submit"><i class="fas fa-search"></i></button>
                        </form>


                    </div>

                    <nav class="navbar navbar-light d-none">
  <div class="container-fluid">
    <form class="d-flex m-auto">
      <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" style="width: 800px;">
      <button class="btn btn-warning text-white" style="font-weight: 700;" type="submit">Search</button>
    </form>
  </div>
</nav>
                </div>
                <div class="col-md-1">


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
                        Recent Bikes
                    </h3>
                </div>
                
            </div>
        </div>
        <div class="similar-main">
            <div class="row">
                @foreach ($recentbike as $bike1)

                    <div class="col-md-3">
                        <div class="card ad-card-single border mb-0">
                            <a href="{{url('bikesale/'.$bike1->slug)}}">
                                <img src="{{url('storage/app/files/shares/uploads/'.$bike1->path.'/'.$bike1->photoone)}}" class="w-100 bike-post-list" height="150px" width="225px;" alt="{{$bike1->title}}" style="object-fit: cover;">
                                <div class="card-body">
                                    <h5 class="card-title">
                                        @if(Str::of($bike1->title)->wordCount()>2)
                                        {{substr($bike1->title, 0, 20) . '...'}}
                                        @else
                                        {{substr($bike1->title, 0, 20) . '...'}} 
                                        @endif
                                    
                                    </h5>
                                    <h6 class="price">
                                       {{number_format($bike1->price)}} BDT
                                    </h6>
                                    <p class="card-text mb-0"><?php $area=App\Models\Area::where('thana_id',$bike1->thana_id)->first(); ?>{{@$area->areaname}}, {{@$bike1->thana->thana}}, {{ @$bike1->district->district}} </p>
                                    
                                </div>
                            </a>
                        </div>
                    </div>

                {{--<div class="col-md-6">
                    <div class="card ad-card-single border" style="">
                        <a href="{{url('bikesale/'.$bike->slug)}}">
                            <div class="row g-0">
                                <div class="col-md-5">
                                    <img src="{{url('storage/app/files/shares/uploads/'.$bike->path.'/'.$bike->photoone)}}" class="w-100 bike-post-list" height="150px" width="225px;" alt="{{$bike->title}}" style="object-fit: cover;">

                                </div>
                                <div class="col-md-7">
                                    <div class="card-body">
                                        <h5 class="card-title">{{$bike1->title}}</h5>
                                        <h6 class="price">
                                            {{number_format($bike1->price)}} BDT
                                        </h6>
                                        <p class="card-text mb-0">{{@$bike1->district->district}}, {{@$bike1->bikebrand->bikebrand}}</p>
                                        <p class="card-text"><small class="text-muted">{{@$bike1->created_at->diffForHumans()}}</small></p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>--}} 
                @endforeach
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
                        Recent Sports Bikes
                    </h3>
                </div>
                
            </div>
        </div>
        <div class="similar-main">
            <div class="row">
                @foreach ($recentsports as $bike2)


                  <div class="col-md-3">
                        <div class="card ad-card-single border mb-0">
                            <a href="{{url('bikesale/'.$bike2->slug)}}">
                                <img src="{{url('storage/app/files/shares/uploads/'.$bike2->path.'/'.$bike2->photoone)}}" class="w-100 bike-post-list" height="150px" width="225px;" alt="{{$bike2->title}}" style="object-fit: cover;">
                                <div class="card-body">
                                    <h5 class="card-title">
                                        @if(Str::of($bike2->title)->wordCount()>2)
                                        {{substr($bike2->title, 0, 20) . '...'}}
                                        @else
                                        {{substr($bike2->title, 0, 20) . '...'}}
                                        @endif
                                    
                                    </h5>
                                    <h6 class="price">
                                       {{number_format($bike2->price)}} BDT
                                    </h6>
                                    <p class="card-text mb-0"><?php $area=App\Models\Area::where('thana_id',$bike2->thana_id)->first(); ?>{{@$area->areaname}}, {{@$bike2->thana->thana}}, {{ @$bike2->district->district}} </p>
                                    
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
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
                       Recent Scooters 
                    </h3>
                </div>
                
            </div>
        </div>
        <div class="similar-main">
            <div class="row">
                @foreach ($recentscooters as $bike3)


                <div class="col-md-3">
                        <div class="card ad-card-single border mb-0">
                            <a href="{{url('bikesale/'.$bike3->slug)}}">
                                <img src="{{url('storage/app/files/shares/uploads/'.$bike3->path.'/'.$bike3->photoone)}}" class="w-100 bike-post-list" height="150px" width="225px;" alt="{{$bike3->title}}" style="object-fit: cover;">
                                <div class="card-body">
                                    <h5 class="card-title">
                                        @if(Str::of($bike3->title)->wordCount()>2)
                                        {{substr($bike3->title, 0, 30) . '...'}}
                                        @else
                                        {{substr($bike3->title, 0, 20) . '...'}} &#160 &#160 &nbsp  &#160 &#160 &#160 &#160.
                                        @endif
                                    
                                    </h5>
                                    <h6 class="price">
                                       {{number_format($bike3->price)}} BDT
                                    </h6>
                                    <p class="card-text mb-0"><?php $area=App\Models\Area::where('thana_id',$bike3->thana_id)->first(); ?>{{@$area->areaname}}, {{@$bike3->thana->thana}}, {{ @$bike3->district->district}} </p>
                                    
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>


        </div>
    </div>
</section>
 <section id="category">
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <div class="row">
                        <div class="col-md-6">
                            <p class="category-tittle mb-0">
                                Top Bike & Scooter Brand 
                            </p>
                        </div>
                        <div class="col-md-6">
                            <p class="category-tittle mb-0 text-end">
                                <a href="{{url('all-brand')}}"> See All brand</a>
                            </p>
                        </div>
                    </div>
                    <div class="main-category">
                        <div class="row">
                            @foreach ($Bikebrad as $key=> $brand)
                            @if($key < 12)  
        
    
                                <div class="col-md-2 col-sm-1">
                                <a href="{{url('bikebrand/'.$brand->slug)}}">
                                    <div class="single-category">
                                        <div class="cat-icon align-self-center">
                                            <img src="{{$brand->photo}}" alt="{{$brand->bikebrand}}" class="img-fluid">
                                        </div>
                                        <div class="cat-text align-self-center">

                                            <span>{{$brand->bikesale->count('id')}} Ads</span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            
                            @endif
                           
                            @endforeach
  </div>
        <p class="text-center"  >
              <button style="    margin-top: 16px;
    color: white;
    font-size: larger;
    border-radius: 5px;" class="bg-danger" type="button" id="load" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
            LOAD MORE
        </button>
        </p>
      
               
                <div class="row collapse" id="collapseExample">
                        @foreach ($Bikebrad as $brand)
                        @if($loop->iteration > 12)
                                <div class="col-md-2 col-sm-1">
                                <a href="{{url('bikebrand/'.$brand->slug)}}">
                                    <div class="single-category">
                                        <div class="cat-icon align-self-center">
                                            <img src="{{$brand->photo}}" alt="{{$brand->bikebrand}}" class="img-fluid">
                                        </div>
                                        <div class="cat-text align-self-center">

                                            <span>{{$brand->bikesale->count('id')}} Ads</span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            @endif
                            @endforeach
                            </div>



                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="start-marketing" class="d-none">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="start-marketing-card">
                        <div class="row">
                            <div class="col-md-2">
                                <div class="start-marketing-icon">
                                    <svg viewBox="0 0 119 126" class="svg-wrapper--8ky9e">
                                        <g fill="none" fill-rule="evenodd">
                                            <ellipse fill="#F3F6F5" cx="58.904" cy="66.658" rx="58.904" ry="59.342"></ellipse>
                                            <g fill-rule="nonzero">
                                                <path d="M88.078 46.845c-.928-5.296-3.62-10.302-8-14.022-4.384-3.723-9.715-5.54-15.017-5.54H40.648c-5.3 0-10.632 1.817-15.019 5.54-4.382 3.72-7.074 8.727-8 14.022L9.505 93.16a23.789 23.789 0 0 1-3.966 9.589l-3.776 5.386a2.885 2.885 0 0 0-.21 2.957 2.802 2.802 0 0 0 2.492 1.538h97.616a2.8 2.8 0 0 0 2.49-1.538 2.89 2.89 0 0 0-.206-2.957l-3.782-5.386a23.911 23.911 0 0 1-3.963-9.59l-8.122-46.315zM72.351 5.367c0 .77-.175 1.508-.482 2.155 0 .008-.582.925-.582.925a.2.2 0 0 1-.05.069l-3.947 6.413a9.332 9.332 0 0 1-3.4 3.274 9.233 9.233 0 0 1-4.537 1.188H46.349c-1.54 0-3.099-.38-4.535-1.188a9.415 9.415 0 0 1-3.402-3.271L34.42 8.446l-.579-.925a4.973 4.973 0 0 1-.488-2.154c0-2.733 2.181-4.941 4.873-4.941 2.693 0 4.872 2.208 4.872 4.94 0-2.732 2.187-4.94 4.88-4.94 2.697 0 4.872 2.208 4.872 4.94 0-2.732 2.18-4.94 4.873-4.94 2.695 0 4.882 2.208 4.882 4.94 0-2.732 2.178-4.94 4.872-4.94 2.698 0 4.875 2.209 4.875 4.941z" fill="#D95E46"></path>
                                                <path fill="#34495E" d="M41.158 17.803h23.38v9.48h-23.38z"></path>
                                            </g>
                                            <path d="M83.504 112.182s-3.019-1.728-6.29-23.37c-3.27-21.64-.92-26.736-2.367-33.91-1.446-7.174-2.15-7.863-6.791-15.428-4.643-7.565-11.054-12.398-11.054-12.398l-.32-9.66L63.076 4.62s-1.134-1.663 1.922-3.468c3.057-1.805 4.911 0 4.911 0s1.927.649 2.432 1.933c.506 1.284 0 4.243 0 4.243L65 17.922l-.391 9.111s5.056.04 8.754 1.424c3.699 1.384 4.932 2.681 7.258 4.568 2.326 1.887 2.762 2.174 4.419 5.118 1.656 2.943 1.16 1.407 2.71 7.55 1.55 6.141-.552-3.896 2.498 13.095 3.051 16.991 5.565 31.83 5.975 34.1.41 2.27.5 2.682.979 4.38s-1.455-1.03 1.14 3.131c2.595 4.16 4.938 6.598 5.502 7.517.564.92.757 2.687.757 2.687l-1.272 1.664-19.824-.085z" fill="#C94C3A"></path>
                                            <path fill="#34495E" d="M55.64 17.89h9.294v9.417h-9.293z"></path>
                                            <path fill="#C94C3A" d="M53.623 27.019l1.137 85.118 30.767.73-4.628-52.46-8.212-24.45-11.354-8.56z"></path>
                                            <path d="M52.852 51.466c-10.069 0-18.234 8.28-18.234 18.496 0 10.21 8.165 18.49 18.234 18.49 10.07 0 18.238-8.28 18.238-18.49 0-10.215-8.167-18.496-18.238-18.496zm0 0c-10.069 0-18.234 8.28-18.234 18.496 0 10.21 8.165 18.49 18.234 18.49 10.07 0 18.238-8.28 18.238-18.49 0-10.215-8.167-18.496-18.238-18.496z" fill="#F8FAF9" fill-rule="nonzero"></path>
                                            <path d="M54.352 80.236v1.93c0 .408-.164.766-.425 1.072a1.498 1.498 0 0 1-1.035.429h-.33c-.379 0-.754-.144-1.034-.429a1.531 1.531 0 0 1-.422-1.071v-1.698c-2.22-.098-4.38-.71-5.629-1.45l.988-3.912c1.391.784 3.344 1.478 5.5 1.478 1.889 0 3.168-.757 3.168-2.093 0-1.272-1.052-2.088-3.498-2.911-3.542-1.216-5.963-2.9-5.963-6.175 0-2.945 2.055-5.265 5.599-5.974v-1.694c0-.378.135-.77.426-1.042.277-.306.657-.434 1.036-.434h.313c.378 0 .76.128 1.054.434.278.273.411.664.411 1.042v1.476c2.23.09 3.718.568 4.81 1.104l-.97 3.783c-.853-.347-2.375-1.131-4.761-1.131-2.154 0-2.848.939-2.848 1.886 0 1.104 1.165 1.796 3.977 2.885 3.943 1.406 5.516 3.248 5.516 6.278-.004 2.999-2.078 5.555-5.883 6.217z" fill="#D95E46"></path>
                                            <path fill="#C94C3A" d="M52.96 5.288l.173 12.433 6.567.2 4.203-13.199-1.03.427-.962-2.606-1.548-1.312-2.068-.808-1.49.036-1.387.652-1.19.972-.832.96z"></path>
                                            <path fill="#142A3F" d="M52.852 17.89h12.082v9.417H52.852z"></path>
                                            <g fill-rule="nonzero">
                                                <path d="M105.012 76.084l4.89 24.49a1.325 1.325 0 0 1-1.027 1.549l-46.158 9.583a1.338 1.338 0 0 1-1.564-1.016l-4.89-24.54a1.325 1.325 0 0 1 1.027-1.548l46.157-9.535c.734-.145 1.418.29 1.565 1.017z" fill="#2B8272"></path>
                                                <path d="M95.77 101.881l11.002-2.226c.342-.049.587-.436.538-.775l-4.156-20.715c-.05-.339-.44-.58-.783-.532L91.37 79.859c-.342.048-.587.436-.538.774.05.34.44.581.783.533l10.365-2.081 3.912 19.408-10.366 2.081c-.342.049-.587.436-.538.775.098.338.44.58.783.532z" fill="#4B9587"></path>
                                                <path d="M112.688 82.327l2.445 24.878c.049.726-.44 1.355-1.173 1.452l-49.287 5.953c-.733.049-1.369-.435-1.418-1.161L60.81 88.57c-.049-.726.44-1.355 1.174-1.452l49.286-5.953c.685-.049 1.37.484 1.418 1.161z" fill="#359685"></path>
                                                <path d="M112.102 105.995c.342-.048.635-.339.586-.726l-2.053-21.006c-.05-.338-.342-.629-.734-.58l-11.197 1.113c-.342.048-.635.339-.586.726.048.339.342.629.733.58l10.513-1.016 1.906 19.699-10.512 1.016c-.342.049-.636.34-.587.726.05.34.343.63.734.581l11.197-1.113z" fill="#53A697"></path>
                                                <path d="M118.85 90.894v25.41a1.36 1.36 0 0 1-1.37 1.355H66.384a1.36 1.36 0 0 1-1.369-1.355v-25.41a1.36 1.36 0 0 1 1.37-1.355h51.095c.783 0 1.37.58 1.37 1.355z" fill="#3DB39E"></path>
                                                <path d="M91.957 93.895c-5.428 0-9.78 4.356-9.78 9.68s4.401 9.68 9.78 9.68c5.378 0 9.779-4.356 9.779-9.68s-4.4-9.68-9.78-9.68zm.244 4.501v.726c1.223.145 2.152.823 2.543 1.549a.89.89 0 0 1 .098.339c0 .387-.294.677-.636.677a.598.598 0 0 1-.538-.29c-.538-.532-1.173-.968-2.053-.968-1.125 0-1.663.387-1.663 1.162 0 1.887 4.547 1.016 4.547 4.114 0 1.161-.684 2.13-2.298 2.323v.726c0 .339-.244.63-.586.63-.343 0-.587-.291-.587-.63v-.726c-.978-.145-1.81-.532-2.25-1.162-.097-.097-.146-.242-.146-.435 0-.388.293-.678.684-.678.196 0 .343.097.538.29.391.388 1.027.678 1.76.678 1.027 0 1.418-.484 1.418-1.016 0-1.694-4.547-.92-4.547-4.114 0-1.404.88-2.324 2.543-2.517v-.726c0-.339.244-.63.586-.63a.68.68 0 0 1 .587.678zm-14.913 16.07a.748.748 0 0 0-.733-.727h-7.58V93.411h7.58a.748.748 0 0 0 .733-.726.748.748 0 0 0-.733-.726h-8.313a.748.748 0 0 0-.733.726v21.78c0 .387.342.726.733.726h8.313a.748.748 0 0 0 .733-.726zm39.117 0v-21.78a.748.748 0 0 0-.734-.727h-8.312a.748.748 0 0 0-.734.726c0 .387.343.726.734.726h7.579v20.328h-7.58a.748.748 0 0 0-.733.726c0 .387.343.726.734.726h8.312a.748.748 0 0 0 .734-.726zm-41.073-12.343c-.83 0-1.466.63-1.466 1.452 0 .823.635 1.452 1.466 1.452.832 0 1.467-.63 1.467-1.452 0-.823-.684-1.452-1.467-1.452zm33.25 2.904c.83 0 1.466-.63 1.466-1.452 0-.823-.636-1.452-1.467-1.452-.831 0-1.467.63-1.467 1.452 0 .823.636 1.452 1.467 1.452z" fill="#81CEC0"></path>
                                            </g>
                                        </g>
                                    </svg>
                                </div>
                            </div>
                            <div class="col-md-10">
                                <div class="start-marketing-text">
                                    <h2 class="stm-head">
                                        Start making money!
                                    </h2>
                                    <p>
                                        Do you have something to sell? <br> Post your first ad and start making money!
                                    </p>
                                    <button class="stm-btn">
                                        <i class="fas fa-plus-circle"></i> Post your ad for free
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section id="quick-link">
        <div class="container">
            <h4>What is BikeBikroy.com?</h4>
            <p>BikeBikroy.com is a dedicated online platform in Bangladesh, exclusively designed for motorcycle enthusiasts. It serves as a comprehensive classified website focusing on the motorcycle market, offering a centralised hub for buying and selling motorcycles, accessories, and gears. Whether you're looking to explore the latest bike models or connect with fellow riders, BikeBikroy.com provides a one-stop solution for all things related to motorcycles.</p>

            <h4>What kind of services does BikeBikroy.com provide?</h4>

            <p>BikeBikroy.com provides a range of services tailored to the motorcycle market in Bangladesh. These services include:</p>

            <ul>
            <li>Classified Listings: Users can buy or sell new and used motorcycles through detailed classified ads.</li>
            <li>Accessories and Gears: A diverse marketplace for motorcycle accessories and gears to enhance the riding experience.</li>
            <li>Comprehensive Categories: Coverage of every category within the motorcycle niche, catering to various preferences and needs.</li>
            <li>Community Connection: A platform for riders to connect, share experiences, and stay updated on the latest trends in the motorcycle community.</li>
            </ul>
            <br />
            <h4>Benefits of shopping at BikeBikroy.com:</h4>

            <p>Effortless Shopping Experience: Enjoy a streamlined and secure shopping journey in Bangladesh with BikeBikroy.com. Our user-friendly interface ensures a fast and easy process, allowing you to find your desired products with just a few clicks.</p>

            <p>Free Ad Posting: Experience the freedom to showcase your products or services without any cost. BikeBikroy.com is a free classifieds website, providing users the opportunity to post ads across various categories based on their location, ensuring maximum convenience.</p>

            <p>Safety Assurance: Shop with confidence at BikeBikroy.com. We prioritise your safety by featuring verified members and authorised dealers. Rest assured, your online transactions are secure, making your shopping experience with us trustworthy and worry-free.</p>

            <!-- <div class="row">
                <div class="col-md-12">
                    <p class="category-tittle mb-0">
                        Quick links
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="ql-card">
                        <h3 class="ql-head">
                            63,209 ads in Electronics
                        </h3>
                        <a href="#">Computers</a>|<a href="#">Laptops</a>|<a href="#">TVs</a>|<a href="#">Cameras, Camcorders & Accessories</a>|<a href="#">Desktop Computers</a>|<a href="#">Audio & Sound Systems</a>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="ql-card">
                        <h3 class="ql-head">
                            63,209 ads in Electronics
                        </h3>
                        <a href="#">Computers</a>|<a href="#">Laptops</a>|<a href="#">TVs</a>|<a href="#">Cameras, Camcorders & Accessories</a>|<a href="#">Desktop Computers</a>|<a href="#">Audio & Sound Systems</a>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="ql-card">
                        <h3 class="ql-head">
                            63,209 ads in Electronics
                        </h3>
                        <a href="#">Computers</a>|<a href="#">Laptops</a>|<a href="#">TVs</a>|<a href="#">Cameras, Camcorders & Accessories</a>|<a href="#">Desktop Computers</a>|<a href="#">Audio & Sound Systems</a>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="ql-card">
                        <h3 class="ql-head">
                            63,209 ads in Electronics
                        </h3>
                        <a href="#">Computers</a>|<a href="#">Laptops</a>|<a href="#">TVs</a>|<a href="#">Cameras, Camcorders & Accessories</a>|<a href="#">Desktop Computers</a>|<a href="#">Audio & Sound Systems</a>
                    </div>
                </div>
            </div> -->
        </div>
    </section>


@endsection