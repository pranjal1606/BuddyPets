<?php
session_start();
ob_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>BuddyPets</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <?php
    require_once("links.php");
    require_once("header.php");
    ?>
</head>

<body>

    <section class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_2.jpg');" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-end">
                <div class="col-md-9 ftco-animate pb-5">
                    <p class="breadcrumbs mb-2"><span class="mr-2"><a href="index.php">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>About us <i class="ion-ios-arrow-forward"></i></span></p>
                    <h1 class="mb-0 bread">About Us</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section ftco-no-pt ftco-no-pb">
        <div class="container p-1" id="care">
            <div class="row d-flex no-gutters">
                <div class="col-md-12 pl-md-5 py-md-5">
                    <div class="heading-section pt-md-5">
                        <h2 class="mb-4">Care Advices</h2>
                        <div class="row">
                            <div class="col-md-12 services-2 w-100 d-flex">
                                <ol>
                                    <li>Provide a balanced diet: Feed your pet a well-balanced diet that is appropriate for their species, age, and size. Consult with a veterinarian to determine the right type and amount of food for your pet.</li>
                                    <br>
                                    <li>Regular exercise: Just like humans, pets need regular exercise to stay healthy and maintain a healthy weight. Dogs, for example, require daily walks or playtime, while cats may need interactive toys or a safe space for play.</li>
                                    <br>
                                    <li>Fresh water: Make sure your pet always has access to fresh, clean water. Change the water regularly and wash the water bowl to keep it hygienic.</li>
                                    <br>
                                    <li>Veterinary care: Schedule regular veterinary check-ups to ensure your pet's overall health and well-being. Vaccinations, deworming, dental care, and preventive treatments for fleas, ticks, and heartworms are crucial to maintaining their health.</li>
                                    <br>
                                    <li>Grooming: Regular grooming is important for your pet's hygiene and comfort. Brush their coat, trim nails, clean ears, and brush teeth as recommended for their species.</li>
                                    <br>
                                    <li>Safe environment: Create a safe and secure environment for your pet. Remove toxic plants, chemicals, and small objects that can be swallowed. Keep electrical cords and household cleaners out of reach.</li>
                                    <br>
                                    <li>Mental stimulation: Provide mental stimulation for your pet to prevent boredom and promote their overall well-being. Offer puzzle toys, interactive games, and social interaction with other pets or humans.</li>
                                    <br>
                                    <li>Socialization: Socialize your pet from a young age to help them become well-adjusted and comfortable around people and other animals. Expose them to different environments, sounds, and experiences.</li>
                                    <br>
                                    <li>Training and boundaries: Teach your pet basic commands and establish boundaries to ensure their safety and promote good behavior. Positive reinforcement-based training methods work well for most pets.</li>
                                    <br>
                                    <li>Love and attention: Show your pet love, affection, and attention. Spend quality time with them, play, and cuddle. Pets thrive on human companionship and need emotional connection.</li>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

            <div class="container p-1" id="adopt">
                <div class="row d-flex no-gutters">
                    <div class="col-md-12 pl-md-5 py-md-5">
                        <div class="heading-section pt-md-5">
                            <h2 class="mb-4">Easy Adopt Process</h2>
                            <div class="col-md-12 services-2 w-100 d-flex">
                                <ol>


                                    <li>Click on Adopt menu.</li>
                                    <br>
                                    <li>Choose the pet you want to adopt.</li>
                                    <br>
                                    <li>First Login to the website, if you are not.</li>
                                    <br>
                                    <li>Click on button Adopt Now. </li>
                                    <br>
                                    <li>Your request will be send.</li>
                                    <br>
                                    <li>Click on Adopt Request to know request status.</li>
                                    <br>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

            <div class="container p-1" id="veternity">
                <div class="row d-flex no-gutters">
                    <div class="col-md-12 pl-md-5 py-md-5">
                        <div class="heading-section pt-md-5">
                            <h2 class="mb-4">Veternity Help</h2>
                            <div class="row">
                                <div class="col-md-12 services-2 w-100 d-flex">
                                    <ol>
                                        <li>Pethut Luxury Dog Boutique <i>(4.3*/5)</i> Raiya, <a href="tel:919979304249"> +919979304249</a></li>
                                        <br>
                                        <li>Dog Care Hospital <i>(4.8*/5)</i> Kishanpara, <a href="tel:917942571638"> +917942571638</a></li>
                                        <br>
                                        <li>Rajkot Veterinary Center <i>(5*/5)</i> Bhaktinagar Circle, <a href="tel:917942571924"> +917942571924</a></li>
                                        <br>
                                        <li>V Care Pet Clinic <i>(4.6*/5)</i> 150 Feet Ring Road, <a href="tel:917046976300"> +917046976300</a></li>
                                        <br>
                                        <li>Om Veterinary Hospital <i>(4.5*/5)</i> University Road, <a href="tel:917942571296"> +917942571296</a></li>
                                        <br>
                                        <li>Dev Veterinary Clinic <i>(4.8*/5)</i> University Road, <a href="tel:917942571302"> +917942571302</a></li>
                                        <br>
                                        <li>Leo Dogs The Pet Store <i>(4.2*/5)</i> Nirmala Road, <a href="tel:917942571177"> +917942571177</a></li>
                                        <br>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>

    <?php
    require_once("footer.php");
    ?>

    <!-- loader -->
    <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
            <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
            <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00" />
        </svg></div>


    <script src="js/jquery.min.js"></script>
    <script src="js/jquery-migrate-3.0.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.easing.1.3.js"></script>
    <script src="js/jquery.waypoints.min.js"></script>
    <script src="js/jquery.stellar.min.js"></script>
    <script src="js/jquery.animateNumber.min.js"></script>
    <script src="js/bootstrap-datepicker.js"></script>
    <script src="js/jquery.timepicker.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/scrollax.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
    <script src="js/google-map.js"></script>
    <script src="js/main.js"></script>


</body>

</html>