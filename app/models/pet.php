<?php
  declare(strict_types=1);

  namespace model;

  class pet
  {
    public int $pet_id;
    public string $pet_type;
    public string $pet_name;
    public string $pet_description;
    public int $previous_owners;
    public float $pet_weight;
    public string $pet_colour;
    public string $image_path;

    /**
     * @param int $pet_id
     * @param string $pet_type
     * @param string $pet_name
     * @param string $pet_description
     * @param int $previous_owners
     * @param float $pet_weight
     * @param string $pet_colour
     * @param string $image_path
     */
    public function __construct(int    $pet_id, string $pet_type, string $pet_name, string $pet_description,
                                int    $previous_owners, float $pet_weight, string $pet_colour,
                                string $image_path)
    {
      $this->pet_id = $pet_id;
      $this->pet_type = $pet_type;
      $this->pet_name = $pet_name;
      $this->pet_description = $pet_description;
      $this->previous_owners = $previous_owners;
      $this->pet_weight = $pet_weight;
      $this->pet_colour = $pet_colour;
      $this->image_path = $image_path;
    }
  }