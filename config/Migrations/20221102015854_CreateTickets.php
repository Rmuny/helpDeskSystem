<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class CreateTickets extends AbstractMigration
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
        $table = $this->table('tickets');;
        $table->addColumn('status_id', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
        ]);
        $table->addColumn('answer', 'text', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('staff_id', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => true,
        ]);
        $table->create();
    }
}
