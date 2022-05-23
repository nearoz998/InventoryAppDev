<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use App\Models\Cms\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::all();
        $title = 'Customers';
        return view('cms.customers.index', compact('customers', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view('cms.customers.create');
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
        ]);
        if (Customer::where('name', $request->input('name'))->first()) {
            return redirect()->back()->with('warning', 'Customer exists: ' . $request->input('name'));
        } else {
            Customer::create([
                'name' => $request->input('name'),
                'mobile' => $request->input('mobile'),
                'address' => $request->input('address'),
                'balance' => $request->input('balance'),
            ]);
            return redirect()->back()->with('success', 'Customer added: ' . $request->input('name'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cms\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cms\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cms\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'mobile' => 'nullable',
            'address' => 'nullable',
            'balance' => 'nullable',
        ]);
        $customer = Customer::where('name', $request->input('name'))->first();
        if ($customer) {
            if ($customer->id !== (int)$id) {
                return redirect()->back()->with('warning', 'Customer exists: ' . $request->input('name'));
            } else {
                $customer = Customer::findOrFail($id);
                $customer->name = $request->input('name');
                $customer->mobile = $request->input('mobile');
                $customer->address = $request->input('address');
                $customer->balance = $request->input('balance');
                $customer->save();
                return redirect()->back()->with('success', 'Customer updated: ' . $request->input('name'));
            }
        } else {
            $customer = Customer::findOrFail($id);
            $customer->name = $request->input('name');
            $customer->mobile = $request->input('mobile');
            $customer->address = $request->input('address');
            $customer->balance = $request->input('balance');
            $customer->save();
            return redirect()->back()->with('success', 'Customer updated: ' . $request->input('name'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cms\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customer = Customer::findOrFail($id);
        $customer->delete();
        return redirect()->back()->with('info', 'Customer removed.');
    }
    public function creditCustomers() {
        $customers = Customer::where('balance', '>', 0)->get();
        $title = 'Credit Customers';
        return view('cms.customers.index', compact('customers', 'title'));
    }
    public function paidCustomers() {
        $customers = Customer::where('balance', '=', 0)->get();
        $title = 'Paid Customers';
        return view('cms.customers.index', compact('customers', 'title'));
    }
    public function createCustomer($viewtype)
    {
        // dd($viewtype);
        return view('cms.customers.createcustomer', compact('viewtype'));
    }
}
