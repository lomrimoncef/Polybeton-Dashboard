<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Invoice;
use App\Models\Product;
use App\Models\production;
use App\Models\productiondetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use function League\Flysystem\deleteDirectory;

class ProductionController extends Controller
{

    public function DailyEquipeReport(){
        return view('backend.production.daily_equipe_report');
    } // End Method

    public function DailyEquipePdf(Request $request){

        $sdate = date('Y-m-d',strtotime($request->start_date));
        $edate = date('Y-m-d',strtotime($request->end_date));
        $allData = production::whereBetween('date',[$sdate,$edate])->where('equipe',$request->equipe)->orderBy('date','desc')->get();

//dd($allData);
        $start_date = date('Y-m-d',strtotime($request->start_date));
        $end_date = date('Y-m-d',strtotime($request->end_date));
        return view('backend.pdf.daily_equipe_report_pdf',compact('allData','start_date','end_date'));
    } // End Method





    public function DailyProductionReport(){
        return view('backend.production.daily_production_report');
    } // End Method

    public function DailyProductionPdf(Request $request){
        $start_date = date('Y-m-d',strtotime($request->start_date));
        $end_date = date('Y-m-d',strtotime($request->end_date));

        $allData = DB::table('productiondetails')
            ->select('product_id', DB::raw('SUM(planche_nbr) as total_sales'))
            ->whereBetween('date',[$start_date,$end_date])
            ->groupBy('product_id')
            ->orderBy('total_sales','desc')
            ->get();


        return view('backend.pdf.daily_production_report_pdf',compact('allData','start_date','end_date'));
    } // End Method















    public function productionAll(){
        $allData = production::orderBy('date','desc')->orderBy('id','desc')->get();
        return view('backend.production.production_all',compact('allData'));

    } // End Method



    public function productionDetails($production_id){
        $production = production::where('id',$production_id)->first();





        return view('backend.production.production_detail',compact('production'));

    }// End Method





    public function productionAdd(){


        $category = Category::all();
        $costomer = Customer::all();
        $invoice_data = Invoice::orderBy('id','desc')->first();
        if ($invoice_data == null) {
            $firstReg = '0';
            $invoice_no = $firstReg+1;
        }else{
            $invoice_data = Invoice::orderBy('id','desc')->first()->invoice_no;
            $invoice_no = $invoice_data+1;
        }
        $date = date('Y-m-d');
        return view('backend.production.production_add',compact('invoice_no','category','date','costomer'));

    } // End Method


//************************************************** InvoiceStore    *******************************************************




public function productionStore(Request $request){

    if ($request->category_id == null) {

        $notification = array(
            'message' => 'Sorry You do not select any item',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);

    }



    /*else{
        if ($request->paid_amount > $request->estimated_amount) {

           $notification = array(
        'message' => 'Sorry Paid Amount is Maximum the total price',
        'alert-type' => 'error'
    );
    return redirect()->back()->with($notification);

        } */else {

        $production = new production();

        $production->date = date('Y-m-d',strtotime($request->date));
        $production->periode = $request->periode;
        $production->equipe = $request->equipe;
        $production->qte_ciment = $request->ciment;
        $production->created_by = Auth::user()->id;

        DB::transaction(function() use($request,$production){
            if ($production->save()) {
                $count_category = count($request->category_id);
                for ($i=0; $i < $count_category ; $i++) {

                    $production_details = new productiondetail();
                    $production_details->date = date('Y-m-d',strtotime($request->date));
                    $production_details->production_id = $production->id;
                    $production_details->category_id = $request->category_id[$i];
                    $production_details->product_id = $request->product_id[$i];
                    $production_details->equipe = $request->equipe;

                    $prod = Product::find($request->product_id[$i]);

                    $prod->quantity =  $prod->quantity +$request->selling_qty[$i]/$prod->unite;
                    $prod->quantity_produite =  $prod->quantity_produite +$request->selling_qty[$i]/$prod->unite;


                    $prod->save();

                    $production_details->planche_nbr = $request->selling_qty[$i];


                    $production_details->save();
                }




            }

        });

    } // end else
    /*}*/

    $notification = array(
        'message' => 'Invoice Data Inserted Successfully',
        'alert-type' => 'success'
    );
    return redirect()->route('production.all')->with($notification);
} // End Method





//*************************************************************************************************






}