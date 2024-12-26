<?php
  declare(strict_types=1);

  namespace data;

  use model\pet;

  require_once __DIR__ . "/database.php";
  require_once __DIR__ . "/../models/pet.php";

  class pet_repo
  {
    public database $database;

    /**
     * @param database $database
     */
    public function __construct(database $database)
    {
      $this->database = $database;
    }

    /**
     * @return array<pet>
     */
    public function get_pets(): array
    {
      $pet_types = $this->get_pet_types();
      $conn = $this->database->getConn();
      $result = $conn->query("
        SELECT pet_id,
               pet_type_id,
               pet_name,
               pet_description,
               previous_owners,
               pet_weight,
               pet_colour,
               image_path
        FROM public.pet
        LIMIT 20;"
      );
      $rows = $result->fetch_all(MYSQLI_ASSOC);
      /** @var array<pet> $pets */
      $pets = array();
      foreach ($rows as $row) {
        $new_pet = new pet(
          intval($row["pet_id"]),
          $pet_types[intval($row["pet_type_id"])],
          $row["pet_name"],
          $row["pet_description"],
          intval($row["previous_owners"]),
          floatval($row["pet_weight"]),
          $row["pet_colour"],
          $row["image_path"]
        );
        $pets[] = $new_pet;
      }
      return $pets;
    }

    /**
     * @return array
     */
    private function get_pet_types(): array
    {
      $conn = $this->database->getConn();
      $result = $conn->query("
        SELECT pet_type_id,
               pet_type
        FROM public.pet_type"
      );
      $rows = $result->fetch_all(MYSQLI_ASSOC);
      /** @var array<int, string> $pet_types */
      $pet_types = array();
      foreach ($rows as $row) {
        $pet_types[$row["pet_type_id"]] = $row["pet_type"];
      }
      return $pet_types;
    }
  }