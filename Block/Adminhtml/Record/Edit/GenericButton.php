<?php
/**
 * Copyright (c) KozakGroup, Inc. 2020. All rights reserved.
 * Developed by Dmitry Draievskiy
 */
declare(strict_types=1);

namespace KozakGroup\UiGridForm\Block\Adminhtml\Record\Edit;

use Magento\Backend\Block\Widget\Context;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Exception\NoSuchEntityException;
use KozakGroup\UiGridForm\Api\RecordRepositoryInterface;
use KozakGroup\UiGridForm\Api\Data\RecordInterface;
use Psr\Log\LoggerInterface;

/**
 * Class GenericButton
 */
class GenericButton
{
    /**
     * @var Context
     */
    protected $context;

    /**
     * @var RecordRepositoryInterface
     */
    protected $recordRepository;

    /**
     * @var
     */
    protected $record;

    /**
     * @var LoggerInterface
     */
    protected $logger;

    /**
     * GenericButton constructor.
     * @param Context $context
     * @param RecordRepositoryInterface $recordRepository
     * @param LoggerInterface $logger
     */
    public function __construct(
        Context $context,
        RecordRepositoryInterface $recordRepository,
        LoggerInterface $logger
    ) {
        $this->context = $context;
        $this->recordRepository = $recordRepository;
        $this->logger = $logger;
    }

    /**
     * @return RecordInterface
     * @throws LocalizedException
     */
    public function getRecord()
    {
        if (null === $this->record) {
            try {
                $this->record = $this->recordRepository->getById($this->context->getRequest()->getParam('id'));
            } catch (NoSuchEntityException $e) {
                $this->logger->critical($e->getMessage());
            }
        }

        return $this->record;
    }

    /**
     * @return int|null
     * @throws LocalizedException
     */
    public function getRecordId()
    {
        return $this->getRecord() ? $this->getRecord()->getId() : null;
    }

    /**
     * Generate url by route and parameters
     *
     * @param string $route
     * @param array $params
     * @return  string
     */
    public function getUrl($route = '', $params = [])
    {
        return $this->context->getUrlBuilder()->getUrl($route, $params);
    }
}
