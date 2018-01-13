<?php
require 'header.php';
require_once 'vendor/autoload.php';

$data = Unirest\Request::get("https://api.blockchain.info/stats");

?>

    <div class="container">
        <div class="row">
            <div class="col-12 text-center mt-5">
                <h1>Guigui Bitcoin
                </h1>
            </div>
            <div class="col-12 text-center mb-3">
                <span class="badge badge-info">Updated data on <?php echo date('d M Y H:i:s', time($data->body->timestamp)); ?></span>
            </div>
            <div class="col-12 text-center mt-5">
                <h2> 1 <i class="fa fa-btc" aria-hidden="true"></i> = <?php echo $data->body->market_price_usd; ?>
                    <i class="fa fa-usd" aria-hidden="true"></i></h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-10 col-lg-8 col-xl-6 ml-auto mr-auto">
                <div class="card">
                    <ul class="nav nav-tabs nav-tabs-neutral justify-content-center" role="tablist" data-background-color="orange">
                        <li class="nav-item">
                            TRANSACTION
                        </li>
                    </ul>
                    <div class="card-body">
                        <ul>
                            <li>
                                Total Transaction Fees : <?php echo substr_replace($data->body->total_fees_btc, '.', 3, 1); ?>
                                <i class="fa fa-btc" aria-hidden="true"></i>
                            </li>
                            <li>
                                Total Output Volume
                                <?php echo substr_replace($data->body->total_btc_sent, '.', 7, 1); ?>
                                <i class="fa fa-btc" aria-hidden="true"></i>
                            </li>
                            <li>
                                Estimated Transaction Volume : <?php echo $data->body->estimated_transaction_volume_usd; ?>
                                <i class="fa fa-usd" aria-hidden="true"></i>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-10 col-lg-8 col-xl-6 ml-auto mr-auto">
                <div class="card">
                    <ul class="nav nav-tabs nav-tabs-neutral justify-content-center" role="tablist" data-background-color="orange">
                        <li class="nav-item">
                            MINING
                        </li>
                    </ul>
                    <div class="card-body">
                        <ul>
                            <li>
                                Hash rate : <?php echo $data->body->hash_rate; ?> GH/s
                            </li>
                            <li>
                                Bitcoin mined : <?php echo $data->body->n_btc_mined; ?>
                                <i class="fa fa-btc" aria-hidden="true"></i>
                            </li>
                            <li>
                                Miners revenue :
                                <?php echo $data->body->miners_revenue_btc; ?>
                                <i class="fa fa-btc" aria-hidden="true"></i>
                                (<?php echo $data->body->miners_revenue_usd; ?>
                                <i class="fa fa-usd" aria-hidden="true"></i>)
                            <li>
                                Difficulty : <?php echo $data->body->difficulty; ?>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>


<?php
require 'footer.php';