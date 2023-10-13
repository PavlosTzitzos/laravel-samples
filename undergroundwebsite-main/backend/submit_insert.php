<?php include("..\connect.php"); ?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Underground Web Radio | Show Selection</title>
<link rel="shortcut icon" type="image/x-icon" href="..\assets\img\tab.png">

<link rel="stylesheet" type="text/css" href="../base_css.css">
<link rel="stylesheet" href="assets/css/css_selection.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">


<style type="text/css">
<!--
<?php
  include('base_css.php');
?>

.style1 {
	font-size: 36px;
	font-style: italic;
}
body {
	background-color: #FFFFFF;
}
-->
</style>
</head>
<body>
  <div align="center">
    <p><BR>
      <?php 
    
    $show_name = $_POST['in_show_name'];
    $producer1 = $_POST['in_producer1'];
    $producer2 = $_POST['in_producer2'];
    $producer3 = $_POST['in_producer3'];
    $producer4 = $_POST['in_producer4'];
    $descr = $_POST['in_description'];


    

    $query = "INSERT INTO SHOW_TABLE(SHOW_NAME, PRODUCER_1, PRODUCER_2, PRODUCER_3, PRODUCER_4) VALUES ('$show_name','$producer1','$producer2','$producer3', 'producer4','$descr');"
  
    //execute query 
    $queryexe = mysqli_query($con, $query);
    
    if (!$queryexe){
        echo("Error description: " . mysqli_error($con));
    }else{
        echo("<p class=\"pag_title\" align=\"center\"><strong><font size=\"+2\">Success!</font></strong><br/>");
    }

?>
      </p>
    <a href="admin_student_table.php">Πίσω</a><BR>
</div>
</body>
</html>