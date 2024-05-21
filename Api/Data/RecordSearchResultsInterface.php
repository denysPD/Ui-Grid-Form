<?php
/**
 * Copyright (c) KozakGroup, Inc. 2020. All rights reserved.
 * Developed by Dmitry Draievskiy
 */
declare(strict_types=1);

namespace KozakGroup\UiGridForm\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;

/**
 * Interface RecordSearchResultsInterface
 */
interface RecordSearchResultsInterface extends SearchResultsInterface
{
    /**
     * Get records list.
     *
     * @return RecordInterface[]
     */
    public function getItems();

    /**
     * Set records list.
     *
     * @param RecordInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}
