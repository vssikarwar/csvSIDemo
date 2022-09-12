<?php
namespace App\Test\TestCase\Controller\Component;

use App\Controller\Component\GmbInsightDataComponent;
use Cake\Controller\ComponentRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\Component\GmbInsightDataComponent Test Case
 */
class GmbInsightDataComponentTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Controller\Component\GmbInsightDataComponent
     */
    public $GmbInsightData;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $registry = new ComponentRegistry();
        $this->GmbInsightData = new GmbInsightDataComponent($registry);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->GmbInsightData);

        parent::tearDown();
    }

    /**
     * Test initial setup
     *
     * @return void
     */
    public function testInitialization()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
