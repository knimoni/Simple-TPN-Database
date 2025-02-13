<?php

namespace App\Http\Controllers;

use App\Models\Child;
use Illuminate\Http\Request;

class ChildController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $childs = Child::orderBy('id', 'asc')->paginate(10);
        return view('childs.index', compact('childs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('childs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'  => 'required',
            'identifier'  => 'required',
            'gender'  => 'required',
            'height'  => 'required',
            'birthday'  => 'required',
            'bloodtype'  => 'required'
        ]);

        Child::create($request->post());

        return redirect()->route('childs.index')->with('success', 'Children has been created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Child  $child
     * @return \Illuminate\Http\Response
     */
    public function show(Child $child)
    {
        return view('childs.show', compact('child'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Child $child
     * @return \Illuminate\Http\Response
     */
    public function edit(Child $child)
    {
        if ($child->id == 1) {
            return redirect()->route('childs.index')->with('error', 'Norman cannot be edited!');
        }
    
        return view('childs.edit', compact('child'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Child  $child
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Child $child)
    {
        if ($child->id == 1) {
            return redirect()->route('childs.index')->with('error', 'Norman cannot be updated!');
        }
    
        $request->validate([
            'name' => 'required',
            'identifier' => 'required',
            'gender' => 'required',
            'height' => 'required|numeric',
            'birthday' => 'required|date',
            'bloodtype' => 'required'
        ]);
    
        $child->update($request->all());
    
        return redirect()->route('childs.index')->with('success', 'Child updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Child $child
     * @return \Illuminate\Http\Response
     */
    public function destroy(Child $child)
    {
        if ($child->id == 1) {
            return redirect()->route('childs.index')->with('error', 'Norman cannot be deleted!');
        }

        $child->delete();

        // Reset ulang ID agar berurutan kembali
        \Illuminate\Support\Facades\DB::statement('SET @count = 0');
        \Illuminate\Support\Facades\DB::statement('UPDATE childs SET id = @count:= @count + 1');
        \Illuminate\Support\Facades\DB::statement('ALTER TABLE childs AUTO_INCREMENT = 1');

        return redirect()->route('childs.index')->with('success', 'Children has been deleted successfully');
    }
}
