<?php
$locations = [
    'jkt' => 'Jakarta',
    'bdg' => 'Bandung',
    'yk' => 'Yogyakarta',
    'bali' => 'Bali',
    'sby' => 'Surabaya',
    'mdn' => 'Medan',
    'smrg' => 'Semarang',
    'mksr' => 'Makassar',
    'bp' => 'Balikpapan',
    'bl' => 'Bandar Lampung',
    'plmbg' => 'Palembang',
    'ponti' => 'Pontianak',
    'bjms' => 'Banjarmasin',
    'mnd' => 'Manado',
    'amb' => 'Ambon',
    'kpg' => 'Kupang',
    'mtrm' => 'Mataram',
    'lb' => 'Labuan Bajo',
    'srg' => 'Sorong',
    'jp' => 'Jayapura',
    'btm' => 'Batam',
    'pkbr' => 'Pekanbaru',
    'pdg' => 'Padang',
    'tgr' => 'Tangerang',
    'bks' => 'Bekasi'
];

function get_location_name($code) {
    global $locations;
    return $locations[$code] ?? 'Unknown';
}
?>
