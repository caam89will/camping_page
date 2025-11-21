<?php
// Obtenemos el ID del post desde la URL. Si no existe, por defecto es 1.
 $post_id = isset($_GET['id']) ? intval($_GET['id']) : 1;
?>
<!DOCTYPE html>
<html lang="es" data-theme="light">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Cargando artículo... | Blog Outdoor</title>
  <meta name="description" content="">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <!-- Placeholder para el Navbar -->
  <div id="header-placeholder"></div>

  <main class="blog-container my-5">
    <!-- El contenido del post se inyectará aquí por JavaScript -->
    <div id="post-content">
      <div class="text-center">
        <div class="spinner-border text-success" role="status">
          <span class="visually-hidden">Cargando...</span>
        </div>
        <p class="mt-2">Cargando artículo...</p>
      </div>
    </div>
  </main>

  <!-- Placeholder para el Footer -->
  <div id="footer-placeholder"></div>

  <!-- Placeholder para la Barra de Productos Flotante -->
  <div id="showcase-placeholder"></div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="js/main.js"></script>
  <script>
    document.addEventListener("DOMContentLoaded", function() {
      const postId = <?php echo $post_id; ?>;
      const postContentContainer = document.getElementById('post-content');

      fetch('data/blog.json')
        .then(response => response.json())
        .then(posts => {
          const post = posts.find(p => p.id === postId);

          if (post) {
            // Actualizar metadatos de la página
            document.title = `${post.titulo} | Blog Outdoor`;
            document.querySelector('meta[name="description"]').setAttribute('content', post.descripcion);

            // Construir el HTML del artículo
            let articleHTML = '';

            // Añadir video si existe
            if (post.video_url) {
              articleHTML += `
                <div class="text-center my-4">
                  <video controls autoplay muted loop class="rounded shadow-sm w-100" style="max-width: 600px;">
                    <source src="${post.video_url}" type="video/mp4">
                    Tu navegador no soporta la reproducción de video.
                  </video>
                </div>`;
            }

            articleHTML += `
              <header class="text-center mb-4">
                <h1 class="display-5 fw-bold">${post.titulo}</h1>
                <p class="lead text-muted">${post.descripcion}</p>
                <small class="text-muted">Por ${post.autor} el ${post.fecha}</small>
              </header>
              <article>
                ${post.contenido_html}
              </article>
            `;

            // Añadir sección de afiliado si existe
            if (post.affiliate_link) {
              articleHTML += `
                <div class="text-center my-5 p-4 bg-light rounded">
                  <h4>Producto Recomendado</h4>
                  <img src="${post.affiliate_image}" class="blog-img rounded shadow-sm mb-3" alt="Producto recomendado">
                  <br>
                  <a href="${post.affiliate_link}" target="_blank" class="btn btn-success btn-lg shadow-sm">
                    ${post.affiliate_button_text}
                  </a>
                </div>
              `;
            }
            
            postContentContainer.innerHTML = articleHTML;

          } else {
            // Mostrar error si no se encuentra el post
            postContentContainer.innerHTML = `
              <div class="alert alert-danger" role="alert">
                <h1>Artículo no encontrado</h1>
                <p>Lo sentimos, el artículo que buscas no existe o ha sido eliminado.</p>
                <a href="blog.php" class="btn btn-secondary">Volver al Blog</a>
              </div>
            `;
          }
        })
        .catch(error => {
          console.error("Error cargando el post:", error);
          postContentContainer.innerHTML = '<p>Error al cargar el artículo. Por favor, inténtalo de nuevo más tarde.</p>';
        });
    });
  </script>
</body>
</html>