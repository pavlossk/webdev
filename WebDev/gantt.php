<?php session_start(); ?>
<html>
    <head>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">
            google.charts.load('current', {'packages': ['gantt']});
            google.charts.setOnLoadCallback(drawChart);

<?php
$servername = "localhost";
$username = "root";
$dbname = "webdev";
$conn = new mysqli($servername, $username, '', $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$teacher = $_SESSION["username"];
$sql = "SELECT *,YEAR(date_approved) as yeara, MONTH(date_approved) as montha,DAY(date_approved) as daya, YEAR(date_finished) as yearf, MONTH(date_finished) as monthf,DAY(date_finished) as dayf  FROM projects WHERE teacher='$teacher' ";
$result = $conn->query($sql);
?>
            function drawChart() {

                var data = new google.visualization.DataTable();
                data.addColumn('string', 'Task ID');
                data.addColumn('string', 'Task Name');
                data.addColumn('string', 'Status');
                data.addColumn('date', 'Start Date');
                data.addColumn('date', 'End Date');
                data.addColumn('number', 'Duration');
                data.addColumn('number', 'Percent Complete');
                data.addColumn('string', 'Dependencies');
<?php
if ($result->num_rows > 0) {
    // output data of   each row
    while ($row = $result->fetch_assoc()) {

        if ($row["status"] == 'complete') {
            $percent = 100;
        } elseif ($row["status"] == 'ready') {
            $percent = 80;
        } elseif ($row["status"] == 'not applied') {
            $percent = 0;
            $year = 0;
            $month = 0;
            $day = 0;
        } elseif ($row["status"] == 'applied') {
            $percent = 40;
        } elseif ($row["status"] == 'approved') {
            $percent = 60;
        }
        ?>
                        data.addRows([
                            ['<?php echo $row["projectID"] ?>', '<?php echo $row["projectname"] ?>', '<?php echo $row["status"] ?>',
                                new Date(<?php echo $row["yeara"]; ?>, <?php echo $row["montha"]; ?>, <?php echo $row["daya"]; ?>), new Date(<?php echo $row["yearf"]; ?>, <?php echo $row["monthf"]; ?>, <?php echo $row["dayf"]; ?>), null, <?php echo $percent; ?>, null]
                        ]);
        <?php
    }
}
?>
                var options = {
                    height: 400,
                    gantt: {
                        trackHeight: 30
                    }
                };

                var chart = new google.visualization.Gantt(document.getElementById('chart_div'));

                chart.draw(data, options);
            }
        </script>
    </head>
    <body>


        <br><h3 style="color:black; font-weight:bold; font-size:40px; "> Πρόοδος διπλωματικών: <?php echo $_SESSION["username"]; ?></h3></br>
        <div id="chart_div" style="zoom:80%;"></div>

        <div class="container">
            <div class="col-md-12" style="padding:3%">

                <form id="pp" action="<?php echo $_SESSION["path"]; ?>" method="post">
                    <input name="log" type="submit" class="button5" style="align-content:center; border-color:#ffa31a;color:black; background-color:orange;" value="Back">
                </form>


            </div>
        </div>
    </body>
</html>