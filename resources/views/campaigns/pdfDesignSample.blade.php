<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notice of Sale in Execution</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh; /* Full viewport height */
            margin: 0;
        }
        .centered-div {
            text-align: center;
        }
    </style>
</head>
<body>
@php
        $armsPath = public_path('images/brands/LORE_LOGO.png');
        $armsData = file_get_contents($armsPath);
        $base64Arms = base64_encode($armsData);
        $armsMimeType = 'image/png';
        $coat_of_arms = 'data:' . $armsMimeType . ';base64,' . $base64Arms;

    @endphp
    <!-- <div style="margin-bottom: 2em;"> <img class="d-block mx-auto mt-3" width=150
        src={{$coat_of_arms}} alt="Coat Of Arms">
    </div> -->
    <div class="centered-div" style="margin-bottom: 2em;">
        <img class="d-block mx-auto mt-3" width=150 src="{{$coat_of_arms}}" alt="Coat Of Arms">
    </div>
    <div style="border: 1px solid black; padding: 20px;">
        <h3 style="text-align: center;">IN THE HIGH COURT OF THE REPUBLIC OF BOTSWANA HELD AT GABORONE</h3>
        <p style="text-align: center;">CASE NO. CVHGB – 001941-23</p>
        <h3>In the matter between:</h3>
        <p><strong>FIRST NATIONAL BANK OF BOTSWANA LIMITED</strong><br>
        PLAINTIFF</p>
        <p><strong>LLOYD COCKY SIANE</strong><br>
        DEFENDANT</p>
        <h3 style="text-align: center;">NOTICE OF SALE IN EXECUTION</h3>
        <p><strong>BE PLEASED TO TAKE NOTICE</strong> that pursuant to the judgment of the above Honourable Court, the immovable property of the above-named Defendant shall be publicly sold in execution by the Deputy Sheriff as follows:</p>
        <p><strong>DATE OF SALE:</strong> 6<sup>th</sup> July 2024</p>
        <p><strong>VENUE:</strong> Lot 23095, Gaborone West Extension 17</p>
        <p><strong>TIME:</strong> 10:30 am</p>
        <p><strong>PROPERTY TO BE SOLD:</strong> Certain piece of land being Lot 23095, Gaborone, measuring 460m<sup>2</sup> (Four Hundred and Sixty Square Metres) which is held under Deed of Transfer Number 1039/16 dated 13<sup>th</sup> day of April 2016 made in favour of LLOYD COCKY SIANE together with the developments thereon being a Three bedroomed house, sitting room, kitchen with dining room, toilet with bathroom, Double garage, toilet, parking lot and one outer building with bedroom and bathroom, Screen wall with electric fence.</p>
        <p><strong>CONDITIONS OF SALE:</strong> Details and conditions of sale may be inspected at the Plaintiff’s Attorney’s office.</p>
        <p><strong>TERMS OF SALE:</strong> Cash or bank-guaranteed cheques.</p>
        <p><strong>DATED AT GABORONE THIS 3<sup>RD</sup> DAY OF JUNE 2024.</strong></p>
        <p><strong>DEPUTY SHERIFF URGENT J CHILISA</strong><br>
        C/O BOGOPA, MANEWE, TOBEDZA & CO<br>
        Plaintiff’s Attorneys<br>
        Plot No. 54368, New CBD<br>
        Unit 16 CD, 16th Floor<br>
        iTowers North<br>
        P. O. Box 26465<br>
        GABORONE<br>
        Tel: 3905466, Fax: 3905451<br>
        Cell: 71594008/72821439 (Deputy Sheriff)</p>
    </div>
</body>
</html>
