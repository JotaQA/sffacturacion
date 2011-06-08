<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('notacredito/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id_nota_credito='.$form->getObject()->getIdNotaCredito() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <table>
    <tfoot>
      <tr>
        <td colspan="2">
          <?php echo $form->renderHiddenFields(false) ?>
          &nbsp;<a href="<?php echo url_for('notacredito/index') ?>">Back to list</a>
          <?php if (!$form->getObject()->isNew()): ?>
            &nbsp;<?php echo link_to('Delete', 'notacredito/delete?id_nota_credito='.$form->getObject()->getIdNotaCredito(), array('method' => 'delete', 'confirm' => 'Are you sure?')) ?>
          <?php endif; ?>
          <input type="submit" value="Save" />
        </td>
      </tr>
    </tfoot>
    <tbody>
      <?php echo $form->renderGlobalErrors() ?>
      <tr>
        <th><?php echo $form['id_estado_nota_credito']->renderLabel() ?></th>
        <td>
          <?php echo $form['id_estado_nota_credito']->renderError() ?>
          <?php echo $form['id_estado_nota_credito'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['numero_nota_credito']->renderLabel() ?></th>
        <td>
          <?php echo $form['numero_nota_credito']->renderError() ?>
          <?php echo $form['numero_nota_credito'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['numerofactura_nota_credito']->renderLabel() ?></th>
        <td>
          <?php echo $form['numerofactura_nota_credito']->renderError() ?>
          <?php echo $form['numerofactura_nota_credito'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['fechaingreso_nota_credito']->renderLabel() ?></th>
        <td>
          <?php echo $form['fechaingreso_nota_credito']->renderError() ?>
          <?php echo $form['fechaingreso_nota_credito'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['fechaemision_nota_credito']->renderLabel() ?></th>
        <td>
          <?php echo $form['fechaemision_nota_credito']->renderError() ?>
          <?php echo $form['fechaemision_nota_credito'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['neto_nota_credito']->renderLabel() ?></th>
        <td>
          <?php echo $form['neto_nota_credito']->renderError() ?>
          <?php echo $form['neto_nota_credito'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['total_nota_credito']->renderLabel() ?></th>
        <td>
          <?php echo $form['total_nota_credito']->renderError() ?>
          <?php echo $form['total_nota_credito'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['id_notapedido_nota_credito']->renderLabel() ?></th>
        <td>
          <?php echo $form['id_notapedido_nota_credito']->renderError() ?>
          <?php echo $form['id_notapedido_nota_credito'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['rut_nota_credito']->renderLabel() ?></th>
        <td>
          <?php echo $form['rut_nota_credito']->renderError() ?>
          <?php echo $form['rut_nota_credito'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['telefono_nota_credito']->renderLabel() ?></th>
        <td>
          <?php echo $form['telefono_nota_credito']->renderError() ?>
          <?php echo $form['telefono_nota_credito'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['nombre_estado_nota_credito']->renderLabel() ?></th>
        <td>
          <?php echo $form['nombre_estado_nota_credito']->renderError() ?>
          <?php echo $form['nombre_estado_nota_credito'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['direccion_nota_credito']->renderLabel() ?></th>
        <td>
          <?php echo $form['direccion_nota_credito']->renderError() ?>
          <?php echo $form['direccion_nota_credito'] ?>
        </td>
      </tr>
      <tr>
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
      </tr>
      <tr>
        <th><?php echo $form['giro_nota_credito']->renderLabel() ?></th>
        <td>
          <?php echo $form['giro_nota_credito']->renderError() ?>
          <?php echo $form['giro_nota_credito'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['oc_nota_credito']->renderLabel() ?></th>
        <td>
          <?php echo $form['oc_nota_credito']->renderError() ?>
          <?php echo $form['oc_nota_credito'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['condicionpago_nota_credito']->renderLabel() ?></th>
        <td>
          <?php echo $form['condicionpago_nota_credito']->renderError() ?>
          <?php echo $form['condicionpago_nota_credito'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['responsable_nota_credito']->renderLabel() ?></th>
        <td>
          <?php echo $form['responsable_nota_credito']->renderError() ?>
          <?php echo $form['responsable_nota_credito'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['comentarior_nota_credito']->renderLabel() ?></th>
        <td>
          <?php echo $form['comentarior_nota_credito']->renderError() ?>
          <?php echo $form['comentarior_nota_credito'] ?>
        </td>
      </tr>
    </tbody>
  </table>
</form>
