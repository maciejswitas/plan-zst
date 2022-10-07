<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of MakeView
 *
 * @author macie
 */
class MakeView {
    /**
     * 
     * @var string
     */
    public $view;
    /**
     * 
     * @var GetPlanArray
     */
    public $plan;
    private $hours = array("07:10 - 7:55", "08:00 - 08:45", "08:55 - 09:40", "09:50 - 10:35", "10:55 - 11:40", "11:50 - 12:35", "12:45 - 13:30", "13:40 - 14:25", "14:30 - 15:15", "15:20 - 16:05", "16:10 - 16:55", "17:00 - 17:45", "17:50 - 18:30");
    private $days = array("Poniedziałek", "Wtorek", "Środa", "Czwartek", "Piątunio");
    public function __construct(GetPlanArray $plan) {
        $this->plan = $plan;
    }
    
    public function divView() {
        $htmlResponse = '<div class="container mb-5"><h1>' . $this->plan->className . '</h1>';
        $htmlResponse .= '<small>' . $this->plan->valid . '</small></div>';
        $j = 0;
        
        foreach($this->plan->planArray as $day) {
            $i = 0;
            $htmlResponse .= '<div class="container p-3 mb-5 border border-light rounded shadow bg-white"><h3>' . $this->days[$j] . '</h3><ul class="list-group list-group-flush">';
            $j++;
            
            foreach($day as $lesson) {
                
                if($lesson == "&nbsp;") {
                    $i++;
                    continue;
                }
                $lessonHour = $i + 1;
                $htmlResponse .= '<li class="list-group-item list-group-item-action">'. $lessonHour . '. ' . $this->hours[$i] . ' - ' . $lesson . '</li>';
                $i++;
            }
            
            $htmlResponse .= '</ol></div></div><div class="col-lg-2"></div></div>';
        }

        $this->view = $htmlResponse;
        return $this->view;
    }
}
