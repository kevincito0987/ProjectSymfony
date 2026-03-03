<div class="card shadow mt-4">
  <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
    <h3 class="mb-0">Listado de Países</h3>
    <a href="<?php echo url_for('test/sincronizar') ?>" class="btn btn-sm btn-outline-light">
       <i class="fas fa-sync-alt"></i> Sincronizar API
    </a>
  </div>
  <div class="card-body">
    <div class="row">
      <?php if (count($paises) > 0): ?>
        <?php foreach ($paises as $pais): ?>
          <div class="col-md-4 mb-3">
            <div class="border p-3 rounded text-center bg-light h-100 shadow-sm">
              <i class="fas fa-flag fa-2x text-primary mb-2"></i>
              <h5 class="fw-bold"><?php echo $pais->getNombre() ?></h5>
              
              <?php if ($pais->getContinente()): ?>
                <span class="badge bg-info text-dark mb-2">
                  <?php echo $pais->getContinente()->getNombre() ?>
                </span>
              <?php endif; ?>

              <div class="d-flex justify-content-around border-top pt-2">
                <div>
                  <small class="text-muted d-block" style="font-size: 0.7rem;">CASOS</small>
                  <span class="fw-bold text-primary"><?php echo number_format($pais->getCasosTotales()) ?></span>
                </div>
                <div class="border-start ps-3">
                  <small class="text-muted d-block" style="font-size: 0.7rem;">MUERTES</small>
                  <span class="fw-bold text-danger"><?php echo number_format($pais->getMuertes()) ?></span>
                </div>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      <?php else: ?>
        <div class="col-12 text-center py-5">
          <i class="fas fa-database fa-3x text-muted mb-3"></i>
          <p class="text-muted">No se encontraron países. Pulsa "Sincronizar API".</p>
        </div>
      <?php endif; ?>
    </div>
  </div>
</div>