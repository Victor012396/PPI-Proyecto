<?php

namespace App\Http\Controllers;

use App\Models\device;
use Illuminate\Http\Request;

class DeviceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $device = device::all();
        return view('device.index',compact('device'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('device.create');
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
            'lugar'->['required'],
            'espacio'->['required'],
            'device'->['required'],
        ]);
        device::create($request->all());
        return redirect()->route('device.index')
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\device  $device
     * @return \Illuminate\Http\Response
     */
    public function show(device $device)
    {
        // No se usa
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\device  $device
     * @return \Illuminate\Http\Response
     */
    public function edit(device $device)
    {
        return view('device.edit',compact('device'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\device  $device
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, device $device)
    {
        $request->validate([
            'lugar'->['required'],
            'espacio'->['required'],
            'device'->['required'],
        ]);
        $device->update($request->all());
        return redirect()->route('device.index')
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\device  $device
     * @return \Illuminate\Http\Response
     */
    public function destroy(device $device)
    {
        $device->delete();
        return redirect()->route('device.index')

    }
}
