<?php
/**
 * Plugin Name: AIOSEO - Video Sitemap
 * Plugin URI:  https://aioseo.com
 * Description: Adds support for the Video Sitemap to All in One SEO.
 * Author:      All in One SEO Team
 * Author URI:  https://aioseo.com
 * Version:     1.0.7
 * Text Domain: aioseo-video-sitemap
 * Domain Path: languages
 *
 * All in One SEO is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 2 of the License, or
 * any later version.
 *
 * All in One SEO is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with All in One SEO. If not, see <https://www.gnu.org/licenses/>.
 *
 * @since     1.0.0
 * @author    All in One SEO
 * @package   AIOSEO\Extend\Sitemap
 * @license   GPL-2.0+
 * @copyright Copyright (c) 2020, All in One SEO
 */

// phpcs:disable Generic.Arrays.DisallowLongArraySyntax.Found

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Plugin constants.
define( 'AIOSEO_VIDEO_SITEMAP_FILE', __FILE__ );
define( 'AIOSEO_VIDEO_SITEMAP_DIR', __DIR__ );
define( 'AIOSEO_VIDEO_SITEMAP_PATH', plugin_dir_path( AIOSEO_VIDEO_SITEMAP_FILE ) );
define( 'AIOSEO_VIDEO_SITEMAP_URL', plugin_dir_url( AIOSEO_VIDEO_SITEMAP_FILE ) );

// Require our translation downloader.
require_once( __DIR__ . '/extend/translations.php' );

add_action( 'init', 'aioseo_video_sitemap_translations' );
function aioseo_video_sitemap_translations() {
	$translations = new AIOSEOTranslations(
		'plugin',
		'aioseo-video-sitemap',
		'https://packages.translationspress.com/aioseo/aioseo-video-sitemap/packages.json'
	);
	$translations->init();

	// @NOTE: The slugs here need to stay as aioseo-addon.
	$addonTranslations = new AIOSEOTranslations(
		'plugin',
		'aioseo-addon',
		'https://packages.translationspress.com/aioseo/aioseo-addon/packages.json'
	);
	$addonTranslations->init();
}

// Require our plugin compatibility checker.
require_once( __DIR__ . '/extend/init.php' );

// Plugin compatibility checks.
new AIOSEOExtend( 'AIOSEO - Video Sitemap', 'aioseo_video_sitemap_load', AIOSEO_VIDEO_SITEMAP_FILE, '4.0.13' );

/**
 * Function to load the Video Sitemap addon.
 *
 * @since 1.0.0
 *
 * @return void
 */
function aioseo_video_sitemap_load() {
	$levels = aioseo()->addons->getAddonLevels( 'aioseo-video-sitemap' );
	$extend = new AIOSEOExtend( 'AIOSEO - Video Sitemap', '', AIOSEO_VIDEO_SITEMAP_FILE, '4.0.13', $levels );

	if ( ! aioseo()->pro ) {
		return $extend->requiresPro();
	}

	// We don't want to return if the plan is only expired.
	if ( aioseo()->license->isExpired() ) {
		$extend->requiresUnexpiredLicense();
		$extend->disableNotices = true;
	}

	if ( aioseo()->license->isInvalid() || aioseo()->license->isDisabled() ) {
		return $extend->requiresActiveLicense();
	}

	if ( ! aioseo()->license->isAddonAllowed( 'aioseo-video-sitemap' ) ) {
		return $extend->requiresPlanLevel();
	}

	require_once( __DIR__ . '/app/VideoSitemap.php' );

	aioseoVideoSitemap();
}