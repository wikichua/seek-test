<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use SEEK\Http\Misc\Checkout as Chkout;

class AppleCheckoutTest extends TestCase
{
    public function test_1()
    {
    	$customer_id = 3;
        $total = (new Chkout($customer_id))
                    ->add('Standout')
                    ->add('Standout')
                    ->add('Standout')
        			->add('Premium')
        			->total();

        $this->assertEquals(1294.96,$total);
    }
}
