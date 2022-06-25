<?php
namespace AIOSEO\Plugin\Addon\LocalBusiness\Utils;

use AIOSEO\Plugin\Common\Traits;

/**
 * Class that holds all internal options for AIOSEO.
 *
 * @since 1.1.0.2
 */
class InternalOptions {
	use Traits\Options;

	/**
	 * All the default options.
	 *
	 * @since 1.1.0.2
	 *
	 * @var array
	 */
	protected $defaults = [
		// phpcs:disable WordPress.Arrays.ArrayDeclarationSpacing.AssociativeArrayFound
		'internal' => [
			'lastActiveVersion' => [ 'type' => 'string', 'default' => '0.0' ]
		]
		// phpcs:enable WordPress.Arrays.ArrayDeclarationSpacing.AssociativeArrayFound
	];

	/**
	 * The Construct method.
	 *
	 * @since 1.1.0.2
	 *
	 * @param string $optionsName An array of options.
	 */
	public function __construct( $optionsName = 'aioseo_local_seo_options_internal' ) {
		$this->optionsName = is_network_admin() ? $optionsName . '_network' : $optionsName;

		$this->init();
	}

	/**
	 * Initializes the options.
	 *
	 * @since 1.1.0.2
	 *
	 * @return void
	 */
	protected function init() {
		// Options from the DB.
		$dbOptions = json_decode( get_option( $this->optionsName ), true );
		if ( empty( $dbOptions ) ) {
			$dbOptions = [];
		}

		// Refactor options.
		$this->defaultsMerged = array_replace_recursive( $this->defaults, $this->defaultsMerged );

		$options = array_replace_recursive(
			$this->defaultsMerged,
			$this->addValueToValuesArray( $this->defaultsMerged, $dbOptions )
		);

		$this->options = apply_filters( 'aioseo_get_local_seo_options_internal', $options );
	}

	/**
	 * Get all the deprecated options.
	 *
	 * @since 1.1.0.2
	 *
	 * @return void
	 */
	public function getAllDeprecatedOptions() {
		return $this->allDeprecatedOptions;
	}

	/**
	 * Sanitizes, then saves the options to the database.
	 *
	 * @since 1.1.0.2
	 *
	 * @param  array $options An array of options to sanitize, then save.
	 * @return void
	 */
	public function sanitizeAndSave( $options ) {
		if ( ! is_array( $options ) ) {
			return;
		}

		// Refactor options.
		$this->options = array_replace_recursive(
			$this->options,
			$this->addValueToValuesArray( $this->options, $options, [], true )
		);

		// Update values.
		$this->update();
	}
}