<?php
namespace AIOSEO\Plugin\Extend\NewsSitemap;

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
	 * @param  array $entries The sitemap entries.
	 * @return void
	 */
	public function output( $entries ) {
		if ( 'news' === aioseo()->sitemap->type ) {
			$xslUrl     = home_url() . '/news.xsl';
			$charset    = get_option( 'blog_charset' );
			$generation = __( 'dynamically', 'aioseo-news-sitemap' );

			echo '<?xml version="1.0" encoding="' . esc_attr( $charset ) . "\"?>\r\n";
			echo '<!-- ' . sprintf(
				// Translators: 1 - "statically" or "dynamically", 2 - The plugin name ("All in One SEO").
				esc_html__( 'This sitemap was %1$s generated by %2$s - the original SEO plugin for WordPress.', 'aioseo-news-sitemap' ),
				esc_html( $generation ),
				esc_html( AIOSEO_PLUGIN_NAME )
			) . ' -->';
			echo "\r\n\r\n<?xml-stylesheet type=\"text/xsl\" href=\"" . esc_attr( $xslUrl ) . "\"?>\r\n";

			include_once( AIOSEO_NEWS_SITEMAP_DIR . '/app/Views/xml/news.php' );
			return;
		}
	}
}