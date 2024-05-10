create database quanly;
use quanly;
create table Sach(
    MaSach int primary key auto_increment,
    TenSach varchar(50),
    SoLuong int
);

create table User(
    MaUser int primary key auto_increment,
    TenUser varchar(50),
    MatKhau varchar(50)
);

insert into Sach (TenSach, SoLuong) values
    ('Giáo dục công dân', 10),
    ('Cấu trúc dữ liệu và giải thuật', 15),
    ('Tối ưu hóa', 5),
    ('Tư tưởng hồ chí minh', 25),
    ('Xác xuất thống kê', 20);

insert into User(TenUser, MatKhau) values
    ('Hoang Thi Khuyen', 'hoangthikhuyen'),
    ('Hoang Thi Anh Thu', 'anhthu0110'),
    ('Hoang Thi Trang', 'hoangtrang2104'),
    ('Hoang Thi Thanh Huyen', 'thanhhuyen2101'),
    ('Hoang Thi Lan Anh', 'lananh0807');



