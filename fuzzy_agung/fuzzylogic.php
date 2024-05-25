<?php

class FuzzyLogic
{
    private $warna;
    private $tekstur;

    public function __construct($warna, $tekstur)
    {
        $this->warna = $warna;
        $this->tekstur = $tekstur;
    }

    public function getMatang()
    {
        $warnaHijau = $this->warnaHijau($this->warna);
        $warnaKuning = $this->warnaKuning($this->warna);
        $warnaOren = $this->warnaOren($this->warna);
        $warnaCoklat = $this->warnaCoklat($this->warna);

        $teksturKeras = $this->teksturKeras($this->tekstur);
        $teksturSedang = $this->teksturSedang($this->tekstur);
        $teksturLembut = $this->teksturLembut($this->tekstur);

        // Define fuzzy rules
        $mentah = max(
            min($warnaHijau, $teksturKeras),
            min($warnaHijau, $teksturSedang),
            min($warnaKuning, $teksturKeras)
        );

        $setengahMatang = max(
            min($warnaHijau, $teksturLembut),
            min($warnaKuning, $teksturSedang),
            min($warnaOren, $teksturKeras),
        );

        $matang = max(
            min($warnaKuning, $teksturLembut),
            min($warnaOren, $teksturSedang),
            min($warnaOren, $teksturLembut)
        );

        $busuk = max(
            min($warnaCoklat, $teksturKeras),
            min($warnaCoklat, $teksturSedang),
            min($warnaCoklat, $teksturLembut)
        );

        // Defuzzify Sugeno
        $kematangan = (($mentah * 20) + ($setengahMatang * 60) + ($matang * 100) + ($busuk * 120)) / ($mentah + $setengahMatang + $matang + $busuk);
        return $kematangan;
    }

    // Fuzzyfication
    private function warnaHijau($warna)
    {
        if ($warna == 1) {
            return 1;
        } elseif ($warna > 1 && $warna < 4) {
            return (4 - $warna) / (4 - 1);
        } else {
            return 0;
        }
    }

    private function warnaKuning($warna)
    {
        if ($warna == 4) {
            return 1;
        } elseif ($warna > 1 && $warna < 4) {
            return ($warna - 1) / (4 - 1);
        } elseif ($warna > 4 && $warna < 7) {
            return (7 - $warna) / (7 - 4);
        } else {
            return 0;
        }
    }

    private function warnaOren($warna)
    {
        if ($warna == 7) {
            return 1;
        } elseif ($warna > 4 && $warna < 7) {
            return ($warna - 4) / (7 - 4);
        } elseif ($warna > 7 && $warna < 10) {
            return (10 - $warna) / (10 - 7);
        } else {
            return 0;
        }
    }

    private function warnaCoklat($warna)
    {
        if ($warna >= 10) {
            return 1;
        } elseif ($warna > 7 && $warna < 10) {
            return ($warna - 7) / (10 - 7);
        } else {
            return 0;
        }
    }

    private function teksturKeras($tekstur)
    {
        if ($tekstur == 1) {
            return 1;
        } elseif ($tekstur > 1 && $tekstur < 5) {
            return (5 - $tekstur) / (5 - 1);
        } else {
            return 0;
        }
    }

    private function teksturSedang($tekstur)
    {
        if ($tekstur == 5) {
            return 1;
        } elseif ($tekstur > 1 && $tekstur < 5) {
            return ($tekstur - 1) / (5 - 1);
        } elseif ($tekstur > 5 && $tekstur < 10) {
            return (10 - $tekstur) / (10 - 5);
        } else {
            return 0;
        }
    }

    private function teksturLembut($tekstur)
    {
        if ($tekstur >= 10) {
            return 1;
        } elseif ($tekstur > 5 && $tekstur < 10) {
            return ($tekstur - 5) / (10 - 5);
        } else {
            return 0;
        }
    }
}

// Contoh penggunaan
// $warna = 7;
// $tekstur = 10;

// $fuzzy = new FuzzyLogic($warna, $tekstur);
// $risiko = $fuzzy->getMatang();

// var_dump($risiko);
