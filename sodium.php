<?php

declare(strict_types=1);

// Load key from config.ini
$config = parse_ini_file('config/config.ini', true);
$key = $config['encryption']['sodium_key'];

// Generate a random nonce
$nonce = random_bytes(SODIUM_CRYPTO_SECRETBOX_NONCEBYTES);

$plaintext = readline('Enter plaintext: ');

// Encrypt
$ciphertext = sodium_crypto_secretbox($plaintext, $nonce, $key);

echo "Original text: $plaintext\n";
echo "Encrypted text (base64): " . base64_encode($ciphertext) . "\n";
echo "Encrypted text (hex): " . bin2hex($ciphertext) . "\n";

// Decrypt
$decrypted = sodium_crypto_secretbox_open($ciphertext, $nonce, $key);

echo "Decrypted text: $decrypted\n";
