<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Dompdf\Dompdf;
use Illuminate\Support\Facades\View;
class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.index');
    }



public function generarPDF()
{
    // Crear una instancia de Dompdf
    $dompdf = new Dompdf();

    // Renderizar la vista HTML en una cadena
    $html = View::make('pdf')->render();

    // Cargar el contenido HTML en Dompdf
    $dompdf->loadHtml($html);

    // Renderizar el PDF
    $dompdf->render();

    // Generar la respuesta con el contenido PDF
    return $dompdf->stream('documento.pdf');
}

}
