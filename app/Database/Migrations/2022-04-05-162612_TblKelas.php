<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TblKelas extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_kelas'          => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'kelas'       => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null'=> true
            ],
        ]);
        $this->forge->addKey('id_kelas', true);
        $this->forge->createTable('tbl_kelas');
    }

    public function down()
    {
        $this->forge->dropTable('tbl_kelas');
    }
}
