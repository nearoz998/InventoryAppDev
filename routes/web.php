<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use Maatwebsite\Excel\Facades\Excel;
// unit
use App\Http\Controllers\Cms\ProductUnitController;
use App\Imports\Cms\ProductUnitImport;
use App\Exports\Cms\ProductUnitExport;
// category
use App\Http\Controllers\Cms\ProductCategoryController;
use App\Imports\Cms\ProductCategoryImport;
use App\Exports\Cms\ProductCategoryExport;
// supplier
use App\Http\Controllers\Cms\SupplierController;
use App\Imports\Cms\SupplierImport;
use App\Exports\Cms\SupplierExport;
// customer
use App\Http\Controllers\Cms\CustomerController;
use App\Imports\Cms\CustomerImport;
use App\Exports\Cms\CustomerExport;
use App\Exports\Cms\CreditCustomerExport;
use App\Exports\Cms\PaidCustomerExport;
// product
use App\Http\Controllers\Cms\ProductController;
use App\Imports\Cms\ProductImport;
use App\Exports\Cms\ProductExport;
// purchase
use App\Http\Controllers\Cms\PurchaseController;
use App\Imports\Cms\PurchaseImport;
use App\Exports\Cms\PurchaseExport;
// tax
use App\Http\Controllers\Cms\TaxController;
use App\Imports\Cms\TaxImport;
use App\Exports\Cms\TaxExport;
// invoice
use App\Http\Controllers\Cms\InvoiceController;
use App\Imports\Cms\InvoiceImport;
use App\Exports\Cms\InvoiceExport;
// dedignation
use App\Http\Controllers\Hr\DesignationController;
use App\Imports\Hr\DesignationImport;
use App\Exports\Hr\DesignationExport;
// employee
use App\Http\Controllers\Hr\EmployeeController;
use App\Imports\Hr\EmployeeImport;
use App\Exports\Hr\EmployeeExport;

use App\Http\Controllers\Cms\HomeController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('cms.index');
// });

Auth::routes();

