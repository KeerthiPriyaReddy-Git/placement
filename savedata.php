
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
		$cmp=$_POST["Company"];
		$pd=$_POST["PostDate"];
		$idt=$_POST["Interdate"];
		$exdt=$_POST["expDate"];
		$strm=$_POST["strm"];
		$Qual=$_POST["Qual"];
		$oreq=$_POST["oreq"];
		$SalPack=$_POST["salPack"];
		$Loc=$_POST["Loc"];

		$qry="SELECT max(JobID) AS maxid FROM placementdb";
               $con=mysqli_connect("remotemysql.com","Bvi6TRjeoH","aD13zcazgh","Bvi6TRjeoH");
		$run=mysqli_query($con,$qry);
		while ($rows=mysqli_fetch_array($run))
		{
			$jid=$rows[0];
		}	



		$qry="
INSERT INTO `placement_tbl` (`JobID`, `JobDesc`, `CompanyName`, `PostDate`, `InterviewDate`, `ExpDate`, `Stream`, `Qualification`, `OtherReq`, `SalPackage`, `Location`) VALUES
 ('$jid+1','$jd','$cmp','$pd','$idt','$exdt','$strm','$Qual','$oreq','$SalPack','$Loc')";

		if (mysqli_query($con,$qry))
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
