@extends('admin.admin_master')
@section('admin')


    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex  align-items-center justify-content-between">

                        <h4 class="mb-sm-0">Fiche Client :{{ $client->name }} </h4>
                        <h4 class="mb-sm-0">Date du Retour Client :{{ $retour->date }} </h4>


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
                                <tr style="background:#e3dddc">
                                    <th>#</th>
                                    <th>Qte demandee</th>
                                    <th  >Prix unitaire</th>
                                    <th >Paiement HT</th>
                                    <th >Paiement TTC</th>



                                </thead>


                                <tbody>

                                @php
                                    $total_sum = '0';

                               $retour_details = App\Models\RetourDetail::where('retour_id',$payment->retour_id)->get();
                                @endphp
                                @foreach($retour_details as $key => $details)
                                    <tr>
                                        <td class="text-center">{{ $key+1 }}</td>
                                        <td class="text-center">{{ $details->selling_qty }}</td>
                                        <td class="text-center table-danger">{{ $details->selling_price }}</td>
                                        <td class="text-center table-success">{{ $details->selling_price *$details->selling_qty }}</td>
                                        <td class="text-center table-success">{{ ($details->selling_price *$details->selling_qty)*1.19 }}</td>

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