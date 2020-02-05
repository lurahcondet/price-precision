<?php

/**
 * Xtendable_PricePrecision
 *
 * @see    README.md
 * @author Didi Kusnadi<jalapro08@gmail.com>
 *
 */

namespace Xtendable\PricePrecision\Helper;
 
/**
 * class Data
 */
class Data extends \Magento\Framework\App\Helper\AbstractHelper
{
    /**
     * default precission
     */
    const DEFAULT_PRECISION = 2;

    /**
     * default precission
     */
    const DEFAULT_QTY_PRECISION = 3;

    /**
     * @var \Magento\Framework\App\ScopeResolverInterface
     */
    protected $scopeResolver;

    /**
     * @var \Magento\Directory\Model\CurrencyFactory
     */
    protected $currencyFactory;

    /**
     * @var \Xtendable\PricePrecision\Model\Config\Source\Precision
     */
    protected $precisionConfig;

    /**
     * @param \Magento\Framework\App\Helper\Context $context
     * @param \Magento\Framework\App\ScopeResolverInterface $scopeResolver
     * @param \Magento\Directory\Model\CurrencyFactory $currencyFactory
     * @param \Xtendable\PricePrecision\Model\Config\Source\Precision $precisionConfig
     */
    public function __construct(
        \Magento\Framework\App\Helper\Context $context,
        \Magento\Framework\App\ScopeResolverInterface $scopeResolver,
        \Magento\Directory\Model\CurrencyFactory $currencyFactory,
        \Xtendable\PricePrecision\Model\Config\Source\Precision $precisionConfig
    ) {
        parent::__construct($context);
        $this->scopeResolver = $scopeResolver;
        $this->currencyFactory = $currencyFactory;
        $this->precisionConfig = $precisionConfig;
    }

    /**
     * Return store configuration value
     *
     * @param string $path
     * @return mixed
     */
    protected function getConfigValue($path)
    {
        return $this->scopeConfig->getValue(
            $path,
            \Magento\Framework\App\ScopeInterface::SCOPE_DEFAULT
        );
    }

    /**
     * get precission
     * @param  string|null $currencyCode
     * @return int
     */
    public function getPrecisionByCurrency($currencyCode = null)
    {
        $currencyCode = $this->getCurrencyCode($currencyCode);
        return $this->precisionConfig->getCurrencyPrecision($currencyCode);
    }

    /**
     * get currency code
     * @param  string $currencyCode
     * @return string
     * @SuppressWarnings(PHPMD.ElseExpression)
     */
    protected function getCurrencyCode($currencyCode)
    {
        if ($currencyCode) {
            $currency = $this->currencyFactory->create()->load($currencyCode);
        } else {
            $currency = $this->scopeResolver->getScope()->getCurrentCurrency();
        }

        return $currency->getCode();
    }
}
