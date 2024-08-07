@extends('layouts.user')
@section('title','Bike Sale')
@section('page-style')
<link href="https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css" rel="stylesheet">
@endsection

@section('content')
<section id="product-main">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3 class="ad-post-head mb-0 pt-5 text-center">
                    Welcome Let's Quick Posting.
                </h3>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="similar-head pt-5">
                    <div class="row">
                        <div class="col-md-6">
                            <h3 class="mb-0 smlr-head">
                                Fill in the details
                            </h3>

                        </div>
                        <div class="col-md-6">
                            <div class="product-share">
                                <ul class="mb-0 ps-0">
                                    <li><a href="/bikesale" class="text-primary">All Ads</a></li>

                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="row">
                <h5> @include('errors.formerror')</h5>
                <div class="col-md-12">
                    <div class="ad-form mb-5" style="border: 1px solid gray;background: lightgray;">
                        {!! Form::open(['url' => 'quickadstore', 'class' => 'row g-3', 'files'=>'true']) !!}
                        <div class="col-md-12">
                            {!! Form::label('title', 'Title/Bike Name *') !!}
                            {!! Form::text('title',null,   array('id'=>'title','required','class'=>'form-control','placeholder'=>'Ex: I Will Sale A Bike')) !!}


                        </div>
                    
                            <div class="col-md-6">
                                <label for="inputState" class="form-label">Select Brand  *</label>
                                  {!!Form::select('bikebrand_id',CommonFx::BikeBrand(),null, array('id'=>'bikebrand_id','required','class'=>'form-control js-example-basic-single','placeholder'=>'Select Brand'))!!}
                            </div>
                            <div class="col-md-6">

                                <label for="inputState" class="form-label">Select Model  *</label>
                                <select class="form-select js-example-basic-single" id="bikemodel_id" name="bikemodel_id" required>
                                    <option  value="">Select Model *</option>
                                  </select>
                            </div>

                            
                            
                          
                            <div class="col-12">

                                {!! Form::label('price', 'Price (Tk) *') !!}
                                {!! Form::number('price',null, array('id'=>'price','required','class'=>'form-control', 'min'=>'1','placeholder'=>'Ex: Pick a good price - what would you pay?')) !!}
                            </div>
                            <div class="col-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="negotiable" name="negotiable">
                                    <label class="form-check-label" for="negotiable">
                                        Negotiable
                                    </label>
                                </div>
                            </div>
                            <h5 class="text-center">Perfect image dimensions will be 560 x 368 px </h5>
                            <div class="col-3">
                                <div class="form-group">
                                    <input type="file" name="imageone" required  id="image1">

                                </div>
                                <img id="preview1" src="https://www.sohibd.com/storage/app/files/shares/backend/not_found.webp"
                                alt="preview image" style="max-height: 250px;">
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <input type="file" name="imagetwo"  id="image2" class="d-none">

                                </div>
                                <img id="preview2" src="https://www.sohibd.com/storage/app/files/shares/backend/not_found.webp"
                                alt="preview image" style="max-height: 250px;">
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <input type="file" name="imagethree"  id="image3" class="d-none">

                                </div>
                                <img id="preview3" src="https://www.sohibd.com/storage/app/files/shares/backend/not_found.webp"
                                alt="preview image" style="max-height: 250px;">
                            </div>

                            <div class="col-3">
                                <div class="form-group">
                                    <input type="file" name="imagefour"  id="image4" class="d-none">

                                </div>
                                <img id="preview4" src="https://www.sohibd.com/storage/app/files/shares/backend/not_found.webp"
                                alt="preview image" style="max-height: 250px;">
                            </div>

                                


                            <table class="table table-bordered" id="dynamic_field">

                                <tr>

                                    <td><input type="tel" required name="phonenumber" value="" placeholder="phone number *" class="form-control name_list" /><span id="error" class="text-danger"></span></td>
                                    
                                </div>
                                    {{-- <td><button type="button" name="add" id="add" class="btn btn-success">Add Another Number</button></td> --}}

                                </tr>

                            </table>


                            <div class="col-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="gridCheck" name="confirm" required>
                                    <label class="form-check-label" for="gridCheck">
                                        I have read and accept the Terms and Conditions
                                    </label>
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn post-ad-btn">Quick ad</button>
                            </div>
                        </form>
                    </div>


                </div>
            </div>
        </div>


    </div>
    <div class="modal fade" id="Otpverifymodal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Verify Otp </h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
            <h5> @include('errors.ajaxformerror')</h5>
            <div class="modal-body">
                {!! Form::open(['url' => 'user/verifyotp', 'class' => 'form', 'id' => 'ccccc']) !!}
                    {!! Form::hidden('phonenumber', '', ['id' => 'phonenumbervalue']) !!}
                   
                <label for="otp" class="form-label">Opt Number *</label>
                <div class="input-group">
                    {!! Form::number('otp', null, ['id' => 'otp', 'class' => 'form-control  mb-1']) !!} 
                </div> 
                    </div>
            <div class="modal-footer">
               
                <input type="button" id="addBtn" value="Verify" class="btn btn-primary">
    
    
                {!! Form::close() !!}
    
            </div>
          </div>
        </div>
      </div>
