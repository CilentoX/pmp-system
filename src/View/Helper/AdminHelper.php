<?php

namespace App\View\Helper;

use Cake\View\Helper;

class AdminHelper extends Helper
{
    /* VERIFICA SE EXISTE A PERMISSAO NO OBJETO DE PERMISSOES */

    public function traduzir($controller, $action)
    {
        $controller = strtolower($controller);
        $traducao = file_get_contents('traducao/traducoes.json');
        $traducao = json_decode($traducao, true);
        return array('controller' => $traducao[$controller]['traducao'], 'action' => $traducao[$controller]['acoes'][$action]);
    }


    public function getDiaSemanaText($dia = 0)
    {
        $dias = ['Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sábado'];
        return $dias[$dia];
    }

}
