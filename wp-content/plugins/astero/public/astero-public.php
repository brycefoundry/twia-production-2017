<?php
/* ==========================================================================
   Register styles and scripts
   ========================================================================== */
add_action('init', 'astero_register_scripts');

if( !function_exists('astero_register_scripts') ) {
        function astero_register_scripts() {
                
                $blog_id = '';
                if( is_multisite() ) {
                        $blog_id = get_current_blog_id();
                }
                
                wp_register_style('astero_css', ASTERO_URL . 'public/css/style.css');
                wp_register_style('astero_custom_css', ASTERO_URL . 'public/css/custom' . $blog_id . '.css');
                wp_register_script('astero_js', ASTERO_URL . 'public/js/astero.min.js', '', '', true);
                wp_register_script('astero_fc_js', ASTERO_URL . 'public/js/astero-fc.min.js', '', '', true);
                wp_register_script('astero_google_map', 'http://maps.google.com/maps/api/js?sensor=false');
                
                $options = get_option(ASTERO_OPTIONS);
                $fc_api = isset( $options['forecast_api'] ) ? $options['forecast_api'] : '';
                
                wp_localize_script('astero_js', 'astero_vars', array(
                        'api' => $options['api'],
                        'na' => __('N/A', ASTERO_SLUG),
                        "n" => __('N', ASTERO_SLUG),
                        "nne" => __("NNE", ASTERO_SLUG),
                        "ne" => __("NE", ASTERO_SLUG),
                        "ene" => __("ENE", ASTERO_SLUG),
                        "e" => __("E", ASTERO_SLUG),
                        "ese" => __("ESE", ASTERO_SLUG),
                        "se" => __("SE", ASTERO_SLUG),
                        "sse" => __("SSE", ASTERO_SLUG),
                        "s" => __("S", ASTERO_SLUG),
                        "ssw" => __("SSW", ASTERO_SLUG),
                        "sw" => __("SW", ASTERO_SLUG),
                        "wsw" => __("WSW", ASTERO_SLUG),
                        "w" => __("W", ASTERO_SLUG),
                        "wnw" => __("WNW", ASTERO_SLUG),
                        "nw" => __("NW", ASTERO_SLUG),
                        "nnw" => __("NNW", ASTERO_SLUG),
                        "am" => __("am", ASTERO_SLUG),
                        "pm" => __("pm", ASTERO_SLUG),
                        'thunderstorm with light rain' => __('own_translation thunderstorm with light rain', ASTERO_SLUG),
                        'thunderstorm with rain' => __('own_translation thunderstorm with rain', ASTERO_SLUG),
                        'thunderstorm with heavy rain' => __('own_translation thunderstorm with heavy rain', ASTERO_SLUG),
                        'light thunderstorm' => __('own_translation light thunderstorm', ASTERO_SLUG),
                        'thunderstorm' => __('own_translation thunderstorm', ASTERO_SLUG),
                        'heavy thunderstorm' => __('own_translation heavy thunderstorm', ASTERO_SLUG),
                        'ragged thunderstorm' => __('own_translation ragged thunderstorm', ASTERO_SLUG),
                        'thunderstorm with light drizzle' => __('own_translation thunderstorm with light drizzle', ASTERO_SLUG),
                        'thunderstorm with drizzle' => __('own_translation thunderstorm with drizzle', ASTERO_SLUG),
                        'thunderstorm with heavy drizzle' => __('own_translation thunderstorm with heavy drizzle', ASTERO_SLUG),
                        'light intensity drizzle' => __('own_translation light intensity drizzle', ASTERO_SLUG),
                        'drizzle' => __('own_translation drizzle', ASTERO_SLUG),
                        'heavy intensity drizzle' => __('own_translation heavy intensity drizzle', ASTERO_SLUG),
                        'light intensity drizzle rain' => __('own_translation light intensity drizzle rain', ASTERO_SLUG),
                        'drizzle rain' => __('own_translation drizzle rain', ASTERO_SLUG),
                        'heavy intensity drizzle rain' => __('own_translation heavy intensity drizzle rain', ASTERO_SLUG),
                        'shower drizzle' => __('own_translation shower drizzle', ASTERO_SLUG),
                        'light rain' => __('own_translation light rain', ASTERO_SLUG),
                        'moderate rain' => __('own_translation moderate rain', ASTERO_SLUG),
                        'heavy intensity rain' => __('own_translation heavy intensity rain', ASTERO_SLUG),
                        'very heavy rain' => __('own_translation very heavy rain', ASTERO_SLUG),
                        'extreme rain' => __('own_translation extreme rain', ASTERO_SLUG),
                        'freezing rain' => __('own_translation freezing rain', ASTERO_SLUG),
                        'light intensity shower rain' => __('own_translation light intensity shower rain', ASTERO_SLUG),
                        'shower rain' => __('own_translation shower rain', ASTERO_SLUG),
                        'heavy intensity shower rain' => __('own_translation heavy intensity shower rain', ASTERO_SLUG),
                        'light snow' => __('own_translation light snow', ASTERO_SLUG),
                        'snow' => __('own_translation snow', ASTERO_SLUG),
                        'heavy snow' => __('own_translation heavy snow', ASTERO_SLUG),
                        'sleet' => __('own_translation sleet', ASTERO_SLUG),
                        'shower snow' => __('own_translation shower snow', ASTERO_SLUG),
                        'mist' => __('own_translation mist', ASTERO_SLUG),
                        'smoke' => __('own_translation smoke', ASTERO_SLUG),
                        'haze' => __('own_translation haze', ASTERO_SLUG),
                        'sand/dust whirls' => __('own_translation sand/dust whirls', ASTERO_SLUG),
                        'fog' => __('own_translation fog', ASTERO_SLUG),
                        'sky is clear' => __('own_translation sky is clear', ASTERO_SLUG),
                        'few clouds' => __('own_translation few clouds', ASTERO_SLUG),
                        'scattered clouds' => __('own_translation scattered clouds', ASTERO_SLUG),
                        'broken clouds' => __('own_translation broken clouds', ASTERO_SLUG),
                        'overcast clouds' => __('own_translation overcast clouds', ASTERO_SLUG),
                        'tornado' => __('own_translation tornado', ASTERO_SLUG),
                        'tropical storm' => __('own_translation tropical storm', ASTERO_SLUG),
                        'hurricane' => __('own_translation hurricane', ASTERO_SLUG),
                        'cold' => __('own_translation cold', ASTERO_SLUG),
                        'hot' => __('own_translation hot', ASTERO_SLUG),
                        'windy' => __('own_translation windy', ASTERO_SLUG),
                        'hail' => __('own_translation hail', ASTERO_SLUG),
                        'Setting' => __('own_translation Setting', ASTERO_SLUG),
                        'Calm' => __('own_translation Calm', ASTERO_SLUG), 
                        'Light breeze' => __('own_translation Light breeze', ASTERO_SLUG),
                        'Gentle Breeze' => __('own_translation Gentle Breeze', ASTERO_SLUG), 
                        'Moderate breeze' => __('own_translation Moderate breeze', ASTERO_SLUG),
                        'Fresh Breeze' => __('own_translation Fresh Breeze', ASTERO_SLUG),
                        'Strong breeze' => __('own_translation Strong breeze', ASTERO_SLUG),
                        'High wind, near gale' => __('own_translation High wind, near gale', ASTERO_SLUG),
                        'Gale' => __('own_translation Gale', ASTERO_SLUG), 
                        'Severe Gale' => __('own_translation Severe Gale', ASTERO_SLUG),
                        'Storm' => __('own_translation Storm', ASTERO_SLUG), 
                        'Violent Storm' => __('own_translation Violent Storm', ASTERO_SLUG),
                        'Hurricane' => __('own_translation Hurricane', ASTERO_SLUG),
                        )
                );
                
                wp_localize_script('astero_fc_js', 'astero_fc_vars', array(
                        'fc_api' => $fc_api,
                        'na' => __('N/A', ASTERO_SLUG),
                        "n" => __('N', ASTERO_SLUG),
                        "nne" => __("NNE", ASTERO_SLUG),
                        "ne" => __("NE", ASTERO_SLUG),
                        "ene" => __("ENE", ASTERO_SLUG),
                        "e" => __("E", ASTERO_SLUG),
                        "ese" => __("ESE", ASTERO_SLUG),
                        "se" => __("SE", ASTERO_SLUG),
                        "sse" => __("SSE", ASTERO_SLUG),
                        "s" => __("S", ASTERO_SLUG),
                        "ssw" => __("SSW", ASTERO_SLUG),
                        "sw" => __("SW", ASTERO_SLUG),
                        "wsw" => __("WSW", ASTERO_SLUG),
                        "w" => __("W", ASTERO_SLUG),
                        "wnw" => __("WNW", ASTERO_SLUG),
                        "nw" => __("NW", ASTERO_SLUG),
                        "nnw" => __("NNW", ASTERO_SLUG),
                        "am" => __("am", ASTERO_SLUG),
                        "pm" => __("pm", ASTERO_SLUG),
                        )
                );
                
                wp_enqueue_style('astero_css');
                wp_enqueue_style('astero_custom_css');
        }
 
}

