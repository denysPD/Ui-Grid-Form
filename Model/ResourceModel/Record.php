<?php
/**
 * Copyright (c) KozakGroup, Inc. 2020. All rights reserved.
 * Developed by Dmitry Draievskiy
 */
declare(strict_types=1);

namespace KozakGroup\UiGridForm\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;
use KozakGroup\UiGridForm\Api\Data\RecordInterface;

/**
 * Class Record
 */
class Record extends AbstractDb
{
    protected function _construct()
    {
        $this->_init('kozakgroup_uigridform_example', RecordInterface::RECORD_ID);
    }
}
