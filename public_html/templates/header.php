<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
<img style="max-width:100px;" src="images/logo02.png" alt="CP">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="./cover.php"><i class="fa fa-home">&nbsp;</i>Home <span class="sr-only">(current)</span></a>
      </li>
      
        <?php
          if (isset($_SESSION["user_id"])) {
            ?>
            <li class="nav-item active">
              <a class="nav-link" href="logout.php"><i class="fa fa-user">&nbsp;</i>Cerrar sesion</a>
            </li>
            <?php
          }
        ?>
        
    </ul>
  </div>
</nav>