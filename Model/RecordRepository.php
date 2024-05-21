<?php
/**
 * Copyright (c) KozakGroup, Inc. 2020. All rights reserved.
 * Developed by Dmitry Draievskiy
 */
declare(strict_types=1);

namespace KozakGroup\UiGridForm\Model;

use KozakGroup\UiGridForm\Api\Data;
use KozakGroup\UiGridForm\Api\Data\RecordInterface;
use KozakGroup\UiGridForm\Api\Data\RecordSearchResultsInterface;
use KozakGroup\UiGridForm\Api\RecordRepositoryInterface;
use KozakGroup\UiGridForm\Model\ResourceModel\Record as ResourceProvider;
use KozakGroup\UiGridForm\Model\ResourceModel\Record\Collection;
use KozakGroup\UiGridForm\Model\ResourceModel\Record\CollectionFactory as RecordCollectionFactory;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;

class RecordRepository implements RecordRepositoryInterface
{
    /**
     * @var ResourceProvider
     */
    protected $resource;

    /**
     * @var RecordFactory
     */
    protected $recordFactory;

    /**
     * @var RecordCollectionFactory
     */
    protected $recordCollectionFactory;

    /**
     * @var Data\RecordSearchResultsInterfaceFactory
     */
    protected $searchResultsFactory;

    /**
     * @var Record[]
     */
    protected $recordByIdCache = [];

    /**
     * @param ResourceProvider $resource
     * @param RecordFactory $recordFactory
     * @param RecordCollectionFactory $recordCollectionFactory
     * @param Data\RecordSearchResultsInterfaceFactory $searchResultsFactory
     */
    public function __construct(
        ResourceProvider $resource,
        RecordFactory $recordFactory,
        RecordCollectionFactory $recordCollectionFactory,
        Data\RecordSearchResultsInterfaceFactory $searchResultsFactory
    ) {
        $this->resource = $resource;
        $this->recordFactory = $recordFactory;
        $this->recordCollectionFactory = $recordCollectionFactory;
        $this->searchResultsFactory = $searchResultsFactory;
    }

    /**
     * Save Record
     *
     * @param RecordInterface $record
     * @return RecordInterface
     * @throws CouldNotSaveException
     */
    public function save(RecordInterface $record)
    {
        try {
            $this->resource->save($record);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__($exception->getMessage()));
        }
        return $record;
    }

    /**
     * Load Record data by given Record Identity
     *
     * @param string $recordId
     * @param bool $force
     * @return Record
     * @throws NoSuchEntityException
     */
    public function getById($recordId, $force = true)
    {
        if ($force || !array_key_exists($recordId, $this->recordByIdCache)) {
            $record = $this->recordFactory->create();
            $this->resource->load($record, $recordId);
            if (!$record->getId()) {
                throw new NoSuchEntityException(__('The record with the "%1" ID doesn\'t exist.', $recordId));
            }
            $this->recordByIdCache[$recordId] = $record;
        }
        return $this->recordByIdCache[$recordId];
    }

    /**
     * Load Record data collection by given search criteria
     *
     * @SuppressWarnings(PHPMD.CyclomaticComplexity)
     * @SuppressWarnings(PHPMD.NPathComplexity)
     * @param SearchCriteriaInterface $criteria
     * @return RecordSearchResultsInterface
     */
    public function getList(SearchCriteriaInterface $criteria)
    {
        /** @var Collection $collection */
        $collection = $this->recordCollectionFactory->create();
        //@todo: $this->collectionProcessor->process($criteria, $collection);

        /** @var RecordSearchResultsInterface $searchResults */
        $searchResults = $this->searchResultsFactory->create();
        $searchResults->setSearchCriteria($criteria);
        $searchResults->setItems($collection->getItems());
        $searchResults->setTotalCount($collection->getSize());
        return $searchResults;
    }

    /**
     * Retrieve new empty instance of Record.
     *
     * @return RecordInterface
     */
    public function getNew()
    {
        return $this->recordFactory->create();
    }

    /**
     * Delete Record
     *
     * @param RecordInterface $record
     * @return bool
     * @throws CouldNotDeleteException
     */
    public function delete(RecordInterface $record)
    {
        try {
            $this->resource->delete($record);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__($exception->getMessage()));
        }
        return true;
    }

    /**
     * Delete Record by given Record Identity
     *
     * @param string $recordId
     * @return bool
     * @throws CouldNotDeleteException
     * @throws NoSuchEntityException
     */
    public function deleteById($recordId)
    {
        return $this->delete($this->getById($recordId));
    }
}
