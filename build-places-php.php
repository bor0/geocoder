<?php
if ( ! file_exists( 'places.json' ) ) {
	exit( "Filename places.json doesn't exist. Run build-places.php first.\n" );
}

$data = file_get_contents( 'places.json' );
$data = json_decode( $data );

$arr = '<?php' . PHP_EOL . 'return array(' . PHP_EOL;
foreach ( $data as $entry ) {
	$arr .= sprintf( '  array( "city" => "%s", "country" => "%s", "lat" => "%s", "lng" => "%s" ),', $entry->city, $entry->country, $entry->lat, $entry->lng ) . PHP_EOL;
}
$arr .= ');';

file_put_contents( 'places.php', $arr );
