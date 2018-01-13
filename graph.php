<?php
require 'header.php';
require_once 'vendor/autoload.php';

$response = Unirest\Request::get("https://community-bitcointy.p.mashape.com/charts/price",
    array(
        "X-Mashape-Key" => "jGw7Ato6kUmshd6EA5gNslEFX3iWp1Npa8ZjsnUENaMUqXlAXg",
        "Accept"        => "text/plain"
    )
);

?>


    <div class="container">
        <div class="row">
            <div class="col-12 text-center mt-5 mb-4">
                <h1>Graph</h1>
            </div>
            <div class="col-12">
                <canvas id="myChart" width="400" height="200"></canvas>
            </div>
        </div>
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.js"></script>
    <script>
        var data = <?php Print $response->raw_body; ?>;
        var i, date = [], values = [];
        for (i in data.date) {
            date[i] = data.date[i];
        }
        for (i in data.values) {
            values[i] = data.values[i];
        }
        console.log(values);
        var ctx = document.getElementById("myChart").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: date,
                datasets: [{
                    label: '$ for 1 bitcoin',
                    data: values,
                    backgroundColor: [
                        'rgba(249, 99, 50, 0.2)'
                    ],
                    borderColor: [
                        'rgba(249, 99, 50,1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    </script>

<?php
require 'footer.php';