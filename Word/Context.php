<?php

namespace Word;

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
