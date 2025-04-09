<?php
// src/View/Helper/LotesHelper.php

namespace App\View\Helper;

use Cake\View\Helper;
use DateTime;

class LotesHelper extends Helper
{
    public function calcularDiferencaVencimento($dataVencimento)
    {
        $vencimento = new DateTime($dataVencimento);
        $hoje = new DateTime();
        $dias = $hoje->diff($vencimento);
        $dias = $dias->format('%R%a');
        if($dias < 0){
            $dias = $dias * -1;
            $dias = '<span class="label label-danger">Vencido</span> ';
        }else if($dias > 0  && $dias < 90){
            $dias = '<span class="label label-warning">'.intval($dias).' dias </span> ';
        }
        else{
            $dias = '<span class="label label-success">'.intval($dias).' dias </span> ';
        }
        return $dias;
    }

    public function diasParaVencer($dataVencimento)
    {
        $vencimento = new DateTime($dataVencimento);
        $hoje = new DateTime();
        $dias = $hoje->diff($vencimento);
        $dias = $dias->format('%R%a');
        return $dias;
    }
}