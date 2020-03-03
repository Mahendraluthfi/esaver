<?php 

if ( ! function_exists('return_json')){

    function return_json($array){
        header('Content-Type: application/json');
        echo json_encode($array);
    }
}