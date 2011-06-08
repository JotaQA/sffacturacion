<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('factura/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id_factura='.$form->getObject()->getIdFactura() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <table>
    <tfoot>
      <tr>
        <td colspan="2">
          <?php echo $form->renderHiddenFields(false) ?>
          &nbsp;<a href="<?php echo url_for('factura/index') ?>">Back to list</a>
          <?php if (!$form->getObject()->isNew()): ?>
            &nbsp;<?php echo link_to('Delete', 'factura/delete?id_factura='.$form->getObject()->getIdFactura(), array('method' => 'delete', 'confirm' => 'Are you sure?')) ?>
          <?php endif; ?>
          <input type="submit" value="Save" />
        </td>
      </tr>
    </tfoot>
    <tbody>
      <?php echo $form->renderGlobalErrors() ?>
      <tr>
        <th><?php echo $form['id_estadofactura']->renderLabel() ?></th>
        <td>
          <?php echo $form['id_estadofactura']->renderError() ?>
          <?php echo $form['id_estadofactura'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['id_division']->renderLabel() ?></th>
        <td>
          <?php echo $form['id_division']->renderError() ?>
          <?php echo $form['id_division'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['numero_factura']->renderLabel() ?></th>
        <td>
          <?php echo $form['numero_factura']->renderError() ?>
          <?php echo $form['numero_factura'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['fechaingreso_factura']->renderLabel() ?></th>
        <td>
          <?php echo $form['fechaingreso_factura']->renderError() ?>
          <?php echo $form['fechaingreso_factura'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['fechaemision_factura']->renderLabel() ?></th>
        <td>
          <?php echo $form['fechaemision_factura']->renderError() ?>
          <?php echo $form['fechaemision_factura'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['monto_factura']->renderLabel() ?></th>
        <td>
          <?php echo $form['monto_factura']->renderError() ?>
          <?php echo $form['monto_factura'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['saldo_factura']->renderLabel() ?></th>
        <td>
          <?php echo $form['saldo_factura']->renderError() ?>
          <?php echo $form['saldo_factura'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['id_notapedido_factura']->renderLabel() ?></th>
        <td>
          <?php echo $form['id_notapedido_factura']->renderError() ?>
          <?php echo $form['id_notapedido_factura'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['rut_factura']->renderLabel() ?></th>
        <td>
          <?php echo $form['rut_factura']->renderError() ?>
          <?php echo $form['rut_factura'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['telefono_factura']->renderLabel() ?></th>
        <td>
          <?php echo $form['telefono_factura']->renderError() ?>
          <?php echo $form['telefono_factura'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['nombre_factura']->renderLabel() ?></th>
        <td>
          <?php echo $form['nombre_factura']->renderError() ?>
          <?php echo $form['nombre_factura'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['direccion_factura']->renderLabel() ?></th>
        <td>
          <?php echo $form['direccion_factura']->renderError() ?>
          <?php echo $form['direccion_factura'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['comuna_factura']->renderLabel() ?></th>
        <td>
          <?php echo $form['comuna_factura']->renderError() ?>
          <?php echo $form['comuna_factura'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['ciudad_factura']->renderLabel() ?></th>
        <td>
          <?php echo $form['ciudad_factura']->renderError() ?>
          <?php echo $form['ciudad_factura'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['giro_factura']->renderLabel() ?></th>
        <td>
          <?php echo $form['giro_factura']->renderError() ?>
          <?php echo $form['giro_factura'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['oc_factura']->renderLabel() ?></th>
        <td>
          <?php echo $form['oc_factura']->renderError() ?>
          <?php echo $form['oc_factura'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['condicionpago_factura']->renderLabel() ?></th>
        <td>
          <?php echo $form['condicionpago_factura']->renderError() ?>
          <?php echo $form['condicionpago_factura'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['responsable_factura']->renderLabel() ?></th>
        <td>
          <?php echo $form['responsable_factura']->renderError() ?>
          <?php echo $form['responsable_factura'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['comentario_factura']->renderLabel() ?></th>
        <td>
          <?php echo $form['comentario_factura']->renderError() ?>
          <?php echo $form['comentario_factura'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['tipo_factura']->renderLabel() ?></th>
        <td>
          <?php echo $form['tipo_factura']->renderError() ?>
          <?php echo $form['tipo_factura'] ?>
        </td>
      </tr>
    </tbody>
  </table>
</form>
