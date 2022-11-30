<?php
declare(strict_types=1);

use Migrations\AbstractSeed;

/**
 * Solutions seed.
 */
class SolutionsSeed extends AbstractSeed
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
                'title' => 'Can not connect to wifi',
                'content' => 'Click on scan button the search for available wifi network.',
                'category_id' => 1,
            ],
            [
                'id' => 2,
                'title' => 'How to create an email account?

',
                'content' => 'Go to .. to ... to to',
                'category_id' => 1,
            ],
        ];

        $table = $this->table('solutions');
        $table->insert($data)->save();
    }
}
