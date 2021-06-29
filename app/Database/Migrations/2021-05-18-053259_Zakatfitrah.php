<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Zakatfitrah extends Migration
{
	public function up()
	{
	
		$this->forge->addField([
			'idfitrah'				=> [
				'type'				=> 'BIGINT',
				'constraint'		=> 36,
				'unsigned'			=> TRUE,
				'auto_increment'	=> TRUE
			],
			'Nama'					=> [
				'type'				=> 'VARCHAR',
				'constraint'		=> '255'
			],
			'jiwa'					=> [
				'type'				=> 'INT',
				'constraint'		=> ''
			],
			'atasnama'				=> [
				'type'				=> 'VARCHAR',
				'constraint'		=> '1000'
			],
			'jenisbayar'			=> [
				'type'				=> 'ENUM',
				'constraint'		=> "'UANG','BERAS'",
				'default'			=> 'UANG'
			],
			'jumlahbayar'			=> [
				'type'				=> 'INT',
				'constraint'		=> '12'
			],
			'idpengurus'			=> [
				'type'				=> 'BIGINT',
				'constraint'		=> 36,
				'unsigned'			=> TRUE,
				'null'				=> TRUE
			],
			'tahunhijriah'			=> [
				'type'				=> 'INT',
				'constraint'		=> '23'
			],
			'tahun'					=> [
				'type'				=> 'DATE',
			],
		]);
		$this->forge->addKey('idfitrah');
		$this->forge->addForeignKey('idpengurus','daftarpengurus','idpengurus','cascade','casacade');
		$this->forge->createTable('zakatfitrah');
	
	}

	public function down()
	{
		$this->forge->dropTable('zakatfitrah', true);
	}
}
