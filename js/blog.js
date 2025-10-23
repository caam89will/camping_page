document.addEventListener("DOMContentLoaded", () => {
  const container = document.getElementById("blog-container");

  fetch("data/blog.json")
    .then(res => res.json())
    .then(posts => {
      posts.forEach(post => {
        const card = document.createElement("div");
        card.classList.add("col-md-4");
        card.innerHTML = `
          <div class="card shadow-sm border-0 guia-card">
            <img src="${post.imagen}" class="card-img-top" alt="${post.titulo}">
            <div class="card-body">
              <h5 class="card-title">${post.titulo}</h5>
              <p class="card-text">${post.descripcion}</p>
              <a href="${post.url}" class="btn btn-outline-success">Leer más</a>
            </div>
          </div>
        `;
        container.appendChild(card);
      });
    })
    .catch(err => console.error("Error cargando blog:", err));
});
