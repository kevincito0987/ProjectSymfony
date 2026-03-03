<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('pais/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->get() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <table>
    <tfoot>
      <tr>
        <td colspan="2">
          <?php echo $form->renderHiddenFields(false) ?>
          &nbsp;<a href="<?php echo url_for('pais/index') ?>">Back to list</a>
          <?php if (!$form->getObject()->isNew()): ?>
            &nbsp;<?php echo link_to('Delete', 'pais/delete?id='.$form->getObject()->get(), array('method' => 'delete', 'confirm' => 'Are you sure?')) ?>
          <?php endif; ?>
          <input type="submit" value="Save" />
        </td>
      </tr>
    </tfoot>
    <tbody>
      <?php echo $form->renderGlobalErrors() ?>
      <tr>
        <th><?php echo $form['continente_id']->renderLabel() ?></th>
        <td>
          <?php echo $form['continente_id']->renderError() ?>
          <?php echo $form['continente_id'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['nombre']->renderLabel() ?></th>
        <td>
          <?php echo $form['nombre']->renderError() ?>
          <?php echo $form['nombre'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['casos_totales']->renderLabel() ?></th>
        <td>
          <?php echo $form['casos_totales']->renderError() ?>
          <?php echo $form['casos_totales'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['muertes']->renderLabel() ?></th>
        <td>
          <?php echo $form['muertes']->renderError() ?>
          <?php echo $form['muertes'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['codigo_iso']->renderLabel() ?></th>
        <td>
          <?php echo $form['codigo_iso']->renderError() ?>
          <?php echo $form['codigo_iso'] ?>
        </td>
      </tr>
    </tbody>
  </table>
</form>
