<?php
  declare(strict_types=1);

  namespace data;

  use mysqli;

  class database
  {
    private mysqli $conn;
    private string $host;
    private ?int $port;
    private string $databaseName;
    private string $user;
    private string $password;
    private ?string $sock;

    public function __construct(string $host, string $name, ?int $port, string $user, string $password, ?string $sock)
    {
      $this->host = $host;
      $this->databaseName = $name;
      $this->port = $port;
      $this->user = $user;
      $this->password = $password;
      $this->sock = $sock;
    }

    public function getConn(): mysqli
    {
      if (isset($this->conn)) {
        return $this->conn;
      }

      if (isset($this->port, $this->sock)) {
        $this->conn = new mysqli($this->host, $this->user, $this->password, $this->databaseName, $this->port, $this->sock);
      } else {
        $this->conn = new mysqli($this->host, $this->user, $this->password, $this->databaseName);
      }

      if ($this->conn->connect_error) {
        exit("Failed to connect to mysql database {$this->conn->connect_error}");
      }
      $this->conn->set_charset("utf8mb4");
      return $this->conn;
    }
  }
