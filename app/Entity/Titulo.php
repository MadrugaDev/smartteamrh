<?php

namespace App\Entity;

use \App\Db\Database;
use PDO;

/**
 * Description of Devedor
 *
 * @author Lucas
 */
class Titulo {

    /**
     * Identificador do Título
     * @var int
     */
    private $id;

    /**
     * Descrição do Título
     * @var string
     */
    private $descricao;

    /**
     * Valor do Título
     * @var float 
     */
    private $valor;

    /**
     * Vencimento do Título
     * @var string 
     */
    private $vencimento;

    /**
     * Situação do Título [0 Não Paga, 1 - Paga
     * @var string
     */
    private $status;

    /**
     * Instância do Devedor
     * @var Devedor
     */
    private $devedor;

    public function __construct() {
        
    }

    /**
     * Método responsável em cadastrar um novo título
     * return boolean
     */
    public function cadastrar(Devedor $devedor) {
        //INSTÂNCIA DE DEVEDOR
        $this->devedor = $devedor;

        //INSERIR NO BANCO
        $database = new Database('titulos');
        $this->id = $database->insert([
            'devedor_id' => $this->devedor->getId(),
            'descricao' => $this->descricao,
            'valor' => $this->valor,
            'vencimento' => $this->vencimento,
            'status' => $this->status,
            'updated_at' => date('Y-m-d h:i:s'),
        ]);

        return true;
    }

    /**
     * Método responsável por atualizar os dados de um Devedor
     * @return boolean
     */
    public function atualizar() {
        return (new Database('titulos'))->update('id = ' . $this->id, [
                    'descricao' => $this->descricao,
                    'valor' => $this->valor,
                    'vencimento' => $this->vencimento,
                    'status' => $this->status,
                    'updated_at' => date('Y-m-d h:i:s'),
        ]);
    }

    /**
     * Método responsável por excluir um devedor do Banco de Dados
     * @return boolean
     */
    public function excluir() {
        return (new Database('titulos'))->delete('id=' . $this->id);
    }

    /**
     * Método responsável por retornar os Devedores do Banco de Dados
     * @param string $where
     * @param string $order
     * @param string $limit
     * @return array
     */
    public static function getTitulos($where = null, $order = null, $limit = null) {
        return (new Database('titulos'))->select($where, $order, $limit)
                        ->fetchAll(PDO::FETCH_CLASS, self::class);
    }

    /**
     * Método responsável por consultar um devedor específico pelo seu identificador
     * @param integer $id Identificador do Devedor
     * $return Devedor
     */
    public static function getTitulo($id) {
        return (new Database('titulos'))->select('id = ' . $id)
                        ->fetchObject(self::class);
    }

    /*
     * Getters e Setters
     */

    public function getId(): int {
        return $this->id;
    }

    public function getDescricao(): string {
        return $this->descricao;
    }

    public function getValor(): float {
        return $this->valor;
    }

    public function getVencimento(): string {
        return $this->vencimento;
    }

    public function getStatus(): string {
        return $this->status;
    }

    public function getDevedor(): Devedor {
        return $this->devedor;
    }

    public function setId(int $id): void {
        $this->id = $id;
    }

    public function setDescricao(string $descricao): void {
        $this->descricao = $descricao;
    }

    public function setValor(float $valor): void {
        $this->valor = $valor;
    }

    public function setVencimento(string $vencimento): void {
        $this->vencimento = $vencimento;
    }

    public function setStatus(string $status): void {
        $this->status = $status;
    }

    public function setDevedor(Devedor $devedor): void {
        $this->devedor = $devedor;
    }

}
