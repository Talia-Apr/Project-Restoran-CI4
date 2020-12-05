<?php namespace App\Models;

    use CodeIgniter\Model;

    class Pelanggan_M extends Model
    {
        protected $table = 'tblpelanggan';
        protected $primaryKey = 'idpelanggan';
        protected $allowedFields = ['pelanggan', 'alamat', 'telp', 'email', 'password', 'aktif'];
        protected $validationRules = [
            'email' => 'valid_email'
        ];

        protected $validationMessages = [
            'email' => [
                'valid_email' => 'OOPS!Email Salah'
            ]
        ];
    }

?>