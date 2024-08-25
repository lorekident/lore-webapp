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
        height: 100vh;
        /* Full viewport height */
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

    //Pre-Fill Data
    $heading = $campaign->heading;
    $subHeading = $campaign->sub_heading;
    $caseNumber = $campaign->courtCase->case_title;
    $plaintiff = "DEPARTMENT OF PUBLIC PROSECUTORS";
    $defendant = $campaign->courtCase->asset->defendant->name ?? '';
    $saleDate = formatDate($campaign->date_of_disposal);
    $venue = $campaign->venue;
    $time = $campaign->time_of_disposal;
    $publicationDate = formatDate($campaign->date_of_publication);
    $propertyDetails = $campaign->description;
    $conditions = $campaign->conditions_of_sale;
    $terms = $campaign->terms_of_sale;
    $personTitle = "Asset Officer";
    $contactInfo = $campaign->contact_person . "\n" . "$personTitle". "\n" . $campaign->address_line_1 . "\n" . $campaign->address_line_2 . "\n" . $campaign->city_town . "\n" .
    $campaign->tel;

    @endphp
    <div class="centered-div" style="margin-bottom: 2em;">
        <img class="d-block mx-auto mt-3" width=150 src="{{$coat_of_arms}}" alt="Coat Of Arms">
    </div>
    <div style="border: 1px solid black; padding: 20px;">
        <h3 style="text-align: center;">{{$heading}}</h3>
        <p style="text-align: center;">CASE NO. {{$caseNumber}}</p>
        <h3>In the matter between:</h3>
        <p><strong>{{$plaintiff}}</strong><br>PLAINTIFF</p>
        <p><strong>{{$defendant}}</strong><br>DEFENDANT</p>
        <h3 style="text-align: center;">NOTICE OF SALE IN EXECUTION</h3>
        <p><strong>{{$subHeading}}</strong></p>
        <p><strong>DATE OF SALE:</strong> {{$saleDate}}</p>
        <p><strong>VENUE:</strong> {{$venue}}</p>
        <p><strong>TIME:</strong> {{$time}}</p>
        <p><strong>PROPERTY TO BE SOLD:</strong> {{$propertyDetails}}</p>
        <p><strong>CONDITIONS OF SALE:</strong> {{$conditions}}</p>
        <p><strong>TERMS OF SALE:</strong> {{$terms}}</p>
        <p><strong>DATED AT GABORONE THIS {{$publicationDate}}.</strong></p>
        <pre>{{ $contactInfo }}</pre>
    </div>
</body>

</html>
