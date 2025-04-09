@extends('admin.admin_master')
@section('admin')


    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Liste rapport de Production</h4>



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
                                    <th>#</th>
                                    <th>Machine</th>
                                    <th>Date </th>
                                    <th>Heure </th>
                                    <th>Equipe</th>
                                    <th>Details</th>

                                </thead>


                                <tbody>

                                @foreach($allData as $key => $item)
                                    <tr>
                                        <td> {{ $key+1}} </td>
                                        <td> {{ $item->machine }} </td>
                                        <td> {{ date('d-m-Y',strtotime($item->date))  }}</td>
                                        <td><?php if($item->periode=="P1"){echo'05h00-13h00';}
                                                  if($item->periode=="P2"){echo'13h00-21h00';}
                                                  if($item->periode=="P3"){echo'21h00-5h00';}?> </td>


                                        <td>  {{ $item->equipe }} </td>

                                        <td>         <a href="{{ route('production.detail',$item->id) }}" class="btn btn-success sm" target="_black" title=" Details">  <i class="fa fa-eye"></i> </a>
                                            <a href="#" class="btn btn-danger sm" title="Print Invoice" >  <i class="fa fa-print"></i> </a>   </td>

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