<?php

namespace Mage4\Inquiry\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\DB\Ddl\Table;

class InstallSchema implements InstallSchemaInterface
{
    /**
     * {@inheritdoc}
     */
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        echo "Schema Installation";
        $setup->startSetup();

        $table = $setup->getConnection()->newTable(
            $setup->getTable('mage4_inquiry')
        )->addColumn(
            'id',
            Table::TYPE_INTEGER,
            null,
            ['identity' => true, 'nullable' => false, 'primary' => true],
            'Item ID'
        )->addColumn(
            'name',
            Table::TYPE_TEXT,
            255,
            ['nullable' => false],
            'User Name'
        )->addColumn(
            'email',
            Table::TYPE_TEXT,
            255,
            ['nullable' => false],
            'User Email'
        )->addColumn(
            'occupation',
            Table::TYPE_TEXT,
            255,
            ['nullable' => false],
            'User Occupation'
        )->addColumn(
            'activities',
            Table::TYPE_TEXT,
            255,
            ['nullable' => false],
            'User Activities'
        )->addColumn(
            'dob',
            Table::TYPE_TEXT,
            255,
            ['nullable' => false],
            'User Dob'
        )->addIndex(
            $setup->getIdxName('mage4_inquiry', ['name']),
            ['name']
        )->setOccupation(
            'Sample Items'
        );
        $setup->getConnection()->createTable($table);

        $setup->endSetup();
    }
}
