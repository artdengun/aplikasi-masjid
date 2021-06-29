<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Berita extends Migration
{
	public function up()
	{
		

		$this->forge->addField([
			'idberita'				=> [
				'type'				=> 'BIGINT',
				'constraint'		=> 36,
				'unsigned'			=> TRUE,
				'auto_increment'	=> TRUE
			],
			'judul'					=> [
				'type'				=> 'VARCHAR',
				'constraint'		=> '255'
			],
			'isi'					=> [
				'type'				=> 'TEXT'
			],
			'tanggal'				=> [
				'type'				=> 'DATE'
			],
			'gambar'				=> [
				'type'				=> 'VARCHAR',
				'constraint'		=> '1000'

			],
			'idpengurus'			=> [
				'type'				=> 'BIGINT',
				'constraint'		=> '36',
				'unsigned'			=> true,
				'null'				=> true
			]
		]);
		$this->forge->addKey('idberita', true);
		$this->forge->addForeignKey('idpengurus','daftarpengurus','idpengurus','cascade','cascade');
		$this->forge->createTable('berita', true);

	}

	public function down()
	{
		$this->forge->dropTable('berita', true);
	}
}
