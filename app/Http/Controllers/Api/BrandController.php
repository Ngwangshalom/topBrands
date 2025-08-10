<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Collection;

class BrandController extends Controller
{
    /**
     * Display a listing of brands.
     */
    public function index(Request $request): JsonResponse
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

        return response()->json([
            'success' => true,
            'data' => $brands,
            'meta' => [
                'country_code' => $countryCode,
                'count' => $brands->count()
            ]
        ]);
    }

    protected function getDefaultBrands(): Collection
    {
        return collect([
            [
                'brand_id' => 1,
                'brand_image' => 'https://i.pinimg.com/originals/d7/6f/61/d76f6187dac60d2cf1996929b22eab72.png',
                'brand_name' => 'Betway',
                'rating' => 5,
                'bonus_text' => 'Up to $100 Welcome Bonus',
                'cta_text' => 'Play Now',
                'country_code' => 'default'
            ],
            [
                'brand_id' => 2,
                'brand_image' => 'https://www.pikpng.com/pngl/m/220-2204477_888-casino-log-888-casino-logo-png-clipart.png',
                'brand_name' => '888 Casino',
                'rating' => 4,
                'bonus_text' => '100% Bonus up to $200',
                'cta_text' => 'Join Now',
                'country_code' => 'default'
            ],
            [
                'brand_id' => 3,
                'brand_image' => 'https://tse3.mm.bing.net/th/id/OIP.qBgtCSnjKuet3dOKGrbRlgAAAA?cb=thfc1&rs=1&pid=ImgDetMain&o=7&rm=3',
                'brand_name' => 'LeoVegas',
                'rating' => 4,
                'bonus_text' => 'Up to $400 + 20 Free Spins',
                'cta_text' => 'Sign Up',
                'country_code' => 'default'
            ],
            [
                'brand_id' => 4,
                'brand_image' => 'https://th.bing.com/th/id/R.90a34404f46179709f945ccbc665dad4?rik=D4iL0hawK8%2f6Zw&pid=ImgRaw&r=0',
                'brand_name' => 'William Hill',
                'rating' => 5,
                'bonus_text' => 'Bet £10, Get £30 in Free Bets',
                'cta_text' => 'Get Started',
                'country_code' => 'default'
            ],
            [
                'brand_id' => 5,
                'brand_image' => 'https://tse2.mm.bing.net/th/id/OIP.9oXiV4ffSQI1hETGOvy55wHaBZ?cb=thfc1&rs=1&pid=ImgDetMain&o=7&rm=3',
                'brand_name' => 'Paddy Power',
                'rating' => 4,
                'bonus_text' => 'Bet £10, Get £30 Bonus',
                'cta_text' => 'Play Today',
                'country_code' => 'default'
            ],
        ]);
    }

    /**
     * Store a newly created brand.
     */
    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'brand_name' => 'required|string|max:255',
            'brand_image' => 'required|url',
            'rating' => 'required|integer|min:1|max:5',
            'bonus_text' => 'required|string',
            'cta_text' => 'required|string',
            'country_code' => 'nullable|string|size:2',
        ]);

        $brand = Brand::create($validated);

        return response()->json([
            'success' => true,
            'data' => $brand,
            'message' => 'Brand created successfully'
        ], 201);
    }

    /**
     * Display the specified brand.
     */
    public function show(Brand $brand): JsonResponse
    {
        return response()->json([
            'success' => true,
            'data' => $brand
        ]);
    }

    /**
     * Update the specified brand.
     */
    public function update(Request $request, Brand $brand): JsonResponse
    {
        $validated = $request->validate([
            'brand_name' => 'sometimes|string|max:255',
            'brand_image' => 'sometimes|url',
            'rating' => 'sometimes|integer|min:1|max:5',
            'bonus_text' => 'sometimes|string',
            'cta_text' => 'sometimes|string',
            'country_code' => 'nullable|string|size:2',
        ]);

        $brand->update($validated);

        return response()->json([
            'success' => true,
            'data' => $brand,
            'message' => 'Brand updated successfully'
        ]);
    }

    /**
     * Remove the specified brand.
     */
    public function destroy(Brand $brand): JsonResponse
    {
        $brand->delete();

        return response()->json([
            'success' => true,
            'message' => 'Brand deleted successfully'
        ]);
    }


/**
 * Filter brands by minimum rating
 */
public function filterByRating($rating)
{
    $brands = Brand::where('rating', '>=', $rating)
                ->orderBy('rating', 'desc')
                ->get();

    return response()->json([
        'success' => true,
        'data' => $brands,
        'meta' => [
            'min_rating' => (int)$rating,
            'count' => $brands->count()
        ]
    ]);
}

/**
 * Get brands by country code
 */
public function getByCountry($countryCode)
{
    $brands = Brand::where('country_code', $countryCode)
                ->orWhere('country_code', 'default')
                ->orderBy('rating', 'desc')
                ->get();

    return response()->json([
        'success' => true,
        'data' => $brands,
        'meta' => [
            'country_code' => $countryCode,
            'count' => $brands->count()
        ]
    ]);
}
}
