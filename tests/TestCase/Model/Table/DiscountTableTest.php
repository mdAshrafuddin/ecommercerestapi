<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DiscountTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DiscountTable Test Case
 */
class DiscountTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\DiscountTable
     */
    protected $Discount;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Discount',
        'app.Orders',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Discount') ? [] : ['className' => DiscountTable::class];
        $this->Discount = TableRegistry::getTableLocator()->get('Discount', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Discount);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
