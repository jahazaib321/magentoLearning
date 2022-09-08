<?php

namespace Mage4\StoreLocator\Setup;

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
            $setup->getTable('mage4_storelocator_managestores')
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
            ['nullable' => true],
            'Location Name'
        )->addColumn(
            'country',
            Table::TYPE_TEXT,
            255,
            ['nullable' => true],
            'Country'
        )->addColumn(
            'state_id',
            Table::TYPE_TEXT,
            255,
            ['nullable' => true],
            'State/Province'
        )->addColumn(
            'city',
            Table::TYPE_TEXT,
            255,
            ['nullable' => true],
            'City'
        )->addColumn(
            'zip',
            Table::TYPE_INTEGER,
            255,
            ['nullable' => true],
            'Zipcode'
        )->addColumn(
            'street',
            Table::TYPE_TEXT,
            255,
            ['nullable' => true],
            'Location Street'
//        )->addColumn(
//            'status',
//            Table::TYPE_INTEGER,
//            255,
//            ['nullable' => false],
//            'Location Status'
        )->addColumn(
            'lat',
            Table::TYPE_INTEGER,
            255,
            ['nullable' => true],
            'Location Latitude'
        )->addColumn(
            'lng',
            Table::TYPE_INTEGER,
            255,
            ['nullable' => true],
            'Location Longitude'
//        )->addColumn(
//            'position',
//            Table::TYPE_INTEGER,
//            255,
//            ['nullable' => false],
//            'Location Position'
        )->addColumn(
            'phone',
            Table::TYPE_INTEGER,
            255,
            ['nullable' => true],
        )->addColumn(
            'email',
            Table::TYPE_TEXT,
            255,
            ['nullable' => true],
        )->addColumn(
            'image',
            Table::TYPE_TEXT,
            255,
            ['nullable' => true],
//        )->addColumn(
//            'stores',
//            Table::TYPE_INTEGER,
//            255,
//            ['nullable' => false],
//             'Stores Ids'
        )->addIndex(
            $setup->getIdxName('mage4_storelocator_managestores', ['id']),
            ['id']
        );
        $setup->getConnection()->createTable($table);

//        $table = $setup->getConnection()->newTable(
//            $setup->getTable('mage4_storelocator_managecategory')
//        )->addColumn(
//            'id',
//            Table::TYPE_INTEGER,
//            null,
//            ['identity' => true, 'nullable' => false, 'primary' => true],
//            'Item ID'
//        )->addColumn(
//            'status',
//            Table::TYPE_INTEGER,
//            255,
//            ['nullable' => false],
//            'Category Status'
//        )->addColumn(
//            'name',
//            Table::TYPE_TEXT,
//            255,
//            ['nullable' => false],
//            'Category Name'
//        )->addColumn(
//            'stores',
//            Table::TYPE_INTEGER,
//            255,
//            ['nullable' => false],
//            'Assigned Websites'
//        )->addColumn(
//            'position',
//            Table::TYPE_INTEGER,
//            255,
//            ['nullable' => false],
//            'Store Category Position'
//        )->addIndex(
//            $setup->getIdxName('mage4_storelocator_managecategory', ['id']),
//            ['id']
//        );
//        $setup->getConnection()->createTable($table);

        $setup->endSetup();
    }
}

