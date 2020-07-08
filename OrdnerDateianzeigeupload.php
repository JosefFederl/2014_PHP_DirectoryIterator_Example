<html>
<body>


<?php  
$tempname = $_FILES['file']['tmp_name'];  
$name = $_FILES['file']['name']; 
$size = $_FILES['file']['size'];  


if($size > "15728640") {  
    $err[] = "Die Datei welche du hochladen willst, ist zu gross!<br>Maximale Dateigrosse beträgt 15 MB!";  
}  
 if(empty($err)) {  
    copy("$tempname", "$name");  
    echo "Die Datei $name wurde erfolgreich hochgeladen!";  
}  
else {  
    foreach($err as $error)  
    echo "$error<br>";  
}  
?>  


<a href="index.php">Zurück zur Liste</a>
</body>
</html>