<?php
namespace AIOSEO\Plugin\Addon\LocalBusiness\Main;

/**
 * Updater class.
 *
 * @since 1.0.1.2
 */
class Updates {
	/**
	 * Class constructor.
	 *
	 * @since 1.0.1.2
	 */
	public function __construct() {
		if ( wp_doing_ajax() || wp_doing_cron() ) {
			return;
		}

		add_action( 'aioseo_run_updates', [ $this, 'runUpdates' ], 1000 );
		add_action( 'aioseo_run_updates', [ $this, 'updateLatestVersion' ], 3000 );
	}

	/**
	 * Runs our migrations.
	 *
	 * @since 1.0.1.2
	 *
	 * @return void
	 */
	public function runUpdates() {
		$lastActiveVersion = aioseoLocalBusiness()->internalOptions->internal->lastActiveVersion;
		if ( version_compare( $lastActiveVersion, '1.1.0.2', '<' ) ) {
			$this->fixBusinessType();
		}
	}

	/**
	 * Updates the latest version after all migrations and updates have run.
	 *
	 * @since 1.0.1.2
	 *
	 * @return void
	 */
	public function updateLatestVersion() {
		aioseoLocalBusiness()->internalOptions->internal->lastActiveVersion = aioseoLocalBusiness()->version;
	}

	/**
	 * Updates the Business Type if it was previously incorrectly stored as JSON.
	 *
	 * @since 1.0.1.2
	 *
	 * @return void
	 */
	private function fixBusinessType() {
		if ( ! aioseo()->options->has( 'localBusiness' ) ) {
			return;
		}

		$businessType = aioseo()->options->localBusiness->locations->business->businessType;
		if ( is_array( $businessType ) ) {
			aioseo()->options->localBusiness->locations->business->businessType = $businessType['value'];
		}
	}

}