<?php
$teacher_id = $_GET['tid']; 
include('../../../connection.php');
$str = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890";
$str=str_shuffle($str);
$str=substr($str,0,8);

$query= "Update teacher_info set password='$str' where teacher_id = '$teacher_id'";

if (mysqli_query($conn, $query)){?>
    <!-- echo"Password Generated sucessfully!"; -->
    <script>
    alert("Password Generated Successfully!");
    </script>
    <!-- // header("Location: teacher.php"); -->
    <META HTTP-EQUIV ="Refresh" CONTENT="0; URL=http://localhost/project/Admin/Admin's%20Portal/details/teacher.php">
    <?php
}else{
    echo "Error Occur during deleting record!";
    mysqli_connect_error();
}
?>