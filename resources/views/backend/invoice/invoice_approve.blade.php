@extends('admin.admin_master')
@section('admin')


 <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0">Validation Bon de Livraison</h4>

                                     

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->
    @php
    $payment = App\Models\Payment::where('invoice_id',$invoice->id)->first();
    @endphp                    
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
<h4>BL: #{{ $invoice->invoice_no }} - {{ date('d-m-Y',strtotime($invoice->date)) }} </h4>
    <a href="{{ route('invoice.pending.list') }}" class="btn btn-dark btn-rounded waves-effect waves-light" style="float:right;"><i class="fa fa-list"> Liste de validation des BL </i></a> <br>  <br>

     <table class="table table-dark" width="100%">
        <tbody>
            <tr>
                <td><p> Information Client </p></td>
                <td><p> Nom: <strong> {{ $payment['customer']['name']  }} </strong> </p></td>
                <td><p> Mobile: <strong> {{ $payment['customer']['mobile_no']  }} </strong> </p></td>
               <td><p> Email: <strong> {{ $payment['customer']['email']  }} </strong> </p></td>                
            </tr>

             <tr>
             <td></td>
              <td colspan="3"><p> Description : <strong> {{ $invoice->description  }} </strong> </p></td>
             </tr>
        </tbody>
         
     </table>    


     <form method="post" action="{{ route('approval.store',$invoice->id) }}">
      @csrf         
         <table border="1" class="table table-dark" width="100%">
            <thead>
                <tr>
                    <th class="text-center">#</th>
                    <th class="text-center">Categorie</th>
                    <th class="text-center">Libelle</th>
                    <th class="text-center" style="background-color: #34ebc3"> Stock Disponible</th>
                    <th class="text-center">Quantite</th>
                    <th class="text-center">Prix Unitaire </th>
                    <th class="text-center">Total </th>
                </tr>
                
            </thead>
    <tbody>
        @php
        $total_sum = '0';
        @endphp
        @foreach($invoice['invoice_details'] as $key => $details)
        <tr>
            
            <input type="hidden" name="category_id[]" value="{{ $details->category_id }}">
            <input type="hidden" name="product_id[]" value="{{ $details->product_id }}">
            <input type="hidden" name="selling_qty[{{$details->id}}]" value="{{ $details->selling_qty }}">

            <td class="text-center">{{ $key+1 }}</td>
            <td class="text-center">{{ $details['category']['name'] }}</td>
            <td class="text-center">{{ $details['product']['name'] }}</td>
            <td class="text-center" style="background-color: #34ebc3">{{ $details['product']['quantity'] }}</td>
            <td class="text-center">{{ $details->selling_qty }}</td>
            <td class="text-center">{{$details->pu_vente }}</td>
            <td class="text-center">{{ $details->selling_price }}</td>
        </tr>
        @php
        $total_sum += $details->selling_price;
        @endphp
        @endforeach
        <tr>
            <td  colspan="6" style="background-color: #456f87"> </td>
             <td style="background-color: #456f87" class="text-center" >  </td>
        </tr>

         <tr>
            <td colspan="6"> Montant Paye </td>
             <td class="text-center">{{ $payment->paid_amount }} </td>
        </tr>

         <tr>
            <td colspan="6"> Reste a Payer </td>
             <td class="text-center"> {{ $payment->due_amount }} </td>
        </tr>

        <tr>
            <td colspan="6"> Total HT </td>
            <td class="text-center" >{{ $payment->total_amount_ht }}</td>
        </tr>

        <tr>
            <td colspan="6"> TVA </td>
            <td class="text-center" >{{ $payment->total_amount_ht*0.19 }}</td>
        </tr>

        <tr>
            <td colspan="6"> Timbre </td>
            <td class="text-center" >{{  $payment->timbre }}</td>
        </tr>
        <tr>
            <td colspan="6"> Total TTC </td>
             <td class="text-center" >{{ $payment->total_amount }}</td>
        </tr>
    </tbody>
             
         </table>
 
         <button type="submit" class="btn btn-info">Ajouter </button>

     </form> 

                    
        
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->
        
                     
                        
                    </div> <!-- container-fluid -->
                </div>
 

@endsection