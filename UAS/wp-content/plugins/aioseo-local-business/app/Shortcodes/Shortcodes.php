<?php
namespace AIOSEO\Plugin\Addon\LocalBusiness\Shortcodes;

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * The Shortcodes class.
 *
 * @since 1.1.0
 */
class Shortcodes {
	/**
	 * The shortcodes.
	 *
	 * @since 1.1.0
	 *
	 * @var string Array of shortcodes and callbacks.
	 */
	protected $shortcodes = [
		'aioseo_local_business_info' => 'businessInfo',
		'aioseo_local_locations'     => 'locations',
		'aioseo_local_opening_hours' => 'openingHours'
	];

	/**
	 * Class constructor.
	 *
	 * @since 1.1.0
	 */
	public function __construct() {
		foreach ( $this->shortcodes as $shortcode => $callback ) {
			add_shortcode( $shortcode, [ $this, $callback ] );
		}
	}

	/**
	 * Business info shortcode. Displays a location's business information.
	 *
	 * @since 1.1.0
	 *
	 * @param  array  $attr The shortcode attributes.
	 * @return string       The rendered shortcode.
	 */
	public function businessInfo( $attr = [] ) {
		$attr = wp_parse_args(
			$attr,
			[
				'location_id'       => '',
				'show_labels'       => true,
				'show_icons'        => true,
				'show_name'         => true,
				'show_address'      => true,
				'show_phone'        => true,
				'show_fax'          => true,
				'show_country_code' => true,
				'show_email'        => true,
				'show_vat'          => true,
				'show_tax'          => true,
				'show_chamber_id'   => true
			]
		);

		$attributes = [
			'locationId'      => $attr['location_id'],
			'showLabels'      => filter_var( $attr['show_labels'], FILTER_VALIDATE_BOOLEAN ),
			'showIcons'       => filter_var( $attr['show_icons'], FILTER_VALIDATE_BOOLEAN ),
			'showName'        => filter_var( $attr['show_name'], FILTER_VALIDATE_BOOLEAN ),
			'showAddress'     => filter_var( $attr['show_address'], FILTER_VALIDATE_BOOLEAN ),
			'showPhone'       => filter_var( $attr['show_phone'], FILTER_VALIDATE_BOOLEAN ),
			'showFax'         => filter_var( $attr['show_fax'], FILTER_VALIDATE_BOOLEAN ),
			'showCountryCode' => filter_var( $attr['show_country_code'], FILTER_VALIDATE_BOOLEAN ),
			'showEmail'       => filter_var( $attr['show_email'], FILTER_VALIDATE_BOOLEAN ),
			'showVat'         => filter_var( $attr['show_vat'], FILTER_VALIDATE_BOOLEAN ),
			'showTax'         => filter_var( $attr['show_tax'], FILTER_VALIDATE_BOOLEAN ),
			'showChamberId'   => filter_var( $attr['show_chamber_id'], FILTER_VALIDATE_BOOLEAN ),
		];

		ob_start();

		aioseoLocalBusiness()->locations->outputBusinessInfo( absint( $attributes['locationId'] ), $attributes );

		return ob_get_clean();
	}

	/**
	 * Locations shortcode. Displays a list of locations based on a location category.
	 *
	 * @since 1.1.0
	 *
	 * @param  array  $attr The shortcode attributes.
	 * @return string       The rendered shortcode.
	 */
	public function locations( $attr = [] ) {
		$attr = shortcode_atts( [ 'category_id' => '' ], $attr, 'aioseo_locations' );

		$attributes = [ 'categoryId' => $attr['category_id'] ];

		ob_start();

		aioseoLocalBusiness()->locations->outputLocationCategory( absint( $attributes['categoryId'] ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

		return ob_get_clean();
	}

	/**
	 * Opening hours shortcode. Displays a location's opening hours.
	 *
	 * @since 1.1.0
	 *
	 * @param  array  $attr The shortcode attributes.
	 * @return string       The rendered shortcode.
	 */
	public function openingHours( $attr = [] ) {
		$attr = wp_parse_args(
			$attr,
			[
				'location_id'    => '',
				'show_title'     => true,
				'show_icons'     => true,
				'show_monday'    => true,
				'show_tuesday'   => true,
				'show_wednesday' => true,
				'show_thursday'  => true,
				'show_friday'    => true,
				'show_saturday'  => true,
				'show_sunday'    => true
			]
		);

		$attributes = [
			'locationId'    => $attr['location_id'],
			'showTitle'     => filter_var( $attr['show_title'], FILTER_VALIDATE_BOOLEAN ),
			'showIcons'     => filter_var( $attr['show_icons'], FILTER_VALIDATE_BOOLEAN ),
			'showMonday'    => filter_var( $attr['show_monday'], FILTER_VALIDATE_BOOLEAN ),
			'showTuesday'   => filter_var( $attr['show_tuesday'], FILTER_VALIDATE_BOOLEAN ),
			'showWednesday' => filter_var( $attr['show_wednesday'], FILTER_VALIDATE_BOOLEAN ),
			'showThursday'  => filter_var( $attr['show_thursday'], FILTER_VALIDATE_BOOLEAN ),
			'showFriday'    => filter_var( $attr['show_friday'], FILTER_VALIDATE_BOOLEAN ),
			'showSaturday'  => filter_var( $attr['show_saturday'], FILTER_VALIDATE_BOOLEAN ),
			'showSunday'    => filter_var( $attr['show_sunday'], FILTER_VALIDATE_BOOLEAN )
		];

		ob_start();

		aioseoLocalBusiness()->locations->outputOpeningHours( absint( $attributes['locationId'] ), $attributes ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

		return ob_get_clean();
	}
}