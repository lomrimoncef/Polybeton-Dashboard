@extends('admin.admin_master')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <div class="page-content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Ajouter un rapport de production  </h4><br><br>


                            <div class="row">




                                <div class="col-md-2">
                                    <div class="md-3">
                                        <label for="example-text-input" class="form-label">Date</label>
                                        <input class="form-control example-date-input" value="{{ $date }}" name="date" type="date"  id="date">
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="md-3">
                                        <label for="example-text-input" class="form-label">Equipe</label>
                                        <select name="equipe" id="equipe" class="form-select select2" aria-label="Default select example">
                                            <option selected="">Selectionner une equipe</option>
                                            <option value="Fathi">Fathi</option>
                                            <option value="Salmine">Salmine</option>
                                            <option value="Touama">Touama</option>
                                            <option value="Salhi">Salhi</option>
                                            <option value="Sofiane">Sofiane</option>
                                        </select>
                                    </div>
                                </div>


                                <div class="col-md-3">
                                    <div class="md-3">
                                        <label for="example-text-input" class="form-label">Periode</label>
                                        <select name="periode" id="periode" class="form-select select2" aria-label="Default select example">
                                            <option selected="">Selectionner une periode</option>
                                            <option value="P1">05h00-13h00</option>
                                            <option value="P2">13h00-21h00</option>
                                            <option value="P3">21h00-5h00</option>
                                        </select>
                                    </div>
                                </div>




                                <div class="col-md-3">
                                    <div class="md-3">
                                        <label for="example-text-input" class="form-label">Quantite  de ciment consommé</label>
                                        <input type="number" name="ciment" id="ciment" class="form-control " placeholder="quantite en KG"   >
                                    </div>
                                </div>




                            </div>

