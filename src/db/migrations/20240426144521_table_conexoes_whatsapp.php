<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class TableConexoesWhatsapp extends AbstractMigration
{
    public function up(): void
    {
        $this->table('conexoes_whatsapp')
            ->addColumn('ip', 'string', ['null' => false])
            ->addColumn('porta', 'string', ['null' => false])
            ->addColumn('secret', 'string', ['null' => false])
            ->addColumn('status', 'string', [
                'null' => false,
                'default' => 'disponivel',
            ])
            ->create();
    }

    public function down(): void
    {
        $this->table('conexoes_whatsapp')->drop()->save();
    }
}
