<?php
require __DIR__.'/bootstrap.php';

return
[
    'paths' => [
        'migrations' => '%%PHINX_CONFIG_DIR%%/database/migrations',
        'seeds' => '%%PHINX_CONFIG_DIR%%/database/seeds'
    ],
    'environments' => [
        'default_migration_table' => 'migrations',
        'default_database' => 'app',
        'app' => [
            'name' => 'f3',
            'connection' => $db->pdo(),
        ]
    ],
    'version_order' => 'creation'
];