/* ==========================================================================
   Astero Weather Shortcode
   ========================================================================== */
if (!function_exists('astero_display')) {
        
        function astero_display( $attr ) {
                extract(shortcode_atts(array(
                        'id'           => '',
                        'style'        => '',
                ), $attr));
                
                $custom = get_post_meta( $id, '_astero_meta', true);
                
                if( !$custom ) {
                        return;
                }
                
                // get custom settings
                if( isset( $custom['service'] ) && $custom['service'] == 'fc' ) {
                        $location = $custom['location'] == 'city' ? '"city": "' . esc_html( $custom['city'] ) . '", "lat": "' . $custom['lat'] . '", "lon": "' . $custom['lon'] . '"' : '"lat":"","lon":""';
                        $units = $custom['units'] == 'metric' ? 'si' : 'us';
                        $lang = $custom['fc_lang'] == 'en' ? '' : ', "lang":"' . esc_html( $custom['fc_lang'] ) . '"';
                        $plugin_name = 'astero_fc';
                        $service = ' astero-forecast';
                        $credit = '<div class="astero-credit">' . __('Powered by <a href="http://forecast.io" target="_blank">Forecast</a>', ASTERO_SLUG) . '</div>';
                } else {
                        $location = $custom['location'] == 'city' ? '"q": "' . esc_html( $custom['city'] ) . '"' : '"q": ""';
                        $units = $custom['units'] == 'metric' ? 'metric' : 'imperial';
                        $lang = $custom['lang'] == 'en' ? '' : ', "lang":"' . esc_html( $custom['lang'] ) . '"';
                        $plugin_name = 'astero';
                        $service = ' astero-owm';
                        $credit = '';
                }
                
                $title = isset( $custom['heading'] ) && $custom['heading'] != '' ? ', "heading":"' . esc_html( $custom['heading'] ) . '"' : '';
                $custom['aspect_ratio'] = $custom['aspect_ratio'] == 'custom' ? (int) $custom['custom_ratio1'] / (int) $custom['custom_ratio2'] : $custom['aspect_ratio'];
                $ratio = $custom['style'] == 'video' && $custom['video'] == 'yt' && $custom['aspect_ratio'] != '1.77777778' ? ' "iframe_ratio": "' . $custom['aspect_ratio'] . '"' : '';
                if( isset( $custom['display_units'] ) && $custom['display_units'] == '1' ) {
                        $temp_unit = $custom['units'] == 'imperial' ? '<span class="astero-unit">' . __('&deg;F', ASTERO_SLUG) . '</span>': '<span class="astero-unit">' . __('&deg;C', ASTERO_SLUG) . '</span>';
                        $unit_c = __('&deg;C', ASTERO_SLUG);
                        $unit_f = __('&deg;F', ASTERO_SLUG);
                } else {
                        $temp_unit = '<span class="astero-unit">' . __('&deg;', ASTERO_SLUG) . '</span>';
                        $unit_c = $unit_f = __('&deg;', ASTERO_SLUG);
                }
                $weather = '{' . $location . ', "units": "' . $units . '", "unit_c": "' . $unit_c . '", "unit_f": "' . $unit_f . '"' . $lang . $ratio . $title . '}';
                
                // get custom classes
                $radius = isset( $custom['round'] ) && $custom['round'] == '1' ? ' radius' : '';
                $img = $custom['style'] == 'image' ? ' astero-img' : '';
                
                // generate video background
                $background = '';
                if( $custom['style'] == 'video' ) {
                        if( $custom['video'] == 'html5' ) {
                                $fallback = wp_get_attachment_image_src( $custom['placeholder'], 'full' );
                                $poster = $fallback ? ' poster="' . $fallback[0] . '"' : '';
                                $video_types = array('mp4', 'webm', 'ogg');
                                
                                $background = '<video loop muted autoplay' . $poster . '>';
                                foreach( $video_types as $v ) {
                                        $background .= $custom[ $v ] != '' && wp_get_attachment_url( $custom[ $v ] ) ? '<source src="' . wp_get_attachment_url( $custom[ $v ] ) . '" type="video/' . $v . '">' : '';
                                }
                                
                                $background .= $fallback ? '<img src="' . $fallback[0] . '" alt="' . __('The video tag is not supported for your browser.', ASTERO_SLUG) . '" />' : '';
                                $background .= '</video>';
                                
                        } elseif( $custom['video'] == 'yt') {
                                if (isset($_SERVER['HTTPS']) && ($_SERVER['HTTPS'] == ‘on’ || $_SERVER['HTTPS'] == 1) ||
                                        isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] == ‘https’) {
                                        $protocol = 'https:';
                                } else {
                                        $protocol = 'http:';
                                }
                                //$yt_class = isset( $custom['service'] ) && $custom['service'] == 'fc' ? 'astero-fc-yt' : ''
                                $background = '<div class="astero-yt" id="astero_yt' . $style . $id . '" data-videoid="' . esc_html( $custom['yt_id'] ) . '"></div>';
                        }
                }
                
                // get layout
                $layout = isset( $custom['layout'] ) && $custom['layout'] == 'full' ? 'full' : 'simple';
                
                // generate html
                ob_start();                      // start capturing output
                include( ASTERO_PATH . '/public/partials/astero-public-' . $layout . '-display.php');   // execute the file
                $html = ob_get_contents();    // get the contents from the buffer
                ob_end_clean();
                              
                // enqueue styles and scripts
                if( isset( $custom['service'] ) && $custom['service'] == 'fc' ) {
                        wp_enqueue_script('astero_fc_js');
                        if( isset( $custom['search'] ) && $custom['search'] == '1' ) {
                                wp_enqueue_script('astero_google_map');
                        }
                } else {
                        wp_enqueue_script('astero_js');
                }
                
                if( $custom['font_family'] != '' ) {
                        wp_enqueue_style('astero_google_font' . $id, 'http://fonts.googleapis.com/css?family=' . urlencode( esc_html( $custom['font_family'] ) ) . ':' . esc_html( $custom['font_variant'] ) . '&subset=' . esc_html( $custom['font_subset'] ) );
                }

                return $html;
        }
}
add_shortcode("astero", "astero_display");

