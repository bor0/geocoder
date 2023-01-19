<?php
if ( ! file_exists( 'dataset.json' ) ) {
	exit( "Filename dataset.json doesn't exist. Run build-dataset.php first.\n" );
}

$x = file_get_contents( 'dataset.json' );
$x = json_decode( $x );

$arr = '<?php' . PHP_EOL . 'return array(' . PHP_EOL;
foreach ( $x as $foo ) {
	$arr .= sprintf( '  array( "%s", "%s", "%s" ),', $foo->name, $foo->lat, $foo->lng ) . PHP_EOL;
}
$arr .= ');';

file_put_contents( 'dataset.php', $arr );
