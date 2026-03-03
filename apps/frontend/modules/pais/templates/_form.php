<form action="<?php echo url_for('pais/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post">
  <?php if (!$form->getObject()->isNew()): ?>
    <input type="hidden" name="sf_method" value="put" />
  <?php endif; ?>

  <?php echo $form->renderHiddenFields(false) ?>

  <div class="mb-3">
    <label class="form-label fw-bold">Nombre del País</label>
    <?php echo $form['nombre']->render(array('class' => 'form-control')) ?>
  </div>

  <div class="row mb-3">
    <div class="col-md-6">
      <label class="form-label fw-bold">Casos Totales</label>
      <?php echo $form['casos_totales']->render(array('class' => 'form-control')) ?>
    </div>
    <div class="col-md-6">
      <label class="form-label fw-bold">Muertes</label>
      <?php echo $form['muertes']->render(array('class' => 'form-control')) ?>
    </div>
  </div>

  <div class="mb-3">
    <label class="form-label fw-bold">Continente</label>
    <?php echo $form['continente_id']->render(array('class' => 'form-select')) ?>
  </div>

  <div class="mb-4">
    <label class="form-label fw-bold">Código ISO (3 letras)</label>
    <?php echo $form['codigo_iso']->render(array('class' => 'form-control', 'placeholder' => 'Ej: ARG')) ?>
  </div>

  <div class="d-flex justify-content-between">
    <a href="<?php echo url_for('pais/index') ?>" class="btn btn-secondary">Cancelar</a>
    <button type="submit" class="btn btn-dark">Guardar País</button>
  </div>
</form>