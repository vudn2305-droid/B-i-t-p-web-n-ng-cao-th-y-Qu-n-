<?php
include("../connect.php");

if(isset($_GET['idTL'])){
    $id = $_GET['idTL'];

    // Lấy tên file icon để xóa ảnh
    $sql = "SELECT icon FROM theloai WHERE idTL=$id";
    $result = mysqli_query($connect,$sql);
    $data = mysqli_fetch_assoc($result);

    // Xóa dữ liệu trong DB
    $sql = "DELETE FROM theloai WHERE idTL=$id";
    if(mysqli_query($connect,$sql)){
        // Xóa ảnh trong thư mục image nếu tồn tại
        $old = "../image/".$data['icon'];
        if(file_exists($old)) unlink($old);

        echo "<script>alert('Xóa thành công');location.href='theloai.php';</script>";
    } else {
        echo "Lỗi: ".mysqli_error($connect);
    }
}
?>
