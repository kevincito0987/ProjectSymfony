<div class="card shadow mt-4">
  <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
    <h3 class="mb-0"><i class="fas fa-globe-americas me-2"></i>Gestión de Continentes</h3>
    <a href="<?php echo url_for('continente/new') ?>" class="btn btn-light btn-sm fw-bold">
      <i class="fas fa-plus"></i> Añadir Continente
    </a>
  </div>
  <div class="card-body">
    <div class="row text-center">
      <?php foreach ($continentes as $continente): ?>
        <div class="col-md-4 mb-4">
          <div class="card h-100 border-0 shadow-sm">
            <div class="card-body p-4">
              <i class="fas fa-globe-asia fa-3x text-primary mb-3"></i>
              <h4 class="fw-bold mb-3"><?php echo $continente->getNombre() ?></h4>
              
              <div class="btn-group w-100">
                <a href="<?php echo url_for('continente/edit?id='.$continente->getId()) ?>" class="btn btn-outline-secondary btn-sm">
                  <i class="fas fa-edit"></i> Editar
                </a>
                <?php echo link_to('<i class="fas fa-trash"></i>', 'continente/delete?id='.$continente->getId(), array('method' => 'delete', 'confirm' => '¿Eliminar este continente?', 'class' => 'btn btn-outline-danger btn-sm')) ?>
              </div>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</div>