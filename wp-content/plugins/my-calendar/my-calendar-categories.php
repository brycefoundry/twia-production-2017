<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // Exit if accessed directly


function mc_update_category( $field, $data, $category ) {
	global $wpdb;
	$field  = sanitize_key( $field );
	$result = $wpdb->query( $wpdb->prepare( "UPDATE " . my_calendar_categories_table() . " SET $field = %d WHERE category_id=%d", $data, $category ) );

	return $result;
}

// Function to handle the management of categories

// This is a hack for people who don't have PHP installed with exif_imagetype
if ( ! function_exists( 'exif_imagetype' ) ) {
	function exif_imagetype( $filename ) {
		if ( ! is_dir( $filename ) && ( list( $width, $height, $type, $attr ) = getimagesize( $filename ) ) !== false ) {
			return $type;
		}

		return false;
	}
}

function my_dirlist( $directory ) {
	$results = array();
	$handler = opendir( $directory );
	// keep going until all files in directory have been read
	while ( $file = readdir( $handler ) ) {
		// if $file isn't this directory or its parent,
		// add it to the results array
		if ( filesize( $directory . '/' . $file ) > 11 ) {
			if ( $file != '.' && $file != '..' && ! is_dir( $directory . '/' . $file ) && (
					exif_imagetype( $directory . '/' . $file ) == IMAGETYPE_GIF ||
					exif_imagetype( $directory . '/' . $file ) == IMAGETYPE_PNG ||
					exif_imagetype( $directory . '/' . $file ) == IMAGETYPE_JPEG )
			) {
				$results[] = $file;
			}
		}
	}
	closedir( $handler );
	sort( $results, SORT_STRING );

	return $results;
}

function my_csslist( $directory ) {
	$results = array();
	$handler = opendir( $directory );
	// keep going until all files in directory have been read
	while ( $file = readdir( $handler ) ) {
		// if $file isn't this directory or its parent,
		// add it to the results array
		if ( $file != '.' && $file != '..' ) {
			$results[] = $file;
		}
	}
	closedir( $handler );
	sort( $results, SORT_STRING );

	return $results;
}

function is_custom_icon() {
	$dir  = plugin_dir_path( __FILE__ );
	$base = basename( $dir );
	if ( file_exists( str_replace( $base, '', $dir ) . 'my-calendar-custom' ) ) {
		$results = my_dirlist( str_replace( $base, '', $dir ) . 'my-calendar-custom' );
		if ( empty( $results ) ) {
			return false;
		} else {
			return true;
		}
	}

	return false;
}

