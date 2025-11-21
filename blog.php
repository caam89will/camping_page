<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es" data-theme="light">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Blog Outdoor | Aventuras y Consejos</title>
  <meta name="description" content="Explora artículos, historias y consejos para disfrutar al máximo tus experiencias al aire libre.">
  <link rel="stylesheet" href="css/style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
  <!-- Placeholder para el Navbar -->
  <div id="header-placeholder"></div>

  <!-- HERO BLOG -->
  <section class="hero text-center text-white" style="background-image: url('assets/images/blog-hero.png'); background-size: cover; background-position: center; padding-top: 56px;">
    <div class="container py-5">
      <h1 class="display-4 fw-bold">Blog Outdoor</h1>
      <p class="lead mb-4">Consejos, historias y experiencias de camping y aventura</p>
    </div>
  </section>

  <!-- ARTÍCULOS DEL BLOG -->
  <section class="py-5">
    <div class="container">
      <h2 class="fw-bold text-center mb-5">Últimos Artículos</h2>
      <div class="row g-4" id="blog-posts-container">
        <!-- Los artículos se cargarán aquí dinámicamente -->
        <div class="text-center">
          <div class="spinner-border text-success" role="status">
            <span class="visually-hidden">Cargando artículos...</span>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- SUSCRIPCIÓN -->
  <section class="py-5 bg-success text-white text-center">
    <div class="container">
      <h2 class="fw-bold mb-3">¿Quieres más contenido como este?</h2>
      <p>Suscríbete para recibir nuestras mejores guías y consejos outdoor directamente en tu correo.</p>
      <form action="php/register.php" method="POST" class="d-flex justify-content-center mt-3">
        <input type="email" name="email" class="form-control w-50 me-2" placeholder="Tu correo electrónico" required>
        <button class="btn btn-dark">Suscribirme</button>
      </form>
    </div>
  </section>

  <!-- Placeholder para el Footer -->
  <div id="footer-placeholder"></div>

  <!-- Placeholder para la Barra de Productos Flotante -->
  <div id="showcase-placeholder"></div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="js/main.js"></script>
  <script>
    document.addEventListener("DOMContentLoaded", function() {
      const postsContainer = document.getElementById("blog-posts-container");
      
      fetch('data/blog.json')
        .then(response => response.json())
        .then(posts => {
          postsContainer.innerHTML = ''; // Limpiar el spinner
          posts.reverse().forEach(post => { // reverse() para mostrar el más reciente primero
            const postCard = document.createElement("div");
            postCard.className = "col-md-4";
            postCard.innerHTML = `
              <div class="card shadow-sm border-0 h-100">
                <img src="${post.imagen_destacada}" class="card-img-top" alt="${post.titulo}">
                <div class="card-body d-flex flex-column">
                  <h5 class="card-title fw-bold">${post.titulo}</h5>
                  <p class="card-text">${post.descripcion}</p>
                  <a href="post.php?id=${post.id}" class="btn btn-outline-success mt-auto">Leer más</a>
                </div>
              </div>
            `;
            postsContainer.appendChild(postCard);
          });
        })
        .catch(error => {
          console.error("Error cargando posts del blog:", error);
          postsContainer.innerHTML = '<p class="text-center">No se pudieron cargar los artículos. Inténtalo de nuevo más tarde.</p>';
        });
    });
  </script>
</body>
</html>