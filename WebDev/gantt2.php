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


                <?php }
                ?>

                // Create the data table.
                var data2 = new google.visualization.DataTable();
                data2.addColumn('string', 'Topping');
                data2.addColumn('number', 'Slices');
                data2.addRows([
                    ['Mushrooms', 3],
                    ['Onions', 1],
                    ['Olives', 15],
                    ['Zucchini', 1],
                    ['Pepperoni', 2]
                    ]);


                <?php
                $servername = "localhost";
                $username = "root";
                $dbname = "webdev";
                $conn = new mysqli($servername, $username, '', $dbname);
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                $teacher= $_SESSION["username"];
                $sql2 = "SELECT * FROM projects WHERE teacher='$teacher' ";
                $result2 = $conn->query($sql2);
                ?>



                var data3 = new google.visualization.DataTable();
                data3.addColumn('string', 'Status');
                data3.addColumn('number', 'Percent');

                <?php
                $counter4 = 0;
                $counter5 = 0;
                $counter6 = 0;
                $counter7 = 0;
                $counter8 = 0;
                if ($result2->num_rows > 0) {
    // output data of   each row
                    while ($row1 = $result2->fetch_assoc()) {

                        if ($row1["status"] == 'applied') {
                            $counter4++;
                        } else if ($row1["status"] == 'complete') {
                            $counter5++;
                        } else if ($row1["status"] == 'not applied') {
                            $counter6++;
                        } else if ($row1["status"] == 'ready') {
                            $counter7++;
                        } else if ($row1["status"] == 'approved') {
                            $counter8++;
                        }
                    }
                    ?>
                    data3.addRows([
                        ['not applied', <?php echo ($counter6 / $result2->num_rows); ?>],
                        ['applied', <?php echo ($counter4 / $result2->num_rows); ?>],
                        ['approved', <?php echo ($counter8 / $result2->num_rows); ?>],
                        ['ready', <?php echo ($counter7 / $result2->num_rows); ?>],
                        ['complete', <?php echo ($counter5 / $result2->num_rows); ?>]
                        ]);
                    <?php
                }
                ?>
                // Set chart options
                var options = {'title': 'Ο διπλωματικές μου σε σχέση με τους άλλους.',
                'width': 600,
                'height': 500};
                // Set chart options
                var options2 = {'title': 'How Much Pizza You Ate Last Night',
                'width': 600,
                'height': 500};
                // Set chart options
                var options3 = {'title': 'Ποσοστά Διπλωματικών μου ανά Κατηγορία',
                'width': 600,
                'height': 500};
                // Instantiate and draw our chart, passing in some options.
                var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
                chart.draw(data, options);
                var chart2 = new google.visualization.PieChart(document.getElementById('chart_div2'));
                chart2.draw(data2, options2);
                var chart3 = new google.visualization.BarChart(document.getElementById('chart_div3'));
                chart3.draw(data3, options3);
            }
        </script>
    </head>

    <body>



        <div id="chart_div"></div>
        <div id="chart_div2"></div>
        <div id="chart_div3"></div>
    </body>
    </html>