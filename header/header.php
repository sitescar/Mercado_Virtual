<nav>
      <input type="checkbox" id="check">
      <label for="check" class="checkbnt">
        <i class="fas fa-bars"></i>
        
      </label>
      <label class="logo">PotiCars</label>
      <ul>
        <li><a  href="./">Home</a></li>
        <li><a href="#">Pesquisar</a></li>
        <li><a href="contato">Contato</a></li>
        <li><a href="sobre">Sobre</a></li>
        <?php if(isset($_SESSION["login"])){?>
        <li><a href="anunciar">Anunciar</a></li>
        <li><a href="perfil">Meu Perfil</a></li>
        <?php } ?>
        <?php if(!isset($_SESSION["login"])){ ?>
        <li><a class="active" href="login">Entrar</a></li>
        <?php }?>
      </ul>
</nav>