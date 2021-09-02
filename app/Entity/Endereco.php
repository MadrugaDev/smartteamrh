<?php

namespace App\Entity;

use \App\Db\Database;
use PDO;

/**
 * Description of Devedor
 *
 * @author Lucas
 */
class Endereco {

    /**
     * Identificador do Endereco  do Devedor
     * @var int
     */
    private $id;

    /**
     * Cep do Devedor
     * @var string
     */
    private $cep;

    /**
     * Tipo de Endereço do Devedor [ casa, escritório, etc...]
     * @var string 
     */
    private $tipo;

    /**
     * Endereço do Devedor
     * @var string 
     */
    private $endereco;

    /**
     * Celular do Devedor
     * @var string
     */
    private $numero;

    /**
     * Cidade  do Devedor
     * @var string
     */
    private $cidade;

    /**
     * Estado do Devedor
     * @var string
     */
    private $estado;

    /**
     * Instância do Devedor
     * @var Devedor
     */
    private $devedor;

    public function __construct() {
        
    }

    /**
     * Método responsável em cadastrar um novo devedor
     * return boolean
     */
    public function cadastrar(Devedor $devedor) {
        //INSTÂNCIA DE DEVEDOR
        $this->devedor = $devedor;
        
        //INSERIR NO BANCO
        $database = new Database('enderecos');
        $this->id = $database->insert([
            'devedor_id' => $this->devedor->getId(),
            'cep' => $this->cep,
            'tipo' => $this->tipo,
            'endereco' => $this->endereco,
            'numero' => $this->numero,
            'cidade' => $this->cidade,
            'estado' => $this->estado,
        ]);

        return true;
    }

    /**
     * Método responsável por atualizar os dados de um Devedor
     * @return boolean
     */
    public function atualizar() {
        return (new Database('enderecos'))->update('id = ' . $this->id, [
                    'cep' => $this->cep,
                    'tipo' => $this->tipo,
                    'endereco' => $this->endereco,
                    'numero' => $this->numero,
                    'cidade' => $this->cidade,
                    'estado' => $this->estado,
        ]);
    }

    /**
     * Método responsável por excluir um devedor do Banco de Dados
     * @return boolean
     */
    public function excluir() {
        return (new Database('enderecos'))->delete('id=' . $this->id);
    }

    /**
     * Método responsável por retornar os Devedores do Banco de Dados
     * @param string $where
     * @param string $order
     * @param string $limit
     * @return array
     */
    public static function getEnderecos($where = null, $order = null, $limit = null) {
        return (new Database('enderecos'))->select($where, $order, $limit)
                        ->fetchAll(PDO::FETCH_CLASS, self::class);
    }

    /**
     * Método responsável por consultar um devedor específico pelo seu identificador
     * @param integer $id Identificador do Devedor
     * $return Devedor
     */
    public static function getEnd($id) {
        return (new Database('enderecos'))->select('id = ' . $id)
                        ->fetchObject(self::class);
    }

    /*
     * Getters e Setters
     */

    public function getId(): int {
        return $this->id;
    }

    public function getCep(): string {
        return $this->cep;
    }

    public function getTipo(): string {
        return $this->tipo;
    }

    public function getEndereco(): string {
        return $this->endereco;
    }

    public function getNumero(): string {
        return $this->numero;
    }

    public function getCidade(): string {
        return $this->cidade;
    }

    public function getEstado(): string {
        return $this->estado;
    }

    public function getDevedor(): Devedor {
        return $this->devedor;
    }

    public function setId(int $id): void {
        $this->id = $id;
    }

    public function setCep(string $cep): void {
        $this->cep = $cep;
    }

    public function setTipo(string $tipo): void {
        $this->tipo = $tipo;
    }

    public function setEndereco(string $endereco): void {
        $this->endereco = $endereco;
    }

    public function setNumero(string $numero): void {
        $this->numero = $numero;
    }

    public function setCidade(string $cidade): void {
        $this->cidade = $cidade;
    }

    public function setEstado(string $estado): void {
        $this->estado = $estado;
    }

    public function setDevedor(Devedor $devedor): void {
        $this->devedor = $devedor;
    }

}
