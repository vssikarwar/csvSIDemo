<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\GmbInsightOutletDatasTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\GmbInsightOutletDatasTable Test Case
 */
class GmbInsightOutletDatasTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\GmbInsightOutletDatasTable
     */
    public $GmbInsightOutletDatas;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.GmbInsightOutletDatas',
        'app.MasterOutlets',
        'app.Outlets',
        'app.Locations',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('GmbInsightOutletDatas') ? [] : ['className' => GmbInsightOutletDatasTable::class];
        $this->GmbInsightOutletDatas = TableRegistry::getTableLocator()->get('GmbInsightOutletDatas', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->GmbInsightOutletDatas);

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
