<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use App\Models\Cms\Purchase;
use App\Models\Cms\Supplier;
use App\Models\Cms\Product;
use App\Models\Cms\ProductPurchase;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct(Purchase $model)
  {
    $this->middleware('auth');
    $this->model = $model;
  }

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $data['purchases'] = $this->model->orderBy('id', 'DESC')->with('products', 'supplier', 'product_purchases')->get();
    return view('cms.purchases.index', compact('data'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $suppliers = Supplier::all();
    $invoice_count = Purchase::orderBy('invoice_no', 'desc')->pluck('invoice_no')->first() + 1;
    $products = Product::all();
    return view('cms.purchases.create', compact('suppliers', 'invoice_count', 'products'));
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    // $this->validate($request, [
    //     'supplier' => 'required',
    //     'date' => 'required',
    //     'invoice_no' => 'required',
    //     'details' => 'nullable',
    //     'payment_type' => 'required',
    //     'product.*' => 'required',
    //     'quantity.*' => 'required',
    //     'price.*' => 'required',
    //     'sub_total.*' => 'required',
    //     'total_amount' => 'required',
    // ]);
    $product = $request->product;
    $count = count($product);
    foreach ($product as $value) {
      $product_ids[] = explode('.+.', $value)[0];
    }
    // dd($product_ids);
    for ($i = 0; $i < $count; $i++) {
      for ($j = 0; $j < $count; $j++) {
        if ($i !== $j && $product_ids[$i] == $product_ids[$j]) {
          return back()->with('script', 'alert("Entry error: please enter the same product at once")');
        }
      }
    }
    $price = $request->price;
    $quantity = $request->quantity;
    $sub_total = $request->sub_total;
    
    $purchase = new $this->model;
    $purchase->supplier_id = $request->supplier;
    $purchase->date = $request->date;
    $purchase->invoice_no = $request->invoice_no;
    $purchase->details = $request->details;
    $purchase->payment_type = $request->payment_type;
    $purchase->product_id = json_encode($product_ids);
    $purchase->quantity = json_encode($quantity);
    $purchase->price = json_encode($price);
    $purchase->sub_total = json_encode($sub_total);
    $purchase->total = $request->total_amount;
    $success = $purchase->save();
    for ($i = 0; $i < count($product); $i++) {
      $product_quantity = Product::findOrFail($product_ids[$i]);
      $product_quantity->quantity += $quantity[$i];
      $product_quantity->save();
    }

    // $product = $request->product;
    // foreach ($product as $value) {
    //     $product_ids[] = explode('.+.', $value)[0];
    // }
    // $product = $request->product;
    // $quantity = $request->quantity;
    // $price = $request->price;
    // $sub_total = $request->sub_total;
    // for ($i = 0; $i < count($product); $i++) {
    //     $product_purchase = new ProductPurchase;
    //     $product_purchase->purchase_id = $this->model->id;
    //     $product_purchase->product_id = explode('.+.', $product[$i])[0];
    //     $product_purchase->quantity = $quantity[$i];
    //     $product_purchase->price = $price[$i];
    //     $product_purchase->sub_total = $sub_total[$i];
    //     $product_purchase->save();
    //     $product_quantity = Product::findOrFail($product_purchase->product_id);
    //     $product_quantity->quantity = $product_quantity->quantity + $product_purchase->quantity;
    //     $product_quantity->save();
    // }
    if ($success) {
      $request->session()->flash('success', 'Product Added Successfully.');
    } else {
      $request->session()->flash('script', 'alert("Sorry! There was problem while adding Purchase.")');
    }
    return redirect()->back();
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Cms\Purchase  $purchase
   * @return \Illuminate\Http\Response
   */
  public function show(Purchase $purchase)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Cms\Purchase  $purchase
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    $purchase = $this->model->with('product_purchases')->findOrFail($id);
    $suppliers = Supplier::all();
    $invoice_count = Purchase::orderBy('invoice_no', 'desc')->pluck('invoice_no')->first() + 1;
    $products = Product::all();
    return view('cms.purchases.edit', compact('purchase', 'suppliers', 'invoice_count', 'products'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Cms\Purchase  $purchase
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
    // $this->validate($request, [
    //     'supplier' => 'required',
    //     'date' => 'required',
    //     'invoice_no' => 'required',
    //     'details' => 'nullable',
    //     'payment_type' => 'required',
    //     'product.*' => 'required',
    //     'quantity.*' => 'required',
    //     'price.*' => 'required',
    //     'sub_total.*' => 'required',
    //     'total_amount' => 'required',
    // ]);
    $product = $request->product;
    $price = $request->price;
    $quantity = $request->quantity;
    $sub_total = $request->sub_total;
    $count = count($product);
    foreach ($product as $value) {
      $product_ids[] = explode('.+.', $value)[0];
    }
    for ($i = 0; $i < $count; $i++) {
      for ($j = 0; $j < $count; $j++) {
        if ($i !== $j && $product_ids[$i] == $product_ids[$j]) {
          return back()->with('script', 'Entry error: please enter the same product at once');
        }
      }
    }
    $products = Product::all();
    foreach ($products as $productData) {
      $productData->tempQuantity = $productData->quantity;
      for ($i = 0; $i < $count; $i++) {
        if ($productData->id == $product_ids[$i]) {
          $productData->tempQuantity += $quantity[$i];
          if ($productData->tempQuantity < 0) {
            return back()->with('script', 'Quantity Error!');
          }
        }
      }
      $productData->save();
    }

    $purchase = $this->model->findOrFail($id);
    $purchase_old_products = json_decode($purchase->product_id);
    // $purchase_old_quantities = json_decode($purchase->quantity);
    // for ($i = 0; $i < $count; $i++) {
    foreach ($purchase_old_products as $old_product) {
      $old_product_quantity_data = Product::findOrFail($old_product);
      // if($product_ids[$i] == $old_product) {
      $product_data = Product::findOrFail($old_product);
      $product_data->tempQuantity -= $old_product_quantity_data->quantity;
      $product_data->save();
      // }
      // }
    }

    // $purchase = $this->model->findOrFail($id);
    $purchase->supplier_id = $request->supplier;
    $purchase->date = $request->date;
    $purchase->invoice_no = $request->invoice_no;
    $purchase->details = $request->details;
    $purchase->payment_type = $request->payment_type;
    $purchase->product_id = json_encode($product_ids);
    $purchase->quantity = json_encode($quantity);
    $purchase->price = json_encode($price);
    $purchase->sub_total = json_encode($sub_total);
    $purchase->total = $request->total_amount;
    $success = $purchase->save();

    // for ($i = 0; $i < count($product); $i++) {
    //     $product_quantity = Product::findOrFail($product_ids[$i]);
    //     $product_quantity->quantity += $quantity[$i];
    //     $product_quantity->save();
    // }

    // $product = $request->product;
    // foreach ($product as $value) {
    //     $product_ids[] = explode('.+.', $value)[0];
    // }
    // $product = $request->product;
    // $quantity = $request->quantity;
    // $price = $request->price;
    // $sub_total = $request->sub_total;
    // for ($i = 0; $i < count($product); $i++) {
    //     $product_purchase = new ProductPurchase;
    //     $product_purchase->purchase_id = $this->model->id;
    //     $product_purchase->product_id = explode('.+.', $product[$i])[0];
    //     $product_purchase->quantity = $quantity[$i];
    //     $product_purchase->price = $price[$i];
    //     $product_purchase->sub_total = $sub_total[$i];
    //     $product_purchase->save();
    //     $product_quantity = Product::findOrFail($product_purchase->product_id);
    //     $product_quantity->quantity = $product_quantity->quantity + $product_purchase->quantity;
    //     $product_quantity->save();
    // }
    // $purchase = $this->model->findOrFail($id);
    // $purchase->supplier_id = $request->supplier;
    // $purchase->date = $request->date;
    // $purchase->invoice_no = $request->invoice_no;
    // $purchase->details = $request->details;
    // $purchase->payment_type = $request->payment_type;
    // $purchase->total = $request->total_amount;
    // $success = $purchase->save();

    // $product = $request->product;
    // foreach ($product as $value) {
    //     $product_id = explode('.+.', $value)[0];
    //     $product_ids[] = $product_id;
    //     $product_item = Product::find($product_id);
    //     $product_purchase_quantity = ProductPurchase::where('purchase_id', $purchase->id)->where('product_id', $product_id)->value('quantity');
    //     // dd($product_purchase);
    //     // $qty = $product_purchase->quantity;
    //     // $product_purchase = ProductPurchase::find($product_purchase_id);
    //     $product_item->quantity = $product_item->quantity - $product_purchase_quantity;
    //     $product_item->save();
    //     // dd('123');
    //     // $product_purchase->save();
    // }
    // // $product = $request->product;
    // $quantity = $request->quantity;
    // $price = $request->price;
    // $sub_total = $request->sub_total;
    // for ($i = 0; $i < count($product); $i++) {
    //     for ($j = 0; $j < count($product); $j++) {
    //         if (explode('.+.', $product[$i])[0] == explode('.+.', $product[$j])[0] && $i !== $j) {
    //             return back()->with('danger', 'Please fill one product in one entry only.');
    //         }
    //     }
    // }
    // $product_purchases_old = ProductPurchase::where('purchase_id', $purchase->id)->pluck('id');
    // for ($i = 0; $i < count($product); $i++) {
    //     $product_purchase = ProductPurchase::firstOrNew(['purchase_id' => $purchase->id, 'product_id' => explode('.+.', $product[$i])[0]]);
    //     // $product_purchase->purchase_id = $purchase->id;
    //     // $product_purchase->product_id = explode('.+.',$product[$i])[0];
    //     $product_purchase->quantity = $quantity[$i];
    //     $product_purchase->price = $price[$i];
    //     $product_purchase->sub_total = $sub_total[$i];
    //     $product_purchase->save();
    //     $product_item = Product::find(explode('.+.', $product[$i])[0]);
    //     $product_item->quantity = $product_item->quantity + $product_purchase->quantity;
    //     $product_item->save();
    //     $product_purchases_new[] = $product_purchase->id;
    // }
    // foreach ($product_purchases_old as $oldId) {
    //     $status = 0;
    //     foreach ($product_purchases_new as $newId) {
    //         if ($oldId == $newId) {
    //             $status = 1;
    //             break;
    //         }
    //     }
    //     if ($status == 0) {
    //         $data = ProductPurchase::find($oldId);
    //         $product_item = Product::find($data->product_id);
    //         $product_item->quantity = $product_item->quantity - $data->quantity;
    //         $product_item->save();
    //         $data->delete();
    //     }
    // }
    if ($success) {
      // $products = Product::all();
      foreach ($products as $productData) {
        // for ($i = 0; $i < $count; $i++) {
        //     if ($productData->id == $product_ids[$i]) {
        //         $productData->tempQuantity += $quantity[$i];
        //     }
        // }
        $productData->quantity = $productData->tempQuantity;
        $productData->save();
      }
      $request->session()->flash('success', 'Purchase Updated Successfully.');
    } else {
      $request->session()->flash('error', 'Sorry! There was problem while adding Purchase.');
    }
    return redirect()->route('purchases.index');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Cms\Purchase  $purchase
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    $purchase = $this->model->find($id);
    // dd($purchase->product_purchases[0]->product_id);
    $product_item = Product::find($purchase->product_purchases[0]->product_id);
    // dd($product_item);
    $product_item->quantity = $product_item->quantity - $purchase->product_purchases[0]->quantity;
    $product_item->save();
    $purchase->delete();
    return back()->with('info', 'Purchase info deleted.');
  }
}
