<?php namespace App\View\Cell;

use Cake\View\Cell;

class CuriosidadCell extends Cell
{

    public function display()
    {
      $this->loadModel('Curiosidads');
      $curiosidad = $this->Curiosidads->find('all')
      ->order('rand()')
      ->first();
        $this->set('curiosidad',$curiosidad);
    }

}
?>