function my_calendar_manage_categories() {
	global $wpdb;
	$mcdb    = $wpdb;
	$formats = array( '%s', '%s', '%s' );

	?>
	<div class="wrap my-calendar-admin">
		<?php
		my_calendar_check_db();
		// We do some checking to see what we're doing
		if ( ! empty( $_POST ) ) {
			$nonce = $_REQUEST['_wpnonce'];
			if ( ! wp_verify_nonce( $nonce, 'my-calendar-nonce' ) ) {
				die( "Security check failed" );
			}
		}

		if ( isset( $_POST['mode'] ) && $_POST['mode'] == 'add' ) {
			$term = wp_insert_term( strip_tags( $_POST['category_name'] ), 'mc-event-category' );
			if ( ! is_wp_error( $term ) ) {
				$term = $term['term_id'];
			} else {
				$term = false;
			}
			$add = array(
				'category_name'    => $_POST['category_name'],
				'category_color'   => $_POST['category_color'],
				'category_icon'    => $_POST['category_icon'],
				'category_private' => ( ( isset( $_POST['category_private'] ) ) ? 1 : 0 ),
				'category_term'    => $term
			);
			
			$add   = array_map( 'mc_kses_post', $add );		
			
			
			// actions and filters
			$add     = apply_filters( 'mc_pre_add_category', $add, $_POST );
			$results = $mcdb->insert( my_calendar_categories_table(), $add, $formats );
			do_action( 'mc_post_add_category', $add, $results, $_POST );
			$cat_ID = $mcdb->insert_id;

			if ( isset( $_POST['mc_default_category'] ) ) {
				update_option( 'mc_default_category', $cat_ID );
				$append = __( 'Default category changed.', 'my-calendar' );
			} else {
				$append = '';
			}
			
			if ( isset( $_POST['mc_skip_holidays_category'] ) ) {
				update_option( 'mc_skip_holidays_category', $cat_ID );
				$append .= __( 'Holiday category changed.', 'my-calendar' );
			}
			
			if ( $results ) {
				echo "<div class=\"updated\"><p><strong>" . __( 'Category added successfully', 'my-calendar' ) . ". $append</strong></p></div>";
			} else {
				echo "<div class=\"updated error\"><p><strong>" . __( 'Category addition failed.', 'my-calendar' ) . "</strong></p></div>";
			}
		} else if ( isset( $_GET['mode'] ) && isset( $_GET['category_id'] ) && $_GET['mode'] == 'delete' ) {
			$cat_ID  = (int) $_GET['category_id'];
			$sql     = "DELETE FROM " . my_calendar_categories_table() . " WHERE category_id=$cat_ID";
			$results = $mcdb->query( $sql );
			if ( $results ) {
				$sql         = "UPDATE " . my_calendar_table() . " SET event_category=1 WHERE event_category=$cat_ID";
				$cal_results = $mcdb->query( $sql );
				mc_delete_cache();
			} else {
				$cal_results = false;
			}
			if ( get_option( 'mc_default_category' ) == $cat_ID ) {
				update_option( 'mc_default_category', 1 );
			}
			if ( $results && $cal_results ) {
				echo "<div class=\"updated\"><p><strong>" . __( 'Category deleted successfully. Categories in calendar updated.', 'my-calendar' ) . "</strong></p></div>";
			} else if ( $results && ! $cal_results ) {
				echo "<div class=\"updated\"><p><strong>" . __( 'Category deleted successfully. Categories in calendar not updated.', 'my-calendar' ) . "</strong></p></div>";
			} else if ( ! $results && $cal_results ) {
				echo "<div class=\"updated error\"><p><strong>" . __( 'Category not deleted. Categories in calendar updated.', 'my-calendar' ) . "</strong></p></div>";
			}
		} else if ( isset( $_GET['mode'] ) && isset( $_GET['category_id'] ) && $_GET['mode'] == 'edit' && ! isset( $_POST['mode'] ) ) {
			$cur_cat = (int) $_GET['category_id'];
			mc_edit_category_form( 'edit', $cur_cat );
		} else if ( isset( $_POST['mode'] ) && isset( $_POST['category_id'] ) && isset( $_POST['category_name'] ) && isset( $_POST['category_color'] ) && $_POST['mode'] == 'edit' ) {
			$update = array(
				'category_name'    => $_POST['category_name'],
				'category_color'   => $_POST['category_color'],
				'category_icon'    => $_POST['category_icon'],
				'category_private' => ( ( isset( $_POST['category_private'] ) ) ? 1 : 0 )
			);
			$where  = array( 'category_id' => (int) $_POST['category_id'] );
			$append = '';
			if ( isset( $_POST['mc_default_category'] ) ) {
				update_option( 'mc_default_category', (int) $_POST['category_id'] );
				$append .= __( 'Default category changed.', 'my-calendar' );
			} else {
				if ( get_option( 'mc_default_category' ) == (int) $_POST['category_id'] ) {
					delete_option( 'mc_default_category' );
				}
			}
			if ( isset( $_POST['mc_skip_holidays_category'] ) ) {
				update_option( 'mc_skip_holidays_category', (int) $_POST['category_id'] );
				$append .= __( 'Holiday category changed.', 'my-calendar' );
			} else {
				if ( get_option( 'mc_skip_holidays_category' ) == (int) $_POST['category_id'] ) {
					delete_option( 'mc_skip_holidays_category' );
				}
			}
			$results = $mcdb->update( my_calendar_categories_table(), $update, $where, $formats, '%d' );
			mc_delete_cache();
			if ( $results ) {
				echo "<div class=\"updated\"><p><strong>" . __( 'Category edited successfully.', 'my-calendar' ) . " $append</strong></p></div>";
			} else {
				echo "<div class=\"updated error\"><p><strong>" . __( 'Category was not edited.', 'my-calendar' ) . " $append</strong></p></div>";
			}
			$cur_cat = (int) $_POST['category_id'];
			mc_edit_category_form( 'edit', $cur_cat );
		}

		if ( isset( $_GET['mode'] ) && $_GET['mode'] != 'edit' || isset( $_POST['mode'] ) && $_POST['mode'] != 'edit' || ! isset( $_GET['mode'] ) && ! isset( $_POST['mode'] ) ) {
			mc_edit_category_form( 'add' );
		}
		?></div>
<?php
}

