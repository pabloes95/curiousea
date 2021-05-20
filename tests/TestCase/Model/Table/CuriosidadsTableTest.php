<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CuriosidadsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CuriosidadsTable Test Case
 */
class CuriosidadsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CuriosidadsTable
     */
    public $Curiosidads;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.curiosidads',
        'app.categorias',
        'app.articulos',
        'app.users',
        'app.comentarios',
        'app.imagens',
        'app.etiquetas',
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
        $config = TableRegistry::exists('Curiosidads') ? [] : ['className' => 'App\Model\Table\CuriosidadsTable'];
        $this->Curiosidads = TableRegistry::get('Curiosidads', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Curiosidads);

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
