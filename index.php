<?php
require 'config/MainClass.php';
$productVariation = $use->getPv();
$notify = $use->getNotify();
$pageFbName = "dityaranote";
$pageLineId = "dityara17";
$phoneNumber = "0898721728172";

?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css"
          integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog=="
          crossorigin="anonymous"/>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
          integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="css/myCss.css">
    <title>Travel To Indonesia</title>
</head>
<body>
<div class="container">
    <div class="main">
        <div class="title" id="title">
            <h2>Wanna Travel To Jepara??</h2>
        </div>
        <div class="img">
            <img src="images/product1.png" alt="Product 1">
        </div>
        <p>
            She wondered if the note had reached him. She scolded herself for not handing it to him in person. She
            trusted her friend, but so much could happen. She waited impatiently for word.
        </p>
        <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias aliquam atque autem cumque cupiditate
            dolorHe sat across from her trying to imagine it was the first time. It wasn't. Had it been a hundred? It
            quite possibly could have been. Two hundred? Probably not. His mind wandered until he caught himself and
            again tried to imagine it was the first time.
        </p>
        <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias aliquam atque autem cumque cupiditate dolor
            ducimus earum ex ipsum, iure minima nihil placeat rerum saepe similique sunt vitae voluptate voluptatem.
        </p>
        <div class="img">
            <img src="images/product2.jpeg" alt="Product 1">
        </div>
        <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias aliquam atque autem cumque cupiditate dolor
            ducimus earum ex ipsum, iure minima nihil placeat rerum saepe similique sunt vitae voluptate voluptatem.
        </p>
        <div class="form" id="form" style="margin-bottom: 40px;">
            <form action="" method="post">
                <div class="sub-title">
                    <h3>Chose Quantity Product</h3>
                    <div class="form-check" style="margin-bottom: 20px;">
                        <?php foreach ($productVariation as $product): ?>
                            <input type="radio" name="varian" class="form-check-input" value="<?= $product['id_pv'] ?>">
                            <label for="">
                                <?= $product['name'] ?>
                            </label>
                            <br>
                        <?php endforeach; ?>
                    </div>
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Phone</label>
                        <input type="number" name="phone" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Address</label>
                        <textarea name="address" id="" class="form-control" required rows="4"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Message</label>
                        <textarea name="message" id="" class="form-control" rows="4"></textarea>
                    </div>
                    <button name="submit" style="width: 300px;" class="btn btn-danger">Order</button>
                </div>
            </form>

            <?php
            if (isset($_POST['submit'])) {
                $use->storeTransaction($_POST['varian'], $_POST['name'], $_POST['address'], $_POST['phone'], $_POST['message']);
                echo "<script>location='success.php'</script>";
            }
            ?>
            <hr>
            <p class="text-center">Or</p>
            <a href="https://line.me/R/ti/p/<?= $pageLineId ?>" target="_blank" class="">
                <div class="contact_line">
	                <span class="header_brand_text">
	                    <i class="fab fa-line"></i>
	                    Order From Line
                    </span>
                </div>
            </a>
            <a href="http://m.me/<?= $pageFbName ?>?ref=summer_coupon" target="_blank" class="">
                <div class="contact_fb">
	                <span class="header_brand_text">
	                    <i class="fab fa-facebook"></i>
	                    Order Facebook
                    </span>
                </div>
            </a>
            <a href="tel:<?= $phoneNumber ?>" target="_blank" class="text-center" style="font-size: 24px;">
                <div class="">
	                <span class="header_brand_text">
	                    <i class="fas fa-phone-square"></i>
	                    <?= $phoneNumber ?>
                    </span>
                </div>
            </a>
        </div>

        <div class="notify-section">
            <div class="sub-title">
                <h3>Order Notify</h3>
            </div>
            <div class="ent">
                <div class="notify-all">
                    <ul id="mytext">
                        <marquee startVisible="true" duplicated="true" direction="up" scrollamount="5">
                            <table class="table table-striped">
                                <?php foreach ($notify as $item): ?>
                                    <tr>
                                        <td>
                                            <p><span class="notif-badge"></span><?php $target = $item['phone'];
                                                $count = strlen($item['phone']) - 7;
                                                $output = substr_replace($target, str_repeat('*', $count), 4, $count);
                                                echo $output; ?></p>
                                            <p>
                                                <span class="notif-date"><?php echo $use->time_elapsed_string($item['date']) ?></span><?= $item['name'] ?>
                                            </p>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </table>
                        </marquee>
                    </ul>
                </div>
            </div>
        </div>
    </div>

</div>
<div class="side-btn">
    <div class="fixed-badges">
        <a class="fixed-badge fixed-soc" href="https://line.me/R/ti/p/<?= $pageLineId ?>">
            <span class="btn btn-success"><i class="fab fa-line"></i></span>
        </a>
        <a class="fixed-badge fixed-soc" href="http://m.me/<?= $pageFbName ?>?ref=summer_coupon">
            <span class="btn btn-primary"><i class="fab fa-facebook"></i></span>
        </a>
        <a class="fixed-badge after fixed-soc" href="#title">
            <span class="btn btn-primary" style="background: #5e5e5e"><i class="fa fa-arrow-up"></i></span>
        </a>
    </div>
</div>
</div>
<div class="footer after">
    <a href="#form" style="color: white">
        <p style="width: 100%">
            <i class="fa fa-shopping-bag"></i>
        </p>
    </a>
</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"
        integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg=="
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV"
        crossorigin="anonymous"></script>
<script>
    $(document).scroll(function () {
        var y = $(this).scrollTop();
        if (y > 200) {
            $('.after').show();
        } else {
            $('.after').hide(100);
        }

        // notify
    });
</script>
</body>
</html>