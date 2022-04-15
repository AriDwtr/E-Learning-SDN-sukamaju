<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TblJadwalPelajaran extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_jadwal'          => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'id_pelajaran'          => [
                'type'           => 'INT',
                'constraint'     => 5,

            ],
            'judul_materi'       => [
                'type'           => 'VARCHAR',
                'constraint'     => 255,
            ],
            'link_zoom'       => [
                'type'           => 'TEXT',
                'null'=> true
            ],
            'file_upload'       => [
                'type'       => 'TEXT',
                'null'=> true
            ],
            'tanggal_jadwal'       => [
                'type'       => 'DATE',
                'null'=> true
            ],
        ]);
        $this->forge->addKey('id_jadwal', true);
        $this->forge->createTable('tbl_jadwal_pelajaran');
    }

    public function down()
    {
        $this->forge->dropTable('tbl_jadwal_pelajaran');
    }
}
