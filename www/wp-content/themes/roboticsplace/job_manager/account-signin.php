<?php
/**
 * In job listing creation flow, this template shows above the job creation form.
 *
 * This template can be overridden by copying it to yourtheme/job_manager/account-signin.php.
 *
 * @see         https://wpjobmanager.com/document/template-overrides/
 * @author      Automattic
 * @package     WP Job Manager
 * @category    Template
 * @version     1.31.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
?>
<?php if ( is_user_logged_in() ) : ?>

	<fieldset class="fieldset-logged_in">
		<label><?php _e( 'Bonjour', 'wp-job-manager' ); ?></label>
		<div class="field account-sign-in">
			<?php
				$user = wp_get_current_user();
				printf( __( '<strong>%s</strong>', 'wp-job-manager' ), $user->user_login );
			?>

			<a class="button" href="<?php echo apply_filters( 'submit_job_form_logout_url', wp_logout_url( get_permalink() ) ); ?>"><?php _e( 'x Déconnection', 'wp-job-manager' ); ?></a>
		</div>
	</fieldset>

<?php else :
	$account_required            = job_manager_user_requires_account();
	$registration_enabled        = job_manager_enable_registration();
	$registration_fields         = wpjm_get_registration_fields();
	$use_standard_password_email = wpjm_use_standard_password_setup_email();
	?>
	<fieldset class="fieldset-login_required">
		<label><?php _e( 'Have an account?', 'wp-job-manager' ); ?></label>
		<div class="field account-sign-in">
			<a class="button" href="<?php echo apply_filters( 'submit_job_form_login_url', wp_login_url( get_permalink() ) ); ?>"><?php _e( 'Sign in', 'wp-job-manager' ); ?></a>

			<?php if ( $registration_enabled ) : ?>

				<?php printf( __( 'If you don\'t have an account you can %screate one below by entering your email address/username.', 'wp-job-manager' ), $account_required ? '' : __( 'optionally', 'wp-job-manager' ) . ' ' ); ?>
				<?php if ( $use_standard_password_email ) : ?>
					<?php printf( __( 'Your account details will be confirmed via email.', 'wp-job-manager' ) ); ?>
				<?php endif; ?>

			<?php elseif ( $account_required ) : ?>

				<?php echo apply_filters( 'submit_job_form_login_required_message',  __('You must sign in to create a new listing.', 'wp-job-manager' ) ); ?>

			<?php endif; ?>
		</div>
	</fieldset>
	<?php
	if ( ! empty( $registration_fields ) ) {
		foreach ( $registration_fields as $key => $field ) {
			?>
			<fieldset class="fieldset-<?php echo esc_attr( $key ); ?>">
				<label
					for="<?php echo esc_attr( $key ); ?>"><?php echo $field[ 'label' ] . apply_filters( 'submit_job_form_required_label', $field[ 'required' ] ? '' : ' <small>' . __( '(optional)', 'wp-job-manager' ) . '</small>', $field ); ?></label>
				<div class="field <?php echo $field[ 'required' ] ? 'required-field' : ''; ?>">
					<?php get_job_manager_template( 'form-fields/' . $field[ 'type' ] . '-field.php', array( 'key'   => $key, 'field' => $field ) ); ?>
				</div>
			</fieldset>
			<?php
		}
		do_action( 'job_manager_register_form' );
	}
	?>
<?php endif; ?>
