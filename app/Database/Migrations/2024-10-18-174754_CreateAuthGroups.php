<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateAuthGroups extends Migration
{
    public function up()
    {
        // Créer la table 'groups'
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'title' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'description' => [
                'type' => 'TEXT',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('groups');

        // Créer la table 'permissions'
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'description' => [
                'type' => 'TEXT',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('permissions');

        // Créer la table 'group_permissions'
        $this->forge->addField([
            'group_id' => [
                'type' => 'INT',
                'unsigned' => true,
            ],
            'permission_id' => [
                'type' => 'INT',
                'unsigned' => true,
            ],
        ]);
        $this->forge->addKey(['group_id', 'permission_id'], true); // Composite key
        $this->forge->addForeignKey('group_id', 'groups', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('permission_id', 'permissions', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('group_permissions');
    }

    public function down()
    {
        $this->forge->dropTable('group_permissions');
        $this->forge->dropTable('permissions');
        $this->forge->dropTable('groups');
    }
}
