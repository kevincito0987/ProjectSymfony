<!DOCTYPE html>
<html>
  <head>
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <title>Mi Proyecto Symfony con Bootstrap</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <?php include_stylesheets() ?>
    <?php include_javascripts() ?>
  </head>
  <body>
    <nav class="navbar navbar-dark bg-dark mb-4">
      <div class="container">
        <a class="navbar-brand" href="#">Symfony + Twig + Bootstrap</a>
      </div>
    </nav>

    <div class="container">
      <?php echo $sf_content ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>