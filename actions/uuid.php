<?php
// function generateUUID() {
//     return sprintf('%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
//         // 32 bits for "time_low"
//         mt_rand(0, 0xffff), mt_rand(0, 0xffff),
//         // 16 bits for "time_mid"
//         mt_rand(0, 0xffff),
//         // 12 bits before the 0100 of (version) 4 for "time_hi_and_version"
//         mt_rand(0, 0x0fff) | 0x4000,
//         // 8 bits, the last two of which (positions 6 and 7) are 01, for "clk_seq_hi_res"
//         mt_rand(0, 0x3fff) | 0x8000,
//         // 48 bits for "node"
//         mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0xffff)
//     );
// }

// // Exemplo de uso
// $uuid = generateUUID();
// echo $uuid;

function generateUUID() {
    $data = random_bytes(16);

    // Set version (4) and variant (2)
    $data[6] = chr(ord($data[6]) & 0x0f | 0x40); 
    $data[8] = chr(ord($data[8]) & 0x3f | 0x80); 

    // Format UUID
    return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
}

// Exemplo de uso
$uuid = generateUUID();
echo $uuid;

