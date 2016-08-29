<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use SEEK\Http\Misc\Checkout as Chkout;

class UnileverCheckoutTest extends TestCase
{
    public function test_1()
    {
    	$customer_id = 2;
        $total = (new Chkout($customer_id))
        			->add('Classic')
        			->add('Classic')
        			->add('Classic')
        			->total();

        $this->assertEquals(539.98,$total);
    }
    public function test_2()
    {
    	$customer_id = 2;
        $total = (new Chkout($customer_id))
        			->add('Classic')
        			->add('Classic')
        			->add('Classic')
        			->add('Classic')
        			->total();

        $this->assertEquals(809.97,$total);
    }
    public function test_3()
    {
    	$customer_id = 2;
        $total = (new Chkout($customer_id))
        			->add('Classic')
        			->add('Classic')
        			->add('Classic')

        			->add('Classic')
        			->add('Classic')
        			->add('Classic')
        			
        			->add('Classic')
        			->add('Classic')
        			->total();

        $this->assertEquals(1619.94,$total);
    }
    public function test_4()
    {
    	$customer_id = 2;
        $total = (new Chkout($customer_id))
        			->add('Classic')
        			->add('Classic')
        			->add('Classic')

        			->add('Premium')
        			->total();

        $this->assertEquals(934.97,$total);
    }
}
