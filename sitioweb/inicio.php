<?php
    // INICIAR EL USO DE SESION DEL USUARIO
    session_start(); 
    
    //isset verifica que exista la variable op, posteriormente se convierte
	//todo a minúsculas
    $pagina = isset($_GET['op'])? strtolower($_GET['op']) : 'bienvenida';
	//echo $pagina; 
    
	//se genera la sección del menú
    require_once 'paginas/menu.php';

    /*en esta sección se mostrarán las páginas que van a cambiar en esta sección
	  donde $pagina tiene el nombre de la página que se va acceder, esto se hace
	  para evitar un switch-case*/	
?>
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<style>
    body {
        font-family: 'Poppins', sans-serif;
        background-color: #F9F9F9; /* Light gray background like Rappi */
        color: #333;
    }
    
    /* Global Button Styles */
    .btn-rappi {
        background-color: #FF441F;
        color: white;
        border: none;
        border-radius: 12px;
        padding: 10px 20px;
        font-weight: 600;
        transition: all 0.2s ease;
    }
    
    .btn-rappi:hover {
        background-color: #E03312;
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(255, 68, 31, 0.3);
    }

    /* Card Styles */
    .card-rappi {
        border: none;
        border-radius: 16px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.05);
        transition: all 0.2s ease;
        background: white;
        overflow: hidden;
    }
    
    .card-rappi:hover {
        transform: translateY(-4px);
        box-shadow: 0 8px 24px rgba(0,0,0,0.1);
    }

    /* Image Sizing Fix */
    .card-rappi img {
        width: 100%;
        height: 200px; /* Fixed height for consistency */
        object-fit: cover; /* Ensures image fills the area without distortion */
    }
    
    /* Text Colors */
    .text-primary {
        color: #FF441F !important;
    }
</style>

<main class="container py-4"> 
<?php
    require_once 'paginas/' . $pagina . '.php';
?>
</main>
<script src="bootstrap/js/bootstrap.bundle.min.js"></script>
<?php
//se crea la sección del pie de página
    require_once 'paginas/piepag.php';
?>
