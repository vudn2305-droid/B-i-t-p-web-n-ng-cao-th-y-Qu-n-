<?php include('../connect.php'); ?>
<table border="1" width="600" align="center">
<tr>
  <td>Tên thể loại</td><td>Thứ tự</td><td>Ẩn/Hiện</td><td>Biểu tượng</td>
  <td colspan="2"><a href="theloai_them.php">Thêm</a></td>
</tr>
<?php
$sql= "SELECT * FROM theloai";
$results = mysqli_query($connect,$sql);
while($rows = mysqli_fetch_assoc($results)){
?>
<tr align="center">
  <td><?php echo $rows['TenTL']; ?></td>
  <td><?php echo $rows['ThuTu']; ?></td>
  <td><?php echo $rows['AnHien']==1 ? "Hiện":"Ẩn"; ?></td>
  <td><img src="../image/<?php echo $rows['icon']; ?>" width="40"></td>
  <td><a href="theloai_sua.php?idTL=<?php echo $rows['idTL'];?>">Sửa</a></td>
  <td><a href="theloai_xoa.php?idTL=<?php echo $rows['idTL'];?>" onclick="return confirm('Bạn chắc chắn?');">Xóa</a></td>
</tr>
<?php } ?>
</table>

