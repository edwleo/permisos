<?php

//COMPOSER
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
      "dni"       => "45454646",
      "fecha"     => "2023/06/08"
    ];

    //Nombre mes
    $nombreMes = [
      "01"  => "enero",
      "02"  => "febrero",
      "03"  => "marzo",
      "04"  => "abril",
      "05"  => "mayo",
      "06"  => "junio",
      "07"  => "julio",
      "08"  => "agosto",
      "09"  => "setiembre",
      "10"  => "octubre",
      "11"  => "noviembre",
      "12"  => "diciembre"
    ];

    //Formatear la fecha 
    $fechaSolicitud = $solicitud['fecha'];
    $dia = date('d', strtotime($fechaSolicitud));
    $mes = date('m', strtotime($fechaSolicitud));
    $anio = date('Y', strtotime($fechaSolicitud)); //Y = 0000

    $mesImprimir = $nombreMes[$mes];

    //Información a renderizar (PLANTILLA)
    require_once "./css/estilos.html";
    require_once "./data/data1.php";

    $content = ob_get_clean();

    //P = Orientación vertical (PORTRAIT), L = Landscape (horizontal)
    //array(left, top, right, bottom)
    $html2pdf = new Html2Pdf('P', 'A4', 'es', true, 'UTF-8', array(25, 15, 20, 15));
    $html2pdf->pdf->SetDisplayMode('fullpage');
    $html2pdf->writeHTML($content);
    $html2pdf->output('Reporte-01.pdf');

} catch (Html2PdfException $e) {
    $html2pdf->clean();

    $formatter = new ExceptionFormatter($e);
    echo $formatter->getHtmlMessage();
}
