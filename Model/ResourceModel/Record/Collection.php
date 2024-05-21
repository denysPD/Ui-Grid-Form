<?php
/**
 * Copyright (c) KozakGroup, Inc. 2020. All rights reserved.
 * Developed by Dmitry Draievskiy
 */
declare(strict_types=1);

namespace KozakGroup\UiGridForm\Model\ResourceModel\Record;

use KozakGroup\UiGridForm\Api\Data\RecordInterface;
use KozakGroup\UiGridForm\Model\Record;
use KozakGroup\UiGridForm\Model\ResourceModel\Record as ResourceProvider;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

/**
 * Class Collection
 */
class Collection extends AbstractCollection
{
    /**
     * @var string
     */
    protected $_idFieldName = RecordInterface::RECORD_ID;

    /**
     * Event prefix
     *
     * @var string
     */
    protected $_eventPrefix = 'kozakgroup_uigridform_example_collection';

    /**
     * Event object
     *
     * @var string
     */
    protected $_eventObject = 'record';

    /**
     * Initialization here
     *
     * @return void
     */
    protected function _construct(): void
    {
        $this->_init(Record::class, ResourceProvider::class);
    }

    /**
     * @param null $valueField
     * @param string $labelField
     * @param array $additional
     * @return array
     */
    protected function _toOptionArray($valueField = null, $labelField = 'name', $additional = [])
    {
        return parent::_toOptionArray(null, RecordInterface::RECORD_NAME);
    }
}
