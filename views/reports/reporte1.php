<?php

require_once "../../vendor/autoload.php";

use Spipu\Html2Pdf\Html2Pdf; //CORE
use Spipu\Html2Pdf\Exception\Html2PdfException; //EXCEPCIONES
use Spipu\Html2Pdf\Exception\ExceptionFormatter; //HTML

try {
    ob_start();

    //Acceder a datos dinámicos (MODELOS - Clase->metodo())
    $solicitud = [
      "titulo"    => "Permiso para realizar trabajo de investigación",
      "dirigido"  => "David Miranda Rodriguez",
      "cargo"     => "Presidente de la asociación del centro de Salud Chincha",
      "emisor"    => "Jhon Edward Francia Minaya",
      "dni"       => "45454646"
    ];

    //Información a renderizar (PLANTILLA)
    require_once "./css/estilos.html";
    require_once "./data/data1.php";

    $content = ob_get_clean();

    //P = Orientación vertical (PORTRAIT), L = Landscape (horizontal)
    //array(left, top, right, bottom)
    $html2pdf = new Html2Pdf('P', 'A4', 'es', true, 'UTF-8', array(15, 5, 15, 5));
    $html2pdf->pdf->SetDisplayMode('fullpage');
    $html2pdf->writeHTML($content);
    $html2pdf->output('Reporte-01.pdf');

} catch (Html2PdfException $e) {
    $html2pdf->clean();

    $formatter = new ExceptionFormatter($e);
    echo $formatter->getHtmlMessage();
}
