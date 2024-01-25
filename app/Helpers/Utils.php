<?php
/**
 *Created by $(USER) on $(DATE).
 */

namespace App\Helpers;

class Utils
{
    public static function convertNumberToLetter($number)
    {
        // Validasi apakah input berupa angka
        if (!is_numeric($number)) {
            return "Input harus berupa angka.";
        }

        $letter = '';

        while ($number > 0) {
            $remainder = ($number - 1) % 26;
            $letter = chr(65 + $remainder) . $letter;
            $number = intdiv($number - $remainder, 26);
        }

        return $letter;
    }

    private static function penyebut($nilai)
    {
        $nilai = abs($nilai);
        $huruf = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
        $temp = "";
        if ($nilai < 12) {
            $temp = " " . $huruf[$nilai];
        } else if ($nilai < 20) {
            $temp = self::penyebut($nilai - 10) . " belas";
        } else if ($nilai < 100) {
            $temp = self::penyebut($nilai / 10) . " puluh" . self::penyebut($nilai % 10);
        } else if ($nilai < 200) {
            $temp = " seratus" . self::penyebut($nilai - 100);
        } else if ($nilai < 1000) {
            $temp = self::penyebut($nilai / 100) . " ratus" . self::penyebut($nilai % 100);
        } else if ($nilai < 2000) {
            $temp = " seribu" . self::penyebut($nilai - 1000);
        } else if ($nilai < 1000000) {
            $temp = self::penyebut($nilai / 1000) . " ribu" . self::penyebut($nilai % 1000);
        } else if ($nilai < 1000000000) {
            $temp = self::penyebut($nilai / 1000000) . " juta" . self::penyebut($nilai % 1000000);
        } else if ($nilai < 1000000000000) {
            $temp = self::penyebut($nilai / 1000000000) . " milyar" . self::penyebut(fmod($nilai, 1000000000));
        } else if ($nilai < 1000000000000000) {
            $temp = self::penyebut($nilai / 1000000000000) . " trilyun" . self::penyebut(fmod($nilai, 1000000000000));
        }
        return $temp;
    }

    public static function terbilang($nilai)
    {
        if ($nilai < 0) {
            $hasil = "minus " . trim(self::penyebut($nilai));
        } else {
            $hasil = trim(self::penyebut($nilai));
        }
        return $hasil;
    }

    public static function angkaKeTeks($angka)
    {
        $angkaTeks = array(
            1 => 'satu',
            2 => 'dua',
            3 => 'tiga',
            4 => 'empat',
            5 => 'lima',
            6 => 'enam',
            7 => 'tujuh',
            8 => 'delapan',
            9 => 'sembilan',
            10 => 'sepuluh',
            11 => 'sebelas',
            12 => 'dua belas',
            13 => 'tiga belas',
            14 => 'empat belas',
            15 => 'lima belas',
            16 => 'enam belas',
            17 => 'tujuh belas',
            18 => 'delapan belas',
            19 => 'sembilan belas',
            20 => 'dua puluh',
            30 => 'tiga puluh',
            40 => 'empat puluh',
            50 => 'lima puluh',
            60 => 'enam puluh',
            70 => 'tujuh puluh',
            80 => 'delapan puluh',
            90 => 'sembilan puluh',
            100 => 'seratus',
            1000 => 'seribu',
            1000000 => 'satu juta',
            1000000000 => 'satu miliar',
            1000000000000 => 'satu triliun'
        );
        if ($angka < 100) {
            if ($angka <= 20) {
                return $angkaTeks[$angka];
            }

            $puluh = (int)($angka / 10) * 10;
            $satuan = $angka % 10;
            return $angkaTeks[$puluh] . ' ' . $angkaTeks[$satuan];
        }

        // Basis kasus untuk angka 100-999
        if ($angka < 1000) {
            $ratus = (int)($angka / 100);
            $sisa = $angka % 100;
            return $angkaTeks[$ratus] . ' ratus ' . self::angkaKeTeks($sisa);
        }

        // Basis kasus untuk angka 1000-999999
        if ($angka < 1000000) {
            $ribu = (int)($angka / 1000);
            $sisa = $angka % 1000;
            return self::angkaKeTeks($ribu) . ' ribu ' . self::angkaKeTeks($sisa);
        }

        // Basis kasus untuk angka 1000000-999999999
        if ($angka < 1000000000) {
            $juta = (int)($angka / 1000000);
            $sisa = $angka % 1000000;
            return self::angkaKeTeks($juta) . ' juta ' . self::angkaKeTeks($sisa);
        }

        // Basis kasus untuk angka 1000000000-999999999999
        if ($angka < 1000000000000) {
            $miliar = (int)($angka / 1000000000);
            $sisa = $angka % 1000000000;
            return self::angkaKeTeks($miliar) . ' miliar ' . self::angkaKeTeks($sisa);
        }

        // Basis kasus untuk angka 1000000000000-999999999999999
        if ($angka < 1000000000000000) {
            $triliun = (int)($angka / 1000000000000);
            $sisa = $angka % 1000000000000;
            return self::angkaKeTeks($triliun) . ' triliun ' . self::angkaKeTeks($sisa);
        }

        return 'Angka terlalu besar';
    }

    public static function convertToRoman($number)
    {
        $romans = array(
            'M' => 1000,
            'CM' => 900,
            'D' => 500,
            'CD' => 400,
            'C' => 100,
            'XC' => 90,
            'L' => 50,
            'XL' => 40,
            'X' => 10,
            'IX' => 9,
            'V' => 5,
            'IV' => 4,
            'I' => 1
        );

        $roman = '';

        foreach ($romans as $romanSymbol => $romanValue) {
            $matches = (int)($number / $romanValue);
            $roman .= str_repeat($romanSymbol, $matches);
            $number %= $romanValue;
        }

        return $roman;
    }

}
