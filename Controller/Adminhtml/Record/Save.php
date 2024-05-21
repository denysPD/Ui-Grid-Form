<?php
/**
 * Copyright (c) KozakGroup, Inc. 2020. All rights reserved.
 * Developed by Dmitry Draievskiy
 */
declare(strict_types=1);

namespace KozakGroup\UiGridForm\Controller\Adminhtml\Record;

use Magento\Backend\App\Action\Context;
use Magento\Framework\App\Request\DataPersistorInterface;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\Result\Redirect;
use Magento\Framework\Controller\ResultInterface;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Exception\NoSuchEntityException;
use KozakGroup\UiGridForm\Api\RecordRepositoryInterface;
use KozakGroup\UiGridForm\Controller\Adminhtml\Record;
use Zend\Uri\Uri;

/**
 * Class Save
 */
class Save extends Record
{
    /**
     * @var Uri
     */
    protected $zendUri;

    /**
     * @param Context $context
     * @param RecordRepositoryInterface $recordRepository
     * @param DataPersistorInterface $dataPersistor
     * @param Uri $zendUri
     */
    public function __construct(
        Context $context,
        RecordRepositoryInterface $recordRepository,
        DataPersistorInterface $dataPersistor,
        Uri $zendUri
    ) {
        parent::__construct($context, $recordRepository, $dataPersistor);

        $this->zendUri = $zendUri;
    }

    /**
     * @return ResponseInterface|Redirect|ResultInterface
     * @throws LocalizedException
     */
    public function execute()
    {
        $resultRedirect = $this->resultRedirectFactory->create();
        $data = $this->getRequest()->getPostValue('record');

        if (is_array($data) && array_key_exists('record_table_field', $data)) {
            if (is_string($data['record_table_field'])) {
                $tableField = json_decode($data['record_table_field']);
                $result = [];

                foreach ($tableField as $field) {
                    $this->zendUri->setQuery($field);
                    $tempArray = $this->zendUri->getQueryAsArray();
                    $result = array_merge_recursive($result, $tempArray);
                }

                $data['record_table_field'] = json_encode($result['record_table_field']['table_fields']);
            }
        }

        $id = $data['record_id'] ?? null;

        if ('' === $id) {
            $model = $this->recordRepository->getNew();
            unset($data['record_id']);
        } else {
            try {
                $model = $this->recordRepository->getById($id);
            } catch (NoSuchEntityException $e) {
                $this->messageManager->addErrorMessage(__('This Record no longer exists.'));
                return $resultRedirect->setPath('*/*/list');
            }
        }

        try {
            $model->setData($data);
            $this->recordRepository->save($model);
            $this->messageManager->addSuccessMessage(__('You saved the Record.'));
            $this->dataPersistor->clear('record');

            if ($this->getRequest()->getParam('back')) {
                return $resultRedirect->setPath('*/*/edit', ['id' => $model->getId()]);
            } else {
                return $resultRedirect->setPath('*/*/list');
            }
        } catch (CouldNotSaveException $e) {
            $this->messageManager->addErrorMessage($e->getMessage());
        } catch (\Exception $e) {
            $this->messageManager->addExceptionMessage($e, __('Something went wrong.'));
        }

        $this->dataPersistor->set('record', $data);

        return $resultRedirect->setPath('*/*/edit', ['id' => $model->getId()]);
    }
}
