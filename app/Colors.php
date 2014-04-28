<?php
class color {
    var $name;
    var $label;
    
    function __construct ($name, $label) {
        $this->name=$name;
        $this->label=$label;
    }
}

$colors=array();

$white=new color ("white","bílá");
array_push($colors, $white);
$red=new color ("red","červená");
array_push($colors, $red);
$blue=new color ("blue","modrá");
array_push($colors, $blue);
$yellow=new color ("yellow","žlutá");
array_push($colors, $yellow);
$green=new color ("green","zelená");
array_push($colors, $green);
$pink=new color ("grey","šedá");
array_push($colors, $pink);

?>