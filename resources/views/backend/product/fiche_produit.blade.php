@extends('admin.admin_master')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <div class="page-content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-8">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Fiche Produit  </h4><br><br>






                                <form method="post" action="{{ route('product.fiche') }}" id="myForm" enctype="multipart/form-data" >
                                    @csrf


                                    <div class="row">
                                <div class="col-md-5">
                                    <div class="md-3">
                                        <label for="example-text-input" class="form-label">Libelle Categorie </label>
                                        <select name="category_id" id="category_id" class="form-select select2" aria-label="Default select example">
                                            <option selected="">Selectionner une Categorie</option>
                                            @foreach($category as $cat)
                                                <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <div class="md-3">
                                        <label for="example-text-input" class="form-label"> Nom Produit  </label>
                                        <select name="product_id" id="product_id" class="form-select select2" aria-label="Default select example">
                                            <option selected="">Selectionner un Produit</option>

                                        </select>
                                    </div>
                                </div>




                                <div class="col-md-2">
                                    <br>


                                        <input type="submit" class="btn btn-info waves-effect waves-light" value="Afficher">

                                </div>


                                    </div> <!-- // end row  -->


</form>




                        </div> <!-- End card-body -->
                        <!--  ---------------------------------- -->









                    </div>
                </div> <!-- end col -->
            </div>



        </div>
    </div>




    <script id="document-template" type="text/x-handlebars-template">

        <tr class="delete_add_more_item" id="delete_add_more_item">
            <input type="hidden" name="date" value="@{{date}}">
            <input type="hidden" name="invoice_no" value="@{{invoice_no}}">


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
                <input type="number" class="form-control unit_price text-right" name="unit_price" value="@{{current_price}}" disabled>
            </td>



            <td>
                <input type="number" class="form-control selling_price text-right" name="selling_price[]" value="0" readonly>
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
