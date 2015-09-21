<?php
namespace Word;

class TranslatorTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Translator
     */
    protected $object;
    
    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $this->object = new Translator();
    }
    
    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
    }
    
    /**
     * @covers Word\Translator::translate
     */
    public function testTranslate()
    {
        $obj = $this->object;
        $this->assertSame("くゎ", $obj->translate("kwa"));
        $this->assertSame("", $obj->translate("yi")); // 存在しない場合は空文字列を返すことを確認します
    }
    
    /**
     * @covers Word\Translator::getRandomConsonant
     */
    public function testGetRandomConsonant()
    {
        $obj = $this->object;
        $c   = $obj->getRandomConsonant();
        $this->assertRegExp("/\\A[^aiueo]*\\z/", $c);
    }
}
