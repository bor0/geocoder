<?php
// This script unifies countries.json and cities.json into a single, easy to use file
$countries = json_decode( file_get_contents( 'https://raw.githubusercontent.com/annexare/Countries/master/data/countries.json' ), true );
$cities    = json_decode( file_get_contents( 'https://raw.githubusercontent.com/lutangar/cities.json/master/cities.json' ), true );

$data = array();

foreach ( $cities as $city ) {
	$data[] = array(
		'city'    => $city['name'],
		'country' => $countries[ $city['country'] ]['name'],
		'lat'     => $city['lat'],
		'lng'     => $city['lng'],
	);
}

file_put_contents( 'dataset.json', json_encode( $data, JSON_UNESCAPED_UNICODE ) );
