<?php
include("../connect.php");

// Lấy dữ liệu theo idTL
if(isset($_GET['idTL'])){
    $id = $_GET['idTL'];
    $sql = "SELECT * FROM theloai WHERE idTL=$id";
    $result = mysqli_query($connect,$sql);
    $data = mysqli_fetch_assoc($result);
}
?>

<form method="post" enctype="multipart/form-data">
  Tên thể loại: <input type="text" name="TenTL" value="<?php echo $data['TenTL']; ?>"><br>
  Thứ tự: <input type="text" name="ThuTu" value="<?php echo $data['ThuTu']; ?>"><br>
  Ẩn/Hiện:
  <select name="AnHien">
    <option value="0" <?php if($data['AnHien']==0) echo "selected"; ?>>Ẩn</option>
    <option value="1" <?php if($data['AnHien']==1) echo "selected"; ?>>Hiện</option>
  </select><br>
  Icon hiện tại: <img src="../image/<?php echo $data['icon']; ?>" width="40"><br>
  Upload icon mới: <input type="file" name="image"><br>
  <input type="hidden" name="idTL" value="<?php echo $id; ?>">
  <input type="hidden" name="ten_anh" value="<?php echo $data['icon']; ?>">
  <input type="submit" name="Sua" value="Sửa">
</form>

<?php
if(isset($_POST['Sua'])){
    $theloai = $_POST['TenTL'];
    $thutu   = $_POST['ThuTu'];
    $an      = $_POST['AnHien'];
    $icon    = $_POST['ten_anh']; // giữ icon cũ

    // Nếu upload ảnh mới thì thay thế
    if($_FILES['image']['name']!=""){
        $icon = $_FILES['image']['name'];
        move_uploaded_file($_FILES['image']['tmp_name'],"../image/".$icon);

        // Xóa ảnh cũ
        $old = "../image/".$_POST['ten_anh'];
        if(file_exists($old)) unlink($old);
    }

    $sql = "UPDATE theloai SET TenTL='$theloai', ThuTu='$thutu', AnHien='$an', icon='$icon' WHERE idTL=".$_POST['idTL'];
    if(mysqli_query($connect,$sql)){
        echo "<script>alert('Sửa thành công');location.href='theloai.php';</script>";
    } else {
        echo "Lỗi: ".mysqli_error($connect);
    }
}
?>
