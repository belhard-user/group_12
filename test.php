<?php

require_once "vendor/autoload.php";

class Names
{
    private $name;
    private $lname;

    public function __construct()
    {
        $this->name = '.!.';
        $this->lname = '.!.';
    }


    /**
     * @return mixed
     */
    public function getLname()
    {
        return $this->lname;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return strtoupper($this->name);
    }

    /**
     * @param mixed $name
     * @return Names
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @param mixed $lname
     */
    public function setLname($lname)
    {
        $this->lname = $lname;
    }
}

try {
    $db = new \PDO('mysql:dbname=start', 'root', '', [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
    // $db = new \PDO('sqlite:mysql.sqlite');
    // $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    /** @var Names[] $row */

    /*$result = $db->query("SELECT * FROM names");
    $row = $result->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Names');

    foreach ($row as $item){
        echo $item->getName() . '<br>';
    }*/

    /*$name = '1 UNION SELECT 1,2,lname FROM names WHERE name=\'NEO\'';

    $sql = "SELECT * FROM todo where id=:name";

    $r = $db->prepare($sql);
    $r->bindParam(':name', $name, PDO::PARAM_STR);
    dump($r->debugDumpParams());
    $r->execute();
    dump($r->fetchAll());*/

    /*$r = $db->prepare($sql);
    $r->bindParam('name', $name, PDO::PARAM_STR);
    // $r->bindParam('lname', $lname, PDO::PARAM_STR);
    $r->execute();
    dump($);*/

    $sqls = [
        "INSERT INTO names VALUES ('Neo', 'Neo')",
        "INSERT INTO names VALUES ('Neo2', 'Neo')",
        "INSERT INTO names VALUES ('Neo3', 'Neo')",
    ];



    try {
        $db->beginTransaction();
        foreach($sqls as $sql){
            $db->exec($sql);
        }
        $db->commit();
    }catch(PDOException $e){
        // $db->rollBack();
    }

}catch(PDOException $e){
    echo $e->getMessage() . '<br>';
    dump($db->errorInfo());
}