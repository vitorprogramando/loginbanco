<?php
session_start();

// Destrua todas as variáveis de sessão
$_SESSION = array();

// Se necessário, delete o cookie de sessão
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// Destrua a sessão
session_destroy();

// Redirecione de volta para a página de login
header("Location: index.login.html");
exit;
?>
