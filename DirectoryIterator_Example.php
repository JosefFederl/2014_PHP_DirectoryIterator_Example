<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Title</title> 
<meta name="robots" content="index, follow">
<meta name="language" content="de">
<meta name="content-language" content="de">
<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1">
<meta http-equiv="content-script-type" content="text/javascript">
<meta http-equiv="content-style-type" content="text/css">
<meta http-equiv="content-language" content="de">
<style type="text/css">		
	body {font-family:Arial}
</style>
</head>

<body> 
<table style="position:absolute;top:5px;left:5px" width="99%" cellspacing="0" cellpadding="0">
  <tr>

   <td height="71" colspan="4"  align="center">
   <img border="0" src="titel.gif" width="900" height="71" alt="alt">

     <?php include("menu.php");?>

   <td width="5">
   
   <td valign="top">

<h3>Infos</h3>
<b>

<?php
 echo <<<TABLEHEAD
<table border="1" cellpadding="2" cellspacing="3">
    <tr>
    <th>Dateiname</th>
    <th>Dateigröße</th>
    </tr>
TABLEHEAD;

$verzeichnis = 'info/';
$tmp = array();
 
foreach (new DirectoryIterator( $verzeichnis ) as $datei)
{
    if (!$datei->isDir() && !$datei->isDot())
    {
        $tmp[] = array('path'  => $verzeichnis.$datei->getFilename(),
                       'title' => $datei->getFilename(),
					   'sizee' => ceil( $datei->getSize()/1024 ) ,	);
    }
}
 
function cb($a, $b)
{
    return strcmp($a['title'], $b['title']);
}
 
usort($tmp, 'cb');
 
foreach ($tmp as $entry) {
	echo '<tr>';
	echo '<td> <a href="' . $entry['path'] . '">' . $entry['title'] . '</a></td><td>' . $entry['sizee'] . 'KB</td></tr>';
}
echo '</table>';
?>

</b>
<hr>
<h3>Presse</h3>

<?php
 echo <<<TABLEHEAD
<table border="1" cellpadding="2" cellspacing="3">
    <tr>
    <th>Dateiname</th>
    <th>Dateigröße</th>
    </tr>
TABLEHEAD;

$verzeichnis = 'presse/';
$tmp = array();
 
foreach (new DirectoryIterator( $verzeichnis ) as $datei)
{
    if (!$datei->isDir() && !$datei->isDot())
    {
        $tmp[] = array('path'  => $verzeichnis.$datei->getFilename(),
                       'title' => $datei->getFilename(),
					   'sizee' => ceil( $datei->getSize()/1024 ) ,	);
    }
}
 
 
usort($tmp, 'cb');
 
foreach ($tmp as $entry) {
	echo '<tr>';
	echo '<td> <a href="' . $entry['path'] . '">' . $entry['title'] . '</a></td><td>' . $entry['sizee'] . 'KB</td></tr>';
}
?>

</table>
   <td width="5">
  <tr>
   <td height="28" colspan="4">
 </table>
</body>
</html>
