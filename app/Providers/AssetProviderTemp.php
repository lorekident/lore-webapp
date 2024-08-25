<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AssetProviderTemp
{
    public function getAssets()
    {
        return [
            [
                'id' => 1,
                'type' => 'Immovable property',
                'owner_name' => 'John Doe',
                'value' => 150000.00,
                'location' => '123 Main St, Springfield',
                'description' => 'Farm with 50 acres of land',
                'date_of_seizure' => '2023-01-15',
                'asset_images' => [
                    'images/assets/farm1.jpg',
                    'images/assets/farm2.jpg'
                ]
            ],
            [
                'id' => 2,
                'type' => 'Vehicle',
                'owner_name' => 'Jane Smith',
                'value' => 30000.00,
                'location' => '456 Elm St, Springfield',
                'description' => '2020 Tesla Model 3',
                'date_of_seizure' => '2023-02-20',
                'asset_images' => [
                    'images/assets/tesla1.jpg',
                    'images/assets/tesla2.jpg',
                    'images/assets/tesla3.jpg',
                    'images/assets/tesla4.jpg'
                ]
            ],
            [
                'id' => 3,
                'type' => 'Bank account',
                'owner_name' => 'Michael Johnson',
                'value' => 50000.00,
                'location' => 'Bank of Springfield',
                'description' => 'Savings account',
                'date_of_seizure' => '2023-03-10',
                'asset_images' => []
                
            ],
            [
                'id' => 4,
                'type' => 'Immovable property',
                'owner_name' => 'Emily Davis',
                'value' => 200000.00,
                'location' => '789 Oak St, Springfield',
                'description' => 'Rental house with 4 units',
                'date_of_seizure' => '2023-04-05',
                'asset_images' => [
                    'images/assets/rental1.jpg'
                ]
            ],
            [
                'id' => 5,
                'type' => 'Vehicle',
                'owner_name' => 'Chris Lee',
                'value' => 45000.00,
                'location' => '101 Maple St, Springfield',
                'description' => '2021 BMW X5',
                'date_of_seizure' => '2023-05-18',
                'asset_images' => [
                    'images/assets/bmw1.jpeg',
                    'images/assets/bmw2.jpeg',
                    'images/assets/bmw3.jpeg',
                    'images/assets/bmw4.jpeg',
                    'images/assets/bmw5.jpeg',
                    'images/assets/bmw6.jpeg'
                ]
            ],
            [
                'id' => 6,
                'type' => 'Bank account',
                'owner_name' => 'Patricia Brown',
                'value' => 75000.00,
                'location' => 'First National Bank',
                'description' => 'Checking account',
                'date_of_seizure' => '2023-06-02',
                'asset_images' => []
            ],
            [
                'id' => 7,
                'type' => 'Immovable property',
                'owner_name' => 'Robert Wilson',
                'value' => 120000.00,
                'location' => '202 Birch St, Springfield',
                'description' => 'Yard with a warehouse',
                'date_of_seizure' => '2023-07-25',
                'asset_images' => [
                    'images/assets/yard1.jpg'
                ]
            ],
            [
                'id' => 8,
                'type' => 'Vehicle',
                'owner_name' => 'Laura Martinez',
                'value' => 25000.00,
                'location' => '303 Cedar St, Springfield',
                'description' => '2019 Honda Accord',
                'date_of_seizure' => '2023-08-14',
                'asset_images' => [
                    'images/assets/lexus1.jpeg',
                    'images/assets/lexus2.jpeg',
                    'images/assets/lexus3.jpeg',
                    'images/assets/lexus4.jpeg'
                ]
            ],
            [
                'id' => 9,
                'type' => 'Bank account',
                'owner_name' => 'Steven Anderson',
                'value' => 100000.00,
                'location' => 'Citizens Bank',
                'description' => 'Business account',
                'date_of_seizure' => '2023-09-30',
                'asset_images' => []
            ],
            [
                'id' => 10,
                'type' => 'Immovable property',
                'owner_name' => 'Nancy Thompson',
                'value' => 300000.00,
                'location' => '404 Pine St, Springfield',
                'description' => 'Luxury villa with swimming pool',
                'date_of_seizure' => '2023-10-12',
                'asset_images' => [
                    'images/assets/villa1.jpg',
                    'images/assets/villa2.jpg'
                ]
            ],
        ];
    }

    public function getAssetById($id)
    {
        $assets = $this->getAssets();
        foreach ($assets as $asset) {
            if ($asset['id'] == $id) {
                return $asset;
            }
        }
        return null;
    }
}