function mc_edit_category_form( $view = 'edit', $catID = '' ) {
	global $wpdb;
	$dir     = plugin_dir_path( __FILE__ );
	$url     = plugin_dir_url( __FILE__ );
	$mcdb    = $wpdb;
	$cur_cat = false;
	if ( $catID != '' ) {
		$catID   = (int) $catID;
		$sql     = "SELECT * FROM " . my_calendar_categories_table() . " WHERE category_id=$catID";
		$cur_cat = $mcdb->get_row( $sql );
	}
	if ( is_custom_icon() ) {
		$directory = str_replace( '/my-calendar', '', $dir ) . '/my-calendar-custom/';
		$path      = '/my-calendar-custom';
		$iconlist  = my_dirlist( $directory );
	} else {
		$directory = dirname( __FILE__ ) . '/images/icons/';
		$path      = '/' . dirname( plugin_basename( __FILE__ ) ) . '/images/icons';
		$iconlist  = my_dirlist( $directory );
	}
	if ( $view == 'add' ) {
		?>
		<h1><?php _e( 'Add Category', 'my-calendar' ); ?></h1>
	<?php } else { ?>
		<h1 class="wp-heading-inline"><?php _e( 'Edit Category', 'my-calendar' ); ?></h1>
		<a href="<?php echo admin_url( "admin.php?page=my-calendar-categories" ); ?>" class="page-title-action"><?php _e( 'Add New', 'my-calendar' ); ?></a> 
		<hr class="wp-header-end">		
	<?php } ?>
	
	

	<div class="postbox-container jcd-wide">
		<div class="metabox-holder">

			<div class="ui-sortable meta-box-sortables">
				<div class="postbox">
					<h2><?php _e( 'Category Editor', 'my-calendar' ); ?></h2>

					<div class="inside">
						<form id="my-calendar" method="post"
						      action="<?php echo admin_url( 'admin.php?page=my-calendar-categories' ); ?>">
							<div><input type="hidden" name="_wpnonce"
							            value="<?php echo wp_create_nonce( 'my-calendar-nonce' ); ?>"/></div>
							<?php if ( $view == 'add' ) { ?>
								<div>
									<input type="hidden" name="mode" value="add"/>
									<input type="hidden" name="category_id" value=""/>
								</div>
							<?php } else { ?>
								<div>
									<input type="hidden" name="mode" value="edit"/>
									<input type="hidden" name="category_id"
									       value="<?php if ( is_object( $cur_cat ) ) {
										       echo $cur_cat->category_id;
									       } ?>"/>
								</div>
							<?php } ?>
							<?php
								if ( ! empty( $cur_cat ) && is_object( $cur_cat ) ) {
									$color = ( strpos( $cur_cat->category_color, '#' ) !== 0 ) ? '#' : '';
									$color .= $cur_cat->category_color;
								} else {
									$color = '';
								} 
								$color = strip_tags( $color );
								?>
								<ul>
								<li>
								<label for="cat_name"><?php _e( 'Category Name', 'my-calendar' ); ?></label> <input
									type="text" id="cat_name" name="category_name" class="input" size="30"
									value="<?php if ( ! empty( $cur_cat ) && is_object( $cur_cat ) ) {
										echo stripslashes( esc_attr( $cur_cat->category_name ) );
									} ?>"/>
								<label for="cat_color"><?php _e( 'Color', 'my-calendar' ); ?></label> <input
									type="text"
									id="cat_color"
									name="category_color"
									class="mc-color-input"
									size="10"
									maxlength="7"
									value="<?php echo ( $color != '#' ) ? esc_attr( $color ) : ''; ?>"/>
								</li>
								<li>
								<label for="cat_icon"><?php _e( 'Category Icon', 'my-calendar' ); ?></label> <select
									name="category_icon" id="cat_icon">
									<?php
									foreach ( $iconlist as $value ) {
										$selected = ( ( ! empty( $cur_cat ) && is_object( $cur_cat ) ) && $cur_cat->category_icon == $value ) ? " selected='selected'" : '';
										echo "<option value='" . esc_attr( $value ) . "'$selected style='background: url(" . esc_url( str_replace( 'my-calendar/', '', $url ) . "$path/$value" ) . ") left 50% no-repeat;'>$value</option>";
									}
									?>
								</select>
								</li>
								<li>
									<?php if ( $view == 'add' ) {
										$private_checked = '';
									} else {
										if ( ! empty( $cur_cat ) && is_object( $cur_cat ) && $cur_cat->category_private == 1 ) {
											$private_checked = ' checked="checked"';
										} else {
											$private_checked = '';
										}
									} ?>
									<?php $checked = ( $view == 'add' ) ? '' : mc_is_checked( 'mc_default_category', $cur_cat->category_id, '', true ); ?>
									<?php $holiday_checked = ( $view == 'add' ) ? '' : mc_is_checked( 'mc_skip_holidays_category', $cur_cat->category_id, '', true ); ?>
									<ul class='checkboxes'>
									<li>
									<input type="checkbox" value="on" name="category_private"
									       id="cat_private"<?php echo $private_checked; ?> /> <label
										for="cat_private"><?php _e( 'Private category (logged-in users only)', 'my-calendar' ); ?></label></li>
									<li><input type="checkbox" value="on" name="mc_default_category"
									       id="mc_default_category"<?php echo $checked; ?> /> <label
										for="mc_default_category"><?php _e( 'Default category', 'my-calendar' ); ?></label></li>
									<li><input type="checkbox" value="on" name="mc_skip_holidays_category"
									       id="mc_shc"<?php echo $holiday_checked; ?> /> <label
										for="mc_shc"><?php _e( 'Holiday Category', 'my-calendar' ); ?></label></li>
									</ul>
								</li>
								<?php echo apply_filters( 'mc_category_fields', '', $cur_cat ); ?>
							</ul>
							<p>
								<input type="submit" name="save" class="button-primary"
								       value="<?php if ( $view == 'add' ) {
									       _e( 'Add Category', 'my-calendar' );
								       } else {
									       _e( 'Save Changes', 'my-calendar' );
								       } ?> &raquo;"/>
							</p>
							<?php do_action( 'mc_post_category_form', $cur_cat, $view ); ?>
						</form>
					</div>
				</div>
			</div>
			<?php if ( $view == 'edit' ) { ?>
				<p>
					<a href="<?php echo admin_url( 'admin.php?page=my-calendar-categories' ); ?>"><?php _e( 'Add a New Category', 'my-calendar' ); ?> &raquo;</a>
				</p>
			<?php } ?>
			<div class="ui-sortable meta-box-sortables">
				<div class="postbox">
					<h2><?php _e( 'Category List', 'my-calendar' ); ?></h2>

					<div class="inside">
						<?php mc_manage_categories(); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php mc_show_sidebar();
}

