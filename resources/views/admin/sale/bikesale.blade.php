@extends('layouts.admin')
@section('title','Bikesale List')
@section('page-style')
<link href="https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css" rel="stylesheet">

@endsection
@section('content')
<div class="cards">
    <div class="row">
        <div class="col md-7"></div>
        <div class="col md-5 mb-2 text-end"> <a href="{{url('admin/createbikesale')}}" class="btn btn-primary">
            Create Bike
          </a></div>
         <table id="dataTable" class="table display table-striped  bordered nowrap"
        style="width: 100%;">
        <thead>

            <tr>
                <td>SL</td>
                <td>Date </td>
                <td>Title </td>
                <td>View </td>
                <td>Home </td>
                <td>Section </td>
                <td>Status </td>
                <td>Action</td>
               </tr>
        </thead>
        <tbody>



        </tbody>
        <tfoot>

        </tfoot>
    </table>
        </div>

    </div>

<!-- Modal -->
<div class="modal fade" id="Packagemodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Update Bike Sale </h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
        <h5> @include('errors.ajaxformerror')</h5>
        <div class="modal-body">

            {!! Form::open(['url' => 'admin/updatebikesale', 'class' => 'form', 'id' => 'ccccc']) !!}
                {!! Form::hidden('bikesaleid', '', ['id' => 'bikesaleid']) !!}
                <label for="district" class="form-label">Select Post Manager * (If Not Sure) </label>
                <div class="mb-3">
                    {!! Form::label('title', 'Title *') !!}
                    {!!Form ::text('title',null, ['required','id'=>'title', 'class'=>'form-control'])!!}
                 </div>
                 <div class="md-3">
                    {!! Form::label('phonenumber', 'Number *') !!}
                    {!! Form::tel('phonenumber',null,   array('id'=>'phonenumber','required','class'=>'form-control','placeholder'=>'Ex: Bike Saler Phone Numer')) !!} </div>
                   {{-- <div class="md-3">
                                <label for="division_id" class="form-label">Select Division *</label>
                                {!!Form::select('division_id',CommonFx::Divisionname(),null, array('id'=>'division_id','required','class'=>'form-control','placeholder'=>'Select Division'))!!}
                            </div>
                            <div class="md-3">
                                <label for="district_id" class="form-label">Select District  *</label>
                                <select class="form-select" id="district_id" name="district_id" required>
                                    <option  value="">Select District *</option>
                                  </select>
                            </div>
                            <div class="md-3">
                                <label for="thana_id" class="form-label">Select Thana  *</label>
                                <select class="form-select" id="thana_id" name="thana_id" required>
                                    <option  value="">Select Thana *</option>
                                  </select>
                            </div>
                            
                            <div class="md-3">
                                <label for="area_id" class="form-label">Select Area  *</label>
                                <select class="form-select" id="area_id" name="area_id" required>
                                    <option  value="">Select Area *</option>
                                  </select>
                            </div>--}}
                            
                             <div class="col-12">
                                {!! Form::label('manufacture', ' Year of Manufacture ') !!}
                                {!! Form::text('manufacture',null,   array('id'=>'manufacture','class'=>'form-control','placeholder'=>'Ex: Year of Manufacture?')) !!}
                               </div>
                               <div class="col-12">
                                {!! Form::label('year', 'Year of Bike Buy *') !!}
                                {!! Form::number('year',null,   array('id'=>'year','required','class'=>'form-control','placeholder'=>'Ex: What was your bike Buy Year ?')) !!}
                               </div>
                            <div class="col-md-6">
                                {!! Form::label('kilometerrun', 'Kilometers run (km) *') !!}
                                {!! Form::number('kilometerrun',null,   array('id'=>'kilometerrun','required','class'=>'form-control','placeholder'=>'Ex: What is the mileage of your bike?')) !!}

                            </div>
                            <div class="col-md-6">
                                {!! Form::label('cc', 'Engine capacity (cc) *') !!}
                                {!! Form::number('cc',null,   array('id'=>'cc','required','class'=>'form-control','placeholder'=>'Ex: What is the engine capacity of your bike?')) !!}
                            </div>
                            <div class="col-md-12">
                                {!! Form::label('description', 'Description  * (Not More Than 1000 Word)') !!}
                                {!! Form::textarea('description',null,   array('id'=>'cc','required','class'=>'form-control','placeholder'=>'Ex: What is the engine capacity of your bike?')) !!}
                                 </div>
                            <div class="col-12">

                                {!! Form::label('price', 'Price (Tk) *') !!}
                                {!! Form::number('price',null, array('id'=>'price','required','class'=>'form-control', 'min'=>'1','placeholder'=>'Ex: Pick a good price - what would you pay?')) !!}
                            </div>
        <div class="mb-3">
        {!! Form::label('admintype', 'Admin Type *') !!}
          {!!Form ::select('admintype',['salesmanager'=>'Sales Manager','qcmanager'=>'QC Manager','productmanager'=>',Product Manager','productaproved'=>'Product Aproved','moderationpanel'=>'Moderation Panel'], 'salesmanager', array('required','id'=>'admintype', 'class'=>'form-control'))!!}
                 </div>
                 <div class="mb-3">
                    {!! Form::label('status', 'Status *') !!}
                    {!!Form ::select('status',['Active'=>'Active','Pending'=>'Pending','Reject'=>'Reject'], null, array('required','id'=>'status', 'class'=>'form-control'))!!}
                 </div>
            <label for="keyword" class="form-label">Keyword *</label>
            <div class="input-group">
                {!! Form::text('keyword', null, ['id' => 'keyword', 'class' => 'form-control  mb-1']) !!}
            </div>
            <label for="metadescription" class="form-label">Metadescription  (Not More Than 160 Word ) *</label>
            <div class="input-group">
                {!! Form::text('metadescription', null, ['id' => 'metadescription', 'class' => 'form-control  mb-1']) !!}
            </div>
            <label for="screma" class="form-label">Screma *</label>
            <div class="input-group">
                {!! Form::textarea('screma', null, ['id' => 'screma', 'class' => 'form-control  mb-1']) !!}
            </div>
                </div>
        <div class="modal-footer">

            <input type="button" id="addBtn" value="Save Payby" class="btn btn-primary">


            {!! Form::close() !!}

        </div>
      </div>
    </div>
  </div>

