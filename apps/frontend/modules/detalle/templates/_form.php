<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('detalle/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id_detalle_activo='.$form->getObject()->getIdDetalleActivo() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <table>
    <tfoot>
      <tr>
        <td colspan="2">
          <?php echo $form->renderHiddenFields(false) ?>
          &nbsp;<a href="<?php echo url_for('detalle/index') ?>">Back to list</a>
          <?php if (!$form->getObject()->isNew()): ?>
            &nbsp;<?php echo link_to('Delete', 'detalle/delete?id_detalle_activo='.$form->getObject()->getIdDetalleActivo(), array('method' => 'delete', 'confirm' => 'Are you sure?')) ?>
          <?php endif; ?>
          <input type="submit" value="Save" />
        </td>
      </tr>
    </tfoot>
    <tbody>
      <?php echo $form->renderGlobalErrors() ?>
      <tr>
        <th><?php echo $form['id_boleta']->renderLabel() ?></th>
        <td>
          <?php echo $form['id_boleta']->renderError() ?>
          <?php echo $form['id_boleta'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['id_factura']->renderLabel() ?></th>
        <td>
          <?php echo $form['id_factura']->renderError() ?>
          <?php echo $form['id_factura'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['id_guia']->renderLabel() ?></th>
        <td>
          <?php echo $form['id_guia']->renderError() ?>
          <?php echo $form['id_guia'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['id_nota_credito']->renderLabel() ?></th>
        <td>
          <?php echo $form['id_nota_credito']->renderError() ?>
          <?php echo $form['id_nota_credito'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['id_salida']->renderLabel() ?></th>
        <td>
          <?php echo $form['id_salida']->renderError() ?>
          <?php echo $form['id_salida'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['id_salida_ac']->renderLabel() ?></th>
        <td>
          <?php echo $form['id_salida_ac']->renderError() ?>
          <?php echo $form['id_salida_ac'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['codigointerno_detalle_activo']->renderLabel() ?></th>
        <td>
          <?php echo $form['codigointerno_detalle_activo']->renderError() ?>
          <?php echo $form['codigointerno_detalle_activo'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['codigoexterno_detalle_activo']->renderLabel() ?></th>
        <td>
          <?php echo $form['codigoexterno_detalle_activo']->renderError() ?>
          <?php echo $form['codigoexterno_detalle_activo'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['cantidad_detalle_activo']->renderLabel() ?></th>
        <td>
          <?php echo $form['cantidad_detalle_activo']->renderError() ?>
          <?php echo $form['cantidad_detalle_activo'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['precio_detalle_activo']->renderLabel() ?></th>
        <td>
          <?php echo $form['precio_detalle_activo']->renderError() ?>
          <?php echo $form['precio_detalle_activo'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['fechaingreso_detalle_activo']->renderLabel() ?></th>
        <td>
          <?php echo $form['fechaingreso_detalle_activo']->renderError() ?>
          <?php echo $form['fechaingreso_detalle_activo'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['id_producto']->renderLabel() ?></th>
        <td>
          <?php echo $form['id_producto']->renderError() ?>
          <?php echo $form['id_producto'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['descripcioninterna_detalle_activo']->renderLabel() ?></th>
        <td>
          <?php echo $form['descripcioninterna_detalle_activo']->renderError() ?>
          <?php echo $form['descripcioninterna_detalle_activo'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['descripcionexterna_detalle_activo']->renderLabel() ?></th>
        <td>
          <?php echo $form['descripcionexterna_detalle_activo']->renderError() ?>
          <?php echo $form['descripcionexterna_detalle_activo'] ?>
        </td>
      </tr>
    </tbody>
  </table>
</form>
