@extends('admin.admin_master')
@section('admin')


    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Fiche Client</h4>



                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">






                            <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                <tr>
                                    <th>Sl</th>
                                    <th>Name</th>
                                    <th>Wilaya</th>
                                    <th>Action</th>

                                </thead>


                                <tbody>

                                @foreach($customers as $key => $item)
                                    @php


                                        $cus = App\Models\Customer::where('id',$item->customer_id)->first();

                                    @endphp
                                    <tr>
                                        <td> {{ $key+1}} </td>
                                        <td> {{ $cus->name }} </td>
                                        <td> {{ $cus->address }} </td>
                                        <td>
                                            <a href="{{ route('credit.customer',$item->customer_id) }}"  class="btn btn-warning sm" title="Edit Data">  <i class="fas fa-edit">fiche client</i> </a>



                                        </td>

                                    </tr>
                                @endforeach

                                </tbody>
                            </table>

                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->



        </div> <!-- container-fluid -->
    </div>


@endsection