@extends('admin.admin_master')
@section('admin')

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Retour Client</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);"> </a></li>
                                <li class="breadcrumb-item active">Retour Client</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <div class="row">
                                <div class="col-12">
                                    <div class="invoice-title">
                                        <h4 class="float-end font-size-16"><strong>Retour Client No # {{ $retour->retour_no }}</strong></h4>
                                        <h3>
                                            <img src="{{ asset('backend/assets/images/s.png') }}" alt="logo"  width="100" height="110"/> SARL POLYBETON BOUSSAADA
                                        </h3>
                                    </div>
                                    <hr>

                                    <div class="row">
                                        <div class="col-6 mt-4">
                                            <address>
                                                <strong>SARL POLYBETON :</strong><br>
                                                Fabrication de bloc en beton<br>
                                                Paves,Bordures de trottoirs<br>
                                                Parpaings et Hourdis
                                            </address>
                                        </div>
                                        <div class="col-6 mt-4 text-end">
                                            <address>
                                                <strong> Date retour client:</strong><br>
                                                {{ date('d-m-Y',strtotime($retour->date)) }} <br><br>
                                            </address>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            @php
                                $payment = App\Models\Payment::where('retour_id',$retour->id)->first();
                            @endphp

                            <div class="row">
                                <div class="col-12">
                                    <div>
                                        <div class="p-2">
                                            <h3 class="font-size-16"><strong>Retour Client</strong></h3>
                                        </div>
                                        <div class="">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead>
                                                    <tr class="table-primary">
                                                        <td><strong>Nom Client </strong></td>
                                                        <td class="text-center"><strong> Mobile Client</strong></td>
                                                        <td class="text-center"><strong>Addresse Client</strong>
                                                        </td>
                                                        <td class="text-center"><strong>Description</strong>
                                                        </td>

                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <!-- foreach ($order->lineItems as $line) or some such thing here -->
                                                    <tr class="table-success">
                                                        <td> {{ $payment['customer']['name'] }}</td>
                                                        <td class="text-center">{{ $payment['customer']['mobile_no']  }}</td>
                                                        <td class="text-center">{{ $payment['customer']['email']  }}</td>
                                                        <td class="text-center">{{ $retour->description  }}</td>

                                                    </tr>


                                                    </tbody>
                                                </table>
                                            </div>


                                        </div>
                                    </div>

                                </div>
                            </div> <!-- end row -->





                            <div class="row">
                                <div class="col-12">
                                    <div>
                                        <div class="p-2">

                                        </div>
                                        <div class="">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead>
                                                    <tr class="table-primary">
                                                        <td><strong>Sl </strong></td>

                                                        <td class="text-center" width="200"><strong>Date RC</strong>             </td>

                                                        <td class="text-center"><strong>Description</strong>             </td>
                                                        <td class="text-center"><strong>Quantity Demande</strong>
                                                        </td>
                                                        <td class="text-center"><strong>Prix unitaire </strong>
                                                        </td>
                                                        <td class="text-center"><strong>Reduction </strong>
                                                        </td>
                                                        <td class="text-center"><strong>Montant HT</strong>
                                                        </td>

                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <!-- foreach ($order->lineItems as $line) or some such thing here -->

                                                    @php
                                                        $total_sum = '0';
                                                    @endphp
                                                    @foreach($retour['retour_details'] as $key => $details)
                                                        <tr>
                                                            <td class="text-center">{{ $key+1 }}</td>

                                                            <td class="text-center">{{ $details->date }}</td>
                                                            <td class="text-center">{{ $details->description }}</td>
                                                            <td class="text-center">{{ $details->selling_qty }}</td>
                                                            <td class="text-center">{{ $details->selling_price }}</td>
                                                            <td class="text-center">/</td>
                                                            <td class="text-center">{{ $details->selling_price*$details->selling_qty  }}</td>

                                                        </tr>
                                                        @php
                                                            $total_sum += $details->selling_price*$details->selling_qty ;
                                                        @endphp
                                                    @endforeach
                                                    <tr>
                                                        <td class="thick-line"></td>
                                                        <td class="thick-line"></td>
                                                        <td class="thick-line"></td>
                                                        <td class="thick-line"></td>
                                                        <td class="thick-line"></td>
                                                        <td class="thick-line text-center">
                                                            <strong>Total TTC</strong></td>
                                                        <td class="thick-line text-end">{{  number_format($total_sum*1.19, 2, ',', ' ') }} DA   </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="no-line"></td>
                                                        <td class="no-line"></td>
                                                        <td class="no-line"></td>
                                                        <td class="no-line"></td>
                                                        <td class="no-line"></td>
                                                        <td class="no-line text-center">
                                                            <strong>Reduction</strong></td>
                                                        <td class="no-line text-end">${{ $payment->discount_amount }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="no-line"></td>
                                                        <td class="no-line"></td>
                                                        <td class="no-line"></td>
                                                        <td class="no-line"></td>
                                                        <td class="no-line"></td>
                                                        <td class="no-line text-center">
                                                            <strong>Montant paye</strong></td>
                                                        <td class="no-line text-end"> {{  number_format($payment->paid_amount, 2, ',', ' ') }} DA</td>
                                                    </tr>

                                                    <tr>
                                                        <td class="no-line"></td>
                                                        <td class="no-line"></td>
                                                        <td class="no-line"></td>
                                                        <td class="no-line"></td>
                                                        <td class="no-line"></td>
                                                        <td class="no-line text-center">
                                                            <strong>Reste a payer </strong></td>
                                                        <td class="no-line text-end">{{  number_format($payment->due_amount, 2, ',', ' ') }} DA </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="no-line"></td>
                                                        <td class="no-line"></td>
                                                        <td class="no-line"></td>
                                                        <td class="no-line"></td>
                                                        <td class="no-line"></td>
                                                        <td class="no-line text-center table-success" width="200">
                                                            <strong>Net a payer</strong></td>
                                                        <td class="no-line text-end  table-success"><h4 class="m-0"> {{  number_format($payment->total_amount, 2, ',', ' ') }} DA</h4></td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>

                                            <div class="d-print-none">
                                                <div class="float-end">
                                                    <a href="javascript:window.print()" class="btn btn-success waves-effect waves-light"><i class="fa fa-print"></i></a>
                                                    <a href="#" class="btn btn-primary waves-effect waves-light ms-2">Download</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div> <!-- end row -->
















                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->

        </div> <!-- container-fluid -->
    </div>


@endsection