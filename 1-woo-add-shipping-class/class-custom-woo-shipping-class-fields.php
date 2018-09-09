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
        add_filter('woocommerce_shipping_classes_columns', array ($this, 'column_in_table_head' ), 11, 1);
    }

    /**
     * Adding New Columns to List Table's Header
     *
     * @param array $shipping_class_columns
     * @return array modified $shipping_class_columns
     */
    public function column_in_table_head($shipping_class_columns)
    {

        $shipping_class_columns['wc-shipping-class-new-field-a'] = __('Field A', 'kt-12');
        $shipping_class_columns['wc-shipping-class-new-field-b'] = __('Field B', 'kt-12');

        /** Uncomment the following two line to re-positioning Prodcut Count to the last **/
        // unset($shipping_class_columns['wc-shipping-class-count']);
        // $shipping_class_columns['wc-shipping-class-count'] = __('Product count', 'woocommerce');
        return $shipping_class_columns;
    }



}