@endsection

@section('page-script')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>

<script>
    $(document).ready(function() {

$("#formerrors").hide();
  clearform();

        $('#dataTable').DataTable({
             responsive: true,
            processing: true,
            serverSide: true,
           // stateSave : true,

            ajax: {

                url: "{{ url('admin/bikesalelist') }}",

            },
 stateSave : true,

            columns: [


{
    data: 'DT_RowIndex',
    orderable: false,
    searchable: false
},



{
    data: 'updated_at',
   name: 'updated_at'

},

{
    data: 'title',

},
{
    data: 'view',

},
{
    data: 'home',

},
{
    data: 'sections',

},
{
    data: 'status',

},



{

    data: 'action',
    name: 'action',
    orderable: false,
    searchable: false
}

]


        });
        //Delete Admin
        $(document).on('click', '#deleteBtn', function() {

            if (confirm('Are You Sure Archive?')) ;
            $id = $(this).attr('rid');
            //console.log($roomid);
            $info_url = url + '/admin/archive/' + $id;
            $.ajax({
                url: $info_url,
                method: "GET",
                type: "GET",
                data: {},
                success: function(data) {
                    if (data) {
                        Swal.fire({
                            icon: 'warning',
                            title: "Ad is archive Successfully",
                                timer: 2000,
                                showConfirmButton: false,
                                });
                       // $('#dataTable').DataTable().ajax.reload();
                        location.reload();

                    }
                },
                error: function(data) {
                    console.log(data);
                }
            });
        });

//Home ad active
        $(document).on('click', '#active', function() {

            if (confirm('Are You Sure Home page Ad Active?')) ;
            $id = $(this).attr('rid');
            $section = $(this).attr('section');
            //console.log($roomid);
            $info_url = url + '/admin/home-active/' + $id+'/'+$section;
            $.ajax({
                url: $info_url,
                method: "GET",
                type: "GET",
                data: {},
                success: function(data) {
                    if (data) {
                        Swal.fire({
                            icon: 'warning',
                            title: "Home Ad is Active Successfully",
                                timer: 2000,
                                showConfirmButton: false,
                                });
                       // $('#dataTable').DataTable().ajax.reload();
                        location.reload();

                    }
                },
                error: function(data) {
                    console.log(data);
                }
            });
        });
        //Home ad inactive
        $(document).on('click', '#inactive', function() {

            if (confirm('Are You Sure Home page Ad In Active?')) ;
            $id = $(this).attr('rid');
            //console.log($roomid);
            $info_url = url + '/admin/home-inactive/' + $id;
            $.ajax({
                url: $info_url,
                method: "GET",
                type: "GET",
                data: {},
                success: function(data) {
                    if (data) {
                        Swal.fire({
                            icon: 'warning',
                            title: "Home Ad is InActive Successfully",
                                timer: 2000,
                                showConfirmButton: false,
                                });
                        //$('#dataTable').DataTable().ajax.reload();
                    location.reload();
                    }
                },
                error: function(data) {
                    console.log(data);
                }
            });
        });
//Update shift
$("#Packagemodal").on('click', '#addBtn', function() {

if ($(this).val() == 'Update') {

$.ajax({
    url: url + '/admin/updatebikesale/' + $("#bikesaleid").val(),
    method: "PATCH",
    type: "PATCH",
    data: {
        title: $("#title").val(),
        phonenumber: $("#phonenumber").val(),
        manufacture: $("#manufacture").val(),
        year: $("#year").val(),
        status: $("#status").val(),
        division: $("#divisionname").val(),
        keyword: $("#keyword").val(),
        screma: $("#screma").val(),
        metadescription: $("#metadescription").val(),
        admintype: $("#admintype").val(),
    },
    success: function(d) {
        if (d.success) {
            Swal.fire({
            icon: 'info',
            title: "Data Update Successfully",
                timer: 2000,
                showConfirmButton: false,
                });
            $('#dataTable').DataTable().ajax.reload();
             clearform();



        }
        else {
            $.each(d.errors, function(key, value) {
                $('#formerrors').show();
                $('#formerrors ul').append('<li>' + value +
                '</li>');
            });
        }
    },
    error: function(d) {
        console.log(d);
    }
});
}
});
//Update shift end

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
                    $('#district_id').append(' <option  value="" selected disabled>Select District *</option>');
                    
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
                    $('#thana_id').append(' <option  value="" selected disabled>Select Thana *</option>');
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



//Edit Bikesale
$("#dataTable").on('click', '#editBtn', function() {

$bikesaleid = $(this).attr('rid');

$info_url = url + '/admin/editbikesale/' + $bikesaleid ;
//console.log($info_url);
// return;
$.get($info_url, {}, function(d) {

populateForm(d);
location.hash = "ccccc";

$("#Packagemodal").modal('show');
});
});
//Edit shift end







//form populatede

function populateForm(data) {
$("#title").val(data.title);
$("#status").val(data.status);
$("#keyword").val(data.keyword);
$("#phonenumber").val(data.phonenumber);
$("#year").val(data.year);
$("#manufacture").val(data.manufacture);
$("#screma").val(data.screma);
$("#metadescription").val(data.metadescription);
$("#admintype").val(data.admintype);
$("#bikesaleid").val(data.id);
$("#addBtn").val('Update');


}

function clearform() {
$('#ccccc')[0].reset();
$("#addBtn").val('Save');
$("#Packagemodal").modal('hide');
}

$("#close").click(function() {
clearform();
});


    });
</script>
@endsection