<?php
/**
 * Copyright (c) KozakGroup, Inc. 2020. All rights reserved.
 * Developed by Dmitry Draievskiy
 */
declare(strict_types=1);

namespace KozakGroup\UiGridForm\Model;

use KozakGroup\UiGridForm\Api\Data\RecordSearchResultsInterface;
use Magento\Framework\Api\SearchResults;

/**
 * Service Data Object with Records search results.
 */
class RecordSearchResults extends SearchResults implements RecordSearchResultsInterface
{
}
