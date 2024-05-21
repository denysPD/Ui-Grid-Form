<?php
/**
 * Copyright (c) KozakGroup, Inc. 2020. All rights reserved.
 * Developed by Dmitry Draievskiy
 */
declare(strict_types=1);

namespace KozakGroup\UiGridForm\Model\Record;

use Magento\Ui\DataProvider\AbstractDataProvider;
use KozakGroup\UiGridForm\Model\ResourceModel\Record\CollectionFactory;

/**
 * Class DataProvider
 */
class DataProvider extends AbstractDataProvider
{
    /**
     * @var array
     */
    protected $loadedData;

    /**
     * @param string $name
     * @param string $primaryFieldName
     * @param string $requestFieldName
     * @param CollectionFactory $recordCollectionFactory
     * @param array $meta
     * @param array $data
     */
    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        CollectionFactory $recordCollectionFactory,
        array $meta = [],
        array $data = []
    ) {
        $this->collection = $recordCollectionFactory->create();
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
    }

    /**
     * @return array
     */
    public function getData()
    {
        if (isset($this->loadedData)) {
            return $this->loadedData;
        }

        $items = $this->collection->getItems();

        foreach ($items as $record) {
            $this->loadedData[$record->getId()]['record'] = $record->getData();

            $data = json_decode($record->getRecordTableField(), true);
            foreach ($data as $key => $param) {
                $this->loadedData[$record->getId()]['record_table_field']['table_fields'][$key]['table_select_field']
                    = $param['table_select_field'];
                $this->loadedData[$record->getId()]['record_table_field']['table_fields'][$key]['table_param_name']
                    = $param['table_param_name'];
                $this->loadedData[$record->getId()]['record_table_field']['table_fields'][$key]['table_param_value']
                    = $param['table_param_value'];
            }
        }

        return $this->loadedData;
    }
}
