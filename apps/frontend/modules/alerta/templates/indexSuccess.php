<div class="card shadow mt-4">
  <div class="card-header bg-danger text-white d-flex justify-content-between align-items-center">
    <h3 class="mb-0"><i class="fas fa-exclamation-triangle me-2"></i>Alertas Médicas Activas</h3>
    <a href="<?php echo url_for('alerta/new') ?>" class="btn btn-light btn-sm fw-bold">
      <i class="fas fa-plus"></i> Nueva Alerta
    </a>
  </div>
  <div class="card-body bg-light">
    <div class="row">
      <?php if (count($alerta_medicas) > 0): ?>
        <?php foreach ($alerta_medicas as $alerta): ?>
          <div class="col-md-6 mb-4">
            <div class="card h-100 border-start border-4 shadow-sm 
              <?php echo $alerta->getNivelRiesgo() == 'Alto' ? 'border-danger' : ($alerta->getNivelRiesgo() == 'Medio' ? 'border-warning' : 'border-info') ?>">
              
              <div class="card-body">
                <div class="d-flex justify-content-between align-items-start mb-2">
                  <h5 class="card-title fw-bold text-dark mb-0">
                    <i class="fas fa-map-marker-alt text-secondary me-1"></i>
                    <?php echo $alerta->getPaisSalud()->getNombre() ?>
                  </h5>
                  <span class="badge <?php echo $alerta->getNivelRiesgo() == 'Alto' ? 'bg-danger' : ($alerta->getNivelRiesgo() == 'Medio' ? 'bg-warning text-dark' : 'bg-info text-dark') ?>">
                    Riesgo <?php echo $alerta->getNivelRiesgo() ?>
                  </span>
                </div>
                
                <p class="card-text text-muted mb-3">
                  <?php echo $alerta->getDescripcion() ?>
                </p>
                
                <div class="border-top pt-2 d-flex justify-content-end">
                  <a href="<?php echo url_for('alerta/edit?id='.$alerta->getId()) ?>" class="btn btn-outline-primary btn-sm me-2">
                    <i class="fas fa-edit"></i> Editar
                  </a>
                </div>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      <?php else: ?>
        <div class="col-12 text-center py-5">
          <i class="fas fa-notes-medical fa-4x text-muted mb-3"></i>
          <h4 class="text-muted">No hay alertas registradas actualmente</h4>
          <p>Las alertas que crees para los países aparecerán aquí.</p>
        </div>
      <?php endif; ?>
    </div>
  </div>
</div>