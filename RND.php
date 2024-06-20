<?php

abstract class RnDEmployee {
    protected string $name;
    protected string $position;
    protected float $salary;
    protected string $sittingLocation;
    protected array $workDays;
    protected DateTime $employmentStartDate;
    protected ?DateTime $employmentEndDate = null;

    public function __construct(
        string $name,
        string $position,
        float $salary,
        string $sittingLocation,
        array $workDays,
        DateTime $employmentStartDate
    ) {
        $this->name = $name;
        $this->position = $position;
        $this->salary = $salary;
        $this->sittingLocation = $sittingLocation;
        $this->workDays = $workDays;
        $this->employmentStartDate = $employmentStartDate;
    }

    // Getters
    public function getName(): string {
        return $this->name;
    }

    public function getPosition(): string {
        return $this->position;
    }

    public function getSalary(): float {
        return $this->salary;
    }

    public function getSittingLocation(): string {
        return $this->sittingLocation;
    }

    public function getWorkDays(): array {
        return $this->workDays;
    }

    public function getEmploymentStartDate(): DateTime {
        return $this->employmentStartDate;
    }

    public function getEmploymentEndDate(): ?DateTime {
        return $this->employmentEndDate;
    }

    // Setters
    public function setName(string $name) {
        $this->name = $name;
    }

    public function setPosition(string $position) {
        $this->position = $position;
    }

    public function setSalary(float $salary) {
        $this->salary = $salary;
    }

    public function setSittingLocation(string $sittingLocation) {
        $this->sittingLocation = $sittingLocation;
    }

    public function setWorkDays(array $workDays) {
        $this->workDays = $workDays;
    }

    public function setEmploymentStartDate(DateTime $employmentStartDate) {
        $this->employmentStartDate = $employmentStartDate;
    }

    public function setEmploymentEndDate(?DateTime $employmentEndDate) {
        $this->employmentEndDate = $employmentEndDate;
    }

    // Methods to hire and fire an employee
    public function hireEmployee(DateTime $employmentStartDate) {
        $this->employmentStartDate = $employmentStartDate;
        $this->employmentEndDate = null;
    }

    public function fireEmployee(DateTime $employmentEndDate) {
        $this->employmentEndDate = $employmentEndDate;
    }
}

class Developer extends RnDEmployee {
    // Additional properties or methods specific to Developer can be added here
}

class Tester extends RnDEmployee {
    // Additional properties or methods specific to Tester can be added here
}

class SystemAdmin extends RnDEmployee {
    // Additional properties or methods specific to System Admin can be added here
}

// Example usage:
$dev = new Developer("John Doe", "Senior Developer", 90000.00, "Building A", ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday"], new DateTime("2024-01-01"));
$dev->hireEmployee(new DateTime("2024-01-01"));
echo "Employee " . $dev->getName() . " hired on " . $dev->getEmploymentStartDate()->format('Y-m-d') . "<br>";
$dev->fireEmployee(new DateTime("2024-06-01"));
echo "Employee " . $dev->getName() . " fired on " . $dev->getEmploymentEndDate()->format('Y-m-d') . "<br>";

?>