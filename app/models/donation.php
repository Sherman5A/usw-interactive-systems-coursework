<?php
  declare(strict_types=1);

  namespace model;

  class donation
  {
    public ?int $donationId;
    public string $donationType;
    public string $donationName;
    public string $donationEmail;
    public float $donationAmount;
    public string $donationMessage;
    public string $commPreference;
    public bool $showBillboard;

    public function __construct(?int  $donationId, string $donationType, string $donationName, string $donationEmail,
                                float $donationAmount, string $donationMessage, string $commPreference, $showBillboard)
    {
      $this->donationId = $donationId;
      $this->donationType = $donationType;
      $this->donationName = $donationName;
      $this->donationEmail = $donationEmail;
      $this->donationAmount = $donationAmount;
      $this->donationMessage = $donationMessage;
      $this->commPreference = $commPreference;
      $this->showBillboard = $showBillboard;
    }
  }
