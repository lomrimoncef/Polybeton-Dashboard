@extends('admin.admin_master')
@section('admin')


    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex  align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Fiche Produit :{{$produit->name}} </h4>



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
                                    <th>#</th>
                                    <th>Reference </th>
                                    <th>Date</th>
                                    <th  >Quantite</th>
                                    <th >Prix_unitaire</th>
                                    <th> Paiement</th>


                                </thead>


                                <tbody>

                                @foreach($fiche as $key => $item)
                                    <tr>

                                        @php
                                            $cus = App\Models\Invoice::where('id',$item->invoice_id)->first();
                                        @endphp


                                        <td> {{ $key+1}} </td>
                                        <td> BL2024/{{ $cus->invoice_no}} </td>
                                        <td> {{  date('d-m-Y',strtotime($item->date)) }} </td>
                                        <td class="table-primary"> {{ $item->selling_qty }} </td>
                                        <td class="table-success"> {{ $item->selling_price }} </td>
                                        <td class="table-danger"> {{ $item->selling_qty*$item->selling_price }} </td>


                                    </tr>
                                @endforeach













                                </tbody>
                            </table>

                            Fiche Client :
                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->



        </div> <!-- container-fluid -->
    </div>


@endsection