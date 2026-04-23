<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donation Page | Green Community Engagement</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,600;0,700;1,700&display=swap" rel="stylesheet">
</head>
<body class="donatepage">
   <nav class="navbar">
        <div class="navbar-container">
            <a href="home.php" class="navdiv"> 
            <img style="width: 42px; margin-right: 10px;" src="assets/Logo1.png" alt="Green Community Logo">GREEN COMMUNITY ENGAGEMENT</a>
            <div class="nav-links">
                <ul>
                    <li><a href="#about">About Us</a></li>
                    <li><a href="projects.php">Projects</a></li>
                    <li><a href="donation.php">Donation</a></li>
                    <span class="divider">|</span>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <section class="donate">
    <div class="ant-col ant-col-xs-24 ant-col-sm-24 ant-col-lg-12 css-1v28nim" style="padding-left: 20px; padding-right: 20px;">
    <section class="card-amount card-amount--header">
        <div class="ant-row ant-row-middle css-1v28nim">
            <a href="index.php" class="back-button">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="25" fill="none">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 12.5H5M12 19.5l-7-7 7-7"></path>
                </svg>
            </a>
            <h2 class="title-card">Contribute Now</h2>
        </div>
    </section>
    <section class="card-amount card-amount--body">
        <span class="ant-typography label-form--price css-1v28nim">Make a difference today</span>
        <form id="basic" action="landing.php" method="post" class="ant-form ant-form-horizontal css-1v28nim">
            <div class="ant-row css-1v28nim" style="margin-left: -15px; margin-right: -15px; row-gap: 30px;">
                <div class="ant-col ant-col-12 css-1v28nim" style="padding-left: 15px; padding-right: 15px;">
                    <section class="card-amount--price  cursor-pointer">IDR. 15.000</section>
                </div>
                <div class="ant-col ant-col-12 css-1v28nim" style="padding-left: 15px; padding-right: 15px;">
                    <section class="card-amount--price  cursor-pointer">IDR. 30.000</section>
                </div>
                <div class="ant-col ant-col-12 css-1v28nim" style="padding-left: 15px; padding-right: 15px;">
                    <section class="card-amount--price  cursor-pointer">IDR. 50.000</section>
                </div>
                <div class="ant-col ant-col-12 css-1v28nim" style="padding-left: 15px; padding-right: 15px;">
                    <section class="card-amount--price  cursor-pointer">IDR. 75.000</section>
                </div>
                <div class="ant-col ant-col-12 css-1v28nim" style="padding-left: 15px; padding-right: 15px;">
                    <section class="card-amount--price  cursor-pointer">IDR. 100.000</section>
                </div>
                <div class="ant-col ant-col-24 css-1v28nim" style="padding-left: 15px; padding-right: 15px;">
                    <span class="ant-typography label-form--price css-1v28nim">Other donation amounts</span>
                    <div class="ant-form-item css-1v28nim ant-form-item-horizontal">
                        <div class="ant-row ant-form-item-row css-1v28nim">
                            <div class="ant-col ant-form-item-control css-1v28nim">
                                <div class="ant-form-item-control-input">
                                    <div class="ant-form-item-control-input-content">
                                        <div class="ant-input-number ant-input-number-in-form-item css-1v28nim ant-input-number-outlined">
                                            <div class="ant-input-number-input-wrap">
                                                <input autocomplete="off" role="spinbutton" step="1" placeholder="0" maxlength="15" id="basic_other_donate_nominal" aria-required="true" class="ant-input-number-input" value="IDR ">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <span class="ant-typography ant-typography-secondary css-1v28nim">Min. donation of IDR 15,000</span>
                </div>
                <div class="ant-col ant-col-24 css-1v28nim" style="padding-left: 15px; padding-right: 15px;">
                    <div class="ant-form-item css-1v28nim ant-form-item-horizontal">
                        <div class="ant-row ant-form-item-row css-1v28nim">
                            <div class="ant-col ant-form-item-control css-1v28nim">
                                <div class="ant-form-item-control-input">
                                    <div class="ant-form-item-control-input-content">
                                    <button type="submit" class="ant-btn css-1v28nim ant-btn-primary ant-btn-color-primary ant-btn-variant-solid btn btn-secondary" style="border-radius: 100px; width: 100%;">
                                    <span>Proceed to Payment</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </form>
    </section>
    </div>
</body>
</html>



