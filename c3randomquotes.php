<?php
/*
Plugin Name: c3 Random Quotes
Plugin URI: http://www.creed3.com/
Description: Selects a random quote and displays it in a WordPress sidebar.
Version: 1.0
Author: creed3 : Scott Hampton
Author URI: http://www.creed3.com
License: GPLv2
*/

/*  Copyright 2015  Scott Hampton  (contact : http://www.creed3.com/)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

	// Start class //
 
class c3rq_widget extends WP_Widget {
 
	// Constructor //
	
    function c3rq_widget() {
    	load_plugin_textdomain('c3rq', false, dirname(plugin_basename(__FILE__)) . '/languages/');
        parent::WP_Widget(false, $name = __('c3 Random Quotes', 'c3rq'), array('description' => __('Selects a random quote and displays it in a Wordpress sidebar.', 'c3rq')) );	
    }

	// Extract Args //

	function widget($args, $instance) {
		extract( $args );
		$leading_quote 	= $instance['leading_quote']; // leading quotation mark image display: none or a select color
		$widget_width 	= $instance['widget_width']; // width of the widget
		$font_size 	= $instance['font_size']; // font size
		$quote_color 	= $instance['quote_color']; // quote font color
		$author_color 	= $instance['author_color']; // author font color
		?>
		<style type="text/css">
		<!-- 
		.c3rq {
			display: block;
			width: <?php echo $widget_width; ?>;
			margin-bottom: 8px;
			}
		.c3rq_quote {
			padding:		12px 0px 2px 10px;
			text-align:		left;
			font-size:		<?php echo $font_size; ?>;
			font-weight:	lighter;
			letter-spacing:	1px;
			color:			<?php echo $quote_color; ?>;
			line-height:	1.2em;
			}
		.c3rq_author {
			padding-left:	20px;
			text-align:		left;
			font-size:		<?php echo $font_size; ?>;
			font-weight:	lighter;
			color:			<?php echo $author_color; ?>;
			}
		 -->
		</style>
		<div class="c3rq">
		<?php
		// Display leading quote image
		if ($leading_quote == 'none') {
			echo '<div class="c3rq_quote">&ldquo;';
		}
		else {
			echo '<img src="'.plugins_url( '/images/quote-'.$leading_quote.'.png', __FILE__ ).'" align="left"/><div class="c3rq_quote">';
		}
		
		// Query db for page titled Quotes For Widget
		global $wpdb;
		$allquotes = $wpdb->get_var( "SELECT post_content FROM $wpdb->posts WHERE post_title = 'Quotes For Widget' AND post_status = 'private' AND post_type = 'page'" );
		// If page is found
		if ($allquotes){
			// Split array into separate lines
			$quotes = explode( "\r", $allquotes );
			// Select random quote and split into quote/author
			$quote = explode( "#",$quotes[ array_rand( $quotes ) ] );
		}
		// Set default quote to display
		else {
			$quote = array( 'No matter how much cats fight, there always seem to be plenty of kittens.', 'Abraham Lincoln' );
		}
		// Write the quote into the page
		?>
		<?php echo $quote[0]; ?>&rdquo;</div><div class="c3rq_author">&nbsp;--&nbsp;<?php echo trim( $quote[1] ); ?></div>
		</div>
	<?php
	}
		
	// Update Settings //
 
	function update($new_instance, $old_instance) {
		$instance['leading_quote'] = strip_tags($new_instance['leading_quote']);
		$instance['widget_width'] = strip_tags($new_instance['widget_width']);
		$instance['font_size'] = strip_tags($new_instance['font_size']);
		$instance['quote_color'] = strip_tags($new_instance['quote_color']);
		$instance['author_color'] = strip_tags($new_instance['author_color']);
		return $instance;
	}
 
	// Widget Control Panel //
	
	function form($instance) {
		$defaults = array( 'show_quote' => 'on' );
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>
		<p>
			<label for="<?php echo $this->get_field_id('leading_quote'); ?>"><?php _e('Leading quotation mark image', 'c3rq'); ?>:</label>
			<select id="<?php echo $this->get_field_id('leading_quote'); ?>" name="<?php echo $this->get_field_name('leading_quote'); ?>" class="widefat" style="width:100%;">
				<option value="none" <?php selected('none', $instance['leading_quote']); ?>><?php _e('No image', 'c3rq'); ?></option>
				<option value="white" <?php selected('white', $instance['leading_quote']); ?>><?php _e('White', 'c3rq'); ?></option>
				<option value="black" <?php selected('black', $instance['leading_quote']); ?>><?php _e('Black', 'c3rq'); ?></option>
				<option value="gray" <?php selected('gray', $instance['leading_quote']); ?>><?php _e('Gray', 'c3rq'); ?></option>
				<option value="red" <?php selected('red', $instance['leading_quote']); ?>><?php _e('Red', 'c3rq'); ?></option>
				<option value="yellow" <?php selected('yellow', $instance['leading_quote']); ?>><?php _e('Yellow', 'c3rq'); ?></option>
				<option value="green" <?php selected('green', $instance['leading_quote']); ?>><?php _e('Green', 'c3rq'); ?></option>
				<option value="blue" <?php selected('blue', $instance['leading_quote']); ?>><?php _e('Blue', 'c3rq'); ?></option>
			</select>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('widget_width'); ?>"><?php _e('Width of quote widget', 'c3rq'); ?>:</label>
			<input class="widefat" id="<?php echo $this->get_field_id('widget_width'); ?>" name="<?php echo $this->get_field_name('widget_width'); ?>" type="text" value="<?php echo $instance['widget_width']; ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('font_size'); ?>"><?php _e('Font size', 'c3rq'); ?>:</label>
			<input class="widefat" id="<?php echo $this->get_field_id('font_size'); ?>" name="<?php echo $this->get_field_name('font_size'); ?>" type="text" value="<?php echo $instance['font_size']; ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('quote_color'); ?>"><?php _e('Font color of quote', 'c3rq'); ?>:</label>
			<input class="widefat" id="<?php echo $this->get_field_id('quote_color'); ?>" name="<?php echo $this->get_field_name('quote_color'); ?>" type="text" value="<?php echo $instance['quote_color']; ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('author_color'); ?>"><?php _e('Font color of author', 'c3rq'); ?>:</label>
			<input class="widefat" id="<?php echo $this->get_field_id('author_color'); ?>" name="<?php echo $this->get_field_name('author_color'); ?>" type="text" value="<?php echo $instance['author_color']; ?>" />
		</p>
    <?php }
}

// End class c3rq_widget

add_action('widgets_init', create_function('', 'return register_widget("c3rq_widget");'));