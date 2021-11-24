
<?php require('header.php'); require('hl_func/config_lg.php');  ?>
<body>
  <div class="container col-xl-10 col-xxl-8 px-4 py-5">
    <div class="row align-items-center g-lg-5 py-5">
      <div class="col-lg-7 text-center text-lg-start">
        <h1 class="display-4 fw-bold lh-1 mb-3">Lorem ipsum dolor sit amet.</h1>
        <p class="col-lg-10 fs-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc eu ante dui. Aliquam pulvinar ante ut metus tempor placerat. Nunc euismod arcu ipsum, non sagittis odio elementum et. </p>
      </div>
      <div class="col-md-10 mx-auto col-lg-5">
        <form class="p-4 p-md-5 border rounded-3 bg-light" method="POST" action="">
          <div id="erro"class="">
          </div>
          <div class="form-floating mb-3">
            <input type="text" name="usuario" class="form-control" id="floatingInput" placeholder="Usuário" value="<?php echo $cookieUsuario ?>">
            <label for="floatingInput">Usuário</label>
          </div>
          <div class="form-floating mb-3">
            <input type="password" name="senha" class="form-control" id="floatingPassword" placeholder="Senha" value="<?php echo $cookieSenha ?>">
            <label for="floatingPassword">Senha</label>
          </div>
          <div class="checkbox mb-3">
            <label>
              <input type="checkbox" name="lembrar" value="1" <?php echo $check ?>> Lembre-me
            </label>
          </div>
          <button class="w-100 btn btn-lg btn-primary" type="submit" name="entrar">Entrar</button>
          <hr class="my-4">
          <small class="text-muted">Desenvolvido por Henrique Lockmann</small>
        </form>
      </div>
    </div>
  </div>
  <?php if(isset($_SESSION['erro'])){echo $_SESSION['erro'];unset($_SESSION['erro']);} ?>
</body>
</html>
