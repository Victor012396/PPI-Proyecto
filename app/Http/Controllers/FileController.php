<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\GuardarArea;

class FileController extends Controller
{
    //
    private $nombreCarpetaFotos = "fotos";
     public function index()
    {
        $folderPath = storage_path('app/fotos'); // Ruta de la carpeta de fotos
        $files = glob($folderPath . '/*');
    
        return view('photos.index', compact('files'));
    }
    public function agregarFotos(GuardarArea $peticion)
    {
        foreach ($peticion->file("fotos") as $foto) {
            $fotoDeArticulo = new GuardarArea;
            $rutaLarga = $foto->store($this->nombreCarpetaFotos,'public');
        }
        return back()
            ->with("mensaje", "Foto(s) agregada(s) con éxito")
            ->with("tipo", "success");
    }

   
}
