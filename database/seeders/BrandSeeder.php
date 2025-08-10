<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $brands = [
            [
                'brand_name' => 'Mad Casino',
                'brand_image' => 'https://www.opnminded.com/content/cms-images/b154d6445b509e4019745aeffed55cb733ed3f6d-600x240.webp',
                'rating' => 5,
                'country_code' => 'FR',
                'bonus_text' => 'Bonus d\'inscription jusqu\'à 3.000€',
                'cta_text' => 'Jouer Maintenant'
            ],
            [
                'brand_name' => 'Robocat',
                'brand_image' => 'https://www.opnminded.com/content/cms-images/72b7f3b9db10e4e8bf29c90d4c8ab981e9aa8456-600x240.webp',
                'rating' => 5,
                'country_code' => 'FR',
                'bonus_text' => 'Obtenez un bonus de 500€ + 200 Tours gratuits + 1 Bonus Crab',
                'cta_text' => 'Jouer Maintenant'
            ],
            [
                'brand_name' => 'Spinsy Casino',
                'brand_image' => 'https://www.opnminded.com/content/cms-images/98d3a00c294c721c914fe61c0f7ef75dbb5da638-600x240.webp',
                'rating' => 5,
                'country_code' => 'FR',
                'bonus_text' => 'Offre de bienvenue jusqu\'à 500€ + 200 Tours gratuits',
                'cta_text' => 'Jouer Maintenant'
            ],
            [
                'brand_name' => 'Legendplay Casino',
                'brand_image' => 'https://www.opnminded.com/content/cms-images/fcd92746d6eb7fcf11aa856db6f9c4826e6ff2d6-600x240.webp',
                'rating' => 5,
                'country_code' => 'FR',
                'bonus_text' => 'Package de bienvenue de 500€ + 200 Tours gratuits',
                'cta_text' => 'Jouer Maintenant'
            ],
            [
                'brand_name' => 'Talismania Casino',
                'brand_image' => 'https://www.opnminded.com/content/cms-images/25a772c9a3b21fba4e3747fbe864f8a010782010-600x240.webp',
                'rating' => 4.5,
                'country_code' => 'FR',
                'bonus_text' => 'Package de bienvenue de 500 € + 200 Tours gratuits + 1 Bonus Crab',
                'cta_text' => 'Jouer Maintenant'
            ],
            [
                'brand_name' => 'Betalright Casino',
                'brand_image' => 'https://www.opnminded.com/content/cms-images/a479babd7c86e4ec339f045db153a3248037ec0e-600x240.webp',
                'rating' => 5,
                'country_code' => 'CM',
                'bonus_text' => 'Obtenez un bonus de 500€ + 200 Tours gratuits + 1 Bonus Crab',
                'cta_text' => 'Jouer Maintenant'
            ],
            [
                'brand_name' => 'GrandZ Bet Casino',
                'brand_image' => 'https://www.opnminded.com/content/cms-images/436bbfceef76c9aa33689ba108665157a0a093dd-600x240.webp',
                'rating' => 5,
                'country_code' => 'FR',
                'bonus_text' => 'Obtenez un bonus de 800€ + Surprise au 3ème dépôt',
                'cta_text' => 'Jouer Maintenant'
            ],
            [
                'brand_name' => 'Gransino Casino',
                'brand_image' => 'https://www.opnminded.com/content/cms-images/e7139b6fab43defa27dd2da166e9918d0d257791-600x240.webp',
                'rating' => 4.5,
                'country_code' => 'NG',
                'bonus_text' => 'Package de bienvenue de 500€ + 200 Tours gratuits',
                'cta_text' => 'Jouer Maintenant'
            ],
            [
                'brand_name' => 'Brutal Casino',
                'brand_image' => 'https://www.opnminded.com/content/cms-images/37dd40ae4b9a5931a1aa5353ea11e5dede1ac728-600x240.webp',
                'rating' => 5,
                'country_code' => 'FR',
                'bonus_text' => 'Profitez d\'un bonus de bienvenue jusqu\'à €1.000',
                'cta_text' => 'Jouer Maintenant'
            ],
            [
                'brand_name' => 'Kingmaker Casino',
                'brand_image' => 'https://www.opnminded.com/content/cms-images/0fdf91013606b4b7c03bb2f40ba8ebaecd75123e-600x240.webp',
                'rating' => 4.5,
                'country_code' => 'CM',
                'bonus_text' => 'Offre de bienvenue jusqu\'à 500€ + 50 Tours gratuits',
                'cta_text' => 'Jouer Maintenant'
            ],
        ];

        foreach ($brands as $brand) {
            Brand::create($brand);
        }
    }
}
