<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Zakatmaal extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'idzakatmaal'			=> [
				'type'				=> 'BIGINT',
				'constraint'		=> 36,
				'unsigned'			=> TRUE,
				'auto_increment'	=> TRUE
			],
			'nama'					=> [
				'type'				=> 'VARCHAR',
				'constraint'		=>'255'
			],
			
			'tahun'					=> [
				'type'				=> 'DATE'
			], 

			'alamat'				=> [
				'type'				=>'VARCHAR',
				'constraint'		=>'1000'
			],

			'Pekerjaan'				=> [
				'type'				=>'VARCHAR',
				'constraint'		=>'255'
			],

			'penghasilan'			=> [
				'type'				=>'INT',
				'constraint'		=>'150'
			],

			'totalzakat'			=> [
				'type'				=>'INT',
				'constraint'		=>'150'
			], 

			'idpengurus'			=> [
				'type'				=>'BIGINT',
				'constraint'		=> 36,
				'unsigned'			=> TRUE,
				'null'				=> TRUE
			],

		]);

		$this->forge->addKey('idzakatmaal', true);
		$this->forge->addForeignKey('idpengurus','daftarpengurus','idpengurus','cascade','cascade');
		$this->forge->createTable('zakatmaal');
	}

	public function down()
	{
		//
		$this->forge->dropTable('zakatmaal', true);
	}
}
