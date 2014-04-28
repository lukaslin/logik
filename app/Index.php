<?php

class Index {
    
    function randRow (&$searchedRow) {
        $searchedRow=new searchedRow ();
        for ($x=1;$x<=4;$x++) {
            $element=new element($x, $this->randElement());
            $searchedRow->addElement($element);
            $_SESSION["assignment"]=$searchedRow;
        }
    }
    
    private function randElement () {
        global $colors;
        $number=rand(0, 5);
        return $colors[$number]->name;
    }
    
    function newAssign (&$searchedRow) {
        if (isset($_SESSION)) {                             // session exists
            if(empty($_SESSION["assignment"])) {            // assignment exists
                $searchedRow=new searchedRow ();
            }
            else {
                $searchedRow=$_SESSION["assignment"];
            }
        }
        
        if (isset($_POST)) {
            if (isset($_POST["submit"])) {
                if ($_POST["submit"] == "new" OR $_POST["submit"] == "single") {
                    unset($_SESSION["rows"]);
                    unset($_SESSION["results"]);
                    unset($_SESSION["assignment"]);
                }
            }
        }
        
    }
    
    function fillAssign (&$searchedRow) {
        if (!empty($_POST) AND $_POST["submit"] == "assign") {
            if (empty($_SESSION["assignment"])) {
                for ($x=1; $x<=4; $x++) {
                    $element=new element($x, $_POST["color".$x]);
                    $searchedRow->addElement($element);
                }
                $_SESSION["assignment"]=$searchedRow;
            }
            else {
                unset($_SESSION["assignment"]);
                unset($searchedRow->line);
                $searchedRow=new searchedRow ();
                for ($x=1; $x<=4; $x++) {
                    $element=new element($x, $_POST["color".$x]);
                    $searchedRow->addElement($element);
                }
                $_SESSION["assignment"]=$searchedRow;
            }
        }
    }
    
    function newRow () {
        $row=new row();
        if (!empty($_POST)) {
            if ($_POST["submit"] == "check") {
                for ($x=1; $x<=4; $x++) {
                    $element=new element($x, $_POST["color".$x]);
                    $row->addElement($element);
                }
                return $row;
            }
        }
         
    }
    
    function saveRow ($row, $results) {
        if (!isset($_SESSION["rows"])) {
            $_SESSION["rows"]=array();
        }
        array_push($_SESSION["rows"], $row);
        
        if (!isset($_SESSION["results"])) {
            $_SESSION["results"]=array();
        }
        array_push($_SESSION["results"], $results);
    }
}

$index=new Index;
?>