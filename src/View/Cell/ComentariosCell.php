<?php namespace App\View\Cell;

use Cake\View\Cell;

class ComentariosCell extends Cell
{

    public function display($articulo)
    {
      $this->loadModel('Comentarios');

        $comentarios = $this->Comentarios->find()->contain(['Users'])->where(["articulo_id"=>$articulo]);

        $this->set('comentarios',$comentarios);
    }

}
?>
