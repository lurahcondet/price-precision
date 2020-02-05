<?php

/**
 * Xtendable_PricePrecision
 *
 * @see    README.md
 * @author Didi Kusnadi<jalapro08@gmail.com>
 *
 */

namespace Xtendable\PricePrecision\Plugin\Directory\Model;
/**
 * Class PriceCurrency
 */
// @codingStandardsIgnoreFile
class PriceCurrency extends \Xtendable\PricePrecision\Plugin\AbstractClass
{
    /**
     * Before Convert And Round
     * @param \Magento\Directory\Model\PriceCurrency $subject
     * @param float $amount
     * @param null|string|bool|int|\Magento\Framework\App\ScopeInterface $scope
     * @param \Magento\Framework\Model\AbstractModel|string|null $currency
     * @param int $precision
     * @return mixed
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    public function beforeConvertAndRound(
        \Magento\Directory\Model\PriceCurrency $subject,
        $amount,
        $scope = null,
        $currency = null,
        $precision = \Magento\Directory\Model\PriceCurrency::DEFAULT_PRECISION
    ) {
        $atCurrency = $subject->getCurrencySymbol($scope, $currency);
        $atPrecision = $this->helper->getPrecisionByCurrency($atCurrency);
        return [$amount, $scope, $currency, $atPrecision];
    }

    /**
     * before format
     * @param \Magento\Directory\Model\PriceCurrency $subject
     * @param float $amount
     * @param bool $includeContainer
     * @param int $precision
     * @param null|string|bool|int|\Magento\Framework\App\ScopeInterface $scope
     * @param \Magento\Framework\Model\AbstractModel|string|null $currency
     * @return mixed
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    public function beforeFormat(
        \Magento\Directory\Model\PriceCurrency $subject,
        $amount,
        $includeContainer = true,
        $precision = \Magento\Directory\Model\PriceCurrency::DEFAULT_PRECISION,
        $scope = null,
        $currency = null
    ) {
        $atCurrency = $subject->getCurrencySymbol($scope, $currency);
        $atPrecision = $this->helper->getPrecisionByCurrency($atCurrency);
        return [$amount, $includeContainer, $atPrecision, $scope, $currency];
    }

    /**
     * after round
     * @param  \Magento\Directory\Model\PriceCurrency $subject
     * @param  float $result
     * @param  float $price
     * @return float
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    public function afterRound(
        \Magento\Directory\Model\PriceCurrency $subject,
        $result,
        $price
    ) {
        $precision = $this->helper->getPrecisionByCurrency();
        return round($price, $precision);
    }
}
