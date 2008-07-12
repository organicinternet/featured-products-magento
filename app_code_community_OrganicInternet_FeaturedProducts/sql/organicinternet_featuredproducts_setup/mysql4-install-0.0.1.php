<?php

$installer = $this;
$installer->addAttribute('catalog_product', 'oi_featured_product_order', array(
    'type'           => 'int',
    'backend_type'   => 'int',
    'label'          => 'Featured Product Order',
    'global'         => true,
    'default'        => null,
    'frontend_class' => 'validate-digits',
    'visible'        => false,
    'required'       => false,
    'user_defined'   => false,
));


