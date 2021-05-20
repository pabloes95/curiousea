<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ArticulosEtiquetasFixture
 *
 */
class ArticulosEtiquetasFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'articulo_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'etiqueta_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'art_etiqueta_etiqueta_key' => ['type' => 'index', 'columns' => ['etiqueta_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['articulo_id', 'etiqueta_id'], 'length' => []],
            'art_etiqueta_articulo_key' => ['type' => 'foreign', 'columns' => ['articulo_id'], 'references' => ['articulos', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'art_etiqueta_etiqueta_key' => ['type' => 'foreign', 'columns' => ['etiqueta_id'], 'references' => ['etiquetas', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8mb4_spanish2_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Records
     *
     * @var array
     */
    public $records = [
        [
            'articulo_id' => 1,
            'etiqueta_id' => 1
        ],
    ];
}
