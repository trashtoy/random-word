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
     * @covers Word\Translator::getCharList
     */
    public function testGetCharList()
    {
        $obj = $this->object;
        $cl  = $obj->getCharList();
        $this->assertTrue(in_array("じぇ", $cl, true));
        $this->assertFalse(in_array("ばょ", $cl, true));
    }
    
    /**
     * @covers Word\Translator::getConsonantList
     */
    public function testGetConsonantList()
    {
        $obj = $this->object;
        $cl  = $obj->getConsonantList();
        $this->assertTrue(in_array("sh", $cl, true));
        $this->assertFalse(in_array("", $cl, true));
    }
}
