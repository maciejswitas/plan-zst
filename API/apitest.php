<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */
spl_autoload_register(
    function(string $name) {
        require_once './classes/' . $name . '.php';
    });

$files = new FileNames("./plany/");
$plan = new GetPlanArray("1A 1Tinf");
$view = new MakeView($plan);

var_dump($view->divView());

