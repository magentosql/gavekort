<?php  

class Ewall_GavekortShip_Model_Carrier_Gavekortno extends Mage_Shipping_Model_Carrier_Abstract implements Mage_Shipping_Model_Carrier_Interface
{
	protected $_code = 'gavekortno';  
  
	/** 
	* Collect rates for this shipping method based on information in $request 
	* 
	* @param Mage_Shipping_Model_Rate_Request $data 
	* @return Mage_Shipping_Model_Rate_Result 
	*/  
	public function collectRates(Mage_Shipping_Model_Rate_Request $request){  
		$result = Mage::getModel('shipping/rate_result');  
		$method = Mage::getModel('shipping/rate_result_method');  
		$method->setCarrier($this->_code);  
		$method->setCarrierTitle($this->getConfigData('title'));
		$method->setMethod($this->_code);  
		$method->setMethodTitle($this->getConfigData('name'));
		if(!$price = $this->getConfigData('price'))
			$price = 0;
		$method->setPrice($price);
		$method->setCost($price);
		$result->append($method);  
		return $result;  
	}  

	/**
	 * Get allowed shipping methods
	 *
	 * @return array
	 */
	public function getAllowedMethods()
	{
		return array($this->_code=>$this->getConfigData('name'));
	}
}
