<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class TableCaixasAtendimento extends AbstractMigration
{
    public function up(): void
    {
        $this->table('caixas_atendimento')
            ->addColumn('caixa', 'string', ['null' => false])
            ->addColumn('portas', 'integer', [
                'null' => false,
                'default' => 8
            ])
            ->addColumn('observacao', 'text', ['null' => true])
            ->addColumn('status', 'string', [
                'null' => false, 
                'default' => 'pendente'
            ])
            ->addColumn('created_at', 'timestamp', [
                'default' => 'CURRENT_TIMESTAMP',
            ])
            ->addColumn('updated_at', 'timestamp', [
                'default' => 'CURRENT_TIMESTAMP',
                'update' => 'CURRENT_TIMESTAMP',
            ])
            ->create();
    }

    public function down(): void
    {
        $this->table('caixas_atendimento')->drop()->save();
    }
}
