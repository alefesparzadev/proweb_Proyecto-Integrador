<?php
// landing_tacosal.php - High End Landing Page
$cliente = new SoapClient(null, array(
    'uri' => 'http://localhost/',
    'location' => 'http://localhost/proweb/proweb_Proyecto-Integrador/servicioweb/servicioweb.php'
));
$destacado = $cliente->vwDestacado();
$producto_destacado = count($destacado) > 0 ? $destacado[0] : null;
$id_destacado = $producto_destacado ? $producto_destacado['clave'] : 0;
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Taco de Sal - Edición Limitada</title>
    <!-- Bootstrap & Fonts -->
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,700;1,400&family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    
    <style>
        :root {
            --gold: #D4AF37;
            --dark: #111111;
            --orange: #FF441F;
        }
        
        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--dark);
            color: white;
            overflow-x: hidden;
        }
        
        h1, h2, h3 {
            font-family: 'Playfair Display', serif;
        }
        
        /* Hero Section with Video Background */
        .hero {
            position: relative;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }
        
        .hero-video {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            opacity: 0.6;
            z-index: 0;
        }
        
        .hero-content {
            position: relative;
            z-index: 1;
            text-align: center;
            max-width: 800px;
            padding: 20px;
        }
        
        .hero-title {
            font-size: 5rem;
            font-weight: 700;
            margin-bottom: 20px;
            background: linear-gradient(to right, #fff, var(--gold));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            opacity: 0;
            animation: fadeInUp 1s ease forwards 0.5s;
        }
        
        .hero-subtitle {
            font-size: 1.5rem;
            letter-spacing: 3px;
            text-transform: uppercase;
            margin-bottom: 40px;
            color: #ccc;
            opacity: 0;
            animation: fadeInUp 1s ease forwards 1s;
        }
        
        .btn-premium {
            background: transparent;
            color: var(--gold);
            border: 2px solid var(--gold);
            padding: 15px 40px;
            font-size: 1.2rem;
            letter-spacing: 2px;
            text-transform: uppercase;
            transition: all 0.3s ease;
            opacity: 0;
            animation: fadeInUp 1s ease forwards 1.5s;
        }
        
        .btn-premium:hover {
            background: var(--gold);
            color: var(--dark);
            box-shadow: 0 0 20px rgba(212, 175, 55, 0.5);
        }
        
        /* Product Showcase */
        .showcase {
            padding: 100px 0;
            background: linear-gradient(to bottom, var(--dark), #1a1a1a);
        }
        
        .product-image {
            max-width: 100%;
            border-radius: 20px;
            box-shadow: 0 20px 50px rgba(0,0,0,0.5);
            transform: rotate(-5deg);
            transition: transform 0.5s ease;
        }
        
        .product-image:hover {
            transform: rotate(0deg) scale(1.05);
        }
        
        .feature-list li {
            margin-bottom: 15px;
            font-size: 1.1rem;
            display: flex;
            align-items: center;
        }
        
        .feature-list i {
            color: var(--gold);
            margin-right: 15px;
            font-size: 1.5rem;
        }
        
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        /* Back Button */
        .back-btn {
            position: absolute;
            top: 30px;
            left: 30px;
            z-index: 10;
            color: white;
            font-size: 2rem;
            text-decoration: none;
            transition: transform 0.3s;
        }
        
        .back-btn:hover {
            transform: translateX(-5px);
            color: var(--gold);
        }
    </style>
</head>
<body>

    <a href="../inicio.php" class="back-btn"><i class="bi bi-arrow-left"></i></a>

    <!-- Hero Section -->
    <section class="hero">
        <!-- Video Background -->
        <video class="hero-video" autoplay muted loop playsinline>
            <source src="../imagenes/productos/video_taco_premium.mp4" type="video/mp4">
            <!-- Fallback image if video fails -->
            <img src="../imagenes/productos/taco_sal_premium_real.png" alt="Background">
        </video>
        
        <div class="hero-content">
            <h1 class="hero-title">El Taco de Sal</h1>
            <p class="hero-subtitle">La esencia de la simplicidad. El lujo del sabor.</p>
            <a href="#details" class="btn btn-premium">Descubrir</a>
        </div>
    </section>

    <!-- Details Section -->
    <section id="details" class="showcase">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-5 mb-lg-0">
                    <img src="../imagenes/productos/taco_sal_premium_real.png" alt="Taco de Sal Premium" class="product-image">
                </div>
                <div class="col-lg-6 ps-lg-5">
                    <h2 class="display-4 mb-4 text-white">Una Experiencia Culinaria</h2>
                    <p class="lead text-secondary mb-5">
                        Redescubre el origen. Tortilla de maíz nixtamalizado a mano, cristales de sal de mar cosechada artesanalmente. Sin pretensiones. Solo perfección.
                    </p>
                    
                    <ul class="list-unstyled feature-list mb-5">
                        <li><i class="bi bi-star-fill"></i> Maíz Criollo Orgánico</li>
                        <li><i class="bi bi-droplet-fill"></i> Sal de Mar de Colima</li>
                        <li><i class="bi bi-fire"></i> Hecho al momento</li>
                    </ul>
                    
                    <div class="d-flex gap-3">
                        <button class="btn btn-premium" style="background: var(--gold); color: black;" onclick="verDetalle(<?php echo $id_destacado; ?>)">
                            Ordenar Ahora - $<?php echo $producto_destacado ? $producto_destacado['precio'] : '150.00'; ?>
                        </button>
                        <button class="btn btn-outline-light px-4 py-3 rounded-0" onclick="window.location.href='../inicio.php'">Ver Menú Completo</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="py-4 text-center text-secondary" style="background: #000;">
        <p class="m-0">© 2024 RappiPachuca Signature Collection</p>
    </footer>

    <!-- Modal Flotante (Copied from rptarticulos.php) -->
    <div class="modal fade" id="productoModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content border-0 rounded-4 overflow-hidden" style="color: #333;">
                <div class="modal-header border-0 position-absolute top-0 end-0 p-3" style="z-index: 10;">
                    <button type="button" class="btn-close bg-white rounded-circle shadow-sm p-2" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-0" id="modal-body-content">
                    <!-- El contenido se cargará aquí vía AJAX -->
                    <div class="d-flex justify-content-center align-items-center p-5">
                        <div class="spinner-border text-primary" role="status">
                            <span class="visually-hidden">Cargando...</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
    <script>
    function verDetalle(id) {
        if(id == 0) { alert('Producto no disponible'); return; }
        
        var modal = new bootstrap.Modal(document.getElementById('productoModal'));
        var modalBody = document.getElementById('modal-body-content');
        
        // Mostrar loading
        modalBody.innerHTML = `
            <div class="d-flex justify-content-center align-items-center p-5" style="min-height: 300px;">
                <div class="spinner-border text-primary" role="status"></div>
            </div>
        `;
        
        modal.show();

        // Fetch details (adjusted path since we are in paginas/)
        fetch('get_detalle_producto.php?cve=' + id)
            .then(response => response.text())
            .then(html => {
                modalBody.innerHTML = '<div class="p-4">' + html + '</div>';
            })
            .catch(error => {
                modalBody.innerHTML = '<div class="p-4 text-center text-danger">Error al cargar los detalles.</div>';
            });
    }
    </script>
</body>
</html>
