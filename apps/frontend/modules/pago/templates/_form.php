<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('pago/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id_pago='.$form->getObject()->getIdPago() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <table>
    <tfoot>
      <tr>
        <td colspan="2">
          
          <?php if (!$form->getObject()->isNew()): ?>
            &nbsp;<?php echo link_to('BORRAR', 'pago/delete?id_pago='.$form->getObject()->getIdPago(), array('method' => 'delete', 'confirm' => '¿Esta seguro de ELIMINAR el PAGO?')) ?>
          <?php endif; ?>
            <input type="submit" value="GUARDAR" />
        </td>
      </tr>
    </tfoot>
    <tbody>
        <?php echo $form['id_cuota']->render() ?>
        <?php echo $form['id_tipo_pago']->renderRow() ?>
        <?php echo $form->getObject()->isNew() ? '': $form['fecha_pago']->renderRow() ?>
        <?php echo $form['monto_pago']->renderRow() ?>
        <?php echo $form['id_pago']->render() ?>
        <?php echo $form['_csrf_token']->render() ?>
      <?php //echo $form ?>
    </tbody>
  </table>
</form>
