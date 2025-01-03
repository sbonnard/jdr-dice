<?php

global $dbCo;

/**
 * Redirect to the given URL or to the previous page if no URL is provided.
 *
 * @param string|null $url URL to redirect to. If null, redirect to the previous page.
 * @return void
 */
function redirectTo(?string $url = null): void
{
    if ($url === null) {
        if (isset($_SERVER['HTTP_REFERER'])) {
            $url = $_SERVER['HTTP_REFERER'];
        } else {
            $url = 'defaultPage.php'; // Fallback URL if HTTP_REFERER is not set
        }
    }
    header('Location: ' . $url);
    exit;
}


/**
 * Get options for whatever datas you set as parameters.
 *
 * @param array $datas - The array containing the datas.
 * @param string $id - The id field in the array.
 * @param string $dataName - The name of the the interlocutor or company.
 * @return string - The HTML options for the select field.
 */
function getDatasAsHTMLOptions(array $datas, string $placeholder, string $id, string $dataName, string $dataNameBis = ''): string
{
    $htmlOptions = '<option class="form__input__placeholder" value="">- ' . htmlspecialchars($placeholder) . ' -</option>';

    foreach ($datas as $data) {
        // I check here if datas exist to avoid a PHP error.
        $dataNameBisValue = !empty($dataNameBis) ? ' ' . htmlspecialchars($data[$dataNameBis]) : '';

        $htmlOptions .=
            '<option value="' . htmlspecialchars($data[$id]) . '">' .
            htmlspecialchars($data[$dataName]) . $dataNameBisValue .
            '</option>';
    }

    return $htmlOptions;
}


/**
 * Formats a price in a specific way. Example : 25000.00 -> 25 000 € OR 18000.50 -> 18 000,50 €.
 *
 * @param float $price - The price to format.
 * @param string $currency - The currency you want to apply to the price.
 * @return string - The price formated.
 */
function formatPrice(float|int $price, string $currency): string
{
    if ($price == (int)$price) {
        return number_format($price, 0, ',', ' ') . ' ' . $currency;
    } else {
        return number_format($price, 2, ',', ' ') . ' ' . $currency;
    }
}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// FUNCTIONS TO FORMAT DATES


/**
 * Format a month and year into a readable French format. Example : '2024-12' -> 'Décembre 2024'.
 *
 * @param string $yearAndMonth - The year and month to format.
 * @return string - The formatted date string.
 */
function formatFrenchDate(string $yearMonthDay): string
{
    [$year, $month, $day] = explode('-', $yearMonthDay);

    $months = [
        '01' => 'Janvier',
        '02' => 'Février',
        '03' => 'Mars',
        '04' => 'Avril',
        '05' => 'Mai',
        '06' => 'Juin',
        '07' => 'Juillet',
        '08' => 'Août',
        '09' => 'Septembre',
        '10' => 'Octobre',
        '11' => 'Novembre',
        '12' => 'Décembre'
    ];

    $monthName = $months[$month] ?? 'Mois inconnu';
    return $day . ' ' . $monthName . ' ' . $year;
}

/**
 * Get year only from a campaign.
 *
 * @param PDO $dbCo - Connection to database.
 * @param array $campaign - Campaign array
 * @return string - The year from the campaign.
 */
function getYearOnly(PDO $dbCo, array $campaign): string
{
    $queryYear = $dbCo->prepare(
        'SELECT YEAR(date_start) AS year
        FROM campaign
        WHERE id_campaign = :id_campaign;'
    );

    $bindValues = [
        'id_campaign' => intval($campaign['id_campaign'])
    ];

    $queryYear->execute($bindValues);

    $result = $queryYear->fetch(PDO::FETCH_ASSOC);

    return implode('', $result);
}

/**
 * Formats date to get it back when editing.
 *
 * @param string $date - The date to format
 * @return string - The formatted date
 */
function formatDateForInput(string $date): string
{
    $dateTime = new DateTime($date);
    return $dateTime->format('Y-m-d');
}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// FUNCTIONS TO FORMAT PHONE NUMBERS


/**
 * Formats phone numbers from database. Example : 0601020304 -> 06 01 02 03 04.
 *
 * @param string $phoneNumber - The phone number to format.
 * @return string - The formatted phone number.
 */
function formatPhoneNumber(string $phoneNumber): string
{
    // Vérifie si le numéro de téléphone a bien 10 chiffres
    if (strlen($phoneNumber) === 10) {
        // Utilise une expression régulière pour insérer un espace toutes les deux positions
        return preg_replace('/(\d{2})(?=\d)/', '$1 ', $phoneNumber);
    }
    // Retourne le numéro original s'il ne correspond pas au format attendu
    return $phoneNumber;
}


/**
 * Permet d'obtenir une date au format français. Exemple : 2024-01-01 -> 1 Janvier 2024.
 *
 * @param [type] $date - La date à convertir.
 * @return string - La date convertie en chaîne de caractères.
 */
function getDateText($date): string
{
    $jour = getdate(strtotime($date));
    $semaine = array(
        " Dimanche ",
        " Lundi ",
        " Mardi ",
        " Mercredi ",
        " Jeudi ",
        " vendredi ",
        " samedi "
    );
    $mois = array(
        1 => " Janvier ",
        " Février ",
        " Mars ",
        " Avril ",
        " Mai ",
        " Juin ",
        " Juillet ",
        " Août ",
        " Septembre ",
        " Octobre ",
        " Novembre ",
        " Décembre "
    );
    return /*$semaine[$jour['wday']] . */ $jour['mday'] . $mois[$jour['mon']] . $jour['year'];
}