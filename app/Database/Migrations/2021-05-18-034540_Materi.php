<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Materi extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'idmateri'				=> [
				'type'				=> 'BIGINT',
				'constraint'		=> 36,
				'unsigned'			=> TRUE,
				'auto_increment'	=> TRUE
			],
			'idpengurus'			=> [
				'type'				=> 'BIGINT',
				'constraint'		=> '36',
				'unsigned'			=> true,
				'null'				=> true
			],
			'idkhotib'				=> [
				'type'				=> 'BIGINT',
				'constraint'		=> '36',
				'unsigned'			=> true,
				'null'				=> true
			],
			'judul'					=> [
				'type'				=> 'VARCHAR',
				'constraint'		=> '255'
			],
			'tanggal'				=> [
				'type'				=> 'DATE',
			],
			'materi'				=> [
				'type'				=> 'TEXT',
			]
		]);
		$this->forge->addKey('idmateri', true);
		$this->forge->addForeignKey('idpengurus', 'daftarpengurus', 'idpengurus', 'cascade', 'cascade');
		$this->forge->addForeignKey('idkhotib', 'daftarkhotib', 'idkhotib', 'cascade', 'cascade');
		$this->forge->createTable('materi', true);
	}

	public function down()
	{
		$this->forge->dropTable('materi', true);
	}
}
