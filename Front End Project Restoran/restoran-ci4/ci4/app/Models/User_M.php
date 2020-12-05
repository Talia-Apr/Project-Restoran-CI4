<?php namespace App\Models;

use CodeIgniter\Model;

    class User_M extends Model
    {
        protected $table = 'tbluser';

        protected $allowedFields = ['user', 'email', 'password', 'level', 'aktif'];

        protected $primaryKey = 'iduser';

        protected $validationRules = [
            'user' => 'alpha_numeric_space|min_length[3]|is_unique[tbluser.user]',
            'email' => 'valid_email'
        ];

        protected $validationMessages = [
            'user' => [
                'alpha_numeric_space' => 'OOPS!Tidak boleh menggunakan simbol',
                'min_length'          => 'OOPS!Minimal 3 Huruf',
                'is_unique'           => 'OOPS!Nama User sudah terpakai'
            ],
            'email' => [
                'valid_email' => 'OOPS!Email salah'
            ]
        ];
    }

?>