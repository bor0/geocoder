<?php
printf( 'Fetching countries.json...' . PHP_EOL );

$countries = json_decode( file_get_contents( 'https://raw.githubusercontent.com/dr5hn/countries-states-cities-database/master/countries.json' ), true );

printf( 'Processing data...' . PHP_EOL );

$data = array();

foreach ( $countries as $country ) {
	$continent = $country['region'];

	if ( empty( $continent ) ) {
		continue;
	}

	if ( in_array( $continent, array( 'Europe', 'Africa', 'Polar' ) ) ) {
		$continent = 'Europe - Africa';
	} elseif ( in_array( $continent, array( 'Americas' ) ) ) {
		$continent = 'Americas';
	} elseif ( in_array( $continent, array( 'Asia', 'Oceania' ) ) ) {
		$continent = 'Asia - Pacific';
	} else {
		printf( "Warning! Unspecified continent '%s' for '%s'" . PHP_EOL, $continent, $country['name'] );
		continue;
	}

	$data[ $country['name'] ] = $continent;
}

file_put_contents( 'continents.json', json_encode( $data, JSON_UNESCAPED_UNICODE ) );
