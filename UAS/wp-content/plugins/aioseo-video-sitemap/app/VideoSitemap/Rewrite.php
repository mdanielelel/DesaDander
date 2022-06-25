<?php
namespace AIOSEO\Plugin\Extend\VideoSitemap;

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Handles our sitemap rewrite rules.
 *
 * @since 4.0.0
 */
class Rewrite {
	/**
	 * Returns our sitemap rewrite rules.
	 *
	 * @since 4.0.0
	 *
	 * @return array The compiled array of rewrite rules, keyed by their regex pattern.
	 */
	public function get() {
		// Add sitemap rewrite rules if main sitemap is disabled or user had a custom filename in v3.
		if ( aioseo()->options->sitemap->video->enable ) {
			$filename = aioseo()->sitemap->helpers->filename( 'video' );

			if ( ! $filename && 'video-sitemap' !== $filename ) {
				return [
					"$filename.xml"           => 'index.php?aiosp_sitemap_path=root&aioseo_video_sitemap=1',
					"(.+)-$filename.xml"      => 'index.php?aiosp_sitemap_path=$matches[1]&aioseo_video_sitemap=1',
					"(.+)-$filename(\d+).xml" => 'index.php?aiosp_sitemap_path=$matches[1]&aiosp_sitemap_page=$matches[2]&aioseo_video_sitemap=1'
				];
			}

			if ( ! aioseo()->options->sitemap->enabled ) {
				return [
					'(.+)-sitemap.xml'      => 'index.php?aiosp_sitemap_path=$matches[1]',
					'(.+)-sitemap(\d+).xml' => 'index.php?aiosp_sitemap_path=$matches[1]&aiosp_sitemap_page=$matches[2]'
				];
			}
		}
		return [];
	}
}