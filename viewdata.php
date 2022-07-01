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

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {



            function getnewdata() {
                $.get("ajax.php", function() {})
                    .done(function(data) {
                        var json = JSON.parse(data);

                        $("#humid").html(json.humid);
                        $("#temp").html(json.temp);
                        $("#time").html(json.time);

                    })
                    .fail(function() {
                        alert("error");
                    });
            }
            getnewdata();
            setInterval(getnewdata, 10000);
        });
    </script>
</body>

</html>