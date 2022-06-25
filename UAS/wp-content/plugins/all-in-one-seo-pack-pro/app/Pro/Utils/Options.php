<?php
namespace AIOSEO\Plugin\Pro\Utils;

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use AIOSEO\Plugin\Common\Models;
use AIOSEO\Plugin\Common\Utils as CommonUtils;

/**
 * Class that holds all options for AIOSEO.
 *
 * @since 4.0.0
 */
class Options extends CommonUtils\Options {
	/**
	 * Defaults options for Pro.
	 *
	 * @since 4.0.0
	 *
	 * @var array
	 */
	private $proDefaults = [
		// phpcs:disable WordPress.Arrays.ArrayDeclarationSpacing.AssociativeArrayFound
		'internal'         => [],
		'general'          => [
			'licenseKey' => [ 'type' => 'string' ]
		],
		'breadcrumbs'      => [
			'dynamic'  => [
				'postTypes'  => [],
				'taxonomies' => [],
				'archives'   => [
					'postTypes' => [],
					'date'      => [],
					'search'    => [],
					'notFound'  => [],
					'author'    => []
				]
			],
			'advanced' => [
				'taxonomySkipUnselected' => [ 'type' => 'boolean', 'default' => false ],
				'showPaged'              => [ 'type' => 'boolean', 'default' => true ],
				'pagedFormat'            => [ 'type' => 'string', 'default' => 'Page #breadcrumb_format_page_number', 'localized' => true ]
			]
		],
		'accessControl'    => [
			// Admin Access Controls.
			'administrator' => [
				'useDefault'               => [ 'type' => 'boolean', 'default' => true ],
				'dashboard'                => [ 'type' => 'boolean', 'default' => true ],
				'generalSettings'          => [ 'type' => 'boolean', 'default' => true ],
				'searchAppearanceSettings' => [ 'type' => 'boolean', 'default' => true ],
				'socialNetworksSettings'   => [ 'type' => 'boolean', 'default' => true ],
				'sitemapSettings'          => [ 'type' => 'boolean', 'default' => true ],
				'redirectsSettings'        => [ 'type' => 'boolean', 'default' => true ],
				'seoAnalysisSettings'      => [ 'type' => 'boolean', 'default' => true ],
				'toolsSettings'            => [ 'type' => 'boolean', 'default' => true ],
				'featureManagerSettings'   => [ 'type' => 'boolean', 'default' => true ],
				'pageAnalysis'             => [ 'type' => 'boolean', 'default' => true ],
				'pageGeneralSettings'      => [ 'type' => 'boolean', 'default' => true ],
				'pageAdvancedSettings'     => [ 'type' => 'boolean', 'default' => true ],
				'pageSchemaSettings'       => [ 'type' => 'boolean', 'default' => true ],
				'pageSocialSettings'       => [ 'type' => 'boolean', 'default' => true ],
				'localSeoSettings'         => [ 'type' => 'boolean', 'default' => true ],
				'pageLocalSeoSettings'     => [ 'type' => 'boolean', 'default' => true ],
				'setupWizard'              => [ 'type' => 'boolean', 'default' => true ]
			],
			// Editor Access Controls.
			'editor'        => [
				'useDefault'               => [ 'type' => 'boolean', 'default' => true ],
				'dashboard'                => [ 'type' => 'boolean', 'default' => false ],
				'generalSettings'          => [ 'type' => 'boolean', 'default' => true ],
				'searchAppearanceSettings' => [ 'type' => 'boolean', 'default' => true ],
				'socialNetworksSettings'   => [ 'type' => 'boolean', 'default' => true ],
				'sitemapSettings'          => [ 'type' => 'boolean', 'default' => false ],
				'redirectsSettings'        => [ 'type' => 'boolean', 'default' => false ],
				'seoAnalysisSettings'      => [ 'type' => 'boolean', 'default' => false ],
				'toolsSettings'            => [ 'type' => 'boolean', 'default' => false ],
				'featureManagerSettings'   => [ 'type' => 'boolean', 'default' => false ],
				'pageAnalysis'             => [ 'type' => 'boolean', 'default' => true ],
				'pageGeneralSettings'      => [ 'type' => 'boolean', 'default' => true ],
				'pageAdvancedSettings'     => [ 'type' => 'boolean', 'default' => true ],
				'pageSchemaSettings'       => [ 'type' => 'boolean', 'default' => true ],
				'pageSocialSettings'       => [ 'type' => 'boolean', 'default' => true ],
				'localSeoSettings'         => [ 'type' => 'boolean', 'default' => false ],
				'pageLocalSeoSettings'     => [ 'type' => 'boolean', 'default' => false ],
				'setupWizard'              => [ 'type' => 'boolean', 'default' => false ]
			],
			// Author Access Controls.
			'author'        => [
				'useDefault'               => [ 'type' => 'boolean', 'default' => true ],
				'dashboard'                => [ 'type' => 'boolean', 'default' => false ],
				'generalSettings'          => [ 'type' => 'boolean', 'default' => false ],
				'searchAppearanceSettings' => [ 'type' => 'boolean', 'default' => false ],
				'socialNetworksSettings'   => [ 'type' => 'boolean', 'default' => false ],
				'sitemapSettings'          => [ 'type' => 'boolean', 'default' => false ],
				'redirectsSettings'        => [ 'type' => 'boolean', 'default' => false ],
				'seoAnalysisSettings'      => [ 'type' => 'boolean', 'default' => false ],
				'toolsSettings'            => [ 'type' => 'boolean', 'default' => false ],
				'featureManagerSettings'   => [ 'type' => 'boolean', 'default' => false ],
				'pageAnalysis'             => [ 'type' => 'boolean', 'default' => true ],
				'pageGeneralSettings'      => [ 'type' => 'boolean', 'default' => true ],
				'pageAdvancedSettings'     => [ 'type' => 'boolean', 'default' => true ],
				'pageSchemaSettings'       => [ 'type' => 'boolean', 'default' => true ],
				'pageSocialSettings'       => [ 'type' => 'boolean', 'default' => true ],
				'localSeoSettings'         => [ 'type' => 'boolean', 'default' => false ],
				'pageLocalSeoSettings'     => [ 'type' => 'boolean', 'default' => false ],
				'setupWizard'              => [ 'type' => 'boolean', 'default' => false ]
			],
			// SEO Manager Access Controls.
			'seoManager'    => [
				'useDefault'               => [ 'type' => 'boolean', 'default' => true ],
				'dashboard'                => [ 'type' => 'boolean', 'default' => true ],
				'generalSettings'          => [ 'type' => 'boolean', 'default' => true ],
				'searchAppearanceSettings' => [ 'type' => 'boolean', 'default' => false ],
				'socialNetworksSettings'   => [ 'type' => 'boolean', 'default' => false ],
				'sitemapSettings'          => [ 'type' => 'boolean', 'default' => true ],
				'redirectsSettings'        => [ 'type' => 'boolean', 'default' => true ],
				'seoAnalysisSettings'      => [ 'type' => 'boolean', 'default' => false ],
				'toolsSettings'            => [ 'type' => 'boolean', 'default' => false ],
				'featureManagerSettings'   => [ 'type' => 'boolean', 'default' => false ],
				'pageAnalysis'             => [ 'type' => 'boolean', 'default' => true ],
				'pageGeneralSettings'      => [ 'type' => 'boolean', 'default' => true ],
				'pageAdvancedSettings'     => [ 'type' => 'boolean', 'default' => true ],
				'pageSchemaSettings'       => [ 'type' => 'boolean', 'default' => true ],
				'pageSocialSettings'       => [ 'type' => 'boolean', 'default' => true ],
				'localSeoSettings'         => [ 'type' => 'boolean', 'default' => true ],
				'pageLocalSeoSettings'     => [ 'type' => 'boolean', 'default' => true ],
				'setupWizard'              => [ 'type' => 'boolean', 'default' => true ]
			],
			// SEO Editor Access Controls.
			'seoEditor'     => [
				'useDefault'               => [ 'type' => 'boolean', 'default' => true ],
				'dashboard'                => [ 'type' => 'boolean', 'default' => false ],
				'generalSettings'          => [ 'type' => 'boolean', 'default' => false ],
				'searchAppearanceSettings' => [ 'type' => 'boolean', 'default' => false ],
				'socialNetworksSettings'   => [ 'type' => 'boolean', 'default' => false ],
				'sitemapSettings'          => [ 'type' => 'boolean', 'default' => false ],
				'redirectsSettings'        => [ 'type' => 'boolean', 'default' => false ],
				'seoAnalysisSettings'      => [ 'type' => 'boolean', 'default' => false ],
				'toolsSettings'            => [ 'type' => 'boolean', 'default' => false ],
				'featureManagerSettings'   => [ 'type' => 'boolean', 'default' => false ],
				'pageAnalysis'             => [ 'type' => 'boolean', 'default' => true ],
				'pageGeneralSettings'      => [ 'type' => 'boolean', 'default' => true ],
				'pageAdvancedSettings'     => [ 'type' => 'boolean', 'default' => true ],
				'pageSchemaSettings'       => [ 'type' => 'boolean', 'default' => true ],
				'pageSocialSettings'       => [ 'type' => 'boolean', 'default' => true ],
				'localSeoSettings'         => [ 'type' => 'boolean', 'default' => false ],
				'pageLocalSeoSettings'     => [ 'type' => 'boolean', 'default' => true ],
				'setupWizard'              => [ 'type' => 'boolean', 'default' => false ]
			],
			// Dynamic Access Controls.
			'dynamic'       => []
		],
		'advanced'         => [
			'adminBarMenu'  => [ 'type' => 'boolean', 'default' => true ],
			'usageTracking' => [ 'type' => 'boolean', 'default' => true ],
			'autoUpdates'   => [ 'type' => 'string', 'default' => 'all' ]
		],
		'sitemap'          => [
			'video' => [
				'enable'           => [ 'type' => 'boolean', 'default' => true ],
				'filename'         => [ 'type' => 'string', 'default' => 'video-sitemap' ],
				'indexes'          => [ 'type' => 'boolean', 'default' => true ],
				'linksPerIndex'    => [ 'type' => 'number', 'default' => 1000 ],
				// @TODO: [V4+] Convert this to the dynamic options like in search appearance so we can have backups when plugins are deactivated.
				'postTypes'        => [
					'all'      => [ 'type' => 'boolean', 'default' => true ],
					'included' => [ 'type' => 'array', 'default' => [ 'post', 'page', 'attachment' ] ],
				],
				'taxonomies'       => [
					'all'      => [ 'type' => 'boolean', 'default' => true ],
					'included' => [ 'type' => 'array', 'default' => [ 'product_cat', 'product_tag' ] ],
				],
				/*'embed'            => [
					'playDirectly' => [ 'type' => 'boolean', 'default' => true ],
					'responsive'   => [ 'type' => 'boolean', 'default' => false ],
					'width'        => [ 'type' => 'integer' ],
					'wistia'       => [ 'type' => 'string' ],
					'embedlyApi'   => [ 'type' => 'string' ]
				], */
				'additionalPages'  => [
					'enable' => [ 'type' => 'boolean', 'default' => false ],
					'pages'  => [ 'type' => 'array', 'default' => [] ]
				],
				'advancedSettings' => [
					'enable'       => [ 'type' => 'boolean', 'default' => false ],
					'excludePosts' => [ 'type' => 'array', 'default' => [] ],
					'excludeTerms' => [ 'type' => 'array', 'default' => [] ],
					'dynamic'      => [ 'type' => 'boolean', 'default' => true ],
					'customFields' => [ 'type' => 'boolean', 'default' => false ],
				]
			],
			'news'  => [
				'enable'           => [ 'type' => 'boolean', 'default' => true ],
				'publicationName'  => [ 'type' => 'string' ],
				'genre'            => [ 'type' => 'string' ],
				// @TODO: [V4+] Convert this to the dynamic options like in search appearance so we can have backups when plugins are deactivated.
				'postTypes'        => [
					'all'      => [ 'type' => 'boolean', 'default' => false ],
					'included' => [ 'type' => 'array', 'default' => [ 'post' ] ],
				],
				'additionalPages'  => [
					'enable' => [ 'type' => 'boolean', 'default' => false ],
					'pages'  => [ 'type' => 'array', 'default' => [] ]
				],
				'advancedSettings' => [
					'enable'       => [ 'type' => 'boolean', 'default' => false ],
					'excludePosts' => [ 'type' => 'array', 'default' => [] ],
					'priority'     => [
						'homePage'   => [
							'priority'  => [ 'type' => 'string', 'default' => '{"label":"default","value":"default"}' ],
							'frequency' => [ 'type' => 'string', 'default' => '{"label":"default","value":"default"}' ]
						],
						'postTypes'  => [
							'priority'  => [ 'type' => 'string', 'default' => '{"label":"default","value":"default"}' ],
							'frequency' => [ 'type' => 'string', 'default' => '{"label":"default","value":"default"}' ]
						],
						'taxonomies' => [
							'priority'  => [ 'type' => 'string', 'default' => '{"label":"default","value":"default"}' ],
							'frequency' => [ 'type' => 'string', 'default' => '{"label":"default","value":"default"}' ]
						]
					]
				]
			],
		],
		'social'           => [
			'facebook' => [
				'general' => [
					'defaultImageSourceTerms' => [ 'type' => 'string', 'default' => 'default' ],
					'customFieldImageTerms'   => [ 'type' => 'string' ],
					'defaultImageTerms'       => [ 'type' => 'string', 'default' => '' ],
					'defaultImageTermsWidth'  => [ 'type' => 'number', 'default' => '' ],
					'defaultImageTermsHeight' => [ 'type' => 'number', 'default' => '' ]
				],
			],
			'twitter'  => [
				'general' => [
					'defaultImageSourceTerms' => [ 'type' => 'string', 'default' => 'default' ],
					'customFieldImageTerms'   => [ 'type' => 'string' ],
					'defaultImageTerms'       => [ 'type' => 'string', 'default' => '' ]
				],
			]
		],
		'searchAppearance' => [
			'advanced' => [
				'removeCatBase'       => [ 'type' => 'boolean', 'default' => false ],
				'autoAddImageAltTags' => [ 'type' => 'boolean', 'default' => false ],
			]
		],
		'image'            => [
			'format'           => [
				'title'  => [ 'type' => 'string', 'default' => '#image_title #separator_sa #site_title', 'localized' => true ],
				'altTag' => [ 'type' => 'string', 'default' => '#alt_tag', 'localized' => true ]
			],
			'stripPunctuation' => [
				'title'  => [ 'type' => 'boolean', 'default' => false ],
				'altTag' => [ 'type' => 'boolean', 'default' => false ]
			]
		],
		'localBusiness'    => [
			'locations'    => [
				'general'  => [
					'multiple'              => [ 'type' => 'boolean', 'default' => false ],
					'display'               => [ 'type' => 'string' ],
					'singleLabel'           => [ 'type' => 'string' ],
					'pluralLabel'           => [ 'type' => 'string' ],
					'permalink'             => [ 'type' => 'string' ],
					'categoryPermalink'     => [ 'type' => 'string' ],
					'useCustomSlug'         => [ 'type' => 'boolean', 'default' => false ],
					'customSlug'            => [ 'type' => 'string' ],
					'useCustomCategorySlug' => [ 'type' => 'boolean', 'default' => false ],
					'customCategorySlug'    => [ 'type' => 'string' ],
					'enhancedSearch'        => [ 'type' => 'boolean', 'default' => false ],
					'enhancedSearchExcerpt' => [ 'type' => 'boolean', 'default' => false ],
				],
				'business' => [
					'name'         => [ 'type' => 'string' ],
					'businessType' => [ 'type' => 'string', 'default' => 'LocalBusiness' ],
					'image'        => [ 'type' => 'string' ],
					'areaServed'   => [ 'type' => 'string' ],
					'urls'         => [
						'website'     => [ 'type' => 'string' ],
						'aboutPage'   => [ 'type' => 'string' ],
						'contactPage' => [ 'type' => 'string' ]
					],
					'address'      => [
						'streetLine1'   => [ 'type' => 'string' ],
						'streetLine2'   => [ 'type' => 'string' ],
						'zipCode'       => [ 'type' => 'string' ],
						'city'          => [ 'type' => 'string' ],
						'state'         => [ 'type' => 'string' ],
						'country'       => [ 'type' => 'string' ],
						'addressFormat' => [ 'type' => 'html' ]
					],
					'contact'      => [
						'email'          => [ 'type' => 'string' ],
						'phone'          => [ 'type' => 'string' ],
						'phoneFormatted' => [ 'type' => 'string' ],
						'fax'            => [ 'type' => 'string' ],
						'faxFormatted'   => [ 'type' => 'string' ]
					],
					'ids'          => [
						'vat'               => [ 'type' => 'string' ],
						'tax'               => [ 'type' => 'string' ],
						'chamberOfCommerce' => [ 'type' => 'string' ]
					],
					'payment'      => [
						'priceRange'         => [ 'type' => 'string' ],
						'currenciesAccepted' => [ 'type' => 'string' ],
						'methods'            => [ 'type' => 'string' ]
					]
				]
			],
			'openingHours' => [
				'show'         => [ 'type' => 'boolean', 'default' => true ],
				'display'      => [ 'type' => 'string' ],
				'alwaysOpen'   => [ 'type' => 'boolean', 'default' => false ],
				'use24hFormat' => [ 'type' => 'boolean', 'default' => false ],
				'timezone'     => [ 'type' => 'string' ],
				'labels'       => [
					'closed'     => [ 'type' => 'string' ],
					'alwaysOpen' => [ 'type' => 'string' ]
				],
				'days'         => [
					'monday'    => [
						'open24h'   => [ 'type' => 'boolean', 'default' => false ],
						'closed'    => [ 'type' => 'boolean', 'default' => false ],
						'openTime'  => [ 'type' => 'string', 'default' => '09:00' ],
						'closeTime' => [ 'type' => 'string', 'default' => '17:00' ]
					],
					'tuesday'   => [
						'open24h'   => [ 'type' => 'boolean', 'default' => false ],
						'closed'    => [ 'type' => 'boolean', 'default' => false ],
						'openTime'  => [ 'type' => 'string', 'default' => '09:00' ],
						'closeTime' => [ 'type' => 'string', 'default' => '17:00' ]
					],
					'wednesday' => [
						'open24h'   => [ 'type' => 'boolean', 'default' => false ],
						'closed'    => [ 'type' => 'boolean', 'default' => false ],
						'openTime'  => [ 'type' => 'string', 'default' => '09:00' ],
						'closeTime' => [ 'type' => 'string', 'default' => '17:00' ]
					],
					'thursday'  => [
						'open24h'   => [ 'type' => 'boolean', 'default' => false ],
						'closed'    => [ 'type' => 'boolean', 'default' => false ],
						'openTime'  => [ 'type' => 'string', 'default' => '09:00' ],
						'closeTime' => [ 'type' => 'string', 'default' => '17:00' ]
					],
					'friday'    => [
						'open24h'   => [ 'type' => 'boolean', 'default' => false ],
						'closed'    => [ 'type' => 'boolean', 'default' => false ],
						'openTime'  => [ 'type' => 'string', 'default' => '09:00' ],
						'closeTime' => [ 'type' => 'string', 'default' => '17:00' ]
					],
					'saturday'  => [
						'open24h'   => [ 'type' => 'boolean', 'default' => false ],
						'closed'    => [ 'type' => 'boolean', 'default' => false ],
						'openTime'  => [ 'type' => 'string', 'default' => '09:00' ],
						'closeTime' => [ 'type' => 'string', 'default' => '17:00' ]
					],
					'sunday'    => [
						'open24h'   => [ 'type' => 'boolean', 'default' => false ],
						'closed'    => [ 'type' => 'boolean', 'default' => false ],
						'openTime'  => [ 'type' => 'string', 'default' => '09:00' ],
						'closeTime' => [ 'type' => 'string', 'default' => '17:00' ]
					]
				]
			]
		],
		'deprecated'       => [
			'sitemap'        => [
				'video' => [
					'advancedSettings' => [
						'dynamic' => [ 'type' => 'boolean', 'default' => false ],
					],
				]
			],
			'webmasterTools' => [
				'googleAnalytics' => [
					'trackOutboundForms' => [ 'type' => 'boolean', 'default' => false ],
					'trackEvents'        => [ 'type' => 'boolean', 'default' => false ],
					'trackUrlChanges'    => [ 'type' => 'boolean', 'default' => false ],
					'trackVisibility'    => [ 'type' => 'boolean', 'default' => false ],
					'trackMediaQueries'  => [ 'type' => 'boolean', 'default' => false ],
					'trackImpressions'   => [ 'type' => 'boolean', 'default' => false ],
					'trackScrollbar'     => [ 'type' => 'boolean', 'default' => false ],
					'trackSocial'        => [ 'type' => 'boolean', 'default' => false ],
					'trackCleanUrl'      => [ 'type' => 'boolean', 'default' => false ],
					'gtmContainerId'     => [ 'type' => 'string' ]
				],
			],
		]
		// phpcs:enable WordPress.Arrays.ArrayDeclarationSpacing.AssociativeArrayFound
	];

