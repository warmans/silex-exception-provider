<?php
namespace Warmans\Silex;

class ExceptionProviderTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var ExceptionProvider
     */
    private $object;

    public function setUp()
    {
        $this->object = new ExceptionProvider();
        $this->object->boot(new \Silex\Application(array()));
    }

    public function testErrorConvertedToException()
    {
        try {
            trigger_error('An error', E_USER_ERROR);
        } catch (\ErrorException $e) {
            $this->assertEquals('An error', $e->getMessage());
            return;
        }
        $this->fail('Expected exception was not throwm');
    }

    public function testWarningConvertedToException()
    {
        try {
            trigger_error('A warning', E_USER_WARNING);
        } catch (\ErrorException $e) {
            $this->assertEquals('A warning', $e->getMessage());
            return;
        }
        $this->fail('Expected exception was not throwm');

    }

    public function testNoticeConvertedToException()
    {
        try {
            trigger_error('A notice', E_USER_NOTICE);
        } catch (\ErrorException $e) {
            $this->assertEquals('A notice', $e->getMessage());
            return;
        }
        $this->fail('Expected exception was not throwm');
    }

    public function testDeprecatedConvertedToException()
    {
        try {
            trigger_error('feature deprecated', E_USER_DEPRECATED);
        } catch (\ErrorException $e) {
            $this->assertEquals('feature deprecated', $e->getMessage());
            return;
        }
        $this->fail('Expected exception was not throwm');
    }
}
 
