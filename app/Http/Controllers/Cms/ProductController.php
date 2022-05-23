<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use App\Models\Cms\Product;
use App\Models\Cms\ProductCategory;
use App\Models\Cms\ProductUnit;
use App\Models\Cms\ProductImage;
use App\Models\Cms\Purchase;
use App\Models\Cms\Supplier;
use Illuminate\Http\Request;

class ProductController extends Controller
{
  protected $folder = 'product_images';
  protected $folder_path;





  public function __construct(Product $model)
  {

    $this->middleware('auth');
    $this->model = $model;
    $this->folder = getcwd() . DIRECTORY_SEPARATOR . 'uploads' . DIRECTORY_SEPARATOR . $this->folder . DIRECTORY_SEPARATOR;
    // $this->folder = 'uploads' . DIRECTORY_SEPARATOR . $this->folder . DIRECTORY_SEPARATOR;
  }
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $data['product'] = $this->model->orderBy('id', 'DESC')->with('ProductCategory', 'ProductUnit', 'Supplier', 'images')->get();
    return view('cms.products.index', compact('data'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $data['category'] = ProductCategory::all()->where('status', '1');
    $data['unit'] = ProductUnit::all()->where('status', '1');
    $data['supplier'] = Supplier::all();
    return view('cms.products.create', compact('data'));
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {

    // $request->validate([
    //     'name' => 'required|max:255',
    //     'weight' => 'required',
    //     'size' => 'required',
    //     'unit_id' => 'required',
    //     'category_id' => 'required',
    //     'service_rate' => 'required',
    //     'supplier' => 'required',
    //     'price' => 'required',
    //     'image' => 'sometimes|mimes:png,jpg,jpeg|max:2047',
    // ]);



    // if ($request->hasFile('image')) {
    //     $this->createFolder($this->folder);
    //     // parent::createFolderIfNotExist($this->image_path);
    //     $image = $request->file('image');
    //     $extension = $image->getClientOriginalExtension();
    //     $filename = time() . '.' . $extension;
    //     $image->move($this->folder, $filename);
    //     $product->image  = $filename;
    // }
    $product =  $this->model;
    $product->name = $request->name;
    $product->weight = $request->weight;
    $product->size = $request->size;
    $product->unit_id = $request->unit;
    $product->category_id = $request->category;
    $product->service_rate = $request->service_rate;
    $product->supplier_id = $request->supplier;
    $product->price = $request->price;
    $product->details = $request->details;
    $success = $product->save();

    if ($request->hasFile('images')) {
      $this->createFolder($this->folder);
      $files = $request->file('images');
      foreach ($files as $file) {
        $file_name = time() . '_' . rand() . '_' . $file->getClientOriginalName();
        $file->move($this->folder, $file_name);
        // $file->storeAs($this->folder, $file_name);
        if ($file_name) {
          $temp_data = array(
            'product_id' => $this->model->id,
            'images' => $file_name
          );
          //  dd($temp_data);

          $product_image = new ProductImage();
          $product_image->fill($temp_data);
          $product_image->save();
        }
      }
    }
    if ($success) {
      $request->session()->flash('success', 'Product Added Successfully !.');
    } else {
      $request->session()->flash('error', 'Sorry! There was problem while adding Products.');
    }
    return redirect(route('products.index'));
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    $data['product'] = $this->model->with('images')->find($id);
    $data['category'] = ProductCategory::all()->where('status', '1');
    $data['unit'] = ProductUnit::all()->where('status', '1');
    $data['supplier'] = Supplier::all();
    return view('cms.products.edit', compact('data'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
    $product = $this->model->findOrFail($id);
    // $request->validate([
    //     'name' => 'required|max:255',
    //     'weight' => 'required',
    //     'size' => 'required',
    //     'unit_id' => 'required',
    //     'category_id' => 'required',
    //     'service_rate' => 'required',
    //     'supplier' => 'required',
    //     'price' => 'required',
    //     'image' => 'sometimes|mimes:png,jpg,jpeg|max:2047',
    // ]);
    // if ($request->hasFile('image')) {
    //     if ($product->image && file_exists($this->folder . '/' . $product->image));
    //     unlink($this->folder . '/' . $product->image);
    //     $this->createFolder($this->folder);
    //     // parent::createFolderIfNotExist($this->image_path);
    //     $image = $request->file('image');
    //     $extension = $image->getClientOriginalExtension();
    //     $filename = time() . '.' . $extension;
    //     $image->move($this->folder, $filename);
    //     $product->image  = $filename;
    // }

    $product->name = $request->name;
    $product->weight = $request->weight;
    $product->size = $request->size;
    $product->unit_id = $request->unit;
    $product->category_id = $request->category;
    $product->service_rate = $request->service_rate;
    $product->supplier_id = $request->supplier;
    $product->price = $request->price;
    $product->details = $request->details;
    $success = $product->save();

    if ($request->hasFile('images')) {
      $this->createFolder($this->folder);
      $files = $request->file('images');
      foreach ($files as $file) {
        $file_name = time() . '_' . rand() . '_' . $file->getClientOriginalName();
        $file->move($this->folder, $file_name);
        if ($file_name) {
          $temp_data = array(
            'product_id' => $product->id,
            'images' => $file_name,
          );
          //  dd($temp_data);

          $product_image = new ProductImage;
          $product_image->fill($temp_data);
          $product_image->save();
        }
      }
    }
    if ($success) {
      $request->session()->flash('success', 'Product Updated Successfully !.');
    } else {
      $request->session()->flash('error', 'Sorry! There was problem while Updating Products.');
    }
    return redirect(route('products.index'));
  }


  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy(Request $request, $id)
  {
    $purchases = Purchase::all();
    foreach ($purchases as $purchase) {
      $product_ids = json_decode($purchase->product_id);
      // dd($expenditurecategory_ids);
      foreach ($product_ids as $product_id) {
        if ($product_id == $id) {
          return back()->with('script', 'alert("Can not delete item.\nThis product is being used in purchase entry.");');
        }
      }
    }
    $data = $this->model->with('images')->find($id);

    if (!$data) {
      $request->session()->flash('success', 'Product does not exists.');
      return redirect(route('products.index'));
    }

    $del = $data->delete();
    $images = $data->images;
    if ($del) {

      if ($images->count() > 0) {
        foreach ($images as $image) {
          $path = public_path() . '/uploads/product_images';
          $image = $image['images'];
          if ($image && file_exists($path . '/' . $image)) {

            unlink($path . '/' . $image);
          }
        }
      }


      $request->session()->flash('info', 'Product deleted Successfully');
    } else {
      $request->session()->flash('error', 'Sorry ! There was problem while deleting product from table');
    }
    return redirect(route('products.index'));



    // if ($data->image && file_exists($this->folder . '/' . $data->image));
    // unlink($this->folder . '/' . $data->image);
    // $success = $data->delete();




  }
  public function removeImage(Request $request, $id)
  {

    $response = [];
    $response['error'] = true;

    if ($row = ProductImage::find($id)) {
      $path = public_path() . DIRECTORY_SEPARATOR . 'uploads' . DIRECTORY_SEPARATOR . 'product_images';
      if (file_exists($path . '/' .  $row->images))
        unlink($path . '/' .  $row->images);

      $row->delete();
      $response['message'] = 'Image Removed';
      $response['error'] = false;
    } else {
      $response['message'] = 'Invalid id Password !';
    }

    return response()->json(json_encode($response));
  }
}