	/**
	 * Class constructor
	 *
	 * @since 4.0.0
	 */
	public function __construct( $optionsName = 'aioseo_options' ) {
		parent::__construct( $optionsName );

		$this->init();

		// Now that we are initialized, let's run an update routine.
		$validLicenseKey = aioseo()->internalOptions->internal->validLicenseKey;
		if ( $validLicenseKey ) {
			$this->general->licenseKey                           = $validLicenseKey;
			aioseo()->internalOptions->internal->validLicenseKey = null;
		}
	}

	/**
	 * Initializes the options.
	 *
	 * @since 4.0.0
	 *
	 * @param  boolean $resetKeys Whether or not to reset keys after init.
	 * @return void
	 */
	protected function init( $resetKeys = false ) {
		if ( $resetKeys ) {
			$originalGroupKey  = $this->groupKey;
			$originalSubGroups = $this->subGroups;
		}

		parent::init();

		$dbOptions = json_decode( get_option( $this->optionsName . '_pro' ), true );
		if ( empty( $dbOptions ) ) {
			$dbOptions = [];
		}

		// Refactor options.
		$this->defaultsMerged = array_replace_recursive( $this->defaults, $this->proDefaults );

		$options = array_replace_recursive(
			$this->options,
			$this->addValueToValuesArray( $this->options, $dbOptions )
		);

		$this->options = apply_filters( 'aioseo_get_options_pro', $options );

		if ( $resetKeys ) {
			$this->groupKey  = $originalGroupKey;
			$this->subGroups = $originalSubGroups;
		}
	}

