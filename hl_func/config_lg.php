<?php

function getUserIP()
{
    $client  = @$_SERVER['HTTP_CLIENT_IP'];
    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
    $remote  = $_SERVER['REMOTE_ADDR'];

    if(filter_var($client, FILTER_VALIDATE_IP))
    {
        $ip = $client;
    }
    elseif(filter_var($forward, FILTER_VALIDATE_IP))
    {
        $ip = $forward;
    }
    else
    {
        $ip = $remote;
    }

    return $ip;
}
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
        array('name' => 'Henrique Lockmann', 'login' => 'henrique', 'password' => 'a388544f4af376fd02eebae77779a027'), //login
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
          $namelog = $_SESSION['nome'];
          $user_ip = getUserIp();
          $dt = date("d-m-Y H:i");
          $log = file_get_contents('dashboard/logs.php');
          $log .= "[NOME]:".$namelog."  - [LOGIN]: ".$client." - [IP]: ".$user_ip." - [DATA]: ".$dt."<hr>";
          file_put_contents('dashboard/logs.php', $log);
          header("location: dashboard/");

        }else{
          $_SESSION['erro'] = "<script type='text/javascript'>errologin();</script>";
        }
      }
    }
?>