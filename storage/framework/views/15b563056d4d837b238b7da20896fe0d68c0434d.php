<?php $__env->startSection('title','archive-list'); ?>
<?php $__env->startSection('page-style'); ?>
<link href="https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css" rel="stylesheet">

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="cards">
    <div class="row">
        <div class="col md-7"></div>
        <div class="col md-5 mb-2 text-end"> <a href="<?php echo e(url('admin/createbikesale')); ?>" class="btn btn-primary">
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
        <h5> <?php echo $__env->make('errors.ajaxformerror', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?></h5>
        <div class="modal-body">

            <?php echo Form::open(['url' => 'admin/updatebikesale', 'class' => 'form', 'id' => 'ccccc']); ?>

                <?php echo Form::hidden('bikesaleid', '', ['id' => 'bikesaleid']); ?>

                <label for="district" class="form-label">Select Post Manager * (If Not Sure) </label>
                <div class="mb-3">
                    <?php echo Form::label('title', 'Title *'); ?>

          <?php echo Form ::text('title',null, ['required','id'=>'title', 'class'=>'form-control']); ?>

                 </div>
                <div class="mb-3">
                    <?php echo Form::label('admintype', 'Admin Type *'); ?>

          <?php echo Form ::select('admintype',['salesmanager'=>'Sales Manager','qcmanager'=>'QC Manager','productmanager'=>',Product Manager','productaproved'=>'Product Aproved','moderationpanel'=>'Moderation Panel'], 'salesmanager', array('required','id'=>'admintype', 'class'=>'form-control')); ?>

                 </div>
                 <div class="mb-3">
                    <?php echo Form::label('status', 'Status *'); ?>

          <?php echo Form ::select('status',['Active'=>'Active','Pending'=>'Pending','Reject'=>'Reject'], null, array('required','id'=>'status', 'class'=>'form-control')); ?>

                 </div>
            <label for="keyword" class="form-label">Keyword *</label>
            <div class="input-group">
                <?php echo Form::text('keyword', null, ['id' => 'keyword', 'class' => 'form-control  mb-1']); ?>

            </div>
            <label for="metadescription" class="form-label">Metadescription  (Not More Than 160 Word ) *</label>
            <div class="input-group">
                <?php echo Form::text('metadescription', null, ['id' => 'metadescription', 'class' => 'form-control  mb-1']); ?>

            </div>
            <label for="screma" class="form-label">Screma *</label>
            <div class="input-group">
                <?php echo Form::textarea('screma', null, ['id' => 'screma', 'class' => 'form-control  mb-1']); ?>

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

                url: "<?php echo e(url('admin/archive-list')); ?>",

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
    data: 'title',

},
{
    data: 'view',

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
        //Restore Admin
        $(document).on('click', '#restotreBtn', function() {

            if (!confirm('Sure?'));
            $id = $(this).attr('rid');
            //console.log($roomid);
            $info_url = url + '/admin/restore/' + $id;
            $.ajax({
                url: $info_url,
                method: "GET",
                type: "GET",
                data: {},
                success: function(data) {
                    if (data) {
                        Swal.fire({
                            icon: 'warning',
                            title: "Ad is restore Successfully",
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

        //Delete Admin
        $(document).on('click', '#deleteBtn', function() {

            if (!confirm('Are You Sure Delete?')) ;
            $id = $(this).attr('rid');
            //console.log($roomid);
            $info_url = url + '/admin/deletebikesale/' + $id;
            $.ajax({
                url: $info_url,
                method: "delete",
                type: "delete",
                data: {},
                success: function(data) {
                    if (data) {
                        Swal.fire({
                            icon: 'warning',
                            title: "Ad is delete Successfully",
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
$("#Packagemodal").on('click', '#addBtn', function() {

if ($(this).val() == 'Update') {

$.ajax({
    url: url + '/admin/updatebikesale/' + $("#bikesaleid").val(),
    method: "PATCH",
    type: "PATCH",
    data: {
        title: $("#title").val(),
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/bikebik/public_html/resources/views/admin/sale/archivelist.blade.php ENDPATH**/ ?>