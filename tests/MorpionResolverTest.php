<?php
/**
 * Created by PhpStorm.
 * User: wilder16
 * Date: 17/07/18
 * Time: 09:35
 */

namespace App\Tests;

use App\Service\MorpionResolver;
use PHPUnit\Framework\TestCase;
use App\Entity\Morpion;

class MorpionResolverTest extends TestCase
{
    public function testLines()
    {
        $morpionResolver = new MorpionResolver();

        $morpion = new Morpion([
            ['o','x','o'],
            ['x','x','x'],
            ['o','o','x'],
        ]);
        $this->assertEquals('x', $morpionResolver->resolve($morpion));

        $morpion = new Morpion([
            ['x','o','x'],
            ['o','o','o'],
            ['o','x','o'],
        ]);
        $this->assertEquals('o', $morpionResolver->resolve($morpion));

        $morpion = new Morpion([
            ['o','x','o'],
            ['o','x','o'],
            ['x','o','x'],
        ]);
        $this->assertEquals(null, $morpionResolver->resolve($morpion));
    }

    public function testColumns()
    {
        $morpionResolver = new MorpionResolver();

        $morpion = new Morpion([
            ['o','x','x'],
            ['x','o','x'],
            ['o','o','x'],
        ]);
        $this->assertEquals('x', $morpionResolver->resolve($morpion));

        $morpion = new Morpion([
            ['o','x','o'],
            ['x','x','o'],
            ['o','o','o'],
        ]);
        $this->assertEquals('o', $morpionResolver->resolve($morpion));
    }

    public function testDiagonales()
    {
        $morpionResolver = new MorpionResolver();

        $morpion = new Morpion([
            ['x','x','o'],
            ['x','x','o'],
            ['o','o','x'],
        ]);
        $this->assertEquals('x', $morpionResolver->resolve($morpion));

        $morpion = new Morpion([
            ['o','x','o'],
            ['x','o','x'],
            ['o','x','o'],
        ]);
        $this->assertEquals('o', $morpionResolver->resolve($morpion));
    }
}
