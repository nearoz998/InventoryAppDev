<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use App\Models\Cms\Tax;
use Illuminate\Http\Request;

class TaxController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $taxes = Tax::all();
    return view('cms.taxes.index', compact('taxes'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    //
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $tax = Tax::firstOrNew(['tax' => $request->tax]);
    $tax->tax = $request->tax;
    $tax->status = $request->status;
    // dd($request->tax);
    $success = $tax->save();
    if ($success) {
      return back()->with('success', 'Added.');
    } else {
      return back()->with('script', 'alert("Something went wrong!")');
    }
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Cms\Tax  $tax
   * @return \Illuminate\Http\Response
   */
  public function show(Tax $tax)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Cms\Tax  $tax
   * @return \Illuminate\Http\Response
   */
  public function edit(Tax $tax)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Cms\Tax  $tax
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
    $tax = Tax::where('tax', $request->tax)->first();
    if ($tax) {
      if ($tax->id !== (int)$id) {
        return redirect()->back()->with('warning', 'Exists: ' . $request->tax);
      } else {
        $tax = Tax::findOrFail($id);
        $tax->tax = $request->tax;
        $tax->status = $request->status;
        $tax->save();
        return redirect()->back()->with('success', 'Updated: ' . $request->tax);
      }
    } else {
      $tax = Tax::findOrFail($id);
      $tax->tax = $request->tax;
      $tax->status = $request->status;
      $tax->save();
      return redirect()->back()->with('success', 'Updated: ' . $request->tax);
    }
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Cms\Tax  $tax
   * @return \Illuminate\Http\Response
   */
  public function destroy(Tax $tax)
  {
    $tax->delete();
  }
}
