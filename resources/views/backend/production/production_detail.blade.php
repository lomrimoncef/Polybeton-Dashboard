@extends('admin.admin_master')
@section('admin')


    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex  align-items-center justify-content-between">

                        <h4 class="mb-sm-0">Fiche Production equipe :{{ $production->equipe }} </h4>
                        <h4 class="mb-sm-0">Periode : Le {{$production->date}}/    <?php if($production->periode=="P1"){echo'05h00-13h00';}
                            if($production->periode=="P2"){echo'13h00-21h00';}
                            if($production->periode=="P3"){echo'21h00-5h00';}?> </h4>


                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">






                            <table  class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                <tr style="background:#e3dddc">
                                    <th>#</th>
                                    <th  >Date</th>
                                    <th>Categorie</th>
                                    <th>Libelle </th>
                                    <th>Nombre de planche</th>





                                </thead>


                                <tbody>

                                @php


                               $production_details = App\Models\productiondetail::where('production_id',$production->id)->get();
                               // dd($production_details);
                                @endphp
                                @foreach($production_details as $key => $prod)
                                    <tr>
                                        <td class="text-center">{{ $key+1 }}</td>
                                        <td class="text-center">{{ $prod->date }}</td>
                                        <td class="text-center">{{ $prod['category']['name']  }}</td>
                                        <td class="text-center">{{ $prod['product']['name'] }}</td>
                                        <td class="text-center table-success">{{ $prod->planche_nbr }}</td>



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