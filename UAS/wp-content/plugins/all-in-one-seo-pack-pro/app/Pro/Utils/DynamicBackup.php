<?php
namespace AIOSEO\Plugin\Pro\Utils;

use AIOSEO\Plugin\Common\Utils\DynamicBackup as CommonDynamicBackup;

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class DynamicBackup extends CommonDynamicBackup {
	/**
	 * Checks whether data from the backup has to be restored.
	 *
	 * @since 4.1.3
	 *
	 * @return void
	 */
	public function init() {
		parent::init();

		$this->restoreRoles();
	}

	/**
	 * Restores the dynamic Roles options.
	 *
	 * @since 4.1.3
	 *
	 * @return void
	 */
	private function restoreRoles() {
		$customRoles = aioseo()->helpers->getCustomRoles();
		foreach ( $customRoles as $customRoleName => $customRoleLabel ) {
			if ( ! empty( $this->backup['roles'][ $customRoleName ] ) ) {
				$this->restoreOptions( $this->backup['roles'][ $customRoleName ], [ 'accessControl', 'dynamic', $customRoleName ] );
				unset( $this->backup['roles'][ $customRoleName ] );
				$this->needsUpdate = true;
			}
		}
	}

	/**
	 * Maybe backup the options if it has disappeared.
	 *
	 * @since 4.1.3
	 *
	 * @param  array $newOptions An array of options to check.
	 * @return void
	 */
	public function maybeBackup( $newOptions ) {
		$this->maybeBackupRoles( $newOptions['accessControl']['dynamic'] );

		parent::maybeBackup( $newOptions );
	}

	/**
	 * Maybe backup the roles.
	 *
	 * @since 4.1.3
	 *
	 * @param  array $dynamicRoles An array of dynamic roles to check.
	 * @return void
	 */
	private function maybeBackupRoles( $dynamicRoles ) {
		$customRoles = aioseo()->helpers->getCustomRoles();

		$missing = array_diff_key( $dynamicRoles, $customRoles );
		foreach ( $missing as $roleName => $roleSettings ) {
			$this->backup['roles'][ $roleName ] = $roleSettings;
			$this->shouldBackup = true;
		}
	}
}