<?php
class Custom_Woo_Shipping_Class_Fields
{
    /**
     * Initialize Hooks.
     *
     * @access public
     */
    public function run()
    {
        //loc: woocommerce/includes/admin/settings/class-wc-settings-shipping.php #adding coulmns to list header
        add_filter('woocommerce_shipping_classes_columns', array ($this, 'display_field_name_in_list_header' ), 11, 1);


        //loc: woocommerce/includes/admin/settings/views/html-admin-page-shipping-classes.php
        // action('woocommerce_shipping_classes_column_'.$class)
        add_action('woocommerce_shipping_classes_column_kt-new-field-a', array($this, 'display_field_view'), 10);
        add_action('woocommerce_shipping_classes_column_kt-new-field-b', array($this, 'display_field_view'), 10);

    }

    /**
     * Adding New Columns to List Table's Header
     *
     * @param array $shipping_class_columns
     * @return array modified $shipping_class_columns
     */
    public function display_field_name_in_list_header($shipping_class_columns)
    {

        $shipping_class_columns['kt-new-field-a'] = __('Field A', 'kt-12');
        $shipping_class_columns['kt-new-field-b'] = __('Field B', 'kt-12');

        /** Uncomment the following two line to re-positioning Prodcut Count to the last **/
        // unset($shipping_class_columns['wc-shipping-class-count']);
        // $shipping_class_columns['wc-shipping-class-count'] = __('Product count', 'woocommerce');
        return $shipping_class_columns;
    }


    public function display_field_view()
    {
        /**
         * The fields are rendred in the front-end and `data` is a localized variable
         * You can find it in //loc: woocommerce/assets/js/admin/wc-shipping-classes.js
         * Localization code can be found in //loc: woocommerce/includes/admin/settings/views/html-admin-page-shipping-classes.php
         */
        $current_action = current_filter();
        $class = str_replace("woocommerce_shipping_classes_column_", "", $current_action);
        switch ($class) {
            case 'kt-new-field-a':
                ?>
					<div class="view">{{ data.fielda }}</div>
					<div class="edit"><input type="text" name="fielda[{{ data.term_id }}]" data-attribute="fielda" value="{{ data.fielda }}" placeholder="<?php esc_attr_e('Text for Field A', 'kt-12'); ?>" /></div>
                <?php
             break;
            case 'kt-new-field-b':
                ?>
                    <div class="view">{{ data.fieldb }}</div>
                    <div class="edit"><input type="text" name="fieldb[{{ data.term_id }}]" data-attribute="fieldb" value="{{ data.fieldb }}" placeholder="<?php esc_attr_e('Text for Field B', 'kt-12'); ?>" /></div>
                <?php
                break;
            default:
                break;
        }
    }





}
