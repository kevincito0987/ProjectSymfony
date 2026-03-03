<div class="card shadow mt-4">
  <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
    <h3 class="mb-0"><i class="fas fa-globe me-2"></i>Listado de Países</h3>
    <div>
      <a href="<?php echo url_for('pais/new') ?>" class="btn btn-success btn-sm">
        <i class="fas fa-plus"></i> Nuevo País
      </a>
    </div>
  </div>
  <div class="card-body">
    <div class="row">
      <?php if (count($paises) > 0): ?>
        <?php foreach ($paises as $pais): ?>
          <div class="col-md-4 mb-4">
            <div class="card h-100 shadow-sm border-0 bg-light">
              <div class="card-body text-center">
                <i class="fas fa-flag fa-3x text-primary mb-2"></i>
                <h5 class="fw-bold mb-1"><?php echo $pais->getNombre() ?></h5>
                
                <?php if ($pais->getContinente()): ?>
                  <span class="badge bg-info text-dark mb-3">
                    <?php echo $pais->getContinente()->getNombre() ?>
                  </span>
                <?php endif; ?>

                <div class="d-flex justify-content-around border-top border-bottom py-2 mb-3">
                  <div>
                    <small class="text-muted d-block text-uppercase" style="font-size: 0.65rem;">Casos</small>
                    <span class="fw-bold text-primary"><?php echo number_format($pais->getCasosTotales()) ?></span>
                  </div>
                  <div class="border-start ps-3">
                    <small class="text-muted d-block text-uppercase" style="font-size: 0.65rem;">Muertes</small>
                    <span class="fw-bold text-danger"><?php echo number_format($pais->getMuertes()) ?></span>
                  </div>
                </div>

                <div class="d-flex justify-content-center gap-2">
                  <a href="<?php echo url_for('pais/edit?id='.$pais->getId()) ?>" class="btn btn-sm btn-outline-secondary">
                    <i class="fas fa-edit"></i>
                  </a>
                  <?php echo link_to('<i class="fas fa-trash"></i>', 'pais/delete?id='.$pais->getId(), array('method' => 'delete', 'confirm' => '¿Eliminar este país?', 'class' => 'btn btn-sm btn-outline-danger')) ?>
                </div>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      <?php else: ?>
        <?php endif; ?>
    </div>
  </div>
</div>