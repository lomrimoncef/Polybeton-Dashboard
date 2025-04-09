@extends('admin.admin_master')
@section('admin')


    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex  align-items-center justify-content-between">

                        <h4 class="mb-sm-0">Fiche Client :{{ $client->name }} </h4>
                        <h4 class="mb-sm-0">Date du Bon de livraison :{{ $invoice->date }} </h4>


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
                                <tr style="background:#e3dddc">
                                    <th>#</th>
                                    <th>Categorie</th>
                                    <th>Libelle </th>
                                    <th>Qte demandee</th>
                                    <th  >Prix unitaire</th>
                                    <th >Paiement TTC</th>



                                </thead>


                                <tbody>

                                @php
                                    $total_sum = '0';

                               $invoice_details = App\Models\InvoiceDetail::where('invoice_id',$payment->invoice_id)->get();
                                @endphp
                                @foreach($invoice_details as $key => $details)
                                    <tr>
                                        <td class="text-center">{{ $key+1 }}</td>
                                        <td class="text-center">{{ $details['category']['name'] }}</td>
                                        <td class="text-center">{{ $details['product']['name'] }}</td>
                                        <td class="text-center">{{ $details->selling_qty }}</td>
                                        <td class="text-center table-danger">{{ $details->pu_vente }}</td>
                                        <td class="text-center table-success">{{ $details->pu_vente*$details->selling_qty }}</td>


                                    </tr>
                                    @php
                                        $total_sum += $details->selling_price;
                                    @endphp
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