	/**
	 * Merge defaults with proDefaults.
	 *
	 * @since 4.1.3
	 *
	 * @return array An array of dafults.
	 */
	public function getDefaults() {
		return array_replace_recursive( parent::getDefaults(), $this->proDefaults );
	}

	/**
	 * licenseKeys the options in the database.
	 *
	 * @since 4.0.0
	 *
	 * @param  array|null $options An optional options array.
	 * @return void
	 */
	public function update( $options = null ) {
		// We're creating a new object here because it was setting it by reference.
		$optionsBefore = json_decode( wp_json_encode( $this->options ), true );
		parent::update( $options );
		$this->options = $optionsBefore;

		// First, we need to filter our options.
		$options = $this->filterOptions( $this->proDefaults );

		// Refactor options.
		$refactored = $this->convertOptionsToValues( $options );

		$this->resetGroups();

		update_option( $this->optionsName . '_pro', wp_json_encode( $refactored ) );

		if ( ! $this->needsUpdate ) {
			$this->init();
		}
	}

	/**
	 * For our defaults array, some options need to be translated, so we do that here.
	 *
	 * @since 4.1.1
	 *
	 * @return void
	 */
	public function translateDefaults() {
		parent::translateDefaults();

		$this->proDefaults['breadcrumbs']['advanced']['pagedFormat']['default'] = sprintf( '%1$s #breadcrumb_format_page_number', __( 'Page', 'all-in-one-seo-pack' ) );
	}

