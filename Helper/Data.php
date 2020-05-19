<?php

namespace Redpa2ya\Rer\Helper;

use Redpa2ya\Base\Helper\AbstractData as AbstractData;

/**
 * Class Data
 * @package Redpa2ya\Rer\Helper
 * @author Hoai Ngo <hoainp08@gmail.com>
 */
class Data extends AbstractData
{
    const CONFIG_MODULE_PATH = 'redpa2ya_rer';

    /**
     * @return boolean
     */
    public function isModuleEnabled()
    {
        return parent::isEnabled();
    }
}
