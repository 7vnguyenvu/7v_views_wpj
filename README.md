## 7V_Views_WPJ | Trang tin & Blogs | Web Project (PHP)

    1. Công khai, cho phép người sử dụng xem tin tức và các blog không cần đăng nhập.
    2. Cho phép quản trị viên đăng tin (tin tức), viết các blog chia sẻ đến người dùng.
    3. Cho phép người dùng tương tác, viết blog, follow người dùng khác,...

## Hướng dẫn tải dự án về local

#### Cài đặt XAMPP:

[xammpp_downlink]: https://www.apachefriends.org/download.html

1. Tải XAMPP: [Download][xammpp_downlink]
2. Chạy Apache và MySql
3. Có thể tìm tham khảo các hướng dẫn trên youtube với từ khóa: **"xampp download"**

#### Tải dự án về trong xampp/htdocs/

1. Tìm vào thư mục htdocs của xampp -> Nên xóa hết các folder và file khi vừa cài đặt xong (cho đỡ vướng)
2. Mở git base here (nếu đã tải git) hoặc mở cmd tại thư mục htdocs
3. Nhập vào câu lệnh: ```git clone git@github.com:vunguyen-dev-er/7v_views_wpj.git```

#### Setup database tại phpMyAdmin

1. Truy cập: http://localhost/phpmyadmin/  <hoặc> http://127.0.0.1/phpmyadmin/
2. Chọn "Cơ sở dữ liệu" -> Tại "Tạo cơ sở dữ liệu" -> Nhập tên cơ sở dữ liệu là "wp_7views"
3. Vào cơ sở dữ liệu "wp_7views" -> Nhập (Import) -> Chọn file
4. Tìm vào thư mục: xampp/htdocs/7v_views_wpj/server/database_setup/wp_7views.sql
5. Chọn Import -> Dữ liệu sẽ được thêm vào -> Database có thể sử dụng.

#### Chạy dự án

1. Chạy server: http://localhost/7v_views_wpj/server/ <hoặc> http://127.0.0.1/7v_views_wpj/server/
2. Chạy client: http://localhost/7v_views_wpj/client/ <hoặc> http://127.0.0.1/7v_views_wpj/client/

```
    +--------------------------------------------------------------+
    |                          TÀI KHOẢN                           |
    |--------------------------------------------------------------|
    |    Name             |    Username           |    Password    |
    |:--------------------|:----------------------|:---------------|
    |    Admin            |    7v52admin          |    admin777    |
    |    Nguyễn Thanh Tú  |    thanhtu            |    0911        |
    |    Trần Thị Thảo Vy |    thaovy352          |    thaovy352   |
    |    Người dùng 1     |    user1              |    123456      |
    +--------------------------------------------------------------+
```

