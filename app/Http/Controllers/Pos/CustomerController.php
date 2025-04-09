<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use App\Models\InvoiceDetail;
use App\Models\Product;
use App\Models\productiondetail;
use App\Models\Retour;
use Illuminate\Http\Request;
use App\Models\Customer;
use Auth;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Image;
use App\Models\Payment;
use App\Models\PaymentDetail;

class CustomerController extends Controller
{
    public function CustomerAll(){

         $customers = Customer::latest()->get();
        return view('backend.customer.customer_all',compact('customers'));

    } // End Method


    public function CustomerAdd(){
     return view('backend.customer.customer_add');
    }    // End Method


    public function CustomerStore(Request $request){



        Customer::insert([
            'name' => $request->name,
            'mobile_no' => $request->mobile_no,
            'email' => $request->email,
            'address' => $request->address,

            'created_by' => Auth::user()->id,
            'created_at' => Carbon::now(),

        ]);

         $notification = array(
            'message' => 'Customer Inserted Successfully', 
            'alert-type' => 'success'
        );

        return redirect()->route('customer.all')->with($notification);

    } // End Method


    public function CustomerEdit($id){

       $customer = Customer::findOrFail($id);
       return view('backend.customer.customer_edit',compact('customer'));

    } // End Method


    public function CustomerUpdate(Request $request){

        $customer_id = $request->id;
        if ($request->file('customer_image')) {

        $image = $request->file('customer_image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension(); // 343434.png
        Image::make($image)->resize(200,200)->save('upload/customer/'.$name_gen);
        $save_url = 'upload/customer/'.$name_gen;

        Customer::findOrFail($customer_id)->update([
            'name' => $request->name,
            'mobile_no' => $request->mobile_no,
            'email' => $request->email,
            'address' => $request->address,
            'customer_image' => $save_url ,
            'updated_by' => Auth::user()->id,
            'updated_at' => Carbon::now(),

        ]);

         $notification = array(
            'message' => 'Customer Updated with Image Successfully', 
            'alert-type' => 'success'
        );

        return redirect()->route('customer.all')->with($notification);
             
        } else{

          Customer::findOrFail($customer_id)->update([
            'name' => $request->name,
            'mobile_no' => $request->mobile_no,
            'email' => $request->email,
            'address' => $request->address, 
            'updated_by' => Auth::user()->id,
            'updated_at' => Carbon::now(),

        ]);

         $notification = array(
            'message' => 'Customer Updated without Image Successfully', 
            'alert-type' => 'success'
        );

        return redirect()->route('customer.all')->with($notification);

        } // end else 

    } // End Method


    public function CustomerDelete($id){

        $customers = Customer::findOrFail($id);
        $img = $customers->customer_image;


        Customer::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Customer Deleted Successfully', 
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    } // End Method


    public function CreditCustomer($id){


        $allData = Payment::where('customer_id',$id)->where('retour_id',null)->get();
        $allData2 = Payment::where('customer_id',$id)->where('invoice_id',null)->get();
        $cus = Customer::where('id',$id)->first();
        //dd($allData);

        return view('backend.customer.customer_credit',compact('allData2','allData',  'cus'));



    } // End Method
//****************************************************************************************************
    public function VenteCustomerReport(){
        return view('backend.customer.daily_vente_customer');
    } // End Method


    public function VenteCustomerPdf(Request $request){
        $sdate = date('Y-m-d',strtotime($request->start_date));
        $edate = date('Y-m-d',strtotime($request->end_date));

        $orders = DB::table('payments')
            ->select('customer_id', DB::raw('SUM(total_amount) as total_sales'))
            ->where('retour_id',null)
            ->whereBetween('date_payment',[$sdate,$edate])
            ->groupBy('customer_id')
            ->get();

//dd($orders );




        return view('backend.pdf.daily_vente_customer_pdf',compact('orders','sdate','edate'));
    } // End Method



    //***************************************************************stat*********************************
    public function Report(){

        $allData = Payment::orderBy('created_at','desc')->orderBy('id','desc')->get();
        $mois=date('F');

        if($mois=="January"){ $mois="Janvier";};
        if($mois=="February"){ $mois="Fevrier";};
        if($mois=="March"){ $mois="Mars";};
        if($mois=="April"){ $mois="Avril";};
        if($mois=="May"){ $mois="Mai";};
        if($mois=="June"){ $mois="Juin";};
        if($mois=="July"){ $mois="Juillet";};
        if($mois=="August"){ $mois="Aout";};
        if($mois=="September"){ $mois="Septembre";};
        if($mois=="October"){ $mois="Octobre";};
        if($mois=="November"){ $mois="Novombre";};
        if($mois=="December"){ $mois="Decembre";};

        $jour=date("l");

        if($jour=="Saturday"){ $jour="Samedis";};
        if($jour=="Sunday"){ $jour="Dimanche";};
        if($jour=="Monday"){ $jour="Lundi";};
        if($jour=="Tuesday"){ $jour="Mardi";};
        if($jour=="Wednesday"){ $jour="Mercredi";};
        if($jour=="Thursday"){ $jour="jeudi";};
        if($jour=="Friday"){ $jour="Vendredi";};


     $F= date('Y-m-d ');


        $invoice1 = Payment::where('retour_id',null)->where('date_payment', '>', Carbon::now()->startOfMonth())->where('date_payment', '<', Carbon::now()->endOfMonth())->sum('total_amount');
//dd($invoice1);
        $invoice2 = Payment::where('retour_id',null)->where('date_payment','like', '%' . $F . '%')->sum('total_amount');

        $retour1 = Payment::where('invoice_id',null)->where('date_payment', '>', Carbon::now()->startOfMonth())->where('date_payment', '<', Carbon::now()->endOfMonth())->sum('total_amount');

        $retour2 = Payment::where('invoice_id',null)->where('date_payment','like', '%' . $F . '%')->sum('total_amount');






//***********************************pie chart stock dispo **********************
        $product = Product::where('quantity','>',0)
            ->orderBy('quantity', 'desc')
            ->get();



        $product1 = Product::where('id','198')->first();
        $product8 = Product::where('id','209')->first();
        $product9 = Product::where('id','269')->first();
        $product10 = Product::where('id','253')->first();
        $product11 = Product::where('id','111')->first();
//********************************************************************************

//*********************************produit vendu / mois**************************************
        $vente1 = InvoiceDetail::where('product_id',198)->where('created_at', '>', Carbon::now()->startOfMonth())->where('created_at', '<', Carbon::now()->endOfMonth())->sum('selling_qty');

        $vente8 = InvoiceDetail::where('product_id',209)->where('created_at', '>', Carbon::now()->startOfMonth())->where('created_at', '<', Carbon::now()->endOfMonth())->sum('selling_qty');
        $vente9 = InvoiceDetail::where('product_id',269)->where('created_at', '>', Carbon::now()->startOfMonth())->where('created_at', '<', Carbon::now()->endOfMonth())->sum('selling_qty');
        $vente10 = InvoiceDetail::where('product_id',253)->where('created_at', '>', Carbon::now()->startOfMonth())->where('created_at', '<', Carbon::now()->endOfMonth())->sum('selling_qty');
        $vente11 = InvoiceDetail::where('product_id',111)->where('created_at', '>', Carbon::now()->startOfMonth())->where('created_at', '<', Carbon::now()->endOfMonth())->sum('selling_qty');

//*****************************************************************************************



        //*********************************production / mois**************************************
        $prod1 = productiondetail::where('product_id',198)->where('created_at', '>', Carbon::now()->startOfMonth())->where('created_at', '<', Carbon::now()->endOfMonth())->sum('planche_nbr');
//dd($prod1);
        $prod8 = productiondetail::where('product_id',209)->where('created_at', '>', Carbon::now()->startOfMonth())->where('created_at', '<', Carbon::now()->endOfMonth())->sum('planche_nbr');
        $prod9 = productiondetail::where('product_id',269)->where('created_at', '>', Carbon::now()->startOfMonth())->where('created_at', '<', Carbon::now()->endOfMonth())->sum('planche_nbr');
        $prod10 = productiondetail::where('product_id',253)->where('created_at', '>', Carbon::now()->startOfMonth())->where('created_at', '<', Carbon::now()->endOfMonth())->sum('planche_nbr');
        $prod11 = productiondetail::where('product_id',111)->where('created_at', '>', Carbon::now()->startOfMonth())->where('created_at', '<', Carbon::now()->endOfMonth())->sum('planche_nbr');

//*****************************************************************************************








        return view('admin.index',compact('allData','invoice1','invoice2','mois','retour1','retour2','jour','product','product1','product8','product9','product10','product11','vente1','vente8','vente9','vente10','vente11','prod1','prod8','prod9','prod10','prod11'));

    } // End Method




    //***********************************************************************************************

    public function CreditCustomerPrintPdf(){

        $allData = Payment::whereIn('paid_status',['full_due','partial_paid'])->get();
        return view('backend.pdf.customer_credit_pdf',compact('allData'));

    }// End Method



    public function CustomerEditInvoice($invoice_id){

        $payment = Payment::where('invoice_id',$invoice_id)->first();
        return view('backend.customer.edit_customer_invoice',compact('payment'));

    }// End Method


    public function CustomerUpdateInvoice(Request $request,$invoice_id){

        if ($request->new_paid_amount < $request->paid_amount) {

            $notification = array(
            'message' => 'Sorry You Paid Maximum Value', 
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification); 
        } else{
            $payment = Payment::where('invoice_id',$invoice_id)->first();
            $payment_details = new PaymentDetail();
            $payment->paid_status = $request->paid_status;

            if ($request->paid_status == 'full_paid') {
                 $payment->paid_amount = Payment::where('invoice_id',$invoice_id)->first()['paid_amount']+$request->new_paid_amount;
                 $payment->due_amount = '0';
                 $payment_details->current_paid_amount = $request->new_paid_amount;

            } elseif ($request->paid_status == 'partial_paid') {
                $payment->paid_amount = Payment::where('invoice_id',$invoice_id)->first()['paid_amount']+$request->paid_amount;
                $payment->due_amount = Payment::where('invoice_id',$invoice_id)->first()['due_amount']-$request->paid_amount;
                $payment_details->current_paid_amount = $request->paid_amount;

            }

            $payment->save();
            $payment_details->invoice_id = $invoice_id;
            $payment_details->date = date('Y-m-d',strtotime($request->date));
            $payment_details->updated_by = Auth::user()->id;
            $payment_details->save();

              $notification = array(
            'message' => 'Invoice Update Successfully', 
            'alert-type' => 'success'
        );
        return redirect()->route('credit.customer')->with($notification); 


        }

    }// End Method



    public function CustomerInvoiceDetails($invoice_id){

        $payment = Payment::where('invoice_id',$invoice_id)->first();
        return view('backend.pdf.invoice_details_pdf',compact('payment'));

    }// End Method

    public function ClientInvoiceDetails($invoice_id){
        $invoice = Invoice::where('id',$invoice_id)->first();

        $payment = Payment::where('invoice_id',$invoice_id)->first();

        $client = Customer::where('id',$payment->customer_id)->first();



        return view('backend.customer.details_bl',compact('payment','invoice','client'));

    }// End Method



    public function ClientRetourDetails($retour_id){
        $retour = Retour::where('id',$retour_id)->first();

        $payment = Payment::where('retour_id',$retour_id)->first();

        $client = Customer::where('id',$payment->customer_id)->first();



        return view('backend.customer.details_rc',compact('payment','retour','client'));

    }// End Method



    public function PaidCustomer(){
        $allData = Payment::where('paid_status','!=','full_due')->get();
        return view('backend.customer.customer_paid',compact('allData'));
    }// End Method



    public function FicheCustomer(){


        $customers = DB::table('payments')
            ->select('customer_id')
            ->groupBy('customer_id')
            ->get();



      //  $customers = Invoice::orderBy('date','desc')->orderBy('id','desc')->where('status','1')->get();

        return view('backend.customer.fiche_client',compact('customers'));

     // End Method
    }// End Method



    public function PaidCustomerPrintPdf(){

        $allData = Payment::where('paid_status','!=','full_due')->get();
        return view('backend.pdf.customer_paid_pdf',compact('allData'));
    }// End Method


    public function CustomerWiseReport(){

        $customers = Customer::all();
        return view('backend.customer.customer_wise_report',compact('customers'));

    }// End Method


    public function CustomerWiseCreditReport(Request $request){

         $allData = Payment::where('customer_id',$request->customer_id)->whereIn('paid_status',['full_due','partial_paid'])->get();
        return view('backend.pdf.customer_wise_credit_pdf',compact('allData'));
    }// End Method


    public function CustomerWisePaidReport(Request $request){

         $allData = Payment::where('customer_id',$request->customer_id)->where('paid_status','!=','full_due')->get();
        return view('backend.pdf.customer_wise_paid_pdf',compact('allData'));
    }// End Method



}
 