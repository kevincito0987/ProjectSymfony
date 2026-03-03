<div class="card shadow mt-4">
  <div class="card-header bg-secondary text-white"><h3>Listado de Continentes</h3></div>
  <div class="card-body">
    <div class="row">
      <?php foreach ($continentes as $continente): ?>
        <div class="col-md-4 mb-3">
          <div class="border p-3 rounded text-center bg-light">
            <i class="fas fa-globe-americas fa-2x text-primary mb-2"></i>
            <h5><?php echo $continente->getNombre() ?></h5>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</div>