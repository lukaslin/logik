<div id="menu">
    <a href="index.php">

        <form method="POST" action=" <?php echo "index.php" ?> ">
            <input type="hidden" name="submit" value="single">
            <input type="submit" value="single player">
        </form>
        <form method="POST" action=" <?php echo "index.php" ?> ">
            <input type="hidden" name="submit" value="new">
            <input type="submit" value="multi player">
        </form>
    </a>
</div>

<?php

$index->newAssign ($searchedRow);      // create new assignment in session

if (empty($_POST) OR $_POST["submit"]=="new") { // form for assignment
    echo "<div class=\"assign\" id=\"form\"> \n";
    include 'form.php';
    echo "</div>\n";
}
elseif ($_POST["submit"]=="single") {
    $index->randRow ($searchedRow);
}
else {
    
}

$index->fillAssign ($searchedRow);      // fill created assignment in session
echo "\n <table id=\"desk\"> \n";
echo "<tr>\n";
echo "<td>\n";
if (!empty($_POST)) {
    if ($_POST["submit"]!="new") {
        echo "<div class=\"assign\" id=\"statement\">";
        foreach ($searchedRow->line as $searchedElement) {  // statement of searched row
            echo "<div class=\"element\" style=\"background-color:";    
            echo $searchedElement->color;
            echo "\">";
            echo "</div>\n";
        }
        echo "</div>";
    }
}
echo "</td>\n";
echo "<td>\n";

if (!empty($_SESSION["assignment"])) {  
?>
<p id="show" onclick="showAssign();">ukaž</p>
<?php
}
echo "</td>\n";
echo "</tr>\n";

echo "<br />";

$row=$index->newRow();                           // create and fill new row
if (isset($row)) {
    $results=$row->process($searchedRow);
    $index->saveRow($row, $results);                 // save rows to session
}

if (isset($_SESSION["rows"])) {
    $count=0;
    foreach ($_SESSION["rows"] as $row) {
        echo "<tr>\n";
        echo "<td>\n";
        echo "<div class=\"nextRow\">";
        foreach ($row->line as $element) {        // statement of row7
            echo "<div class=\"element\" style=\"background-color:";   
            echo $element->color;
            echo "\">";
            echo "</div> \n";
        }
        echo "</div>";
        echo "</td>\n";
        echo "<td>\n";
        $results=$_SESSION["results"][$count];
        foreach ($results as $result) {
            if ($result == 2) {
                echo "<img src=\"img/flag_black.svg\" class=\"flag\" />";
            }
            elseif ($result == 1) {
                echo "<img src=\"img/flag_white.svg\" class=\"flag\" />";
            }    
        }
        echo "\n </td>\n";
        echo "</tr>\n";
        $count++;
    }
}

echo "<tr>\n";
echo "<td>\n";


if (!empty($_POST)) {
    if ($_POST["submit"]=="assign" OR $_POST["submit"]=="check" OR $_POST["submit"]=="single") {                       // form for next row
        echo "<div class=\"nextRow\">";
        include 'formNext.php';
        echo "</div>";
    }
}
echo "</td>\n";
echo "</tr>\n";
echo "</table>\n";

?>
<div style="height: 350px;"></div>