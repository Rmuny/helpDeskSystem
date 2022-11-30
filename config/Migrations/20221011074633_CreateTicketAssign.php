<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class CreateTicketAssign extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        $table = $this->table('ticket_assign');
        $table->addColumn('deadline', 'date', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('priority', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false,
        ]);
        $table->create();
    }
}
