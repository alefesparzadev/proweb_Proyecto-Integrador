<?php
// get_detalle_producto.php
// Este script se llama vía AJAX para obtener el contenido del modal

// 1. Inicializar cliente SOAP (Misma configuración que en otros archivos)
$cliente = new SoapClient(null, array(
    'uri' => 'http://localhost/',
    'location' => 'http://localhost/proweb/proweb_Proyecto-Integrador/servicioweb/servicioweb.php'
));

$html = '';

if (isset($_GET['cve']) && is_numeric($_GET['cve'])) {
    $cve_producto = (int)$_GET['cve'];

    try {
        $resultado = $cliente->spMostrarProductos($cve_producto);

        if (is_array($resultado) && count($resultado) > 0) {
            $datos = $resultado[0];

            // Lógica de WhatsApp
            $telefono_proveedor = preg_replace('/[^0-9]/', '', $datos['telefono']);
            $mensaje_texto = "¡Hola! Estoy interesado/a en el producto '{$datos['producto']}'."
                           . " Descripción: {$datos['descripcion']}."
                           . " Su costo es de \${$datos['costo']}. ¿Me puedes dar más información?";
            $mensaje_codificado = urlencode($mensaje_texto);
            $link_whatsapp = "https://wa.me/{$telefono_proveedor}?text={$mensaje_codificado}";

            // Construir HTML del modal
            $html .= '<div class="row">';
            
            // Columna Imagen
            $html .= '<div class="col-md-6 mb-3">';
            $html .= '<img src="' . $datos['foto_pro'] . '" class="img-fluid rounded shadow-sm" alt="' . $datos['producto'] . '">';
            $html .= '</div>';

            // Columna Información
            $html .= '<div class="col-md-6">';
            $html .= '<h4 class="fw-bold mb-3">' . $datos['producto'] . '</h4>';
            $html .= '<p class="text-muted">' . $datos['descripcion'] . '</p>';
            $html .= '<h3 class="text-primary fw-bold mb-4">$' . number_format($datos['costo'], 2) . '</h3>';
            
            // Información del Proveedor (Compacta)
            $html .= '<div class="d-flex align-items-center mb-4 p-3 bg-light rounded">';
            $html .= '<img src="' . $datos['foto_usu'] . '" class="rounded-circle me-3" width="50" height="50">';
            $html .= '<div>';
            $html .= '<small class="text-muted d-block">Vendido por</small>';
            $html .= '<span class="fw-bold">' . $datos['usuario'] . '</span>';
            $html .= '</div>';
            $html .= '</div>';

            // Botón WhatsApp
            $html .= '<a href="' . $link_whatsapp . '" target="_blank" class="btn btn-success w-100 py-2 rounded-pill fw-bold">';
            $html .= '<i class="bi bi-whatsapp me-2"></i> Pedir por WhatsApp';
            $html .= '</a>';
            
            $html .= '</div>'; // Fin col-md-6
            $html .= '</div>'; // Fin row

        } else {
            $html = '<div class="alert alert-warning">Producto no encontrado.</div>';
        }
    } catch (Exception $e) {
        $html = '<div class="alert alert-danger">Error al cargar el producto.</div>';
    }
} else {
    $html = '<div class="alert alert-danger">Solicitud inválida.</div>';
}

echo $html;
?>