</section>

@endsection
@section('page-script')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
$("#formerrors").hide();


$('#image1').change(function(){

            let reader = new FileReader();

            reader.onload = (e) => {

              $('#preview1').attr('src', e.target.result);
            }

            reader.readAsDataURL(this.files[0]);
            // $('#image1').addClass('d-none');
            $('#image2').removeClass('d-none');

           });
           $('#image2').change(function(){

            let reader = new FileReader();

            reader.onload = (e) => {

              $('#preview2').attr('src', e.target.result);
            }

            reader.readAsDataURL(this.files[0]);

            $('#image3').removeClass('d-none');

           });
           $('#image3').change(function(){

            let reader = new FileReader();

            reader.onload = (e) => {

              $('#preview3').attr('src', e.target.result);
            }

            reader.readAsDataURL(this.files[0]);

            $('#image4').removeClass('d-none');

           });
           $('#image4').change(function(){
            let reader = new FileReader();
            reader.onload = (e) => {
              $('#preview4').attr('src', e.target.result);
            }

            reader.readAsDataURL(this.files[0]);

           });
$(document).ready(function () {
    function delay(callback, ms) {
  var timer = 0;
  return function() {
    var context = this, args = arguments;
    clearTimeout(timer);
    timer = setTimeout(function () {
      callback.apply(context, args);
    }, ms || 0);
  };
};
    $(document).on('keyup', '.name_list', delay(function(delay){
if($(this).val().length==10){
    $('#error').html('Number Must Be 11 Digit');
    $('#Otp').addClass('d-none');
    $('#Otpvefiry').addClass('d-none');
    return false;
}
else{
    $('#error').html(null);

    $("#phonenumbervalue").val($(this).val());
                number = $(this).val();
                $.ajax({
                    type: "get",
                    url: url + '/user/searchphonenumber',
                    data: {
                        number:number

                    },

                    success: function(data) {
                        $('#error').html('Number Verify');
                    },
                    error:function(data){
                       // $('#error').html('Number Not Verify, Please Check Your Phone To Get Otp');
                        $("#Otpverifymodal").modal('show');
                       
                    }

                });
            }
                },900));

                $("#addBtn").click(function() {
     
     if ($(this).val() == 'Verify') {
     
     $.ajax({
         url:"{{ url('/user/phoneotpverify') }}",
         method: "POST",
         data: {
            otp: $("#otp").val(),
            number: $("#phonenumbervalue").val(),
            },
         success: function(d) {
             if (d.success) {
                 Swal.fire({
                     icon: 'success',
                    title: "OTP Verify Successfully",
                     timer: 2000,
                     showConfirmButton: false,
                     });
                     $('#error').html('Number Verify');
                 $('#Otpverifymodal').modal('hide');
                 
     
             } else {
                 $.each(d.errors, function(key, value) {
                     $('#formerrors').show();
                     $('#formerrors ul').append('<li>' + value +
                     '</li>');
                 });
             }
         },
         error: function(d) {
             $.each(d.errors, function(key, value) {
                     $('#formerrors').show();
                     $('#formerrors ul').append('<li>' + value +
                     '</li>');
                 });
         }
     
     });
     }
     });



   
    //  console.log(loggedIn);
    
    $.ajax({
        type: "GET",
        url: url + '/location',
             dataType: "JSON",
        success:function(data) {
           if(data){

                   $.each(data.division, function(key, value){
                      // console.log(districtid);
                       if(value.id==divisionid){
                        $('#division_id').append('<option value="'+value.id+'" selected>' + value.division + '</option>');
                       }else{
                        $('#division_id').append('<option value="'+value.id+'">' + value.division + '</option>');
                       }

                    });
                    $.each(data.district, function(key, value){
                       // console.log(thanaid)
                        if(value.id==districtid){
                        $('#district_id').append('<option value="'+value.id+'" selected>' + value.district + '</option>');
                       }else{
                        $('#district_id').append('<option value="'+value.id+'">' + value.district + '</option>');
                       }

                    });
                    $.each(data.than, function(key, value){
                     if(value.id==thanaid){
                        $('#thana_id').append('<option value="'+value.id+'" selected>' + value.thana + '</option>');
                       }else{
                        $('#thana_id').append('<option value="'+value.id+'">' + value.thana + '</option>');
                       }

                    });
                    $.each(data.area, function(key, value){
                     
                        $('#area_id').append('<option value="'+value.id+'" selected>' + value.areaname + '</option>');
                      

                    });

                    $.each(data.area, function(key, value){
                       // console.log(thanaid)
                        if(value.id==areaid){
                        $('#area_id').append('<option value="'+value.id+'" selected>' + value.areaname + '</option>');
                       }else{
                        $('#area_id').append('<option value="'+value.id+'">' + value.areaname + '</option>');
                       }

                    });

                }

            },
    });

    $('#division_id').change(function(){
            $('#district_id').empty();

    var divisionid = $(this).val();

    $.ajax({
        type: "GET",
        url: url + '/getdistrict/'+divisionid,
        data:{},
        dataType: "JSON",
        success:function(data) {
           if(data){

                    $.each(data, function(key, value){
                      $('#district_id').append('<option value="'+value.id+'">' + value.district + '</option>');

                    });
                }

            },
    });

});



//for thana
$('#district_id').change(function(){
            $('#thana_id').empty();

    var districtid = $(this).val();

    $.ajax({
        type: "GET",
        url: url + '/getthana/'+districtid,
        data:{},
        dataType: "JSON",
        success:function(data) {
           if(data){

                    $.each(data, function(key, value){
                       // alert(key);
                        $('#thana_id').append('<option value="'+value.id+'">' + value.thana + '</option>');

                    });
                }

            },
    });
    });
        //for area
$('#thana_id').change(function(){
            $('#area_id').empty();
      var thanatid = $(this).val();
    $.ajax({
        type: "GET",
        url: url + '/getarea/'+thanatid,
        data:{},
        dataType: "JSON",
        success:function(data) {
           if(data){
                 $.each(data, function(key, value){
                      $('#area_id').append('<option value="'+value.id+'">' + value.areaname + '</option>');

                    });
                    $('#area_id').append(' <option  value="" selected disabled>Select Area *</option>');
                }

            },
    });
    });
    $('#bikebrand_id').change(function(){
    $('#bikemodel_id').empty();
    $.ajax({
        type: "GET",
        url: url + '/getbikebrand/'+$(this).val(),
        data:{},
        dataType: "JSON",
        success:function(data) {
           if(data){

                    $.each(data, function(key, value){
                        $('#bikemodel_id').append('<option value="'+value.id+'">' + value.bikemodel + '</option>');

                    });
                }

            },
    });
    });

});


    </script>
@endsection