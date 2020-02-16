<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" media="screen" type="text/css" href="./style.css"/>
    <meta charset="UTF-8">
    <title>Memo Incidents</title>
</head>
<body>

<div style="background-color:#45a1ff">
    <img src="index.png" alt="logo orange" width="100" height="100" style="float:left">
    <img src="Thieni.jpg" style="float:right">

    <div class="entete">

        <p id="titreform"style="color:orange"> THIENI  GBANANI</p>
        <!--  <p style="color:orange"> D O R</p>-->
        <!--  <center styme="color:black"> real time</center>-->
    </div>
</div>

<form name="formSaisie" method="POST" action="">
    Day:<br>
    <input type="date" name="day" id="jour" required><br>
    Techno:<br>
    <select name="techno">
        <option value="platteforme" >Choisir la techno:</option>
        <option value="FEMTO">FEMTO</option>
        <option value="LoRa">LoRa</option>
        <option value="WIFI">WIFI</option>
        <!--<option value="BORDEBC">BORDEBC</option>
        <option value="LYLACBC">LYLACBC</option>
        <option value="MASSEBC">MASSEBC</option>
        <option value="MAUROBC">MAUROBC</option>
        <option value="POGCEBC">POGCEBC</option>
        <option value="LYPRE_S">LYPRE_S</option>
        <option value="STWODBC">STWODBC</option>
        <option value="DCVR1BC">DCVR1BC</option>-->
    </select>
    <!--  Type:<br>
      <select name="type">
          <option value="platteforme" >Choisir le type:</option>
          <option value="FEMTO">3AGP</option>
          <option value="LoRa">Lora</option>
          <option value="WIFI">WIFI</option>
          <option value="BORDEBC">BORDEBC</option>
          <option value="LYLACBC">LYLACBC</option>
          <option value="MASSEBC">MASSEBC</option>
          <option value="MAUROBC">MAUROBC</option>
          <option value="POGCEBC">POGCEBC</option>
          <option value="LYPRE_S">LYPRE_S</option>
          <option value="STWODBC">STWODBC</option>
          <option value="DCVR1BC">DCVR1BC</option>
      </select>-->

    <br>

    Code Incident:<br>
    <input type="text" name="code_incid" id="ci" required><br>
    Description Incident:<br>
    <input type="text" name="description" id="di" required><br>
    Actions:<br>
    <input type="textarea" name="act" id="taf"><br>

    <script>

        function checktaf() {

            var d =Date.parse(document.getElementById("jour").value)/1000 ;
                var i;

                if(document.formSaisie.act.value != ""){
                    document.formSaisie.submit();
                }else{
                    alert("Veuillez saisir votre TAF pour cet incident !!!");
                    return true;
                }

        }

    </script>
    <div>
        <button type="submit" onclick="checktaf()">Validez</button>
    </div>
</form>
<br>
<?php
//echo " Appli Tieni Gbanani\n";

$today = date("Y-m-d");

$format=$today.'.txt';
/*echo $_POST['code_incid'];
$keywords = preg_split("/\//",$_POST['code_incid'] );
print_r($keywords);
$test= preg_split("/-/",$keywords[0] );
print_r($test);
$name=$test[0]-$test[1]-$keywords[2]-$keywords[3];*/
$name=$_POST['code_incid'];
//echo $name;
$filename=$name."-".$format;
$filename_R_A='Cmd_RHM_RA-'.$format;
echo $filename."<br>";
//step text
$filename2 = 'resource.txt';
if (is_readable($filename2)) {
    echo 'Le fichier est accessible en lecture <br>';
} else {
    echo 'Le fichier n\'est pas accessible en lecture ! <br>';
}

if (isset($_POST['techno'])){
    if ($_POST['techno']=="FEMTO"){
        echo "Hello FEMTO <br>";

        if (is_writable($filename)) {
            $handle = fopen('C:\\wamp\www\TG\FEMTO\\'.$filename,'w');//version window
            //  $handle=fopen('/var/www/html/TG/FEMTO'.$filename,'w');
            fwrite($handle, $_POST['code_incid']."\n");
            fwrite($handle, $_POST['description']."\n");
            fwrite($handle, $_POST['act']."\n");
            fclose($handle);
        }else {
            echo "Le fichier $filename n'est pas accessible en écriture.<br>";
        }

    }elseif ($_POST['techno']=="LoRa"){
        echo "Hello LoRa <br>";
        if (is_writable($filename)) {
            $handle = fopen('C:\\wamp\www\TG\LoRa\\'.$filename,'w');//version window
            //  $handle=fopen('/var/www/html/TG/LoRa'.$filename,'w');
            fwrite($handle, $_POST['code_incid']."\n");
            fwrite($handle, $_POST['description']."\n");
            fwrite($handle, $_POST['act']."\n");
            fclose($handle);
        }else {
            echo "Le fichier $filename n'est pas accessible en écriture.<br>";
        }

    }elseif ($_POST['techno']=="WIFI"){
        echo "Hello WIFI <br>";


      //  echo $_POST['code_incid']."<br>";
       // echo $_POST['description']."<br>";
      //  echo $_POST['act']."<br>";
        if (is_writable($filename)) {
            $handle = fopen('C:\\wamp\www\TG\WIFI\\'.$filename,'w');//version window
            //  $handle=fopen('/var/www/html/TG/WIFI'.$filename,'w');
            fwrite($handle, $_POST['code_incid']."\n");
            fwrite($handle, $_POST['description']."\n");
            fwrite($handle, $_POST['act']."\n");
            fclose($handle);
        }else {
            echo "Le fichier $filename n'est pas accessible en écriture.<br>";
        }
       //


    }

}else{
    echo "TECHNO NOT FOUND  THANKS !!!";
}
?>
<br>
<a href="/TG/download.php?fichier=<?php echo  $filename2;?>" title="Commande(s) RHM(s)">Télécharger Incident </a>
<div>
    <footer>
        <p>Mentions légales © VIP Production 2020- Tous droits réservés </p><br>
        <p><a href="mailto:mknonan.ext@orange.com">mknonan.ext@orange.com</a></p>
        <p><a href="tel:+33xxxxx">+33 4 37 44 52 36</a></p>
    </footer>
</div>
</body>
</html>



