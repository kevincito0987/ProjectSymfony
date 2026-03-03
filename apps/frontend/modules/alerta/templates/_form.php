<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('alerta/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
  
  <?php if (!$form->getObject()->isNew()): ?>
    <input type="hidden" name="sf_method" value="put" />
  <?php endif; ?>

  <?php echo $form->renderHiddenFields(false) ?>
  <?php echo $form->renderGlobalErrors() ?>

  <div class="mb-3">
    <label class="form-label fw-bold"><?php echo $form['pais_id']->renderLabel('Seleccionar País') ?></label>
    <?php echo $form['pais_id']->render(array('class' => 'form-select')) ?>
    <div class="text-danger small"><?php echo $form['pais_id']->renderError() ?></div>
  </div>

  <div class="mb-3">
    <label class="form-label fw-bold"><?php echo $form['descripcion']->renderLabel('Detalle de la Alerta') ?></label>
    <?php echo $form['descripcion']->render(array('class' => 'form-control', 'rows' => '4', 'placeholder' => 'Describe la situación médica...')) ?>
    <div class="text-danger small"><?php echo $form['descripcion']->renderError() ?></div>
  </div>

  <div class="mb-4">
    <label class="form-label fw-bold"><?php echo $form['nivel_riesgo']->renderLabel('Nivel de Gravedad') ?></label>
    <?php echo $form['nivel_riesgo']->render(array('class' => 'form-select')) ?>
    <div class="text-danger small"><?php echo $form['nivel_riesgo']->renderError() ?></div>
  </div>

  <hr>

  <div class="d-flex justify-content-between align-items-center">
    <a href="<?php echo url_for('alerta/index') ?>" class="btn btn-outline-secondary">
      <i class="fas fa-arrow-left"></i> Volver al listado
    </a>
    
    <div>
      <?php if (!$form->getObject()->isNew()): ?>
        <?php echo link_to('<i class="fas fa-trash"></i> Eliminar', 'alerta/delete?id='.$form->getObject()->getId(), array('method' => 'delete', 'confirm' => '¿Estás seguro?', 'class' => 'btn btn-outline-danger me-2')) ?>
      <?php endif; ?>
      
      <button type="submit" class="btn btn-danger px-4 shadow-sm">
        <i class="fas fa-save"></i> Guardar Alerta
      </button>
    </div>
  </div>
</form>