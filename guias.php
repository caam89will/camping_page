<!DOCTYPE html>
<html lang="es" data-theme="light">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Guías y Consejos Outdoor | Aventuras en la Montaña</title>
  <meta name="description" content="Aprende técnicas de supervivencia, equipamiento y consejos útiles para tus aventuras en montaña, camping o búsqueda de oro.">
  <link rel="stylesheet" href="css/style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <!-- Placeholder para el Navbar -->
  <div id="header-placeholder"></div>

  <!-- HERO -->
  <section class="hero text-center text-white" style="background-image: url('assets/images/camping-hero.png'); background-size: cover; background-position: center; padding-top: 56px;">
    <div class="container py-5">
      <h1 class="display-4 fw-bold">Guías y Consejos Outdoor</h1>
      <p class="lead mb-4">Supervivencia, equipo y aventuras reales en la naturaleza.</p>
    </div>
  </section>

  <!-- VIDEO INFORMATIVO -->
  <section class="video-section text-center bg-light py-5" style="padding-top: 0 !important;">
    <div class="container">
      <h2 class="fw-bold mb-4">Prepárate para cualquier aventura</h2>
      <p class="mb-4">Descubre cómo elegir el equipo correcto, mantenerte seguro y sacar el máximo provecho de cada expedición, ya sea en la montaña o en la búsqueda de oro.</p>
      <div class="ratio ratio-16x9 shadow-lg">
        <iframe src="https://www.youtube.com/embed/dQw4w9WgXcQ" 
                title="Video sobre supervivencia y camping" 
                allowfullscreen></iframe>
      </div>
    </div>
  </section>

  <!-- GUÍAS -->
  <section id="guias" class="py-5">
    <div class="container">
      <h2 class="fw-bold mb-4 text-center">Guías Destacadas</h2>
      <div class="row g-4">
        
        <!-- GUÍA 1 -->
        <div class="col-md-4">
          <div class="card shadow-sm border-success">
            <img src="assets/images/guia-supervivencia.png" class="card-img-top" alt="Supervivencia en la montaña">
            <div class="card-body">
              <h5 class="card-title fw-bold">Supervivencia en la Montaña</h5>
              <p class="card-text">
                Aprende cómo mantenerte a salvo ante climas extremos, orientarte sin tecnología y utilizar recursos naturales a tu favor.
                Conoce los esenciales como <strong>cocinillas portátiles, linternas solares y sacos térmicos</strong> que pueden salvarte la vida.
              </p>
              <a href="guia-supervivencia.php" class="btn btn-outline-success">Leer más</a>
            </div>
          </div>
        </div>

        <!-- GUÍA 2 -->
        <div class="col-md-4">
          <div class="card shadow-sm border-warning">
            <img src="assets/images/guia-oro.png" class="card-img-top" alt="Búsqueda de oro y detección de metales">
            <div class="card-body">
              <h5 class="card-title fw-bold">Búsqueda de Oro con Detector de Metales</h5>
              <p class="card-text">
                Si planeas una <strong>expedición a la sierra o zonas mineras</strong>, descubre qué equipo necesitas: detectores de metales profesionales,
                carpas impermeables y mochilas resistentes para almacenar tus hallazgos.
              </p>
              <a href="guia-oro.php" class="btn btn-outline-warning">Leer más</a>
            </div>
          </div>
        </div>

        <!-- GUÍA 3 -->
        <div class="col-md-4">
          <div class="card shadow-sm border-info">
            <img src="assets/images/guia-descanso.png" class="card-img-top" alt="Descanso y comodidad en el campamento">
            <div class="card-body">
              <h5 class="card-title fw-bold">Dormir Cómodo al Aire Libre</h5>
              <p class="card-text">
                Un buen descanso garantiza tu energía. Explora opciones de <strong>colchones inflables, sacos de dormir térmicos y aislantes de suelo</strong> que te harán dormir como en casa, incluso bajo las estrellas.
              </p>
              <a href="guia-descanso.php" class="btn btn-outline-info">Leer más</a>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- Placeholder para el Footer -->
  <div id="footer-placeholder"></div>

  <!-- Placeholder para la Barra de Productos Flotante -->
  <div id="showcase-placeholder"></div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="js/main.js"></script>
</body>
</html>
