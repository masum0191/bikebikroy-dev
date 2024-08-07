@extends('layouts.admin')
@section('title','Bike Shop')
@section('page-style')

<link href="https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css" rel="stylesheet">

@endsection
@section('content')


<section id="account-content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="ac-box">

                    <h1 class="text-center"> Shop Owner  List</h1>

                    <table id="dataTable" class="table display table-striped  bordered nowrap"  style="width: 100%;">
                    <thead>

                        <tr>
                            <td>SL</td>
                            <td>Date </td>
                            <td>Shopname </td>
                            <td>User </td>
                            <td>Status </td>
                            <td>View </td>
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


    </div>
</section>



@endsection

@section('page-script')
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

                url: "{{ url('admin/bikeshoplist') }}",

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
                    data: 'user.fullname',

                },
                {
                    data: 'status',

                },
                {
                    data: 'view',

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
@endsection
