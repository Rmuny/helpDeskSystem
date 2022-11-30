<?php
declare(strict_types=1);

use Migrations\AbstractSeed;

/**
 * Staffs seed.
 */
class StaffsSeed extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeds is available here:
     * https://book.cakephp.org/phinx/0/en/seeding.html
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'id' => 1,
                'staffName' => 'Rathmuny',
                'gender' => 'Female',
                'email' => 'Rathmuny12@gmail.com',
                'phoneNumber' => '085539801',
                'profileImage' => '',
                'username' => 'Rathmuny',
                'password' => '123',
                'role_id' => 1,
            ],
        ];

        $table = $this->table('staffs');
        $table->insert($data)->save();
    }
}
