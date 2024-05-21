<?php
/**
 * Copyright (c) KozakGroup, Inc. 2020. All rights reserved.
 * Developed by Dmitry Draievskiy
 */
declare(strict_types=1);

namespace KozakGroup\UiGridForm\Api;

use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Exception\LocalizedException;
use KozakGroup\UiGridForm\Api\Data\RecordInterface;
use KozakGroup\UiGridForm\Api\Data\RecordSearchResultsInterface;

/**
 * Interface RecordRepositoryInterface
 */
interface RecordRepositoryInterface
{
    /**
     * Save record.
     *
     * @param RecordInterface $record
     * @return RecordInterface
     * @throws LocalizedException
     */
    public function save(RecordInterface $record);

    /**
     * Retrieve record.
     *
     * @param int $recordId
     * @param bool $force
     * @return RecordInterface
     * @throws LocalizedException
     */
    public function getById($recordId, $force = true);

    /**
     * Retrieve provider matching the specified criteria.
     *
     * @param SearchCriteriaInterface $searchCriteria
     * @return RecordSearchResultsInterface
     * @throws LocalizedException
     */
    public function getList(SearchCriteriaInterface $searchCriteria);

    /**
     * Retrieve new empty instance of record.
     *
     * @return RecordInterface
     */
    public function getNew();

    /**
     * Delete record.
     *
     * @param RecordInterface $record
     * @return bool true on success
     * @throws LocalizedException
     */
    public function delete(RecordInterface $record);

    /**
     * Delete record by ID.
     *
     * @param int $recordId
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws LocalizedException
     */
    public function deleteById($recordId);
}
