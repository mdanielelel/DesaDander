<?php
namespace AIOSEO\Plugin\Addon\LocalBusiness\Widgets;

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * AIOSEO Business Info widget.
 *
 * @since 1.1.0
 */
class BusinessInfo extends \WP_Widget {
	/**
	 * Class constructor.
	 *
	 * @since 1.1.0
	 */
	public function __construct() {
		// Widget defaults.
		$this->defaults = [
			'title'           => '',
			'locationId'      => '',
			'showLabels'      => true,
			'showIcons'       => true,
			'showName'        => true,
			'showAddress'     => true,
			'showPhone'       => true,
			'showFax'         => true,
			'showCountryCode' => true,
			'showEmail'       => true,
			'showVat'         => true,
			'showTax'         => true,
			'after'           => '',
		];

		// Widget Slug.
		$widgetSlug = 'aioseo-local-business-info-widget';

		// Widget basics.
		$widgetOps = [
			'classname'   => $widgetSlug,
			'description' => esc_html__( 'Display a location information.', 'aioseo-local-business' ),
		];

		// Widget controls.
		$controlOps = [
			'id_base' => $widgetSlug,
		];

		// Load widget.
		parent::__construct( $widgetSlug, esc_html__( 'AIOSEO Local - Business Info', 'aioseo-local-business' ), $widgetOps, $controlOps );
	}

	/**
	 * Widget callback.
	 *
	 * @since 1.1.0
	 *
	 * @param  array $args     Widget args.
	 * @param  array $instance The widget instance options.
	 * @return void
	 */
	public function widget( $args, $instance ) {
		// Merge with defaults.
		$instance = wp_parse_args( (array) $instance, $this->defaults );

		echo $args['before_widget']; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

		// Title.
		if ( ! empty( $instance['title'] ) ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'], $instance, $this->id_base ) . $args['after_title']; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped,Generic.Files.LineLength.MaxExceeded
		}

		// Location info.
		aioseoLocalBusiness()->locations->outputBusinessInfo( $instance['locationId'], $instance );

		// After.
		if ( ! empty( $instance['after'] ) ) {
			echo $instance['after']; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		}

		echo $args['after_widget']; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	}

	/**
	 * Widget option update.
	 *
	 * @since 1.1.0
	 *
	 * @param  array $newInstance New instance options.
	 * @param  array $oldInstance Old instance options.
	 * @return array              Processed new instance options.
	 */
	public function update( $newInstance, $oldInstance ) { // phpcs:ignore VariableAnalysis.CodeAnalysis.VariableAnalysis.UnusedVariable
		// $newInstance['locationId']  = ! empty( $newInstance['locationId'] ) ? (int) $newInstance['locationId'] : 0;
		$newInstance['title']           = wp_strip_all_tags( $newInstance['title'] );
		$newInstance['showLabels']      = isset( $newInstance['showLabels'] ) ? '1' : false;
		$newInstance['showIcons']       = isset( $newInstance['showIcons'] ) ? '1' : false;
		$newInstance['showName']        = isset( $newInstance['showName'] ) ? '1' : false;
		$newInstance['showAddress']     = isset( $newInstance['showAddress'] ) ? '1' : false;
		$newInstance['showPhone']       = isset( $newInstance['showPhone'] ) ? '1' : false;
		$newInstance['showFax']         = isset( $newInstance['showFax'] ) ? '1' : false;
		$newInstance['showCountryCode'] = isset( $newInstance['showCountryCode'] ) ? '1' : false;
		$newInstance['showEmail']       = isset( $newInstance['showEmail'] ) ? '1' : false;
		$newInstance['showVat']         = isset( $newInstance['showVat'] ) ? '1' : false;
		$newInstance['showTax']         = isset( $newInstance['showTax'] ) ? '1' : false;
		$newInstance['after']           = wp_strip_all_tags( $newInstance['after'] );

		return $newInstance;
	}

