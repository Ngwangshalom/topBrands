<?php

namespace App\Http\Controllers;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
        {
            $countryCode = $request->header('CF-IPCountry', 'default');

            // Get brands for the detected country or default ones
            $brands = Brand::where('country_code', $countryCode)
                        ->orWhere('country_code', 'default')
                        ->orderBy('rating', 'desc')
                        ->get();

            // If no brands found for the country, use default brands
            if ($brands->isEmpty()) {
                $brands = $this->getDefaultBrands()->sortByDesc('rating')->values();
            }

            return view('brands.index', [
                'country_code' => $countryCode,
                'displayBrands' => $brands,
            ]);
        }

    protected function getDefaultBrands(): Collection
    {
        return collect([
            (object) [
                'brand_id' => 1,
                'brand_image' => 'https://i.pinimg.com/originals/d7/6f/61/d76f6187dac60d2cf1996929b22eab72.png',
                'brand_name' => 'Betway',
                'rating' => 5,
                'bonus_text' => 'Up to $100 Welcome Bonus',
                'cta_text' => 'Play Now'
            ],
            (object) [
                'brand_id' => 2,
                'brand_image' => 'https://www.pikpng.com/pngl/m/220-2204477_888-casino-log-888-casino-logo-png-clipart.png',
                'brand_name' => '888 Casino',
                'rating' => 4,
                'bonus_text' => '100% Bonus up to $200',
                'cta_text' => 'Join Now'
            ],
            (object) [
                'brand_id' => 3,
                'brand_image' => 'https://tse3.mm.bing.net/th/id/OIP.qBgtCSnjKuet3dOKGrbRlgAAAA?cb=thfc1&rs=1&pid=ImgDetMain&o=7&rm=3', // fallback svg, replace if needed
                'brand_name' => 'LeoVegas',
                'rating' => 4,
                'bonus_text' => 'Up to $400 + 20 Free Spins',
                'cta_text' => 'Sign Up'
            ],
            (object) [
                'brand_id' => 4,
                'brand_image' => 'https://th.bing.com/th/id/R.90a34404f46179709f945ccbc665dad4?rik=D4iL0hawK8%2f6Zw&pid=ImgRaw&r=0',
                'brand_name' => 'William Hill',
                'rating' => 5,
                'bonus_text' => 'Bet £10, Get £30 in Free Bets',
                'cta_text' => 'Get Started'
            ],
            (object) [
                'brand_id' => 5,
                'brand_image' => 'https://tse2.mm.bing.net/th/id/OIP.9oXiV4ffSQI1hETGOvy55wHaBZ?cb=thfc1&rs=1&pid=ImgDetMain&o=7&rm=3',
                'brand_name' => 'Paddy Power',
                'rating' => 4,
                'bonus_text' => 'Bet £10, Get £30 Bonus',
                'cta_text' => 'Play Today'
            ],
        ]);
    }




    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'brand_name' => 'required|string|max:255',
            'brand_image' => 'required|url',
            'rating' => 'required|integer|min:1|max:5',
            'country_code' => 'nullable|string|size:2',
        ]);

        return Brand::create($validated);
    }

    /**
     * Display the specified resource.
     */
    public function show(Brand $brand)
    {
        return $brand;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Brand $brand)
    {
        $validated = $request->validate([
            'brand_name' => 'sometimes|string|max:255',
            'brand_image' => 'sometimes|url',
            'rating' => 'sometimes|integer|min:1|max:5',
            'country_code' => 'nullable|string|size:2',
        ]);

        $brand->update($validated);
        return $brand;
    }

    /**
     * Remove the specified resource from storage.
     */
     public function destroy(Brand $brand)
    {
        $brand->delete();
        return response()->noContent();
    }
}
