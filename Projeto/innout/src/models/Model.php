<?php

// Classe de modelo generica
class Model {

    // table e columns iram representar a estrutura da model que estiver extendendo
    protected static $tableName = '';
    protected static $columns = [];
    protected $values = [];

    function __construct($arr, $sanitize = true) {
        $this->loadFromArray($arr, $sanitize);
    }

    public function loadFromArray($arr, $sanitize = true) {

        // Caso seja passado o $arr, ele é salvo  em values
        if($arr) {
            // $conn = Database::getConnection();
            foreach($arr as $key => $value) {
                $cleanValue = $value;
                if($sanitize && isset($cleanValue)) {
                    $cleanValue = strip_tags(trim($cleanValue));
                    $cleanValue = htmlentities($cleanValue, ENT_NOQUOTES);
                    // $cleanValue = mysqli_real_escape_string($conn, $cleanValue);
                }
                $this->$key = $cleanValue; // adicionando valor em values - __set - metodo magico
            }
            // $conn->close();
        }
    }

    // '__get, __set' metodos magicos - exemplo
    // Em vez de recuperar o atributo assim : $variavel->get('nome')
    // Recupera assim : $variavel->nome
    public function __get($key) {
        return $this->values[$key];
    }

    public function __set($key, $value) {
        $this->values[$key] = $value;
    }

    public function getValues() {
        return $this->values;
    }

    public static function getOne($filters = [], $columns = '*') {
        $class = get_called_class();
        $result = static::getResultSetFromSelect($filters, $columns);
        return $result ? new $class($result->fetch_assoc()) : null;
    }

    // Metodo get com filtro, e colunas desejadas
    public static function get($filters = [], $columns = '*') {
        $objects = [];
        $result = static::getResultSetFromSelect($filters, $columns);
        if($result) {
            $class = get_called_class(); // Identificando a classe filha que chamou esse metodo
            while($row = $result->fetch_assoc()) {
                array_push($objects, new $class($row)); // Gerando array de instancias da classe filha
            }
        }
        return $objects;
    }

    // Efetuando select e retornando result
    public static function getResultSetFromSelect($filters = [], $columns = '*') {
        $sql = "SELECT ${columns} FROM "
            . static::$tableName
            . static::getFilters($filters);
        $result = Database::getResultFromQuery($sql);
        if($result->num_rows === 0) {
            return null;
        } else {
            return $result;
        }
    }

    public function insert() {
        $sql = "INSERT INTO " . static::$tableName . " ("
            . implode(",", static::$columns) . ") VALUES ("; // implode - transforma array em uma string
        foreach(static::$columns as $col) { // $col - nome da coluna , 
            $sql .= static::getFormatedValue($this->$col) . ","; // $this->$col - acessa o valor da coluna
        }
        $sql[strlen($sql) - 1] = ')'; // substituindo a ultima virgula por parentes
        $id = Database::executeSQL($sql);
        $this->id = $id;
    }

    public function update() {
        $sql = "UPDATE " . static::$tableName . " SET ";
        foreach(static::$columns as $col) {
            $sql .= " ${col} = " . static::getFormatedValue($this->$col) . ",";
        }
        $sql[strlen($sql) - 1] = ' ';
        $sql .= "WHERE id = {$this->id}";
        Database::executeSQL($sql);
    }

    public static function getCount($filters = []) {
        $result = static::getResultSetFromSelect(
            $filters, 'count(*) as count');
        return $result->fetch_assoc()['count'];
    }

    public function delete() {
        static::deleteById($this->id);
    }

    public static function deleteById($id) {
        $sql = "DELETE FROM " . static::$tableName . " WHERE id = {$id}";
        Database::executeSQL($sql);
    }

    // Gerando filtro where de acordo com os parametros enviados
    private static function getFilters($filters) {
        $sql = '';
        if(count($filters) > 0) {
            $sql .= " WHERE 1 = 1";
            foreach($filters as $column => $value) {
                if($column == 'raw') {
                    $sql .= " AND {$value}";
                } else {
                    $sql .= " AND ${column} = " . static::getFormatedValue($value);
                }
            }
        } 
        return $sql;
    }

    // Formatando valor para script banco
    private static function getFormatedValue($value) {
        if(is_null($value)) {
            return "null";
        } elseif(gettype($value) === 'string') {
            return "'${value}'";
        } else {
            return $value;
        }
    }
}