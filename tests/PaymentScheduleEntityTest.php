<?php

namespace TomorrowIdeas\Plaid\Tests;

use DateTime;
use InvalidArgumentException;
use TomorrowIdeas\Plaid\Entities\PaymentSchedule;

/**
 * @covers TomorrowIdeas\Plaid\Entities\PaymentSchedule
 */
class PaymentScheduleEntityTest extends TestCase
{
	public function test_constructor_sets_properties(): void
	{
		$payment_schedule = new PaymentSchedule(
			PaymentSchedule::INTERVAL_MONTHLY,
			15,
			new DateTime("2020-10-01")
		);

		$this->assertEquals(PaymentSchedule::INTERVAL_MONTHLY, $payment_schedule->getInterval());
		$this->assertEquals(15, $payment_schedule->getIntervalExecutionDay());
		$this->assertEquals(new DateTime("2020-10-01"), $payment_schedule->getStartDate());
	}

	public function test_constructor_throws_on_invalid_interval(): void
	{
		$this->expectException(InvalidArgumentException::class);
		new PaymentSchedule("YEARLY", 1, new DateTime("2020-01-01"));
	}
}
