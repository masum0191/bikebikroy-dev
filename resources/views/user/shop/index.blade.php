@extends('layouts.user')
@section('title','Bike Shop')
@section('page-style')

<link href="https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css" rel="stylesheet">

@endsection
@section('content')

<section id="account-content">
    <div class="container">
        <div class="row">
            <h1 class="text-center">Are You Shop Owner  </h1>
            <div class="col-md-12">
                                 
                    <div class="row">
                        <div class="col-md-7"></div>
                        <div class="col-md-3">
                           @if (empty(CommonFx::Bikeshop()))
                           <a class="btn btn-primary text-end mt-3" href="{{url('user/createshop')}}">Create Shop</a>
                           @endif
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

                url: "{{ url('user/addshop') }}",

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
@endsection
