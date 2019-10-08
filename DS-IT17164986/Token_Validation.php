<?php

//Name - Kapuge P.K.M.C
//SID  -  IT17164986

session_start();

//Check login status of the user
if (!isset ($_SESSION['LoginState'])){
    ob_start();
    header('Location: /Login.html');
    ob_end_flush();
    die();
}

//Getting User Submitted CSRF Token Value
$userCSRF = $_POST['MyToken'];
//getting user submitted CSRF token cookie
$cookieCSRF = $_POST['CSRFcookie'];
$cookieValue = $_COOKIE[$cookieCSRF];

//compare user submitted CSRF token with  user submitted cookie's value
if ($userCSRF == $cookieValue){
  $_SESSION['status'] = "Details submitted!!! ";
  setcookie("Details",$_POST['u_name'].",".$_POST['sid']);
}else{
  $_SESSION['status'] = "Token Comparison Failed!!!";
  setcookie("Details","".","."");
}
header('Location: /DS/Data_Receiving_End_Point.php');
?>
