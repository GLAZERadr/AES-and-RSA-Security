<?php

require_once 'application/security/encryption/AES128Encryption.php';
require_once 'application/security/encryption/RSAEncryption.php';

class HybridCryptosystem
{
    private $rsa;
    
    public function __construct($publicKey, $privateKey) {
        $publicKey = file_get_contents($publicKey);
        $privateKey = file_get_contents($privateKey);

        $this->rsa = new RSAEncryption($publicKey, $privateKey);
    }

    public function encryptData($data, $key) {
        $aes = new AES128Encryption($key);

        $encryptedData = $aes->encrypt($data);

        $encryptedPrivateKey = $this->rsa->encodePrivateKey($key);
        $encryptedPublicKey = $this->rsa->encodePublicKey($key);

        // echo 'encrypted key = '. $encryptedPrivateKey;

        return base64_encode(json_encode([
            'encryptedData' => $encryptedData,
            'encryptedKey' => $encryptedPrivateKey // gimana caranya buat ini kesimpen
        ]));
    }

    public function decryptData($cipher) {
        $decodedCipher = json_decode(base64_decode($cipher), true);

        // echo 'decoded cipher = '.$decodedCipher['encryptedKey'];

        $secretKey = $this->rsa->decodePrivateKey($decodedCipher['encryptedKey']);

        // echo 'secret key = '. $secretKey;

        $aes = new AES128Encryption($secretKey);
        $plainText = $aes->decrypt($decodedCipher['encryptedData']);

        return $plainText;
    }

    public function getSecretKey($cipher) {
        $decodedCipher = json_decode(base64_decode($cipher), true);

        $encryptedKey = $decodedCipher['encryptedKey'];

        return $encryptedKey;
    }

    public function getCipherText($cipher) {
        $decodedCipher = json_decode(base64_decode($cipher), true);

        $encryptedData = $decodedCipher['encryptedData'];

        return $encryptedData;
    }
}