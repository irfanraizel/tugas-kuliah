<?php

class FuzzyLogic {
    private $temperature;
    private $humidity;

    public function __construct($temperature, $humidity) {
        $this->temperature = $temperature;
        $this->humidity = $humidity;
    }

    // Membership functions for temperature
    private function temperatureLow() {
        if ($this->temperature <= 15) {
            return 1;
        } elseif ($this->temperature > 15 && $this->temperature < 25) {
            return (25 - $this->temperature) / 10;
        } else {
            return 0;
        }
    }

    private function temperatureMedium() {
        if ($this->temperature > 15 && $this->temperature < 25) {
            return ($this->temperature - 15) / 10;
        } elseif ($this->temperature >= 25 && $this->temperature <= 35) {
            return 1;
        } elseif ($this->temperature > 35 && $this->temperature < 45) {
            return (45 - $this->temperature) / 10;
        } else {
            return 0;
        }
    }

    private function temperatureHigh() {
        if ($this->temperature >= 35) {
            return 1;
        } elseif ($this->temperature > 25 && $this->temperature < 35) {
            return ($this->temperature - 25) / 10;
        } else {
            return 0;
        }
    }

    // Membership functions for humidity
    private function humidityLow() {
        if ($this->humidity <= 30) {
            return 1;
        } elseif ($this->humidity > 30 && $this->humidity < 50) {
            return (50 - $this->humidity) / 20;
        } else {
            return 0;
        }
    }

    private function humidityHigh() {
        if ($this->humidity >= 50) {
            return 1;
        } elseif ($this->humidity > 30 && $this->humidity < 50) {
            return ($this->humidity - 30) / 20;
        } else {
            return 0;
        }
    }

    // Fuzzy rules and inference
    private function inferFanSpeed() {
        $lowTemp = $this->temperatureLow();
        $medTemp = $this->temperatureMedium();
        $highTemp = $this->temperatureHigh();

        $lowHum = $this->humidityLow();
        $highHum = $this->humidityHigh();

        $fanSpeedLow = min($lowTemp, $lowHum);
        $fanSpeedMed = min($medTemp, $highHum);
        $fanSpeedHigh = min($highTemp, $highHum);

        return max($fanSpeedLow, $fanSpeedMed, $fanSpeedHigh);
    }

    // Defuzzification (simple method)
    public function getFanSpeed() {
        $fuzzyOutput = $this->inferFanSpeed();

        // A simple defuzzification method
        if ($fuzzyOutput < 0.5) {
            return "Low";
        } elseif ($fuzzyOutput < 0.75) {
            return "Medium";
        } else {
            return "High";
        }
    }
}

// Example usage
$temperature = 28; // Input temperature
$humidity = 45; // Input humidity

$fuzzy = new FuzzyLogic($temperature, $humidity);
echo "Fan Speed: " . $fuzzy->getFanSpeed();

?>
