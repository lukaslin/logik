<form method="POST" action=" <?php echo "index.php" ?> ">
<?php
for ($x=1; $x<=4; $x++) {
    echo "<div class=\"element\" id=\"assign$x\" style=\"background-color:white\" onmouseover=\"showForm($x)\" onmouseout=\"hideForm($x)\" >";
    echo "<input type=\"hidden\" name=\"color$x\" id=\"input$x\" value=\"white\"></input>";
    echo "<div class=\"select\" id=\"select$x\">";
    foreach ($colors as $color) {
        echo "<div class=\"element\" id=\"form".$x."color".$color->name."\" onclick=\"setColor($x,'".$color->name."')\" style=\"background-color:";
        echo $color->name;
        echo "\"></div>";
        echo "<br />";
    }
    echo "</div>";
    echo "</div>\n";
}
?>

<input type="hidden" name="submit" value="assign">
<input type="image" src="img/next.svg" class="next-button">
</form>