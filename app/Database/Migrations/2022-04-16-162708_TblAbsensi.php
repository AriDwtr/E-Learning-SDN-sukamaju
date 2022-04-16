<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TblAbsensi extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_absensi'          => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'id_jadwal'          => [
                'type'           => 'INT',
                'constraint'     => 5,

            ],
            'id_siswa'          => [
                'type'           => 'INT',
                'constraint'     => 5,

            ],
            'waktu_absensi'       => [
                'type'           => 'DATETIME',
            ],
        ]);
        $this->forge->addKey('id_absensi', true);
        $this->forge->createTable('tbl_absensi');
    }

    public function down()
    {
        $this->forge->dropTable('tbl_absensi');
    }
}
