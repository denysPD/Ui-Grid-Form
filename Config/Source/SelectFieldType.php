<?php
/**
 * Copyright (c) KozakGroup, Inc. 2020. All rights reserved.
 * Developed by Dmitry Draievskiy
 */
declare(strict_types=1);

namespace KozakGroup\UiGridForm\Config\Source;

use Magento\Framework\Data\OptionSourceInterface;
use KozakGroup\UiGridForm\Model\Record;

/**
 * Class SelectFieldType
 */
class SelectFieldType implements OptionSourceInterface
{
    public function toOptionArray()
    {
        return [
            [
                'value' => Record::RECORD_SELECT_VALUE_1,
                'label' => __('Value #1'),
            ],
            [
                'value' => Record::RECORD_SELECT_VALUE_2,
                'label' => __('Value #2'),
            ],
        ];
    }
}
