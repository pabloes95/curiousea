<?php
namespace App\View\Cell;

use Cake\View\Cell;

class ArticulosCell extends Cell
{

    public function display()
    {
      $this->loadModel('Articulos');
        $articulos = $this->Articulos->find()->where(['publicado'=> true])->order(['modified' => 'DESC'])->limit(8);
        $this->set('articulos',$articulos);
    }

}
?>
