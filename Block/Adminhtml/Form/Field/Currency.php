<?php

/**
 * Xtendable_PricePrecision
 *
 * @see    README.md
 * @author Didi Kusnadi<jalapro08@gmail.com>
 *
 */

namespace Xtendable\PricePrecision\Block\Adminhtml\Form\Field;

use Magento\Config\Block\System\Config\Form\Field\FieldArray\AbstractFieldArray;

/**
 * Class Currency
 * @SuppressWarnings(PHPMD)
 */
class Currency extends AbstractFieldArray
{
    /**
     * @var \Xtendable\PricePrecision\Block\Adminhtml\Form\Field\Currency\SourceFactory
     */
    protected $currency;

    /**
     * @param \Magento\Backend\Block\Template\Context $context
     * @param \Xtendable\PricePrecision\Block\Adminhtml\Form\Field\Currency\SourceFactory $currency
     * @param array $data
     */
    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Xtendable\PricePrecision\Block\Adminhtml\Form\Field\Currency\SourceFactory $currency,
        array $data = []
    ) {
        $this->currency = $currency;
        parent::__construct($context, $data);
    }

    /**
     * {@inheritdoc}
     */
    protected function _prepareToRender()
    {
        $this->addColumn('currency', ['label' => __('Currency'), 'class' => 'required-entry', 'renderer' => $this->currency->create()]);
        $this->addColumn('precision', ['label' => __('Precision'), 'class' => 'required-entry validate-number']);
        $this->_addAfter = false;
        $this->_addButtonLabel = __('Add');
    }
}