<br>
                            <br>
                            <br>

                                <div class="row">



                                <div class="col-md-3">
                                    <div class="md-3">
                                        <label for="example-text-input" class="form-label">Categorie</label>
                                        <select name="category_id" id="category_id" class="form-select select2" aria-label="Default select example">
                                            <option selected="">Selectionner une categorie</option>
                                            @foreach($category as $cat)
                                                <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>


                                <div class="col-md-3">
                                    <div class="md-3">
                                        <label for="example-text-input" class="form-label">Nom Produit  </label>
                                        <select name="product_id" id="product_id" class="form-select select2" aria-label="Default select example">
                                            <option selected="">Selectionner un produit</option>

                                        </select>
                                    </div>
                                </div>



                                <div class="col-md-2">
                                    <div class="md-3">
                                        <label for="example-text-input" class="form-label" style="margin-top:43px;">  </label>


                                        <i class="btn btn-secondary btn-rounded waves-effect waves-light fas fa-plus-circle addeventmore"> Add More</i>
                                    </div>
                                </div>





                            </div> <!-- // end row  -->

                        </div> <!-- End card-body -->
                        <!--  ---------------------------------- -->

                        <div class="card-body">
                            <form method="post" action="{{ route('production.store') }}">
                                @csrf
                                <table class="table-sm table-bordered" width="100%" style="border-color: #ddd;">
                                    <thead>
                                    <tr style="background:#e3dddc">
                                        <th>Categorie</th>
                                        <th>Libelle Produit  </th>
                                        <th width="7%">Qte_Planche </th>


                                        <th width="7%">Action</th>

                                    </tr>
                                    </thead>

                                    <tbody id="addRow" class="addRow">

                                    </tbody>

                                    <tbody>

                                    <input type="text" name="discount_amount" id="discount_amount" class="form-control estimated_amount" placeholder="Discount Amount"  style="display: none" >





                                    </tbody>
                                </table><br>








                                <br>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-info" id="storeButton"> Ajouter</button>

                                </div>

                            </form>






                        </div> <!-- End card-body -->







                    </div>
                </div> <!-- end col -->
            </div>



        </div>
    </div>




    <script id="document-template" type="text/x-handlebars-template">

        <tr class="delete_add_more_item" id="delete_add_more_item">
            <input type="hidden" name="date" value="@{{date}}">
            <input type="hidden" name="invoice_no" value="@{{invoice_no}}">
            <input type="hidden" name="periode" value="@{{periode}}">
            <input type="hidden" name="equipe" value="@{{equipe}}">
            <input type="hidden" name="ciment" value="@{{ciment}}">


            <td>
                <input type="hidden" name="category_id[]" value="@{{category_id}}">
                @{{ category_name }}
            </td>

            <td>
                <input type="hidden" name="product_id[]" value="@{{product_id}}">
                @{{ product_name }}
            </td>

            <td>
                <input type="number" min="1" class="form-control selling_qty text-right" name="selling_qty[]" value="">
            </td>




            <td>
                <i class="btn btn-danger btn-sm fas fa-window-close removeeventmore"></i>
            </td>

        </tr>

    </script>












    <script type="text/javascript">
        $(document).ready(function(){
            $(document).on("click",".addeventmore", function(){
                var date = $('#date').val();
                var periode = $('#periode').val();
                var equipe= $('#equipe').val();
                var ciment= $('#ciment').val();
                var invoice_no = $('#invoice_no').val();
                var current_stock_qty  = $('#current_stock_qty').val();
                var current_price  = $('#current_price').val();
                var category_id  = $('#category_id').val();
                var category_name = $('#category_id').find('option:selected').text();
                var product_id = $('#product_id').val();
                var product_name = $('#product_id').find('option:selected').text();


                if(date == ''){
                    $.notify("Date is Required" ,  {globalPosition: 'top right', className:'error' });
                    return false;
                }

                if(category_id == ''){
                    $.notify("Category is Required" ,  {globalPosition: 'top right', className:'error' });
                    return false;
                }
                if(product_id == ''){
                    $.notify("Product Field is Required" ,  {globalPosition: 'top right', className:'error' });
                    return false;
                }


                var source = $("#document-template").html();
                var tamplate = Handlebars.compile(source);
                var data = {
                    date:date,
                   periode:periode,
                    equipe:equipe,
                    ciment:ciment,
                    invoice_no:invoice_no,
                    category_id:category_id,
                    category_name:category_name,
                    current_stock_qty:current_stock_qty,
                    current_price:current_price,
                    product_id:product_id,
                    product_name:product_name

                };
                var html = tamplate(data);
                $("#addRow").append(html);
            });

            $(document).on("click",".removeeventmore",function(event){
                $(this).closest(".delete_add_more_item").remove();
                totalAmountPrice();
            });

            $(document).on('keyup click','.unit_price,.selling_qty', function(){
                var unit_price = $(this).closest("tr").find("input.unit_price").val();
                var qty = $(this).closest("tr").find("input.selling_qty").val();
                var total = unit_price * qty;
                $(this).closest("tr").find("input.selling_price").val(total);
                $('#discount_amount').trigger('keyup');
            });

            $(document).on('keyup','#discount_amount',function(){
                totalAmountPrice();
            });

            // Calculate sum of amout in invoice

            function totalAmountPrice(){
                var sum = 0;
                $(".selling_price").each(function(){
                    var value = $(this).val();
                    if(!isNaN(value) && value.length != 0){
                        sum += parseFloat(value);
                    }
                });

                var discount_amount = parseFloat($('#discount_amount').val());
                if(!isNaN(discount_amount) && discount_amount.length != 0){
                    sum -= parseFloat(discount_amount);
                }

                $('#estimated_amount').val(sum);
            }

        });


    </script>


    <script type="text/javascript">
        $(function(){
            $(document).on('change','#category_id',function(){
                var category_id = $(this).val();
                $.ajax({
                    url:"{{ route('get-product') }}",
                    type: "GET",
                    data:{category_id:category_id},
                    success:function(data){
                        var html = '<option value="">Select Category</option>';
                        $.each(data,function(key,v){
                            html += '<option value=" '+v.id+' "> '+v.name+'</option>';
                        });
                        $('#product_id').html(html);
                    }
                })
            });
        });

    </script>

    <script type="text/javascript">
        $(function(){
            $(document).on('change','#product_id',function(){
                var product_id = $(this).val();
                $.ajax({
                    url:"{{ route('check-product-stock') }}",
                    type: "GET",
                    data:{product_id:product_id},
                    success:function(data){
                        $('#current_stock_qty').val(data);
                    }
                });
            });
        });

    </script>

    <script type="text/javascript">
        $(function(){
            $(document).on('change','#product_id',function(){
                var product_id = $(this).val();
                $.ajax({
                    url:"{{ route('check-product-price') }}",
                    type: "GET",
                    data:{product_id:product_id},
                    success:function(data){
                        $('#current_price').val(data);
                    }
                });
            });
        });

    </script>




    <script type="text/javascript">
        $(document).on('change','#paid_status', function(){
            var paid_status = $(this).val();
            if (paid_status == 'partial_paid') {
                $('.paid_amount').show();
            }else{
                $('.paid_amount').hide();
            }
        });

        $(document).on('change','#customer_id', function(){
            var customer_id = $(this).val();
            if (customer_id == '0') {
                $('.new_customer').show();
            }else{
                $('.new_customer').hide();
            }
        });


    </script>





@endsection