	/**
	 * Sanitizes, then saves the options to the database.
	 *
	 * @since 4.0.0
	 *
	 * @param  array $options An array of options to sanitize, then save.
	 * @return void
	 */
	public function sanitizeAndSave( $options ) {
		$videoOptions           = ! empty( $options['sitemap'] ) && ! empty( $options['sitemap']['video'] ) ? $options['sitemap']['video'] : null;
		$deprecatedOldOptions   = aioseo()->options->deprecated->sitemap->video->all();
		$deprecatedVideoOptions = ! empty( $options['deprecated'] ) &&
			! empty( $options['deprecated']['sitemap'] ) &&
			! empty( $options['deprecated']['sitemap']['video'] )
				? $options['deprecated']['sitemap']['video']
				: null;
		$newsOptions        = ! empty( $options['sitemap'] ) && ! empty( $options['sitemap']['news'] ) ? $options['sitemap']['news'] : null;
		$oldPhoneOption     = aioseo()->options->localBusiness->locations->business->contact->phone;
		$phoneNumberOptions = ! empty( $options['localBusiness'] ) &&
			! empty( $options['localBusiness']['locations'] ) &&
			! empty( $options['localBusiness']['locations']['business'] ) &&
			! empty( $options['localBusiness']['locations']['business']['contact'] ) &&
			isset( $options['localBusiness']['locations']['business']['contact']['phone'] )
				? $options['localBusiness']['locations']['business']['contact']['phone']
				: null;
		$oldCountryOption = aioseo()->options->localBusiness->locations->business->address->country;
		$countryOption    = ! empty( $options['localBusiness'] ) &&
			! empty( $options['localBusiness']['locations'] ) &&
			! empty( $options['localBusiness']['locations']['business'] ) &&
			! empty( $options['localBusiness']['locations']['business']['address'] ) &&
			isset( $options['localBusiness']['locations']['business']['address']['country'] )
				? $options['localBusiness']['locations']['business']['address']['country']
				: null;

		// Local business - multiple locations.
		// Changes that require reload.
		$requireReload = [ 'multiple', 'singleLabel', 'pluralLabel' ];
		foreach ( $requireReload as $item ) {
			if (
				isset( $options['localBusiness']['locations']['general'][ $item ] ) &&
				aioseo()->options->localBusiness->locations->general->{$item} !== $options['localBusiness']['locations']['general'][ $item ]
			) {
				aioseo()->options->setRedirection( 'reload' );
				break;
			}
		}

		// Changes that require flush_rewrite_rules().
		$requireRewrite = [
			'multiple',
			'useCustomSlug',
			'customSlug',
			'useCustomCategorySlug',
			'customCategorySlug'
		];
		foreach ( $requireRewrite as $item ) {
			if (
				isset( $options['localBusiness']['locations']['general'][ $item ] ) &&
				aioseo()->options->localBusiness->locations->general->{$item} !== $options['localBusiness']['locations']['general'][ $item ]
			) {
				aioseo()->options->flushRewriteRules();
				break;
			}
		}

		parent::sanitizeAndSave( $options );

		aioseo()->dynamicBackup->maybeBackup( $this->options );

		if ( $videoOptions ) {
			$this->options['sitemap']['video']['postTypes']['included']['value']            = $this->sanitizeField( $options['sitemap']['video']['postTypes']['included'], 'array' );
			$this->options['sitemap']['video']['taxonomies']['included']['value']           = $this->sanitizeField( $options['sitemap']['video']['taxonomies']['included'], 'array' );
			$this->options['sitemap']['video']['advancedSettings']['excludePosts']['value'] = $this->sanitizeField( $options['sitemap']['video']['advancedSettings']['excludePosts'], 'array' );
			$this->options['sitemap']['video']['advancedSettings']['excludeTerms']['value'] = $this->sanitizeField( $options['sitemap']['video']['advancedSettings']['excludeTerms'], 'array' );
		}

		if ( $newsOptions ) {
			$this->options['sitemap']['news']['postTypes']['included']['value']            = $this->sanitizeField( $options['sitemap']['news']['postTypes']['included'], 'array' );
			$this->options['sitemap']['news']['advancedSettings']['excludePosts']['value'] = $this->sanitizeField( $options['sitemap']['news']['advancedSettings']['excludePosts'], 'array' );
		}

		$this->update();

		// If sitemap settings were changed, static files need to be regenerated.
		if (
			! empty( $deprecatedVideoOptions ) &&
			! empty( $videoOptions ) &&
			aioseo()->helpers->arraysDifferent( $deprecatedOldOptions, $deprecatedVideoOptions ) &&
			$videoOptions['advancedSettings']['enable'] &&
			! $deprecatedVideoOptions['advancedSettings']['dynamic']
		) {
			aioseo()->sitemap->scheduleRegeneration();
		}

		// If phone settings have changed, let's see if we need to dump the phone number notice.
		if (
			$phoneNumberOptions &&
			$phoneNumberOptions !== $oldPhoneOption
		) {
			$notification = Models\Notification::getNotificationByName( 'v3-migration-local-business-number' );
			if ( $notification->exists() ) {
				Models\Notification::deleteNotificationByName( 'v3-migration-local-business-number' );
			}
		}

		if (
			$countryOption &&
			$countryOption !== $oldCountryOption
		) {
			$notification = Models\Notification::getNotificationByName( 'v3-migration-local-business-country' );
			if ( $notification->exists() ) {
				Models\Notification::deleteNotificationByName( 'v3-migration-local-business-country' );
			}
		}

		// Since capabilities may have changed, let's update those now.
		aioseo()->access->addCapabilities();
	}

