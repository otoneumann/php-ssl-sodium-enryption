<?php

declare(strict_types=1);

$config = parse_ini_file('config/config.ini', true);
$key = $config['encryption']['openssl_key'];

$cipher_algo = 'AES-256-CBC';
$initVectorLength = openssl_cipher_iv_length($cipher_algo);
$initVector = openssl_random_pseudo_bytes($initVectorLength);
$options = 0;

$plaintext = readline('Enter plaintext: ');

$ciphertext = openssl_encrypt($plaintext, $cipher_algo, $key, $options, $initVector);

echo "Original text: $plaintext\n";
echo "Encrypted text: $ciphertext\n";

$decryptedtext = openssl_decrypt($ciphertext, $cipher_algo, $key, $options, $initVector);

echo "Decrypted text: $decryptedtext\n";
