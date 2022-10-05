<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of GetPlanArray
 *
 * @author macie
 */
class GetPlanArray {
    private $className;
    public $planArray;
    
    public function __construct($className) {
        $this->className = $className;
        $path = FileNames::$names[$this->className];
        $this->planArray = ReadFile::getPlan($path);
    }
    
    public function getPlan($hour, $day) {
        return $this->planArray[$hour][$day];
    }
}