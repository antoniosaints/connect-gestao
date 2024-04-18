<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class TableLojas extends AbstractMigration
{
    public function up(): void
    {
        $table = $this->table('rifas');
        $table
            ->addColumn('rifa', 'string')
            ->addColumn('descricao', 'string')
            ->addColumn('resp', 'integer', ['null' => false, 'default' => 1])
            ->addColumn('objetivo', 'double', ['null' => true])
            ->addColumn('atual', 'double', ['null' => true, 'default' => 0])
            ->addColumn('contato', 'string', ['null' => true])
            ->addColumn('observacao', 'text', ['null' => true])
            ->addColumn('created_at', 'timestamp', [
                'default' => 'CURRENT_TIMESTAMP',
            ])
            ->addColumn('updated_at', 'timestamp', [
                'default' => 'CURRENT_TIMESTAMP',
                'update' => 'CURRENT_TIMESTAMP',
            ])
            ->save();
    }

    public function down(): void
    {
        $this->table('rifas')->drop()->save();
    }
}
