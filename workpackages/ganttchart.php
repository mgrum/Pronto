<!--Description: This page shows the gantt-chart for the current project-->

<!--HTML-Header-->
<?php include_once "../header.php" ?>

<!--Check for Login-->
<?php include_once "../check.php" ?>

<!--Include navigation-bar-->
<?php include_once "../navigation.php" ?>

<!--Container for content-->
<div class="row">
    <div class="col-md-3 col-lg-3">
        <div class="panel panel-default">
            <!--Sidebar of this tab-->
            <?php include_once "sidebar.html" ?>
        </div>
    </div>
    <div class="col-md-9 col-lg-9">
        <div class="panel panel-default panel-body">
            <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
            <script type="text/javascript">
                // Google-Plugin für Gantt-Chart-Visualisierung einbinden
                google.charts.load('current', {'packages': ['gantt']});
                google.charts.setOnLoadCallback(drawChart);
        
                function drawChart() {
            
                    var data = new google.visualization.DataTable();
                    data.addColumn('string', 'ArbeitspaketID');
                    data.addColumn('string', 'Bezeichnung');
                    data.addColumn('string', 'Resource');
                    data.addColumn('date', 'Start Date');
                    data.addColumn('date', 'End Date');
                    data.addColumn('number', 'Duration');
                    data.addColumn('number', 'Percent Complete');
                    data.addColumn('string', 'Dependencies');
            
                    //View auf Entität 'Arbeitspaket' der Datenbank
                    <?php
                    include_once "../database.php";
                    if (isset($pdo)) {
                        $statement = 'SELECT * FROM Arbeitspaket';
                
                        foreach ($pdo->query($statement) as $row) {
                            $apID = $row["ArbeitspaketID"];
                            $bezeichnung = $row["Bezeichnung"];
                            $startDate = $row["FAZ"];
                            $endDate = $row["FEZ"];
                        }
                
                        $pdo = null;
                
                    }
                    ?>
            
                    data.addRows([
                        //[Arbeitspaket, Bezeichnung, Resource?, Start, End, Dauer, Fortschritt, Dependencies],
                        ['2014Spring', 'Spring 2014', 'spring',
                            new Date(2014, 2, 22), new Date(2014, 5, 20), null, 100, null],
                        ['2014Summer', 'Summer 2014', 'summer',
                            new Date(2014, 5, 21), new Date(2014, 8, 20), null, 100, null],
                        ['2014Autumn', 'Autumn 2014', 'autumn',
                            new Date(2014, 8, 21), new Date(2014, 11, 20), null, 100, null],
                        ['2014Winter', 'Winter 2014', 'winter',
                            new Date(2014, 11, 21), new Date(2015, 2, 21), null, 100, null],
                        ['2015Spring', 'Spring 2015', 'spring',
                            new Date(2015, 2, 22), new Date(2015, 5, 20), null, 50, null],
                        ['2015Summer', 'Summer 2015', 'summer',
                            new Date(2015, 5, 21), new Date(2015, 8, 20), null, 0, null],
                        ['2015Autumn', 'Autumn 2015', 'autumn',
                            new Date(2015, 8, 21), new Date(2015, 11, 20), null, 0, null],
                        ['2015Winter', 'Winter 2015', 'winter',
                            new Date(2015, 11, 21), new Date(2017, 2, 21), null, 0, null],
                        ['Football', 'Football Season', 'sports',
                            new Date(2014, 8, 4), new Date(2015, 1, 1), null, 100, null],
                        ['Baseball', 'Baseball Season', 'sports',
                            new Date(2015, 2, 31), new Date(2015, 9, 20), null, 14, null],
                        ['Basketball', 'Basketball Season', 'sports',
                            new Date(2014, 9, 28), new Date(2015, 5, 20), null, 86, null],
                        ['Hockey', 'Hockey Season', 'sports',
                            new Date(2014, 9, 8), new Date(2015, 5, 21), null, 89, null]
                    ]);
            
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

            <div style="width: 1000px" id="chart_div"></div>

        </div>
    </div>
</div>

<!--Footer (Closing body and html)-->
<?php include_once "../footer.html" ?>