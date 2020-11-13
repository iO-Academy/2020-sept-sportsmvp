<?php

require_once '../vendor/autoload.php';

use PHPUnit\Framework\TestCase;
use TheRealMVP\Entities\Sport;
use TheRealMVP\DisplayHelpers\DisplayFilter;

class DisplayFilterTest extends TestCase
{
    public function testDisplayFilterSuccess()
    {
        $_SESSION['sport'] = '1';
        $SportMock = $this->createMock(\TheRealMVP\Entities\Sport::class);
        $SportMock->expects($this->any())
            ->method('getId')
            ->willReturn(1);
        $SportMock->expects($this->any())
            ->method('getName')
            ->willReturn('Football');

        $result = \TheRealMVP\DisplayHelpers\DisplayFilter::displayFilter('sport', [$SportMock]);
        $expected = '<option value="1" selected>Football</option>';
        $this->assertEquals($expected, $result);
    }

    public function testDisplayDataFailure()
    {
        $this->expectException(TypeError::class);
        $result = \TheRealMVP\DisplayHelpers\DisplayFilter::displayFilter('hello');
    }

}
