<?php
session_start();
    if(isset($_COOKIE['remember'])){
      $check = "checked='checked'";
      $cookieUsuario = $_COOKIE['remember'];
      $cookieSenha = "***************";
    }else{
      $check = "";
      $cookieUsuario = '';
      $cookieSenha = '';
    }
    if(isset($_POST['entrar'])){
      $arrayClient = array(
        array('name' => 'Henrique Lockmann', 'login' => 'henriquelockmann', 'password' => 'e10adc3949ba59abbe56e057f20f883e'),
      );
      $client = filter_input(INPUT_POST, 'usuario', FILTER_SANITIZE_SPECIAL_CHARS);
      $passclient = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_SPECIAL_CHARS);
      if(isset($_POST['lembrar'])){
        $remember = $_POST['lembrar'];
      }else{
        $remember = "0";
      }

      foreach ($arrayClient as $result) {
        $passclient = md5($passclient);
        $cookiePass = "78c673106fe3a4306692c9284422489f";


        if ((($client == $result['login']) and ($passclient == $result['password'])) or ((isset($_COOKIE['remember']) and ($client == $_COOKIE['remember']) and ($passclient == $cookiePass)))){
          session_start();

          if(isset($remember) and ($remember == 1)){
            $timeexpire = time() + (86400 * 30 );
            setcookie('remember', $client, $timeexpire);
            setcookie('cookieSet', $passclient, $timeexpire);
          }elseif($remember == 0){
            setcookie('remember', '', time() - 3600);
          }
          $_SESSION['nome'] = $result['name'];
          $_SESSION['login'] = $result['login'];

          header("location: dashboard/");

        }else{
          $_SESSION['erro'] = "<script type='text/javascript'>errologin();</script>";
        }
      }
    }
?>