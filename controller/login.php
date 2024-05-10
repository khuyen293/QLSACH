<?php
session_start();
include('../model/db_model.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy dữ liệu từ form
    $username_input = $_POST["username"];
    $password_input = $_POST["password"];

    // Kiểm tra thông tin đăng nhập
    if (check_login($username_input, $password_input)) {
        $_SESSION["IsLogin"] = true;
        header("Location: ../view/sach.php"); // Redirect to sach.php
        exit();
    } else {
        // Đăng nhập không thành công, quay lại trang đăng nhập
        echo "<script>
                alert('Tên đăng nhập hoặc mật khẩu không đúng!');
                window.location.href = '../view/login.html';
            </script>";
    }
}
?>
