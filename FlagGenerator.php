<?php

class FlagGenerator
{
    private string $flag;
    private bool $shouldGenerateFlag = false;

    public function __construct()
    {
        $this->flag = "qwerty";
    }

    public function initializeFlagGeneration(): void
    {
        $this->shouldGenerateFlag = true;
        $this->flag = md5($this->flag);
    }

    public function finalizeFlagGeneration(): void
    {
        $this->shouldGenerateFlag = false;
        $this->flag = md5($this->flag);
    }


    public function getFlag(): string
    {
        return $this->flag;
    }

    public function imBlue(): FlagGenerator
    {
        if ($this->shouldGenerateFlag) {
            $this->flag .= "imblue";
            $this->rotateFlag();
        }

        return $this;
    }

    public function da(): FlagGenerator
    {
        if ($this->shouldGenerateFlag) {
            $this->flag .= "da";
            $this->rotateFlag(3);
        }

        return $this;
    }

    public function ba(): FlagGenerator
    {
        if ($this->shouldGenerateFlag) {
            $this->flag .= "ba";
            $this->rotateFlag(5);
        }

        return $this;
    }

    public function dee(): FlagGenerator
    {
        if ($this->shouldGenerateFlag) {
            $this->flag .= "dee";
            $this->rotateFlag(7);
        }

        return $this;
    }

    public function di(): FlagGenerator
    {
        if ($this->shouldGenerateFlag) {
            $this->flag .= "di";
            $this->rotateFlag(11);
        }

        return $this;
    }

    private function rotateFlag(int $number = 13): void
    {
        $letters = 'AaBbCcDdEeFfGgHhIiJjKkLlMmNnOoPpQqRrSsTtUuVvWwXxYyZz';

        if ($number == 13) {
            $this->flag = str_rot13($this->flag);
        } else {
            $rep = substr($letters, $number * 2) . substr($letters, 0, $number * 2);
            $this->flag = strtr($this->flag, $letters, $rep);
        }
    }
}