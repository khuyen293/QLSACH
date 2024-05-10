<?php
// Hàm kết nối đến cơ sở dữ liệu
function get_db_connection() {
    try {
        // Thông tin kết nối
        $uri = "mysql://avnadmin:AVNS_Im6WgsoLwuXTKOEWzGX@mysql-293-hoangthikhuyen293-7a10.i.aivencloud.com:20215/defaultdb?ssl-mode=REQUIRED";
        $fields = parse_url($uri);

        // Kết nối và cấu hình PDO
        $conn = new PDO("mysql:host=" . $fields["host"] . ";port=" . $fields["port"] . ";dbname=QUANLYSACH;sslmode=verify-ca;sslrootcert=ca.pem", $fields["user"], $fields["pass"]);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $conn; // Trả về đối tượng PDO nếu kết nối thành công
    } catch (PDOException $e) {
        // Xử lý ngoại lệ nếu có lỗi kết nối
        echo "Error: " . $e->getMessage();
        return null; // Trả về null nếu kết nối thất bại
    }
}

// Hàm kiểm tra đăng nhập
function check_login($username, $password) {
    // Kết nối đến cơ sở dữ liệu
    $conn = get_db_connection();
    
    if (!$conn) {
        return false; // Trả về false nếu không thể kết nối đến cơ sở dữ liệu
    }

    try {
        // Thực hiện truy vấn để kiểm tra đăng nhập
        $stmt = $conn->prepare("SELECT * FROM User WHERE TenUser = :username AND MatKhau = :password");
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password);
        $stmt->execute();

        // Kiểm tra kết quả trả về và trả về true nếu đăng nhập thành công, ngược lại trả về false
        return $stmt->rowCount() > 0;
    } catch (PDOException $e) {
        // Xử lý ngoại lệ nếu có lỗi truy vấn
        echo "Error: " . $e->getMessage();
        return false;
    } finally {
        // Đóng kết nối sau khi sử dụng
        $conn = null;
    }
}

// Hàm lấy tất cả sách
function get_all_books() {
    // Kết nối đến cơ sở dữ liệu
    $conn = get_db_connection();
    
    if (!$conn) {
        return array(); // Trả về một mảng trống nếu không thể kết nối đến cơ sở dữ liệu
    }

    try {
        // Thực hiện truy vấn để lấy danh sách sách
        $stmt = $conn->query("SELECT * FROM Sach");

        $books = array(); // Khởi tạo mảng chứa dữ liệu sách

        // Lặp qua từng hàng dữ liệu và thêm vào mảng
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $books[] = $row;
        }

        return $books;
    } catch (PDOException $e) {
        // Xử lý ngoại lệ nếu có lỗi truy vấn
        echo "Error: " . $e->getMessage();
        return array(); // Trả về một mảng trống nếu có lỗi
    } finally {
        // Đóng kết nối sau khi sử dụng
        $conn = null;
    }
}
?>
