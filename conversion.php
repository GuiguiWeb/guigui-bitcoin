<?php
require 'header.php';
require_once 'vendor/autoload.php';

if (isset($_POST['submit'])) {

    $eur = Unirest\Request::get("https://community-bitcointy.p.mashape.com/" . $_POST['ticker'] . "/EUR",
        array(
            "X-Mashape-Key" => "jGw7Ato6kUmshd6EA5gNslEFX3iWp1Npa8ZjsnUENaMUqXlAXg",
            "Accept"        => "text/plain"
        )
    );
    $usd = Unirest\Request::get("https://community-bitcointy.p.mashape.com/" . $_POST['ticker'] . "/USD",
        array(
            "X-Mashape-Key" => "jGw7Ato6kUmshd6EA5gNslEFX3iWp1Npa8ZjsnUENaMUqXlAXg",
            "Accept"        => "text/plain"
        )
    );

    $euros = $eur->body->value;
    $dollars = $usd->body->value;
    $ticker = $_POST['ticker'];
}

?>


    <div class="container">
        <div class="row">
            <div class="col-12 text-center mt-5 mb-4">
                <h1>Conversation rates </h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="alert alert-info" role="alert">
                    <div class="container">
                        <div class="alert-icon">
                            <i class="now-ui-icons travel_info"></i>
                        </div>
                        <strong>Comming soon : </strong> bitfinex
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">
                                <i class="now-ui-icons ui-1_simple-remove"></i>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">

            <div class="col-md-10 col-lg-8 col-xl-6 ml-auto mr-auto">
                <div class="card" style="height: 300px;">
                    <ul class="nav nav-tabs nav-tabs-neutral justify-content-center" role="tablist" data-background-color="orange">
                        <li class="nav-item">
                            <i class="now-ui-icons ui-1_zoom-bold"></i> Form
                        </li>
                    </ul>
                    <div class="card-body">
                        <form method="post" action="conversion.php" class="mt-4">
                            <div class="form-group">
                                <label class="form-check-label" for="ticker">Bitcoin Wallet </label>
                                <select class="form-control" id="ticker" name="ticker">
                                    <option value="coinbase">Coinbase</option>
                                    <option value="blockchain">BlockChain</option>
                                    <option value="btccharts">Bitcoin Charts</option>
                                    <option value="bitpay">BitPay</option>
                                </select>
                            </div>

                            <button type="submit" id="submit" name="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
                <!-- End Tabs on plain Card -->
            </div>
            <div class="col-md-10 col-lg-8 col-xl-6 ml-auto mr-auto">
                <div class="card" style="height: 300px">
                    <ul class="nav nav-tabs justify-content-center" role="tablist">
                        <li class="nav-item">
                            <i class="now-ui-icons  arrows-1_refresh-69"></i> Results
                        </li>
                    </ul>
                    <div class="card-body">
                        <div class="text-center mt-3">
                            <?php if (isset($euros) AND isset($dollars) AND isset($ticker)) : ?>
                                <h2 class="text-primary"><?php echo $ticker; ?></h2>
                                1 <i class="fa fa-btc" aria-hidden="true"></i> =  <?php echo $euros; ?>
                                <i class="fa fa-eur" aria-hidden="true"></i><br>
                                1 <i class="fa fa-btc" aria-hidden="true"></i> =  <?php echo $dollars; ?>
                                <i class="fa fa-usd" aria-hidden="true"></i>

                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


<?php
require 'footer.php';