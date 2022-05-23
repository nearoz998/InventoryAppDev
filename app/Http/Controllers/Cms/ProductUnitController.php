<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cms\ProductUnit;

class ProductUnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $units = ProductUnit::all();
        return view('cms.ProductUnits.index', compact('units'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view('cms.productUnits.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'unit'  =>  'required',
            'status'  =>  'required',
        ]);
        $unit = ProductUnit::firstOrNew(['unit' => $request->input('unit')]);
        $unit->status = $request->input('status');
        $unit->save();
        return redirect(route('productunits.index'))->with('success', 'Unit added: ' . $request->input('unit'));
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
        // $unit = ProductUnit::findOrFail($id);
        // return view('cms.productUnits.edit', compact('unit'));
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
        $this->validate($request, [
            'unit'  =>  'required',
            'status' => 'required',
        ]);
        $unit = ProductUnit::where('unit', $request->input('unit'))->first();
        if ($unit) {
            if ($unit->id !== (int)$id) {
                return redirect()->back()->with('warning', 'Unit exists: ' . $request->input('unit'));
            } else {
                $unit = ProductUnit::findOrFail($id);
                $unit->unit = $request->input('unit');
                $unit->status = $request->input('status');
                $unit->save();
                return redirect()->back()->with('success', 'Unit updated: ' . $request->input('unit'));
            }
        } else {
            $unit = ProductUnit::findOrFail($id);
            $unit->unit = $request->input('unit');
            $unit->status = $request->input('status');
            $unit->save();
            return redirect()->back()->with('success', 'Unit updated: ' . $request->input('unit'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $unit = ProductUnit::findOrFail($id);
        $unit->delete();
        return redirect(route('productunits.index'))->with('info', 'Unit removed.');
    }
}
