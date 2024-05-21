<?php
/**
 * Copyright (c) KozakGroup, Inc. 2020. All rights reserved.
 * Developed by Dmitry Draievskiy
 */
declare(strict_types=1);

namespace KozakGroup\UiGridForm\Api\Data;

/**
 * Interface RecordInterface
 */
interface RecordInterface
{
    /**#@+
     * Constants for keys of data array. Identical to the name of the getter in snake case
     */
    const RECORD_ID             = 'record_id';
    const RECORD_NAME           = 'record_name';
    const RECORD_SELECT_FIELD   = 'record_select_field';
    const RECORD_STRING_FIELD   = 'record_string_field';
    const RECORD_TABLE_FIELD    = 'record_table_field';
    /**#@-*/

    /**
     * Get record_id
     *
     * @return int|null
     */
    public function getId();

    /**
     * Get record_name
     *
     * @return string|null
     */
    public function getRecordName();

    /**
     * Get record_select_field
     *
     * @return int|null
     */
    public function getRecordSelectField();

    /**
     * Get record_string_field
     *
     * @return string|null
     */
    public function getRecordStringField();

    /**
     * Get record_table_field
     *
     * @return string|null
     */
    public function getRecordTableField();

    /**
     * Set record_id
     *
     * @param int $id
     * @return RecordInterface
     */
    public function setId($id);

    /**
     * Set record_name
     *
     * @param string $recordName
     * @return RecordInterface
     */
    public function setRecordName($recordName): RecordInterface;

    /**
     * Set record_select_field
     *
     * @param int $recordSelectField
     * @return RecordInterface
     */
    public function setRecordSelectField($recordSelectField): RecordInterface;

    /**
     * Set record_string_field
     *
     * @param string $recordStringField
     * @return RecordInterface
     */
    public function setRecordStringField($recordStringField): RecordInterface;

    /**
     * Set record_table_field
     *
     * @param string $recordTableField
     * @return RecordInterface
     */
    public function setRecordTableField($recordTableField): RecordInterface;
}