	/**
	 * Adds some defaults that are dynamically generated.
	 *
	 * @since 4.0.0
	 *
	 * @return void
	 */
	public function addDynamicDefaults() {
		parent::addDynamicDefaults();
		$this->addDynamicAccessControlRolesDefaults();
		$this->proDefaults['sitemap']['news']['publicationName']['default']                        = aioseo()->helpers->decodeHtmlEntities( get_bloginfo( 'name' ) );
		$this->proDefaults['localBusiness']['locations']['business']['urls']['website']['default'] = home_url();

		if ( isset( $this->defaults['searchAppearance']['dynamic']['postTypes']['product']['schemaType'] ) && aioseo()->helpers->isWooCommerceActive() ) {
			$this->defaults['searchAppearance']['dynamic']['postTypes']['product']['schemaType']['default'] = 'Product';
		}

		if ( isset( $this->defaults['searchAppearance']['dynamic']['postTypes']['download']['schemaType'] ) && aioseo()->helpers->isEddActive() ) {
			$this->defaults['searchAppearance']['dynamic']['postTypes']['download']['schemaType']['default'] = 'Product';
		}

		$breadcrumbTemplateOption = [
			'useDefaultTemplate' => [
				'type'    => 'boolean',
				'default' => true
			]
		];

		if ( isset( $this->proDefaults['breadcrumbs']['dynamic']['postTypes'] ) ) {
			$postTypes = aioseo()->helpers->getPublicPostTypes();
			foreach ( $postTypes as $postType ) {
				$this->proDefaults['breadcrumbs']['dynamic']['postTypes'][ $postType['name'] ] = array_merge( $breadcrumbTemplateOption,
					[
						'taxonomy'           => [
							'type'    => 'string',
							'default' => ''
						],
						'showArchiveCrumb'   => [
							'type'    => 'boolean',
							'default' => true
						],
						'showTaxonomyCrumbs' => [
							'type'    => 'boolean',
							'default' => true
						],
						'showHomeCrumb'      => [
							'type'    => 'boolean',
							'default' => true
						],
						'showPrefixCrumb'    => [
							'type'    => 'boolean',
							'default' => true
						],
						'showParentCrumbs'   => [
							'type'    => 'boolean',
							'default' => true
						],
						'template'           => [
							'type'    => 'html',
							'default' => aioseo()->helpers->encodeOutputHtml( aioseo()->breadcrumbs->frontend->getDefaultTemplate( 'single', $postType ) )
						]
					],
					$postType['hierarchical']
						? [
							'parentTemplate' => [
								'type'    => 'html',
								'default' => aioseo()->helpers->encodeOutputHtml( aioseo()->breadcrumbs->frontend->getDefaultTemplate( 'single', $postType ) )
							]
						]
						: []
				);
			}
		}
		if ( isset( $this->proDefaults['breadcrumbs']['dynamic']['taxonomies'] ) ) {
			$taxonomies = aioseo()->helpers->getPublicTaxonomies();
			foreach ( $taxonomies as $taxonomy ) {
				$this->proDefaults['breadcrumbs']['dynamic']['taxonomies'][ $taxonomy['name'] ] = array_merge( $breadcrumbTemplateOption,
					[
						'showHomeCrumb'    => [
							'type'    => 'boolean',
							'default' => true
						],
						'showPrefixCrumb'  => [
							'type'    => 'boolean',
							'default' => true
						],
						'showParentCrumbs' => [
							'type'    => 'boolean',
							'default' => true
						],
						'template'         => [
							'type'    => 'html',
							'default' => aioseo()->helpers->encodeOutputHtml( aioseo()->breadcrumbs->frontend->getDefaultTemplate( 'taxonomy', $taxonomy ) )
						]
					], $taxonomy['hierarchical']
						? [
							'parentTemplate' => [
								'type'    => 'html',
								'default' => aioseo()->helpers->encodeOutputHtml( aioseo()->breadcrumbs->frontend->getDefaultTemplate( 'taxonomy', $taxonomy ) )
							]
						]
						: []
				);
			}
		}
		if ( isset( $this->proDefaults['breadcrumbs']['dynamic']['archives']['postTypes'] ) ) {
			$archives = aioseo()->helpers->getPublicPostTypes( false, true, true );
			foreach ( $archives as $archive ) {
				$this->proDefaults['breadcrumbs']['dynamic']['archives']['postTypes'][ $archive['name'] ] = array_merge( $breadcrumbTemplateOption,
					[
						'showHomeCrumb'   => [
							'type'    => 'boolean',
							'default' => true
						],
						'showPrefixCrumb' => [
							'type'    => 'boolean',
							'default' => true
						],
						'template'        => [
							'type'    => 'html',
							'default' => aioseo()->helpers->encodeOutputHtml( aioseo()->breadcrumbs->frontend->getDefaultTemplate( 'postTypeArchive', $archive ) )
						]
					]
				);
			}
		}
		if ( isset( $this->proDefaults['breadcrumbs']['dynamic']['archives']['date'] ) ) {
			$options = [
				'useDefaultTemplate' => [
					'type'    => 'boolean',
					'default' => true
				],
				'template'           => [
					'year'  => [
						'type'    => 'html',
						'default' => aioseo()->helpers->encodeOutputHtml( aioseo()->breadcrumbs->frontend->getDefaultTemplate( 'year' ) )
					],
					'month' => [
						'type'    => 'html',
						'default' => aioseo()->helpers->encodeOutputHtml( aioseo()->breadcrumbs->frontend->getDefaultTemplate( 'month' ) )
					],
					'day'   => [
						'type'    => 'html',
						'default' => aioseo()->helpers->encodeOutputHtml( aioseo()->breadcrumbs->frontend->getDefaultTemplate( 'day' ) )
					]
				],
				'showHomeCrumb'      => [
					'type'    => 'boolean',
					'default' => true
				],
				'showPrefixCrumb'    => [
					'type'    => 'boolean',
					'default' => true
				]
			];

			$this->proDefaults['breadcrumbs']['dynamic']['archives']['date'] = $options;
		}

		$breadcrumbTemplates = [ 'search', 'notFound', 'author', 'blog' ];
		foreach ( $breadcrumbTemplates as $breadcrumbTemplate ) {
			$this->proDefaults['breadcrumbs']['dynamic']['archives'][ $breadcrumbTemplate ] = array_merge( $breadcrumbTemplateOption,
				[
					'showHomeCrumb'   => [
						'type'    => 'boolean',
						'default' => true
					],
					'showPrefixCrumb' => [
						'type'    => 'boolean',
						'default' => true
					],
					'template'        => [
						'type'    => 'html',
						'default' => aioseo()->helpers->encodeOutputHtml( aioseo()->breadcrumbs->frontend->getDefaultTemplate( $breadcrumbTemplate ) )
					]
				]
			);
		}
	}

