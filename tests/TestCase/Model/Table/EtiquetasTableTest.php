<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\EtiquetasTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\EtiquetasTable Test Case
 */
class EtiquetasTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\EtiquetasTable
     */
    public $Etiquetas;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.etiquetas',
        'app.articulos',
        'app.users',
        'app.categorias',
        'app.curiosidads',
        'app.comentarios',
        'app.imagens',
        'app.articulos_etiquetas'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Etiquetas') ? [] : ['className' => 'App\Model\Table\EtiquetasTable'];
        $this->Etiquetas = TableRegistry::get('Etiquetas', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Etiquetas);

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
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
