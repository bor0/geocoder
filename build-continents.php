<?php
$countries = json_decode( file_get_contents( 'https://raw.githubusercontent.com/annexare/Countries/master/data/countries.json' ), true );

$data = array();
foreach ( $countries as $country ) {
	$continent = $country['continent'];
	if ( in_array( $continent, array( 'EU', 'AF', 'AN' ) ) ) {
		$continent = 'Europe - Africa';
	}
	if ( in_array( $continent, array( 'SA', 'NA' ) ) ) {
		$continent = 'Americas';
	}
	if ( in_array( $continent, array( 'AS', 'OC' ) ) ) {
		$continent = 'Asia - Pacific';
	}
	$data[ $country['name'] ] = $continent;
}

file_put_contents( 'continents.json', json_encode( $data, JSON_UNESCAPED_UNICODE ) );
