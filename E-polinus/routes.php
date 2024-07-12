<?php
    $project_location = "/E-polinus";
    $me = $project_location;

    $request = $_SERVER['REQUEST_URI'];

    switch ($request) {
        case $me.'/pilihDokter' :
            require "pilihDokter.php";
            break;
        case $me.'/daftarPasien' :
            require "pasienBaru.php";
            break;
        case $me.'/ajukanPeriksa' :
            require "pasienLama.php";
            break;
        default:
            http_response_code(404);
            require "error404.php";
            break;
    }
?>