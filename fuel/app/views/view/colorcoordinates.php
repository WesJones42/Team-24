<script>
        let Cur_Colors = new Array(10).fill(null);
        
        let selectedColorIndex = 0;

        function checkColors(x) {
            return Cur_Colors.includes(x);
        }

        function updateFunc(x) {
          let Element = document.getElementById("dropMenu " + x);
          let oldColor = Cur_Colors[x];

          if (checkColors(Element.value)) {
            Element.value = oldColor;
            alert("This Color has Already Been Selected");
        } else {
            Cur_Colors[x] = Element.value;
            updateCellColors(oldColor, Element.value);
            Element.style.backgroundColor = Element.value;
    }
}

        function selectColor(index) {
          let previousSelected = document.querySelector(".selectedColor");
          if (previousSelected) {
              previousSelected.classList.remove("selectedColor");
          }

          let currentSelected = document.getElementById("dropMenu " + index);
          currentSelected.classList.add("selectedColor");
          selectedColorIndex = index;
}


        function cellClick(cell, col, row) {
          let colorValue = document.querySelector(".selectedColor").value;
          let currentColor = cell.style.backgroundColor;
          
              if (currentColor) {
                for (let i = 0; i < Cur_Colors.length; i++) {
                if (Cur_Colors[i] === currentColor) {
                  let colorTableCell = document.getElementById("table1Cell " + i);
                  let cellLabels = colorTableCell.textContent.trim().split(", ");
                  let cellLabelToRemove = col + row;

                  // Find and remove the cell's label from the list
                  let index = cellLabels.indexOf(cellLabelToRemove);
                  if (index > -1) {
                    cellLabels.splice(index, 1);
                    colorTableCell.textContent = cellLabels.join(", ");
                  }
                  break;
              }
          }
      }
          
          
          cell.style.backgroundColor = colorValue;

          let cellLabel = col + row;
          let colorTableCell = document.getElementById("table1Cell " + selectedColorIndex);
          let currentText = colorTableCell.textContent.trim();

          if (currentText === "") {
              colorTableCell.textContent = cellLabel;
          } else {
              let cellLabels = currentText.split(", ");
          if (!cellLabels.includes(cellLabel)) {
              cellLabels.push(cellLabel);
              cellLabels.sort();
              colorTableCell.textContent = cellLabels.join(", ");
        }
    }
}

        function updateCellColors(oldColor, newColor) {
            console.log(oldColor, newColor)
            let table2Cells = document.querySelectorAll("#table2 td");
            console.log(table2Cells)
            table2Cells.forEach(cell => {
                console.log(cell.style.backgroundColor)
                if (cell.style.backgroundColor == oldColor) {
                    console.log("TEst")
                    cell.style.backgroundColor = newColor;
                }
            });
        }
        
        
        
    </script>
</head>
<body>

    <form method="get" action="colorcoordinates.php">
        <label for="number">Number of Rows/Cols (Max:26)</label>
        <div class="error">
            <input class="text_box" type="text" name='number' id="number" required><br>
        </div>

        <label for="color">Number of Colors(Max:10)</label>
        <div class="error">
            <input class="text_box" type="text" name='color' id='color' required><br>
        </div>

        <input id="submit" type="submit" value="Submit">
    </form>

    <?php
    $number = 0;
    $color = 0;
    $color_array = array("red", "orange", "yellow", "green", "blue", "purple", "grey", "brown", "black", "teal");
    $boolNum = FALSE;
    $boolColor = FALSE;

    if (isset($_GET['number'])) {
        $number = $_GET['number'];

        if ($number >= 1 && $number <= 26) {
            $boolNum = TRUE;
        } else {
            $boolNum = FALSE;
            echo "<div class=\"num_of_cells\"> Invalid Table Input! Must be Between 1-26</div>";
        }
    }

    if (isset($_GET['color'])) {
        $color = $_GET['color'];

        if ($color >= 1 && $color <= 10) {
          $boolColor = TRUE;
    } else {
        $boolColor = FALSE;
        echo "<div class=\"unique_colors\"> Invalid Color Input! Must be Between 1-10</div>";
    }
}

