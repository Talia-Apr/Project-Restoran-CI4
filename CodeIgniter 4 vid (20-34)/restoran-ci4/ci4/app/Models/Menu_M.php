<?php namespace App\Models;

use CodeIgniter\Model;

    class Menu_M extends Model
    {
        protected $table = 'tblmenu';
        protected $primaryKey = 'idmenu';
        protected $allowedFields = ['idkategori', 'menu', 'gambar', 'harga'];

        protected $validationRules = [
            'menu' => 'alpha_numeric_space|min_length[3]|is_unique[tblmenu.menu]',
            'harga' => 'numeric'
        ];

        protected $validationMessages = [
            'menu' => [
                'alpha_numeric_space' => 'OOPS!Tidak boleh menggunakan simbol',
                'min_length'          => 'OOPS!Minimal 3 Huruf',
                'is_unique'           => 'OOPS!Ada data yang sama'
            ],
            'harga' => [
                'numeric' => 'OOPS!Harus diisi dengan angka'
            ]
        ];
    }

?>