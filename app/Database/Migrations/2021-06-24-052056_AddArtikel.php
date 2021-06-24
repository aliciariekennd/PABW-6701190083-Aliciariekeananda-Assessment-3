<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddArtikel extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'artikel_id'          => [
					'type'           => 'VARCHAR',
					'constraint'     => "10",					
			],
			'tanggal'       => [
				'type'       => 'DATETIME',
				'null' => true,
			],
			'judul'       => [
					'type'       => 'TEXT',
					'null' => true,
			],
			'konten' => [
					'type' => 'TEXT',
					'null' => true,
			],
		]);
		$this->forge->addKey('artikel_id', true);
		$this->forge->createTable('artikel');
	}

	public function down()
	{
		$this->forge->dropTable('artikel');
	}
}
