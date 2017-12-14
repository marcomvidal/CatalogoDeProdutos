<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $table = 'produtos';

    protected $fillable = [
        'referencia',
        'titulo',
        'descricao',
        'preco',
        'foto',
    ];


    /**
     * Converte um valor em formato monetário de Real em Dólar.
     * 
     * @param   None
     * @return  $this
     */
    public function converteRealDolar()
    {
        $this->preco = str_replace(".", "", $this->preco);
        $this->preco = str_replace(",", "", $this->preco);

        return $this;
    }


    /**
     * Converte um valor em formato monetário de Real em Dólar.
     * 
     * @param   None
     * @return  string  $this
     */
    public function converteDolarReal()
    {
        return $this->preco = str_replace(".", ",", $this->preco);
    }


    /**
     * Realiza o upload de um imagem originária de um formulário.
     * 
     * @param   Request $request
     * @return  $this
     */
    public function uploadFoto($request)
    {
        if ($request->hasFile('fotoproduto')) {
            $this->foto = md5($this->referencia) .".". $request->file('fotoproduto')->getClientOriginalExtension();
            $request->file('fotoproduto')->move(public_path('./img/produtos/'), $this->foto);

            return $this;
        }
    }
    
}
