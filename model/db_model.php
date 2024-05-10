<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "quanly";

function get_db_connection() {
    global $servername, $username, $password, $dbname;
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if (!$conn) {
        die("Kết nối thất bại: " . mysqli_connect_error());
    }
    return $conn;
}

function check_login($username, $password) {
    $conn = get_db_connection();
    $sql = "SELECT * FROM User WHERE TenUser='$username' AND MatKhau='$password'";
    $result = mysqli_query($conn, $sql);
    $row_count = mysqli_num_rows($result);
    mysqli_close($conn);
    return $row_count > 0;
}

function get_all_books() {
    $conn = get_db_connection();
    $sql = "SELECT * FROM Sach";
    $result = mysqli_query($conn, $sql);
    
    $books = array(); // Khởi tạo mảng chứa dữ liệu sách
    
    if (mysqli_num_rows($result) > 0) {
        // Lặp qua từng hàng dữ liệu và thêm vào mảng
        while ($row = mysqli_fetch_assoc($result)) {
            $books[] = $row;
        }
    }
    
    mysqli_close($conn);
    
    return $books;
}

?>

