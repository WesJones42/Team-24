<script>
    
    let Cur_Colors = [10];

    function checkColors(x){
        for(let i = 0; i < 10; i++){
            if(Cur_Colors[i] == x){
                return true;
            }
        }
        return false;
    }
    
    function updateFunc(x){
        
        let Element = document.getElementById("dropMenu " + x);
    
        if(checkColors(Element.value)){
            Element.value = document.getElementById(".blank"); 
            alert("This Color has Already Been Selected");
        }
        else{
            Cur_Colors[x] = Element.value;
        }
    }
</script>
<html>
    

    <!-- Setup for text boxes and submit button -->
    <form method="get" action="colorcoordinates.php">

    <label for="number">Number of Rows/Cols (Max:26)</label>

    <div class="error">
    <input class="text_box"  type="text" name = 'number' id="number" required><br>
    <!--<div class="num_of_cells"> Invalid number parameters. Must be in range 1-26</div> -->
    </div>

    <label for="color">Number of Colors(Max:10)</label>

    <div class="error">
    <input class="text_box" type="text" name = 'color' id = 'color' required><br>
    <!--<div class="unique_colors"> Invalid rows/color parameters. Must be in range 1-10 </div> -->
    </div>
    
    <input id="submit" type="submit" value="Submit">

    </form>

<?php

    $number = 0;
    $color = 0;
    $color_array = array("Red", "Orange", "Yellow", "Green", "Blue", "Purple", "Grey", "Brown", "Black", "Teal");
    $boolNum = FALSE;
    $boolColor = FALSE;


    if(isset($_GET['number'])){
        $number = $_GET['number'];
        
        if($number >= 1 && $number <=26){
            $boolNum = TRUE;
        }
        else{
            $boolNum = FALSE;
            echo "<div class=\"num_of_cells\"> Invalid Table Input! Must be Between 1-26</div>";
        }  
    }

    
    if(isset($_GET['color'])){
        $color = $_GET['color'];
        
        if($color >= 1 && $color <=10){
            $boolColor = TRUE;
        }
        else{
        $boolColor = FALSE;
        echo "<div class=\"unique_colors\"> Invalid Color Input! Must be Between 1-10</div>";

        }
    }
    
    if($boolColor == TRUE && $boolNum==TRUE){
        echo "<div id=\"table1\">";
        echo "<table style=\"width:100%\"border =\"1px\" >";
        $flag = false;
        for($x=0; $x < $color; $x++){
            
            echo "<tr>";

            echo "<td style=\"width:20%\">";

            
            echo "<select id=\"dropMenu $x\" onchange=\"updateFunc($x)\">
                <option id=\"blank\"></option>";
                foreach($color_array as $colorVals){
                   echo "<option style=\"background-color:white\" id=\"$colorVals\">$colorVals</option>";
                }
            
            echo "</select>
            </td>";
            
            echo "<td id=\"table1Cell $x\", style=\"width:80%\"></td>";
            echo"</tr>";
        }
        echo"</table>";
        echo"</div>"; 
?>
<?php
        echo "<div id=\"table2\">";
        
            echo "<table id=\"tableTwo\" border =\"1px\" style=\"width:100%\">";
            echo"<tr>";
            echo"<th>";
            
            $alph = 'A';
            for($i=0; $i<$number; $i++){
                echo "<th>" , $alph, "</th>";
                $alph++;
            }
            echo"</tr>";
            $count = 1;
            $alphabet = array("A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z");
            for($x=0; $x <= $number -1; $x++){
                echo "<tr>";
                
                for($y=0; $y<=$number; $y++){
                
                    if($y == 0){
                        echo "<td>", $count, "</td>";
                        $count++;
                    }
                    else{
                        echo "<td id=cell", $alphabet[$y-1] ,",",$x+1 , ">&nbsp</td>";
                    }
                }
                echo"</tr>";
            }
            
            echo"</table>";
            echo"</div>"; 
    }
    echo"<button id=\"printButton\">Print (Doesnt Work)</button>"; //Wish we had a 4th to do this =(
    
?>


</script>
</html>

