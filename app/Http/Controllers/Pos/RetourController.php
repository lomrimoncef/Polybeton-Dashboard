<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Invoice;
use App\Models\Payment;
use App\Models\PaymentDetail;
use App\Models\Retour;
use App\Models\RetourDetail;
use Illuminate\Http\Request;
use Auth;
use DB;
class RetourController extends Controller
{

    public function DailyRetourReport(){
        return view('backend.retour.daily_retour_report');
    } // End Method


    public function DailyRetourPdf(Request $request){

        $sdate = date('Y-m-d',strtotime($request->start_date));
        $edate = date('Y-m-d',strtotime($request->end_date));
        $allData = Retour::whereBetween('date',[$sdate,$edate])->get();


        $start_date = date('Y-m-d',strtotime($request->start_date));
        $end_date = date('Y-m-d',strtotime($request->end_date));
        return view('backend.pdf.daily_retour_report_pdf',compact('allData','start_date','end_date'));
    } // End Method



    public function RetourALL(){
        $allData = Retour::orderBy('date','desc')->orderBy('id','desc')->get();
        return view('backend.retour.retour_all',compact('allData'));

    } // End Method






    public function retourAdd()
    {


        $category = Category::all();
        $costomer = Customer::all();
        $retour_data = Retour::orderBy('id', 'desc')->first();
        if ($retour_data == null) {
            $firstReg = '0';
            $retour_no = $firstReg + 1;
        } else {
            $retour_data = Retour::orderBy('id', 'desc')->first()->retour_no;
            $retour_no = $retour_data + 1;
        }
        $date = date('Y-m-d');


        return view('backend.retour.retour_add', compact('retour_no', 'category', 'date', 'costomer'));
    } // End Method


//********************************************************************


    public function RetourStore(Request $request)
    {



        /*else{
        if ($request->paid_amount > $request->estimated_amount) {

           $notification = array(
        'message' => 'Sorry Paid Amount is Maximum the total price',
        'alert-type' => 'error'
    );
    return redirect()->back()->with($notification);

        } */

            $retour = new Retour();
            $retour->retour_no = $request->invoice_no;
            $retour->date = date('Y-m-d', strtotime($request->date));

            $retour->status = '0';
            $retour->created_by = Auth::user()->id;

            DB::transaction(function () use ($request, $retour) {
                if ($retour->save()) {
                    $count_category = count($request->category_id);
                    for ($i = 0; $i < $count_category; $i++) {

                        $retour_details = new RetourDetail();
                        $retour_details->date = date('Y-m-d', strtotime($request->date));
                        $retour_details->retour_id = $retour->id;
                        $retour_details->description = $request->category_id[$i];
                        $retour_details->selling_qty = $request->selling_qty[$i];

                        $retour_details->selling_price = $request->unit_price[$i];
                // dd($request->unit_price[$i]) ;
                        $retour_details->status = '0';
                        $retour_details->save();
                    }

                    if ($request->customer_id == '0') {
                        $customer = new Customer();
                        $customer->name = $request->name;
                        $customer->mobile_no = $request->mobile_no;
                        $customer->email = $request->email;
                        $customer->save();
                        $customer_id = $customer->id;
                    } else {
                        $customer_id = $request->customer_id;
                    }

                    $payment = new Payment();
                    $payment_details = new PaymentDetail();

                    $payment->retour_id = $retour->id;
                    $payment->customer_id = $customer_id;
                    $payment->paid_status = $request->paid_status;
                    $payment->payment_type = $request->mode_paiment;
                    $payment->tva = $request->tva[0];


                    $payment->total_amount_ht=-$request->estimated_amount2;
                    $payment->total_amount = -$request->estimated_amount1;


                    $payment->date_payment = date('Y-m-d',strtotime($request->date));




                    if ($request->paid_status == 'full_paid') {
                        $payment->paid_amount = -$request->estimated_amount1;
                        $payment->due_amount = '0';
                        $payment_details->current_paid_amount = -$request->estimated_amount1;
                    } elseif ($request->paid_status == 'full_due') {
                        $payment->paid_amount = '0';
                        $payment->due_amount = -$request->estimated_amount1;
                        $payment_details->current_paid_amount = '0';
                    } elseif ($request->paid_status == 'partial_paid') {

                        if ($request->paid_amount == null) {

                            $notification = array(
                                'message' => 'Veuillez entrer le paiment ',
                                'alert-type' => 'error'
                            );
                            return redirect()->back()->with($notification);

                        }


                        $payment->paid_amount = -$request->paid_amount;
                        $payment->due_amount = -$request->estimated_amount1 + $request->paid_amount;
                        $payment_details->current_paid_amount = -$request->paid_amount;
                    }
                    $payment->save();

                    $payment_details->retour_id = $retour->id;
                    $payment_details->date = date('Y-m-d', strtotime($request->date));
                    $payment_details->save();
                }

            });

        // end else
        /*}*/

        $notification = array(
            'message' => 'Invoice Data Inserted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('retour.all')->with($notification);
    } // End Method




    public function PrintRetour($id){
        $retour = Retour::with('retour_details')->findOrFail($id);
        return view('backend.pdf.retour_pdf',compact('retour'));

    } // End Method






}
