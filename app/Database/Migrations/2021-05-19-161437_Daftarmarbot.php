<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Daftarmarbot extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'idmarbot'				=> [
				'type'				=> 'BIGINT',
				'constraint'		=> 36,
				'unsigned'			=> TRUE,
				'auto_increment'	=> TRUE
			],
			'foto'					=> [
				'type'				=> 'VARCHAR',
				'constraint'		=> '255',
				'null'				=> true
				],
			'nama'					=> [
				'type'				=> 'VARCHAR',
				'constraint'		=> '255'
			],

			'alamat'				=>[
				'type'				=> 'VARCHAR',
				'constraint'		=> '1000'
			],
			'status'				=> [
				'type'				=> 'ENUM',
				'constraint'		=> "'AKTIF','OFF'",
				'default'			=> 'AKTIF'
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

		$this->forge->addKey('idmarbot', true);
		$this->forge->addForeignKey('idpengurus','daftarpengurus','idpengurus','cascade','cascade');
		$this->forge->createTable('daftarmarbot');
	}

	public function down()
	{
		$this->forge->dropTable('daftarmarbot', true);
	}
}
