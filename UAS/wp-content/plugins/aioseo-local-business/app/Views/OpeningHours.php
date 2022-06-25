<?php
/**
 * This is the output for Local Business - Opening Hours on the frontend.
 *
 * @since 1.1.0
 */

// phpcs:disable VariableAnalysis.CodeAnalysis.VariableAnalysis.UndefinedVariable

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$svg = apply_filters( 'aioseo_local_business_opening_hours_icon', '<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 20 20" fill="currentColor"><rect x="0" fill="none" width="20" height="20"/><g><path fill="currentColor" d="M10 2c4.42 0 8 3.58 8 8s-3.58 8-8 8-8-3.58-8-8 3.58-8 8-8zm0 14c3.31 0 6-2.69 6-6s-2.69-6-6-6-6 2.69-6 6 2.69 6 6 6zm-.71-5.29c.07.05.14.1.23.15l-.02.02L14 13l-3.03-3.19L10 5l-.97 4.81h.01c0 .02-.01.05-.02.09S9 9.97 9 10c0 .28.1.52.29.71z"/></g></svg>' ); // phpcs:ignore Generic.Files.LineLength.MaxExceeded
?>
<div class="aioseo-location aioseo-opening-hours aioseo-hours-<?php echo absint( $postId ); ?> <?php echo esc_attr( $instance['class'] ); ?>">
	<div class="col">
		<div class="d-flex">
			<?php if ( $instance['showIcons'] ) : ?>
				<div class="col-auto">
					<span class="aioseo-opening-hours-icon"><?php echo $svg; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></span>
				</div>
			<?php endif; ?>
			<div class="col">
				<div>
					<strong>
						<?php
						echo $instance['showTitle'] ? esc_html( 'Our Opening Hours:', 'aioseo-local-business' ) : '&nbsp;';
						?>
					</strong>
				</div>
				<table class="aioseo-opening-hours-table aioseo-opening-hours-<?php echo esc_attr( $postId ); ?>">
					<?php foreach ( (array) $openingHoursData->days as $key => $day ) : ?>
						<?php if ( $instance[ 'show' . ucfirst( $key ) ] ) : ?>
							<tr>
								<td class="weekday">
									<?php esc_html_e( ucfirst( $key ), 'aioseo-local-business' ); // @TODO: This will not translate ?>
								</td>
								<td class="hours">
									<?php
									if ( $day->open24h || $openingHoursData->alwaysOpen ) {
										if ( $openingHoursData->labels->alwaysOpen ) {
											echo esc_html( $openingHoursData->labels->alwaysOpen );
										} else {
											$open  = '00:00';
											$close = '23:59';
											if ( ! $openingHoursData->use24hFormat ) {
												$open  = strtoupper( ( new \DateTime( $open ) )->format( 'h:i a' ) );
												$close = strtoupper( ( new \DateTime( $close ) )->format( 'h:i a' ) );
											}
											echo esc_html( $open ) . ' - ' . esc_html( $close );
										}
									} elseif ( $day->closed ) {
										echo esc_html( $openingHoursData->labels->closed );
									} else {
										if ( ! $openingHoursData->use24hFormat ) {
											$day->openTime  = strtoupper( ( new \DateTime( $day->openTime ) )->format( 'h:i a' ) );
											$day->closeTime = strtoupper( ( new \DateTime( $day->closeTime ) )->format( 'h:i a' ) );
										}
										echo esc_html( $day->openTime ) . ' - ' . esc_html( $day->closeTime );
									}
									?>
								</td>
							</tr>
						<?php endif; ?>
					<?php endforeach; ?>
				</table>
			</div>
		</div>
	</div>
</div>