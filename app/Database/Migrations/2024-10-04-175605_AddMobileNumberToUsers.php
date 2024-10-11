<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Forge;
use CodeIgniter\Database\Migration;

class AddMobileNumberToUsers extends Migration
{
    /**
     * @var string[]
     */
    private array $tables;

    public function __construct(?Forge $forge = null)
    {
        parent::__construct($forge);

        /** @var \Config\Auth $authConfig */
        $authConfig   = config('Auth');
        $this->tables = $authConfig->tables;
    }

    public function up()
    {
        $fields = [
            'firstname' => ['type' => 'VARCHAR', 'constraint' => '20', 'null' => true],
            'lastname' => ['type' => 'VARCHAR', 'constraint' => '20', 'null' => true],
            'phone' => ['type' => 'VARCHAR', 'constraint' => '20', 'null' => true],
        ];
        $this->forge->addColumn($this->tables['users'], $fields);
    }

    public function down()
    {
        $fields = [
            'firstname',
            'lastname',
            'phone',
        ];
        $this->forge->dropColumn($this->tables['users'], $fields);
    }
}