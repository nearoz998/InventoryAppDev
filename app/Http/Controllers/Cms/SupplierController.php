<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use App\Models\Cms\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $suppliers = Supplier::all();
        return view('cms.suppliers.index', compact('suppliers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view('cms.suppliers.create');
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
            'name' => 'required',
            'mobile' => 'nullable',
            'address' => 'nullable',
            'balance' => 'nullable',
            'details' => 'nullable',
        ]);
        if (Supplier::where('name', $request->input('name'))->first()) {
            return redirect()->back()->with('warning', 'Supplier exists: ' . $request->input('name'));
        } else {
            Supplier::create([
                'name' => $request->input('name'),
                'mobile' => $request->input('mobile'),
                'address' => $request->input('address'),
                'balance' => $request->input('balance'),
                'details' => $request->input('details'),
            ]);
            return redirect()->back()->with('success', 'Supplier added: ' . $request->input('name'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cms\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function show(Supplier $supplier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cms\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function edit(Supplier $supplier)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cms\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'mobile' => 'nullable',
            'address' => 'nullable',
            'balance' => 'nullable',
            'details' => 'nullable',
        ]);
        $supplier = Supplier::where('name', $request->input('name'))->first();
        if ($supplier) {
            if ($supplier->id !== (int)$id) {
                return redirect()->back()->with('warning', 'Supplier exists: ' . $request->input('name'));
            } else {
                $supplier = Supplier::findOrFail($id);
                $supplier->name = $request->input('name');
                $supplier->mobile = $request->input('mobile');
                $supplier->address = $request->input('address');
                $supplier->balance = $request->input('balance');
                $supplier->details = $request->input('details');
                $supplier->save();
                return redirect()->back()->with('success', 'Supplier updated: ' . $request->input('name'));
            }
        } else {
            $supplier = Supplier::findOrFail($id);
            $supplier->name = $request->input('name');
            $supplier->mobile = $request->input('mobile');
            $supplier->address = $request->input('address');
            $supplier->balance = $request->input('balance');
            $supplier->details = $request->input('details');
            $supplier->save();
            return redirect()->back()->with('success', 'Supplier updated: ' . $request->input('name'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cms\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $supplier = Supplier::findOrFail($id);
        $supplier->delete();
        return redirect()->back()->with('info', 'Supplier removed.');
    }
    public function createSupplier($viewtype)
    {
        // dd($viewtype);
        return view('cms.suppliers.createsupplier', compact('viewtype'));
    }
}
