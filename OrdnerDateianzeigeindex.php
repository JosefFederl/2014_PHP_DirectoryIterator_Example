<body>
<html>

Ihr bekommt den Inhalt des Ordners angezeigt. <br>
Zum Download "Rechts Klick" auf den blauen Filename und "Ziel speichern unter"  <br>

<form enctype="multipart/form-data" action="upload.php" method="post"> 
<input type="file" name="file"><br> 
<input type="submit" value="hochladen"> 
</form> 

<?  
echo "<table border=\"1\">"; 

function fsize($file) 
{ 
  $size = number_format((filesize($file) / 1048576), 2, ",", ".");
  return  $size . " MB"; 
} 

$verz=opendir('.');
$x = 0;
global $ordner;
while($file = readdir($verz)){
  $ordner[$x] = $file;
  $x++;
  }
  
closedir($verz);

// Dateien ausgeben 
array_shift($ordner);
array_shift($ordner);

//index.php und upload.php suchen
$x = array_search('index.php', $ordner);
array_splice($ordner, $x, 1);

$x = array_search('upload.php', $ordner);
array_splice($ordner, $x, 1);

//sortierung
natcasesort($ordner);

global $x;
$x = 0;

function schreiben($var){
  global $ordner2, $x;
  $ordner2[$x] = $var;
  $x++;
}

array_walk($ordner, "schreiben");

for($x = 0; $x < count($ordner); $x++){
    echo "<tr>";
    echo "  <td width=\"500\"><a href=\"".$ordner2[$x]."\">".$ordner2[$x]."</td></a> </td><td width=\"150\" align=\"right\">".fsize($ordner2[$x])."</td>";
    echo "</tr>";
}

echo "</table>"; 
?> 

</body>
</html>
