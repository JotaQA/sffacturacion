<form id="ingresoNDpopup">
    <fieldset>
        <table class="popupform">
        <tr>
            <th><?php echo $form['numero_nota_debito']->renderLabel() ?></th>
            <td>
                <?php echo $form['numero_nota_debito']->renderError() ?>
                <?php echo $form['numero_nota_debito'] ?>
            </td>
            <th><?php echo $form['rut_nota_debito']->renderLabel() ?></th>
            <td>
                <?php echo $form['rut_nota_debito']->renderError() ?>
                <?php echo $form['rut_nota_debito']->render(array('size' => 16)) ?>
            </td>
        </tr>
        <tr>
            <th><?php echo $form['nombre_nota_debito']->renderLabel() ?></th>
            <td>
                <?php echo $form['nombre_nota_debito']->renderError() ?>
                <?php echo $form['nombre_nota_debito']->render(array('size' => 25)) ?>
            </td>
            <th><?php echo $form['telefono_nota_debito']->renderLabel() ?></th>
            <td>
                <?php echo $form['telefono_nota_debito']->renderError() ?>
                <?php echo $form['telefono_nota_debito']->render(array('size' => 16)) ?>
            </td>
        </tr>
        <tr>
            <th><?php echo $form['direccion_nota_debito']->renderLabel() ?></th>
            <td>
                <?php echo $form['direccion_nota_debito']->renderError() ?>
                <?php echo $form['direccion_nota_debito']->render(array('size' => 30)) ?>
            </td>
            <th><?php echo $form['comuna_nota_debito']->renderLabel() ?></th>
            <td>
                <?php echo $form['comuna_nota_debito']->renderError() ?>
                <?php echo $form['comuna_nota_debito'] ?>
            </td>
        </tr>
        <tr>
            <th><?php echo $form['ciudad_nota_debito']->renderLabel() ?></th>
            <td>
                <?php echo $form['ciudad_nota_debito']->renderError() ?>
                <?php echo $form['ciudad_nota_debito'] ?>
            </td>
            <th><?php echo $form['giro_nota_debito']->renderLabel() ?></th>
            <td>
                <?php echo $form['giro_nota_debito']->renderError() ?>
                <?php echo $form['giro_nota_debito'] ?>
            </td>
        </tr>
        <tr>
            <th><?php echo $form['condicionpago_nota_debito']->renderLabel() ?></th>
            <td>
                <?php echo $form['condicionpago_nota_debito']->renderError() ?>
                <?php echo $form['condicionpago_nota_debito']->render(array('size' => 30)) ?>
            </td>
            <th><?php echo $form['oc_nota_debito']->renderLabel() ?></th>
            <td>
                <?php echo $form['oc_nota_debito']->renderError() ?>
                <?php echo $form['oc_nota_debito'] ?>
            </td>
        </tr>
        <tr>
            <th><?php echo $form['responsable_nota_debito']->renderLabel() ?></th>
            <td>
                <?php echo $form['responsable_nota_debito']->renderError() ?>
                <?php echo $form['responsable_nota_debito'] ?>
            </td>
            <th><?php echo $form['numerofactura_nota_debito']->renderLabel() ?></th>
            <td>
                <?php echo $form['numerofactura_nota_debito']->renderError() ?>
                <?php echo $form['numerofactura_nota_debito'] ?>
            </td>
        </tr>
        <tr>
            <th><?php echo $form['comentarior_nota_debito']->renderLabel() ?></th>
            <td>
                <?php echo $form['comentarior_nota_debito']->renderError() ?>
                <?php echo $form['comentarior_nota_debito']->render(array('cols' => 25)) ?>
            </td>            
            <th><?php echo $form['fechaemision_nota_debito']->renderLabel() ?></th>
            <td>
                <?php echo $form['fechaemision_nota_debito']->renderError() ?>
                <?php echo $form['fechaemision_nota_debito']->render(array('size' => 12)) ?>
            </td>
        </tr>
        <tr>
            <th><?php echo $form['codref_nota_debito']->renderLabel() ?></th>
            <td>
                <?php echo $form['codref_nota_debito']->renderError() ?>
                <?php echo $form['codref_nota_debito']->render(array('size' => 6)) ?>
            </td>
            <th><?php echo $form['neto_nota_debito']->renderLabel() ?></th>
            <td>
                <?php echo $form['neto_nota_debito']->renderError() ?>
                <?php echo $form['neto_nota_debito']->render() ?>
            </td>            
            
        </tr>
        <tr>
            <th><?php echo $form['id_notapedido_nota_debito']->renderLabel() ?></th>
            <td>
                <?php echo $form['id_notapedido_nota_debito']->renderError() ?>
                <?php echo $form['id_notapedido_nota_debito']->render() ?>
                <?php echo $form->renderHiddenFields(true) ?>
            </td>
            <th><?php echo $form['total_nota_debito']->renderLabel() ?></th>
            <td>
                <?php echo $form['total_nota_debito']->renderError() ?>
                <?php echo $form['total_nota_debito']->render() ?>
            </td>
        </tr>
    </table>
   </fieldset>
</form>