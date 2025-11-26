<?php
// rptarticulos.php - Refactored for Rappi-style design

$cliente = new SoapClient(null, array(
    'uri' => 'http://localhost/',
    'location' => 'http://localhost/proweb/proweb_Proyecto-Integrador/servicioweb/servicioweb.php'
));

$consulta = $cliente->vwCartaPedidos();
$destacado = $cliente->vwDestacado();
$producto_destacado = count($destacado) > 0 ? $destacado[0] : null;
?>

<html>
    <head>
     <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">    
     <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
     <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
     <style>
      .todo{
        display: flex;
        justify-content: space-between;
      }
      .destacado{
        background-color: salmon;
      }
      @media (max-width: 1311px) {
         img{
            width: 150px;
             height: 100px;
        }
      }
     </style>
    </head>     
<body> 
<div class="container pb-5">
    
    <!-- Sección Destacado -->
    <?php if ($producto_destacado): ?>
    <div class="card card-rappi mb-5 border-0 bg-white">
        <div class="row g-0 align-items-center">
            <div class="col-md-6">
                <img src="<?php echo $producto_destacado['foto']; ?>" class="img-fluid w-100" style="height: 300px; object-fit: cover;" alt="Destacado">
            </div>
            <div class="col-md-6">
                <div class="p-4 p-md-5">
                    <span class="badge bg-warning text-dark mb-2">⭐ Producto Destacado</span>
                    <h2 class="fw-bold mb-3"><?php echo $producto_destacado['nombre']; ?></h2>
                    <p class="text-muted mb-4"><?php echo $producto_destacado['descripcion']; ?></p>
                    <div class="d-flex align-items-center gap-3">
                        <h3 class="text-primary fw-bold m-0">$<?php echo $producto_destacado['precio']; ?></h3>
                        <!-- Link to new Landing Page -->
                        <a href="paginas/landing_tacosal.php" class="btn btn-rappi rounded-pill px-4">
                            Ver Experiencia Premium
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>

    <!-- Título Sección -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="fw-bold m-0">Restaurantes y Tiendas</h3>
        <div class="dropdown">
            <button class="btn btn-light dropdown-toggle rounded-pill" type="button" data-bs-toggle="dropdown">
                Ordenar por
            </button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Recomendados</a></li>
                <li><a class="dropdown-item" href="#">Precio: Menor a Mayor</a></li>
            </ul>
        </div>
    </div>

    <!-- Grid de Productos -->
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
        <?php foreach ($consulta as $prod): ?>
        <div class="col">
            <div class="card card-rappi h-100 cursor-pointer" onclick="verDetalle(<?php echo $prod['clave']; ?>)" style="cursor: pointer;">
                <div class="position-relative">
                    <img src="<?php echo $prod['foto']; ?>" class="card-img-top" alt="<?php echo $prod['nombre']; ?>" style="height: 200px; object-fit: cover;">
                    <button class="btn btn-light btn-sm position-absolute top-0 end-0 m-2 rounded-circle shadow-sm">
                        <i class="bi bi-heart"></i>
                    </button>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start mb-2">
                        <h5 class="card-title fw-bold mb-0"><?php echo $prod['nombre']; ?></h5>
                        <span class="badge bg-light text-dark border">4.5 <i class="bi bi-star-fill text-warning" style="font-size: 0.8em;"></i></span>
                    </div>
                    <p class="card-text text-muted small text-truncate"><?php echo $prod['descripcion']; ?></p>
                    <div class="d-flex justify-content-between align-items-center mt-3">
                        <span class="text-primary fw-bold fs-5">$<?php echo $prod['precio']; ?></span>
                        <button class="btn btn-sm btn-outline-secondary rounded-pill">
                            <i class="bi bi-plus-lg"></i> Agregar
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>

</div>

<!-- Modal Flotante -->
<div class="modal fade" id="productoModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content border-0 rounded-4 overflow-hidden">
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

<script>
function verDetalle(id) {
    var modal = new bootstrap.Modal(document.getElementById('productoModal'));
    var modalBody = document.getElementById('modal-body-content');
    
    // Mostrar loading
    modalBody.innerHTML = `
        <div class="d-flex justify-content-center align-items-center p-5" style="min-height: 300px;">
            <div class="spinner-border text-primary" role="status"></div>
        </div>
    `;
    
    modal.show();

    // Fetch details
    fetch('paginas/get_detalle_producto.php?cve=' + id)
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