<form>
    <fieldset>
        <table class="popupform">
        <tr>
            <th><?php echo $form['numero_nota_credito']->renderLabel() ?></th>
            <td>
                <?php echo $form['numero_nota_credito']->renderError() ?>
                <?php echo $form['numero_nota_credito'] ?>
            </td>
            <th><?php echo $form['rut_nota_credito']->renderLabel() ?></th>
            <td>
                <?php echo $form['rut_nota_credito']->renderError() ?>
                <?php echo $form['rut_nota_credito'] ?>
            </td>
        </tr>
        <tr>
            <th><?php echo $form['nombre_nota_credito']->renderLabel() ?></th>
            <td>
                <?php echo $form['nombre_nota_credito']->renderError() ?>
                <?php echo $form['nombre_nota_credito'] ?>
            </td>
            <th><?php echo $form['telefono_nota_credito']->renderLabel() ?></th>
            <td>
                <?php echo $form['telefono_nota_credito']->renderError() ?>
                <?php echo $form['telefono_nota_credito'] ?>
            </td>
        </tr>
        <tr>
            <th><?php echo $form['direccion_nota_credito']->renderLabel() ?></th>
            <td>
                <?php echo $form['direccion_nota_credito']->renderError() ?>
                <?php echo $form['direccion_nota_credito'] ?>
            </td>
            <th><?php echo $form['comuna_nota_credito']->renderLabel() ?></th>
            <td>
                <?php echo $form['comuna_nota_credito']->renderError() ?>
                <?php echo $form['comuna_nota_credito'] ?>
            </td>
        </tr>
        <tr>
            <th><?php echo $form['ciudad_nota_credito']->renderLabel() ?></th>
            <td>
                <?php echo $form['ciudad_nota_credito']->renderError() ?>
                <?php echo $form['ciudad_nota_credito'] ?>
            </td>
            <th><?php echo $form['giro_nota_credito']->renderLabel() ?></th>
            <td>
                <?php echo $form['giro_nota_credito']->renderError() ?>
                <?php echo $form['giro_nota_credito'] ?>
            </td>
        </tr>
        <tr>
            <th><?php echo $form['condicionpago_nota_credito']->renderLabel() ?></th>
            <td>
                <?php echo $form['condicionpago_nota_credito']->renderError() ?>
                <?php echo $form['condicionpago_nota_credito'] ?>
            </td>
            <th><?php echo $form['oc_nota_credito']->renderLabel() ?></th>
            <td>
                <?php echo $form['oc_nota_credito']->renderError() ?>
                <?php echo $form['oc_nota_credito'] ?>
            </td>
        </tr>
        <tr>
            <th><?php echo $form['responsable_nota_credito']->renderLabel() ?></th>
            <td>
                <?php echo $form['responsable_nota_credito']->renderError() ?>
                <?php echo $form['responsable_nota_credito'] ?>
            </td>
            <th><?php echo $form['numerofactura_nota_credito']->renderLabel() ?></th>
            <td>
                <?php echo $form['numerofactura_nota_credito']->renderError() ?>
                <?php echo $form['numerofactura_nota_credito'] ?>
            </td>
        </tr>
        <tr>
            <th><?php echo $form['comentarior_nota_credito']->renderLabel() ?></th>
            <td>
                <?php echo $form['comentarior_nota_credito']->renderError() ?>
                <?php echo $form['comentarior_nota_credito']->render(array('cols' => 25)) ?>
            </td>            
            <th><?php echo $form['fechaingreso_nota_credito']->renderLabel() ?></th>
            <td>
                <?php echo $form['fechaingreso_nota_credito']->renderError() ?>
                <?php echo $form['fechaingreso_nota_credito'] ?>
                <?php echo $form->renderHiddenFields(true) ?>
            </td>
        </tr>
    </table>
   </fieldset>
</form>