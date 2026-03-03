<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('continente/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
  
  <?php if (!$form->getObject()->isNew()): ?>
    <input type="hidden" name="sf_method" value="put" />
  <?php endif; ?>

  <?php echo $form->renderHiddenFields(false) ?>
  <?php echo $form->renderGlobalErrors() ?>

  <div class="mb-4">
    <label class="form-label fw-bold"><?php echo $form['nombre']->renderLabel('Nombre del Continente') ?></label>
    <?php echo $form['nombre']->render(array('class' => 'form-control form-control-lg', 'placeholder' => 'Ej: Europa, Asia...')) ?>
    <div class="text-danger small mt-1">
      <?php echo $form['nombre']->renderError() ?>
    </div>
  </div>

  <hr>

  <div class="d-flex justify-content-between align-items-center">
    <a href="<?php echo url_for('continente/index') ?>" class="btn btn-outline-secondary">
      <i class="fas fa-arrow-left"></i> Volver
    </a>
    
    <div>
      <?php if (!$form->getObject()->isNew()): ?>
        <?php echo link_to('<i class="fas fa-trash"></i>', 'continente/delete?id='.$form->getObject()->getId(), array('method' => 'delete', 'confirm' => '¿Estás seguro?', 'class' => 'btn btn-outline-danger me-2')) ?>
      <?php endif; ?>
      
      <button type="submit" class="btn btn-primary px-4 shadow-sm">
        <i class="fas fa-save"></i> Guardar Continente
      </button>
    </div>
  </div>
</form>