<?php

namespace Word;

/**
 * 促音 (っ) をあらわす Context です.
 * "っ" の後ろには, あ行, な行, ま行, や行, ら行, わ行以外の発音が続きます.
 */
class Sokuon implements Context
{
    /**
     *
     * @var Translator
     */
    private $translator;
    
    public function __construct(Translator $translator)
    {
        $this->translator = $translator;
    }
    
    /**
     * 文字列 "っ" を返します.
     * 
     * @return string
     */
    public function getChar()
    {
        return "っ";
    }
    
    /**
     * あ行, な行, ま行, や行, ら行, わ行以外の発音の Base オブジェクトを返します.
     * 
     * @return Context
     */
    public function next()
    {
        $char = $this->getNextChar();
        return new Base($this->translator, $char);
    }
    
    /**
     * 後ろに続く文字を生成します.
     * 
     * @return string
     */
    private function getNextChar()
    {
        $c    = $this->getNextConsonant();
        $v    = $this->translator->getRandomVowel();
        $char = $this->translator->translate($c . $v);
        return ($char === "") ? $this->getNextChar() : $char;
    }
    
    /**
     * 後ろに続く文字の子音部分を返します.
     * 
     * @return string
     */
    private function getNextConsonant()
    {
        $ng     = ["", "n", "m", "y", "r", "w"];
        $result = $this->translator->getRandomConsonant();
        return in_array(substr($result, 0, 1), $ng) ? $this->getNextConsonant() : $result;
    }
}
