<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách Sách</title>
    <link rel="stylesheet" type="text/css" href="../assets/style.css"> <!-- Thêm file CSS -->
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid #ccc;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h2>Danh sách Sách</h2>
    <table>
        <tr>
            <th>Mã Sách</th>
            <th>Tên Sách</th>
            <th>Số Lượng</th>
        </tr>
        <?php
        include('../model/db_model.php');
        // Lấy dữ liệu sách từ model
        $sach_list = get_all_books();

        // Hiển thị dữ liệu
        foreach ($sach_list as $sach) {
            echo "<tr>";
            echo "<td>" . $sach['MaSach'] . "</td>";
            echo "<td>" . $sach['TenSach'] . "</td>";
            echo "<td>" . $sach['SoLuong'] . "</td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>
