<?php
require_once __DIR__ . "/Model.php";
class User extends Model
{
    public $id;
    public $username;
    public $name;
    public $password;
    public $created_at;
    public $updated_at;

    function __construct($id = null, $username = null, $name = null, $password = null, $created_at = null, $updated_at = null)
    {
        $this->id = $id;
        $this->username = $username;
        $this->name = $name;
        $this->password = $password;
        $this->created_at = $created_at == null ? time() : $created_at;
        $this->updated_at = $updated_at == null ? time() : $updated_at;
    }

    static function findByUsername($username)
    {
        self::initDb();
        $stmt = self::$db->prepare("SELECT * FROM users WHERE `username`=? LIMIT 1");
        if ($stmt === false) {
            echo ("Error description: " . self::$db->error);
            exit;
        }
        $stmt->bind_param(
            "s",
            $username
        );
        $result = $stmt->execute();
        if ($result === false) {
            echo ("Error description: " . $stmt->error);
            exit;
        }
        $data = $stmt->get_result();
        if ($data->num_rows < 1) {
            self::closeDb();
            return null;
        } else {
            $row = $data->fetch_assoc();
            $user = new User($row['id'], $row['username'], $row['name'], $row['password'], $row['created_at'], $row['updated_at']);
            self::closeDb();
            return $user;
        }
    }

    function save()
    {
        self::initDb();
        $hashOpt = [
            'cost' => 10
        ];
        $hashedPwd = password_hash($this->password, PASSWORD_BCRYPT, $hashOpt);
        if ($this->id == null) {
            $stmt = self::$db->prepare("INSERT INTO users (`username`, `name`, `password`, `created_at`, `updated_at`) VALUES (?, ?, ?, ?, ?)");
            if ($stmt === false) {
                echo ("Error description: " . self::$db->error);
                exit;
            }
            $createdAt = self::timeToSqlDatetime($this->created_at);
            $updatedAt = self::timeToSqlDatetime($this->updated_at);
            $stmt->bind_param(
                "sssss",
                $this->username,
                $this->name,
                $hashedPwd,
                $createdAt,
                $updatedAt
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
