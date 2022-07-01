<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <div>
        <p id="humid"></p>
    </div>
    <div>
        <p id="temp"></p>
    </div>
    <div>
        <p id="time"></p>
    </div>

    <div>
        <canvas id="myChart"></canvas>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        $(document).ready(function() {

            var tempdata = [];
            var timedata = [];

            // chart js
            var data = {
                labels: timedata,
                datasets: [{
                    label: 'temp',
                    data: tempdata,
                }]
            };

            var config = {
                type: 'line',
                data: data,
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'top',
                        },
                        title: {
                            display: true,
                            text: 'Chart.js Line Chart'
                        }
                    }
                },
            };

            var myChart = new Chart(
                document.getElementById('myChart'),
                config
            );




            // ajax for short polling
            function getnewdata() {
                $.get("ajax.php", function() {})
                    .done(function(data) {
                        var json = JSON.parse(data);

                        $("#humid").html(json.humid);
                        $("#temp").html(json.temp);
                        $("#time").html(json.time);

                        tempdata.push(json.temp);
                        timedata.push(json.time);

                        myChart.data.datasets[0].data = tempdata;
                        myChart.data.datasets[0].label = timedata;
                        myChart.update();

                    })
                    .fail(function() {
                        console.log("error");
                    });
            }
            getnewdata();
            setInterval(getnewdata, 10000);
        });
    </script>
</body>

</html>