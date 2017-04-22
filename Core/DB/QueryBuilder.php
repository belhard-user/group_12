<?php
namespace Core\DB;

class QueryBuilder
{
    protected $tableName;

    /**
     * @var mysqli
     */
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function insert(array $data)
    {
        $fields = implode(', ', array_keys($data) );
        $values = '"'.implode('","', $data) . '"';

        $sql = sprintf(
            "INSERT INTO %s (%s) VALUES (%s)",
            $this->tableName,
            $fields,
            $values
        );

        $this->db->query($sql);
    }

    public function table($name)
    {
        $this->tableName = $name;

        return $this;
    }

    public function all()
    {
        $sql = "SELECT * FROM {$this->tableName}";
        
        return $this->db->query($sql)->fetchAll();
    }
}