<div class="wrap">
        <h2><?php _e('Astero Weather Plugin Settings'); ?></h2>
        <form method="post" action="options.php">
                <?php settings_fields( ASTERO_OPTIONS . '_group' ); ?>
                <table class="form-table">
                        <tr valign="top">
                                <th scope="row"><?php _e('OpenWeatherMap API Key', ASTERO_SLUG); ?></th>
                                <td><input type="text" id="api" class="regular-text" name="<?php echo ASTERO_OPTIONS; ?>[api]" value="<?php echo isset( $astero_options['api'] ) ? $astero_options['api']: ''; ?>" /><br />
                                    <span class="description"><?php _e('Sign up for a free or paid Open Weather Map API key <a href="http://openweathermap.org/register" target="_blank">here</a> and enter the API key above.', ASTERO_SLUG); ?></span></td>
                        </tr>
                        <tr valign="top">
                                <th scope="row"><?php _e('Forecast.io API Key', ASTERO_SLUG); ?></th>
                                <td><input type="text" id="api" class="regular-text" name="<?php echo ASTERO_OPTIONS; ?>[forecast_api]" value="<?php echo isset( $astero_options['forecast_api'] ) ? $astero_options['forecast_api']: ''; ?>" /><br />
                                    <span class="description"><?php _e('Sign up for a free or paid Forecast.io key <a href="https://developer.forecast.io/register" target="_blank">here</a> and enter the API key above.', ASTERO_SLUG); ?></span></td>
                        </tr>
                </table>
                <?php submit_button(); ?>
        </form>
</div>