<?php use_helper('Number') ?>
<?php $sf_user->setCulture('es_CL') ?>
<div id="jsfactura" style="display: none"><?php echo url_for('factura/index') ?></div>
<div id="divmid">

<!--    <h1>Existencias</h1>-->
    <div class="triangle">
    <div class="triangleblue">
    <div style="margin-left: 15px; padding-top: 3px; padding-bottom: 3px; text-align: left;"><span class="headerwhite">
    LISTA FACTURAS <span style="font-size: smaller">v1.1</span>
    </span>
    </div>
    </div>
    </div>
    <!--End 1st layer top right corner blue-->
    <!--Begin 2nd layer top right corner blue-->
    <div class="triangle2">
    <div class="triangleblue">
    <div style="margin-left: 15px; padding: 5px;">
    </div>
    </div>
    </div>
    <!--End 2nd layer top right corner blue-->

    <!--Begin content1-->
    <div class="midcontent">
    <div class="divmiddle">

<?php include_partial('factura/listfactura', array('pager' => $pager)) ?>

     </div>
    </div>
</div>

<div id="divright">
    <div id="navright">
        <!--Begin 1st layer top right corner blue-->


            <div class="triangle3">
                    <div class="triangleblue">
                            <div style="margin-left: 15px; padding-top: 3px; padding-bottom: 3px; text-align: left;">
                                    <span class="headerwhite">
                                            EMPRESA
                                    </span>
                            </div>
                    </div>
            </div>





            <div class="divmiddle2">
                    <div class="divmiddle1">
                            <br />
                            <?php echo $empresa['nombre_empresa']->render() ?>
                    </div>
            </div>
            <br />


            <div class="triangle3">
                    <div class="triangleblue">
                            <div style="margin-left: 15px; padding-top: 3px; padding-bottom: 3px; text-align: left;">
                                    <span class="headerwhite">
                                            FILTRO
                                    </span>
                            </div>
                    </div>
            </div>

            <div class="divmiddle2">
                    <div class="divmiddle1">
                        <br />
                        <h2>FECHA EMISION<img id="loader-fecha" alt="cargando" style="vertical-align: middle; display: none" src="/images1/ajax-loader-white.gif" /></h2>
                            <input type="text" id="datepicker1" size="9" readonly value="<?php echo date('d/m/Y',time() - 1 * 24 * 60 * 60) ?>"> ->
                            <input type="text" id="datepicker2" size="9" readonly value="<?php echo date('d/m/Y',time() + 3 * 24 * 60 * 60) ?>">
                            <br />
                            <br />
                            <h2>CLIENTE</h2>
                            <div class="search">
                                      <input type="text" value="<?php echo $sf_request->getParameter('query') ?>" name="query" id="search_cliente" />
                            </div>

                            <div id="clientes"></div>
                    </div>
            </div>

   </div>
</div>

