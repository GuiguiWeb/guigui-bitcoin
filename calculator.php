<?php
require 'header.php';
require_once 'vendor/autoload.php';

if (isset($_POST['submit'])) {

    $money = $_POST['money'];
    $amount = $_POST['amount'];

    if (empty($amount)) {
        $error = "Empty amount";
    } else {
        $result = Unirest\Request::get("https://community-bitcointy.p.mashape.com/convert/" . $amount . "/" . $money . "",
            array(
                "X-Mashape-Key" => "jGw7Ato6kUmshd6EA5gNslEFX3iWp1Npa8ZjsnUENaMUqXlAXg",
                "Accept"        => "text/plain"
            )
        );

        $data = $result->body->value;
    }
}

?>


    <div class="container">
        <div class="row">
            <div class="col-12 text-center mt-5 mb-4">
                <h1>Calculator </h1>
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
                        <form method="post" action="calculator.php" class="mt-2">
                            <div class="form-group <?php if (isset($error)) {
                                echo "has-danger";
                            } ?> ">
                                <label class="form-check-label" for="amount">Amount of Bitcoin
                                    <?php if (isset($error)) : ?>
                                        <span id="amountHelp" class="text-danger">Can't be empty !</span>
                                    <?php endif; ?>
                                </label>

                                <input type="number" class="form-control" id="amount" name="amount" value="<?php if (isset($amount)) { echo $amount; }?>">
                            </div>
                            <div class="form-group">
                                <label class="form-check-label" for="ticker">Device </label>
                                <select class="form-control" id="money" name="money">
                                    <option value="EUR">Euros</option>
                                    <option value="USD">Dollars</option>
                                </select>
                            </div>
                            <button type="submit" id="submit" name="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
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
                            <?php if (isset($amount) AND isset($money) AND isset($data)) : ?>
                                <h2 class="text-primary"><?php echo $amount; ?>
                                    <i class="fa fa-btc" aria-hidden="true"></i>
                                </h2>

                                <h3><?php echo $data; ?><?php echo $money; ?></h3>

                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


<?php
require 'footer.php';