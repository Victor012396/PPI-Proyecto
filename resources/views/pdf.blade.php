<?php 
use Dompdf\Dompdf;
use Illuminate\Support\Facades\View;

public function generarPDF()
{
    // Crear una instancia de Dompdf
    $dompdf = new Dompdf();

    // Renderizar la vista HTML en una cadena
    $html = View::make('pdf')->render();

    // Cargar el contenido HTML en Dompdf
    $dompdf->loadHtml(('<h1>Hola mundo</h1><br><a href="https://parzibyte.me/blog">By Parzibyte</a>'););

    // Renderizar el PDF
    $dompdf->render();

    // Generar la respuesta con el contenido PDF
    return $dompdf->stream('documento.pdf');
}
