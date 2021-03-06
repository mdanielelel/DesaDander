<?php
/**
 * XSL stylesheet for the News Sitemap.
 *
 * @since 4.0.0
 */
 // phpcs:disable
?>
<xsl:stylesheet
	version="2.0"
	xmlns:html="http://www.w3.org/TR/html40"
	xmlns:sitemap="http://www.sitemaps.org/schemas/sitemap/0.9"
	xmlns:news="http://www.google.com/schemas/sitemap-news/0.9"
	xmlns:xsl="http://www.w3.org/1999/XSL/Transform"
>
	<xsl:output method="html" version="1.0" encoding="UTF-8" indent="yes"/>

	<xsl:template match="/">
		<html xmlns="http://www.w3.org/1999/xhtml">
			<head>
				<title><?php _e( 'Google News Sitemap', 'aioseo-pro' ); ?></title>
				<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
				<style type="text/css">
					body {
						margin: 0;
						font-family: Helvetica, Arial, sans-serif;
					}
					#content-head {
						background-color: #4275f4;
						padding: 20px 40px;
					}
					#content-head h1,
					#content-head p,
					#content-head a {
						color: #fff;
						font-size: 0.8rem;
					}
					#content-head h1 {
						font-size: 1.5rem;
					}
					table {
						margin: 20px 40px;
						border: none;
						border-collapse: collapse;
					}
					table {
						font-size: 0.85rem;
						width: 80%;
					}
					th {
						border-bottom: 1px solid #ccc;
						text-align: left;
						padding: 15px 5px;
						font-size: 0.8rem;
					}
					td {
						padding: 10px 5px;
						border-left: 3px solid #fff;
						font-size: 0.7rem;
					}
					tr.stripe {
						background-color: #f7f7f7;
					}
					table td a {
						display: block;
						text-decoration: none;
					}
				</style>
			</head>
			<body>
				<div id="content">
					<div id="content-head">
						<xsl:variable name="amountOfURLs">
							<xsl:value-of select="count(sitemap:urlset/sitemap:url)"/>
						</xsl:variable>
						<h1><?php _e( 'Google News Sitemap', 'aioseo-news-sitemap' ); ?></h1>
						<p>
							<?php
							$anchor = sprintf(
								'<a href="%1$s" target="_blank">%2$s</a>',
								aioseo()->helpers->utmUrl( AIOSEO_MARKETING_URL, 'aioseo-news-sitemap' ),
								AIOSEO_PLUGIN_NAME
							);
							// Translators: 1 - The plugin name ("All in One SEO").
							printf( __( 'This Google News Sitemap is generated by %1$s.', 'aioseo-news-sitemap' ), $anchor );
							?>
						</p>
						<p>
							<?php
							_e( 'It features all news articles that were published in the last 48 hours and contains', 'aioseo-news-sitemap' );
							?>
							<xsl:value-of select="$amountOfURLs"/>
							<xsl:choose>
								<xsl:when test="$amountOfURLs = 1">
									<?php echo __( 'URL', 'aioseo-news-sitemap' ); ?>
								</xsl:when>
								<xsl:otherwise>
									<?php echo __( 'URLs', 'aioseo-news-sitemap' ); ?>
								</xsl:otherwise>
							</xsl:choose>
						.</p>
					</div>
					<xsl:call-template name="sitemapTable"/>
				</div>
			</body>
		</html>
	</xsl:template>
	<xsl:template name="sitemapTable">
		<table cellpadding="3">
			<thead>
			<tr>
				<th>#</th>
				<th width="40%"><?php _e( 'Title', 'aioseo-news-sitemap' ); ?></th>
				<th width="40%"><?php _e( 'URL', 'aioseo-news-sitemap' ); ?></th>
				<th><?php _e( 'Publish Date', 'aioseo-news-sitemap' ); ?></th>
			</tr>
			</thead>
			<tbody>
			<xsl:for-each select="sitemap:urlset/sitemap:url">
				<tr>
					<xsl:if test="position() mod 2 != 1">
						<xsl:attribute name="class">stripe</xsl:attribute>
					</xsl:if>
					<td><xsl:value-of select="position()"/></td>
					<td>
						<xsl:value-of select="news:news/news:title"/>
					</td>
					<td>
						<xsl:variable name="itemURL">
							<xsl:value-of select="sitemap:loc"/>
						</xsl:variable>
						<a href="{$itemURL}">
							<xsl:value-of select="sitemap:loc"/>
						</a>
					</td>
					<td>
						<xsl:value-of select="concat(substring(news:news/news:publication_date,0,11),concat(' ', substring(news:news/news:publication_date,12,8)))"/>
					</td>
				</tr>
			</xsl:for-each>
			</tbody>
		</table>
	</xsl:template>
</xsl:stylesheet>
<?php
