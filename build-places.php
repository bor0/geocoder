<?php
printf( 'Fetching cities.json...' . PHP_EOL );

$cities = json_decode( file_get_contents( 'https://raw.githubusercontent.com/dr5hn/countries-states-cities-database/master/cities.json' ), true );

printf( 'Processing data...' . PHP_EOL );

$data = array();

foreach ( $cities as $city ) {
	$data[] = array(
		'city'    => $city['name'],
		'country' => $city['country_name'],
		'state'   => $city['state_name'],
		'lat'     => $city['latitude'],
		'lng'     => $city['longitude'],
	);
}

file_put_contents( 'places.json', json_encode( $data, JSON_UNESCAPED_UNICODE ) );
