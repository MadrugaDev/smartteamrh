<?php

/**
 * Check [ HELPER ]
 * Classe auxiliar responsável por manipular e validar dados!
 */
class Check {

    private static $Data;
    private static $Format;

    /**
     * <b>Verifica E-mail:</b> Executa validação de formato de e-mail. Se for um email válido retorna true, ou retorna false.
     * @param STRING $Email = Uma conta de e-mail
     * @return BOOL = True para um email válido, ou false
     */
    public static function Email($Email) {
        self::$Data = (string) $Email;
        self::$Format = '/[a-z0-9_\.\-]+@[a-z0-9_\.\-]*[a-z0-9_\.\-]+\.[a-z]{2,4}$/';

        if (preg_match(self::$Format, self::$Data)):
            return true;
        else:
            return false;
        endif;
    }

    /**
     * <b>Tranforma URL:</b> Tranforma uma string no formato de URL amigável e retorna a string convertida!
     * @param STRING $Name = Uma string qualquer
     * @return STRING = $Data = Uma URL amigável válida
     */
    public static function Name($Name) {
        self::$Format = array();
        self::$Format['a'] = 'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜüÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûýýþÿRr"!@#$%&*()_-+={[}]/?;:.,\\\'<>°ºª';
        self::$Format['b'] = 'aaaaaaaceeeeiiiidnoooooouuuuuybsaaaaaaaceeeeiiiidnoooooouuuyybyRr                                 ';

        self::$Data = strtr(utf8_decode($Name), utf8_decode(self::$Format['a']), self::$Format['b']);
        self::$Data = strip_tags(trim(self::$Data));
        
        return mb_convert_case(utf8_encode(self::$Data),MB_CASE_UPPER);
    }
    
    /**
     * <b>Tranforma URL:</b> Tranforma uma string no formato de URL amigável e retorna a string convertida!
     * @param STRING $Slug = Uma string qualquer
     * @return STRING = $Data = Uma URL amigável válida
     */
    public static function Slug($Slug) {
        self::$Format = array();
        self::$Format['a'] = 'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜüÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûýýþÿRr"!@#$%&*()_-+={[}]/?;:.,\\\'<>°ºª';
        self::$Format['b'] = 'aaaaaaaceeeeiiiidnoooooouuuuuybsaaaaaaaceeeeiiiidnoooooouuuyybyRr                                 ';

        self::$Data = strtr(utf8_decode($Name), utf8_decode(self::$Format['a']), self::$Format['b']);
        self::$Data = strip_tags(trim(self::$Data));
        self::$Data = str_replace(' ', '-', self::$Data);
        self::$Data = str_replace(array('-----', '----', '---', '--'), '-', self::$Data);

        return strtolower(utf8_encode(self::$Data));
    }

    /**
     * <b>Checa CPF:</b> Informe um CPF para checar sua validade via algoritmo!
     * @param STRING $CPF = CPF com ou sem pontuação
     * @return BOLEAM = True se for um CPF válido
     */
    public static function CPF($Cpf) {
        self::$Data = preg_replace('/[^0-9]/', '', $Cpf);

        if (strlen(self::$Data) != 11):
            return false;
        endif;

        $digitoA = 0;
        $digitoB = 0;

        for ($i = 0, $x = 10; $i <= 8; $i++, $x--) {
            $digitoA += self::$Data[$i] * $x;
        }

        for ($i = 0, $x = 11; $i <= 9; $i++, $x--) {
            if (str_repeat($i, 11) == self::$Data) {
                return false;
            }
            $digitoB += self::$Data[$i] * $x;
        }

        $somaA = (($digitoA % 11) < 2 ) ? 0 : 11 - ($digitoA % 11);
        $somaB = (($digitoB % 11) < 2 ) ? 0 : 11 - ($digitoB % 11);

        if ($somaA != self::$Data[9] || $somaB != self::$Data[10]) {
            return false;
        } else {
            return true;
        }
    }

    /**
     * <b>Tranforma Data:</b> Transforma uma data no formato DD/MM/YY em uma data no formato YYYY-MM-DD!
     * @param STRING $Name = Data em (d/m/Y)
     * @return STRING = $Data = Data no formato YYYY-MM-DD!
     */
    public static function Nascimento($Data) {
        self::$Format = explode(' ', $Data);
        self::$Data = explode('/', self::$Format[0]);

        if (checkdate(self::$Data[1], self::$Data[0], self::$Data[2])):
            self::$Data = self::$Data[2] . '-' . self::$Data[1] . '-' . self::$Data[0];
            return self::$Data;
        else:
            return false;
        endif;
    }

    /**
     * <b>Tranforma TimeStamp:</b> Transforma uma data no formato DD/MM/YY em uma data no formato TIMESTAMP!
     * @param STRING $Name = Data em (d/m/Y) ou (d/m/Y H:i:s)
     * @return STRING = $Data = Data no formato timestamp!
     */
    public static function Data($Data) {
        self::$Format = explode(' ', $Data);
        self::$Data = explode('/', self::$Format[0]);

        if (!checkdate(self::$Data[1], self::$Data[0], self::$Data[2])):
            return false;
        else:
            if (empty(self::$Format[1])):
                self::$Format[1] = date('H:i:s');
            endif;

            self::$Data = self::$Data[2] . '-' . self::$Data[1] . '-' . self::$Data[0] . ' ' . self::$Format[1];
            return self::$Data;
        endif;
    }

    /**
     * <b>Limita os Palavras:</b> Limita a quantidade de palavras a serem exibidas em uma string!
     * @param STRING $String = Uma string qualquer
     * @param INT $name Description INT = $Limite = String limitada pelo $Limite
     */
    public static function Words($String, $Limite, $Pointer = null) {
        self::$Data = strip_tags(trim($String));
        self::$Format = (int) $Limite;

        $ArrWords = explode(' ', self::$Data);
        $NumWords = count($ArrWords);
        $NewWords = implode(' ', array_slice($ArrWords, 0, self::$Format));

        $Pointer = (empty($Pointer) ? '...' : ' ' . $Pointer );
        $Result = ( self::$Format < $NumWords ? $NewWords . $Pointer : self::$Data );
        return $Result;
    }

    /**
     * <b>Limita os Caracteres:</b> Limita a quantidade de letras a serem exibidas em uma string!
     * @param STRING $String = Uma string qualquer
     * @param INT $name Description INT = $Limite = String limitada pelo $Limite
     */
    public static function Chars($String, $Limite) {
        self::$Data = strip_tags($String);
        self::$Format = $Limite;
        if (strlen(self::$Data) <= self::$Format) {
            return self::$Data;
        } else {
            $subStr = strrpos(substr(self::$Data, 0, self::$Format), ' ');
            return substr(self::$Data, 0, $subStr) . '';
        }
    }

}
