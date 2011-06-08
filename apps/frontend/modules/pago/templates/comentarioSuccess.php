    <div class="triangle">
    <div class="triangleblue">
    <div style="margin-left: 15px; padding-top: 3px; padding-bottom: 3px; text-align: left;"><span class="headerwhite">
    COMENTARIO
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
        <form action="<?php echo url_for('pago/comentario?id_cuota='.$form->getObject()->getIdCuota()) ?>" method="post">
            <?php echo $form['comentario_cuota'] ?>
            <?php echo $form['id_cuota'] ?>
            <?php echo $form['_csrf_token'] ?>
            <input type="submit" value="GUARDAR" />
        </form>

    

    </div>
    </div>