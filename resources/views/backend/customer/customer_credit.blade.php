@extends('admin.admin_master')
@section('admin')


 <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex  align-items-center justify-content-between">
                                    <h4 class="mb-sm-0">Fiche Client : </h4>



                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">



                    <h4 class="card-title">Credit Customer Data </h4>


                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            <th>Sl</th>
                            <th>Customer Name</th>
                            <th>Reference </th>
                            <th>Date</th>
                            <th  >Net a payer</th>
                            <th >Paiement</th>
                            <th> Reste a payer</th>
                            <th>Action</th>

                        </thead>


                        <tbody>

                        	@foreach($allData as $key => $item)
    <tr>

        @php
            // dd($allData);
//dd($item['invoice']['id']);
        @endphp


        <td> {{ $key+1}} </td>
        <td> {{ $item['customer']['name'] }} </td>
        <td> BL2024/{{ $item['invoice']['invoice_no']}}   </td>
        <td> {{  date('d-m-Y',strtotime($item['invoice']['date'])) }} </td>
        <td class="table-primary"> {{ $item->total_amount }} </td>
        <td class="table-success"> {{ $item->paid_amount }} </td>
        <td class="table-danger"> {{ $item->due_amount }} </td>
        <td>
            <a href="{{ route('customer.details_bl',$item['invoice']['id']) }}" class="btn btn-success sm" target="_black" title=" Details">  <i class="fa fa-eye"></i> </a>
            <a href="{{ route('print.invoice',$item['invoice']['id']) }}" class="btn btn-danger sm" title="Print Invoice" >  <i class="fa fa-print"></i> </a>

                            </td>

                        </tr>
                        @endforeach


                            @foreach($allData2 as $key => $item2)
                                <tr>

                                    @php
                                        // dd($allData);

                                    @endphp


                                    <td> {{ $key+1}} </td>
                                    <td> {{ $item2['customer']['name'] }} </td>
                                    <td> RC2024/{{ $item2['retour']['retour_no']}}   </td>
                                    <td> {{  date('d-m-Y',strtotime($item2['retour']['date'])) }} </td>
                                    <td class="table-primary"> {{ $item2->total_amount }} </td>
                                    <td class="table-success"> {{ $item2->paid_amount }} </td>
                                    <td class="table-danger"> {{ $item2->due_amount }} </td>
                                    <td>
                                        <a href="{{ route('customer.details_rc',$item2['retour']['id']) }}" class="btn btn-success sm" target="_black" title=" Details">  <i class="fa fa-eye"></i> </a>
                                        <a href="{{ route('print.retour',$item2['retour']['id']) }}" class="btn btn-danger sm" title="Print Invoice" >  <i class="fa fa-print"></i> </a>

                                    </td>

                                </tr>
                            @endforeach










                        </tbody>
                    </table>

                    Fiche Client :{{ $cus->name }}
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->



                    </div> <!-- container-fluid -->
                </div>


@endsection