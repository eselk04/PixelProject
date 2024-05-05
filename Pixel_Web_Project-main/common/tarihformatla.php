<?php
 function tarihFormatla($istenilen_tarih) {
    $tarih_nesnesi = new DateTime($istenilen_tarih);
    $aylar = array(
        "01" => "Ocak",
        "02" => "Şubat",
        "03" => "Mart",
        "04" => "Nisan",
        "05" => "Mayıs",
        "06" => "Haziran",
        "07" => "Temmuz",
        "08" => "Ağustos",
        "09" => "Eylül",
        "10" => "Ekim",
        "11" => "Kasım",
        "12" => "Aralık"
    );
    $turkce_ay = $aylar[$tarih_nesnesi->format('m')];
    $formatli_tarih = $tarih_nesnesi->format('d') . ' ' . $turkce_ay . ' ' . $tarih_nesnesi->format('Y') . ' ' . $tarih_nesnesi->format('H:i');
    return $formatli_tarih;
}


?>