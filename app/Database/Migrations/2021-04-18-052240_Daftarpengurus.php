<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Pengurus extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'idpengurus'			=> [
				'type'				=> 'BIGINT',
				'constraint'		=> 36,
				'unsigned'			=> TRUE,
				'auto_increment'	=> TRUE
			],
			'namapengurus'			=> [
				'type'				=> 'VARCHAR',
				'constraint'		=> '255'
			],
			'jk'					=> [
				'type'				=> 'ENUM',
				'constraint'		=> "'Pria','Wanita'",
				'default'			=> 'Pria'
			],
			'pekerjaan'				=> [
				'type'				=> 'VARCHAR',
				'constraint'		=> '255'
			],
			'alamat'				=> [
				'type'				=> 'VARCHAR',
				'constraint'		=> '1000'
			],
			'telephone'				=> [
				'type'				=> 'VARCHAR',
				'constraint'		=> '36'
			],
			'jabatan'				=> [
				'type'				=> 'ENUM',
				'constraint'		=> "'PENASEHAT','KETUA','WAKIL KETUA','SEKERTARIS','SEKSI PERLENGKAPAN','SEKSI HUMAS','SEKSI BENDAHARA','SEKSI JUMAT','SEKSI PBHI','SEKSI TEKNISI'",
				'default'			=> 'PENASEHAT'
			],
			'status'				=> [
				'type'				=> 'ENUM',
				'constraint'		=> "'AKTIF','OFF'",
				'default'			=> 'AKTIF'
			],
			'tanggalmasuk'			=> [
				'type'				=> 'DATE',
			],

		]);
		$this->forge->addKey('idpengurus', true);
		$this->forge->createTable('daftarpengurus', true);
	}

	public function down()
	{
		$this->forge->dropTable('daftarpengurus', true);
	}
}
