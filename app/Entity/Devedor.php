<?php

namespace App\Entity;

use \App\Db\Database;
use PDO;

/**
 * Description of Devedor
 *
 * @author Lucas
 */
class Devedor {

    /**
     * Identificador do Devedor
     * @var int
     */
    private $id;

    /**
     * Nome do Devedor
     * @var string
     */
    private $nome;

    /**
     * Sobrenome do Devedor
     * @var string 
     */
    private $sobrenome;

    /**
     * Telefone do Devedor
     * @var string 
     */
    private $telefone;

    /**
     * Celular do Devedor
     * @var string
     */
    private $celular;

    /**
     * CPF ou CNPJ do Devedor
     * @var string
     */
    private $documento;

    /**
     * Data de Nascimento do Devedor
     * @var string
     */
    private $nascimento;

    public function __construct() {
        
    }

    /**
     * Método responsável em cadastrar um novo devedor
     * return boolean
     */
    public function cadastrar() {
        //INSERIR NO BANCO
        $database = new Database('devedores');
        $this->id = $database->insert([
            'nome' => $this->nome,
            'sobrenome' => $this->sobrenome,
            'telefone' => $this->telefone,
            'celular' => $this->celular,
            'documento' => $this->documento,
            'nascimento' => $this->nascimento,
        ]);

        return true;
    }

    /**
     * Método responsável por atualizar os dados de um Devedor
     * @return boolean
     */
    public function atualizar() {
        return (new Database('devedores'))->update('id = ' . $this->id, [
                    'nome' => $this->nome,
                    'sobrenome' => $this->sobrenome,
                    'telefone' => $this->telefone,
                    'celular' => $this->celular,
                    'documento' => $this->documento,
                    'nascimento' => $this->nascimento,
        ]);
    }

    /**
     * Método responsável por excluir um devedor do Banco de Dados
     * @return boolean
     */
    public function excluir() {
        return (new Database('devedores'))->delete('id=' . $this->id);
    }

    /**
     * Método responsável por retornar os Devedores do Banco de Dados
     * @param string $where
     * @param string $order
     * @param string $limit
     * @return array
     */
    public static function getDevedores($where = null, $order = null, $limit = null) {
        return (new Database('devedores'))->select($where, $order, $limit)
                        ->fetchAll(PDO::FETCH_CLASS, self::class);
    }

    /**
     * Método responsável por consultar um devedor específico pelo seu identificador
     * @param integer $id Identificador do Devedor
     * $return Devedor
     */
    public static function getDevedor($id) {
        return (new Database('devedores'))->select('id = ' . $id)
                        ->fetchObject(self::class);
    }

    /*
     * Getters e Setters
     */

    public function getId(): int {
        return $this->id;
    }

    public function getNome(): string {
        return $this->nome;
    }

    public function getSobrenome(): string {
        return $this->sobrenome;
    }

    public function getTelefone(): string {
        return $this->telefone;
    }

    public function getCelular(): string {
        return $this->celular;
    }

    public function getDocumento(): string {
        return $this->documento;
    }

    public function getNascimento(): string {
        return $this->nascimento;
    }

    public function setId(int $id): void {
        $this->id = $id;
    }

    public function setNome(string $nome): void {
        $this->nome = $nome;
    }

    public function setSobrenome(string $sobrenome): void {
        $this->sobrenome = $sobrenome;
    }

    public function setTelefone(string $telefone): void {
        $this->telefone = $telefone;
    }

    public function setCelular(string $celular): void {
        $this->celular = $celular;
    }

    public function setDocumento(string $documento): void {
        $this->documento = $documento;
    }

    public function setNascimento(string $nascimento): void {
        $this->nascimento = $nascimento;
    }

}
