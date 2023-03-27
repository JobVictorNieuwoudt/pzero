<?php
// Display all errors (for debugging purposes)
error_reporting(E_ALL);
ini_set('display_errors', '1');

// Disable error reporting (remove for production)
error_reporting(0);

// Set the URL to scrape
$url = 'https://www.worldometers.info/coronavirus/';

// Initialize cURL
$ch = curl_init();

// Set cURL options
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Fetch the HTML content using cURL
$html = curl_exec($ch);

// Close the cURL handle
curl_close($ch);

// Load the HTML content into a DOMDocument object
$doc = new DOMDocument();
$doc->loadHTML($html);

// Create an XPath object to navigate the HTML content
$xpath = new DOMXPath($doc);

// Find all the rows in the table with id "main_table_countries_today"
$tableRows = $xpath->query('//table[@id="main_table_countries_today"]/tbody/tr');

// Initialize an empty array to store the scraped data
$data = array();

// Loop through each row in the table
foreach ($tableRows as $row) {
    // Get the columns in the current row
    $cols = $row->getElementsByTagName('td');

    // Extract the data from each column
    $country = $cols->item(1)->textContent;
    $totalCases = $cols->item(2)->textContent;
    $newCases = $cols->item(3)->textContent;
    $totalDeaths = $cols->item(4)->textContent;
    $newDeaths = $cols->item(5)->textContent;
    $totalRecovered = $cols->item(6)->textContent;

    // Add the data to the array
    $data[] = array(
        'Country' => $country,
        'Total Cases' => $totalCases,
        'New Cases' => $newCases,
        'Total Deaths' => $totalDeaths,
        'New Deaths' => $newDeaths,
        'Total Recovered' => $totalRecovered
    );
}

// Convert the array to a JSON string
$json = json_encode($data);

// Output the JSON string
var_dump($json);

// Save the JSON data to a file
file_put_contents('C:\XAMPP\htdocs\pzero\public\textfiles\data.json', $json);

?>
