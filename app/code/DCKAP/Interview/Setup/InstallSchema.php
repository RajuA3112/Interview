<?php

namespace DCKAP\Interview\Setup;

class InstallSchema implements \Magento\Framework\Setup\InstallSchemaInterface {

    public function install(\Magento\Framework\Setup\SchemaSetupInterface $setup, \Magento\Framework\Setup\ModuleContextInterface $context) {
        $installer = $setup;
        $installer->startSetup();
        if (!$installer->tableExists('requested_order')) {
            $table = $installer->getConnection()->newTable(
                            $installer->getTable('requested_order')
                    )
                    ->addColumn(
                            'id', \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER, null, [
                        'identity' => true,
                        'nullable' => false,
                        'primary' => true,
                        'unsigned' => true,
                            ], 'Request ID'
                    )
                    ->addColumn(
                            'name', \Magento\Framework\DB\Ddl\Table::TYPE_TEXT, 255, [], 'Customer Name'
                    )
                    ->addColumn(
                            'email', \Magento\Framework\DB\Ddl\Table::TYPE_TEXT, 255, [], 'Customer Email'
                    )
                    ->addColumn(
                            'address', \Magento\Framework\DB\Ddl\Table::TYPE_TEXT, 255, [], 'Customer Address'
                    )
                    ->addColumn(
                            'city', \Magento\Framework\DB\Ddl\Table::TYPE_TEXT, 255, [], 'City'
                    )
                    ->addColumn(
                            'state', \Magento\Framework\DB\Ddl\Table::TYPE_TEXT, 255, [], 'State'
                    )
                    ->addColumn(
                            'postcode', \Magento\Framework\DB\Ddl\Table::TYPE_TEXT, 255, [], 'Postcode'
                    )
                    ->addColumn(
                            'country', \Magento\Framework\DB\Ddl\Table::TYPE_TEXT, 255, [], 'Country'
                    )
                    ->addColumn(
                            'product', \Magento\Framework\DB\Ddl\Table::TYPE_TEXT, 255, [], 'Requested Product'
                    )
                    ->addColumn(
                            'status', \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER, 1, [], 'Status'
                    )
                    ->addColumn(
                            'created_at', \Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP, null, ['nullable' => false, 'default' => \Magento\Framework\DB\Ddl\Table::TIMESTAMP_INIT], 'Created At'
                    )
                    ->addColumn(
                            'updated_at', \Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP, null, ['nullable' => false, 'default' => \Magento\Framework\DB\Ddl\Table::TIMESTAMP_INIT], 'Updated At'
                    )
                    ->setComment('Requested Order Table');
            $installer->getConnection()->createTable($table);

            $installer->getConnection()->addIndex(
                    $installer->getTable('requested_order'), $setup->getIdxName(
                            $installer->getTable('requested_order'), ['name', 'email', 'address', 'city', 'state', 'postcode', 'country', 'product'], \Magento\Framework\DB\Adapter\AdapterInterface::INDEX_TYPE_FULLTEXT
                    ), ['name', 'email', 'address', 'city', 'state', 'postcode', 'country', 'product'], \Magento\Framework\DB\Adapter\AdapterInterface::INDEX_TYPE_FULLTEXT
            );
        }

        $installer->endSetup();
    }

}
