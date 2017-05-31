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
        $sql = "SELECT project_stages.project_stagesID as id ,project_stages.status as status , projects.projectname as pro ,project_stages.stage_name as name,YEAR(start_date) as yeara, MONTH(start_date) as montha,DAY(start_date) as daya, YEAR(end_date) as yearf, MONTH(end_date) as monthf,DAY(end_date) as dayf  FROM project_confirms, project_stages,projects WHERE project_stages.projectID = projects.projectID AND (projects.teacher='$teacher' OR (project_confirms.teacher='$teacher' AND project_confirms.project=projects.projectID)) and (project_stages.status='done' or project_stages.status='current')";
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
                    $row["monthf"] = $row["monthf"] - 1;
                    $row["montha"] = $row["montha"] - 1;

                    if ($row["status"] == 'done') {
                        $percent = 100;
                        $m = $row["monthf"];
                    } elseif ($row["status"] == 'current') {
                        $percent = 80;
                        $row["yearf"] = date("Y");
                        $row["monthf"] = date("m")-1;
                        $row["dayf"] = date("d");
                    } elseif ($row["status"] == 'pending') {
                        $percent = 60;

                    }
                    ?>
                    data.addRows([
                        ['<?php echo $row["id"] ?>', '<?php echo $row["pro"] ?>', '<?php echo $row["status"] ?>',
                        new Date(<?php echo $row["yeara"]; ?>, <?php echo $row["montha"]; ?>, <?php echo $row["daya"]; ?>), new Date(<?php echo $row["yearf"]; ?>, <?php echo $row["monthf"]; ?>, <?php echo $row["dayf"]; ?>), null, <?php echo $percent; ?>, null],
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