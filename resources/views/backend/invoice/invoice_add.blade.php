@extends('admin.admin_master')
@section('admin')
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="page-content">
<div class="container-fluid">

<div class="row">
<div class="col-12">
    <div class="card">
        <div class="card-body"> 

            <h4 class="card-title">Ajouter un Bon_Livraison  </h4><br><br>
             

    <div class="row">

         <div class="col-md-1">
            <div class="md-3">
                <label for="example-text-input" class="form-label">BL/N°</label>
                 <input class="form-control example-date-input" name="invoice_no" type="text" value="{{ $invoice_no }}"  id="invoice_no" readonly style="background-color:#ddd" >
            </div>
        </div>


        <div class="col-md-2">
            <div class="md-3">
                <label for="example-text-input" class="form-label">Date_BL</label>
                 <input class="form-control example-date-input" value="{{ $date }}" name="date" type="date"  id="date">
            </div>
        </div>
 

       <div class="col-md-3">
            <div class="md-3">
                <label for="example-text-input" class="form-label">Categorie </label>
                <select name="category_id" id="category_id" class="form-select select2" aria-label="Default select example">
                <option selected="">Open this select menu</option>
                  @foreach($category as $cat)
                <option value="{{ $cat->id }}">{{ $cat->name }}</option>
               @endforeach
                </select>
            </div>
        </div>


         <div class="col-md-3">
            <div class="md-3">
                <label for="example-text-input" class="form-label">Libelle </label>
                <select name="product_id" id="product_id" class="form-select select2" aria-label="Default select example">
                <option selected="">Open this select menu</option>
               
                </select>
            </div>
        </div>


           <div class="col-md-1">
            <div class="md-3">
                <label for="example-text-input" class="form-label">Stock (M²/ML/U)</label>
                 <input class="form-control example-date-input" name="current_stock_qty" type="text"  id="current_stock_qty" readonly style="background-color:#ddd" >
            </div>
        </div>
        <div class="col-md-1">
            <div class="md-3">
                <label for="example-text-input" class="form-label">Prix Unitaire</label>
                <input  step=any class="form-control example-date-input" name="current_price" type="number"  id="current_price"   >
            </div>
        </div>

<div class="col-md-2">
    <div class="md-3">
        <label for="example-text-input" class="form-label" style="margin-top:43px;">  </label>
        

        <i class="btn btn-secondary btn-rounded waves-effect waves-light fas fa-plus-circle addeventmore"> Ajouter</i>
    </div>
</div>





    </div> <!-- // end row  --> 
           
        </div> <!-- End card-body -->
<!--  ---------------------------------- -->

        <div class="card-body">
        <form method="post" action="{{ route('invoice.store') }}">
            @csrf
            <table class="table-sm table-bordered" width="100%" style="border-color: #ddd;">
                <thead>
                    <tr style="background:#e3dddc" >
                        <th>Categorie</th>
                        <th>Libelle </th>
                        <th width="7%">Qte </th>
                        <th width="10%">Prix Unitaire </th>
                        <th width="10%">TVA</th>
                        <th width="15%" >Prix Total_HT </th>
                        <th width="15%">Prix Total_TTC </th>
                        <th width="7%">Action</th>

                    </tr>
                </thead>

                <tbody id="addRow" class="addRow">
                    
                </tbody>

                <tbody>

                <input type="text" name="discount_amount1" id="discount_amount1" class="form-control estimated_amount1" placeholder="Discount Amount"  style="display: none" >
                <input type="text" name="discount_amount2" id="discount_amount2" class="form-control estimated_amount2" placeholder="Discount Amount"  style="display: none" >



                <tr>
                    <td></td>
                    <td></td>
                    <td colspan="4" >  Total_HT</td>
                    <td>
                        <input type="text" name="estimated_amount2" value="0" id="estimated_amount2" class="form-control estimated_amount2" readonly style="background-color: #ddd;" >
                    </td>
                    <td></td>
                </tr>

                <tr>
                    <td></td>
                    <td></td>
                    <td colspan="4" >  Total_TTC</td>
                    <td>
                        <input type="text" name="estimated_amount1" value="0" id="estimated_amount1" class="form-control estimated_amount1" readonly style="background-color: #ddd;" >
                    </td>
                    <td></td>
                </tr>

                </tbody>                
            </table><br>


            <div class="form-row">
                <div class="form-group col-md-12">
                    <textarea name="description" class="form-control" id="description" placeholder="Write Description Here"></textarea>
                </div>
            </div><br>

            <div class="row">

                <div class="form-group col-md-3">
                    <label> Mode de Paiment </label>
                    <select name="mode_paiment" id="mode_paiment" class="form-select">
                        <option value="">Mode de Paiment </option>
                        <option value="Cheque">Cheque </option>
                        <option value="Espece">Espece </option>
                        <option value="Cheque_Bancaire">Cheque Bancaire </option>
                        <option value="Virement">Virement </option>
                        <option value="Fictif">Fictif </option>
                        <option value="Cash">Cash </option>

                    </select>

