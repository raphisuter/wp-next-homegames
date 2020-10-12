<?php

/**
 * Plugin Name: Next Homegames Widget Plugin
 * Plugin URI: https://github.com/raphisuter/jsNextGames
 * Description: Loads next home games of your FC and displays currents gameweeks home games
 * Version: 1.0
 * Author: Raphael Suter
 * Author URI: https://github.com/raphisuter
 */

// The widget class
class Next_Homegames_Widget extends WP_Widget
{

    // Main constructor
    public function __construct()
    {
        parent::__construct(
            'next_homegames_widget',
            __('Next Homegames Widget', 'text_domain'),
            array(
                'customize_selective_refresh' => true,
            )
        );
    }

    // The widget form (for the backend )
    public function form($instance)
    {
        /* ... */
    }

    // Update widget settings
    public function update($new_instance, $old_instance)
    {
        /* ... */
    }

    // Display the widget
    public function widget($args, $instance)
    {
        extract($args);

        // WordPress core before_widget hook (always include )
        echo $before_widget;

        // Display the widget
        echo '<div class="widget-text wp_widget_plugin_box" style="visibility: hidden;background-color: #EBEBEB;">';

        //do some css
        echo '<style>';
        echo '#upcoming-games {margin: 6px 10px 6px 6px;}';
        echo '.sppTitel {background-color: #D0D0D0;padding: 2px 0px 2px 6px;}';
        echo '.time{width: 15%; float: left;}';
        echo '.spiel{padding: 2px 0px 2px 6px;}';
        echo '.teams{width: 85%; float: left;}';
        echo '.teamA {width: 40%; float: left; white-space:nowrap;overflow: hidden;}';
        echo '.goaldivider {float: left; width: 6%; text-align: center;}';
        echo '.teamB {width: 54%; float: left; white-space:nowrap;overflow: hidden;}';
        echo '.font-small {font-style: italic;font-size: smaller;}';
        echo '</style>';

        // Display widget title if defined
        echo '<h5 class="widget-title" style="color: #FFF;font-size: 23px;background: #dc1e1e;display: block;padding: 0 20px;line-height: 55px;font-weight: normal;">Nächste Heimspiele</h5>';

        echo '<script src="/wp-content/plugins/wp-next-homegames/homeGameLoader.js"></script>';

        echo '<ol id="upcoming-games"></ol>';

        echo '</div>';

        // WordPress core after_widget hook (always include )
        echo $after_widget;
    }
}

// Register the widget
function my_register_custom_widget()
{
    register_widget('Next_Homegames_Widget');
}
add_action('widgets_init', 'my_register_custom_widget');