function mc_get_category_detail( $cat_id, $field = 'category_name' ) {
	global $wpdb;
	$mcdb     = $wpdb;
	$category = $mcdb->get_row( $mcdb->prepare( "SELECT * FROM " . my_calendar_categories_table() . " WHERE category_id=%d", $cat_id ) );

	return $category->$field;
}

function mc_manage_categories() {
	global $wpdb;
	$mcdb = $wpdb;
	?>
	<h1><?php _e( 'Manage Categories', 'my-calendar' ); ?></h1><?php
	$co = ( ! isset( $_GET['co'] ) ) ? 1 : (int) $_GET['co'];
	switch ( $co ) {
		case 1:
			$cat_order = 'category_id';
			break;
		case 2:
			$cat_order = 'category_name';
			break;
		default:
			$cat_order = 'category_id';
	}
	// We pull the categories from the database
	$categories = $mcdb->get_results( "SELECT * FROM " . my_calendar_categories_table() . " ORDER BY $cat_order ASC" );
	if ( ! empty( $categories ) ) {
		?>
		<table class="widefat page fixed mc-categories" id="my-calendar-admin-table">
		<thead>
		<tr>
			<th scope="col"><?php echo ( $co == 2 ) ? "<a href='" . admin_url( "admin.php?page=my-calendar-categories&amp;co=1" ) . "'>" : ''; ?><?php _e( 'ID', 'my-calendar' ) ?><?php echo ( $co == 2 ) ? '</a>' : ''; ?></th>
			<th scope="col"><?php echo ( $co == 1 ) ? "<a href='" . admin_url( "admin.php?page=my-calendar-categories&amp;co=2" ) . "'>" : ''; ?><?php _e( 'Category Name', 'my-calendar' ) ?><?php echo ( $co == 1 ) ? '</a>' : ''; ?></th>
			<th scope="col"><?php _e( 'Color/Icon', 'my-calendar' ); ?></th>
			<th scope="col"><?php _e( 'Private', 'my-calendar' ); ?></th>
			<th scope="col"><?php _e( 'Edit', 'my-calendar' ); ?></th>
			<th scope="col"><?php _e( 'Delete', 'my-calendar' ); ?></th>
		</tr>
		</thead>
		<?php
		$class = '';
		foreach ( $categories as $cat ) {
			$class      = ( $class == 'alternate' ) ? '' : 'alternate';
			if ( $cat->category_icon != '' ) {
				$icon_src   = ( mc_file_exists( $cat->category_icon ) ) ? mc_get_file( $cat->category_icon, 'url' ) : plugins_url( 'my-calendar/images/icons/' . $cat->category_icon );
			} else {
				$icon_src = false;
			}
			$background = ( strpos( $cat->category_color, '#' ) !== 0 ) ? '#' : '' . $cat->category_color;
			$foreground = mc_inverse_color( $background );
			?>
		<tr class="<?php echo $class; ?>">
			<th scope="row"><?php echo $cat->category_id; ?></th>
			<td><?php echo stripslashes( mc_kses_post( $cat->category_name ) );
				if ( $cat->category_id == get_option( 'mc_default_category' ) ) {
					echo ' <strong>' . __( '(Default)' ) . '</strong>';
				}
				if ( $cat->category_id == get_option( 'mc_skip_holidays_category' ) ) {
					echo ' <strong>' . __( '(Holiday)' ) . '</strong>';
				} ?></td>
			<td style="background-color:<?php echo $background; ?>;color: <?php echo $foreground; ?>"><?php echo ( $icon_src ) ? "<img src='$icon_src' alt='' />" : ''; ?> <?php echo ( $background != '#' ) ? $background : ''; ?></td>
			<td><?php echo ( $cat->category_private == 1 ) ? __( 'Yes', 'my-calendar' ) : __( 'No', 'my-calendar' ); ?></td>
			<td><a
				href="<?php echo admin_url( "admin.php?page=my-calendar-categories&amp;mode=edit&amp;category_id=$cat->category_id" ); ?>"
				class='edit'><?php printf( __( 'Edit %s', 'my-calendar' ), '<span class="screen-reader-text">' . stripslashes( mc_kses_post( $cat->category_name ) ) . '</span>' ); ?></a></td><?php
			if ( $cat->category_id == 1 ) {
				echo '<td>' . __( 'N/A', 'my-calendar' ) . '</td>';
			} else {
				?>
				<td><a
					href="<?php echo admin_url( "admin.php?page=my-calendar-categories&amp;mode=delete&amp;category_id=$cat->category_id" ); ?>"
					class="delete"
					onclick="return confirm('<?php _e( 'Are you sure you want to delete this category?', 'my-calendar' ); ?>')"><?php printf( __( 'Delete %s', 'my-calendar' ), '<span class="screen-reader-text">' . stripslashes( mc_kses_post( $cat->category_name ) ) . '</span>' ); ?></a>
				</td><?php
			}  ?>
			</tr><?php
		} ?>
		</table><?php
	} else {
		echo '<p>' . __( 'There are no categories in the database - or something has gone wrong!', 'my-calendar' ) . '</p>';
	}
}


