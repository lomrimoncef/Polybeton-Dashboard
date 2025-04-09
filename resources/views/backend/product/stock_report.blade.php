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
<h4> Rapport de Stock</h4>

                                </div>
                            </div>






                            <div class="row">
                                <div class="col-12">
                                    <div>
                                        <div class="p-2">

                                        </div>
                                        <div class="">
                                            <div class="table-responsive">
                                                <table class="table table-bordered">
                                                    <thead style="background-color: #ded4b8">
                                                    <tr>
                                                        <td class="text-center"><strong># </strong></td>
                                                        <td class="text-center"><strong>Nom produit </strong></td>
                                                        <td class="text-left" style="width: 50px"><strong>Icone  </strong>
                                                        </td>
                                                        <td class="text-center"><strong>Surface M² Disponible</strong>
                                                        </td>


                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <!-- foreach ($order->lineItems as $line) or some such thing here -->


                                                    @foreach($produit as $key => $item)


                                                        <tr>
                                                            <td class="text-center">{{ $key+1 }}</td>
                                                            <td class="text-center"><h5>{{ $item->name }}</h5></td>
                                                            <td><div ><img src="{{ asset( $item->product_image ) }}" style="width:80px; height:50px">   </div></td>
                                                            <td class="text-center " style="background-color: #bedeb8" ><h5>{{ $item->quantity }} m²</h5></td>



                                                        </tr>

                                                    @endforeach




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