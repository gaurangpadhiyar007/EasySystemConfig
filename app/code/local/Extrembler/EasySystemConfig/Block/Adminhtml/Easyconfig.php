<?php
/**
* @category Extrembler
* @package Extrembler_EasySystemConfig
* @author  Extrembler <gaurangpadhiyar1993@gmail.com>
*/
class Extrembler_EasySystemConfig_Block_Adminhtml_Easyconfig extends Mage_Adminhtml_Block_Template
{
	/**
	* System Configuration Url
	* @return url
	*/
	public function systemConfigurationUrl()
	{
		return $this->getUrl('*/system_config');
	}

	/**
	* Index Management Url
	* @return url
	*/
	public function reindexUrl()
	{
		return $this->getUrl('*/process/list');	
	}
	
	/**
	* Flush Magento Cache Clean Url
	* @return url
	*/
	public function flushSystemUrlCacheClean()
	{
		return $this->getUrl('easysystemconfig/adminhtml_cleancache/flushSystem');
	}
	
	/**
	* Flush Catalog Image Cache Clean Url
	* @return url
	*/
	public function catalogImageCacheClean()
	{
		return $this->getUrl('easysystemconfig/adminhtml_cleancache/cleanImages');
	}

	/**
	* Flush Catalog Clean Swatch Cache Clean Url
	* @return url
	*/
	public function cleanSwatchesCacheClean()
	{
		return $this->getUrl('easysystemconfig/adminhtml_cleancache/cleanSwatches');
	}

	/**
	* Flush Javascript/Css Cache Clean Url
	* @return url
	*/
	public function cleanMediaCacheClean()
	{
		return $this->getUrl('easysystemconfig/adminhtml_cleancache/cleanMedia');
	}
}
