<?php

class searchedRow {
    
    var $line=array();
    
    function addElement ($element) {
        array_push($this->line, $element);
    }
    
    function randRow () {
        
        return 1;
    }
}

class row extends searchedRow {
    
    function process ($searchedRow) {   // return array with 2-color and position, 1-only color, 0-nothing
        
        $results=array();
        $used=array();
        
        $count=0;
        foreach ($this->line as $element) {
            $result=$this->comparePositionColor($element, $searchedRow->line[$count], $used);
            if ($result==2) {
                array_push($results, $result);
            }
            $count++;
        }
                
        foreach ($this->line as $element) {
            $result=$this->compareColor($element, $searchedRow, $used);
            if ($result==1) {
                array_push($results, $result);
            }
        }

        return $results;
//        return $used;
    }
    
    private function comparePositionColor ($element, $searchedElement, &$used) {
        if ($element->position==$searchedElement->position AND $element->color==$searchedElement->color) {
            $used[$element->position-1]=true;
            return 2;
        }
    }
    
    private function compareColor ($element, $searchedRow, &$used) {
        $count=0;
        foreach ($searchedRow->line as $searchedElement) {
            if ($element->color == $searchedElement->color) {   // equal of colors
                if (empty($used[$element->position-1])) {       // existence of PC marker
                    if (empty($used[$count])) {                 // existence of C marker
                        $used[$count]=$element->color;
                        return 1; 
                    }
                }
                else  {
                    if ($used[$element->position-1] !== true) {
                        if (empty($used[$count])) {     // control of C color marker
                            $used[$count]=$element->color;
                            return 1; 
                        }                        
                    }
                }
            }
        $count++;
        }
    }
    
}
?>