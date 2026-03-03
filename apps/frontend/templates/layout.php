<!DOCTYPE html>
<html>
  <head>
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <title>Sistema de Salud Pro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4 shadow">
      <div class="container">
        <a class="navbar-brand" href="#"><i class="fas fa-medkit text-danger me-2"></i>HealthOS</a>
        <div class="navbar-nav">
          <a class="nav-link" href="/frontend_dev.php/test"><i class="fas fa-chart-line me-1"></i> Dashboard API</a>
          
          <a class="nav-link" href="/frontend_dev.php/pais"><i class="fas fa-flag me-1"></i> Países</a>
          
          <a class="nav-link" href="/frontend_dev.php/continente"><i class="fas fa-earth-americas me-1"></i> Continentes</a>
          
          <a class="nav-link" href="/frontend_dev.php/alerta"><i class="fas fa-bell me-1"></i> Alertas Médicas</a>
        </div>
      </div>
    </nav>

    <div class="container">
      <?php echo $sf_content ?>
    </div>
  </body>
</html>