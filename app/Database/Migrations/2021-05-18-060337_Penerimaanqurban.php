<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Penerimaanqurban extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'idqurban'				=> [
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
			'jenisqurban'				=> [
				'type'				=> 'ENUM',
				'constraint'		=> "'Sapi','Kambing','Kerbau'",
				'default'			=> 'Sapi'
			],
			'jumlah'				=> [
				'type'				=> 'VARCHAR',
				'constraint'		=> '255'
			],
			'doaatasnama'			=> [
				'type'				=> 'VARCHAR',
				'constraint'		=> '1000'
			],
			'tahunqurban'			=> [
				'type'				=> 'DATE',
			],
			'idpengurus'			=> [
				'type'				=> 'BIGINT',
				'constraint'		=> 36,
				'unsigned'			=> TRUE,
				'null'				=> TRUE
			],


		]);
		$this->forge->addKey('idqurban', true);
		$this->forge->addForeignKey('idpengurus','daftarpengurus','idpengurus','cascade','cascade');
		$this->forge->createTable('qurban', true);
	}

	public function down()
	{
		//
		$this->forge->dropTable('qurban', true);
	}
}
