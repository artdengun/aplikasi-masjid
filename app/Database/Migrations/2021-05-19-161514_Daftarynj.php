<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Daftarynj extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'idynz'				=> [
				'type'				=> 'BIGINT',
				'constraint'		=> 36,
				'unsigned'			=> TRUE,
				'auto_increment'	=> TRUE
			],
			'nama'					=> [
				'type'				=> 'VARCHAR',
				'constraint'		=> '255'
			],

			'alamat'				=> [
				'type'				=> 'VARCHAR',
				'constraint'		=> '1000'
			],
			'status_ynz'				=> [
				'type'				=> 'ENUM',
				'constraint'		=> "'YATIM','YATIM PIATU', 'JANDA','DHUAFA'",
				'default'			=> 'DHUAFA'
			],
			'handphone'				=> [
				'type'				=> 'VARCHAR',
				'constraint'		=> '15'
			],
			'tahun'					=> [
				'type'				=> 'DATE'
			],
			'idpengurus'			=> [
				'type'				=> 'BIGINT',
				'constraint'		=> 36,
				'unsigned'			=> TRUE,
				'null'				=> TRUE
			],
		]);

		$this->forge->addKey('idynz', true);
		$this->forge->addForeignKey('idpengurus', 'daftarpengurus', 'idpengurus', 'cascade', 'cascade');
		$this->forge->createTable('daftarynz');
	}

	public function down()
	{
		$this->forge->dropTable('daftarynz', true);
	}
}
