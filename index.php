<?php 

$link = mysqli_connect('eu-cdbr-azure-west-a.cloudapp.net', 'b7f4e2212b17d3', '16127b3f'); 

if (!$link) 

{ 

  $output = 'Unable to connect to the database server.'; 

  include 'output.html.php'; 

  exit(); 

} 

 

if (!mysqli_set_charset($link, 'utf8')) 

{ 

  $output = 'Unable to set database connection encoding.'; 

  include 'output.html.php'; 

  exit(); 

} 

 

if (!mysqli_select_db($link, 'outnabout')) 

{ 

  $output = 'Unable to locate the outnabout database.'; 

  include 'output.html.php'; 

  exit(); 

} 

 

$result = mysqli_query($link, 'SELECT bname FROM business');  

if (!$result)  

{  

  $error = 'Error fetching businesses: ' . mysqli_error($link);  

  include 'error.html.php';  

  exit();  

}  

  

while ($row = mysqli_fetch_array($result))  

{  

  $businesses[] = $row['bname'];  

}  

  

include 'businesses.html.php';  

?>