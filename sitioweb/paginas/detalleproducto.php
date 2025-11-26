<?php
// Asegúrate de incluir aquí el código para inicializar el cliente SOAP
// Es idéntico al que tienes en tu página de listado.
$cliente=new SoapClient(null, array('uri'=>'http://localhost/',
              'location'=>'http://localhost/proweb/1erseg/rappipachuca/servicioweb/servicioweb.php'));  

$datos_producto = null;
$error = null; // Inicializamos la variable de error

// 1. Verificar si la clave del producto fue enviada por URL
if (isset($_GET['cve']) && is_numeric($_GET['cve'])) {
    $cve_producto = (int)$_GET['cve'];

    // 2. Llamar al método del servicio web para obtener los datos detallados
    try {
        $resultado = $cliente->spMostrarProductos($cve_producto);

        // El SP debe devolver un solo registro en la posición [0] del array
        if (is_array($resultado) && count($resultado) > 0) {
            $datos_producto = $resultado[0];
        } else {
            $error = "El producto no fue encontrado o el servicio web devolvió un resultado vacío.";
        }
    } catch (SoapFault $e) {
        // Manejo de error si la llamada falla
        $error = "Error al conectar con el servicio web o al buscar el producto: " . $e->getMessage();
    }
} else {
    $error = "Clave de producto no especificada o inválida.";
}
?>

<html>
    <head>
     <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">    
     <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
     <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
     <title>Detalle del Producto</title>
     <style>
        .container-detalle {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
            display: flex;
            gap: 30px;
        }
        .info-producto, .info-proveedor {
            width: 50%;
        }
        .info-producto img {
            max-width: 100%;
            height: auto;
            border-radius: 5px;
            margin-bottom: 15px;
        }
        h3 { border-bottom: 2px solid #ddd; padding-bottom: 5px; }
        /* 💡 ESTILO DEL BOTÓN WHATSAPP */
        .whatsapp-button {
            display: inline-flex;
            align-items: center;
            background-color: #25D366; /* Color de WhatsApp */
            color: white;
            padding: 10px 20px;
            border-radius: 25px;
            text-decoration: none;
            font-size: 16px;
            font-weight: bold;
            margin-top: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: background-color 0.3s;
        }
        .whatsapp-button:hover {
             background-color: #128C7E;
             color: white; /* Mantener texto blanco al pasar el ratón */
        }
        .whatsapp-icon {
            margin-right: 10px;
            font-size: 20px;
        }
     </style>
    </head>     
<body>  
<div class="container">
    <div style="margin-top: 20px;">
        <a href='?op=articulos' title='Regresar al listado'>← Volver al listado de productos</a>
    </div>

    <?php if (isset($error)): ?>
        <div class="alert alert-danger" role="alert" style="margin-top: 20px;">
            <?php echo $error; ?>
        </div>
    <?php elseif ($datos_producto): 
        
        // 💡 LÓGICA DE WHATSAPP: Preparamos los datos
        // El número debe incluir el código de país (ej. 52 para México). 
        // Se asume que el campo TELEFONO ya lo incluye o se ajustará.
        $telefono_proveedor = preg_replace('/[^0-9]/', '', $datos_producto['telefono']);
        
        // Creamos y codificamos el mensaje con los detalles del producto
        $mensaje_texto = "¡Hola! Estoy interesado/a en el producto '{$datos_producto['producto']}'."
                       . " Descripción: {$datos_producto['descripcion']}."
                       . " Su costo es de \${$datos_producto['costo']}. ¿Me puedes dar más información?";
        $mensaje_codificado = urlencode($mensaje_texto);
        
        // Construimos el enlace final
        $link_whatsapp = "https://wa.me/{$telefono_proveedor}?text={$mensaje_codificado}";
    ?>
        <h1 class="mt-4">Detalle de: <?php echo $datos_producto['producto']; ?></h1>
        <hr>
        <div class="container-detalle">
            <div class="info-producto">
                <h3>📦 Información del Producto</h3>
                <img src="<?php echo $datos_producto['foto_pro']; ?>" alt="<?php echo $datos_producto['producto']; ?>">
                <p><strong>Clave:</strong> <?php echo $datos_producto['clave']; ?></p>
                <p><strong>Descripción:</strong> <?php echo $datos_producto['descripcion']; ?></p>
                <p><strong>Costo:</strong> $<?php echo number_format($datos_producto['costo'], 2); ?></p>
            </div>

            <div class="info-proveedor">
                <h3>👤 Información del Proveedor</h3>
                <img src="<?php echo $datos_producto['foto_usu']; ?>" alt="Foto de <?php echo $datos_producto['usuario']; ?>" width="100px" height="100px" style="border-radius: 50%;">
                <p><strong>Nombre:</strong> <?php echo $datos_producto['usuario']; ?></p>
                <p><strong>Alias:</strong> <?php echo $datos_producto['alias']; ?></p>
                <p><strong>Teléfono:</strong> <?php echo $datos_producto['telefono']; ?></p>
                <p><strong>Clave Usuario:</strong> <?php echo $datos_producto['cve_usu']; ?></p>
                
                <hr>

                <a href="<?php echo $link_whatsapp; ?>" target="_blank" class="whatsapp-button">
                    <i class="fab fa-whatsapp whatsapp-icon"></i>
                    Contáctame
                </a>
                <p style="margin-top: 10px; font-size: 0.9em; color: #666;">Se enviará un mensaje con el detalle del producto.</p>
            </div>
        </div>
    <?php else: ?>
        <div class="alert alert-warning" role="alert" style="margin-top: 20px;">
            El producto solicitado no fue encontrado.
        </div>
    <?php endif; ?>
</div>
</body>
</html>