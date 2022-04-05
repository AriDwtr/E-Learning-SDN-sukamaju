<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TblStaff extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_staff'          => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nip'       => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null'=> true
            ],
            'nama_pegawai'       => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null'=> true
            ],
            'jenis_kelamin'       => [
                'type'       => 'VARCHAR',
                'constraint' => '20',
                'null'=> true
            ],
            'tempat_lahir'       => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null'=> true
            ],
            'tanggal_lahir'       => [
                'type'       => 'DATE',
                'null'=> true
            ],
            'agama'       => [
                'type'       => 'VARCHAR',
                'constraint' => '20',
                'null'=> true
            ],
            'foto' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'username'       => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null'=> true
            ],
            'password'       => [
                'type'       => 'VARCHAR',
                'constraint' => '225',
                'null'=> true
            ],
            'tipe'       => [
                'type'       => 'VARCHAR',
                'constraint' => '10',
                'null' => true
            ],
        ]);
        $this->forge->addKey('id_staff', true);
        $this->forge->createTable('tbl_staff');
    }

    public function down()
    {
        $this->forge->dropTable('tbl_staff');
    }
}
