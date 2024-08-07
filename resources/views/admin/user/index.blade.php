@extends('layouts.admin')
@section('title','User List')
@section('page-style')
<link href="https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css" rel="stylesheet">

@endsection
@section('content')
<div class="cards">
    <div class="row">
        <div class="col md-7"></div>
        <div class="col md-5 mb-2 text-end"> <a href="{{url('admin/createuser')}}" class="btn btn-primary">
            Create User
          </a></div>
         <table id="dataTable" class="table display table-striped  bordered nowrap"
        style="width:100%;">
        <thead>

            <tr>
                <td>SL</td>
                <td>Date </td>
                <td>Fullname </td>
                <td>Phone </td>
                <td>Email </td>
                <td>Can Post </td>
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
<div class="modal fade" id="Usermodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Update User Info </h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
        <h5> @include('errors.ajaxformerror')</h5>
        <div class="modal-body">

            {!! Form::open(['url' => 'admin/user', 'class' => 'form', 'id' => 'ccccc']) !!}
            {!! Form::hidden('userid', '', ['id' => 'userid']) !!}
            <div class="mb-3">
            <label for="fullname" class="form-label">Fullname  *</label>
          {!! Form::text('fullname', null, ['id' => 'fullname', 'class' => 'form-control  mb-1']) !!}
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email  *</label>
              {!! Form::email('email', null, ['id' => 'email', 'class' => 'form-control  mb-1']) !!}
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Phone</label>
                  {!! Form::tel('phone', null, ['id' => 'phone', 'class' => 'form-control  mb-1']) !!}
                    </div>
                    <div class="mb-3">
                        <label for="salepost" class="form-label">Sale Post</label>
                      {!! Form::number('salepost', null, ['id' => 'salepost', 'class' => 'form-control  mb-1']) !!}
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">New Password</label>
                          {!! Form::password('password', ['id' => 'password', 'class' => 'form-control  mb-1']) !!}
                            </div>
                 <div class="mb-3">
                    {!! Form::label('status', 'Status *') !!}
                   {!!Form ::select('status',['1'=>'Active','0'=>'Pending','2'=>'Reject'], null, array('required','id'=>'status', 'class'=>'form-control'))!!}
                 </div>
                  
           
                </div>
        <div class="modal-footer">

            <input type="button" id="addBtn" value="Update" class="btn btn-primary">


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

            ajax: {

                url: "{{ url('admin/userlist') }}",

            },

            columns: [


{
    data: 'DT_RowIndex',
    orderable: false,
    searchable: false
},



{
    data: 'created_at',
   name: 'created_at'

},

{
    data: 'fullname',

},
{
    data: 'phone',

},
{
    data: 'email',

},
{
    data: 'salepost',

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

            if (!confirm('Sure?')) return;
            $id = $(this).attr('rid');
            //console.log($roomid);
            $info_url = url + '/admin/deleteuser/' + $id;
            $.ajax({
                url: $info_url,
                method: "DELETE",
                type: "DELETE",
                data: {},
                success: function(data) {
                    if (data) {
                        Swal.fire({
                            icon: 'info',
                            title: "User Delete Successfully",
                                timer: 2000,
                                showConfirmButton: false,
                                });
                        $('#dataTable').DataTable().ajax.reload();

                    }
                },
                error: function(data) {
                    console.log(data);
                }
            });
        });


//Update shift
$("#Usermodal").on('click', '#addBtn', function() {

if ($(this).val() == 'Update') {

$.ajax({
    url: url + '/admin/updateuser/' + $("#userid").val(),
    method: "PATCH",
    type: "PATCH",
    data: {
        fullname: $("#fullname").val(),
        status: $("#status").val(),
        email: $("#email").val(),
        phone: $("#phone").val(),
        password: $("#password").val(),
        salepost: $("#salepost").val(),
       },
    success: function(d) {
        if (d.success) {
            Swal.fire({
            icon: 'success',
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





//Edit Bikesale
$("#dataTable").on('click', '#editBtn', function() {

$userid = $(this).attr('rid');

$info_url = url + '/admin/edituser/' + $userid;
//console.log($info_url);
// return;
$.get($info_url, {}, function(d) {

populateForm(d);
location.hash = "ccccc";

$("#Usermodal").modal('show');
});
});
//Edit shift end







//form populatede

function populateForm(data) {
$("#fullname").val(data.fullname);
$("#status").val(data.status);
$("#email").val(data.email);
$("#phone").val(data.phone);
$("#password").val(data.password);
$("#salepost").val(data.salepost);
$("#userid").val(data.id);
$("#addBtn").val('Update');


}

function clearform() {
$('#ccccc')[0].reset();
$("#addBtn").val('Save');
$("#Usermodal").modal('hide');
}

$("#close").click(function() {
clearform();
});


    });
</script>
@endsection
