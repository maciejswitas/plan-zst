<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */
$path = "./plany/n128.html";
$myFile = fopen($path, "r");
$str = fread($myFile, filesize($path));
fclose($myFile);
$htmlArray = explode(PHP_EOL, $str);
$htmlArray = array_slice($htmlArray, 27);
$endOfTable = array_search("</table>", $htmlArray);
$htmlArray = array_slice($htmlArray, 0, $endOfTable);
//var_dump($htmlArray);
$maxLessonHours = count($htmlArray) / 9;
$planArray = array();
$days = array();
$index = 3;

        for ($i =  0; $i < $maxLessonHours; $i++) {
            for ($j = 0; $j < 5; $j++) {
                $days[$j] = $htmlArray[$index];
                $index++;
            }
            $planArray[$i] = $days;
            $index += 4;
        }
        
$arrayNames = array("monday" => 0, "tuesday" => 1, "wednesday" => 2, "thursday" => 3, "friday" => 4);
$planByDays = [];

foreach($arrayNames as $arrayName => $i) {
    $$arrayName = [];
    foreach($planArray as $hour){
        $hour[$i] = str_replace("<br>", " / ", $hour[$i]);
        //$$arrayName[] = strip_tags($hour[$i]);
        $$arrayName[] = $hour[$i];
    }
    $planByDays[] = $$arrayName;
}

var_dump($planByDays);

$htmlResponse = "";
        
foreach($planByDays as $day) {
$htmlResponse .= "<div><ol>";
            
    foreach($day as $lesson) {
        $htmlResponse .= "<li>$lesson</li>";
    }
            
    $htmlResponse .= "</ol></div>";
}
echo $htmlResponse;


