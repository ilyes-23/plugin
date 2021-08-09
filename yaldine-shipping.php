<?php

/**
 * Plugin Name: Easybox Yaldine Shipping
 * Plugin URI: **
 * Author: EasyBox
 * Author URI: **
 * Description: Easybox yaldine Shipping plugin
 * Version: 0.0.1
 * */

add_action('woocommerce_shipping_init', 'easybox_yaldine_shipping_init');

function easybox_yaldine_shipping_init()
{
    if (!class_exists('WC_EASYBOX_YALDINE_SHIPPING')) {
        class WC_EASYBOX_YALDINE_SHIPPING extends WC_Shipping_Method
        {

            public function __construct()
            {
                $this->id                 = 'easybox_yaldine_shipping'; // Id for your shipping method. Should be uunique.
                $this->method_title       = __('Easybox Yaldine Shipping');  // Title shown in admin
                $this->method_description = __('Description of your Easybox yaldine Shipping'); // Description shown in admin

                $this->enabled            = "yes"; // This can be added as an setting but for this example its forced enabled
                $this->title              = " Easybox Yaldine Shipping"; // This can be added as an setting but for this example its forced.

                $this->init();
            }

            public function init()
            {
                // Load the settings API
                $this->init_form_fields(); // This is part of the settings API. Override the method to add your own settings
                $this->init_settings(); // This is part of the settings API. Loads settings you previously init.

                // Save settings in admin if you have any defined
                add_action('woocommerce_update_options_shipping_' . $this->id, array($this, 'process_admin_options'));
            }

            public function calculate_shipping($package = array())
            {

                $rate = array(
                    'label' => $this->title,
                    'cost' => '10.99',
                    'calc_tax' => 'per_item'
                );

                // Register the rate
                $this->add_rate($rate);
            }
        }
    }
}

add_filter('woocommerce_shipping_methods', 'add_easybox_yaldine_method');

function add_easybox_yaldine_method($methods)
{
    $methods['easybox_yaldine_shipping'] = 'WC_EASYBOX_YALDINE_SHIPPING';
    return $methods;
}
