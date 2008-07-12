<?php

class OrganicInternet_FeaturedProducts_Block_Featured_Products extends Mage_Catalog_Block_Product_Abstract
{
    protected $_itemCollection;
    protected function _prepareData()
    {
        $collection = Mage::getResourceModel('catalog/product_collection');
        Mage::getModel('catalog/layer')->prepareProductCollection($collection);

        $collection->addAttributeToFilter('oi_featured_product_order', array('gt' => 0));        
        $collection->addCategoryFilter(Mage::getSingleton('catalog/layer')->getCurrentCategory());
        
        $collection->load();
        $this->_itemCollection = $collection;
        return $this;
    }
    
    protected function _beforeToHtml()
    {
        $this->_prepareData();
        return parent::_beforeToHtml();
    }

    public function getItems() {
        return $this->_itemCollection;
    }
    
    public function getTopFeaturedItem() {
        $collection = Mage::getResourceModel('catalog/product_collection');
        Mage::getModel('catalog/layer')->prepareProductCollection($collection);

        $collection->addAttributeToFilter('oi_featured_product_order', array('gt' => 0));        
        $collection->setPageSize(1);
        $collection->load();
        return $collection->getIterator()->current();
    }
}