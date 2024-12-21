<?php

  namespace model;

  class donation
  {
    public int $donationId;
    public string $donationType;
    public string $donationName;
    public string $donationEmail;
    public float $donationAmount;
    public string $donationMessage;

    public function __construct($donationId, $donationType, $donationName, $donationEmail, $donationAmount, $donationMessage)
    {
      $this->donationId = $donationId;
      $this->donationType = $donationType;
      $this->donationName = $donationName;
      $this->donationEmail = $donationEmail;
      $this->donationAmount = $donationAmount;
      $this->donationMessage = $donationMessage;
    }
  }