if ($boolColor == TRUE && $boolNum == TRUE) {
    echo "<div id=\"table1\">";
    echo "<table style=\"width:100%\"border =\"1px\" >";

    for ($x = 0; $x < $color; $x++) {
        echo "<tr>";
        echo "<td style=\"width:20%\">";
        echo "<select id=\"dropMenu $x\" onchange=\"updateFunc($x)\"" . ($x == 0 ? " class=\"selectedColor\"" : "") . ">";
        echo "<option id=\"blank\"></option>";

        foreach ($color_array as $colorVals) {
            echo "<option style=\"background-color:$colorVals\" id=\"$colorVals\">$colorVals</option>";
        }

        echo "</select>";
        echo "<input type=\"radio\" id=\"radio$x\" name=\"colorSelection\" onclick=\"selectColor($x)\"" . ($x == 0 ? " checked" : "") . ">";
        echo "</td>";
        echo "<td id=\"table1Cell $x\" style=\"width:80%\"></td>";
        echo "</tr>";
    }

    echo "</table>";
    echo "</div>";

    echo "<div id=\"table2\">";
    echo "<table id=\"tableTwo\" border=\"1px\" style=\"width:100%\">";
    echo "<tr>";
    echo "<th>";

    $alph = 'A';
    for ($i = 0; $i < $number; $i++) {
        echo "<th>", $alph, "</th>";
        $alph++;
    }
    echo "</tr>";

    $count = 1;
    $alphabet = array("A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z");
    for ($x = 0; $x <= $number - 1; $x++) {
        echo "<tr>";

        for ($y = 0; $y <= $number; $y++) {
            if ($y == 0) {
                echo "<td>", $count, "</td>";
                $count++;
            } else {
                echo "<td id=cell", $alphabet[$y - 1], ",", $x + 1, " onclick=\"cellClick(this, '", $alphabet[$y - 1], "', '", $x + 1, "')\">&nbsp</td>";
            }
        }

        echo "</tr>";
    }

    echo "</table>";
    echo "</div>";
}

echo "<button id=\"printButton\">Print</button>"; //Wish we had a 4th to do this =(
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
?>


</script>
<script>
$("#printButton").click(function(){
        
        $("#table1").toggleClass("grayScale");
        $("#table2").toggleClass("grayScale");
        console.log("Print button was clicked")
        openWin();
    });
    function openWin() {

    var num = <?php echo $color;?>;
    console.log(num);
    
    var newTable1 = document.createElement("table");
    newTable1.border = "1px";
    newTable1.style.width = "100%";
    
    for (var i = 0; i < num; i++) {
      var row = newTable1.insertRow(-1);
      var colorCell = row.insertCell(0);
      var coordCell = row.insertCell(1);

      var selectedColor = document.getElementById("dropMenu " + i).value;
      colorCell.innerHTML = selectedColor; // Set text to be the color name

      var coordsText = document.getElementById("table1Cell " + i).textContent;
      coordCell.innerHTML = coordsText;
    }

    //Remove radio buttons
    for(var i = 0; i < num; i ++){
        var elem = document.getElementById("radio" + i);
        console.log("Elem test: ", elem);
    
            
            elem.parentNode.removeChild(elem);
            console.log("Removed Child");
        
    }

    var myWindow = window.open();

    // Check if the window was successfully opened
    if (myWindow) {
        var table2 = $("#table2").html();
        var t2 = document.querySelector("#table2");

        myWindow.document.write(newTable1.outerHTML);
        myWindow.document.write(table2);
        
        myWindow.print();
    } else {
        // Show an alert if the window is null (blocked by popup blocker)
        alert("Man, Remove your damn popup blocker!");
    }
}
</script>
</html>
