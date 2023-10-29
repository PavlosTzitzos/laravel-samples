<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Models\Program;

class CurrentShowCalc extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_that_true_is_true(): void
    {
        $value = current_show_calc();
        
        $this->assertTrue(true);
    }
}
