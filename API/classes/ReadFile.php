<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of ReadFile
 *static methods for reading plan html files
 * @author macie
 */
class ReadFile {
    
    public static function getClassName($path) {
        $myFile = fopen($path, "r");
        $str = fread($myFile, filesize($path));
        fclose($myFile);
        $htmlArray = explode(PHP_EOL, $str);
        $className = strip_tags($htmlArray[13]);
        return $className;
    }
    
    public static function getPlan($path) {
        $myFile = fopen($path, "r");
        $str = fread($myFile, filesize($path));
        fclose($myFile);
        $htmlArray = explode(PHP_EOL, $str);
        $htmlArray = array_slice($htmlArray, 27);
        $endOfTable = array_search("</table>", $htmlArray);
        $htmlArray = array_slice($htmlArray, 0, $endOfTable);
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
        return $planArray;
    }
    
}
