<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ReplyFixture
 */
class ReplyFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'reply';
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'message' => 'Lorem ipsum dolor sit amet',
                'ticket_id' => 1,
                'Staff_id' => 1,
                'Reply_id' => 1,
                'created' => '2022-11-18 12:06:21',
            ],
        ];
        parent::init();
    }
}
