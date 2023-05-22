<?php

namespace App\Http\Controllers;

use App\Models\device;
use App\Models\User;
use App\Models\Producto;
use App\Models\Archivo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DeviceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function _constructor()
    {
        $this->middleware('auth')->except('show');

    }

    public function index()
    {
        // Eager Loading (n + 1 queries)
        $devices = device::with(['productos'])->get();
        return view('device.index',compact('devices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users= User::all();
        $productos= Producto::all();
        return view('device.create',compact('users','productos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $users= User::all();
        $request->validate([
            'lugar'=>['required'],
            'espacio'=>['required'],
            'device'=>['required'],
        ]);
        $device=device::create($request->all());
        $device->users()->attach($request->user_ids,['date'=>now()]);
        session()->flash('success', 'El registro se ha creado exitosamente');
        $device->save();
        if($request->hasFile('archivo') && $request->file('archivo')->isValid()){
            $ruta = $request->archivo->store('documentos', 'public');

            $archivos=new Archivo();
            $archivos->hash = $ruta;
            $archivos->nombre = $request->archivo->getClientOriginalName();
            $archivos->extension = $request->archivo->guessExtension();
            $archivos->mime = $request->archivo->getMimeType();
            $archivos->device_id = $device->id;
            $archivos->save();
        }
        
        return redirect()->route('device.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\device  $device
     * @return \Illuminate\Http\Response
     */
    public function show(device $device)
    {
        if($response->denied()){
            abort(403);
        }

        return view('devices/show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\device  $device
     * @return \Illuminate\Http\Response
     */
    public function edit(device $device)
    {
        $users= User::all();
        $productos= Producto::all();
        return view('device.edit',compact('device','users','productos'));
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
            'lugar'=>['required'],
            'espacio'=>['required'],
            'device'=>['required'],
        ]);
        $device->update($request->all());
        $device->users()->attach($request->user_ids,['date'=>now()]);
        $device->save();
        if($request->hasFile('archivo') && $request->file('archivo')->isValid()){
            $ruta = $request->archivo->store('documentos', 'public');

            $archivos=new Archivo();
            $archivos->hash = $ruta;
            $archivos->nombre = $request->archivo->getClientOriginalName();
            $archivos->extension = $request->archivo->guessExtension();
            $archivos->mime = $request->archivo->getMimeType();
            $archivos->device_id = $device->id;
            $archivos->save();
        }

        return redirect()->route('device.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\device  $device
     * @return \Illuminate\Http\Response
     */
    public function destroy(device $device)
    {
        $archivo = Archivo::where('device_id', $device->id)->first();

        if ($archivo !== null){
            $path = $archivo->hash;
            $archivo->delete();
            Storage::disk('public')->delete($path);
        }
        $device->delete();
        return redirect()->route('device.index');

    }

    public function descargar(Archivo $archivo)
    {
        return Storage::download($archivo->hash, $archivo->nombre,
                ['Content-Type' => $archivo->mime]);
    }
}
