<!DOCTYPE html>
<html lang="en">
<head>
	<link href ="js/sweetalert2.all.js" rel="stylesheet">
	<script src="js/sweetalert21.js"></script>
</head>
<body>
<?php
include "dblink.php";
$Prefix= mysqli_real_escape_string($conn, $_POST['Prefix']);
$Fname= mysqli_real_escape_string($conn, $_POST['Fname']);
$Lname = mysqli_real_escape_string($conn, $_POST['Lname']);
$IDCardNum= mysqli_real_escape_string($conn, $_POST['IDCardNumber']);
$DOB = mysqli_real_escape_string($conn, $_POST['DOB']);
$Gender= mysqli_real_escape_string($conn, $_POST['Gender']);
$BloodGroup = mysqli_real_escape_string($conn, $_POST['BloodGroup']);
$Nationality= mysqli_real_escape_string($conn, $_POST['Nationality']);
$Race= mysqli_real_escape_string($conn, $_POST['Race']);
$Religion= mysqli_real_escape_string($conn, $_POST['Religion']);
$MobileNo = mysqli_real_escape_string($conn, $_POST['MobileNo']);
$TelNo = mysqli_real_escape_string($conn, $_POST['TelNo']);
$Email = mysqli_real_escape_string($conn, $_POST['Email']);
$Address= mysqli_real_escape_string($conn, $_POST['Address']);
$Province= mysqli_real_escape_string($conn, $_POST['Province']);
$PostCode= mysqli_real_escape_string($conn, $_POST['PostCode']);
$School= mysqli_real_escape_string($conn, $_POST['School']);
$EducationBackground= mysqli_real_escape_string($conn, $_POST['EducationBackground']);
$Branch= mysqli_real_escape_string($conn, $_POST['Branch']);
$SchoolGPAX= mysqli_real_escape_string($conn, $_POST['SchoolGPAX']);
$RecruitPlanName = mysqli_real_escape_string($conn, $_POST['RecruitPlanName']);
$Status = 'รอจ่ายค่าสมัคร' ;


$result = $conn ->query("SELECT RecruitID FROM recruitinfo WHERE IDCardNumber='$IDCardNum' AND RecruitPlanName='$RecruitPlanName'");
if($result->num_rows == 0){

	$sql="INSERT INTO `recruitinfo`(`RecruitPlanName`, `MobileNumber`, `TelNumber`, `Email`, `SchoolID`, `EducationBackground`, `Branch`, `SchoolGPAX`, `Status`, `IDCardNumber`, `Prefix`, `FirstName`, `LastName`, `Gender`, `DOB`, `Nationality`, `Race`, `Religion`, `BloodGroup`, `Address`, `Province`, `PostCode`)
	VALUES ('$RecruitPlanName','$MobileNo','$TelNo','$Email','$School','$EducationBackground',
	'$Branch','$SchoolGPAX','$Status','$IDCardNum','$Prefix','$Fname','$Lname','$Gender','$DOB ','$Nationality',
	'$Race','$Religion','$BloodGroup','$Address','$Province','$PostCode')";
	if (!mysqli_query($conn,$sql)) {
		die('Error: ' . mysqli_error($conn));
	}

	$result = $conn ->query("SELECT RecruitID FROM recruitinfo WHERE IDCardNumber='$IDCardNum' AND RecruitPlanName='$RecruitPlanName'");
	while($row = $result->fetch_array(MYSQLI_ASSOC)){	
		for($i=0; $i<count($_POST["Department"]) ;$i++){
			if(trim($_POST["Department"][$i] != '' )){
				$Department = mysqli_real_escape_string($conn, $_POST['Department'][$i]);
				$j = $i+1;
				$sql = "INSERT INTO nodepartment VALUES('".$row["RecruitID"]."','$j','$Department')"; 
				if (!mysqli_query($conn,$sql)) {
					die('Error: ' . mysqli_error($conn));
				}
			}
		}
		echo "	<script>			
					swal({
						type: 'success',
						title: '<h1>การสมัครเสร็จเรียบร้อย<br>รหัสประจำตัวผู้สมัครของคุณคือ". $row['RecruitID'] ." <br></h1><br><h4>สามารถตรวจสถานะได้ในเว็บ</h4>',
						confirmButtonText: '<a href=\"recruit-login.php\" style=\"text-decoration: none\"><font color=\"white\">กลับสู่หน้าเว็บ</font></a>',
					});
				</script>";
	}

	
}
else{
	echo "	<script>			
				swal({
					type: 'error',
					title: '<h1>การสมัครล้มเหลว</h1><br><h5>ไม่สามารถสมัครโครงการเดียวกันซ้ำได้</h5>',
					showConfirmButton: 'false',
					showCancelButton: 'false',
					footer: '<a href=\"recruit-register.php\">กรอกข้อมูลใหม่</a>',
				});
			</script>";
}

mysqli_close($conn);

?>
</body>
</html>
