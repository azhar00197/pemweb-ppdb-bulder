<?php
require_once __DIR__ . '/Model.php';
class Project extends Model
{

    public $id;
    public $name;
    public $created_at;
    public $updated_at;

    function __construct($id = null, $name = null, $created_at = null, $updated_at = null)
    {
        $this->id = $id;
        $this->name = $name;
        $this->created_at = $created_at == null ? time() : $created_at;
        $this->updated_at = $updated_at == null ? time() : $updated_at;
    }

    static function getAll()
    {
        self::initDb();
        if (!$result = self::$db->query("SELECT * FROM projects")) {
            echo ("Error description: " . self::$db->error);
            exit;
        }

        $projects = [];
        while ($row = $result->fetch_assoc()) {
            array_push($projects, new Project(
                $row['id'],
                $row['name'],
                strtotime($row['created_at']),
                strtotime($row['updated_at']),
            ));
        }
        self::closeDb();

        return $projects;
    }
}
