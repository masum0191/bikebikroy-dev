
<?php $__env->startSection('title','Area List'); ?>
<?php $__env->startSection('page-style'); ?>

<link href="https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css" rel="stylesheet">

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="cards">
    <div class="row">
        <div class="col md-7"></div>
        <div class="col md-5 mb-2 text-end"> <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Areamodal">
            Create Area
          </button></div>
    
        <table id="dataTable" class="table display table-striped  bordered nowrap"
        style="width: 100%;">
        <thead>

            <tr>
                <td>SL</td>
                <td>Area </td>
                <td>Area Name </td>
                <td>Bn Area Name</td>
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
<div class="modal fade" id="Areamodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Create Area </h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
        <h5> <?php echo $__env->make('errors.ajaxformerror', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?></h5>
        <div class="modal-body">
            
            <?php echo Form::open(['url' => 'superadmin/createarea', 'class' => 'form', 'id' => 'ccccc']); ?>

                <?php echo Form::hidden('areaid', '', ['id' => 'areaid']); ?>

               <label for="district" class="form-label">Select Thana *</label>
            <div class="input-group">
                <?php echo Form::select('thana_id',CommonFx::Thananame(),null, array('id'=>'thana_id','required','class'=>'form-control','placeholder'=>'Select Thana')); ?>

            </div>   
            <label for="areaname" class="form-label">Area Name English *</label>
              <div class="input-group">
                <?php echo Form::text('areaname', null, ['id' => 'areaname', 'class' => 'form-control  mb-1']); ?>

            </div> 
            <label for="bnareaname" class="form-label">Area Name Bangla *</label>
            <div class="input-group">
                <?php echo Form::text('bnareaname', null, ['id' => 'bnareaname', 'class' => 'form-control  mb-1']); ?>

            </div> 
                </div>
        <div class="modal-footer">
           
            <input type="button" id="addBtn" value="Save Payby" class="btn btn-primary">


            <?php echo Form::close(); ?>


        </div>
      </div>
    </div>
  </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-script'); ?>
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
               
                url: "<?php echo e(url('superadmin/arealist')); ?>",

            },

            columns: [


                {
                    data: 'DT_RowIndex',
                    orderable: false,
                    searchable: false
                },
               


                {
                    data: 'thana.thana',
                   name: 'thana.thana'
                  
                },

                {
                    data: 'areaname',
                   
                },
 {
                    data: 'bnareaname',
                   
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
            $info_url = url + '/superadmin/deletearea/' + $id;
            $.ajax({
                url: $info_url,
                method: "DELETE",
                type: "DELETE",
                data: {},
                success: function(data) {
                    if (data) {
                        Swal.fire({
                            icon: 'success',
                            title: "Area Delete Successfully",
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

        $("#addBtn").click(function() {
     
if ($(this).val() == 'Save') {

$.ajax({
    url:"<?php echo e(url('/superadmin/createarea')); ?>",
    method: "POST",
    data: {
        thana_id: $("#thana_id").val(),
        areaname : $("#areaname ").val(),
        bnareaname: $("#bnareaname").val(),
    },
    success: function(d) {
        if (d.success) {
            Swal.fire({
                icon: 'success',
               title: "Area Create Successfully",
                timer: 2000,
                showConfirmButton: false,
                });
            $('#dataTable').DataTable().ajax.reload();
             clearform();

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
//Create end Area

//Update Area
$("#Areamodal").on('click', '#addBtn', function() {

if ($(this).val() == 'Update') {

$.ajax({
    url: url + '/superadmin/updatearea/' + $("#areaid").val(),
    method: "PATCH",
    type: "PATCH",
    data: {
        thana_id: $("#thana_id").val(),
        areaname : $("#areaname ").val(),
        bnareaname: $("#bnareaname").val(),
    },
    success: function(d) {
        if (d.success) {
            Swal.fire({
            icon: 'success',
            title: "Area Update Successfully",
                timer: 2000,
                showConfirmButton: false,
                });
            $('#dataTable').DataTable().ajax.reload();
             clearform();



        }
    },
    error: function(d) {
        console.log(d);
    }
});
}
});
//Update shift end





//Edit shift
$("#dataTable").on('click', '#editBtn', function() {

$areaid = $(this).attr('rid');

$info_url = url + '/superadmin/editarea/' + $areaid ;
//console.log($info_url);
// return;
$.get($info_url, {}, function(d) {

populateForm(d);
location.hash = "ccccc";

$("#Areamodal").modal('show');
});
});
//Edit shift end







//form populatede

function populateForm(data) {
$("#thana_id").val(data.thana_id);
$("#areaname").val(data.areaname);
$("#bnareaname").val(data.bnareaname);
$("#areaid").val(data.id);
$("#addBtn").val('Update');


}

function clearform() {
$('#ccccc')[0].reset();
$("#addBtn").val('Save');
$("#Areamodal").modal('hide');
}

$("#close").click(function() {
clearform();
});

    
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.superadmin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/bikebik/public_html/resources/views/superadmin/location/area.blade.php ENDPATH**/ ?>