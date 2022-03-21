<?php

namespace SOLID\SingleResponsibility;

/*
 SalesRepository:
 This class is responisble to make database queries.
*/

class SalesRepository
{
    public function between($startDate, $endDate)
    {
        $sales = [
            new Sale('2021-03-20', 301),
            new Sale('2021-03-20', 800),
            new Sale('2021-03-20', 502),
            new Sale('2022-03-20', 6520),
            new Sale('2022-03-20', 1052),
            new Sale('2022-03-20', 150)
        ];

        $sales = array_map(function (Sale $sale) use ($startDate, $endDate) {
            if ($sale->date === $startDate || $sale->date === $endDate) {
                return $sale->amount;
            }
        }, $sales);

        return array_sum($sales) / 100;
    }
}
