<?php 

?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <div class="container">
      <a class="navbar-brand" href="#">
        <img src="<?php echo $directory; ?>/public/images/logos/cap-brand-logo.png" alt="" width="30" height="24">
        Haithem Caps Store
      </a>
    </div>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="<?php echo $directory ?>/Views/pages/cart.php"><i class="fas fa-shopping-cart"></i> <span id="cart-item" class="badge badge-danger"></span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="<?php echo $directory; ?>/index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo $directory; ?>/views/pages/products.php">Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo $directory; ?>/admin/">Admin Dashboard</a>
        </li>
       <!--  <li class="nav-item">
          <a class="nav-link" href="#">Cart</a>
        </li> -->
        <?php if (isset($_SESSION["user_id"])): ?>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Action
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="<?php echo $directory; ?>/views/pages/logout.php">Logout</a></li>
              <li><hr class="dropdown-divider"></li>
            </ul>
          </li>
        <?php else: ?>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo $directory; ?>/views/pages/login.php">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo $directory; ?>/views/pages/register.php">Register</a>
          </li>
        <?php endif ?>
      </ul>
    </div>
  </div>
</nav>