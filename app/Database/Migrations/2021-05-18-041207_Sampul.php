<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Sampul extends Migration
{
	public function up()
	{
		//
		$this->forge->addField([
			'idsampul'				=> [
				'type'				=> 'BIGINT',
				'constraint'		=> 36,
				'unsigned'			=> TRUE,
				'auto_increment'	=> TRUE
			],
			'judul'					=> [
				'type'				=> 'VARCHAR',
				'constraint'		=> '255'
			],
			'keterangan'			=> [
				'type'				=> 'TEXT'			
			],
			'gambar'				=> [
				'type'				=> 'TEXT'
			],
			'idpengurus'			=> [
				'type'				=> 'BIGINT',
				'constraint'		=> '36',
				'unsigned'			=> true,
				'null'				=> true
			]
		]);

		$this->forge->addKey('idsampul', true);
		$this->forge->addForeignKey('idpengurus','daftarpengurus','idpengurus','cascade','cascade');
		$this->forge->createTable('sampul', true);
	}

	public function down()
	{
		$this->forge->dropTable('sampul', true);
	}
}
