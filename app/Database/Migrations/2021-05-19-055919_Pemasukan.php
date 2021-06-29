<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Pemasukan extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'idpemasukan'				=> [
				'type'				=> 'BIGINT',
				'constraint'		=> 36,
				'unsigned'			=> TRUE,
				'auto_increment'	=> TRUE
			],
			'idkotak'				=> [
				'type'				=> 'BIGINT',
				'constraint'		=> 36,
				'unsigned'			=> TRUE,
				'null'				=> true

			],

			'idfitrah'				=> [
				'type'				=> 'BIGINT',
				'constraint'		=> 36,
				'unsigned'			=> TRUE,
				'null'				=> true

			],

			'idzakatmaal'			=> [
				'type'				=> 'BIGINT',
				'constraint'		=> 36,
				'unsigned'			=> TRUE,

				'null'				=> true
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

		$this->forge->addKey('idpemasukan', true);
		$this->forge->addForeignKey('idpengurus','daftarpengurus','idpengurus','cascade','cascade');
		$this->forge->addForeignKey('idfitrah','zakatfitrah','idfitrah','cascade','cascade');
		$this->forge->addForeignKey('idkotak','daftarkotak','idkotak','cascade','cascade');
		$this->forge->addForeignKey('idzakatmaal','zakatmaal','idzakatmaal','cascade','cascade');
		$this->forge->createTable('pemasukan');
	}

	public function down()
	{
		$this->forge->dropTable('pemasukan', true);
	}
}
