<?php

namespace Word;

class Generator
{
    /**
     * 生成する文字数
     * 
     * @var int
     */
    private $length;
    
    /**
     * 指定された文字数分のランダム文字列を生成する Generator オブジェクトを構築します.
     * 
     * @param int $length 文字数
     */
    public function __construct($length)
    {
        $this->length = $length;
    }
    
    /**
     * 初期化時に指定した文字数分だけランダムひらがな文字列を生成します.
     * 
     * @return string 生成された文字列
     */
    public function generate()
    {
        $result   = "";
        $bytes    = 0;
        $tr       = new Translator();
        $context  = new Start($tr);
        $max      = $this->length * 3;
        while ($bytes < $max) {
            $context = $context->next();
            $next    = $context->getChar();
            
            $bytes += strlen($next);
            $result .= $next;
        }
        return $result;
    }
}
