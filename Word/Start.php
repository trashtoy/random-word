<?php

namespace Word;

/**
 * 生成されるランダム文字列の最初の文字を決定するための Context です.
 * このクラスの next() メソッドは "っ", "ん", "ー" を除く任意の文字をあらわす Context を返します.
 */
class Start implements Context
{
    /**
     *
     * @var Translator
     */
    private $translator;
    
    /**
     * 
     * @param Translator $translator
     */
    public function __construct(Translator $translator)
    {
        $this->translator = $translator;
    }
    
    /**
     * このクラスの getChar() メソッドは使用されません.
     * 
     * @return string
     */
    public function getChar()
    {
        return "";
    }
    
    /**
     * ランダム文字列のはじめの文字をあらわす Context を返します.
     * 
     * @return Context
     */
    public function next()
    {
        $tr   = $this->translator;
        $char = $tr->getRandomChar();
        return new Base($tr, $char);
    }
}
