<?php

/**
 * Xtendable_PricePrecision
 *
 * @see    README.md
 * @author Didi Kusnadi<jalapro08@gmail.com>
 *
 */

namespace Xtendable\PricePrecision\Plugin\Product\Form\Modifier;
/**
 * Class PriceCurrency
 */
// @codingStandardsIgnoreFile
class Eav
{
    /**
      * @var \Magento\Framework\Registry
      */
    protected $registry;

    /**
     * @param \Magento\Framework\Registry $registry
     */
    public function __construct(
        \Magento\Framework\Registry $registry
    ) {
        $this->registry = $registry;
    }

    /**
     * Before modifyMeta
     * @param \Magento\Catalog\Ui\DataProvider\Product\Form\Modifier\Eav $subject
     * @param array $data
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    public function beforeModifyData(
        \Magento\Catalog\Ui\DataProvider\Product\Form\Modifier\Eav $subject,
        array $data
    ) {
        if (!$this->registry->registry('nosymbol')) {
            $this->registry->register('nosymbol', 1);
        }
    }

    /**
     * Before modifyMeta
     * @param \Magento\Catalog\Ui\DataProvider\Product\Form\Modifier\Eav $subject
     * @param array $data
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    public function afterModifyData(
        \Magento\Catalog\Ui\DataProvider\Product\Form\Modifier\Eav $subject,
        $result
    ) {
        if ($this->registry->registry('nosymbol')) {
            $this->registry->unregister('nosymbol');
        }

        return $result;
    }    
}
