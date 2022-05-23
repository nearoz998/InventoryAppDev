<?php

namespace App\Http\Controllers\Hr;

use App\Http\Controllers\Controller;
use App\Models\Hr\Designation;
use Illuminate\Http\Request;

class DesignationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $designations = Designation::all();
        return view('hr.designations.index', compact('designations'));
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
        $designation = Designation::firstOrNew(['designation'=>$request->designation]);
        $designation->details = $request->details;
        $designation->save();
        return redirect()->back()->with('success', 'designation added: ' . $request->designation);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Hr\Designation  $designation
     * @return \Illuminate\Http\Response
     */
    public function show(Designation $designation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Hr\Designation  $designation
     * @return \Illuminate\Http\Response
     */
    public function edit(Designation $designation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Hr\Designation  $designation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $designation = Designation::where('designation', $request->designation)->first();
        if ($designation) {
            if ($designation->id !== (int)$id) {
                return redirect()->back()->with('warning', 'designation exists: ' . $request->designation);
            } else {
                $designation = Designation::findOrFail($id);
                $designation->designation = $request->designation;
                $designation->details = $request->input('details');
                $designation->save();
                return redirect()->back()->with('success', 'designation updated: ' . $request->designation);
            }
        } else {
            $designation = Designation::findOrFail($id);
            $designation->designation = $request->designation;
            $designation->details = $request->input('details');
            $designation->save();
            return redirect()->back()->with('success', 'designation updated: ' . $request->designation);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Hr\Designation  $designation
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $designation = Designation::findOrFail($id);
        $designation->delete();
        return redirect()->back()->with('info', 'designation removed.');
    }
    
    public function createDesignation($viewtype)
    {
        // dd($viewtype);
        return view('hr.designations.createdesignation', compact('viewtype'));
    }
}
