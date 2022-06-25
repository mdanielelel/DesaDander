<?php
namespace AIOSEO\Plugin\Extend\NewsSitemap;

/**
 * Handles our sitemap rewrite rules.
 *
 * @since 4.0.12
 */
class Rewrite {

	/**
	 * Returns our sitemap rewrite rules.
	 *
	 * @since 4.0.12
	 *
	 * @return array The compiled array of rewrite rules, keyed by their regex pattern.
	 */
	public function get() {
		// Add sitemap rewrite rules if main sitemap is disabled.
		if ( ! aioseo()->options->sitemap->news->enable || aioseo()->options->sitemap->enabled ) {
			return [];
		}

		return [
			'(.+)-sitemap.xml' => 'index.php?aiosp_sitemap_path=$matches[1]'
		];
	}
}