<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <?php //include_http_metas() ?>
    <?php //include_metas() ?>
    <?php //include_title() ?>
    <title>
      <?php if (!include_slot('title')): ?>
          ARTELAMP FACTURACIÓN
      <?php endif; ?>
    </title>
    
    <link rel="shortcut icon" href="/favicon.ico" />
    <?php include_stylesheets() ?>    
    <?php include_javascripts() ?>
  </head>
    <body>
      <div style="" id="banner" align="center">
      <div id="mensaje"></div>
      </div>
      <div id="divbody">
          <div id="divleft">
              <div id="navleftmenu">
                  <div id="LeftMNav">
                      <ul id="navmenu-v">
                          <li><div class="menuheader" id="menuheader"><img alt="" src="/images1/info_16.png"/>Menu Facturacion</div></li>
						  <li><a href="/artelamp/sffacturacion/web/pago" >Pagos</a></li>
						  <li><a href="/artelamp/sffacturacion/web/factura" >Facturas</a></li>
						  <li><a href="/artelamp/sffacturacion/web/notacredito" >Notas Credito</a></li>
						  <li><a href="/artelamp/index1.php?id=VmtaYVJrOVdRbEpRVkRBOStQ" >Volver al Sistema</a></li>
                      </ul>
                  </div>
              </div>
          </div>
          
        <?php echo $sf_content ?>
      </div>
      
  </body>
</html>
