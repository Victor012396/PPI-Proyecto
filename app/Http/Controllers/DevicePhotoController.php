<?php

namespace App\Http\Controllers;

use App\Models\device_photo;
use Illuminate\Http\Request;

class DevicePhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     private $nombreCarpetaFotos = "fotos";
    public function index()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\device_photo  $device_photo
     * @return \Illuminate\Http\Response
     */
    public function show(device_photo $device_photo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\device_photo  $device_photo
     * @return \Illuminate\Http\Response
     */
    public function edit(device_photo $device_photo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\device_photo  $device_photo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, device_photo $device_photo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\device_photo  $device_photo
     * @return \Illuminate\Http\Response
     */
    public function destroy(device_photo $device_photo)
    {
        //
    }


}
