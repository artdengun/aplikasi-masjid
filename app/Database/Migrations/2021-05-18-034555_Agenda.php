<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Agenda extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'idagenda'		=> [
				'type'				=> 'BIGINT',
				'constraint'		=> 36,
				'unsigned'			=> TRUE,
				'auto_increment'	=> TRUE
			],
			
			'nama'					=> [
				'type'				=> 'VARCHAR',
				'constraint'		=> '255'
			],
			'tanggal'				=> [
				'type'				=> 'DATE',
			],
			'tempat'				=> [
				'type'				=> 'VARCHAR',
				'constraint'		=> '255'
			],
			'keterangan'			=> [
				'type'				=> 'TEXT'
			],
			'tgl_post'				=> [
				'type'				=> 'DATETIME'
			],
			'idpengurus'			=> [
				'type'				=> 'BIGINT',
				'constraint'		=> '36',
				'unsigned'			=> true,
				'null'				=> true
			]
		]);
		$this->forge->addKey('idagenda', true);
		$this->forge->addForeignKey('idpengurus','daftarpengurus','idpengurus','cascade','cascade');
		$this->forge->createTable('agenda', true);
	}

	public function down()
	{
		$this->forge->dropTable('agenda', true);
	}
}
