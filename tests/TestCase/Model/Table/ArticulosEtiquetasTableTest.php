<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ArticulosEtiquetasTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ArticulosEtiquetasTable Test Case
 */
class ArticulosEtiquetasTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ArticulosEtiquetasTable
     */
    public $ArticulosEtiquetas;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.articulos_etiquetas',
        'app.articulos',
        'app.users',
        'app.categorias',
        'app.comentarios',
        'app.imagens',
        'app.etiquetas'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('ArticulosEtiquetas') ? [] : ['className' => 'App\Model\Table\ArticulosEtiquetasTable'];
        $this->ArticulosEtiquetas = TableRegistry::get('ArticulosEtiquetas', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ArticulosEtiquetas);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