Route::group(['middleware' => 'auth'], function () {

  Route::get('/', [HomeController::class, 'index'])->name('home');
  Route::get('/home', [HomeController::class, 'index'])->name('home');

  Route::prefix("products")->group(function(){
    Route::get("/",  [ProductController::class, "index"])->name('products.index');
    Route::get("create",  [ProductController::class, "create"])->name('products.create');
    Route::post("store",  [ProductController::class, "store"])->name('products.store');
    Route::get("{id}/edit",  [ProductController::class, "edit"])->name('products.edit');
    Route::put("{id}/update",  [ProductController::class, "update"])->name('products.update');
    Route::delete("{id}/destroy",  [ProductController::class, "destroy"])->name('products.destroy');
    Route::get("show",  [ProductController::class, "show"])->name('products.show');
    Route::post("{id}/remove-image",  [ProductController::class, "removeImage"])->name('products.remove-image');
 });

  // Route::resource('products', ProductController::class);
  Route::resource('productunits', ProductUnitController::class, ['only' => ['index', 'store', 'update', 'destroy']]);
  Route::resource('productcategories', ProductCategoryController::class, ['only' => ['index', 'store', 'update', 'destroy']]);
  Route::resource('suppliers', SupplierController::class, ['only' => ['index', 'store', 'update', 'destroy']]);
  Route::resource('customers', CustomerController::class, ['only' => ['index', 'store', 'update', 'destroy']]);
  Route::resource('purchases', PurchaseController::class, ['only' => ['index', 'create', 'edit', 'store', 'update', 'destroy']]);
  Route::resource('designations', DesignationController::class, ['only' => ['index', 'store', 'update', 'destroy']]);
  Route::resource('employees', EmployeeController::class, ['only' => ['index', 'store', 'show', 'update', 'destroy']]);
  Route::resource('taxes', TaxController::class, ['only' => ['index', 'store', 'update', 'destroy']]);
  Route::resource('invoices', InvoiceController::class,);
  Route::get('creditcustomers', [CustomerController::class, "creditCustomers"])->name('customers.creditcustomers');
  Route::get('paidcustomers', [CustomerController::class, "paidCustomers"])->name('customers.paidcustomers');
  Route::get('customers/create/viewtype={viewtype}', [CustomerController::class, "createCustomer"])->name('customers.createcustomer');
  Route::get('suppliers/create/viewtype={viewtype}', [SupplierController::class, "createSupplier"])->name('suppliers.createsupplier');
  Route::get('designation/create/viewtype={viewtype}', [DesignationController::class, "createDesignation"])->name('designations.createdesignation');
  Route::get('employee/create/viewtype={viewtype}', [EmployeeController::class, "createEmployee"])->name('employees.createemployee');
  Route::get('employee/{employee}/edit/viewtype={viewtype}', [EmployeeController::class, "editEmployee"])->name('employees.editemployee');


  Route::post('import-productunits', function () {
    Excel::import(new ProductUnitImport, request()->file('file'));
    return redirect()->back()->with('success', 'Data Imported Successfully');
  });
  Route::get('export-productunits', function () {
    return Excel::download(new ProductUnitExport, 'product_units.csv');
  });
  Route::post('import-productcategories', function () {
    Excel::import(new ProductCategoryImport, request()->file('file'));
    return redirect()->back()->with('success', 'Data Imported Successfully');
  });
  Route::get('export-productcategories', function () {
    return Excel::download(new ProductCategoryExport, 'product_categories.csv');
  });
  Route::post('import-suppliers', function () {
    Excel::import(new SupplierImport, request()->file('file'));
    return redirect()->back()->with('success', 'Data Imported Successfully');
  });
  Route::get('export-suppliers', function () {
    return Excel::download(new SupplierExport, 'suppliers.csv');
  });
  Route::post('import-customers', function () {
    Excel::import(new CustomerImport, request()->file('file'));
    return redirect()->back()->with('success', 'Data Imported Successfully');
  });
  Route::get('export-customers', function () {
    return Excel::download(new CustomerExport, 'customers.csv');
  });
  Route::get('export-creditcustomers', function () {
    return Excel::download(new CreditCustomerExport, 'creditcustomers.csv');
  });
  Route::get('export-paidcustomers', function () {
    return Excel::download(new PaidCustomerExport, 'paidcustomers.csv');
  });
  Route::post('import-products', function () {
    Excel::import(new ProductImport, request()->file('file'));
    return redirect()->back()->with('success', 'Data Imported Successfully');
  });
  Route::get('export-products', function () {
    return Excel::download(new ProductExport, 'products.csv');
  });
  Route::post('import-designations', function () {
    Excel::import(new DesignationImport, request()->file('file'));
    return redirect()->back()->with('success', 'Data Imported Successfully');
  });
  Route::get('export-designations', function () {
    return Excel::download(new DesignationExport, 'designations.csv');
  });
  Route::post('import-employees', function () {
    Excel::import(new EmployeeImport, request()->file('file'));
    return redirect()->back()->with('success', 'Data Imported Successfully');
  });
  Route::get('export-employees', function () {
    return Excel::download(new EmployeeExport, 'employees.csv');
  });
  Route::post('import-purchases', function () {
    Excel::import(new PurchaseImport, request()->file('file'));
    return redirect()->back()->with('success', 'Data Imported Successfully');
  });
  Route::get('export-purchases', function () {
    return Excel::download(new PurchaseExport, 'purchases.csv');
  });
  Route::post('import-taxes', function () {
    Excel::import(new TaxImport, request()->file('file'));
    return redirect()->back()->with('success', 'Data Imported Successfully');
  });
  Route::get('export-taxes', function () {
    return Excel::download(new TaxExport, 'taxes.csv');
  });
  Route::post('import-invoices', function () {
    Excel::import(new InvoiceImport, request()->file('file'));
    return redirect()->back()->with('success', 'Data Imported Successfully');
  });
  Route::get('export-invoices', function () {
    return Excel::download(new InvoiceExport, 'invoices.csv');
  });
});
