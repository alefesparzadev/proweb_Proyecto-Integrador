<?php
// Detecta la página actual para marcar el link activo automáticamente
$current = basename($_SERVER['PHP_SELF']);
function isActive($page, $current) { return $page === $current ? 'active' : ''; }
?>

<nav class="navbar navbar-expand-lg navbar-dark sticky-top shadow-sm pf-nav">
  <div class="container">
    <a class="navbar-brand d-flex align-items-center gap-2" href="inicio.php">
      <!-- Logo Rappi-like (simulado con icono o texto) -->
      <i class="bi bi-bag-heart-fill text-white" style="font-size: 1.5rem;"></i>
      <strong class="text-white">RappiPachuca</strong>
    </a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#pfNavbar"
            aria-controls="pfNavbar" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="pfNavbar">
      <ul class="navbar-nav ms-auto align-items-lg-center mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link position-relative text-white <?= isActive('inicio.php',$current) ?>" href="inicio.php">
            <i class="bi bi-house-door me-1"></i>Inicio
          </a>
        </li>        
        <li class="nav-item">
          <a class="nav-link position-relative text-white <?= isActive('rptarticulos.php',$current) ?>" href="inicio.php?op=rptarticulos">
            <i class="bi bi-shop me-1"></i>Restaurantes / Tiendas
          </a>
        </li>
        <!-- Se eliminaron las opciones de sesión -->
      </ul>
    </div>
  </div>
</nav>

<style>
  /* Rappi Color Palette */
  :root {
      --rappi-orange: #FF441F;
      --rappi-white: #FFFFFF;
      --rappi-gray: #F5F5F5;
  }

  .text-primary { color: var(--rappi-orange) !important; }
  .bg-primary { background-color: var(--rappi-orange) !important; }
  
  .pf-nav {
    background-color: var(--rappi-orange) !important; /* Changed to Orange */
    border-bottom: 1px solid #e0e0e0;
  }

  .pf-nav .nav-link {
    color: white !important; /* Changed to White */
    font-weight: 500;
    transition: color .2s ease;
  }
  
  .pf-nav .nav-link:hover { 
      color: #f0f0f0 !important; 
  }

  .pf-nav .nav-link.active { 
      color: white !important; 
      font-weight: 700;
      border-bottom: 2px solid white;
  }
  
  .navbar-brand i {
      color: white !important; /* Changed to White */
  }
  
  .navbar-brand strong {
      color: white !important; /* Changed to White */
  }
</style>