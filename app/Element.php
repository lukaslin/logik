<?php
class searchedElement {
    var $position;          // int
    var $color;             // string
    
    function __construct ($position, $color) {
        $this->color=$color;
        $this->position=$position;
    }
}

class element extends searchedElement {
    
    function checkPosition ($searchedElement) {
        if ($this->position===$searchedElement->position) {
            return true;
        }
        else {
            return false;
        }
    }
    
    function checkColor ($searchedElement) {
        if ($this->color===$searchedElement->color) {
            return true;
        }
        else {
            return false;
        }        
    }
    
    function randElement () {
        global $colors;
        $number=rand(1, 6);
        return $colors[$number]->name;
    }
}
    
?>
