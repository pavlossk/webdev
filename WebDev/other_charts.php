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

//MESOS OROS VATHMOLOGIWN TWN DIPLWMATIKWN ANA KATHHGHTH
$sql = "SELECT teacher,AVG(grade) as avg From projects WHERE status='complete' GROUP BY teacher ";
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
$servername = "localhost";
$username = "root";
$dbname = "webdev";
$conn = new mysqli($servername, $username, '', $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


//PERISSOTERES DIPLWMATIKES ANA ETOS KAI SUNOLIKA
$teacher = $_SESSION["username"];
$sql2 = "SELECT teacher, YEAR(date_creation) as year,COUNT(*) as avg FROM `projects` GROUP BY teacher,YEAR(date_creation) ";
$result2 = $conn->query($sql2);
?>

                // Create the data table.


<?php
$counter = 0;
if ($result2->num_rows > 0) {
    ?>
                    var data12 = [];
                    var Header = ['Year', 'Number of Projects', '', ''];
                    data12.push(Header);
    <?php
    // output data of   each row
    while ($row1 = $result2->fetch_assoc()) {
        ?>
                        var temp = [];
                        temp.push('<?php echo $row1["year"]; ?>,<?php echo $row1["teacher"] ?>');
                                temp.push(<?php echo (int) $row1["avg"]; ?>);
                                temp.push(0);
                                temp.push(0);

                                data12.push(temp);

        <?php
    }
}
?>
                        var data2 = new google.visualization.arrayToDataTable(data12);


//SELECT teacher,DATEDIFF(`date_finished`,`date_approved`) as weeks FROM `projects` WHERE status = 'complete' GROUP BY teacher

//SE TI KATASTASH VRISKONTAI OI DIPLWMATIKES ANA EKSAMHNO
<?php
$servername = "localhost";
$username = "root";
$dbname = "webdev";
$conn = new mysqli($servername, $username, '', $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$teacher = $_SESSION["username"];
$sql2 = "SELECT status,COUNT(*) as count From projects WHERE MONTH(date_approved)< 6 GROUP BY status ";
$result2 = $conn->query($sql2);

$sql3 = "SELECT status,COUNT(*) as count From projects WHERE MONTH(date_approved) >6 GROUP BY status ";
$result3 = $conn->query($sql3);
?>



                        var data3 = new google.visualization.DataTable();
                        data3.addColumn('string', 'Status');
                        data3.addColumn('number', 'Number of Projects');

<?php
if ($result2->num_rows > 0) {
    // output data of   each row
    while ($row1 = $result2->fetch_assoc()) {
        ?>
                                data3.addRows([
        <?php if ($row1["status"] == 'approved' || $row1["status"] == 'ready' || $row1["status"] == 'complete') { ?>
                                        ['<?php
            echo $row1["status"];
            echo",Εαρινό";
            ?>', <?php echo $row1["count"]; ?>]
        <?php } ?>
                                ]);
        <?php
    }
    while ($row2 = $result3->fetch_assoc()) {
        ?>
                                data3.addRows([
        <?php if ($row2["status"] == 'approved' || $row2["status"] == 'ready' || $row2["status"] == 'complete') { ?>
                                        ['<?php
            echo $row2["status"];
            echo",Χειμερινό";
            ?>', <?php echo $row2["count"]; ?>]
        <?php } ?>
                                ]);
        <?php
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


$sql5 = "SELECT teacher,SUM(DATEDIFF(date_finished,date_approved)/7) as week ,COUNT(*) as num  FROM projects WHERE status = 'complete' GROUP BY teacher";
$result5 = $conn->query($sql5);

$sql6 = "SELECT COUNT(*) as num, teacher FROM projects WHERE status = 'complete' GROUP BY teacher";
$result6 = $conn->query($sql6);
?>



                        var data4 = new google.visualization.DataTable();
                        data4.addColumn('string', 'Status');
                        data4.addColumn('number', 'AVG Number of Weeks  ');

<?php
if ($result5->num_rows > 0) {
    // output data of   each row
    while ($row1 = $result5->fetch_assoc() ) {
        ?>
                                data4.addRows([
                                    ['<?php echo $row1["teacher"]; ?>', <?php echo (int) ($row1["week"]/$row1["num"]); ?>],
                                ]);
        <?php
    }
}
?>

                        // Set chart options
                        var options = {'title': 'Ο μέσος όρος των βαθμολογιών των πτυχιακών ανά καθηγητή.',
                            'width': 600,
                            'height': 500};
                        // Set chart options
                        var options2 = {'title': 'Περισσότερες διπλωματικές ανά έτος και συνολικά',
                            'width': 600,
                            'height': 500};
                        // Set chart options
                        var options3 = {'title': 'Σε τι κατάσταση βρίσκονται οι διπλωματικές ανά ακαδημιακό έτος',
                            'width': 600,
                            'height': 500};
                        var options4 = {'title': 'Μέσος χρόνος ολοκλήρωσης διπλωματικών ( σε εβδομάδες) ανά καθηγητή',
                            'width': 600,
                            'height': 500};
                        // Instantiate and draw our chart, passing in some options.
                        var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
                        chart.draw(data, options);
                        var chart2 = new google.visualization.BarChart(document.getElementById('chart_div2'));
                        chart2.draw(data2, options2);
                        var chart3 = new google.visualization.BarChart(document.getElementById('chart_div3'));
                        chart3.draw(data3, options3);
                        var chart4 = new google.visualization.BarChart(document.getElementById('chart_div4'));
                        chart4.draw(data4, options4);

                    }
        </script>
    </head>

    <body>




        <div id="chart_div2"></div>
        <div id="chart_div"></div>
        <div id="chart_div3"></div>
        <div id="chart_div4"></div>
        <div class="container">
            <div class="col-md-12" style="padding:3%">

                <form id="pp" action="" method="post">
                    <input name="log" type="submit" class="button5" style="align-content:center; border-color:#ffa31a;color:black; background-color:orange;" value="LogOut">
                </form>


            </div>
        </div>
    </body>
</html>