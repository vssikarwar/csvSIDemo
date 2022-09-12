<?php
namespace App\Test\TestCase\Controller\Component;

use App\Controller\Component\ImportExportComponent;
use Cake\Controller\ComponentRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\Component\ImportExportComponent Test Case
 */
class ImportExportComponentTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Controller\Component\ImportExportComponent
     */
    public $ImportExport;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $registry = new ComponentRegistry();
        $this->ImportExport = new ImportExportComponent($registry);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ImportExport);

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
