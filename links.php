<link href="https://fonts.googleapis.com/css?family=Montserrat:200,300,400,500,600,700,800&display=swap" rel="stylesheet">

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<link rel="stylesheet" href="css/animate.css">

<link rel="stylesheet" href="css/owl.carousel.min.css">
<link rel="stylesheet" href="css/owl.theme.default.min.css">
<link rel="stylesheet" href="css/magnific-popup.css">


<link rel="stylesheet" href="css/bootstrap-datepicker.css">
<link rel="stylesheet" href="css/jquery.timepicker.css">

<link rel="stylesheet" href="css/flaticon.css">
<link rel="stylesheet" href="css/style.css">
<link rel="icon" type="image/x-icon" href="images/favicon.png">

<?php
    require_once("classes/Client.class.php");

    $contactResult = $client->getContactUS();

    while($contactRow = $contactResult->fetch_assoc()){
        $contactperson = $contactRow["contactperson"];
        $phone1 = $contactRow["phone1"];
        $phone2 = $contactRow["phone2"];
        $email1 = $contactRow["email1"];
        $email2 = $contactRow["email2"];
        $address = $contactRow["address"];
        $googlemap = $contactRow["googlemap"];
    }

    $SocialResult = $client->getSocialMedia();

    while($SocialRow = $SocialResult->fetch_assoc()){
        $facebook = $SocialRow["facebook"];
        $twitter = $SocialRow["twitter"];
        $instagram = $SocialRow["instagram"];
        $youtube = $SocialRow["youtube"];
        $whatsapp = $SocialRow["whatsapp"];
        $snapchat = $SocialRow["snapchat"];
        $telegram = $SocialRow["telegram"];
    }
?>