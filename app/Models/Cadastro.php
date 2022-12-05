<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cadastro extends Model
{
    use HasFactory;
     protected $table = 'cadastro';
     protected $fillable = ['id', 'nome', 'preco'];
   
   
    // chamando o relacionamento no modelo
  
  
    public function user(){
     return $this->belongsTo(User::class);
     }
   
     public function categoria(){
        return $this->belongsToMany(Catagoria::class, 'imoveis_categorias');
        }
        

    public function foto(){
            return $this->hasMany(ImovelFoto::class);
}
        
}
