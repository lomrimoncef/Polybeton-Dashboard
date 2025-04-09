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
                                            <h3 class="font-size-16"><strong>Rapport de production de l'equipe :
                                                    <span class="btn btn-info"> {{ $start_date }} </span> -
                                                    <span class="btn btn-success"> {{$end_date }} </span>
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
                                                <table class="table table-bordered">
                                                    <thead style="background-color: #ded4b8">
                                                    <tr>
                                                        <td class="text-center"><strong># </strong></td>
                                                        <td class="text-center"><strong>Produit </strong></td>
                                                        <td class="text-left"><strong>Icone  </strong>
                                                        </td>
                                                        <td class="text-center"><strong>Nombre de Planche Produite</strong>
                                                        </td>
                                                        <td class="text-center"><strong>Heure de production </strong>
                                                        </td>
                                                        <td class="text-center"><strong>Date de production </strong>
                                                        </td>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <!-- foreach ($order->lineItems as $line) or some such thing here -->


                                                    @foreach($allData as $key => $item)

                                                        @php



                                                            $cus2 = App\Models\productiondetail::where('production_id',$item->id)->first();
                                                             $cus = App\Models\Product::where('id',$cus2->product_id)->first();


                                                        @endphp
                                                        <tr>
                                                            <td class="text-center">{{ $key+1 }}</td>
                                                            <td class="text-center"><h5>{{ $cus->name }}</h5></td>
                                                            <td><div ><img src="{{ asset( $cus->product_image ) }}" style="width:80px; height:50px">   </div></td>
                                                            <td class="text-center " style="background-color: #bedeb8" ><h5>{{ $cus2->planche_nbr }}</h5></td>

                                                            <td class="text-center"><h5>     <?php if($item->periode=="P1"){echo'05h00-13h00';}
                                                                    if($item->periode=="P2"){echo'13h00-21h00';}
                                                                    if($item->periode=="P3"){echo'21h00-5h00';}?> </h5></td>


                                                            <td class="text-center"><h5>{{ $cus2->date }} </h5></td>
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