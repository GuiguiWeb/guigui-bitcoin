<?php
require 'header.php';
require_once 'vendor/autoload.php';

$data = Unirest\Request::get("https://api.blockchain.info/ticker");
?>

    <div class="container">
        <div class="row">
            <div class="col-12 text-center mt-5">
                <h1>Exchange Rates
                </h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <ul class="nav nav-tabs nav-tabs-neutral justify-content-center" role="tablist" data-background-color="orange">
                        <li class="nav-item">
                            Market Prices and exchanges rates
                        </li>
                    </ul>
                    <div class="card-body">
                        <div class="row">
                            <?php foreach ($data->body as $money => $rate) : ?>
                                <div class="col-3 mb-4">
                                    <strong><?php echo $money; ?> (<?php echo $rate->symbol; ?>)</strong><br>
                                    Last: <?php echo $rate->last; ?><br>
                                    Buy: <?php echo $rate->buy; ?><br>
                                    Sell : <?php echo $rate->sell; ?><br>
                                </div>
                            <?php endforeach; ?>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>


<?php
require 'footer.php';