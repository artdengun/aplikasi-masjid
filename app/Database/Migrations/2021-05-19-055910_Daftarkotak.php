<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Daftarkotak extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'idkotak'				=> [
				'type'				=> 'BIGINT',
				'constraint'		=> 36,
				'unsigned'			=> TRUE,
				'auto_increment'	=> TRUE
			],
			'jeniskotak'			=> [
				'type'				=> 'ENUM',
				'constraint'		=> "'Kotak Tanam','Kotak Yatim Piatu','Kotak Infaq','Kotak Meninggal','Kotak Taklim'",
				'default'			=> 'Kotak Tanam'
			],

			'pemasukan'				=>[
				'type'				=> 'INT',
				'constraint'		=> '255'
			],
			'subtotal'				=> [
				'type'				=> 'INT',
				'constraint'		=> '255'
			],
			'tahun'					=> [
				'type'				=> 'DATE',
			],
			'idpengurus'			=> [
				'type'				=> 'BIGINT',
				'constraint'		=> 36,
				'unsigned'			=> TRUE,
				'null'				=> TRUE
			],
		]);

		$this->forge->addKey('idkotak', true);
		$this->forge->addForeignKey('idpengurus','daftarpengurus','idpengurus','cascade','cascade');
		$this->forge->createTable('daftarkotak');
	}

	public function down()
	{
		$this->forge->dropTable('daftarkotak', true);
	}
}
