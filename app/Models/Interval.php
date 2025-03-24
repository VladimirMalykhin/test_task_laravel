<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;

class Interval extends Model
{
    public function getIntervals(int $left, int $right): ?Collection
    {
        return Interval::query()
            ->where(function ($query) use ($left, $right) {
                $query->whereBetween('start', [$left, $right])
                      ->orWhereBetween('end', [$left, $right])
                      ->orWhere(function ($query) use ($left, $right) {
                          $query->where('start', '<=', $left)
                                ->where('end', '>=', $right);
                      });
            })
            ->get(['id', 'start', 'end']);
    }
}
