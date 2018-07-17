<?php
/**
 * Created by PhpStorm.
 * User: wilder16
 * Date: 17/07/18
 * Time: 09:47
 */

namespace App\Service;


use App\Entity\Morpion;

class MorpionResolver
{
    /**
     * @param Morpion $morpion
     * @return null|string
     */
    public function resolve(Morpion $morpion): ?string
    {
        $grid = $morpion->getGrid();
        $n = count($grid);
        $winners = [
            'x' => 0,
            'o' => 0,
        ];

        $tests = $this->constructTests($grid);
        $this->checkLines($n, $tests, $winners);

        return $this->checkWinner($winners);
    }

    /**
     * @param array $winners
     * @return null|string
     */
    private function checkWinner(array $winners): ?string
    {
        if (!isset($winners['x']) || !isset($winners['o']) || $winners['x'] === $winners['o']) {
            return null;
        } elseif ($winners['x'] < $winners['o']) {
            return 'o';
        } else {
            return 'x';
        }
    }

    /**
     * @param int $size
     * @param array $lines
     * @param array $counter
     */
    private function checkLines(int $size, array $lines, array &$counter): void
    {
        foreach ($lines as $line) {
            $lineValues = array_count_values($line);
            if (isset($lineValues['x']) && $lineValues['x'] === $size) {
                $counter['x']++;
            } elseif (isset($lineValues['o']) && $lineValues['o'] === $size) {
                $counter['o']++;
            }
        }
    }

    /**
     * @param array $grid
     * @return array
     */
    private function constructTests(array $grid): array
    {
        $n = count($grid);
        $tests = [];
        $diagonale = [];
        $reverseDiagonale = [];
        for ($i = 0; $i < $n; $i++) {
            $tests[] = $grid[$i];
            $column = [];
            for($j = 0; $j < $n; $j++) {
                $column[] = $grid[$j][$i];
                if ($i === $j) {
                    $diagonale[] = $grid[$i][$j];
                }
            }
            $tests[] = $column;

            $k = $n - 1 - $i;
            $reverseDiagonale[] = $grid[$i][$k];
        }
        $tests[] = $diagonale;
        $tests[] = $reverseDiagonale;

        return $tests;
    }
}