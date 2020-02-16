<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" media="screen" type="text/css" href="./style.css"/>
    <meta charset="utf-8" />
    <title>Research Incidents</title>
</head>
<body>
<div style="background-color:#45a1ff">
    <img src="index.png" alt="logo orange" width="100" height="100" style="float:left">
    <img src="Thieni.jpg" style="float:right">

    <div class="entete">

        <p id="titreform"style="color:orange">THIENI GBANANI</p>

    </div>
</div>
<div class="search-container">
    <form name="completion_form" method="POST" action="">
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
        <br>
        <br>
    <input type="text" name="completion_text" id="completion_text" placeholder="Search nom fichier">
    <input type="button" onclick="completion_form.submit();" value="Envoyer" >
    </form>
    <p>suggestions limitées à 30:</p>
    <div class="suggestions">
        <ul></ul>
    </div>
</div>
<script>
    //  var str =document.completion_form.completion_text.value();
    var list_cmd_ra = '<?php
        if (isset($_POST['techno'])){
            if ($_POST['techno']=="FEMTO"){
                $dir='/var/www/html/femto/';

            }elseif ($_POST['techno']=="LoRa"){
                $dir='/var/www/html/Lora/';

            }elseif ($_POST['techno']=="WIFI"){
                $dir='/var/www/html/wifi/';

            }
        }else{
            echo "TECHNO NOT FOUND  THANKS !!!";
        }

    $resultat=shell_exec("ls ".$dir."");
    //echo var_dump($resultat);
    $ra=preg_split("/\n/",$resultat);

    echo json_encode($ra);?>';
    var list_array=JSON.parse(list_cmd_ra);
   // console.log('tableau%o',list_array);
   // alert(list_cmd_ra);

    const input = document.querySelector('#completion_text');
    const suggestions = document.querySelector('.suggestions ul');

    //const fruit = [ 'Apple', 'Apricot', 'Avocado 🥑', 'Banana', 'Bilberry', 'Blackberry', 'Blackcurrant', 'Blueberry', 'Boysenberry', 'Currant', 'Cherry', 'Coconut', 'Cranberry', 'Cucumber', 'Custard apple', 'Damson', 'Date', 'Dragonfruit', 'Durian', 'Elderberry', 'Feijoa', 'Fig', 'Gooseberry', 'Grape', 'Raisin', 'Grapefruit', 'Guava', 'Honeyberry', 'Huckleberry', 'Jabuticaba', 'Jackfruit', 'Jambul', 'Juniper berry', 'Kiwifruit', 'Kumquat', 'Lemon', 'Lime', 'Loquat', 'Longan', 'Lychee', 'Mango', 'Mangosteen', 'Marionberry', 'Melon', 'Cantaloupe', 'Honeydew', 'Watermelon', 'Miracle fruit', 'Mulberry', 'Nectarine', 'Nance', 'Olive', 'Orange', 'Clementine', 'Mandarine', 'Tangerine', 'Papaya', 'Passionfruit', 'Peach', 'Pear', 'Persimmon', 'Plantain', 'Plum', 'Pineapple', 'Pomegranate', 'Pomelo', 'Quince', 'Raspberry', 'Salmonberry', 'Rambutan', 'Redcurrant', 'Salak', 'Satsuma', 'Soursop', 'Star fruit', 'Strawberry', 'Tamarillo', 'Tamarind', 'Yuzu'];

    function search(str) {
        let results = [];
        const val = str.toLowerCase();
        if(str.length>=3){
            for (var i = 0; i <list_array.length; i++) {
                if (list_array[i].toLowerCase().indexOf(val) >-1) {
                    if (results.length<=30) {
                        results.push(list_array[i]);
                    }else{
                      //  alert('hello');
                        //results.push('true');
                        var msg='true';
                        results.push(msg);
                    }

                }
            }
        }
        return results;
    }

    function searchHandler(e) {
        const inputVal = e.currentTarget.value;
        let results = [];
        if (inputVal.length > 0) {
            results = search(inputVal);
        }
        showSuggestions(results, inputVal);
    }

    function showSuggestions(results, inputVal) {

        suggestions.innerHTML = '';

        if (results.length > 0) {
            for (i = 0; i < results.length; i++) {
                let item = results[i];
                // Highlights only the first match
                // TODO: highlight all matches
                const match = item.match(new RegExp(inputVal, 'i'));
                item = item.replace(match[0], `<strong>${match[0]}</strong>`);
                suggestions.innerHTML += `<li>${item}</li>`;
            }
            suggestions.classList.add('has-suggestions');
        } else {
            results = [];
            suggestions.innerHTML = '';
            suggestions.classList.remove('has-suggestions');
        }
    }

    function useSuggestion(e) {
        input.value = e.target.innerText;
        input.focus();
        suggestions.innerHTML = '';
        suggestions.classList.remove('has-suggestions');
    }

    input.addEventListener('keyup', searchHandler);
    suggestions.addEventListener('click', useSuggestion);
</script>
    <a href="/TG/download.php?fichier=<?php //echo $_POST['completion_text'];?>" title="Commande(s) RHM(s) retour arrière">Télécharger Incident</a>

<br>
<br>
<div>
    </center>
    <footer>
        <p>Mentions légales © VIP Production 2020- Tous droits réservés </p><br/>
        <p><a href="mailto:mkonan.ext@orange.com">mkonan.ext@orange.com</a></p>
        <p><a href="tel:+33xxxxx">+33 4 37 44 52 36</a></p>
    </footer>
</div>
</body>
</html>
<?php
/*echo $_POST['completion_text'];*/