<?php

require_once 'vendor/autoload.php';

$google_client = new Google_Client();

$google_client->setClientId('305187804883-c31igcch4rqrv27gqadfmh177qa5feke.apps.googleusercontent.com');

$google_client->setClientSecret('-4WzbOIDjSU4q9eW7_wzAMDT');

$google_client->setRedirectUri('http://localhost/HotelBooking/home.php');

$google_client->addScope('email');

$google_client->addScope('profile');

?>