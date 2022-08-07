<?php
    require_once "./DAL/check_loggedin.php";
    require_once "./config/config.php";

    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {   
        $query = "INSERT INTO cart (customer_id, ticket_id) VALUES( ? , ? ) ON DUPLICATE KEY UPDATE amount = amount + ?";

        if ($stmt = $mysqli->prepare($query))
        {
            $stmt->bind_param("iii", $param_customer_id, $param_ticket_id, $param_amount);

            $param_customer_id = $_SESSION["id"];
            $param_ticket_id = $_POST["ticket_id"];
            $param_amount = $_POST["quantity"];
            
            $stmt->execute();

            $stmt->close();
        }

        // $mysqli->close();
    }
?>

<script>
    function change_value_by_id(ticket_id) {
        document.getElementById("ticket_id").value = ticket_id;
    }
</script>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title> The Band </title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" href="./assets/img/favicon.png" type="image/x-icon" />
        <link rel="stylesheet" href="./assets/css/style.css">
        <link rel="stylesheet" href="./assets/css/responsive.css">
        <link rel="stylesheet" href="./assets/fonts/themify-icons/themify-icons.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    </head>

    <body>
        <div id="main">
            <div id="header">
                <!-- Begin: Nav -->
                <ul id="nav">
                    <li><a href="#">Home</a></li>
                    <li><a href="#band">Band</a></li>
                    <li><a href="#tour">Tour</a></li>
                    <li><a href="#contact">Contact</a></li>
                    <li>
                        <a href="#">
                            More 
                        <i class="nav-arrow-down ti-angle-down"></i>
                        </a>
                        
                        <ul class="subnav">
                            <li><a href="#">Merchandise</a></li>
                            <li><a href="#">Extras</a></li>
                            <li><a href="#">Media</a></li>
                        </ul>
                    </li>
                </ul>
                <!-- End: Nav -->
                
                <!-- Begin: Nav -->
                <div class="user-profile-button">
                    <a href="user/profile.php" class="user-profile">
                        <i class="user-profile-icon ti-user"></i>
                    </a>
                    <ul class="sub-nav">
                        <li><a href="user/profile.php"> Your Profile </a></li>
                        <li><a href="logout.php"> Logout </a></li>
                    </ul>
                </div>

                <div class="search-button">
                    <i class="search-icon ti-search"></i>
                </div>
                <!-- End: Nav -->

            </div>

            <div id="slider">
                <div class="text-content">
                    <h2 class="text-heading">New York </h2>
                    <div class="text-description"> The atmosphere in New York is lorem ipsum.</div>
                </div>
            </div>

            <div id="content">
                <!-- About section -->
                <div class="content-section" id="band">
                    <h2 class="section-heading"> THE BAND </h2>
                    <p class="section-sub-heading">We love music</p>
                    <p class="about">We have created a fictional band website. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>

                    <div class="members-list">
                        <div class="member-item">
                            <p class="member-name"> Name </p>
                            <img src="./assets/img/bandmember.jpg" alt="member" class="member-img">
                        </div>

                        <div class="member-item">
                            <p class="member-name"> Name </p>
                            <img src="./assets/img/bandmember.jpg" alt="member" class="member-img">
                        </div>

                        <div class="member-item">
                            <p class="member-name"> Name </p>
                            <img src="./assets/img/bandmember.jpg" alt="member" class="member-img">
                        </div>
                        <div class="clear"></div>
                    </div>
                </div>
                
                <!-- Tour section -->
                <div class="tour-section" id="tour">
                    <div class="content-section">
                        <h2 class="section-heading text-white"> TOUR DATES </h2>
                        <p class="section-sub-heading text-white">Remember to book your tickets!</p>
                        <!-- tickets -->
                        <ul class="tickets-list">
                            <li>September <span class="sold-out">Sold out</span></li>
                            <li>October <span class="sold-out">Sold out</span></li>
                            <li>November <span class="quantity">3</span></li>
                        </ul>
                        
                        <!-- places -->
                        <div class="places-list">
                            <div class="place-item">
                                <img src="./assets/img/places/newyork.jpg" alt="newyork" class="place-img">
                                <div class="place-content">
                                    <h3 class="place-heading"> New York</h3>
                                    <p class="place-time">Fri 27 Nov 2016 </p>
                                    <p class="place-description"> Praesent tincidunt sed tellus ut rutrum sed vitae justo.</p>
                                    <button class="buy-button js-buy-ticket" name="newyork-buy-btn" value="1" onclick="change_value_by_id(1)"> Buy Tickets</button>
                                </div>
                            </div>

                            <div class="place-item">
                                <img src="./assets/img/places/paris.jpg" alt="paris" class="place-img">
                                <div class="place-content">
                                    <h3 class="place-heading"> Paris</h3>
                                    <p class="place-time"> Sat 28 Nov 2016</p>
                                    <p class="place-description">Praesent tincidunt sed tellus ut rutrum sed vitae justo. </p>
                                    <button class="buy-button js-buy-ticket" name="paris-buy-btn" value="2" onclick="change_value_by_id(2)"> Buy Tickets</button>
                                </div>
                            </div>

                            <div class="place-item">
                                <img src="./assets/img/places/sanfran.jpg" alt="sanfran" class="place-img">
                                <div class="place-content">
                                    <h3 class="place-heading"> San Francisco</h3>
                                    <p class="place-time"> Sun 29 Nov 2016 </p>
                                    <p class="place-description"> Praesent tincidunt sed tellus ut rutrum sed vitae justo.</p>
                                    <button class="buy-button js-buy-ticket" name="sanfran-buy-btn" value="3" onclick="change_value_by_id(3)"> Buy Tickets</button>
                                </div>
                            </div>

                            <div class="clear"></div>
                        </div>
                    </div>
                </div>

                <!-- Contact section -->
                <div class="content-section" id="contact">
                    <h2 class="section-heading"> CONTACT </h2>
                    <p class="section-sub-heading">Fan? Drop a note!</p>
                    
                    <div class="contact-content">
                        <div class="contact-information">
                            <p class="contact-location">
                                <i class="ti-location-pin"></i>
                                Chicago, US 
                            </p>
    
                            <p class="contact-phone-number">
                                <i class="ti-hand-point-right"></i>
                                Phone: +00 151515
                            </p>
    
                            <p class="contact-email">
                                <i class="ti-email"></i>
                                Email: mail@mail.com
                            </p>
                        </div>
    
                        <div class="user-info"> 
                            <form action="">
                                <input type="text" class="contact-name" placeholder="Name" required value="<?php echo $_SESSION["name"] ?>" />
                                <input type="email" class="contact-email" placeholder="Email" required value="<?php echo $_SESSION["email"] ?>" />
                                <input type="text" class="contact-message" placeholder="Message" required /> 
                                
                                <button type="submit" class="send-button"> SEND </button>
                                <!-- <input type="submit" value="SEND" class="send-button"> -->
                            </form> 
                        </div>
                    </div>
                    <div class="clear"></div>
                </div>
            </div>

            <div id="footer">
                <img src="./assets/img/banner.jpg" alt="banner" class="banner">

                <div class="footer-ending">
                    <i class="ti-facebook"></i>
                    <i class="ti-instagram"></i>
                    <i class="ti-github"></i>
                    <i class="ti-pinterest"></i>
                    <i class="ti-twitter-alt"></i>
                    <i class="ti-linkedin"></i>

                    <p class="powered-section"> Powered by <a href="https://www.w3schools.com/w3css/default.asp"> w3.css </a></p>
                </div>
            </div>
        </div>

        <div class="modal js-modal">
            <div class="modal-container js-modal-container">
                <div class="modal-close js-modal-close">
                    <i class="ti-close"></i>
                </div>

                <header class="modal-header" style="align-items: center; justify-content: center;">
                    <i class="ti-bag"></i>
                    Tickets
                </header>

                <div class="modal-body">
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <input id="ticket_id" type="number" class="modal-input hidden" name="ticket_id" value="1" />

                        <label for="quantity" class="modal-label">
                            <i class="ti-shopping-cart"></i>
                            Tickets, $15 per person
                        </label>
                        <input id="quantity" type="number" class="modal-input" name="quantity" placeholder="How many?">
                    
                        <label for="user" class="modal-label">
                            <i class="ti-user"></i>
                            Send to
                        </label>
                        <input id="user" type="text" class="modal-input" name="email" value="<?php echo $_SESSION["email"]?>" placeholder="Enter email...">

                        <button id="buy-tickets" type="submit">
                            Pay
                            <i class="ti-check"></i>
                        </button>
                    </form>
                </div>

                <footer class="modal-footer">
                    <p class="modal-help"> Need <a href=""> help?</a></p>
                </footer>
            </div>
        </div>
        
        <script>    
            const variable = 1;
            const buyBtns = document.querySelectorAll('.js-buy-ticket');
            const modal = document.querySelector('.js-modal');
            const closeBtn = document.querySelector('.js-modal-close');
            const modalContainer = document.querySelector('.js-modal-container');

            function showBuyTickets() {
                modal.classList.add('open');
                // document.getElementById('ticket_id').value = _buyBtn.value;
            }           

            function hideBuyTickets() {
                modal.classList.remove('open');                
            }

            // open modal 
            let i = 0;
            for (const buyBtn of buyBtns)
                buyBtn.addEventListener('click', showBuyTickets);

            // close modal
            closeBtn.addEventListener('click', hideBuyTickets);
            modal.addEventListener('click', hideBuyTickets);
            modalContainer.addEventListener('click', function(event) { event.stopPropagation() });


        </script>
    </body>
</html>