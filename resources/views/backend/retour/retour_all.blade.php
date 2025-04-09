@extends('admin.admin_master')
@section('admin')


    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Liste Retour_Client</h4>



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
                                    <th>Nom du Client </th>
                                    <th>Retour_Client No </th>
                                    <th>Date </th>
                                    <th>Desctipion</th>
                                    <th>Amount</th>

                                </thead>


                                <tbody>

                                @foreach($allData as $key => $item)
                                    <tr>
                                        <td> {{ $key+1}} </td>
                                        <td> {{ $item['payment']['customer']['name'] }} </td>
                                        <td> PB-RC24/0{{ $item->retour_no }} </td>
                                        <td> {{ date('d-m-Y',strtotime($item->date))  }} </td>


                                        <td>   @php
                                                $p = App\Models\RetourDetail::where('retour_id',$item->id)->first();
                                            @endphp    {{ $p->description }} </td>

                                        <td>  $ {{ $item['payment']['total_amount'] }} </td>

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