	/**
	 * Widget options form.
	 *
	 * @since 1.1.0
	 *
	 * @param  array $instance The widget instance options.
	 * @return void
	 */
	public function form( $instance ) {
		// Merge with defaults.
		$instance = wp_parse_args( (array) $instance, $this->defaults );
		?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>">
				<?php echo esc_html( __( 'Title:', 'aioseo-local-business' ) ); ?>
			</label>
			<input
					type="text"
					id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"
					name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>"
					value="<?php echo esc_attr( $instance['title'] ); ?>"
					class="widefat"
			/>
		</p>
		<?php if ( aioseo()->options->localBusiness->locations->general->multiple ) { ?>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'locationId' ) ); ?>">
					<?php esc_html_e( 'Location:', 'aioseo-local-business' ); ?>
				</label>
				<select class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'locationId' ) ); ?>"
						name="<?php echo esc_attr( $this->get_field_name( 'locationId' ) ); ?>">
					<?php
					$locations = aioseoLocalBusiness()->locations->getLocations( [
						'order_by' => 'post_title',
						'order'    => 'asc'
					] );
					if ( ! empty( $locations ) ) {
						echo '<option value="" selected disabled>' . esc_html__( 'Select your location', 'aioseo-local-business' ) . '</option>';
						foreach ( $locations as $location ) {
							echo '<option value="' . esc_attr( $location->ID ) . '" ' . selected( $instance['locationId'], $location->ID, false ) . '>' . esc_html( $location->post_title ) . '</option>'; // phpcs:ignore Generic.Files.LineLength.MaxExceeded
						}
					} else {
						echo '<option value="">' . esc_html__( 'No locations available', 'aioseo-local-business' ) . '</option>';
					}
					?>
				</select>
			</p>
		<?php } ?>
		<p>
			<input type="checkbox" id="<?php echo esc_attr( $this->get_field_id( 'showLabels' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'showLabels' ) ); ?>" <?php checked( '1', $instance['showLabels'] ); ?>> <?php // phpcs:ignore Generic.Files.LineLength.MaxExceeded ?>
			<label for="<?php echo esc_attr( $this->get_field_id( 'showLabels' ) ); ?>">
				<?php esc_html_e( 'Show labels', 'aioseo-local-business' ); ?>
			</label>
		</p>
		<p>
			<input type="checkbox" id="<?php echo esc_attr( $this->get_field_id( 'showIcons' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'showIcons' ) ); ?>" <?php checked( '1', $instance['showIcons'] ); ?>> <?php // phpcs:ignore Generic.Files.LineLength.MaxExceeded ?>
			<label for="<?php echo esc_attr( $this->get_field_id( 'showIcons' ) ); ?>">
				<?php esc_html_e( 'Show icons', 'aioseo-local-business' ); ?>
			</label>
		</p>
		<p>
			<strong><?php esc_html_e( 'Business Info:', 'aioseo-local-business' ); ?></strong>
		</p>
		<p>
			<input type="checkbox" id="<?php echo esc_attr( $this->get_field_id( 'showName' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'showName' ) ); ?>" <?php checked( '1', $instance['showName'] ); ?>> <?php // phpcs:ignore Generic.Files.LineLength.MaxExceeded ?>
			<label for="<?php echo esc_attr( $this->get_field_id( 'showName' ) ); ?>">
				<?php esc_html_e( 'Business name', 'aioseo-local-business' ); ?>
			</label>
		</p>
		<p>
			<input type="checkbox" id="<?php echo esc_attr( $this->get_field_id( 'showAddress' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'showAddress' ) ); ?>" <?php checked( '1', $instance['showAddress'] ); ?>> <?php // phpcs:ignore Generic.Files.LineLength.MaxExceeded ?>
			<label for="<?php echo esc_attr( $this->get_field_id( 'showAddress' ) ); ?>">
				<?php esc_html_e( 'Address', 'aioseo-local-business' ); ?>
			</label>
		</p>
		<p>
			<input type="checkbox" id="<?php echo esc_attr( $this->get_field_id( 'showPhone' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'showPhone' ) ); ?>" <?php checked( '1', $instance['showPhone'] ); ?>> <?php // phpcs:ignore Generic.Files.LineLength.MaxExceeded ?>
			<label for="<?php echo esc_attr( $this->get_field_id( 'showPhone' ) ); ?>">
				<?php esc_html_e( 'Phone Number', 'aioseo-local-business' ); ?>
			</label>
		</p>
		<p>
			<input type="checkbox" id="<?php echo esc_attr( $this->get_field_id( 'showFax' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'showFax' ) ); ?>" <?php checked( '1', $instance['showFax'] ); ?>> <?php // phpcs:ignore Generic.Files.LineLength.MaxExceeded ?>
			<label for="<?php echo esc_attr( $this->get_field_id( 'showFax' ) ); ?>">
				<?php esc_html_e( 'Fax Number', 'aioseo-local-business' ); ?>
			</label>
		</p>
		<p>
			<input type="checkbox" id="<?php echo esc_attr( $this->get_field_id( 'showCountryCode' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'showCountryCode' ) ); ?>" <?php checked( '1', $instance['showCountryCode'] ); ?>> <?php // phpcs:ignore Generic.Files.LineLength.MaxExceeded ?>
			<label for="<?php echo esc_attr( $this->get_field_id( 'showCountryCode' ) ); ?>">
				<?php esc_html_e( 'Show Country Code', 'aioseo-local-business' ); ?>
			</label>
		</p>
		<p>
			<input type="checkbox" id="<?php echo esc_attr( $this->get_field_id( 'showEmail' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'showEmail' ) ); ?>" <?php checked( '1', $instance['showEmail'] ); ?>> <?php // phpcs:ignore Generic.Files.LineLength.MaxExceeded ?>
			<label for="<?php echo esc_attr( $this->get_field_id( 'showEmail' ) ); ?>">
				<?php esc_html_e( 'Email address', 'aioseo-local-business' ); ?>
			</label>
		</p>
		<p>
			<input type="checkbox" id="<?php echo esc_attr( $this->get_field_id( 'showVat' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'showVat' ) ); ?>" <?php checked( '1', $instance['showVat'] ); ?>> <?php // phpcs:ignore Generic.Files.LineLength.MaxExceeded ?>
			<label for="<?php echo esc_attr( $this->get_field_id( 'showVat' ) ); ?>">
				<?php esc_html_e( 'Show VAT ID', 'aioseo-local-business' ); ?>
			</label>
		</p>
		<p>
			<input type="checkbox" id="<?php echo esc_attr( $this->get_field_id( 'showTax' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'showTax' ) ); ?>" <?php checked( '1', $instance['showTax'] ); ?>> <?php // phpcs:ignore Generic.Files.LineLength.MaxExceeded ?>
			<label for="<?php echo esc_attr( $this->get_field_id( 'showTax' ) ); ?>">
				<?php esc_html_e( 'Show Tax ID', 'aioseo-local-business' ); ?>
			</label>
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'after' ) ); ?>">
				<?php esc_html_e( 'After widget text:', 'aioseo-local-business' ); ?>
			</label><br/>
			<textarea id="<?php echo esc_attr( $this->get_field_id( 'after' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'after' ) ); ?>" class="widefat"><?php echo esc_attr( $instance['after'] ); ?></textarea> <?php // phpcs:ignore Generic.Files.LineLength.MaxExceeded ?>
		</p>
		<?php
	}
}