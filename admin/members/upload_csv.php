<?php
	@session_start();
	
	if(isset($_SESSION['admin_username']))
	{
		include('../include/inside_header.php');
		include('../include/side_bar.php');
                if(isset($_POST['submit']))
{
    
    $mimes = array('application/vnd.ms-excel','text/plain','text/csv','text/tsv');
if(in_array($_FILES['file']['type'],$mimes)){
  // do something
    if ($_FILES["file"]["error"] > 0)
{
    echo "Error: " . $_FILES["file"]["error"] . "<br>";
}
else
{
    echo "Upload: " . $_FILES["file"]["name"] . "<br>";
    echo "Type: " . $_FILES["file"]["type"] . "<br>";
    echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br>";
    //echo "Stored in: " . $_FILES["file"]["tmp_name"];
	$a=$_FILES["file"]["tmp_name"];
	
// path where your CSV file is located
//define('CSV_PATH','C:/xampp/htdocs/');
//<!-- C:\xampp\htdocs -->
// Name of your CSV file
$csv_file = $a; 
 
if (($getfile = fopen($csv_file, "r")) !== FALSE) {
         $data = fgetcsv($getfile, 1000, ",");
   while (($data = fgetcsv($getfile, 1000, ",")) !== FALSE) {
     //$num = count($data);
	   //echo $num;
        //for ($c=0; $c < $num; $c++) {
            $result = $data;
        	$str = implode(",", $result);
        	$slice = explode(",", $str);
 
            $col1 = $slice[0];
            $col2 = $slice[1];
            $col3 = $slice[2];
            $col4 = $slice[3];
            $col5 = $slice[4];
            $col6 = $slice[5];
            $col7 = $slice[6];
            $col8 = $slice[7]; 
            $col9 = $slice[8];
            $col10 = $slice[9];
            $col11 = $slice[10];
            $col12 = $slice[11];
            $col13 = $slice[12];
            $col14 = $slice[13]; 
            $col15 = $slice[14];
            $col16 = $slice[15]; 
            $col17 = $slice[16]; 
            $col18 = $slice[17];
            $col19 = $slice[18];
            $col20 = $slice[19]; 
            $col21 = $slice[20];
            $col22 = $slice[21];
            $col23 = $slice[22];
            $col24 = $slice[23];
            $col25 = $slice[24]; 
            $col26 = $slice[25];
            $col27 = $slice[26]; 
            $col28 = $slice[27]; 
            $col29 = $slice[28];
            $col30 = $slice[29];
            $col31 = $slice[30]; 
            $col32 = $slice[31];
            $col33 = $slice[32];
            $col34 = $slice[33]; 
            $col35 = $slice[34];
 
$query = "INSERT INTO directors(full_name, business_name,business_type,address,city,state,postal_code,country,area_location,phone,fax,website,email,about_us,special_offer,map_link,latitude,longitude,manual_entry,user_type,image,banner_image,email_confirm,is_email_confirm,forgot_password,rating,total_location,abn,acn,business_mail,business_phone)
                                VALUES('".$col1."','".$col2."','".$col3."','".$col4."','".$col5."','".$col6."','".$col7."','".$col8."','".$col9."','".$col10."','".$col11."','".$col12."','".$col13."','".$col14."','".$col15."','".$col16."','".$col17."','".$col18."','1','1','".$col21."','".$col22."','".$col23."','1','".$col25."','".$col26."','".$col27."','".$col28."','".$col29."','".$col30."','".$col31."')";
//echo $query;
//exit;
$s= mysql_query($query);
}
}
if($s)
{
echo "<script>alert('Record successfully uploaded.');window.location.href='../index.php';</script>";
}
//echo "File data successfully imported to database!!";
mysql_close($connect);
}
} 


else {
    echo "<script>alert('Sorry, only csv type files are allowed');</script>";
  
}

}
?>


<div class="content">
        
        <div class="header">
            
            <h1 class="page-title">Upload Csv</h1>
        </div>
        
                <ul class="breadcrumb">
            <li><a href="">Csv</a> <span class="divider">/</span></li>
            <li class="active">Director Record</li>
        </ul>

        <div class="container-fluid">
            <div class="row-fluid">
                    
<!--<div class="btn-toolbar">
    <button class="btn btn-primary"><i class="icon-plus"></i> New User</button>
    <button class="btn">Import</button>
    <button class="btn">Export</button>
  <div class="btn-group">
  </div>
</div>-->
<div class="well">
<form action="" method="post"
        enctype="multipart/form-data">
<table>
    <tr>
        <td>
            Filename:
        </td>
        <td>
            <input type="file" name="file" id="file">
        </td>
    </tr>
    <tr>
        <td colspan="2" align="right">
            <input type="submit" name="submit" value="Submit">
        </td>
    </tr>
</table>
</form>


 
    
    
</div>


<?php	
	include_once('../include/footer.php');
		
}
else
{
	header('Location:../login.php');
}
?>
                    
        
