<?php

/**
 * Xtendable_PricePrecision
 *
 * @see    README.md
 * @author Didi Kusnadi<jalapro08@gmail.com>
 *
 */

namespace Xtendable\PricePrecision\Plugin\Framework;

/**
 * Class Format
 */
// @codingStandardsIgnoreFile
class Currency extends \Xtendable\PricePrecision\Plugin\AbstractClass
{
    /**
     * after get price format
     * @param  \Magento\Framework\Locale\Format $subject
     * @param  mixed $result
     * @return mixed
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
	public function beforeToCurrency(\Magento\Framework\Currency $subject, $value = null, array $options = array()) 
	{
		$currency = $subject->getShortName();
		$precision = $this->helper->getPrecisionByCurrency($currency);

		$options['precision'] = $precision;
        
        if ($this->registry->registry('nosymbol')) {
			$options['format'] = "¤###0.00";
        }

		return [$value, $options];
	}
}