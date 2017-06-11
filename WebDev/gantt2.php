<?php session_start(); ?>
<html>
    <head>
        <!--Load the AJAX API-->
        <script type="text/javascript" src="https://www.google.com/jsapi"></script>
        <script type="text/javascript">


            google.load('visualization', '1.0', {'packages': ['corechart']});

            google.setOnLoadCallback(drawChart);

<?php
$username = $_SESSION["username"];




$servername = "localhost";
$username = "root";
$dbname = "webdev";
$conn = new mysqli($servername, $username, '', $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//MESOS OROS VATHMOLOGIWN TWN DIPLWMATIKWN ANA KATHHGHTH
$sql = "SELECT teacher,COUNT(*) as avg From projects Group BY teacher ";
$result = $conn->query($sql);
?>

            function drawChart() {


                var data = new google.visualization.DataTable();
                data.addColumn('string', 'Teacher');
                data.addColumn('number', 'AVG ');
<?php
$counter1 = 0;
if ($result->num_rows > 0) {
    // output data of   each row
    while ($row = $result->fetch_assoc()) {
        ?>
                        data.addRows([
                            ['<?php echo $row["teacher"]; ?>', <?php echo (float) $row["avg"]; ?>],
                        ]);
        <?php
    }
}
?>

                // Create the data table.
<?php
$servername = "localhost";
$username = "root";
$dbname = "webdev";
$conn = new mysqli($servername, $username, '', $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql = "SELECT teacher,projectname,Month(date_ready) as month,YEAR(date_ready) as year  FROM projects WHERE status = 'ready' GROUP BY teacher";

$date_m = date("m");
$date_y = date("Y");
$result = $conn->query($sql);
?>



                var data2 = new google.visualization.DataTable();
                data2.addColumn('string', 'Status');
                data2.addColumn('number', ' Projects  ');

<?php
if ($result->num_rows > 0) {
    // output data of   each row
    while ($row1 = $result->fetch_assoc()) {
        if ($row1["month"] == $date_m && $row1["year"] == $date_y) {
            ?>
                            data2.addRows([
                                ['<?php echo $row1["projectname"]; ?>', 1],
                            ]);
            <?php
        }
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

//MESOS OROS VATHMOLOGIWN TWN DIPLWMATIKWN ANA KATHHGHTH
$sql = "SELECT status,COUNT(*) as avg From projects Group BY status ";
$result = $conn->query($sql);
?>

                var data3 = new google.visualization.DataTable();
                data3.addColumn('string', 'Teacher');
                data3.addColumn('number', 'AVG ');
<?php
$counter1 = 0;
if ($result->num_rows > 0) {
    // output data of   each row
    while ($row = $result->fetch_assoc()) {
        ?>
                        data3.addRows([
                            ['<?php echo $row["status"]; ?>', <?php echo (float) $row["avg"]; ?>],
                        ]);
        <?php
    }
}
?>




                // Set chart options
                var options = {'title': 'Ο διπλωματικές μου <?php echo $_SESSION["username"]; ?> σε σχέση με τους άλλους.',
                    'width': 600,
                    'height': 500};
                // Set chart options
                var options2 = {'title': 'Παρουσιάσεις Διπλωματικών τον τρέχοντα μήνα.',
                    'width': 600,
                    'height': 500};
                // Set chart options
                var options3 = {'title': 'Στάδια και ποσοστά αυτών.',
                    'width': 600,
                    'height': 500};
                var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
                chart.draw(data, options);
                var chart2 = new google.visualization.BarChart(document.getElementById('chart_div2'));
                chart2.draw(data2, options2);
                var chart3 = new google.visualization.PieChart(document.getElementById('chart_div3'));
                chart3.draw(data3, options3);
            }
        </script>
    </head>

    <body>



        <div id="chart_div"></div>
        <div id="chart_div2"></div>
        <div id="chart_div3"></div>

        <div class="container">
            <div class="col-md-12" style="padding:3%">

                <form id="pp" action="<?php echo $_SESSION["path"]; ?>" method="post">
                    <input name="log" type="submit" class="button5" style="align-content:center; border-color:#ffa31a;color:black; background-color:orange;" value="Back">
                </form>


            </div>
        </div>
    </body>
</html>