<?php
/**
 * Copyright (c) KozakGroup, Inc. 2020. All rights reserved.
 * Developed by Dmitry Draievskiy
 */
declare(strict_types=1);

namespace KozakGroup\UiGridForm\Model;

use KozakGroup\UiGridForm\Api\Data\RecordInterface;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Model\AbstractModel;

/**
 * Class Record
 */
class Record extends AbstractModel implements RecordInterface
{
    const RECORD_SELECT_VALUE_1 = 1;
    const RECORD_SELECT_VALUE_2 = 2;

    /**
     * Prefix of model events names
     *
     * @var string
     */
    protected $_eventPrefix = 'kozakgroup_uigridform_example';

    /**
     * Construct.
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(ResourceModel\Record::class);
    }

    /**
     * Get ID
     *
     * @return int|null
     */
    public function getId()
    {
        return $this->getData(self::RECORD_ID);
    }

    /**
     * Get record_name
     *
     * @return string
     */
    public function getRecordName()
    {
        return (string) $this->getData(self::RECORD_NAME);
    }

    /**
     * Get record_select_field
     *
     * @return int
     */
    public function getRecordSelectField()
    {
        return (string) $this->getData(self::RECORD_SELECT_FIELD);
    }

    /**
     * Get record_string_field
     *
     * @return string|null
     */
    public function getRecordStringField()
    {
        return $this->getData(self::RECORD_STRING_FIELD);
    }

    /**
     * Get record_table_field
     *
     * @return string|null
     */
    public function getRecordTableField()
    {
        return $this->getData(self::RECORD_TABLE_FIELD);
    }

    /**
     * Set record_id
     *
     * @param int $id
     * @return RecordInterface
     */
    public function setId($id): RecordInterface
    {
        return $this->setData(self::RECORD_ID, $id);
    }

    /**
     * Set record_name
     *
     * @param string $recordName
     * @return RecordInterface
     */
    public function setRecordName($recordName): RecordInterface
    {
        return $this->setData(self::RECORD_NAME, $recordName);
    }

    /**
     * Set record_select_field
     *
     * @param int $recordSelectField
     * @return RecordInterface
     */
    public function setRecordSelectField($recordSelectField): RecordInterface
    {
        return $this->setData(self::RECORD_SELECT_FIELD, $recordSelectField);
    }

    /**
     * Set record_string_field
     *
     * @param string $recordStringField
     * @return RecordInterface
     */
    public function setRecordStringField($recordStringField): RecordInterface
    {
        return $this->setData(self::RECORD_STRING_FIELD, $recordStringField);
    }

    /**
     * Set record_table_field
     *
     * @param string $recordTableField
     * @return RecordInterface
     */
    public function setRecordTableField($recordTableField): RecordInterface
    {
        return $this->setData(self::RECORD_TABLE_FIELD, $recordTableField);
    }
}
