<?php

	$fichier = $_GET['fichier'];
	$file = fopen($fichier,'r');
    if ($file)
	{ // laden und Richtung Browser ausgeben -> ergo Download
        $fichiername = basename($fichier);
        $size = filesize($fichier);
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
        //header("Cache-Control: private",false);
        //header("Content-Type: application/csv-tab-delimited-table");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment; filename=\"".$fichiername."\";");
        header("Content-Description: File Transfer");
        header("Content-Transfer-Encoding: binary");
        header('Content-Length: '.$size );
        flush();
        while (!feof($file)) {
            print(fread($file,(4096 * 8)));
            flush();
        }
    }
    fclose($file);
    die();

?>
