<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Pengeluaran extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'idpengeluaran'				=> [
				'type'				=> 'BIGINT',
				'constraint'		=> 36,
				'unsigned'			=> TRUE,
				'auto_increment'	=> TRUE
			],
			'nama'					=> [
				'type'				=> 'VARCHAR',
				'constraint'		=> '255'
			],

			'jenispengeluaran'		=> [
				'type'				=> 'ENUM',
				'constraint'		=> "'Assets','Kegiatan','Penggajian','Sumbangan','Ceramah','Pengurus','Lain lain'",
				'default'			=> 'Assets'
			],
			'jumlah'				=> [
				'type'				=> 'INT',
				'constraint'		=> '255'
			],
			'tahun'					=> [
				'type'				=> 'DATE',
			],
			'idpengurus'			=> [
				'type'				=> 'BIGINT',
				'constraint'		=> 36,
				'unsigned'			=> TRUE,
				'null'				=> true
			],
		]);

		$this->forge->addKey('idpengeluaran', true);
		$this->forge->addForeignKey('idpengurus', 'daftarpengurus', 'idpengurus', 'cascade', 'cascade');
		$this->forge->createTable('pengeluaran');
	}

	public function down()
	{
		$this->forge->dropTable('pengeluaran', true);
	}
}
