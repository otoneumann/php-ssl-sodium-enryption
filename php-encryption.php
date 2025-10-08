<?php

declare(strict_types=1);

use Defuse\Crypto\Crypto;
use Defuse\Crypto\Key;

require 'vendor/autoload.php';

// Load keys from config.ini
$config = parse_ini_file('config/config.ini', true);
$key_asci = $config['encryption']['defuse_key'];

$key = Key::loadFromAsciiSafeString($key_asci);

$plaintext = readline('Enter plaintext: ');

// Encrypt
$ciphertext = Crypto::encrypt($plaintext, $key);

echo "Original text: $plaintext\n";
echo "Encrypted text: $ciphertext\n";

// Decrypt
$decrypted = Crypto::decrypt($ciphertext, $key);

echo "Decrypted text: $decrypted\n";
