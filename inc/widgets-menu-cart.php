<?php
/*
Plugin Name: Botones de autor y cart
Description: Muestra los botones de buscar, cuenta y carrito
Plugin URI: 
Version: 1.0
Author: Karol K
Author URI: http://codipix.com/
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

        $cuenta = $instance['cuenta'] ? ' true' : 'false';
        $cart = $instance['cart'] ? ' true' : 'false';

        $account_page_url='';
        	
        $account_page_url = wc_get_page_permalink( 'myaccount' );  
        
 
       
       
        $cart_url = wc_get_cart_url();//$woocommerce->cart->get_cart_url();

        // before and after widget arguments are defined by themes
        echo $args['before_widget'];
        
        ?>
            <ul id="menu-cuenta-carrito" class="menu">
                <li>
                    <a href="#/localhost" class="searchBTN">
                       <img alt="" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIj8+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgeG1sbnM6c3ZnanM9Imh0dHA6Ly9zdmdqcy5jb20vc3ZnanMiIHZlcnNpb249IjEuMSIgd2lkdGg9IjUxMiIgaGVpZ2h0PSI1MTIiIHg9IjAiIHk9IjAiIHZpZXdCb3g9IjAgMCA1MTIgNTEyIiBzdHlsZT0iZW5hYmxlLWJhY2tncm91bmQ6bmV3IDAgMCA1MTIgNTEyIiB4bWw6c3BhY2U9InByZXNlcnZlIiBjbGFzcz0iIj48Zz4KPGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KCTxnPgoJCTxwYXRoIGQ9Ik0yMjUuNDc0LDBDMTAxLjE1MSwwLDAsMTAxLjE1MSwwLDIyNS40NzRjMCwxMjQuMzMsMTAxLjE1MSwyMjUuNDc0LDIyNS40NzQsMjI1LjQ3NCAgICBjMTI0LjMzLDAsMjI1LjQ3NC0xMDEuMTQ0LDIyNS40NzQtMjI1LjQ3NEM0NTAuOTQ4LDEwMS4xNTEsMzQ5LjgwNCwwLDIyNS40NzQsMHogTTIyNS40NzQsNDA5LjMyMyAgICBjLTEwMS4zNzMsMC0xODMuODQ4LTgyLjQ3NS0xODMuODQ4LTE4My44NDhTMTI0LjEwMSw0MS42MjYsMjI1LjQ3NCw0MS42MjZzMTgzLjg0OCw4Mi40NzUsMTgzLjg0OCwxODMuODQ4ICAgIFMzMjYuODQ3LDQwOS4zMjMsMjI1LjQ3NCw0MDkuMzIzeiIgZmlsbD0iIzAxNTdjMyIgZGF0YS1vcmlnaW5hbD0iIzAwMDAwMCIgc3R5bGU9IiIvPgoJPC9nPgo8L2c+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+Cgk8Zz4KCQk8cGF0aCBkPSJNNTA1LjkwMiw0NzYuNDcyTDM4Ni41NzQsMzU3LjE0NGMtOC4xMzEtOC4xMzEtMjEuMjk5LTguMTMxLTI5LjQzLDBjLTguMTMxLDguMTI0LTguMTMxLDIxLjMwNiwwLDI5LjQzbDExOS4zMjgsMTE5LjMyOCAgICBjNC4wNjUsNC4wNjUsOS4zODcsNi4wOTgsMTQuNzE1LDYuMDk4YzUuMzIxLDAsMTAuNjQ5LTIuMDMzLDE0LjcxNS02LjA5OEM1MTQuMDMzLDQ5Ny43NzgsNTE0LjAzMyw0ODQuNTk2LDUwNS45MDIsNDc2LjQ3MnoiIGZpbGw9IiMwMTU3YzMiIGRhdGEtb3JpZ2luYWw9IiMwMDAwMDAiIHN0eWxlPSIiLz4KCTwvZz4KPC9nPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8L2c+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjwvZz4KPGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPC9nPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8L2c+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjwvZz4KPGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPC9nPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8L2c+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjwvZz4KPGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPC9nPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8L2c+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjwvZz4KPGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPC9nPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8L2c+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjwvZz4KPGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPC9nPgo8L2c+PC9zdmc+Cg==" />
                    </a>
                   
                </li>
                <li>
                    <a href="<?php echo $account_page_url; ?>">
                    <img alt="" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIj8+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgeG1sbnM6c3ZnanM9Imh0dHA6Ly9zdmdqcy5jb20vc3ZnanMiIHZlcnNpb249IjEuMSIgd2lkdGg9IjUxMiIgaGVpZ2h0PSI1MTIiIHg9IjAiIHk9IjAiIHZpZXdCb3g9IjAgMCA1MTIgNTEyIiBzdHlsZT0iZW5hYmxlLWJhY2tncm91bmQ6bmV3IDAgMCA1MTIgNTEyIiB4bWw6c3BhY2U9InByZXNlcnZlIiBjbGFzcz0iIj48Zz4KPGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KCTxnPgoJCTxwYXRoIGQ9Ik00MzcuMDIsMzMwLjk4Yy0yNy44ODMtMjcuODgyLTYxLjA3MS00OC41MjMtOTcuMjgxLTYxLjAxOEMzNzguNTIxLDI0My4yNTEsNDA0LDE5OC41NDgsNDA0LDE0OCAgICBDNDA0LDY2LjM5MywzMzcuNjA3LDAsMjU2LDBTMTA4LDY2LjM5MywxMDgsMTQ4YzAsNTAuNTQ4LDI1LjQ3OSw5NS4yNTEsNjQuMjYyLDEyMS45NjIgICAgYy0zNi4yMSwxMi40OTUtNjkuMzk4LDMzLjEzNi05Ny4yODEsNjEuMDE4QzI2LjYyOSwzNzkuMzMzLDAsNDQzLjYyLDAsNTEyaDQwYzAtMTE5LjEwMyw5Ni44OTctMjE2LDIxNi0yMTZzMjE2LDk2Ljg5NywyMTYsMjE2ICAgIGg0MEM1MTIsNDQzLjYyLDQ4NS4zNzEsMzc5LjMzMyw0MzcuMDIsMzMwLjk4eiBNMjU2LDI1NmMtNTkuNTUxLDAtMTA4LTQ4LjQ0OC0xMDgtMTA4UzE5Ni40NDksNDAsMjU2LDQwICAgIGM1OS41NTEsMCwxMDgsNDguNDQ4LDEwOCwxMDhTMzE1LjU1MSwyNTYsMjU2LDI1NnoiIGZpbGw9IiMwMTU3YzMiIGRhdGEtb3JpZ2luYWw9IiMwMDAwMDAiIHN0eWxlPSIiIGNsYXNzPSIiLz4KCTwvZz4KPC9nPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8L2c+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjwvZz4KPGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPC9nPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8L2c+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjwvZz4KPGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPC9nPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8L2c+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjwvZz4KPGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPC9nPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8L2c+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjwvZz4KPGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPC9nPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8L2c+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjwvZz4KPGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPC9nPgo8L2c+PC9zdmc+Cg==" />
                    </a>
                </li>
                <li class="mini-cart-wrapper dropdown ">
                    <a href="#<?php //echo $cart_url; ?>" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img alt="" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIj8+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgeG1sbnM6c3ZnanM9Imh0dHA6Ly9zdmdqcy5jb20vc3ZnanMiIHZlcnNpb249IjEuMSIgd2lkdGg9IjUxMiIgaGVpZ2h0PSI1MTIiIHg9IjAiIHk9IjAiIHZpZXdCb3g9IjAgMCA1MTIgNTEyIiBzdHlsZT0iZW5hYmxlLWJhY2tncm91bmQ6bmV3IDAgMCA1MTIgNTEyIiB4bWw6c3BhY2U9InByZXNlcnZlIiBjbGFzcz0iIj48Zz4KPGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KCTxnPgoJCTxwYXRoIGQ9Ik01MDcuNTE5LDExNi4zODRDNTAzLjcyMSwxMTEuNzEyLDQ5OC4wMjEsMTA5LDQ5MiwxMDlIMTI5LjczNmwtMS40ODQtMTMuNjMybC0wLjA1My0wLjQzOEMxMjEuMDk5LDQwLjgxMiw3NC41ODMsMCwyMCwwICAgIEM4Ljk1NCwwLDAsOC45NTQsMCwyMHM4Ljk1NCwyMCwyMCwyMGMzNC41MDYsMCw2My45MjMsMjUuNzQ5LDY4LjUxMiw1OS45MjhsMjMuNzczLDIxOC40MDFDOTEuNDk1LDMyNy43NjUsNzcsMzQ4LjcyMiw3NywzNzMgICAgYzAsMC4xNjcsMC4wMDIsMC4zMzQsMC4wMDYsMC41Qzc3LjAwMiwzNzMuNjY2LDc3LDM3My44MzMsNzcsMzc0YzAsMzMuMDg0LDI2LjkxNiw2MCw2MCw2MGg4LjEzOCAgICBjLTIuMDM0LDUuOTY0LTMuMTM4LDEyLjM1NS0zLjEzOCwxOWMwLDMyLjUzMiwyNi40NjcsNTksNTksNTlzNTktMjYuNDY4LDU5LTU5YzAtNi42NDUtMS4xMDQtMTMuMDM2LTMuMTM4LTE5aDg2LjI3NyAgICBjLTIuMDM0LDUuOTY0LTMuMTM4LDEyLjM1NS0zLjEzOCwxOWMwLDMyLjUzMiwyNi40NjcsNTksNTksNTljMzIuNTMzLDAsNTktMjYuNDY4LDU5LTU5YzAtMzIuNTMyLTI2LjQ2Ny01OS01OS01OUgxMzcgICAgYy0xMS4wMjgsMC0yMC04Ljk3Mi0yMC0yMGMwLTAuMTY3LTAuMDAyLTAuMzM0LTAuMDA2LTAuNWMwLjAwNC0wLjE2NiwwLjAwNi0wLjMzMywwLjAwNi0wLjVjMC0xMS4wMjgsOC45NzItMjAsMjAtMjBoMjU1LjMzMSAgICBjMzUuNTAzLDAsNjguMDg0LTIxLjk2Niw4My4wMDYtNTUuOTYyYzQuNDM5LTEwLjExNC0wLjE2MS0yMS45MTItMTAuMjc1LTI2LjM1MmMtMTAuMTE0LTQuNDM5LTIxLjkxMiwwLjE2MS0yNi4zNTIsMTAuMjc1ICAgIEM0MzAuMjk5LDMwMC4xMjUsNDExLjY2MSwzMTMsMzkyLjMzMSwzMTNoLTI0MC4zOUwxMzQuMDksMTQ5aDMzMy4zMDhsLTkuNzg2LDQ2LjkxNmMtMi4yNTUsMTAuODEzLDQuNjgyLDIxLjQwNywxNS40OTUsMjMuNjYyICAgIGMxLjM3NywwLjI4OCwyLjc1LDAuNDI2LDQuMTA0LDAuNDI2YzkuMjcyLDAsMTcuNTktNi40ODQsMTkuNTU4LTE1LjkybDE0LjgwOS03MUM1MTIuODA4LDEyNy4xOSw1MTEuMzE3LDEyMS4wNTYsNTA3LjUxOSwxMTYuMzg0ICAgIHogTTM5OSw0MzRjMTAuNDc3LDAsMTksOC41MjMsMTksMTlzLTguNTIzLDE5LTE5LDE5cy0xOS04LjUyMy0xOS0xOVMzODguNTIzLDQzNCwzOTksNDM0eiBNMjAxLDQzNGMxMC40NzcsMCwxOSw4LjUyNCwxOSwxOSAgICBjMCwxMC40NzctOC41MjMsMTktMTksMTlzLTE5LTguNTIzLTE5LTE5UzE5MC41MjMsNDM0LDIwMSw0MzR6IiBmaWxsPSIjMDE1N2MzIiBkYXRhLW9yaWdpbmFsPSIjMDAwMDAwIiBzdHlsZT0iIiBjbGFzcz0iIi8+Cgk8L2c+CjwvZz4KPGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPC9nPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8L2c+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjwvZz4KPGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPC9nPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8L2c+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjwvZz4KPGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPC9nPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8L2c+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjwvZz4KPGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPC9nPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8L2c+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjwvZz4KPGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPC9nPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8L2c+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjwvZz4KPC9nPjwvc3ZnPgo=" />
                        <span id="mini-cart-count" class="badge badge-primary rounded-circle"></span>
                    </a>
                   <!--<div id="header-quickcart"></div>-->
                    <div id="dropdownMenuMiniCart" class="dropdown-menu" aria-labelledby="dropdownMenuButton" >
                            <div id="header-quickcart"></div>
                       
                    </div>
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