<br>

                    <div class="form-check form-switch mb-3" dir="ltr">
                        <input type="checkbox" class="form-check-input" name="Timbre" id="Timbre" >
                        <label class="form-check-label" for="customSwitch1">Timbre </label>
                    </div>

                </div>













                <div class="form-group col-md-3">
                    <label>  Status de Paiement </label>
                    <select name="paid_status" id="paid_status" class="form-select">
                        <option value="">Select Status </option>
                        <option value="full_paid">Full Paid </option>
                        <option value="full_due">Full Due </option>
                         <option value="partial_paid">Partial Paid </option>
                        <option value="Ristourne">Ristourne </option>
                    </select>
        <input type="number" name="paid_amount" class="form-control paid_amount" placeholder="Enter Paid Amount" style="">
                </div>


            <div class="form-group col-md-3">
                <label> Nom Client  </label>
                    <select name="customer_id" id="customer_id" class="form-select select2">
                        <option value="">Selectionner un Client  </option>
                        @foreach($costomer as $cust)
                        <option value="{{ $cust->id }}">{{ $cust->name }} - {{ $cust->mobile_no }}</option>
                        @endforeach

                    </select>
            </div> 
            </div> <!-- // end row --> <br>

<!-- Hide Add Customer Form -->
<div class="row new_customer" style="display:none">
    <div class="form-group col-md-4">
        <input type="text" name="name" id="name" class="form-control" placeholder="Write Customer Name">
    </div>

    <div class="form-group col-md-4">
        <input type="text" name="mobile_no" id="mobile_no" class="form-control" placeholder="Write Customer Mobile No">
    </div>

    <div class="form-group col-md-4">
        <input type="email" name="email" id="email" class="form-control" placeholder="Write Customer Email">
    </div>
</div>
<!-- End Hide Add Customer Form -->

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
        
   
    <td>
        <input type="hidden" name="category_id[]" value="@{{category_id}}">
        @{{ category_name }}
    </td>

     <td>
        <input type="hidden" name="product_id[]" value="@{{product_id}}">
        @{{ product_name }}
    </td>

     <td>
        <input type="number" step=any min="1" class="form-control selling_qty text-right" name="selling_qty[]" value="">
    </td>

    <td>
        <input type="number" step=any class="form-control unit_price text-right" name="unit_price[]" value="@{{current_price}}"  readonly style="background-color:#ddd" >
    </td>

    <td>

        <input type="number" min="1" class="form-control tva text-right" name="tva[]" value="">

    </td>

    <td>
        <input type="number" class="form-control selling_price_ht text-right" name="selling_price_ht[]" value="0" readonly>
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

        $(document).on('keyup click','.unit_price,.selling_qty','.tva', function(){
            var unit_price = $(this).closest("tr").find("input.unit_price").val();
            var qty = $(this).closest("tr").find("input.selling_qty").val();
            var tva = $(this).closest("tr").find("input.tva").val();
            var total_ht = (unit_price * qty);
            var total_ttc = (unit_price * qty)+(unit_price * qty)*(tva/100);
            $(this).closest("tr").find("input.selling_price_ht").val(total_ht);
            $(this).closest("tr").find("input.selling_price").val(total_ttc);

            $(this).closest("tr").find("input.selling_price").val(total_ttc);
            $('#discount_amount1').trigger('keyup');
            $(this).closest("tr").find("input.selling_price_ht").val(total_ht);
            $('#discount_amount2').trigger('keyup');
        });

        $(document).on('keyup','#discount_amount1',function(){
            totalAmountPrice1();
        });

        $(document).on('keyup','#discount_amount2',function(){
            totalAmountPrice2();
        });

        // Calculate sum of amout in invoice 

        function totalAmountPrice1(){
            var sum = 0;
            $(".selling_price").each(function(){
                var value = $(this).val();
                if(!isNaN(value) && value.length != 0){
                    sum += parseFloat(value);
                }
            });

            var discount_amount = parseFloat($('#discount_amount1').val());
            if(!isNaN(discount_amount) && discount_amount.length != 0){
                sum -= parseFloat(discount_amount);
            }

            $('#estimated_amount1').val(sum);
        }

        function totalAmountPrice2(){
            var sum = 0;
            $(".selling_price_ht").each(function(){
                var value = $(this).val();
                if(!isNaN(value) && value.length != 0){
                    sum += parseFloat(value);
                }
            });

            var discount_amount = parseFloat($('#discount_amount2').val());
            if(!isNaN(discount_amount) && discount_amount.length != 0){
                sum -= parseFloat(discount_amount);
            }

            $('#estimated_amount2').val(sum);
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
