<?php
/**
 * Copyright (c) KozakGroup, Inc. 2020. All rights reserved.
 * Developed by Dmitry Draievskiy
 */
declare(strict_types=1);

namespace KozakGroup\UiGridForm\Controller\Adminhtml\Record;

use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\Controller\ResultInterface;
use KozakGroup\UiGridForm\Controller\Adminhtml\Record;

/**
 * Class ListAction
 */
class ListAction extends Record
{
    /**
     * @return ResponseInterface|ResultInterface
     */
    public function execute()
    {
        $resultPage = $this->resultFactory->create(ResultFactory::TYPE_PAGE);
        $resultPage->setActiveMenu('KozakGroup_UiGridForm::kozakgroup_uigrid');
        $resultPage->getConfig()->getTitle()->prepend(__('Records Grid'));

        return $resultPage;
    }
}
