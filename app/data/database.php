<?php
  declare(strict_types=1);

  namespace data;

  use PDO;

  class database
  {
    private ?PDO $conn;
    private string $host;
    private string $name;
    private string $user;
    private string $password;

    public function __construct(string $host, string $name, string $user, string $password)
    {
      $this->host = $host;
      $this->name = $name;
      $this->user = $user;
      $this->password = $password;
    }

    public function getConn(): ?PDO
    {
      if (isset($this->conn)) {
        return $this->conn;
      }
      $dns = "mysql:host={$this->host};dbname={$this->name}";
      $this->conn = new PDO($dns, $this->user, $this->password);
      // Set exception on error
      $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      return $this->conn;
    }
  }