add_action( 'show_user_profile', 'mc_profile' );
add_action( 'edit_user_profile', 'mc_profile' );
add_action( 'profile_update', 'mc_save_profile' );
/**
 * Show user profile data on Edit User pages.
 * 
 * return @string Configuration forms for My Calendar user-specific settings.
 */
function mc_profile() {
	global $user_ID;
	$current_user = wp_get_current_user();
	$user_edit = ( isset( $_GET['user_id'] ) ) ? (int) $_GET['user_id'] : $user_ID;

	if ( user_can( $user_edit, 'mc_manage_events' ) && current_user_can( 'manage_options' ) ) {
		$permissions = (array) get_user_meta( $user_edit, 'mc_user_permissions', true );
		$selected    = ( empty( $permissions ) || in_array( 'all', $permissions ) ) ? ' selected="selected"' : '';
		?>
		<h3><?php _e( 'My Calendar Editor Permissions', 'my-calendar' ); ?></h3>
		<table class="form-table">
			<tr>
				<th scope="row">
					<label for="mc_user_permissions"><?php _e( "Allowed Categories", 'my-calendar' ); ?></label>
				</th>
				<td>
					<select name="mc_user_permissions[]" id="mc_user_permissions" multiple>
						<option value='all'<?php echo $selected; ?>><?php _e( 'All', 'my-calendar' ); ?></option>
						<?php echo mc_category_select( $permissions, true, 'multiple' ); ?>
					</select>
				</td>
			</tr>
			<?php echo apply_filters( 'mc_user_fields', '', $user_edit ); ?>
		</table>
		<?php
	} 
}

