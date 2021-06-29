<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Daftarbilal extends Migration
{

	public function up()
	{
		$this->forge->addField([
			'idbilal'				=> [
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
				'null'				=> true
			],
		]);

		$this->forge->addKey('idbilal', true);
		$this->forge->addForeignKey('idpengurus','daftarpengurus','idpengurus','cascade','cascade');
		$this->forge->createTable('daftarbilal');
	}

	public function down()
	{
		$this->forge->dropTable('daftarbilal', true);
	}
}
