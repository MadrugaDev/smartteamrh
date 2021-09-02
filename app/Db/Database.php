<?php

namespace App\Db;

use PDO;
use PDOException;

/**
 * Description of Database
 *
 * @author Lucas
 */
class Database {

    /**
     * Host de Conexão com Banco de Dados
     * @var string;
     */
    const HOST = 'localhost';

    /*
     * Nome do Banco de Dados
     * @var string
     */
    const NAME = 'smartteamrh';

    /**
     * Usuário do Banco de Dados
     * @var string
     */
    const USER = 'root';

    /**
     * Senha do Banco de Dados
     * @var string
     */
    const PASS = '';

    /**
     * Nome da Tabela a ser manipulada
     * @var string 
     */
    private $table;

    /**
     * Instância de Conexão com o Banco de Dados
     * @var PDO
     */
    private $connection;

    /**
     * Define a Tabela e instância a conexão com o Banco de Dados
     * @param type string
     */
    public function __construct($table = null) {
        $this->table = $table;
        $this->setConnection();
    }

    /**
     * Realiza a conexão com o Banco de Dados
     */
    private function setConnection() {
        try {
            $dsn = 'mysql:host=' . self::HOST . ';dbname=' . self::NAME;
            $options = [PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8'];
            $this->connection = new PDO($dsn, self::USER, self::PASS, $options);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die('ERROR: ' . $e->getMessage());
        }
    }

    /**
     * Método responsável por executar as queries no banco de dados
     * @param string $query
     * @param array $params
     * @return PDOStatement;
     */
    public function execute($query, $params = []) {
        try {
            $statement = $this->connection->prepare($query);
            $statement->execute($params);
            return $statement;
        } catch (PDOException $e) {
            die('ERROR: ' . $e->getMessage());
        }
    }

    /**
     * Método responsável por inserir dados no banco
     * @param array $values [field => value]
     * @return int ID inserido
     */
    public function insert($values) {
        //PARÂMETROS DA QUERY
        $fields = array_keys($values);
        $binds = array_pad([], count($fields), '?');

        //MONTAGEM DA QUERY
        $query = 'INSERT INTO ' . $this->table . ' (' . implode(',', $fields) . ') VALUES (' . implode(',', $binds) . ')';
       
        //EXECUTA O MÉTODO INSERT
        $this->execute($query, array_values($values));
       
        //RETORNA O ID INSERIDO
        return $this->connection->lastInsertId();
    }

    /**
     * Método responsável por realizar consulta no Banco de Dados
     * @param string $where Filtros
     * @param string $order Ordenação
     * @param string $limit Limitar quantidade de registros na consulta
     * @param string $fields Campos da tabela a serem retornados na consulta
     * @return PDOStatement;
     */
    public function select($where = null, $order = null, $limit = null, $fields = '*') {
        //PARÂMETROS DA QUERY
        $where = strlen($where) ? 'WHERE ' . $where : '';
        $order = strlen($order) ? 'ORDER BY ' . $order : '';
        $limit = strlen($limit) ? 'LIMIT ' . $limit : '';

        //MONTA A QUERY
        $query = 'SELECT ' . $fields . ' FROM ' . $this->table . ' ' . $where . ' ' . $order . ' ' . $limit . '';
        
        //EXECUTAR A QUERY
        return $this->execute($query);
    }

    /**
     * Método responsável por executar atualizações no Banco de Dados
     * @param string $where
     * @param array $values [ field => $value ]
     * @return boolean
     */
    public function update($where, $values) {
        //PARÂMETROS DA QUERY
        $fields = array_keys($values);

        //MONTA A QUERY
        $query = 'UPDATE ' . $this->table . ' SET ' . implode('=?,', $fields) . '=? WHERE ' . $where;

        //EXECUTAR A QUERY
        $this->execute($query, array_values($values));

        //RETORNA SUCESSO
        return true;
    }

    /**
     * Método responsável por executar exclusão no Banco de Dados
     * @param string $where
     * @retur boolean
     */
    public function delete($where) {
        //MONTA A QUERY
        $query = 'DELETE FROM ' . $this->table . ' WHERE ' . $where;

        //EXECUTA A QUERY
        $this->execute($query);

        //RETORNA SUCESSO
        return true;
    }

}
