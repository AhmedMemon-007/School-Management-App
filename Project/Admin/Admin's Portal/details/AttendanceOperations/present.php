<?php
    $student_id = $_GET['sid']; 
    $date= $_GET['date'];
    $sclass= $_GET['sclass'];
    include('../../../connection.php');
    $query= "insert into attendance values ('$date', '$student_id', 'P')";

    if (mysqli_query($conn, $query)){
        echo"Marked Present sucessfully!";
        // header("Location: student.php");
        ?>
        <META HTTP-EQUIV ="Refresh" CONTENT="0; URL=http://localhost/project/Admin/Admin's%20Portal/details/AttendanceOperations/insertAttendance.php?sclass=<?php echo $sclass?>&date=<?php echo $date;?>">
        <?php
    }else{
        echo "Error Occur during deleting record!";
        mysqli_connect_error();
    }
?>