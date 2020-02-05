<?php

/**
 * Xtendable_PricePrecision
 *
 * @see    README.md
 * @author Didi Kusnadi<jalapro08@gmail.com>
 *
 */
 
namespace Xtendable\PricePrecision\Model\Config\Source;

/**
 * class Precision
 */
class Precision extends \Magento\Framework\DataObject
{
    /**
     * @var \Magento\Framework\App\Config\ScopeConfigInterface
     */
    protected $scopeConfig;

    /**
     * @var \Magento\Framework\Serialize\Serializer\Json
     */
    protected $json;

    /**
     * @var array
     */
    protected $currencies;

    /**
     * @param \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig
     * @param \Magento\Framework\Serialize\Serializer\Json $json
     */
    public function __construct(
        \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig,
        \Magento\Framework\Serialize\Serializer\Json $json
    ) {
        $this->scopeConfig = $scopeConfig;
        $this->json = $json;
    }

    /**
     * get currency precission
     * @param  string $index
     * @return array
     */
    public function getCurrencyPrecision($currencyCode = 'USD')
    {
        $currencyPrecision = (int)$this->scopeConfig->getValue('currency/options/default_precision');
        try {
            if (!$this->currencies) {
                $configPrecision = $this->json->unserialize($this->scopeConfig->getValue('currency/options/currency_precision'));
                foreach ($configPrecision as $config) {
                    //print_r($config);
                    $this->currencies[$config['currency']] = $config['precision'];
                }
            }
            $currencyPrecision = $this->currencies[$currencyCode];
        } catch (\Exception $e) {
            //
        }
        // var_dump($currencyCode);
        // var_dump($this->scopeConfig->getValue('currency/options/currency_precisions'));
        // var_dump($currencyPrecision);
        return $currencyPrecision;
    }
}
