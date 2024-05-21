<?php
/**
 * Copyright (c) KozakGroup, Inc. 2020. All rights reserved.
 * Developed by Dmitry Draievskiy
 */
declare(strict_types=1);

namespace KozakGroup\UiGridForm\Controller\Adminhtml\Record;

use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\Result\Redirect;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\Controller\ResultInterface;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Exception\NoSuchEntityException;
use KozakGroup\UiGridForm\Controller\Adminhtml\Record;

/**
 * Class Edit
 */
class Edit extends Record
{
    /**
     * @return ResponseInterface|Redirect|ResultInterface
     * @throws LocalizedException
     */
    public function execute()
    {
        $id = $this->getRequest()->getParam('id');
        $model = $this->recordRepository->getNew();

        if ($id) {
            try {
                $model = $this->recordRepository->getById($id);
            } catch (NoSuchEntityException $exception) {
                $this->messageManager->addErrorMessage(__('This Record no longer exists.'));
                $resultRedirect = $this->resultRedirectFactory->create();

                return $resultRedirect->setPath('kozakgroup_uigridform/record/list');
            }
        }

        $resultPage = $this->resultFactory->create(ResultFactory::TYPE_PAGE);
        $resultPage->setActiveMenu('KozakGroup_UiGridForm::kozakgroup_uigrid');

        if ($model->getId()) {
            $title = __('Record #%1', $model->getId());
        } else {
            $title = __('New Record');
        }

        $resultPage->getConfig()->getTitle()->prepend(__('Records'));
        $resultPage->getConfig()->getTitle()->prepend($title);

        return $resultPage;
    }
}
