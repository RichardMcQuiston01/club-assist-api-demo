<?php

require_once "ClubAssist.php";

$makes = ClubAssist::get_makes();
$models = ClubAssist::get_models();

echo '<pre>';
print_r( $makes );
//print_r($models);

echo '</pre>';

echo urlencode( "V6 3.0L" );