
<?php   
if(isset($_POST['submit']))  
{   

   $con=mysqli_connect("remotemysql.com","Bvi6TRjeoH","aD13zcazgh","Bvi6TRjeoH");

if ( !empty($_POST["JobDesc"]) and !empty($_POST["Company"]) and !empty($_POST["PostDate"])
	and !empty(	$_POST["Interdate"]) and !empty($_POST["strm"]) and !empty($_POST["Qual"]) and !empty($_POST["oreq"])
and !empty($_POST["salPack"]) and !empty($_POST["Loc"]) )
{
		session_start();
		$un=$_SESSION['username'];
		$jd=$_POST["JobDesc"];
		$jid=$_POST["JobID"];
		$cmp=$_POST["Company"];
		$pd=$_POST["PostDate"];
		$idt=$_POST["Interdate"];
		$exdt=$_POST["expDate"];
		$strm=$_POST["strm"];
		$Qual=$_POST["Qual"];
		$oreq=$_POST["oreq"];
		$SalPack=$_POST["salPack"];
		$Loc=$_POST["Loc"];

               $con=mysqli_connect("remotemysql.com","Bvi6TRjeoH","aD13zcazgh","Bvi6TRjeoH");
		$qry="INSERT INTO `placement_tbl` (`JobID`, `JobDesc`, `CompanyName`, `PostDate`, `InterviewDate`, `ExpDate`, `Stream`, `Qualification`, `OtherReq`, `SalPackage`, `Location`) VALUES
 ($jid,'$jd','$cmp','$pd','$idt','$exdt','$strm','$Qual','$oreq','$SalPack','$Loc')";
$x=mysqli_query($con,$qry);
		if ($x)
			{
				
				echo "<script>alert('Data saved');</script>";
				header('refresh:0;url=https://placementsystem.herokuapp.com/admdash.php?uname='.$un);
			}		
		else
		{
			
			echo "<script>alert('could not save data');</script>";
			header('refresh:0;url=https://placementsystem.herokuapp.com/admdash.php?uname='.$un);
		}
}
else
{
	echo "<script>alert('fields cannot be left empty');</script>";
	header('refresh:0;url=https://placementsystem.herokuapp.com/admdash.php?uname='.$un);
}
}
?>
