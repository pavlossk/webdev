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
        $sql = "SELECT * FROM projects WHERE teacher='$teacher' ";
        $result = $conn->query($sql);
        ?>
        function drawChart() {

            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Task ID');
            data.addColumn('string', 'Task Name');
            data.addColumn('string', 'Resource');
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
                        $percent = 20;
                    } elseif ($row["status"] == 'approved') {
                        $percent = 40;
                    }
                    ?>
                    data.addRows([
                        ['<?php echo $row["projectID"] ?>', '<?php echo $row["projectname"] ?>', '<?php echo $row["status"] ?>',
                        new Date(2014, 2, 22), new Date(2014, 5, 20), null, <?php echo $percent; ?>, null]
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
    <div class="container" style="width:1200px;">
     
        <br><h3 style="color:black; font-weight:bold; font-size:40px; "> Πρόοδος διπλωματικών: <?php echo $_SESSION["username"]; ?></h3></br>
        <div id="chart_div" style="zoom:80%;"></div>
    </div>
</body>
</html>