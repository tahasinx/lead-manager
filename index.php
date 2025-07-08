<?php

require_once 'server/Server.php';

$server = new Server();
$result = "";

if (isset($_POST['sendMessage'])) {
  $result = $server->save_message($_POST);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php include('template/header.php') ?>
  <style>
    html {
      scroll-behavior: smooth;
    }
  </style>
</head>

<body>
  <main class="app app-site">

    <?php include('template/navbar.php') ?>

    <section class="py-5">

      <div class="container container-fluid-xl" style="font-family: 'Rajdhani', sans-serif;">
        <div class="row align-items-center">

          <div class="col-12 col-md-6 order-md-2" data-aos="fade-left">
            <img class="img-fluid img-float-md-6 mb-5 mb-md-0" src="assets/images/illustration/Group 168.png" alt="">
          </div>

          <div class="col-12 col-md-6 order-md-1" data-aos="fade-in">
            <div class="col-fix pl-xl-3 ml-auto text-center text-sm-left">
              <span style="text-align: justify;font-size:20px">
                SkipNcall lets you get the most reliable and fresh leads of property owners wanting to receive an offer on their property. Get your pipeline filled with the correct prospects. Start growing your business today.
                </h3>
                <p class="lead text-muted mb-5"> We are here to help you to grow. </p>
                <button onclick="window.location='auth/?signIn=1'" style="border:1px solid #346CB0 !important" class="btn btn-lg d-block d-sm-inline-block mr-sm-2 my-3">Let's Try <i class="fa fa-angle-right ml-2"></i></button>
                <!-- <a href="#" class="btn btn-lg btn-subtle-primary d-block d-sm-inline-block my-3" data-aos="zoom-in" data-aos-delay="300">Documentation</a> -->
            </div>
          </div>

        </div>
      </div>
    </section>

    <section class="py-5" style="font-family: 'Rajdhani', sans-serif;">
      <div class="container">
        <div class="row">
          <div class="col-12 col-md-8 offset-md-2 text-center">
            <h2> With You From the Ground Up </h2>
            <p class="lead text-muted"> The system is designed to be your lead generation partner, helping you reach your goal from scratch. </p>
          </div>
        </div>
      </div>
    </section>

    <section class="py-5" style="font-family: 'Rajdhani', sans-serif;">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-12 col-md-6" data-aos="fade-right">
            <img class="img-fluid mb-4 mb-md-0" src="assets/images/illustration/Illustration.png" alt="">
          </div>
          <div class="col-12 col-md-6 text-center text-sm-left">
            <h3 class="mb-4"> Increase your productivity </h3>
            <p class="text-muted font-size-lg mb-4">
              Helping you increase your and your team’s productivity with the most authentic leads. Start growing your business with us and work those leads with joy.
            </p>
          </div>
        </div>
      </div>
    </section>

    <section class="pt-5" style="font-family: 'Rajdhani', sans-serif;">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-12 col-md-6 order-md-2" data-aos="fade-left">
            <img class="img-fluid mb-4 mb-md-0" src="assets/images/illustration/Group 167.png" alt="">
          </div>
          <div class="col-12 col-md-6 order-md-1 text-center text-sm-left">
            <h3 class="mb-4">PUMP UP YOUR PIPELINE WITH RELIABLE LEADS EXTEND YOUR BUSINESS</h3>
            <p class="text-muted font-size-lg mb-4" style="text-align: justify;">
              Our leads aren’t your typical publicly available lists of tax lien, absentee owners, foreclosure, probate, etc. We source leads directly from the property owners who are looking for an offer on their homes and wanting to sell their properties. That’s what makes them authentic and reliable.
            </p>
          </div>
        </div>
      </div>
    </section>

    <section class="position-relative">
      <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="192" viewbox="0 0 1440 240" preserveaspectratio="none">
        <path class="fill-light" fill-rule="evenodd" d="M0 240V0c19.985 5.919 41.14 11.008 63.964 14.89 40.293 6.855 82.585 9.106 125.566 9.106 74.151 0 150.382-6.697 222.166-8.012 13.766-.252 27.51-.39 41.21-.39 99.76 0 197.087 7.326 282.907 31.263C827.843 72.527 860.3 117.25 906.926 157.2c43.505 37.277 115.38 51.186 208.485 53.076 7.584.153 15.156.224 22.714.224 40.887 0 81.402-2.062 121.914-4.125 40.512-2.062 81.027-4.125 121.902-4.125 1.01 0 2.019.002 3.03.004 16.208.042 34.959.792 55.029 2.234V240H0z"></path>
      </svg>
    </section>

    <section class="position-relative pb-5 bg-light" style="font-family: 'Rajdhani', sans-serif;">

      <div class="sticker">
        <div class="sticker-item sticker-top-right sticker-soften">
          <img src="assets/images/decoration/cubes.svg" alt="" data-aos="zoom-in">
        </div>
        <div class="sticker-item sticker-bottom-left sticker-soften scale-150">
          <img src="assets/images/decoration/cubes.svg" alt="" data-aos="zoom-in">
        </div>
      </div>

      <div class="container position-relative" id="Features">
        <h2 class="text-center text-sm-left"> Features </h2>
        <p class="lead text-muted text-center text-sm-left mb-5"> We have unique services with features.</p>
        <div class="card-deck-lg">
          <div class="card shadow" data-aos="fade-up" data-aos-delay="0">
            <div class="card-body p-4" style="min-height: 192px;">
              <div class="d-sm-flex align-items-start text-center text-sm-left">
                <img src="assets/images/illustration/Outline.png" class="mr-sm-4 mb-3 mb-sm-0" alt="" width="72">
                <div class="flex-fill">
                  <h5 class="mt-0"> Purchase a zip code and be the owner </h5>
                  <p class="text-muted font-size-lg">
                    Find a zip code now. Our system will generate leads against that zip code and you get to be the owner of all those leads until you release the zip. This means all the leads of your preferred zip belong to you and you only.
                  </p>
                </div>
              </div>
            </div>
          </div>
          <div class="card shadow" data-aos="fade-up" data-aos-delay="100">
            <div class="card-body p-4" style="min-height: 192px;">
              <div class="d-sm-flex align-items-start text-center text-sm-left">
                <img src="assets/images/illustration/research.png" class="mr-sm-4 mb-3 mb-sm-0" alt="" width="100">
                <div class="flex-fill">
                  <h5 class="mt-0"> Mapping & Statistics </h5>
                  <p class="text-muted font-size-lg">
                    We offer zip selection with a geological mopping system with all the relevant information and lead generation statistics of the zip.
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="card-deck-lg">
          <div class="card shadow" data-aos="fade-up" data-aos-delay="200">
            <div class="card-body p-4" style="min-height: 192px;">
              <div class="d-sm-flex align-items-start text-center text-sm-left">
                <img src="assets/images/illustration/surface1.png" class="mr-sm-4 mb-3 mb-sm-0" alt="" width="72">
                <div class="flex-fill">
                  <h5 class="mt-0"> Upload custom raw data </h5>
                  <p class="text-muted font-size-lg"> Upload your custom raw data and we'll return to you the most reliable skip traced leads.</p>
                </div>
              </div>
            </div>
          </div>
          <div class="card shadow" data-aos="fade-up" data-aos-delay="300">
            <div class="card-body p-4" style="min-height: 192px;">
              <div class="d-sm-flex align-items-start text-center text-sm-left">
                <img src="assets/images/illustration/loan.png" class="mr-sm-4 mb-3 mb-sm-0" alt="" width="72">
                <div class="flex-fill">
                  <h5 class="mt-0"> Easy payment method </h5>
                  <p class="text-muted font-size-lg"> Our built-in payment gateway is secure, safe, and supported globally. So you've nothing to worry about.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="position-relative py-5 bg-light" style="font-family: 'Rajdhani', sans-serif;">
      <div class="sticker">
        <div class="sticker-item sticker-top-right sticker-soften translate-x-50">
          <img src="assets/images/decoration/bubble1.svg" alt="" data-aos="fade-left">
        </div>
      </div>
      <div class="container position-relative" id="Pricing">
        <h2 class="text-center"> Pricing </h2>
        <p class="lead text-muted text-center mb-5"> We have two types of pricing. </p><!-- .row -->
        <div class="row align-items-center">
          <div class="col-12 col-md-5 offset-md-1 py-md-4 pr-md-0" style="font-family: 'Rajdhani', sans-serif;">
            <div class="card font-size-lg shadow-lg" data-aos="fade-up">
              <h5 class="card-header text-center text-success p-4 px-lg-5"> Choose Zip Code </h5>
              <div class="card-body p-4 p-lg-5">
                <h4 class="text-center">
                  <p class="text-muted">Silver<br>
                    <small>10 $<small>/Lead</small></small>
                  </p>
                </h4>
                <hr>
                <ul class="list-icons">
                  <li class="mb-2 pl-1">
                    <span class="list-icon"><img class="mr-2" src="assets/images/decoration/check.svg" alt="" width="16"></span> Phone Number
                  </li>
                  <li class="mb-2 pl-1">
                    <span class="list-icon"><img class="mr-2" src="assets/images/decoration/check.svg" alt="" width="16"></span> Email Address
                  </li>
                  <li class="mb-2 pl-1">
                    <span class="list-icon"><img class="mr-2" src="assets/images/decoration/check.svg" alt="" width="16"></span> Mailing Address
                  </li>
                  <li class="mb-2 pl-1">
                    <span class="list-icon"><img class="mr-2" src="assets/images/decoration/check.svg" alt="" width="16"></span> Verified Owner
                  </li>
                </ul>

                <h4 class="text-center">
                  <p class="text-muted">Gold<br>
                    <small>15 $<small>/Lead</small></small>
                  </p>
                </h4>
                <hr>
                <ul class="list-icons">
                  <li class="mb-2 pl-1">
                    <span class="list-icon"><img class="mr-2" src="assets/images/decoration/check.svg" alt="" width="16"></span> Phone Number
                  </li>
                  <li class="mb-2 pl-1">
                    <span class="list-icon"><img class="mr-2" src="assets/images/decoration/check.svg" alt="" width="16"></span> Email Address
                  </li>
                  <li class="mb-2 pl-1">
                    <span class="list-icon"><img class="mr-2" src="assets/images/decoration/check.svg" alt="" width="16"></span> Mailing Address
                  </li>
                  <li class="mb-2 pl-1">
                    <span class="list-icon"><img class="mr-2" src="assets/images/decoration/check.svg" alt="" width="16"></span> Verified Owner
                  </li>
                  <li class="mb-2 pl-1">
                    <span class="list-icon"><img class="mr-2" src="assets/images/decoration/check.svg" alt="" width="16"></span> Full Questionaire
                  </li>
                </ul>

              </div>

            </div>
          </div>
          <div class="col-12 col-md-5 py-md-4 pl-md-0" style="font-family: 'Rajdhani', sans-serif;">
            <div class="card font-size-lg card-inverse bg-primary shadow" data-aos="fade-up" data-aos-delay="200">
              <h5 class="card-header text-center p-4 px-lg-5"> Upload File & Order </h5>
              <div class="card-body p-4 p-lg-5">
                <h4 class="text-center">
                  <p class="">Basic<br>
                    <small>9 cent<small>/Lead</small></small>
                  </p>
                </h4>
                <hr>
                <ul class="list-icons">
                  <li class="mb-2 pl-1">
                    <span class="list-icon"><img class="mr-2" src="assets/images/decoration/check.svg" alt="" width="16"></span> Phone Number
                  </li>
                  <li class="mb-2 pl-1">
                    <span class="list-icon"><img class="mr-2" src="assets/images/decoration/check.svg" alt="" width="16"></span> Email Address
                  </li>
                  <li class="mb-2 pl-1">
                    <span class="list-icon"><img class="mr-2" src="assets/images/decoration/check.svg" alt="" width="16"></span> Mailing Address
                  </li>
                </ul>

                <h4 class="text-center">
                  <p class="">Plus<br>
                    <small>9 ¢<small>/Lead</small></small>
                    <br>
                    <small>5 $<small>/Verified Lead</small></small>
                  </p>
                </h4>
                <hr>
                <ul class="list-icons">
                  <li class="mb-2 pl-1">
                    <span class="list-icon"><img class="mr-2" src="assets/images/decoration/check.svg" alt="" width="16"></span> Phone Number
                  </li>
                  <li class="mb-2 pl-1">
                    <span class="list-icon"><img class="mr-2" src="assets/images/decoration/check.svg" alt="" width="16"></span> Email Address
                  </li>
                  <li class="mb-2 pl-1">
                    <span class="list-icon"><img class="mr-2" src="assets/images/decoration/check.svg" alt="" width="16"></span> Mailing Address
                  </li>
                  <li class="mb-2 pl-1">
                    <span class="list-icon"><img class="mr-2" src="assets/images/decoration/check.svg" alt="" width="16"></span> Verified Owner
                  </li>
                </ul>

                <h4 class="text-center">
                  <p class="">Ultra<br>
                    <small>9 ¢<small>/Lead</small></small>
                    <br>
                    <small>5 $<small>/Verified Lead</small></small>
                    <br>
                    <small>10 $<small>/Offer</small></small>
                  </p>
                </h4>
                <hr>
                <ul class="list-icons">
                  <li class="mb-2 pl-1">
                    <span class="list-icon"><img class="mr-2" src="assets/images/decoration/check.svg" alt="" width="16"></span> Phone Number
                  </li>
                  <li class="mb-2 pl-1">
                    <span class="list-icon"><img class="mr-2" src="assets/images/decoration/check.svg" alt="" width="16"></span> Email Address
                  </li>
                  <li class="mb-2 pl-1">
                    <span class="list-icon"><img class="mr-2" src="assets/images/decoration/check.svg" alt="" width="16"></span> Mailing Address
                  </li>
                  <li class="mb-2 pl-1">
                    <span class="list-icon"><img class="mr-2" src="assets/images/decoration/check.svg" alt="" width="16"></span> Verified Owner
                  </li>
                </ul>

              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="position-relative pb-5 bg-light" style="font-family: 'Rajdhani', sans-serif;">

      <div class="sticker">
        <div class="sticker-item sticker-top-right sticker-soften">
          <img src="assets/images/decoration/cubes.svg" alt="" data-aos="zoom-in">
        </div>
        <div class="sticker-item sticker-bottom-left sticker-soften scale-150">
          <img src="assets/images/decoration/cubes.svg" alt="" data-aos="zoom-in">
        </div>
      </div>
      <hr>
      <div class="container position-relative" id="Contact">
        <h2 class="text-center text-sm-left"> Contact Us </h2>
        <p class="lead text-muted text-center text-sm-left mb-5"> Feel free to send us a message. </p>
        <div class="card-deck-lg">
          <div class="card shadow" data-aos="fade-up" data-aos-delay="0">
            <div class="card-body p-4">
              <div class="d-sm-flex align-items-start text-center text-sm-left" style="font-family: 'Rajdhani', sans-serif;">
                <img src="assets/images/illustration/rocket.svg" class="mr-sm-4 mb-3 mb-sm-0" alt="" width="72">
                <div class="flex-fill">
                  <span style="font-size: 20px;">
                    <b><i class="fa fa-phone"></i> Contact No</b> <br>
                    +1 (xxx) xxx-xxxx
                  </span>
                  <br>
                  <br>
                  <span style="font-size: 20px;">
                    <b><i class="fa fa-envelope"></i> Email Address</b> <br>
                    info@skipncall.com
                  </span>
                </div>
              </div>
            </div>
          </div>
          <div class="card shadow" data-aos="fade-up" data-aos-delay="100">
            <div class="card-body p-4">
              <div class="d-sm-flex align-items-start text-center text-sm-left">
                <div class="flex-fill">
                  <form method="POST" onsubmit="processing()">
                    <div class="row">
                      <div class="col-sm-12">
                        <span class="text-success" style="font-size: 17px;"><?= $result ?></span>
                      </div>
                      <div class="col-sm-6">
                        <div class="sign-box">
                          <div class="input-field">
                            <input id="firstname" name="firstname" type="text" class="input" style="width: 242px;" required>
                            <label for="firstname" class="label">
                              First Name <span class="text-danger">*</span>
                            </label>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="sign-box">
                          <div class="input-field">
                            <input id="lastname" name="lastname" type="text" class="input" style="width: 242px;" required>
                            <label for="lastname" class="label">
                              Last Name <span class="text-danger">*</span>
                            </label>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="sign-box">
                          <div class="input-field">
                            <input id="email" name="email" type="email" class="input" style="width: 242px;" required>
                            <label for="email" class="label">
                              Email Address <span class="text-danger">*</span>
                            </label>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="sign-box">
                          <div class="input-field">
                            <input id="contact" name="contact" type="tel" class="input" style="width: 242px;" required>
                            <label for="contact" class="label">
                              Contact No <span class="text-danger">*</span>
                            </label>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-12">
                        <textarea class="input" name="message" style="width: 100%;height: 150px;border: 2px solid #ABABAB;" placeholder="&nbsp;Write Your Message..." required></textarea>
                      </div>
                      <div class="col-sm-12" hidden>
                        <textarea name="visitor_data" style="width: 100%;height: 150px;border: 2px solid #ABABAB;" required><?= var_export(unserialize(file_get_contents('http://www.geoplugin.net/php.gp?ip=' . $server->getRealIpAddr()))) ?></textarea>
                      </div>
                      <div class="col-sm-12">
                        <button type="submit" name="sendMessage" id="sendButton" class="btn btn-dark" style="border-radius: 0px;float: right;width:110px;">Send Message</button>
                        <button type="submit" name="sendMessage" id="processingBtn" class="btn btn-dark" style="border-radius: 0px;float: right;width:110px;display:none">
                          <img src="assets/images/loading.gif" alt="" style="width: 25px;">
                        </button>
                      </div>
                    </div>

                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <?php include('template/footer.php') ?>
  </main>


</body>

<?php include('template/js-links.php') ?>

</html>