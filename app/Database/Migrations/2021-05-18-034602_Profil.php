<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Profil extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'idprofil'				=> [
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
				'type'				=> 'TEXT',
			],
			'kontak'				=> [
				'type'				=> 'VARCHAR',
				'constraint'		=> '255'
			],
			'profil'				=> [
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
		$this->forge->addKey('idprofil', true);
		$this->forge->addForeignKey('idpengurus','daftarpengurus','idpengurus','cascade','cascade');
		$this->forge->createTable('profil', true);
	}

	public function down()
	{
		$this->forge->dropTable('profil', true);
	}
}
