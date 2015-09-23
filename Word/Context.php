<?php

namespace Word;

/**
 * ひらがな 1 発音と, この次に続く文字を計算するインタフェースです.
 */
interface Context
{
    /**
     * @return string 次の文字
     */
    public function getChar();
    
    /**
     * @return Context 次の Context
     */
    public function next();
}
