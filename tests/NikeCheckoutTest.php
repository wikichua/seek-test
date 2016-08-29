<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use SEEK\Http\Misc\Checkout as Chkout;

class NikeCheckoutTest extends TestCase
{
    public function test_1()
    {
        $customer_id = 4;
        $total = (new Chkout($customer_id))
                    ->add('Premium')
                    ->add('Premium')
                    ->add('Premium')
                    ->add('Premium')
                    ->total();

        $this->assertEquals(1519.96,$total);
    }

    public function test_2()
    {
        $customer_id = 4;
        $total = (new Chkout($customer_id))
                    ->add('Premium')
                    ->add('Premium')
                    ->add('Premium')
                    ->add('Premium')
                    ->add('Premium')
                    ->add('Premium')
                    ->total();

        $this->assertEquals(2279.94,$total);
    }

    public function test_3()
    {
    	$customer_id = 4;
        $total = (new Chkout($customer_id))
                    ->add('Premium')
                    ->add('Premium')
        			->total();

        $this->assertEquals(789.98,$total);
    }
}
