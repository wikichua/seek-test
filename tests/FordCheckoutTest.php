<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use SEEK\Http\Misc\Checkout as Chkout;

class FordCheckoutTest extends TestCase
{
    public function test_1()
    {
    	$customer_id = 5;
        $total = (new Chkout($customer_id))
                    ->add('Classic')
                    ->add('Classic')
                    ->add('Classic')
                    ->add('Classic')
                    ->add('Classic')

                    ->add('Standout')

                    ->add('Premium')
                    ->add('Premium')
        			->add('Premium')

        			->total();

        $this->assertEquals(2559.92,$total);
    }
}
