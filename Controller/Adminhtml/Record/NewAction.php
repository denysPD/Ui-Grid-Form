<?php
/**
 * Copyright (c) KozakGroup, Inc. 2020. All rights reserved.
 * Developed by Dmitry Draievskiy
 */
declare(strict_types=1);

namespace KozakGroup\UiGridForm\Controller\Adminhtml\Record;

use KozakGroup\UiGridForm\Controller\Adminhtml\Record;

/**
 * Class NewAction
 */
class NewAction extends Record
{
    public function execute()
    {
        $this->_forward('edit');
    }
}
