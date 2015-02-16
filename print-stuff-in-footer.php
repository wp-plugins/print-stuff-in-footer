<?php
/*
Plugin Name: Print Stuff in Footer
Plugin URI: http://www.thomas-roberts.co.uk
Description: Lets you paste stuff into a box which will then be printed at the foot of every page. Useful for adding google analytics code etc.
Version: 1.0
Author: Thomas Roberts Esq.
Author URI: http://www.thomas-roberts.co.uk/
License: GPL v3

What The File Plugin
Copyright (C) 2012-2013, Barry Kooij - barry@cageworks.nl

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <http://www.gnu.org/licenses/>.
*/

add_action( 'admin_menu', 'print_stuff_plugin_menu' );
add_action( 'wp_footer', 'print_stuff' );
function print_stuff_plugin_menu() {

	add_menu_page('Print Stuff in Footer', 'Print Stuff in Footer', 'manage_options', 'print_stuff_settings', 'print_stuff_plugin_page' , 'dashicons-editor-indent' );

}

function print_stuff_plugin_page()
{

	if( isset( $_POST['psif_submit'] ) )
	{
		update_option( 'psif_text', stripslashes( $_POST['psif_textarea'] ) );
	}
	?>
	<div class="wrap">

		<h1>Paste Stuff in Footer</h1>

		<form id="psif" method="post">
			<textarea name="psif_textarea" style="width:100%; min-height: 400px;"><?php echo get_option( 'psif_text' ); ?></textarea>
			<input type="submit" name="psif_submit" value="Save" class="button button-primary button-large">
		</form>


	<?php
}

add_action( 'wp_footer', 'print_stuff' );

function print_stuff( $args ) {

	echo get_option( 'psif_text' );

}