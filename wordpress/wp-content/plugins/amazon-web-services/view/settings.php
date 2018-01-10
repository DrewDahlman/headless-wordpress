<div class="aws-content aws-settings">

	<?php
	$use_ec2_iam_roles = $this->use_ec2_iam_roles(); ?>

	<?php if ( $this->needs_access_keys() ) : ?>

		<p class="need-help dashicons-before dashicons-info">
			<?php printf( __( 'Need help getting your Access Keys? <a href="%s">Check out the Quick Start Guide &rarr;</a>', 'amazon-web-services' ), $this->dbrains_url( '/wp-offload-s3/doc/quick-start-guide/', array(
				'utm_campaign' => 'support+docs',
			) ) ); ?>
		</p>

	<?php endif; ?>

	<h3><?php _e( 'Access Keys', 'amazon-web-services' ); ?></h3>

	<?php if ( $use_ec2_iam_roles ) : ?>

		<p>
			<?php _e( 'You have enabled the use of IAM roles for Amazon EC2 instances.', 'amazon-web-services' ); ?>
		</p>

	<?php elseif ( ! $use_ec2_iam_roles && ( $this->are_prefixed_key_constants_set() || $this->are_key_constants_set() ) ) : ?>

		<?php if ( ! $this->are_access_keys_set() ) : ?>
			<div class="notice-error notice">
				<p>
					<?php _e( 'Please check your wp-config.php file as it looks like one of your defines is missing or incorrect.', 'amazon-web-services' ); ?>
				</p>
			</div>
		<?php endif; ?>

		<p>
			<?php printf( __( 'You&#8217;ve already defined your AWS access keys in your wp-config.php. If you&#8217;d prefer to manage them here and store them in the database (<a href="%s">not recommended</a>), simply remove the lines from your wp-config.', 'amazon-web-services' ), $this->dbrains_url( '/wp-offload-s3/doc/quick-start-guide/#save-access-keys', array(
				'utm_campaign' => 'support+docs',
			) ) ); ?>
		</p>

	<?php else : ?>

		<p>
			<?php _e( 'We recommend defining your Access Keys in wp-config.php so long as you don&#8217;t commit it to source control (you shouldn&#8217;t be). Simply copy the following snippet and replace the stars with the keys.', 'amazon-web-services' ); ?>
		</p>

		<pre>define( 'DBI_AWS_ACCESS_KEY_ID', '********************' );
define( 'DBI_AWS_SECRET_ACCESS_KEY', '****************************************' );</pre>

		<?php if ( $this->get_access_key_id() || $this->get_secret_access_key() ) : ?>
			<p>
				<?php printf( __( 'You&#8217;re storing your Access Keys in the database (<a href="%s">not recommended</a>).</a>', 'amazon-web-services' ), $this->dbrains_url( '/wp-offload-s3/doc/quick-start-guide/#save-access-keys', array(
					'utm_campaign' => 'support+docs',
				) ) ); ?>
			</p>
		<?php else : ?>
			<p class="reveal-form">
				<?php _e( 'If you&#8217;d rather store your Access Keys in the database, <a href="">click here to reveal a form.</a>', 'amazon-web-services' ); ?>
			</p>
		<?php endif; ?>

		<form method="post" <?php echo ( ! $this->get_access_key_id() && ! $this->get_secret_access_key() ) ? 'style="display: none;"' : ''; // xss ok ?>>

			<?php if ( isset( $_POST['access_key_id'] ) ) { // input var okay ?>
				<div class="aws-updated updated">
					<p><strong>Settings saved.</strong></p>
				</div>
			<?php } ?>

			<input type="hidden" name="action" value="save" />
			<?php wp_nonce_field( 'aws-save-settings' ) ?>

			<table class="form-table">
				<tr valign="top">
					<th width="33%" scope="row"><?php _e( 'Access Key ID:', 'amazon-web-services' ); ?></th>
					<td>
						<input type="text" name="access_key_id" value="<?php echo $this->get_access_key_id() // xss ok; ?>" size="50" autocomplete="off" />
					</td>
				</tr>
				<tr valign="top">
					<th width="33%" scope="row"><?php _e( 'Secret Access Key:', 'amazon-web-services' ); ?></th>
					<td>
						<input type="text" name="secret_access_key" value="<?php echo $this->get_secret_access_key() ? '-- not shown --' : ''; // xss ok ?>" size="50" autocomplete="off" />
					</td>
				</tr>
				<tr valign="top">
					<th colspan="2" scope="row">
						<button type="submit" class="button button-primary"><?php _e( 'Save Changes', 'amazon-web-services' ); ?></button>
						<?php if ( $this->get_access_key_id() || $this->get_secret_access_key() ) : ?>
							&nbsp;
							<button class="button remove-keys"><?php _e( 'Remove Keys', 'amazon-web-services' ); ?></button>
						<?php endif; ?>
					</th>
				</tr>
			</table>

		</form>

	<?php endif; ?>

</div>
