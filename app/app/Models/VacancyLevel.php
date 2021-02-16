<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VacancyLevel extends Model
{
    private $remainingCount;

    public function __construct(int $remainingCount)
    {
        $this->remainingCount = $remainingCount;
    }

    public function __toString()
    {
        return $this->mark();
    }

    public function mark(): string
    {
        //slug()と条件分岐が同じなので、安定性の高いslug()を基準としたメソッドにする
        $marks = [
            'empty' => '×',
            'few' => '△',
            'enough' => '◎',
        ];
        $slug = $this->slug();
        //assertionがfalseであるかどうかを調べる
        assert(isset($marks[$slug]), new \DomainException('invalid slug value'));

        return $marks[$slug];
    }

    public function slug(): string
    {
        if ($this->remainingCount === 0) {
            return 'empty';
        }
        if ($this->remainingCount < 5) {
            return 'few';
        }
        return 'enough';
    }
}
