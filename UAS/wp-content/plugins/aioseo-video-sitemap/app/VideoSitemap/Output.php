<?php
namespace AIOSEO\Plugin\Extend\VideoSitemap;

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Handles outputting the sitemap.
 *
 * @since 1.0.0
 */
class Output {
	/**
	 * Outputs the sitemap.
	 *
	 * @since 1.0.0
	 *
	 * @param  array The sitemap entries.
	 * @return void
	 */
	public function output( $entries ) {
		if ( 'video' === aioseo()->sitemap->type ) {
			$xslUrl     = home_url() . '/video.xsl';
			$charset    = get_option( 'blog_charset' );
			$generation = ! isset( aioseo()->sitemap->isStatic ) || aioseo()->sitemap->isStatic
				? __( 'statically', 'aioseo-video-sitemap' )
				: __( 'dynamically', 'aioseo-video-sitemap' );

			echo '<?xml version="1.0" encoding="' . esc_attr( $charset ) . "\"?>\r\n";
			echo '<!-- ' . sprintf(
				// Translators: 1 - "statically" or "dynamically", 2 - The plugin name ("All in One SEO").
				esc_html__( 'This sitemap was %1$s generated by %2$s - the original SEO plugin for WordPress.', 'aioseo-video-sitemap' ),
				esc_html( $generation ),
				esc_html( AIOSEO_PLUGIN_NAME )
			) . ' -->';
			echo "\r\n\r\n<?xml-stylesheet type=\"text/xsl\" href=\"" . esc_attr( $xslUrl ) . "\"?>\r\n";

			if ( 'root' === aioseo()->sitemap->indexName && aioseo()->options->sitemap->video->indexes ) {
				include( AIOSEO_DIR . '/app/Common/Views/sitemap/xml/root.php' );
				return;
			}
			include( AIOSEO_VIDEO_SITEMAP_DIR . '/app/Views/xml/video.php' );
			return;
		}
	}
}