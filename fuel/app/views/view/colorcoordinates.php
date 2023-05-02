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
    <!-- Setup for text boxes and submit button -->
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
            echo "<option style=\"background-color:white\" id=\"$colorVals\">$colorVals</option>";
        }

        echo "</select>";
        echo "<input type=\"radio\" name=\"colorSelection\" onclick=\"selectColor($x)\"" . ($x == 0 ? " checked" : "") . ">";
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

echo "<button id=\"printButton\">Print (Doesn't Work)</button>"; //Wish we had a 4th to do this =(
?>


</script>
</html>

