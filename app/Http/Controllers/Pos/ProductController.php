<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use App\Models\InvoiceDetail;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Supplier;
use App\Models\Unit;
use Auth;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;


class ProductController extends Controller
{

    public function ProductAll(){

        $product = Product::query()
            ->orderBy('quantity', 'desc')
            ->get();
        return view('backend.product.product_all',compact('product'));

    } // End Method 


    public function ProductAdd(){


        $category = Category::all();

        return view('backend.product.product_add',compact('category'));
    } // End Method 


    public function ProductStore(Request $request){



        $file= $request->file('product_image');
        $filename= date('YmdHi').$file->getClientOriginalName();
        $file-> move(public_path('upload/product/'), $filename);






        $save_url = 'upload/product/'.$filename;

        Product::insert([

            'name' => $request->name,
            'unite' => $request->unite,
            'prix_unitaire' => $request->prix,
            'product_image' => $save_url ,
            'category_id' => $request->category_id,
            'quantity' => '0',
            'created_by' => Auth::user()->id,
            'created_at' => Carbon::now(), 
        ]);

        $notification = array(
            'message' => 'Product Inserted Successfully', 
            'alert-type' => 'success'
        );

        return redirect()->route('product.all')->with($notification); 

    } // End Method 



    public function ProductEdit($id){


        $category = Category::all();

        $product = Product::findOrFail($id);
        return view('backend.product.product_edit',compact('product','category'));
    } // End Method 



    public function ProductUpdate(Request $request){

        $product_id = $request->id;


        $data = Product::find($product_id);
        $data->name = $request->name;
        $data->category_id = $request->category_id;
        $data->updated_by = Auth::user()->id;
        $data->updated_at = Carbon::now();
        $data->unite =  $request->unite;
        $data->prix_unitaire =  $request->prix;

            if ($request->file('product_image')) {
                $file = $request->file('product_image');

                $filename = date('YmdHi').$file->getClientOriginalName();
                $file->move(public_path('upload/product/'),$filename);
                $data->product_image='upload/product/'.$filename;
            }

        $data->save();

        $notification = array(
            'message' => 'Product Updated Successfully',
            'alert-type' => 'success'
        );
            return redirect()->route('product.all')->with($notification);











    } // End Method 


    public function ProductDelete($id){
       
       Product::findOrFail($id)->delete();
            $notification = array(
            'message' => 'Product Deleted Successfully', 
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification); 

    } // End Method 

    public function FicheProduit(){

        $category = Category::all();
        $produit = Product::all();


        return view('backend.product.fiche_produit',compact('category','produit'));

        // End Method
    }// End Method

    public function Productfiche(Request $request){

        $produit = Product::where('id',$request->product_id)->first();
        $fiche = InvoiceDetail::where('product_id',$request->product_id)->get();


        $fiche2= DB::table('invoices')
            ->select('invoices.id','invoices.invoice_no','invoices.date','invoice_details.selling_qty','invoice_details.selling_price')
            ->join('invoice_details','invoices.id','=','invoice_details.id')
            ->where('invoice_details.product_id' ,$request->product_id)
            ->get();
        return view('backend.product.product_fiche',compact('fiche','produit'));

    } // End Method


    public function StockReport(){


        $produit = Product::orderby('quantity','desc')->get();


        return view('backend.product.stock_report',compact('produit'));
    } // End Method




    public function DailyProductReport(){
        return view('backend.product.daily_product_report');
    } // End Method


    public function DailyProductPdf(Request $request){
        $sdate = date('Y-m-d',strtotime($request->start_date));
        $edate = date('Y-m-d',strtotime($request->end_date));

        $orders = DB::table('invoice_details')
            ->select('product_id', DB::raw('SUM(selling_qty) as total_sales'))
            ->whereBetween('date',[$sdate,$edate])
            ->groupBy('product_id')
            ->get();

//




        return view('backend.pdf.daily_product_report_pdf',compact('orders','sdate','edate'));
    } // End Method








}
 