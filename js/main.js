document.addEventListener("DOMContentLoaded", function() {
    // --- 1. Cargar Componentes Modulares (Header, Footer, Showcase) ---
    loadComponent('header-placeholder', 'layout/header.html', () => {
        activateCurrentNavLink(); // Activar link del nav después de cargar el header
    });
    loadComponent('footer-placeholder', 'layout/footer.html');
    loadComponent('showcase-placeholder', 'layout/product-showcase.html', () => {
        loadProductShowcase(); // Cargar productos en el showcase después de cargar su HTML
    });

    // --- 2. Cargar Productos en la página (si existe el contenedor) ---
    const productosContainer = document.getElementById("productos-container");
    if (productosContainer) {
        loadProductsIntoPage(productosContainer);
    }

    // --- 3. Activar Animaciones de Scroll ---
    const secciones = document.querySelectorAll("section");
    const observer = new IntersectionObserver(entries => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add("visible");
            }
        });
    }, { threshold: 0.2 });
    secciones.forEach(seccion => observer.observe(seccion));
});

/**
 * Carga un componente HTML desde una URL en un elemento placeholder.
 * @param {string} elementId - El ID del elemento placeholder.
 * @param {string} url - La ruta al archivo HTML del componente.
 * @param {function} [callback] - Una función opcional a ejecutar después de la carga.
 */
function loadComponent(elementId, url, callback) {
    const placeholder = document.getElementById(elementId);
    if (placeholder) {
        fetch(url)
            .then(response => response.ok ? response.text() : Promise.reject('File not found'))
            .then(data => {
                placeholder.innerHTML = data;
                if (callback) callback(); // Ejecuta el callback si existe
            })
            .catch(error => console.error(`Error loading ${url}:`, error));
    }
}

/**
 * Añade la clase 'active' al enlace de navegación de la página actual.
 */
function activateCurrentNavLink() {
    const currentPage = window.location.pathname.split("/").pop() || "index.html";
    const navLink = document.querySelector(`.navbar-nav .nav-link[href="${currentPage}"]`);
    if (navLink) {
        navLink.classList.add('active');
    }
}

/**
 * Carga productos desde un JSON y los muestra como tarjetas en un contenedor.
 * @param {HTMLElement} container - El elemento contenedor donde se insertarán las tarjetas.
 */
function loadProductsIntoPage(container) {
    fetch("./data/productos.json")
        .then(response => response.json())
        .then(productos => {
            container.innerHTML = ''; // Limpiar por si acaso
            productos.forEach(producto => {
                const card = document.createElement("div");
                card.className = "col-md-4 d-flex"; // Usar d-flex para que las tarjetas tengan la misma altura
                card.innerHTML = `
                  <div class="card shadow-sm w-100">
                    <img src="${producto.imagen}" class="card-img-top" alt="${producto.nombre}">
                    <div class="card-body d-flex flex-column">
                      <h5 class="card-title">${producto.nombre}</h5>
                      <p class="card-text flex-grow-1">${producto.descripcion_corta}</p>
                      <a href="${producto.url}" class="btn btn-outline-success mt-auto">Ver Producto</a>
                    </div>
                  </div>
                `;
                container.appendChild(card);
            });
        })
        .catch(error => console.error("Error cargando productos en la página:", error));
}

/**
 * Carga los productos en la barra flotante de showcase.
 */
function loadProductShowcase() {
    const container = document.getElementById('showcase-items-container');
    const showcaseBar = document.getElementById('product-showcase-bar');
    const closeBtn = document.getElementById('close-showcase-btn');

    if (!container || !showcaseBar || !closeBtn) return;

    fetch('./data/productos.json')
        .then(response => response.json())
        .then(productos => {
            productos.forEach(producto => {
                container.innerHTML += `
                    <a href="${producto.url}" class="showcase-item" title="${producto.nombre}">
                        <img src="${producto.imagen}" alt="Oferta: ${producto.nombre}">
                        <span>${producto.nombre}</span>
                    </a>`;
            });
            setTimeout(() => showcaseBar.classList.add('visible'), 500); // Dar un respiro antes de mostrar la barra
        });

    closeBtn.addEventListener('click', () => showcaseBar.style.display = 'none');
}
