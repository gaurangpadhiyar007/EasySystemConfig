<?php
/**
* @category Extrembler
* @package Extrembler_EasySystemConfig
* @author  Extrembler <gaurangpadhiyar1993@gmail.com>
*/
class Extrembler_EasySystemConfig_Adminhtml_CleancacheController extends Mage_Adminhtml_Controller_Action
{
	/**
     * Retrieve session model
     *
     * @return Mage_Adminhtml_Model_Session
     */
    protected function _getSession()
    {
        return Mage::getSingleton('adminhtml/session');
    }

	/**
     * Flush all magento cache
     */
    public function flushSystemAction()
    {
        Mage::app()->cleanCache();
        Mage::dispatchEvent('adminhtml_cache_flush_system');
        $this->_getSession()->addSuccess(Mage::helper('adminhtml')->__("The Magento cache storage has been flushed."));
        $this->_redirectreferer();
    }

	/**
     * Clean JS/css files cache
     */
    public function cleanMediaAction()
    {
        try {
            Mage::getModel('core/design_package')->cleanMergedJsCss();
            Mage::dispatchEvent('clean_media_cache_after');
            $this->_getSession()->addSuccess(
                Mage::helper('adminhtml')->__('The JavaScript/CSS cache has been cleaned.')
            );
        }
        catch (Exception $e) {
            $this->_getSession()->addException(
                $e,
                Mage::helper('adminhtml')->__('An error occurred while clearing the JavaScript/CSS cache.')
            );
        }
        catch (Mage_Core_Exception $e) {
            $this->_getSession()->addError($e->getMessage());
        }
        $this->_redirectreferer();
    }

    /**
     * Clean catalog files cache
     */
    public function cleanImagesAction()
    {
        try {
            Mage::getModel('catalog/product_image')->clearCache();
            Mage::dispatchEvent('clean_catalog_images_cache_after');
            $this->_getSession()->addSuccess(
                Mage::helper('adminhtml')->__('The image cache was cleaned.')
            );
        }
        catch (Mage_Core_Exception $e) {
            $this->_getSession()->addError($e->getMessage());
        }
        catch (Exception $e) {
            $this->_getSession()->addException(
                $e,
                Mage::helper('adminhtml')->__('An error occurred while clearing the image cache.')
            );
        }
        $this->_redirectreferer();
    }

    /**
     * Clean configurable swatches files cache
     */
    public function cleanSwatchesAction()
    {
        try {
            Mage::helper('configurableswatches/productimg')->clearSwatchesCache();
            Mage::dispatchEvent('clean_configurable_swatches_cache_after');
            $this->_getSession()->addSuccess(
                Mage::helper('adminhtml')->__('The configurable swatches image cache was cleaned.')
            );
        }
        catch (Mage_Core_Exception $e) {
            $this->_getSession()->addError($e->getMessage());
        }
        catch (Exception $e) {
            $this->_getSession()->addException(
                $e,
                Mage::helper('adminhtml')->__('An error occurred while clearing the configurable swatches image cache.')
            );
        }
        $this->_redirectreferer();
    }

    /**
     * Check if cache management is allowed
     *
     * @return bool
     */
    protected function _isAllowed()
    {
        return Mage::getSingleton('admin/session')->isAllowed('system/cache');
    }
}