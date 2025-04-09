









    <!doctype html>
    <html lang="en">

    <head>

        <meta charset="utf-8" />
        <title> Polybeton © </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesdesign" name="author" />

        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('backend/assets/images/favicon.ico') }}">

        <!-- Select 2 -->
        <link href="{{ asset('backend/assets/libs/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css">
        <!-- end Select 2  -->


        <!-- jquery.vectormap css -->
        <link href="{{ asset('backend/assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css') }}" rel="stylesheet" type="text/css" />

        <!-- DataTables -->
        <link href="{{ asset('backend/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />

        <!-- Responsive datatable examples -->
        <link href="{{ asset('backend/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />

        <!-- Bootstrap Css -->
        <link href="{{ asset('backend/assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="{{ asset('backend/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="{{ asset('backend/assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />

        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" >

    </head>

    <body data-topbar="dark">

    <!-- <body data-layout="horizontal" data-topbar="dark"> -->

    <!-- Begin page -->
    <div id="layout-wrapper">


    @include('admin.body.header')

    <!-- ========== Left Sidebar Start ========== -->
    @include('admin.body.sidebar')
    <!-- Left Sidebar End -->



        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">



            <div class="page-content">
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">

                            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                <h4 class="mb-sm-0">Dashboard</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Polybeton</a></li>
                                        <li class="breadcrumb-item active">Dashboard</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">
                        <div class="col-xl-3 col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex">
                                        <div class="flex-grow-1">
                                            <p class="text-truncate font-size-14 mb-2">Bon Livraison Journalier : ({{$jour}})</p>
                                            <h4 class="mb-2">{{  number_format($invoice2, 2, ',', ' ') }} DA </h4>

                                        </div>
                                        <div class="avatar-sm">
                <span class="avatar-title bg-light text-primary rounded-3">
                   <i class="mdi mdi-currency-usd   font-size-24" style="color: #2dc26b"></i>
                </span>
                                        </div>
                                    </div>
                                </div><!-- end cardbody -->
                            </div><!-- end card -->
                        </div><!-- end col -->












                        <div class="col-xl-3 col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex">
                                        <div class="flex-grow-1">

                                            <h4 class="text-truncate font-size-14 bold mb-2">Bon Livraison Mensuelle : ({{$mois}})</h4>


                                            <h4 class=" text-success fw-bold  me-2">{{  number_format($invoice1, 2, ',', ' ') }} DA</h4>




                                        </div>
                                        <div class="avatar-sm">
                <span class="avatar-title bg-light text-primary rounded-3">
                    <i class="mdi mdi-currency-usd   font-size-24" style="color: #2dc26b"></i>
                </span>
                                        </div>
                                    </div>
                                </div><!-- end cardbody -->
                            </div><!-- end card -->
                        </div><!-- end col -->



                        <div class="col-xl-3 col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex">
                                        <div class="flex-grow-1">
                                            <p class="text-truncate font-size-14 mb-2">Retour Client Journalier : ({{$jour}})</p>
                                            <h4 class="mb-2">{{  number_format($retour2, 2, ',', ' ') }} DA </h4>

                                        </div>
                                        <div class="avatar-sm">
                <span class="avatar-title bg-light text-success rounded-3">
                     <i class="mdi mdi-currency-usd font-size-24 " style="color: #e50b0b"></i>
                </span>
                                        </div>
                                    </div>
                                </div><!-- end cardbody -->
                            </div><!-- end card -->
                        </div><!-- end col -->


                        <div class="col-xl-3 col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex">
                                        <div class="flex-grow-1">
                                            <h4 class="text-truncate  font-size-14 bold">Retour Client Mensuelle : ({{$mois}})</h4>
                                            <h4 class=" text-danger fw-bold  me-2">{{  number_format($retour1, 2, ',', ' ') }} DA    </h4>

                                        </div>
                                        <div class="avatar-sm">
                <span class="avatar-title bg-light text-success rounded-3">
                    <i class="mdi mdi-currency-usd font-size-24 " style="color: #e50b0b"></i>
                </span>
                                        </div>
                                    </div>
                                </div><!-- end cardbody -->
                            </div><!-- end card -->
                        </div><!-- end col -->


                    </div><!-- end row -->











                    <div class="row">
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title mb-4">Production du mois de  : ({{$mois}})</h4>

                                    <div id="char" class="apex-charts" dir="ltr"></div>
                                </div>
                            </div><!--end card-->
                        </div>
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title mb-4">Produits Vendu le mois de  : ({{$mois}})</h4>

                                    <div id="bar_chart1" class="apex-charts" dir="ltr"></div>
                                </div>
                            </div><!--end card-->
                        </div>
                    </div>
                    <!-- end row -->




                    <div class="row">

                    </div>
                    <!-- end row -->





                    <div class="row">
                        <div class="col-xl-8">
                            <div class="card">
                                <div class="card-body">
                                    <div class="dropdown float-end">
                                        <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="mdi mdi-dots-vertical"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Sales Report</a>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Export Report</a>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Profit</a>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Action</a>
                                        </div>
                                    </div>

                                    <h4 class="card-title mb-4">Stock Disponible</h4>

                                    <div class="table-responsive">
                                        <table data-page-length='5' class="table table-centered mb-0 align-middle table-hover table-nowrap" id="datatable2">
                                            <thead class="table-light">
                                            <tr>
                                                <th><h6 class="mb-0">#</h6></th>
                                                <th><h6 class="mb-0">Libelle</h6></th>
                                                <th><h6 class="mb-0">Icone</h6></th>
                                                <th><h6 class="mb-0">Disponibilite</h6></th>
                                                <th><h6 class="mb-0">Famille</h6></th>
                                                <th style="width: 120px;"><h6 class="mb-0">Quantite / m²</h6></th>
                                                <th><h6 class="mb-0">Prix_unitaire</h6></th>
                                            </tr>
                                            </thead><!-- end thead -->
                                            <tbody>

                                            @foreach($product as $key => $item)
                                                <tr>
                                                    <td> {{ $key+1}} </td>
                                                    <td><h6 class="mb-0">{{ $item->name }}</h6></td>
                                                    <td><img src="{{ asset( $item->product_image ) }}" style="width:100px; height:65px"></td>
                                                    <td>
                                                        <div class="font-size-13"><i class="ri-checkbox-blank-circle-fill font-size-10 text-success align-middle me-2"></i>Active</div>
                                                    </td>
                                                    <td>
                                                        {{ $item['category']['name'] }}
                                                    </td>
                                                    <td>
                                                        {{ $item->quantity }}
                                                    </td>
                                                    <td> {{ $item->prix_unitaire }}</td>
                                                </tr>
                                                <!-- end -->
                                            @endforeach

                                            <!-- end -->
                                            </tbody><!-- end tbody -->
                                        </table> <!-- end table -->
                                    </div>
                                </div><!-- end card -->
                            </div><!-- end card -->
                        </div>
                        <!-- end col -->
                        <div class="col-lg-4">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title mb-4">Stock Disponible</h4>

                                    <div id="pie_chart2" class="apex-charts" dir="ltr"></div>
                                </div>
                                <br>
                                <br>   <br> <br>
                                <br>
                                <br>   <br> <br>
                                <br> <br>
                            </div>
                            <br>
                        </div>

                    </div>












                    <div class="row">


                        <div class="row">
                            <div class="col-xl-12">
                                <div class="card">
                                    <div class="card-body">


                                        <h1 class="card-title mb-4" style="alignment: center;" >Journal Stock Ventes</h1>
                                        <br>
                                        <br>
                                        <br>
                                        <div class="table-responsive">
                                            <table data-page-length='5' class="table table-centered mb-0 align-middle table-hover table-nowrap table-bordered" id="datatable1">
                                                <thead class="table-light ">
                                                <tr class="">
                                                    <th><h5 class="mb-0">#</h5></th>
                                                    <th><h5 class="mb-0">Nom client</h5></th>
                                                    <th><h5 class="mb-0">Reference</h5> </th>
                                                    <th><h5 class="mb-0">Date</h5></th>
                                                    <th><h5 class="mb-0">Net a payer</h5></th>
                                                    <th><h5 class="mb-0">Paiement</h5></th>
                                                    <th> <h5 class="mb-0">Reste a payer</h5></th>

                                                    <th style="width: 120px;"> <h5 class="mb-0">Action</h5></th>
                                                </tr>
                                                </thead><!-- end thead -->
                                                <tbody>
                                                @foreach($allData as $key => $item)
                                                    <tr>




                                                        <td> {{ $key+1}} </td>
                                                        <td> {{ $item['customer']['name'] }} </td>
                                                        <td><?php if ($item->invoice_id) {echo  'BL2024/'. $item['invoice']['invoice_no'];}
                                                            else {

                                                                echo  'RC2024/'. $item['retour']['retour_no'];
                                                            }
                                                            ?>   </td>
                                                        <td>
                                                            <?php if ($item->invoice_id) {echo  date('d-m-Y',strtotime($item['invoice']['date']));}
                                                            else {

                                                                echo   date('d-m-Y',strtotime($item['retour']['date']));
                                                            }
                                                            ?>



                                                        </td>
                                                        <td class="table-primary"> {{ $item->total_amount }} </td>
                                                        <td class="table-success"> {{ $item->paid_amount }} </td>
                                                        <td class="table-danger"> {{ $item->due_amount }} </td>
                                                        <td>
                                                            <a href="
 <?php if ($item->invoice_id) {echo  route('customer.details_bl',$item['invoice']['id']);}
                                                            else {

                                                                echo   route('customer.details_rc',$item['retour']['id']);
                                                            }
                                                            ?>" class="btn btn-success sm" target="_black" title=" Details">  <i class="fa fa-eye"></i> </a>






                                                            <a href=" <?php if ($item->invoice_id) {echo  route('print.invoice',$item['invoice']['id']);}
                                                            else {

                                                                echo  route('print.retour',$item['retour']['id']);
                                                            }
                                                            ?>


                                                                    " class="btn btn-danger sm" title="Print Invoice" >  <i class="fa fa-print"></i> </a>

                                                        </td>

                                                    </tr>
                                                @endforeach
                                                <!-- end -->
                                                </tbody><!-- end tbody -->
                                            </table> <!-- end table -->
                                        </div>
                                    </div><!-- end card -->
                                </div><!-- end card -->
                            </div>
                            <!-- end col -->



                        </div>
                        <!-- end row -->
                    </div>

                </div>



                <!-- End Page-content -->

            @include('admin.body.footer')


        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->

    <!-- Right Sidebar -->

    <!-- /Right-bar -->

    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>

    <!-- JAVASCRIPT -->
    <script src="{{ asset('backend/assets/libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('backend/assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('backend/assets/libs/metismenu/metisMenu.min.js') }}"></script>
    <script src="{{ asset('backend/assets/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('backend/assets/libs/node-waves/waves.min.js') }}"></script>


    <!-- apexcharts -->
    <script src="{{ asset('backend/assets/libs/apexcharts/apexcharts.min.js') }}"></script>

    <!-- jquery.vectormap map -->
    <script src="{{ asset('backend/assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
    <script src="{{ asset('backend/assets/libs/admin-resources/jquery.vectormap/maps/jquery-jvectormap-us-merc-en.js') }}"></script>

    <!-- Required datatable js -->
    <script src="{{ asset('backend/assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('backend/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>

    <!-- Responsive examples -->
    <script src="{{ asset('backend/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('backend/assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script>

    <script src="{{ asset('backend/assets/js/pages/dashboard.init.js') }}"></script>

    <!-- App js -->
    <script src="{{ asset('backend/assets/js/app.js') }}"></script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
                @if(Session::has('message'))
        var type = "{{ Session::get('alert-type','info') }}"
        switch(type){
            case 'info':
                toastr.info(" {{ Session::get('message') }} ");
                break;

            case 'success':
                toastr.success(" {{ Session::get('message') }} ");
                break;

            case 'warning':
                toastr.warning(" {{ Session::get('message') }} ");
                break;

            case 'error':
                toastr.error(" {{ Session::get('message') }} ");
                break;
        }
        @endif
    </script>

    <!-- Required datatable js -->
    <script src="{{ asset('backend/assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('backend/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>

    <!-- Datatable init js -->
    <script src="{{ asset('backend/assets/js/pages/datatables.init.js') }}"></script>

    <script src="{{ asset('backend/assets/js/validate.min.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <script src="{{ asset('backend/assets/js/code.js') }}"></script>


    <script src="{{ asset('backend/assets/js/handlebars.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/notify/0.4.2/notify.min.js" ></script>

    <!--  For Select2 -->
    <script src="{{ asset('backend/assets/libs/select2/js/select2.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/pages/form-advanced.init.js') }}"></script>
    <!-- end  For Select2 -->
    <!-- apexcharts -->
    <script src="{{ asset('backend/assets/libs/apexcharts/apexcharts.min.js') }} "></script>

    <!-- apexcharts init -->
    <script src=" {{ asset('backend/assets/js/pages/apexcharts.init.js') }}  "></script>





    <script>

        $('#datatable2').dataTable( {
            initComplete: function () {
                this.api()
                    .columns()
                    .every(function () {
                        let column = this;

                        // Create select element
                        let select = document.createElement('select');
                        select.add(new Option(''));
                        column.footer().replaceChildren(select);

                        // Apply listener for user change in value
                        select.addEventListener('change', function () {
                            column
                                .search(select.value, {exact: true})
                                .draw();
                        });

                        // Add list of options
                        column
                            .data()
                            .unique()
                            .sort()
                            .each(function (d, j) {
                                select.add(new Option(d));
                            });
                    });
            }
        });
    </script>


    <script>


        $('#datatable1').dataTable( {
            "pageLength": 4,
            language: {
                url: '//cdn.datatables.net/plug-ins/1.13.7/i18n/fr-FR.json',
            },
        } );

    </script>



    <script>


        var options = {
            series: [{
                data: [ {{$vente1}} , {{$vente8}},{{$vente9}},{{$vente10}},{{$vente11}}]
            }],
            chart: {
                type: 'bar',
                height: 350
            },
            plotOptions: {
                bar: {
                    borderRadius: 4,
                    horizontal: true,
                }
            },

            dataLabels: {
                enabled: false
            },
            xaxis: {
                categories: [' {{$product1->name}}', '{{$product8->name}}','{{$product9->name}}','{{$product10->name}}','{{$product11->name}}',
                ],
            }
        };

        var chart = new ApexCharts(document.querySelector("#bar_chart1"), options);
        chart.render();




    </script>
/*
    <script>
        var options = {
            series: [{{$product1->quantity}}, {{$product8->quantity}}, {{$product9->quantity}}, {{$product10->quantity}}, {{$product11->quantity}}],
            chart: {
                width: 500,
                type: 'pie',
            },
            labels: ['{{$product1->name}}', '{{$product8->name}}', '{{$product9->name}}', '{{$product10->name}}', '{{$product11->name}}'],
            responsive: [{
                breakpoint: 480,

                    legend: {
                        position: 'bottom'
                    }

            }]
        };

        var chart = new ApexCharts(document.querySelector("#pie_chart2"), options);
        chart.render();


    </script>




<script>



    var options = {
        chart: {
            type: 'bar',
            height: 'auto'
        },
        series: [{
            name: "Qte_produite",
            data: [ 55, 89, 11, 500, 300]
        }],
        dataLabels: {
            enabled: false



           },
        xaxis: {




            categories: ['{{$product1->name}}', '{{$product8->name}}',  '{{$product9->name}}',  '{{$product10->name}}',  '{{$product11->name}}' ],
            labels: {
                show: true,
                style: {
                    colors: 'red',
                    fontSize: '12px'
                },
            }


        },
        colors: [
            function ({ value, seriesIndex, dataPointIndex, w }) {
                if (dataPointIndex == 0) {
                    return "#25d94e";
                }
                if (dataPointIndex == 1) {
                    return "#25d94e";
                }
                if (dataPointIndex == 2) {
                    return "#25d94e";
                }
                if (dataPointIndex == 3) {
                    return "#25d94e";
                }
                else {
                    return "#25d94e";
                }
            }
        ],
        states: {
            normal: {
                filter: { type: 'none', value: 0 },
            },
            hover: {
                filter: { type: 'lighten', value: 0.2 },
            },
            active: {
                filter: { type: 'darken', value: 0.2 },
                allowMultipleDataPointsSelection: false,
            },
        }
    }

    var chart = new ApexCharts(document.querySelector("#char"), options);

    chart.render();



</script>


    </body>

    </html>