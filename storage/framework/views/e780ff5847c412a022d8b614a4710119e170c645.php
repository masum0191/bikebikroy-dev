<?php $__env->startSection('title','Bike Shop'); ?>
<?php $__env->startSection('page-style'); ?>

<link href="https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css" rel="stylesheet">

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<section id="account-content">
    <div class="container">
        <div class="row">
            <h1 class="text-center">Are You Shop Owner  </h1>
            <div class="col-md-12">
                                 
                    <div class="row">
                        <div class="col-md-7"></div>
                        <div class="col-md-3">
                           <?php if(empty(CommonFx::Bikeshop())): ?>
                           <a class="btn btn-primary text-end mt-3" href="<?php echo e(url('user/createshop')); ?>">Create Shop</a>
                           <?php endif; ?>
                        </div>
                        </div>
                    <table id="dataTable" class="table display table-striped  bordered nowrap"  style="width: 100%;">
                    <thead>

                        <tr>
                            <td>SL</td>
                            <td>Date </td>
                            <td>Shopname </td>
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


    </div>
</section>



<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-script'); ?>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>

<script>
    $(document).ready(function() {
             $('#dataTable').DataTable({
             responsive: true,
            processing: true,
            serverSide: true,

            ajax: {

                url: "<?php echo e(url('user/addshop')); ?>",

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
                    data: 'shopname',

                },
                 {
                    data: 'view'

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






    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/bikebik/public_html/resources/views/user/shop/index.blade.php ENDPATH**/ ?>