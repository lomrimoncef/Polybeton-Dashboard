<?php

use App\Http\Controllers\Pos\ProductionController;
use App\Http\Controllers\Pos\RetourController;
use App\Models\Retour;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Pos\SupplierController;
use App\Http\Controllers\Pos\CustomerController;
use App\Http\Controllers\Pos\UnitController;
use App\Http\Controllers\Pos\CategoryController;
use App\Http\Controllers\Pos\ProductController;
use App\Http\Controllers\Pos\PurchaseController;
use App\Http\Controllers\Pos\DefaultController;
use App\Http\Controllers\Pos\InvoiceController;
use App\Http\Controllers\Pos\StockController;

Route::get('/', function () {
    return view('auth.login');
})->middleware(['auth'])->name('dashboard');

Route::get('/dashboard', function () {
    return view('admin.admin_master');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';


Route::middleware('auth')->group(function(){



    // Admin All Route
    Route::controller(AdminController::class)->group(function () {
        Route::get('/admin/logout', 'destroy')->name('admin.logout');
        Route::get('/admin/profile', 'Profile')->name('admin.profile');
        Route::get('/edit/profile', 'EditProfile')->name('edit.profile');
        Route::post('/store/profile', 'StoreProfile')->name('store.profile');

        Route::get('/change/password', 'ChangePassword')->name('change.password');
        Route::post('/update/password', 'UpdatePassword')->name('update.password');

    });





// Customer All Route
    Route::controller(CustomerController::class)->group(function () {
        Route::get('/customer/all', 'CustomerAll')->name('customer.all');
        Route::get('/customer/add', 'CustomerAdd')->name('customer.add');
        Route::post('/customer/store', 'CustomerStore')->name('customer.store');
        Route::get('/customer/edit/{id}', 'CustomerEdit')->name('customer.edit');
        Route::post('/customer/update', 'CustomerUpdate')->name('customer.update');
        Route::get('/customer/delete/{id}', 'CustomerDelete')->name('customer.delete');

        Route::get('/credit/customer/{id}', 'CreditCustomer')->name('credit.customer');
        Route::get('/credit/customer/print/pdf', 'CreditCustomerPrintPdf')->name('credit.customer.print.pdf');

        Route::get('/customer/edit/invoice/{invoice_id}', 'CustomerEditInvoice')->name('customer.edit.invoice');
        Route::post('/customer/update/invoice/{invoice_id}', 'CustomerUpdateInvoice')->name('customer.update.invoice');

        Route::get('/customer/invoice/details/{invoice_id}', 'CustomerInvoiceDetails')->name('customer.invoice.details.pdf');

        Route::get('/paid/customer', 'PaidCustomer')->name('paid.customer');
        Route::get('/fiche/customer', 'FicheCustomer')->name('fiche.customer');
        Route::get('/paid/customer/print/pdf', 'PaidCustomerPrintPdf')->name('paid.customer.print.pdf');

        Route::get('/customer/wise/report', 'CustomerWiseReport')->name('customer.wise.report');
        Route::get('/customer/wise/credit/report', 'CustomerWiseCreditReport')->name('customer.wise.credit.report');
        Route::get('/customer/wise/paid/report', 'CustomerWisePaidReport')->name('customer.wise.paid.report');
        Route::get('/client/invoice/details/{invoice_id}', 'ClientInvoiceDetails')->name('customer.details_bl');
        Route::get('/client/retour/details/{retour_id}', 'ClientRetourDetails')->name('customer.details_rc');


        Route::get('/vente/customer', 'VenteCustomerReport')->name('vente.customer');
        Route::get('/daily/vente_customer/', 'VenteCustomerPdf')->name('daily.vente_customer');



        Route::get('/dashboard', 'Report')->name('dashboard');



    });



    // Retour All Route
    Route::controller(RetourController::class)->group(function () {
        Route::get('/retour/all', 'RetourALL')->name('retour.all');
        Route::get('/retour/add', 'retourAdd')->name('retour.add');
        Route::post('/retour/store', 'RetourStore')->name('ret.store');
        Route::get('/print/retour/{id}', 'PrintRetour')->name('print.retour');
        Route::get('/daily/retour/report', 'DailyRetourReport')->name('daily.retour.report');
        Route::get('/daily/retour/pdf', 'DailyRetourPdf')->name('daily.retour.pdf');
    });









// Category All Route
    Route::controller(CategoryController::class)->group(function () {
        Route::get('/category/all', 'CategoryAll')->name('category.all');
        Route::get('/category/add', 'CategoryAdd')->name('category.add');
        Route::post('/category/store', 'CategoryStore')->name('category.store');
        Route::get('/category/edit/{id}', 'CategoryEdit')->name('category.edit');
        Route::post('/category/update', 'CategoryUpdate')->name('category.update');
        Route::get('/category/delete/{id}', 'CategoryDelete')->name('category.delete');

    });


// Product All Route
    Route::controller(ProductController::class)->group(function () {
        Route::get('/product/all', 'ProductAll')->name('product.all');
        Route::get('/product/add', 'ProductAdd')->name('product.add');
        Route::post('/product/store', 'ProductStore')->name('product.store');
        Route::get('/product/edit/{id}', 'ProductEdit')->name('product.edit');
        Route::post('/product/update', 'ProductUpdate')->name('product.update');
        Route::get('/product/delete/{id}', 'ProductDelete')->name('product.delete');
        Route::get('/fiche/produit', 'FicheProduit')->name('fiche.produit');
        Route::post('/product/fiche', 'Productfiche')->name('product.fiche');
        Route::get('/daily/product/report', 'DailyProductReport')->name('daily.product.report');
        Route::get('/daily/product/pdf', 'DailyProductPdf')->name('daily.product.pdf');

        Route::get('/stock/report', 'StockReport')->name('stock.report');
    });






// Invoice All Route
    Route::controller(InvoiceController::class)->group(function () {
        Route::get('/invoice/all', 'InvoiceAll')->name('invoice.all');
        Route::get('/invoice/add', 'invoiceAdd')->name('invoice.add');
        Route::post('/invoice/store', 'InvoiceStore')->name('invoice.store');

        Route::get('/invoice/pending/list', 'PendingList')->name('invoice.pending.list');
        Route::get('/invoice/delete/{id}', 'InvoiceDelete')->name('invoice.delete');
        Route::get('/invoice/approve/{id}', 'InvoiceApprove')->name('invoice.approve');

        Route::post('/approval/store/{id}', 'ApprovalStore')->name('approval.store');
        Route::get('/print/invoice/list', 'PrintInvoiceList')->name('print.invoice.list');
        Route::get('/print/invoice/{id}', 'PrintInvoice')->name('print.invoice');

        Route::get('/daily/invoice/report', 'DailyInvoiceReport')->name('daily.invoice.report');
        Route::get('/daily/invoice/pdf', 'DailyInvoicePdf')->name('daily.invoice.pdf');


    });





    // Production All Route
    Route::controller(ProductionController::class)->group(function () {
        Route::get('/production/all', 'productionAll')->name('production.all');
        Route::get('/production/add', 'productionAdd')->name('production.add');
        Route::post('/production/store', 'productionStore')->name('production.store');
        Route::get('/production/details/{production_id}', 'productionDetails')->name('production.detail');

        Route::get('/daily/equipe/report', 'DailyEquipeReport')->name('daily.equipe.report');
        Route::get('/daily/equipe/pdf', 'DailyEquipePdf')->name('daily.equipe.pdf');


        Route::get('/daily/production/report', 'DailyProductionReport')->name('daily.production.report');
        Route::get('/daily/production/pdf', 'DailyProductionPdf')->name('daily.production.pdf');
    });












}); // End Group Middleware




// Default All Route
Route::controller(DefaultController::class)->group(function () {
    Route::get('/get-category', 'GetCategory')->name('get-category');
    Route::get('/get-product', 'GetProduct')->name('get-product');
    Route::get('/check-product', 'GetStock')->name('check-product-stock');
    Route::get('/check-pri', 'GetPri')->name('check-product-price');

});








// Route::get('/contact', function () {
//     return view('contact');
// });