	/**
	 * Add the dynamic defaults for the Access Control roles.
	 *
	 * @since 4.1.3
	 *
	 * @return void
	 */
	protected function addDynamicAccessControlRolesDefaults() {
		$customRoles = aioseo()->helpers->getCustomRoles();
		foreach ( $customRoles as $roleName => $role ) {
			// phpcs:disable WordPress.Arrays.ArrayDeclarationSpacing.AssociativeArrayFound
			$defaultOptions = [
				'useDefault'               => [ 'type' => 'boolean', 'default' => true ],
				'dashboard'                => [ 'type' => 'boolean', 'default' => false ],
				'generalSettings'          => [ 'type' => 'boolean', 'default' => false ],
				'searchAppearanceSettings' => [ 'type' => 'boolean', 'default' => false ],
				'socialNetworksSettings'   => [ 'type' => 'boolean', 'default' => false ],
				'sitemapSettings'          => [ 'type' => 'boolean', 'default' => false ],
				'redirectsSettings'        => [ 'type' => 'boolean', 'default' => false ],
				'seoAnalysisSettings'      => [ 'type' => 'boolean', 'default' => false ],
				'toolsSettings'            => [ 'type' => 'boolean', 'default' => false ],
				'featureManagerSettings'   => [ 'type' => 'boolean', 'default' => false ],
				'pageAnalysis'             => [ 'type' => 'boolean', 'default' => false ],
				'pageGeneralSettings'      => [ 'type' => 'boolean', 'default' => false ],
				'pageAdvancedSettings'     => [ 'type' => 'boolean', 'default' => false ],
				'pageSchemaSettings'       => [ 'type' => 'boolean', 'default' => false ],
				'pageSocialSettings'       => [ 'type' => 'boolean', 'default' => false ],
				'localSeoSettings'         => [ 'type' => 'boolean', 'default' => false ],
				'pageLocalSeoSettings'     => [ 'type' => 'boolean', 'default' => false ],
				'setupWizard'              => [ 'type' => 'boolean', 'default' => false ]
			];
			// phpcs:enable WordPress.Arrays.ArrayDeclarationSpacing.AssociativeArrayFound

			$this->proDefaults['accessControl']['dynamic'][ $roleName ] = $defaultOptions;
		}
	}
}