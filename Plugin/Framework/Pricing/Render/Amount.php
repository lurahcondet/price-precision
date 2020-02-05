<?php

/**
 * Xtendable_PricePrecision
 *
 * @see    README.md
 * @author Didi Kusnadi<jalapro08@gmail.com>
 *
 */

namespace Xtendable\PricePrecision\Plugin\Framework\Pricing\Render;

use Magento\Framework\Pricing\PriceCurrencyInterface;
/**
 * Class Amount
 */
// @codingStandardsIgnoreFile
class Amount extends \Xtendable\PricePrecision\Plugin\AbstractClass
{
    /**
     * before format currency
     * @param  \Magento\Framework\Pricing\Render\Amount $subject
     * @param  float $amount
     * @param  boolean $includeContainer
     * @param  int $precision
     * @return mixed
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
	public function beforeFormatCurrency(
	    \Magento\Framework\Pricing\Render\Amount $subject,
	    $amount,
	    $includeContainer = true,
	    $precision = PriceCurrencyInterface::DEFAULT_PRECISION
	 ) {
	  	$currency = $subject->getDisplayCurrencyCode();
	  	$precision = $this->helper->getPrecisionByCurrency($currency);
	    return [$amount, $includeContainer, $precision];
	}
}