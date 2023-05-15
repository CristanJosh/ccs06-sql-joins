<html>
<style>
    body {
        background: linear-gradient(135deg, #ffc3a0, #ffafbd, #c0c1ff, #8cb6f1);
        background-size: 400% 400%;
        animation: gradientAnimation 15s ease infinite;
    }
    
    table {
        border-collapse: collapse;
        width: 100%;
        margin-bottom: 20px;
    }
    
    table td {
        border: 3px solid black;
        padding: 5px;
    }
    
    @keyframes gradientAnimation {
        0% {
            background-position: 0% 50%;
        }
        50% {
            background-position: 100% 50%;
        }
        100% {
            background-position: 0% 50%;
        }
    }
</style>

<?php
require "config.php";

use App\Employee_Stats;

$emps = Employee_Stats::list();

echo "<table border='1' cellpadding='5' id='myTable'>";
$keys = array_keys($emps);

for ($i = 0; $i < count($emps); $i++) {
    echo "<tr>";
    foreach ($emps[$keys[$i]] as $key => $value) {
        echo "<td>" . $value . "</td>";
    }
    echo "</tr>";
}

echo "</table>";
?>

<script>
    window.onload = function() {
        var table = document.getElementById("myTable");
        var columnCount = table.rows[0].cells.length;
        
        for (var i = columnCount - 1; i >= 0; i -= 2) {
            for (var j = 0; j < table.rows.length; j++) {
                table.rows[j].deleteCell(i);
            }
        }
    };
</script>

</html>
