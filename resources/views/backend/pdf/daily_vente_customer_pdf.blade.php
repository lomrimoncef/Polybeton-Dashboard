@extends('admin.admin_master')
@section('admin')

    <div class="page-content">
        <div class="container-fluid">



            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <div class="row">
                                <div class="col-12">
                                    <div class="invoice-title">

                                        <h3>
                                            <img src="{{ asset('backend/assets/images/PROD_PB_Fathi_20240101_0453.jpg') }}" alt="logo"  width="700" height="210"/>
                                        </h3>
                                    </div>
                                    <hr>


                                </div>
                            </div>



                            <div class="row">
                                <div class="col-12">
                                    <div>
                                        <div class="p-2">
                                            <h3 class="font-size-16"><strong>Rapport Chiffre de vente /Client
                                                    <span class="btn btn-info"> {{ $sdate }} </span> -
                                                    <span class="btn btn-success"> {{$edate }} </span>
                                                </strong></h3>
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
                                                    <tr>
                                                        <td><strong># </strong></td>
                                                        <td class="text-center"><strong>Nom Client </strong></td>
                                                        <td class="text-center"><strong>Addresse  </strong>
                                                        </td>
                                                        <td class="text-center"><strong>Montant Paye</strong>
                                                        </td>
                                                        <td class="text-center"><strong></strong>
                                                        </td>

                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <!-- foreach ($order->lineItems as $line) or some such thing here -->


                                                    @foreach($orders as $key => $item)

                                                        @php


                                                       $cus = App\Models\Customer::where('id',$item->customer_id)->first();

                                                        @endphp
                                                        <tr>
                                                            <td class="text-center">{{ $key+1 }}</td>
                                                            <td class="text-center">{{ $cus->name }}</td>
                                                            <td class="text-center">#{{ $cus->addresse }}</td>
                                                            <td class="text-center">{{ $item->total_sales }}</td>
                                                            <td class="text-center"></td>


                                                        </tr>

                                                    @endforeach



                                                    <tr>
                                                        <td class="no-line"></td>
                                                        <td class="no-line"></td>
                                                        <td class="no-line"></td>
                                                        <td class="no-line"></td>
                                                        <td class="no-line"></td>

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