<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TblPelajaraan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_pelajaran'          => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'id_kelas'       => [
                'type'           => 'INT',
                'constraint'     => 5,
            ],
            'id_staff'       => [
                'type'           => 'INT',
                'constraint'     => 5,
            ],
            'pelajaran'       => [
                'type'       => 'VARCHAR',
                'constraint' => '200',
                'null'=> true
            ],
        ]);
        $this->forge->addKey('id_pelajaran', true);
        $this->forge->createTable('tbl_pelajaran');
    }

    public function down()
    {
        $this->forge->dropTable('tbl_pelajaran');
    }
}
