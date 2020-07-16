<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CartItemTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CartItemTable Test Case
 */
class CartItemTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CartItemTable
     */
    protected $CartItem;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.CartItem',
        'app.Users',
        'app.ProductDetails',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('CartItem') ? [] : ['className' => CartItemTable::class];
        $this->CartItem = TableRegistry::getTableLocator()->get('CartItem', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->CartItem);

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

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
