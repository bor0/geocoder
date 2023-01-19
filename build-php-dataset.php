<?php
if ( ! file_exists( 'dataset.json' ) ) {
	exit( "Filename dataset.json doesn't exist. Run build-dataset.php first.\n" );
}

$data = file_get_contents( 'dataset.json' );
$data = json_decode( $data );

$arr = '<?php' . PHP_EOL . 'return array(' . PHP_EOL;
foreach ( $data as $entry ) {
	$arr .= sprintf( '  array( "%s", "%s", "%s", "%s" ),', $entry->city, $entry->country, $entry->lat, $entry->lng ) . PHP_EOL;
}
$arr .= ');';

file_put_contents( 'dataset.php', $arr );
