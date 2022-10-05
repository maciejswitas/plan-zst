<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of AjaxHandlig
 * Handlig AJAX requests
 * @author macie
 */
class AjaxHandlig {
    public $requestType;
    public $requestString;
    public $response;
    
    public function __construct() {
        
        if(!isset($_REQUEST['type'])) {
            exit();
        }
        
        $this->requestType = $_REQUEST['type'];
        //$this->requestString = $_REQUEST['string'];
        $str = "";
        $className = "";
        switch($this->requestType) {
            case 'getClasses':
                $classes = FileNames::$classes;
                foreach($classes as $cls) {
                    $str .= $cls . "|";
                }
                $this->response = $str;
            break;
            case 'getPlan':
                $className = $_REQUEST['name'];
                $plan = new GetPlanArray($className);
                $firstDimensionArray = [];
                foreach($plan->planArray as $row) {
                    $firstDimensionArray[] = implode("|", $row);
                }
                $str = implode("&", $firstDimensionArray);
                $this->response = $str;
            break;
        }
                
    }
}
