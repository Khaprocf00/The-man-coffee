<?php
include 'inc/connect.php';
?>
<?php
$conn = new Database();

?>
<?php

if (isset($_POST['user']) && ($_POST['user'])) {
    $user = $_POST['user'];
    $pass = $_POST['pass'];
    $select = $conn->select('select * from user_login where email = "' . $user . '"');
    if ($select != false) {
        $row = mysqli_fetch_assoc($select);
        if ( $pass == $row['pass']) {
            $_SESSION['login']['user'] = $user;
            $_SESSION['login']['name'] = $row['name'];
            $_SESSION['login']['pass'] = $pass;
            if (isset($_SESSION['error'])) {
                unset($_SESSION['error']);
            }
        } else {
            unset($_SESSION['login']);
            $_SESSION['error'] = "Sai MK";
            header("Location:login.php");
        }
        if (isset($_POST['checkbox']) && ($_POST['checkbox'])) {
            setcookie('user', $user, time() + (86400 * 7));
            setcookie('pass', $pass, time() + (86400 * 7));
        } else {
            setcookie('user', $user, time() - 100);
            setcookie('pass', $pass, time() - 100);
        }
    }
    else{
        unset($_SESSION['login']);
            $_SESSION['error'] = "email không tồn tại";
            if (isset($_POST['checkbox']) && ($_POST['checkbox'])) {
                setcookie('user', $user, time() + (86400 * 7));
                setcookie('pass', $pass, time() + (86400 * 7));
            } else {
                setcookie('user', $user, time() - 100);
                setcookie('pass', $pass, time() - 100);
            }
            header("Location:login.php");

    }
}

?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>THE MAN COFFEE</title>
    <link rel="stylesheet" href="./assets/css/base1.css">
    <link rel="stylesheet" href="./assets/css/gird.css">
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="./assets/css/reponsive.css">
    <link rel="stylesheet" href="./assets/font/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;500;600&family=Poppins:wght@100;200;300;400;500;600;700;800;900&family=Quicksand:wght@300;400;500;600;700&family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">