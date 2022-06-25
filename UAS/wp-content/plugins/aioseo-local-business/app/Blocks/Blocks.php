<?php
namespace AIOSEO\Plugin\Addon\LocalBusiness\Blocks;

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * The blocks class.
 *
 * @since 1.1.0
 */
class Blocks extends \AIOSEO\Plugin\Common\Utils\Blocks {
	/**
	 * Instance of the BusinessInfo block class.
	 *
	 * @since 1.1.0
	 *
	 * @var BusinessInfo
	 */
	public $businessInfo;

	/**
	 * Instance of the Locations block class.
	 *
	 * @since 1.1.0
	 *
	 * @var Locations
	 */
	public $locations;

	/**
	 * Instance of the Opening Hours block class.
	 *
	 * @since 1.1.0
	 *
	 * @var OpeningHours
	 */
	public $openingHours;

	/**
	 * Instance of the Location Categories block class.
	 *
	 * @since 1.1.1
	 *
	 * @var LocationCategories
	 */
	public $locationCategories;

	/**
	 * Initializes our blocks.
	 *
	 * @since 1.1.0
	 *
	 * @return void
	 */
	public function register() {
		$this->businessInfo       = new BusinessInfo();
		$this->locations          = new Locations();
		$this->openingHours       = new OpeningHours();
		$this->locationCategories = new LocationCategories();
	}
}