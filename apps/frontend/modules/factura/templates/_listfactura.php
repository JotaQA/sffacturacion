<?php use_helper('Number') ?>
<?php $sf_user->setCulture('es_CL') ?>
<?php //$time = $sf_data->getRaw('time') ?>
<?php 

public function getFacturaTipo($tipo){
    if($tipo == 'FISICA') return '<b style="background: yellow; color: black; padding: 1px 2px; font-size: 120%" title="Factura Física">F</b>';
    else return '<b style="background: blue; color: white; padding: 1px 2px; font-size: 120%" title="Factura Electronica">E</b>';
}


$time = array();
$timer = new sfTimer('test');
$timer->startTimer();
          ?>

<table width="100%">
  <thead>
    <tr>
      <th>Numero</th>
      <th>Estado</th>
      <th>Cliente</th>
      <th>Vendedor</th>

      <th>Emision</th>
      <th>Total</th>
      <th>Pagado</th>
      <th>Coment</th>
      <th align="center">Acción</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($pager->getResults(ESC_RAW) as $factura): ?>
    <tr>
      <td><?php echo link_to(getFacturaTipo($factura['tipo_factura']), 'factura/cambiartipo?id_factura='.$factura['id_factura'], array(
  'popup' => array('popupWindow', 'width=750,height=400,left=320,top=100'))).$factura->getNumeroFactura() ?></td>

    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<?php $time[] = $timer->addTime(); ?>
<?php $timer->startTimer(); ?>

<?php if ($pager->haveToPaginate()): ?>
  <div class="pagination">
    <img id="loader-page" alt="cargando" style="vertical-align: middle; display: none" src="/images1/ajax-loader-white.gif" />
    <a href="#" onclick="paginar(1)">
      <img src="/images1/first.png" alt="Primera pagina" title="Primera pagina" />
    </a>

    <a href="#" onclick="paginar(<?php echo $pager->getPreviousPage() ?>)">
      <img src="/images1/previous.png" alt="Página anterior" title="Página anterior" />
    </a>

    <?php foreach ($pager->getLinks() as $page): ?>
      <?php if ($page == $pager->getPage()): ?>
        <?php echo $page ?>
      <?php else: ?>
            <a href="#" onclick="paginar(<?php echo $page ?>)"><?php echo $page ?></a>
      <?php endif; ?>
    <?php endforeach; ?>

    <a href="#" onclick="paginar(<?php echo $pager->getNextPage() ?>)">
      <img src="/images1/next.png" alt="Siguiente página" title="Siguiente página" />
    </a>

    <a href="#" onclick="paginar(<?php echo $pager->getLastPage() ?>)">
      <img src="/images1/last.png" alt="Última página" title="Última página" />
    </a>
  </div>
<?php endif; ?>

<?php $time[] = $timer->addTime(); ?>
<?php $timer->startTimer(); ?>
<?php $time[] = $timer->getElapsedTime(); ?>

<table>
    <?php foreach ($time as $t): ?>
    <tr>
        <td><?php echo $t ?></td>
    </tr>
    <?php endforeach; ?>    
</table>