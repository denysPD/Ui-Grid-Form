<?php
/**
 * Copyright (c) KozakGroup, Inc. 2020. All rights reserved.
 * Developed by Dmitry Draievskiy
 */
declare(strict_types=1);

namespace KozakGroup\UiGridForm\Controller\Adminhtml;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\App\Request\DataPersistorInterface;
use KozakGroup\UiGridForm\Api\RecordRepositoryInterface;

/**
 * Class Record
 */
abstract class Record extends Action
{
    const ADMIN_RESOURCE = 'KozakGroup_UiGridForm::kozakgroup_uigrid';

    /**
     * @var string[]
     */
    protected $_publicActions = ['list'];

    /**
     * @var RecordRepositoryInterface
     */
    protected $recordRepository;

    /**
     * @var DataPersistorInterface
     */
    protected $dataPersistor;

    /**
     * @param Context $context
     * @param RecordRepositoryInterface $recordRepository
     * @param DataPersistorInterface $dataPersistor
     */
    public function __construct(
        Context $context,
        RecordRepositoryInterface $recordRepository,
        DataPersistorInterface $dataPersistor
    ) {
        parent::__construct($context);
        $this->recordRepository = $recordRepository;
        $this->dataPersistor = $dataPersistor;
    }
}
