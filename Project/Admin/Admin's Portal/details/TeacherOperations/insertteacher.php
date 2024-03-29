<?php
include ('../../../connection.php');
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>M.S.M School</title>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="stylesheet" href="../../navstyle.css">
    <link rel="stylesheet" href="../adminOperations.css">
</head>

<body>
	<nav>
		<div class="logo">
			<h4><a href="../../adminhome.php">M.S.M School</a></h4>
		</div>
		<ul class= "nav-links">
            <li>
                <a href="../../adminhome.php">HOME</a>
            </li>
            <li>
                <a href="../../../admin.php ">LogOut</a>
			</li>
		</ul>
		<div class="burger">
            <div class= "line1"></div>
			<div class= "line2"></div>
			<div class= "line3"></div>
		</div>
	</nav>
    
    <div class="container">
        <div class= "formHeading">
        <b> Insert Teacher Info</b></div>
        <form action="#" method = "post">
            <div>
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" placeholder="Teacher's Name" required>
    </div>
    <div>
        <label for="pno">Phone Number:</label>
        <input type="text" name="p_no" id="pno" placeholder="Teacher's Phone no." >
    </div>
    <div>
        <label for="dob">Date of Birth:</label>
        <input type="date" name="dob" id= "dob" placeholder="Teacher's date Of Birth" required>
    </div>
    <div>
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" placeholder="Teacher's Email Address" required>
    </div>
    <div>
        <label for="subject">Subject:</label>
        <select name="subject" id="subject" class="select" >
        <?php 
                $query = "select * from subject";
                $quer = mysqli_query($conn, $query);
			while ($res = mysqli_fetch_array($quer) ){
                ?>
            <option value="<?php echo $res['subject_id'];?>"><?php echo $res['subject_name'];?>(<?php echo $res['type'];?>)</option>
            <?php
            }
            ?>
        </select>
    </div>
    <div>
        <label for="salary">Teacher's Salary:</label>
        <input type="text" name="salary" id="salary"placeholder="Teacher's Salary" requi>
    </div>
    <div>
        <input type="submit" name = "submit" value="Submit" class= "btn">
    </div>
</div>
<script src="app.js"></script>
<div class=output>
    <?php
    $str = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890";
    $str=str_shuffle($str);
    $str=substr($str,0,8);
    
    if(isset($_POST['submit'])){

    $name=$_POST['name']; 
    $email=$_POST['email'];
    $phoneno=$_POST['p_no'];
    $dateofbirth=$_POST['dob'];
    $subject=$_POST['subject'];
    $salary=$_POST['salary'];
    
    $sql = "INSERT INTO teacher_info (Name, email_address, phone_no, date_of_birth, salary, subject_id, password) 
    VALUES ('$name', '$email', '$phoneno', '$dateofbirth', '$salary', '$subject', '$str')";
    
    if (mysqli_query($conn, $sql)){
        echo"record inserted sucessfully!";?>
        <script>alert("record inserted successfully!")</script>
        <META HTTP-EQUIV ="Refresh" CONTENT="0; URL=http://localhost/project/Admin/Admin's%20Portal/details/teacher.php">
        <?php
    }else{
        echo "Error Occur during inserting record!";
        mysqli_connect_error();
    }
}

?>

</div>
</body>
</html>