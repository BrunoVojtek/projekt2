<?php

// Definuje namespace 
namespace App\Core;

// Importuje PDO 
use PDO;

// Importuje PDOException pre zachytavanie chyb
use PDOException;

// Vytvorenie triedy Database
class Database
{
    // Nastavenie hosta
    private string $host = "localhost";

    // Nazov databázy
    private string $dbname = "db_users";

    // Pouzivatelske meno pre databazu
    private string $user = "root";

    // Heslo pre databazu
    private string $password = "";

    // Znakova sada pre databazu
    private string $charset = "utf8mb4";

    // Premenna pre ulozenie PDO pripojenia 
    private ?PDO $conn = null;

    // Verejna funkcia na ziskanie pripojenia k databaze
    public function getConnection(): ?PDO
    {
        // Ak uz pripojenie existuje vráti ho
        if ($this->conn !== null) {
            return $this->conn;
        }

        // Vytvorenie pripojenia
        $dsn = "mysql:host={$this->host};dbname={$this->dbname};charset={$this->charset}";

        try {
            // Pokus o vytvorenie nového PDO pripojenia
            $this->conn = new PDO($dsn, $this->user, $this->password);

            // Ked nastane chyba vyhodi ju
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Nastavenie prevzatia dat z db
            $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            // Zachytenie chyby
            die("Connection error: " . $e->getMessage());
        }

        // Vrati pripojenie
        return $this->conn;
    }
}