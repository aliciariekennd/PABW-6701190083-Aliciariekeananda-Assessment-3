<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ArtikelSeeder extends Seeder
{
	public function randString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
	public function run()
	{
		$data = [
			'artikel_id' => $this->randString(),
			'tanggal' => date("Y-m-d H:i:s"),
			'judul' => 'Lorem ipsum',
			'konten'    => 'Lorem ipsum dolor sit amet',
		];
		$this->db->query("INSERT INTO artikel (artikel_id, judul,konten,tanggal) VALUES(:artikel_id:, :judul:, :konten:,:tanggal:)", $data);
	}
}
