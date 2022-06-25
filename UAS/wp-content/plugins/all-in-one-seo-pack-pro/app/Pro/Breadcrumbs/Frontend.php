<?php
namespace AIOSEO\Plugin\Pro\Breadcrumbs;

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Class Frontend.
 *
 * @since 4.1.1
 */
class Frontend extends \AIOSEO\Plugin\Common\Breadcrumbs\Frontend {
	/**
	 * Overrides the base getCrumbTemplate function to allow custom templates.
	 *
	 * @since 4.1.1
	 *
	 * @param  array $crumb The crumb array.
	 * @return array        The template type and html.
	 */
	protected function getCrumbTemplate( $crumb ) {
		$template = '';

		switch ( $crumb['type'] ) {
			case 'single':
			case 'page':
				$template = $this->getPostTypeTemplate( $crumb['reference'], $crumb['subType'] );
				break;
			case 'taxonomy':
				$template = $this->getTaxonomyTemplate( $crumb['reference'], $crumb['subType'] );
				break;
			case 'postTypeArchive':
				$template = $this->getPostTypeArchiveTemplate( $crumb['reference'] );
				break;
			case 'blog':
				$template = $this->getBlogArchiveTemplate();
				break;
			case 'year':
			case 'month':
			case 'day':
				$template = $this->getDateArchiveTemplate( $crumb['type'] );
				break;
			case 'search':
				$template = $this->getSearchTemplate();
				break;
			case 'notFound':
				$template = $this->getNotFoundTemplate();
				break;
			case 'author':
				$template = $this->getAuthorTemplate();
				break;
		}

		$templateType = 'custom';
		if ( empty( $template ) ) {
			$template     = $this->getDefaultTemplate( $crumb );
			$templateType = 'default';
		}

		return apply_filters( 'aioseo_breadcrumbs_template', [
			'templateType' => $templateType,
			'template'     => $template
		], $crumb );
	}

	/**
	 * Default html template.
	 *
	 * @since 4.1.1
	 *
	 * @param  string $type      The crumb's type.
	 * @param  mixed  $reference The crumb's reference.
	 * @return string            The default crumb template.
	 */
	public function getDefaultTemplate( $type = '', $reference = '' ) {
		$label = '#breadcrumb_label';
		switch ( $type ) {
			case 'single':
			case 'page':
				$label = '#breadcrumb_post_title';
				break;
			case 'taxonomy':
				$label = '#breadcrumb_taxonomy_title';
				break;
			case 'postTypeArchive':
				$label = '#breadcrumb_archive_post_type_format';
				break;
			case 'blog':
				$label = '#breadcrumb_blog_page_title';
				break;
			case 'year':
			case 'month':
			case 'day':
				$label = '#breadcrumb_date_archive_' . $type;
				break;
			case 'search':
				$label = '#breadcrumb_search_result_format';
				break;
			case 'notFound':
				$label = '#breadcrumb_404_error_format';
				break;
			case 'author':
				$label = '#breadcrumb_author_display_name';
				break;
		}

		return <<<TEMPLATE
<span class="aioseo-breadcrumb">
	<a href="#breadcrumb_link" title="$label">$label</a>
</span>
TEMPLATE;
	}

	/**
	 * Gets a custom post template.
	 *
	 * @since 4.1.1
	 *
	 * @param  int|\WP_Post $post    An ID or a WP_Post object.
	 * @param  string       $subType The template subtype ( single, parent )
	 * @return string|void           A custom template if one exists.
	 */
	protected function getPostTypeTemplate( $post, $subType = '' ) {
		$postType = get_post_type( $post );
		if (
			aioseo()->options->breadcrumbs->dynamic->postTypes->has( $postType ) &&
			! aioseo()->options->breadcrumbs->dynamic->postTypes->$postType->useDefaultTemplate
		) {
			$template = aioseo()->options->breadcrumbs->dynamic->postTypes->$postType->template;
			if ( 'parent' === $subType && aioseo()->options->breadcrumbs->dynamic->postTypes->$postType->has( 'parentTemplate' ) ) {
				$template = aioseo()->options->breadcrumbs->dynamic->postTypes->$postType->parentTemplate;
			}

			return aioseo()->helpers->encodeOutputHtml( $template );
		}
	}

