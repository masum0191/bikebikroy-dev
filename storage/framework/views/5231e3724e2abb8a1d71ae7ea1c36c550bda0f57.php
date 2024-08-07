<?php $__env->startSection('title','Bike Brand List'); ?>
<?php $__env->startSection('page-style'); ?>

<link href="https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css" rel="stylesheet">

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="cards">
    <div class="row">
        <div class="col md-7"></div>
        <div class="col md-5 mb-2 text-end"> <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Packagemodal">
            Create Bike Brand
          </button></div>
    
        <table id="dataTable" class="table display table-striped  bordered nowrap"
        style="width: 100%;">
        <thead>

            <tr>
                <td>SL</td>
                <td>Sequence</td>
                <td>Name</td>
                <td>Home</td>
                <td>Bn Name</td>
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
          <h5 class="modal-title" id="exampleModalLabel">Create Bike Brand </h5>
          <button type="button" id="close" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
        <h5> <?php echo $__env->make('errors.ajaxformerror', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?></h5>
        <div class="modal-body">
           
            <?php echo Form::open(['url' => 'superadmin/createpackage', 'class' => 'form', 'id' => 'ccccc']); ?>

                <?php echo Form::hidden('bikebrandid', '', ['id' => 'bikebrandid']); ?>

            <label for="bikebrand" class="form-label">Sequence</label>
            <div class="input-group">
                <?php echo Form::text('sequence', null, ['id' => 'sequence', 'class' => 'form-control  mb-1']); ?>

            </div> 
            <label for="bikebrand" class="form-label">Bike Name English *</label>
            <div class="input-group">
                <?php echo Form::text('bikebrand', null, ['id' => 'bikebrand', 'class' => 'form-control  mb-1']); ?>

            </div>
            <label for="bnbikebrand" class="form-label">Bike Name Bangla *</label>
            <div class="input-group">
                <?php echo Form::text('bnbikebrand', null, ['id' => 'bnbikebrand', 'class' => 'form-control  mb-1']); ?>

            </div>
            <label for="photo" class="form-label">Bike Brand Photo Url *</label>
               <div class="input-group">
                <?php echo Form::text('photo', null, ['id' => 'photo', 'class' => 'form-control  mb-1']); ?>

            </div> 
                </div>
        <div class="modal-footer">
           
            <input type="button" id="addBtn" value="Save" class="btn btn-primary">

            <iframe src="/filemanager" style="width: 100%; height: 500px; overflow: hidden; border: none;"></iframe>
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
               
                url: "<?php echo e(url('superadmin/bikebrandlist')); ?>",

            },

            columns: [


                {
                    data: 'DT_RowIndex',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'sequence',
                  
                },



                {
                    data: 'bikebrand',
                  
                },
                
{
                    data: 'home',
                  
                },
                {
                    data: 'bnbikebrand',
                   
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
            $info_url = url + '/superadmin/deletebikebrand/' + $id;
            $.ajax({
                url: $info_url,
                method: "DELETE",
                type: "DELETE",
                data: {},
                success: function(data) {
                    if (data) {
                        Swal.fire({
                            icon: 'warning',
                            title: "Bikebrand Delete Successfully",
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
 //home brand
        $(document).on('click', '#homebrandadd', function() {

            if (!confirm('Are You Update Home Brand ?')) return;
            $id = $(this).attr('rid');
             $type = $(this).attr('type');
            //console.log($roomid);
            $info_url = url + '/superadmin/homebrandadd/' + $id+'/'+$type;
            $.ajax({
                url: $info_url,
                method: "GET",
                type: "GET",
                data: {},
                success: function(data) {
                    if (data) {
                        Swal.fire({
                            icon: 'warning',
                            title: "Home Brand Update Successfully",
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
    url:"<?php echo e(url('/superadmin/createbikebrand')); ?>",
    method: "POST",
    data: {
        bikebrand: $("#bikebrand").val(),
        bnbikebrand: $("#bnbikebrand").val(),
         sequence: $("#sequence").val(),
        photo: $("#photo").val(),
    },
    success: function(d) {
        if (d.success) {
            Swal.fire({
                icon: 'success',
               title: "Bikebrand Create Successfully",
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
        // alert(d.message);
        console.log(d);
    }

});
}
});
//Create end shift

//Update shift
$("#Packagemodal").on('click', '#addBtn', function() {

if ($(this).val() == 'Update') {

$.ajax({
    url: url + '/superadmin/updatebikebrand/' + $("#bikebrandid").val(),
    method: "PATCH",
    type: "PATCH",
    data: {
        bikebrand: $("#bikebrand").val(),
        bnbikebrand: $("#bnbikebrand").val(),
        sequence: $("#sequence").val(),
        photo: $("#photo").val(),
    },
    success: function(d) {
        if (d.success) {
            Swal.fire({
            icon: 'success',
            title: "Bikebrand Update Successfully",
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





//Edit shift
$("#dataTable").on('click', '#editBtn', function() {

$bikebrandid = $(this).attr('rid');

$info_url = url + '/superadmin/editbikebrand/' + $bikebrandid ;
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
$("#bikebrand").val(data.bikebrand);
$("#bnbikebrand").val(data.bnbikebrand);
$("#sequence").val(data.sequence);
$("#photo").val(data.photo);
$("#bikebrandid").val(data.id);
$("#addBtn").val('Update');


}

function clearform() {
$('#ccccc')[0].reset();
$("#addBtn").val('Save');
$("#Packagemodal").modal('hide');
}

$("#close").click(function() {
clearform();
$("#formerrors").hide();
});

    
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.superadmin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/bikebik/public_html/resources/views/superadmin/bike/bikebrand.blade.php ENDPATH**/ ?>