/** 
 * Save user profile data 
 */
function mc_save_profile() {	
	global $user_ID;
	$current_user = wp_get_current_user();
	if ( isset( $_POST['user_id'] ) ) {
		$edit_id = (int) $_POST['user_id'];
	} else {
		$edit_id = $user_ID;
	}
	if ( current_user_can( 'manage_options' ) && isset( $_POST['mc_user_permissions'] ) ) {
		$mc_user_permission = $_POST['mc_user_permissions'];
		update_user_meta( $edit_id, 'mc_user_permissions', $mc_user_permission );
	}
	
	apply_filters( 'mc_save_user', $edit_id, $_POST );
}


function mc_inverse_color( $color ) {
	$color = str_replace( '#', '', $color );
	if ( strlen( $color ) != 6 ) {
		return '#000000';
	}
	$rgb       = '';
	$total     = 0;
	$red       = 0.299 * ( 255 - hexdec( substr( $color, 0, 2 ) ) );
	$green     = 0.587 * ( 255 - hexdec( substr( $color, 2, 2 ) ) );
	$blue      = 0.114 * ( 255 - hexdec( substr( $color, 4, 2 ) ) );
	$luminance = 1 - ( ( $red + $green + $blue ) / 255 );
	if ( $luminance < 0.5 ) {
		return '#ffffff';
	} else {
		return '#000000';
	}
}

function mc_shift_color( $color ) {
	$color   = str_replace( '#', '', $color );
	$rgb     = ''; // Empty variable
	$percent = ( mc_inverse_color( $color ) == '#ffffff' ) ? - 20 : 20;
	$per     = $percent / 100 * 255; // Creates a percentage to work with. Change the middle figure to control colour temperature
	if ( $per < 0 ) {
		// DARKER
		$per = abs( $per ); // Turns Neg Number to Pos Number
		for ( $x = 0; $x < 3; $x ++ ) {
			$c = hexdec( substr( $color, ( 2 * $x ), 2 ) ) - $per;
			$c = ( $c < 0 ) ? 0 : dechex( $c );
			$rgb .= ( strlen( $c ) < 2 ) ? '0' . $c : $c;
		}
	} else {
		// LIGHTER        
		for ( $x = 0; $x < 3; $x ++ ) {
			$c = hexdec( substr( $color, ( 2 * $x ), 2 ) ) + $per;
			$c = ( $c > 255 ) ? 'ff' : dechex( $c );
			$rgb .= ( strlen( $c ) < 2 ) ? '0' . $c : $c;
		}
	}

	return '#' . $rgb;
}
