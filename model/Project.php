<?php
require_once __DIR__ . '/Model.php';
class Project extends Model
{

    public $id;
    public $user_id;
    public $name;
    public $description;
    public $color;
    public $created_at;
    public $updated_at;

    function __construct($id = null, $user_id = null,  $name = null, $description = null, $color = "#000000", $created_at = null, $updated_at = null)
    {
        $this->id = $id;
        $this->user_id = $user_id;
        $this->name = $name;
        $this->description = $description;
        $this->color = $color;
        $this->created_at = $created_at == null ? time() : $created_at;
        $this->updated_at = $updated_at == null ? time() : $updated_at;
    }

    static function getAll($user_id)
    {
        self::initDb();
        if (!$result = self::$db->query("SELECT * FROM projects WHERE `user_id`='$user_id'")) {
            echo ("Error description: " . self::$db->error);
            exit;
        }

        $projects = [];
        while ($row = $result->fetch_assoc()) {
            array_push($projects, new Project(
                $row['id'],
                $row['user_id'],
                $row['name'],
                $row["description"],
                $row["color"],
                strtotime($row['created_at']),
                strtotime($row['updated_at']),
            ));
        }
        self::closeDb();

        return $projects;
    }

    static function getById($user_id, $id)
    {
        self::initDb();
        if (!$result = self::$db->query("SELECT * FROM projects WHERE `user_id`='$user_id' AND `id`='$id' LIMIT 1")) {
            echo ("Error description: " . self::$db->error);
            exit;
        }
        if ($result->num_rows < 1)
            return null;
        $row = $result->fetch_assoc();
        $project = new Project(
            $row['id'],
            $row['user_id'],
            $row['name'],
            $row["description"],
            $row["color"],
            strtotime($row['created_at']),
            strtotime($row['updated_at']),
        );
        self::closeDb();

        return $project;
    }

    function save()
    {
        self::initDb();
        if ($this->id === null) {
            $stmt = self::$db->prepare("INSERT INTO projects (`user_id`, `name`, `created_at`, `updated_at`) VALUES (?, ?, ?, ?)");
            if ($stmt === false) {
                echo ("Error description: " . self::$db->error);
                exit;
            }
            $createdAt = self::timeToSqlDatetime($this->created_at);
            $updatedAt = self::timeToSqlDatetime($this->updated_at);
            $stmt->bind_param(
                "isss",
                $this->user_id,
                $this->name,
                $createdAt,
                $updatedAt
            );
            $result = $stmt->execute();
            if ($result === false) {
                echo ("Error description: " . $stmt->error);
                exit;
            }
        } else {
            $stmt = self::$db->prepare("UPDATE projects SET `name`=?, `description`=?, `color`=?, `created_at`=?, `updated_at`=? WHERE `id`=?");
            if ($stmt === false) {
                echo ("Error description: " . self::$db->error);
                exit;
            }
            $createdAt = self::timeToSqlDatetime($this->created_at);
            $updatedAt = self::timeToSqlDatetime($this->updated_at);
            $stmt->bind_param(
                "sssssi",
                $this->name,
                $this->description,
                $this->color,
                $createdAt,
                $updatedAt,
                $this->id,
            );
            $result = $stmt->execute();
            if ($result === false) {
                echo ("Error description: " . $stmt->error);
                exit;
            }
        }
        self::closeDb();
    }
}
