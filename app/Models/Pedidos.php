<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Pedidos extends Model
{
    use HasFactory;
    protected $table = 'pedidos';

    public function getPedidosAll()
    {
        return DB::table($this->table)->get();
    }

    public function grabarPedidos($data)
    {
        return DB::table($this->table)->insert($data);
    }
}
