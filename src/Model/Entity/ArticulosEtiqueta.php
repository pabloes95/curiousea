<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ArticulosEtiqueta Entity
 *
 * @property int $articulo_id
 * @property int $etiqueta_id
 *
 * @property \App\Model\Entity\Articulo $articulo
 * @property \App\Model\Entity\Etiqueta $etiqueta
 */
class ArticulosEtiqueta extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'articulo_id' => false,
        'etiqueta_id' => false
    ];
}
