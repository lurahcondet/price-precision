<?php

/**
 * Xtendable_PricePrecision
 *
 * @see    README.md
 * @author Didi Kusnadi<jalapro08@gmail.com>
 *
 */

namespace Xtendable\PricePrecision\Plugin\Framework\Locale;

/**
 * Class Format
 */
// @codingStandardsIgnoreFile
class Format extends \Xtendable\PricePrecision\Plugin\AbstractClass
{
    /**
     * after get price format
     * @param  \Magento\Framework\Locale\Format $subject
     * @param  mixed $result
     * @return mixed
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
	public function afterGetPriceFormat(\Magento\Framework\Locale\Format $subject, $result) 
	{
		$precision = $this->helper->getPrecisionByCurrency();

		$result['precision'] = $precision;
		$result['requiredPrecision'] = $precision;

		return $result;
	}
}