	/**
	 * Gets a custom term template.
	 *
	 * @since 4.1.1
	 *
	 * @param  string      $taxonomy A taxonomy name.
	 * @param  string      $subType  The template subtype ( single, parent )
	 * @return string|void           A custom template if one exists.
	 */
	protected function getTaxonomyTemplate( $taxonomy, $subType = '' ) {
		$taxonomy = ! empty( $taxonomy->taxonomy ) ? $taxonomy->taxonomy : $taxonomy;
		if (
			aioseo()->options->breadcrumbs->dynamic->taxonomies->has( $taxonomy ) &&
			! aioseo()->options->breadcrumbs->dynamic->taxonomies->$taxonomy->useDefaultTemplate
		) {
			$template = aioseo()->options->breadcrumbs->dynamic->taxonomies->$taxonomy->template;
			if ( 'parent' === $subType && aioseo()->options->breadcrumbs->dynamic->taxonomies->$taxonomy->has( 'parentTemplate' ) ) {
				$template = aioseo()->options->breadcrumbs->dynamic->taxonomies->$taxonomy->parentTemplate;
			}

			return aioseo()->helpers->encodeOutputHtml( $template );
		}
	}

	/**
	 * Gets a custom post type archive template.
	 *
	 * @since 4.1.1
	 *
	 * @param  string|\WP_Post_Type $postType A post type name or an object.
	 * @return string|void                    A custom template if one exists.
	 */
	protected function getPostTypeArchiveTemplate( $postType ) {
		$postType = ! empty( $postType->name ) ? $postType->name : $postType;
		if (
			aioseo()->options->breadcrumbs->dynamic->archives->postTypes->has( $postType ) &&
			! aioseo()->options->breadcrumbs->dynamic->archives->postTypes->{$postType}->useDefaultTemplate
		) {
			return aioseo()->helpers->encodeOutputHtml( aioseo()->options->breadcrumbs->dynamic->archives->postTypes->{$postType}->template );
		}
	}

	/**
	 * Gets a custom blog archive template.
	 *
	 * @since 4.1.1
	 *
	 * @return string|void A custom template if one exists.
	 */
	protected function getBlogArchiveTemplate() {
		if (
			aioseo()->options->breadcrumbs->dynamic->archives->blog->has( 'template' ) &&
			! aioseo()->options->breadcrumbs->dynamic->archives->blog->useDefaultTemplate
		) {
			return aioseo()->helpers->encodeOutputHtml( aioseo()->options->breadcrumbs->dynamic->archives->blog->template );
		}
	}

	/**
	 * Gets a custom date archive template.
	 *
	 * @since 4.1.1
	 *
	 * @param  string      $type A date type ( year | month | day ).
	 * @return string|void       A custom template if one exists.
	 */
	protected function getDateArchiveTemplate( $type ) {
		if (
			aioseo()->options->breadcrumbs->dynamic->archives->date->template->has( $type ) &&
			! aioseo()->options->breadcrumbs->dynamic->archives->date->useDefaultTemplate
		) {
			return aioseo()->helpers->encodeOutputHtml( aioseo()->options->breadcrumbs->dynamic->archives->date->template->{$type} );
		}
	}

	/**
	 * Gets a custom search template.
	 *
	 * @since 4.1.1
	 *
	 * @return string|void A custom template if one exists.
	 */
	protected function getSearchTemplate() {
		if (
			aioseo()->options->breadcrumbs->dynamic->archives->search->has( 'template' ) &&
			! aioseo()->options->breadcrumbs->dynamic->archives->search->useDefaultTemplate
		) {
			return aioseo()->helpers->encodeOutputHtml( aioseo()->options->breadcrumbs->dynamic->archives->search->template );
		}
	}

	/**
	 * Gets a 404 template.
	 *
	 * @since 4.1.1
	 *
	 * @return string|void A custom template if one exists.
	 */
	protected function getNotFoundTemplate() {
		if (
			aioseo()->options->breadcrumbs->dynamic->archives->notFound->has( 'template' ) &&
			! aioseo()->options->breadcrumbs->dynamic->archives->notFound->useDefaultTemplate
		) {
			return aioseo()->helpers->encodeOutputHtml( aioseo()->options->breadcrumbs->dynamic->archives->notFound->template );
		}
	}

	/**
	 * Gets an author template.
	 *
	 * @since 4.1.1
	 *
	 * @return string|void A custom template if one exists.
	 */
	protected function getAuthorTemplate() {
		if (
			aioseo()->options->breadcrumbs->dynamic->archives->author->has( 'template' ) &&
			! aioseo()->options->breadcrumbs->dynamic->archives->author->useDefaultTemplate
		) {
			return aioseo()->helpers->encodeOutputHtml( aioseo()->options->breadcrumbs->dynamic->archives->author->template );
		}
	}
}