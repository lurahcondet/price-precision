<?php

/**
 * Xtendable_PricePrecision
 *
 * @see    README.md
 * @author Didi Kusnadi<jalapro08@gmail.com>
 *
 */

namespace Xtendable\PricePrecision\Plugin;

class AbstractClass
{
    /**
      * @var \Magento\Framework\Registry
      */
    protected $registry;

    /**
     * @var \Xtendable\PricePrecision\Helper\Data
     */
    protected $helper;

    /**
     * @param \Xtendable\PricePrecision\Helper\Data $helper
     * @param \Magento\Framework\Registry $registry
     */
    public function __construct(
        \Xtendable\PricePrecision\Helper\Data $helper,
        \Magento\Framework\Registry $registry
    ) {
        $this->helper = $helper;
        $this->registry = $registry;
    }
}
