<?php

function fetchAndDisplayRowsFromBiedaTable() {
    // Dane dostępowe do bazy danych
    $host = 'localhost'; // Host bazy danych
    $db   = 'bieda'; // Nazwa bazy danych
    $user = 'root'; // Nazwa użytkownika
    $pass = '1234w'; // Hasło użytkownika

    // Łączenie z bazą danych za pomocą PDO
    try {
        $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo 'Błąd połączenia z bazą danych: ' . $e->getMessage();
        die();
    }

    // Zapytanie SQL do pobrania wszystkich wierszy z tabeli "bieda"
    $query = "SELECT * FROM bieda";

    // Próba wykonania zapytania
    try {
        $statement = $pdo->query($query);
        $rows = $statement->fetchAll(PDO::FETCH_ASSOC);

        // Wyświetlanie wyników na stronie
        if ($rows) {
            echo '<h2>Wiersze z tabeli "bieda":</h2>';
            echo '<ul>';
            foreach ($rows as $row) {
                echo '<li>ID: ' . $row['id'] . ', Title: ' . $row['title'] . ', Body: ' . $row['body'] . '</li>';
            }
            echo '</ul>';
        } else {
            echo 'Brak wierszy w tabeli "bieda".';
        }
    } catch (PDOException $e) {
        echo 'Błąd podczas pobierania danych: ' . $e->getMessage();
    }
}

// Wywołanie funkcji
fetchAndDisplayRowsFromBiedaTable();

?>
