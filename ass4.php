<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Country Search</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
            <style>
                form{
                    border:2px solid black;
                border-radius:10px;
}
                .result{
                    border:2px solid black;
                border-radius:10px;
                background:burlywood;
}
                body{
                    background-image:url('doodle.avif');
}
            </style>
</head >
            <body>
                <div class="container bg-white d-flex justify-content-center flex-column mw-400 my-3">
                    <h1 class="text-center">
                        Know about Countries

                    </h1>
                    <form method="POST" class="p-3 m-3" >
                        <label for="cap">Search Country by Capital:</label>
                        <input class="form-control" type="text" name="cap">
                            <button class="btn btn-outline-info text-dark m-2" type="submit">search</button>
                            <br>
                                <label for="cap">Search Capital by Country Name:</label>
                                <input class="form-control" type="text" name="con">
                                    <button class="btn btn-outline-info text-dark m-2" type="submit">search</button>
                                    <br>
                                        <div class="dropdown my-2">
                                            <button class="btn btn-secondary dropdown-toggle" type="submit"
                                                data-bs-toggle="dropdown" aria-expanded="false" >
                                                Sort By
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li class="dropdown-item"><button class="btn btn-info" type="submit"
                                                    name="sbycap">Capital</button></li>
                                                <li class="dropdown-item"> <button class="btn btn-info" type="submit"
                                                    name="sbycon">Country name</button></li>
                                            </ul>
                                        </div>
                                    </form>
                                    <div class="result p-3">
                                        <?php
                                        $countries = array(
                                            "India" => "New Delhi",
                                            "Italy" => "Rome",
                                            "Luxembourg" =>
                                                "Luxembourg",
                                            "Belgium" => "Brussels",
                                            "Denmark" => "Copenhagen",
                                            "Finland" =>
                                                "Helsinki",
                                            "France" => "Paris",
                                            "Slovakia" => "Bratislava",
                                            "Slovenia" => "Ljubljana",
                                            "Germany" => "Berlin",
                                            "Greece" => "Athens",
                                            "Ireland" => "Dublin",
                                            "Netherlands" =>
                                                "Amsterdam",
                                            "Portugal" => "Lisbon",
                                            "Spain" => "Madrid",
                                            "Sweden" => "Stockholm",
                                            "United Kingdom" => "London",
                                            "Cyprus" => "Nicosia",
                                            "Lithuania" => "Vilnius",
                                            "Czech Republic" => "Prague",
                                            "Estonia" => "Tallin",
                                            "Hungary" => "Budapest",
                                            "Latvia" =>
                                                "Riga",
                                            "Malta" => "Valetta",
                                            "Austria" => "Vienna",
                                            "Poland" => "Warsaw"
                                        );
                                        function searchByCountry($countryName)
                                        {
                                            global $countries;
                                            $countryName = strtolower($countryName);
                                            foreach ($countries as $country => $capital) {
                                                if (strtolower($country) === $countryName) {
                                                    return "Capital of " . $country . " is " . $capital;
                                                }
                                            }
                                            return "Country not found";
                                        }
                                        function searchByCapital($capitalName)
                                        {
                                            global $countries;
                                            $capitalName = strtolower($capitalName);
                                            $key = array_search($capitalName, array_map('strtolower', $countries));
                                            if ($key !== false) {
                                                return $countries[$key] . " is capital of " . $key;
                                            }
                                            return "Capital not found";
                                        }
                                        if (isset($_POST) && array_key_exists('cap', $_POST) && $_POST["cap"] != "") {
                                            echo searchByCapital($_POST["cap"]) . "<br>";
                                        }
                                        if (isset($_POST) && array_key_exists('con', $_POST) && $_POST["con"] != "") {
                                            echo searchByCountry($_POST["con"]) . "<br>";
                                        }
                                        if (array_key_exists('sbycon', $_POST)) {
                                            echo "Sorted according to country name<br>";
                                            ksort($countries);
                                            foreach ($countries as $country => $capital) {
                                                echo "The capital of $country is $capital" . "<br>";
                                            }
                                        }
                                        if (array_key_exists('sbycap', $_POST)) {
                                            asort($countries);
                                            echo "Sorted according to capital<br>";
                                            foreach ($countries as $country => $capital) {
                                                echo "The capital of $country is $capital" . "<br>";
                                            }
                                        }
                                        ?>
                                    </div>
                                </div>
                            </body>
                        </html>