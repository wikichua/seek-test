<?php

use Illuminate\Database\Seeder;
use SEEK\Customer;
use SEEK\Item;
use SEEK\PricingRule;

class AllTableSeeder extends Seeder
{
    public function run()
    {
		Customer::create(array(
				'name' => 'Default',
				'code' => 'Default',
			));
		Customer::create(array(
				'name' => 'Unilever',
				'code' => 'Unilever',
			));
		Customer::create(array(
				'name' => 'Apple',
				'code' => 'Apple',
			));
		Customer::create(array(
				'name' => 'Nike',
				'code' => 'Nike',
			));
		Customer::create(array(
				'name' => 'Ford',
				'code' => 'Ford',
			));

		Item::create(
			array(
				'code' => 'Classic',
				'name' => 'Classic Ad',
				'price' => '269.99',
			));
		Item::create(
			array(
				'code' => 'Standout',
				'name' => 'Standout Ad',
				'price' => '322.99',
			));
		Item::create(
			array(
				'code' => 'Premium',
				'name' => 'Premium Ad',
				'price' => '394.99',
			));

		PricingRule::create(
			array(
				'customer_code' => 'Unilever',
				'item_code' => 'Classic',
				'name' => '​3 for 2 deal on Classic Ads',
				'operator' => '=',
				'quantity' => '3',
				'special_price' => '539.98',
			));
		PricingRule::create(
			array(
				'customer_code' => 'Apple',
				'item_code' => 'Standout',
				'name' => '​​Standout Ads where the price drops to $299.99 per ad',
				'operator' => '=',
				'quantity' => '1',
				'special_price' => '299.99',
			));
		PricingRule::create(
			array(
				'customer_code' => 'Nike',
				'item_code' => '​​Premium',
				'name' => '​​Premium Ads when 4 or more',
				'operator' => '>=',
				'quantity' => '4',
				'special_price' => '379.99',
			));
		PricingRule::create(
			array(
				'customer_code' => 'Ford ',
				'item_code' => 'Classic',
				'name' => '​​​5 for 4 deal on Classic Ads',
				'operator' => '=',
				'quantity' => '5',
				'special_price' => '1079.96',
			));
		PricingRule::create(
			array(
				'customer_code' => 'Ford ',
				'item_code' => '​​​​Standout',
				'name' => '​​​​Standout Ads where the price drops to $309.99 per ad',
				'operator' => '=',
				'quantity' => '1',
				'special_price' => '309.99',
			));
		PricingRule::create(
			array(
				'customer_code' => 'Ford ',
				'item_code' => 'Premium',
				'name' => 'Premium Ads when 3 or more',
				'operator' => '>=',
				'quantity' => '3',
				'special_price' => '389.99',
			));
    }
}
