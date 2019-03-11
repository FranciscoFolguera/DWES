<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/*
 * 
 * 
 ('00002', 'sony','ps4' ,'400 TB 2 mandos',175,96),
('00003', 'acer','laptop gaming' ,'16 GB ram 1 TB SSD',4,1),
('00004', 'xiaomi','MI 8' ,'pro',41,5),
('00005', 'xbox','xbob 360' ,'4 TB',23,87),
('00006', 'xiaomi','MI A2' ,'64 GB',117,30),
('00007', 'bq','Aquaris X' ,'pro 8 GB',74,8),
('00008', 'samsung','smart watch gear watch' ,'pulsometro',1,2002)
 */
?>
<!DOCTYPE html>
<html>
    <head>
		<title>Crear un gráfico circular con Google Chart usando PHP y MySQL </title>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script type="text/javascript">
            function drawChart() {
                // call ajax function to get sports data
                var jsonData = $.ajax({
                    url: "includes/getData.php",
                    dataType: "json",
                    async: false
                }).responseText;
                //The DataTable object is used to hold the data passed into a visualization.
                var data = new google.visualization.DataTable(jsonData);

                // To render the pie chart.
                var chart = new google.visualization.PieChart(document.getElementById('chart_container'));
                chart.draw(data, {width: 800, height: 500});
            }
            // load the visualization api
            google.charts.load('current', {'packages':['corechart']});

            // Set a callback to run when the Google Visualization API is loaded.
            google.charts.setOnLoadCallback(drawChart);
        </script>
		
    </head>
    <body>
           <div id="chart_container"></div>
    </body>
</html>