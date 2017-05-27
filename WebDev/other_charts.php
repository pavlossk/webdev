<?php session_start(); ?>
<html>
    <head>
        <!--Load the AJAX API-->
        <script type="text/javascript" src="https://www.google.com/jsapi"></script>
        <script type="text/javascript">


            google.load('visualization', '1.0', {'packages': ['corechart']});

            google.setOnLoadCallback(drawChart);

<?php
$servername = "localhost";
$username = "root";
$dbname = "webdev";
$conn = new mysqli($servername, $username, '', $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql = "SELECT * FROM projects ";
$result = $conn->query($sql);
?>

            function drawChart() {


                var data = new google.visualization.DataTable();
                data.addColumn('string', 'Status');
                data.addColumn('number', 'Percent');

<?php
$counter1 = 0;
if ($result->num_rows > 0) {
    // output data of   each row
    while ($row = $result->fetch_assoc()) {
        if ($row["teacher"] == 'Soras') {
            $counter1++;
            $teacher = $row["teacher"];
        }
    }
    ?>
                    data.addRows([
                        ['<?php echo $teacher; ?>', <?php echo $counter1; ?>],
                        ['Other', <?php
    $other = $result->num_rows - $counter1;
    echo $other;
    ?>],
                    ]);


    <?php
}
$servername = "localhost";
$username = "root";
$dbname = "webdev";
$conn = new mysqli($servername, $username, '', $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$teacher = $_SESSION["username"];
$sql2 = "SELECT teacher, YEAR(date_creation) as year,COUNT(*) as avg FROM `projects` GROUP BY teacher,YEAR(date_creation) ";
$result2 = $conn->query($sql2);
?>

                // Create the data table.


<?php
$counter = 0;
if ($result2->num_rows > 0) {
    // output data of   each row
    while ($row1 = $result2->fetch_assoc()) {
        ?>
                        var data2 = google.visualization.arrayToDataTable([
        <?php if ($counter == 0) { ?>
                                ['Year', 'Sales', 'Expenses', 'Expenses'],
                                ['<?php echo $row1["year"]; ?>', <?php echo (int) $row1["avg"]; ?>, 0, 0],
        <?php } else { ?>
                                ['<?php echo $row1["year"]; ?>', <?php echo (int) $row1["avg"]; ?>, 0, 0],
        <?php } ?>

                        ]);

        <?php
        $counter++;
    }
}
?>

<?php
$servername = "localhost";
$username = "root";
$dbname = "webdev";
$conn = new mysqli($servername, $username, '', $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$teacher = $_SESSION["username"];
$sql2 = "SELECT teacher,AVG(grade) as avg From projects GROUP BY teacher ";
$result2 = $conn->query($sql2);
?>



                var data3 = new google.visualization.DataTable();
                data3.addColumn('string', 'Status');
                data3.addColumn('number', 'Percent');

<?php
if ($result2->num_rows > 0) {
    // output data of   each row
    while ($row1 = $result2->fetch_assoc()) {
        ?>
                        data3.addRows([
                            ['<?php echo $row1["teacher"]; ?>', <?php echo (int) $row1["avg"]; ?>]

                        ]);
        <?php
    }
}
?>
                // Set chart options
                var options = {'title': 'Ο διπλωματικές μου σε σχέση με τους άλλους.',
                    'width': 600,
                    'height': 500};
                // Set chart options
                var options2 = {'title': 'Περισσότερες διπλωματικές ανά έτος και συνολικά',
                    'width': 600,
                    'height': 500};
                // Set chart options
                var options3 = {'title': 'Ποσοστά Διπλωματικών μου ανά Κατηγορία',
                    'width': 600,
                    'height': 500};
                // Instantiate and draw our chart, passing in some options.
                var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
                chart.draw(data, options);
                var chart2 = new google.visualization.BarChart(document.getElementById('chart_div2'));
                chart2.draw(data2, options2);
                var chart3 = new google.visualization.BarChart(document.getElementById('chart_div3'));
                chart3.draw(data3, options3);


                var options4 = {
                    chart: {
                        title: 'Company Performance',
                        subtitle: 'Sales, Expenses, and Profit: 2014-2017',
                    }
                };

                var chart4 = new google.charts.Bar(document.getElementById('columnchart_material'));

                chart4.draw(data2, google.charts.Bar.convertOptions(options4));
            }
        </script>
    </head>

    <body>



        <div id="chart_div"></div>
        <div id="chart_div2"></div>
        <div id="columnchart_material" style="width: 800px; height: 500px;"></div>
        <div id="chart_div3"></div>
        <div class="container">
            <div class="col-md-12" style="padding:3%">

                <form id="pp" action="" method="post">
                    <input name="log" type="submit" class="button5" style="align-content:center; border-color:#ffa31a;color:black; background-color:orange;" value="LogOut">
                </form>


            </div>
        </div>
    </body>
</html>