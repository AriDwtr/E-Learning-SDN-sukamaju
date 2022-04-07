<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TblSiswa extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_siswa'          => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nisn'       => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null'=> true
            ],
            'id_kelas'       => [
                'type'       => 'INT',
                'constraint' => '10',
                'null' => true
            ],
            'nama_siswa'       => [
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
        ]);
        $this->forge->addKey('id_siswa', true);
        $this->forge->createTable('tbl_siswa');
    }

    public function down()
    {
        $this->forge->dropTable('tbl_siswa');
    }
}
