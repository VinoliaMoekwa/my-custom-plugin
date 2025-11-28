<?php

/** @var array $entry */
/** @var array $form */
/*
/**
 * Template Name: My Custom Template
 * Version: 1.0
 * Description: Custom PDF layout for event tickets.
 * Author: Vinolia Moekwa
 * Group: Custom Templates
 * Required PDF Version: 6.0
 */



if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // Exit if accessed directly

// Get entry data
$event_name      = rgar( $entry, '3' ); // Event Selection Field ID
$registrant_name = rgar( $entry, '1.3' ) . ' ' . rgar( $entry, '1.6' ); // First + Last Name
$attendees       = rgar( $entry, '7' ); // Number of Attendees
$addons          = rgar( $entry, '8' ); // Add-ons field
$entry_url       = GFCommon::get_base_url() . '?entry=' . $entry['id']; // URL for QR code
