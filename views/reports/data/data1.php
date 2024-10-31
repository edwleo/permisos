<!-- Es todo el contenido que se renderizará en el reporte 1 -->
<p class="text-right bold">SOLICITO: <?= $solicitud['titulo'] ?></p>

<div class="mt-5 mb-5">
  <p>SEÑOR <?= $solicitud['dirigido'] ?></p>
  <p><?= $solicitud['cargo'] ?></p>
</div>

<p class="text-justify">
  Yo, <span class="ucase bold"><?= $solicitud['emisor'] ?></span>, 
  identificado con 
  DNI: <span class="bold"><?= $solicitud['dni'] ?></span> 
  con domicilio en calle Grau N° 111 del distrito de Chincha Alta, 
  provincia de Chincha, departamento de Ica. Ante Ud. respetuosamente 
  me presento y expongo:
</p>