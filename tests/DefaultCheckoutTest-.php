<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use SEEK\Http\Misc\Checkout as Chkout;

class DefaultCheckoutTest extends TestCase
{
    public function test_1()
    {
        $customer_id = 1;
        $total = (new Chkout($customer_id))
                    ->add('Classic')
                    ->add('Standout')
                    ->add('Premium')
                    ->total();

        $this->assertEquals(987.97,$total);
    }

    public function test_2()
    {
    	$customer_id = 1;
        $total = (new Chkout($customer_id))
                    ->add('Classic')
        			->add('Classic')
                    ->add('Standout')
        			->add('Standout')
                    ->add('Premium')
        			->add('Premium')
        			->total();

        $this->assertEquals(1975.94,$total);
    }
}
