<?php
namespace AIOSEO\Plugin\Addon\LocalBusiness\Blocks;

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * The BusinessInfo block class.
 *
 * @since 1.1.0
 */
class BusinessInfo {
	/**
	 * Class constructor.
	 *
	 * @since 1.1.0
	 */
	public function __construct() {
		$this->register();
	}

	/**
	 * Registers the block.
	 *
	 * @since 1.1.0
	 *
	 * @return void
	 */
	public function register() {
		register_block_type(
			'aioseo/businessinfo', [
				'attributes'      => [
					'locationId'      => [
						'type'    => 'number',
						'default' => null,
					],
					'layout'          => [
						'type'    => 'string',
						'default' => 'classic',
					],
					'showLabels'      => [
						'type'    => 'boolean',
						'default' => true,
					],
					'showIcons'       => [
						'type'    => 'boolean',
						'default' => true,
					],
					'showName'        => [
						'type'    => 'boolean',
						'default' => true,
					],
					'showAddress'     => [
						'type'    => 'boolean',
						'default' => true,
					],
					'showPhone'       => [
						'type'    => 'boolean',
						'default' => true,
					],
					'showFax'         => [
						'type'    => 'boolean',
						'default' => true,
					],
					'showCountryCode' => [
						'type'    => 'boolean',
						'default' => true,
					],
					'showEmail'       => [
						'type'    => 'boolean',
						'default' => true,
					],
					'showVat'         => [
						'type'    => 'boolean',
						'default' => true,
					],
					'showTax'         => [
						'type'    => 'boolean',
						'default' => false,
					],
					'showChamberId'   => [
						'type'    => 'boolean',
						'default' => false,
					],
					'dataObject'      => [
						'type'    => 'string',
						'default' => null
					],
					'updated'         => [
						'type'    => 'string',
						'default' => time()
					]
				],
				'render_callback' => [ $this, 'render' ],
				'editor_style'    => 'aioseo-local-business-info'
			]
		);
	}

	/**
	 * Renders the block.
	 *
	 * @since 1.1.0
	 *
	 * @param  array  $blockAttributes The block attributes.
	 * @return string                  The output from the output buffering.
	 */
	public function render( $blockAttributes ) {
		$locationId = ! empty( $blockAttributes['locationId'] ) ? $blockAttributes['locationId'] : '';

		if ( $locationId ) {
			$location = aioseoLocalBusiness()->locations->getLocation( $locationId );
			if ( ! $location ) {
				return sprintf(
					__( 'Please fill in your Business Info for this %s.', 'aioseo-local-business' ),
					aioseoLocalBusiness()->postType->getSingleLabel()
				);
			}
		}

		ob_start();

		echo esc_html( aioseoLocalBusiness()->locations->outputBusinessInfo( $locationId, $blockAttributes ) );

		return ob_get_clean();
	}
}