<?php
/**
 * Copyright (c) KozakGroup, Inc. 2020. All rights reserved.
 * Developed by Dmitry Draievskiy
 */
declare(strict_types=1);

namespace KozakGroup\UiGridForm\Block\Adminhtml\Record\Edit;

use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;

/**
 * Class DeleteButton
 */
class DeleteButton extends GenericButton implements ButtonProviderInterface
{
    /**
     * @return array
     * @throws LocalizedException
     */
    public function getButtonData()
    {
        $data = [];
        if ($this->getRecordId()) {
            $data = [
                'label' => __('Delete Record'),
                'class' => 'delete',
                'on_click' => 'deleteConfirm(\'' . __('Are you sure you want to delete #%1?', $this->getRecordId()) .
                    '\', \'' . $this->getDeleteUrl() . '\')',
                'sort_order' => 20,
            ];
        }

        return $data;
    }

    /**
     * Get URL for delete button
     *
     * @return string
     * @throws LocalizedException
     */
    public function getDeleteUrl()
    {
        return $this->getUrl('kozakgroup_uigridform/record/delete', ['id' => $this->getRecordId()]);
    }
}
