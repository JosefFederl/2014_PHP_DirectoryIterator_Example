<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Beispiel</title>
</head>
<body>
<h2> Um Bilder zu vergrößen einfach draufklicken.</h2>
<h2> Zurück-Funktion des Browsers benutzen um zurück zu kehren.</h2>
<hr><br><h2>Daten, Dokumente, andere Formate</h2>
<?php
$ordner = ".";
$alledateien = scandir($ordner);           
 
foreach ($alledateien as $datei) {
 $dateiinfo = pathinfo($ordner."/".$datei); 
 $size = ceil(filesize($ordner."/".$datei)/1024); 
 if ($datei != "." && $datei != ".."  && $datei != "_notes" && $bildinfo['basename'] != "Thumbs.db" && $datei != "index.php") {
 //Bildtypen sammeln
 $bildtypen= array("jpg", "jpeg", "gif", "png");
 //Dateien nach Typ prüfen, in dem Fall nach Endungen für Bilder filtern
 if(! in_array($dateiinfo['extension'],$bildtypen)){// wenn keine Bildeindung dann normale Liste für Dateien ausgeben
  ?>
            <div class="file">
             <a href="<?php echo $dateiinfo['dirname']."/".$dateiinfo['basename'];?>">&raquo <?php echo $dateiinfo['filename']; ?></a> (<?php echo 
$dateiinfo['extension']; ?> | <?php echo $size ; ?>kb)
            </div>
            <?php  
 } 
 } 
 }

echo "<br><hr><br><h2>Bilder</h2><hr>";
 
 foreach ($alledateien as $datei) {
 $dateiinfo = pathinfo($ordner."/".$datei); 
 $size = ceil(filesize($ordner."/".$datei)/1024); 
 if ($datei != "." && $datei != ".."  && $datei != "_notes" && $bildinfo['basename'] != "Thumbs.db" && $datei != "index.php") {
 //Bildtypen sammeln
 $bildtypen= array("jpg", "jpeg", "gif", "png");
 //Dateien nach Typ prüfen, in dem Fall nach Endungen für Bilder filtern
 if( in_array($dateiinfo['extension'],$bildtypen)){// Bilder ausgeben
?>
            <div class="galerie">
		<?php echo $dateiinfo['filename']; ?> (<?php echo $size ; ?>kb)</br>
                <a href="<?php echo $dateiinfo['dirname']."/".$dateiinfo['basename'];?>">
                <img src="<?php echo $dateiinfo['dirname']."/".$dateiinfo['basename'];?>" width="340" alt="Vorschau" /></a>
            </div>
     <?php
 } 
 } 
 }
?>
</body>
</html>
