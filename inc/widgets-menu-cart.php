<?php
/*
Plugin Name: Karol K's Tag Cloud Widget
Description: Displays a nice tag cloud.
Plugin URI: http://newinternetorder.com/plugins
Version: 1.0
Author: Karol K
Author URI: http://karol.cc/
License: GNU General Public License v2 or later
*/

class ti_widget_menucart extends WP_Widget {
    public function __construct() {
       $widget_ops = array(
           'classname' => 'ti_widget_menucart',
           'description' => 'Agrega un menu que muestra el carrito de compra',
       );
        //$control_ops = array();
        parent::__construct('ti_widget_menucart', 'Menu cuenta y carrito', $widget_ops);

        
    }

    public function widget($args, $instance) {
        extract($args);

        $cuenta = $instace['cuenta'] ? ' true' : 'false';
        $cart = $instace['cart'] ? ' true' : 'false';

       
        // before and after widget arguments are defined by themes
        echo $args['before_widget'];
        
        ?>
            <ul id="menu-menu-cuenta-carrito" class="menu">
                <li id="menu-item-2146" class="micuenta menu-item menu-item-type-post_type menu-item-object-page menu-item-2146">
                    <a href="http://localhost/wordpress/mi-cuenta/">Mi cuenta</a>
                </li>
                <li id="menu-item-2147" class="carrito menu-item menu-item-type-post_type menu-item-object-page menu-item-2147">
                    <a href="http://localhost/wordpress/carrito/">Carrito</a>
                </li>
            </ul>
        <?php

        echo $args['after_widget'];

    }


    public function form($instance) {
        ?>
        
        <p>
            <input class="checkbox" type="checkbox" <?php checked( $instance['cuenta'], 'on'); ?> id="<?php echo $this->get_field_id('cuenta'); ?>" name="<?php echo $this->get_field_name('cuenta'); ?>" />
            <label for="<?php echo $this->get_field_id( 'cuenta' ); ?>">Cuenta</label>
        </p>
        <p>
            <input class="checkbox" type="checkbox" <?php checked( $instance['cart'], 'on'); ?> id="<?php echo $this->get_field_id('cart'); ?>" name="<?php echo $this->get_field_name('cart'); ?>" />
            <label for="<?php echo $this->get_field_id( 'cart' ); ?>">Carrito</label>
        </p>

        <?php 
    }
    
    public function update($new_instance, $old_instance) {
        // used when the user saves his/her widget options
        $instance = $old_instance;
        $instance['cuenta'] =  $new_instance['cuenta'] ;
        $instance['cart'] =  $new_instance['cart'] ;
        return $instance;
    
    }
}

// initiate the widget
function register_menucart_widget() {
    register_widget( 'ti_widget_menucart' );
}

// register the widget
add_action( 'widgets_init', 'register_menucart_widget' );