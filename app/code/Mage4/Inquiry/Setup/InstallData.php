<?php

namespace Mage4\Inquiry\Setup;

use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

class InstallData implements InstallDataInterface
{
    /**
     * {@inheritdoc}
     */
    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();

        $setup->getConnection()->insert(
            $setup->getTable('mage4_inquiry'),
            [
                'name' => 'jahazaib',
                'email' => 'testuser@gmail.com',
                'occupation' => 'developer',
                'activities' => 'eating',
                'dob' => '03/01/1997'           ]
        );

        $setup->endSetup();
    }
}
