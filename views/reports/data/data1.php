<!-- Es todo el contenido que se renderizará en el reporte 1 -->
<p class="text-right bold">SOLICITO: <?= $solicitud['titulo'] ?></p>

<div class="mt-5 mb-5 lh-3 bold">
  <p>SEÑOR <?= $solicitud['dirigido'] ?></p>
  <p><?= $solicitud['cargo'] ?></p>
</div>

<p class="text-justify lh-3 mt-3 ml-5">
  Yo, <span class="ucase bold"><?= $solicitud['emisor'] ?></span>,
  identificado con
  DNI: <span class="bold"><?= $solicitud['dni'] ?></span>
  con domicilio en calle Grau N° 111 del distrito de Chincha Alta,
  provincia de Chincha, departamento de Ica. Ante Ud. respetuosamente
  me presento y expongo:
</p>

<p class="lh-3 text-justify mt-5">
  Que habiendo culminado la carrera de Ingeniería de Software con Inteligencia Artificial
  en la institución SENATI Chincha, solicito a Ud. permiso para la presentación
  del proyecto de Innovación titulado: <strong>App Móvil para prevención de delitos en Chincha</strong>
  del año 2024, dirección zonal Ica Ayacucho.
</p>

<p class="mt-3 mb-5 text-center">
  Por lo expuesto, ruego a Ud. acceder a mi solicitud
</p>

<p class="mt-5 text-right">
  Chincha, <?= $dia ?> de <?= $mesImprimir ?> del <?= $anio ?>
</p>

<table class="table" style="margin-top: 300px;">
  <colgroup>
    <col style="width: 40%">
    <col style="width: 20%">
    <col style="width: 40%">
  </colgroup>
  <tbody>
    <tr>
      <td></td>
      <td></td>
      <td class="text-center b-top">
        <span class="mt-1"><?= $solicitud['emisor'] ?></span>
      </td>
    </tr>
    <tr>
      <td></td>
      <td></td>
      <td class="text-center"><?= $solicitud['dni'] ?></td>
    </tr>
  </tbody>
</table>