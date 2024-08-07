@extends('layouts.user')
@section('title','User Shop')
@section('page-style')

<link href="https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css" rel="stylesheet">

@endsection
@section('content')
<section id="product-main">
    <div class="container">
    <div class="row">
        @include('partial.formerror')
            {!! Form::open(['url' => 'user/createshop','method'=>'POST','class' => 'row g-3', 'files'=>'true']) !!}

                <div class="col-12">
                    <label for="shopname" class="form-label">Shop Name *</label>
                    {!! Form::text('shopname', null, ['id' => 'shopname','required', 'class' => 'form-control  mb-1']) !!}
                </div>
                <div class="col-md-6">
                    <label for="email" class="form-label">Shop Email</label>
                    {!! Form::email('shopemail', null, ['id' => 'shopemail', 'class' => 'form-control  mb-1']) !!}
                </div>
                <div class="col-md-6">
                    <label for="contactnumber" class="form-label">Contact Number *</label>
                    {!! Form::tel('contactnumber', null, ['id' => 'shopemail','required', 'class' => 'form-control  mb-1']) !!}

                </div>
                <div class="col-md-12">
                    <label for="facebookshoplink" class="form-label">Facebook Page (Shop Url)</label>
                    {!! Form::text('facebookshoplink', null, ['id' => 'facebookshoplink', 'class' => 'form-control  mb-1']) !!}

                </div>

                <div class="col-md-12">
                    <label for="googleamplocaltion" class="form-label">Google Map (Embed Code)</label>
                    {!! Form::text('googleamplocaltion', null, ['id' => 'googleamplocaltion', 'class' => 'form-control  mb-1']) !!}

                </div>
                <div class="col-md-12">
                    <label for="address" class="form-label">Shop Address *</label>
                    {!! Form::textarea('address', null, ['id' => 'description', 'class' => 'form-control  mb-1','rows'=>'3']) !!}

                </div>
                <div class="col-md-6">
                    <label for="profilephoto" class="form-label">Profile Photo * [150x150]</label>
                    <div class="form-group">
                        <input type="file" name="profilephoto" required  id="image">
                         </div>

                </div>
                <div class="col-md-6">
                    <label for="coverphoto" class="form-label">Cover Photo *[ 798X 298 ]</label>
                    <div class="form-group">
                        <input type="file" name="coverphoto" required  id="image">
                         </div>

                </div>
                <div class="col-md-12">
                    <label for="description" class="form-label">About Shop *</label>
                    {!! Form::textarea('description', null, ['id' => 'description', 'class' => 'form-control  mb-1']) !!}

                </div>
                <div class="col-md-12 mb-2">
                    <button type="submit"  class="btn btn-primary">Create</button>

                </div>

            </form>
        </div>
    </div>
</section>
    {!! Form::close() !!}
</div>
</section>
@endsection


