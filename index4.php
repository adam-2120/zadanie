<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Dziennik ocen</title>
</head>
<body>

<h2>Dziennik ocen</h2>

<?php

if (
    isset($_POST["uczen"]) &&
    isset($_POST["ocena"]) &&
    isset($_POST["przedmiot"])
)
{
    $uczen = $_POST["uczen"];
    $ocena = $_POST["ocena"];
    $przedmiot = $_POST["przedmiot"];

    $plik = fopen("oceny.txt", "a");

    $tekst = $uczen . " | " . $przedmiot . " | ocena: " . $ocena . "\n";

    fwrite($plik, $tekst);

    fclose($plik);

    header("Location: " . $_SERVER["PHP_SELF"]);
    exit();
}

?>

<form method="POST">

    Imię i nazwisko:
    <input type="text" name="uczen" required>

    <br><br>

    Ocena:
    <select name="ocena">
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
    </select>

    <br><br>

    Przedmiot:
    <input type="text" name="przedmiot" required>

    <br><br>

    <input type="submit" value="Zapisz ocenę">

</form>

<h2>Zapisane oceny</h2>

<?php

if (file_exists("oceny.txt"))
{
    $plik = fopen("oceny.txt", "r");

    while (!feof($plik))
    {
        $linia = fgets($plik);

        if ($linia != "")
        {
            echo $linia . "<br>";
        }
    }

    fclose($plik);
}
else
{
    echo "Brak zapisanych ocen.";
}

?>

</body>
</html>