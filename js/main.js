document.addEventListener("DOMContentLoaded", () => {
  const container = document.getElementById("productos-container");

  fetch("data/productos.json")
    .then(response => response.json())
    .then(productos => {
      productos.forEach(producto => {
        const card = document.createElement("div");
        card.classList.add("col-md-4");
        card.innerHTML = `
          <div class="card shadow-sm">
            <img src="${producto.imagen}" class="card-img-top" alt="${producto.nombre}">
            <div class="card-body">
              <h5 class="card-title">${producto.nombre}</h5>
              <p class="card-text">${producto.descripcion}</p>
              <a href="${producto.url}" class="btn btn-outline-success">Ver Producto</a>
            </div>
          </div>
        `;
        container.appendChild(card);
      });
    })
    .catch(error => console.error("Error cargando productos:", error));
});
const secciones = document.querySelectorAll("section");

const observer = new IntersectionObserver(entries => {
  entries.forEach(entry => {
    if(entry.isIntersecting) {
      entry.target.classList.add("visible");
    }
  });
}, { threshold: 0.2 });

secciones.forEach(seccion => observer.observe(seccion));