/* ==========================================================================
   Astero Weather Widget
   ========================================================================== */
class astero_widget extends WP_Widget { 
	
	// Widget Settings
	function __construct() {
		parent::__construct(
			'astero_widget', // Base ID
			__('Astero WordPress Weather Widget', ASTERO_SLUG), // Name
			array( 'description' => __( 'Displays weather forecast in the sidebar', ASTERO_SLUG ), ) // Args
		);
	}
	
	// Widget Output
	function widget($args, $instance) {
                
                extract( $args );
		$title = apply_filters( 'widget_title', $instance['title'] );

		echo $before_widget;
		if ( ! empty( $title ) ) echo $before_title . $title . $after_title;
                
                if( get_post_status( $instance['astero'] ) == 'publish' && get_post_type( $instance['astero'] ) == 'astero' ) {
                       echo do_shortcode('[astero id="' . $instance['astero'] . '" style="_widget"]'); 
                }
                
		echo $after_widget;
	}
	
	// Update
	function update( $new_instance, $old_instance ) {  
		$instance = $old_instance; 
                
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
                $instance['astero'] = (int) $new_instance['astero'];

		return $instance;
	}
	
	// Backend Form
	function form($instance) {
		
		$defaults = array('title' => '', 'astero' => '',);
		$instance = wp_parse_args((array) $instance, $defaults);
                
                $args= array(
			'post_type' => 'astero',
			'posts_per_page' => -1,
                        'post_status' => 'publish',
		);
                $posts = new WP_Query($args);
                ?>
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>">Title:</label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $instance['title']; ?>" />
		</p>
                <p>
			<label for="<?php echo $this->get_field_id('astero'); ?>"><?php _e('Astero Weather:',ASTERO_SLUG); ?></label>
                        <select id="<?php echo $this->get_field_id('astero'); ?>" name="<?php echo $this->get_field_name('astero'); ?>" class="widefat">  
                                <option><?php _e('Choose weather',ASTERO_SLUG); ?></option>
                                <?php while ( $posts->have_posts() ) : $posts->the_post(); ?>
                                <option value="<?php the_ID(); ?>" <?php selected( $instance['astero'], get_the_ID()); ?>><?php the_title(); ?></option>
                                <?php endwhile; ?>
                        </select>
		</p>
                <p>
                        <a href="<?php echo get_option("siteurl"); ?>/wp-admin/post-new.php?post_type=astero" target="_blank"><?php _e('Add new weather', ASTERO_SLUG); ?></a>
                </p>
		
        <?php }
}

// Add Widget
function astero_widget_init() {
	register_widget('astero_widget');
}
add_action('widgets_init', 'astero_widget_init');