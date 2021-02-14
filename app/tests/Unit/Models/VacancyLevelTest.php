<?php

namespace Tests\Unit\Models;

use PHPUnit\Framework\TestCase;
use App\Models\VacancyLevel;

class VacancyLevelTest extends TestCase
{
    /**
     * @param int $remainingCount
     * @param string $exepctedMark
     * @dataProvider dataMark
     */
    public function testMark(int $remainingCount, string $exepctedMark)
    {
        $level = new VacancyLevel($remainingCount);
        $this->assertSame($exepctedMark, $level->mark());
    }

    public function dataMark()
    {
        return [
            '空きなし' => [
                'remainingCount' => 0,
                'expectedMark' => '×'
            ],
            '残りわずか' => [
                'remainingCount' => 4,
                'expectedMark' => '△'
            ],
            '空き十分' => [
                'remainingCount' => 5,
                'expectedMark' => '◎'
            ],
        ];
    }

    /**
     * @param int $remainingCount
     * @param string $expectedSlug
     * @dataProvider dataSlug
     */
    public function testSlug(int $remainingCount, string $exepctedSlug)
    {
        $level = new VacancyLevel($remainingCount);
        $this->assertSame($exepctedSlug, $level->slug());
    }

    public function dataSlug()
    {
        return [
            '空きなし' => [
                'remainingCount' => 0,
                'expectedSlug' => 'empty'
            ],
            '残りわずか' => [
                'remainingCount' => 4,
                'expectedSlug' => 'few'
            ],
            '空き十分' => [
                'remainingCount' => 5,
                'expectedSlug' => 'enough'
            ],
        ];
    }
}
