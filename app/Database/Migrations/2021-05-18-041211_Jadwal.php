<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Jadwal extends Migration
{
	public function up()
	{
		
		$this->forge->addField([
			'idjadwal'				=> [
				'type'				=> 'BIGINT',
				'constraint'		=> 36,
				'unsigned'			=> TRUE,
				'auto_increment'	=> TRUE
			],
			'tanggal'				=> [
				'type'				=> 'DATE'
			],
			'idkhotib'				=> [
				'type'				=> 'BIGINT',
				'constraint'		=> '36',
				'unsigned'			=> TRUE,
				'null'				=> TRUE
			],
			'idimam'				=> [
				'type'				=> 'BIGINT',
				'constraint'		=> '36',
				'unsigned'			=> TRUE,
				'null'				=> TRUE
			],
			'keterangan'			=> [
				'type'				=> 'TEXT',
			],
			'idpengurus'			=> [
				'type'				=> 'BIGINT',
				'constraint'		=> 36,
				'unsigned'			=> TRUE,
				'null'				=> TRUE
			],
	
		]);

		$this->forge->addKey('idjadwal', true);
		$this->forge->addForeignKey('idpengurus','daftarpengurus','idpengurus','cascade','cascade');
		$this->forge->addForeignKey('idkhotib', 'daftarkhotib', 'idkhotib', 'cascade', 'cascade');
		$this->forge->addForeignKey('idimam', 'daftarimam', 'idimam', 'cascade', 'cascade');
		$this->forge->createTable('jadwal', true);
	}

	public function down()
	{
		$this->forge->dropTable('jadwal', true);
	}
}
