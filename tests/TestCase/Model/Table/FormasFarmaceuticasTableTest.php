<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FormasFarmaceuticasTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FormasFarmaceuticasTable Test Case
 */
class FormasFarmaceuticasTableTest extends TestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.formas_farmaceuticas'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('FormasFarmaceuticas') ? [] : ['className' => 'App\Model\Table\FormasFarmaceuticasTable'];
        $this->FormasFarmaceuticas = TableRegistry::get('FormasFarmaceuticas', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->FormasFarmaceuticas);

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
