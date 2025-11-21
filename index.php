<?php
session_start(); // Necesario para leer los mensajes de sesión
?>
<!DOCTYPE html>
<html lang="es" data-theme="light">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tienda Outdoor | Productos y Guías de Camping</title>
  <meta name="description" content="Encuentra los mejores productos y consejos para tus aventuras de camping. Reseñas, ofertas y guías para disfrutar la naturaleza al máximo.">
  <meta name="google-site-verification" content="googlebcdb98dc7da59ff6" />

  <!-- CSS principal -->
  <link rel="stylesheet" href="css/style.css">

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
  <!-- Placeholder para el Navbar -->
  <div id="header.html-placeholder"></div>

  <?php if(isset($_SESSION['message'])): ?>
    <div class="alert alert-<?php echo $_SESSION['message_type']; ?> alert-dismissible fade show text-center m-0" role="alert" style="position: fixed; top: 56px; width: 100%; z-index: 1031;">
      <?php echo $_SESSION['message']; ?>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php 
      unset($_SESSION['message']);
      unset($_SESSION['message_type']);
    ?>
  <?php endif; ?>

  <!-- HERO -->
  <section class="hero text-center text-white" style="background-image: url('assets/images/camping-hero.png'); background-size: cover; background-position: center; padding-top: 56px; margin-top: 0;">
    <div class="container py-5">
      <h1 class="display-4 fw-bold">Explora. Descubre. Conecta con la naturaleza.</h1>
      <p class="lead mb-4">Los mejores productos y consejos para vivir tu próxima aventura al aire libre.</p>
      <a href="#productos" class="btn btn-success btn-lg">Ver Equipamiento</a>
    </div>
  </section>

  <!-- PRODUCTOS DESTACADOS -->
  <section id="productos" class="py-5 bg-light">
    <div class="container text-center">
      <h2 class="fw-bold mb-4">Productos Destacados</h2>
      <div class="row g-4" id="productos-container">
        <!-- Los productos se cargarán dinámicamente desde data/productos.json -->
      </div>
    </div>
  </section>

  <!-- GUÍAS -->
  <section id="guias" class="py-5">
    <div class="container text-center">
      <h2 class="fw-bold mb-4">Guías y Consejos</h2>
      <div class="row g-4">
        <div class="col-md-4">
          <h5 class="fw-bold">Cómo elegir tu carpa ideal</h5>
          <p>Aprende qué factores considerar al momento de comprar una carpa según el clima y tipo de terreno.</p>
          <a href="blog.php" class="text-success fw-semibold">Leer más →</a>
        </div>
        <div class="col-md-4">
          <h5 class="fw-bold">Checklist esencial para acampar</h5>
          <p>No olvides nada en tu próxima aventura con esta lista práctica de imprescindibles.</p>
          <a href="blog.php" class="text-success fw-semibold">Leer más →</a>
        </div>
        <div class="col-md-4">
          <h5 class="fw-bold">Curso online de supervivencia</h5>
          <p>Descubre técnicas de supervivencia y orientación con este curso digital de Hotmart.</p>
          <a href="blog.php" class="text-success fw-semibold">Acceder al curso →</a>
        </div>
      </div>
    </div>
  </section>

  <!-- CONTACTO -->
  <section id="contacto" class="py-5 text-center bg-dark text-white">
    <div class="container">
      <h2 class="fw-bold mb-3">Suscríbete y recibe ofertas</h2>
      <p>Recibe descuentos exclusivos y nuevas guías de camping.</p>
      <form action="php/register.php" method="POST" class="d-flex justify-content-center mt-3">
        <input type="email" name="email" class="form-control w-50 me-2" placeholder="Tu correo electrónico" required>
        <button class="btn btn-success">Suscribirme</button>
      </form>
    </div>
  </section>

  <!-- Placeholder para el Footer -->
  <div id="footer-placeholder"></div>

  <!-- Placeholder para la Barra de Productos Flotante -->
  <div id="showcase-placeholder"></div>

  <!-- JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="js/main.js"></script>
</body>
</html>
