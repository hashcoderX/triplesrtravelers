<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class SeoService
{
    private $title;
    private $description;
    private $keywords;
    private $canonicalUrl;
    private $ogImage;
    private $ogType = 'website';
    private $twitterCard = 'summary_large_image';
    private $structuredData = [];
    private $breadcrumbs = [];

    /**
     * Set the page title
     */
    public function setTitle($title, $appendSiteName = true)
    {
        $siteName = config('app.name', 'Triple SR Travelers');
        $this->title = $appendSiteName ? $title . ' | ' . $siteName : $title;
        return $this;
    }

    /**
     * Set the meta description
     */
    public function setDescription($description)
    {
        $this->description = strlen($description) > 160 ? 
            substr($description, 0, 157) . '...' : $description;
        return $this;
    }

    /**
     * Set meta keywords
     */
    public function setKeywords($keywords)
    {
        if (is_array($keywords)) {
            $this->keywords = implode(', ', $keywords);
        } else {
            $this->keywords = $keywords;
        }
        return $this;
    }

    /**
     * Set canonical URL
     */
    public function setCanonicalUrl($url = null)
    {
        $this->canonicalUrl = $url ?: URL::current();
        return $this;
    }

    /**
     * Set Open Graph image
     */
    public function setOgImage($image)
    {
        $this->ogImage = $image;
        return $this;
    }

    /**
     * Set Open Graph type
     */
    public function setOgType($type)
    {
        $this->ogType = $type;
        return $this;
    }

    /**
     * Set Twitter card type
     */
    public function setTwitterCard($card)
    {
        $this->twitterCard = $card;
        return $this;
    }

    /**
     * Add structured data
     */
    public function addStructuredData($data)
    {
        $this->structuredData[] = $data;
        return $this;
    }

    /**
     * Add breadcrumb item
     */
    public function addBreadcrumb($name, $url = null)
    {
        $this->breadcrumbs[] = [
            'name' => $name,
            'url' => $url
        ];
        return $this;
    }

    /**
     * Generate meta tags HTML
     */
    public function getMetaTags()
    {
        $html = '';

        // Basic meta tags
        if ($this->title) {
            $html .= '<title>' . e($this->title) . '</title>' . PHP_EOL;
        }

        if ($this->description) {
            $html .= '<meta name="description" content="' . e($this->description) . '">' . PHP_EOL;
        }

        if ($this->keywords) {
            $html .= '<meta name="keywords" content="' . e($this->keywords) . '">' . PHP_EOL;
        }

        if ($this->canonicalUrl) {
            $html .= '<link rel="canonical" href="' . e($this->canonicalUrl) . '">' . PHP_EOL;
        }

        // Open Graph meta tags
        if ($this->title) {
            $html .= '<meta property="og:title" content="' . e($this->title) . '">' . PHP_EOL;
        }

        if ($this->description) {
            $html .= '<meta property="og:description" content="' . e($this->description) . '">' . PHP_EOL;
        }

        $html .= '<meta property="og:type" content="' . e($this->ogType) . '">' . PHP_EOL;
        $html .= '<meta property="og:url" content="' . e($this->canonicalUrl ?: URL::current()) . '">' . PHP_EOL;

        if ($this->ogImage) {
            $html .= '<meta property="og:image" content="' . e($this->ogImage) . '">' . PHP_EOL;
            $html .= '<meta property="og:image:width" content="1200">' . PHP_EOL;
            $html .= '<meta property="og:image:height" content="630">' . PHP_EOL;
        }

        $html .= '<meta property="og:site_name" content="' . e(config('app.name', 'Triple SR Travelers')) . '">' . PHP_EOL;

        // Twitter Card meta tags
        $html .= '<meta name="twitter:card" content="' . e($this->twitterCard) . '">' . PHP_EOL;

        if ($this->title) {
            $html .= '<meta name="twitter:title" content="' . e($this->title) . '">' . PHP_EOL;
        }

        if ($this->description) {
            $html .= '<meta name="twitter:description" content="' . e($this->description) . '">' . PHP_EOL;
        }

        if ($this->ogImage) {
            $html .= '<meta name="twitter:image" content="' . e($this->ogImage) . '">' . PHP_EOL;
        }

        // Additional meta tags for travel websites
        $html .= '<meta name="robots" content="index, follow">' . PHP_EOL;
        $html .= '<meta name="author" content="Triple SR Travelers">' . PHP_EOL;
        $html .= '<meta name="viewport" content="width=device-width, initial-scale=1.0">' . PHP_EOL;

        return $html;
    }

    /**
     * Generate structured data JSON-LD
     */
    public function getStructuredData()
    {
        if (empty($this->structuredData)) {
            return '';
        }

        $html = '<script type="application/ld+json">' . PHP_EOL;
        
        if (count($this->structuredData) === 1) {
            $html .= json_encode($this->structuredData[0], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
        } else {
            $html .= json_encode($this->structuredData, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
        }
        
        $html .= PHP_EOL . '</script>' . PHP_EOL;

        return $html;
    }

    /**
     * Generate breadcrumb structured data
     */
    public function getBreadcrumbStructuredData()
    {
        if (empty($this->breadcrumbs)) {
            return '';
        }

        $listItems = [];
        foreach ($this->breadcrumbs as $index => $breadcrumb) {
            $listItems[] = [
                '@type' => 'ListItem',
                'position' => $index + 1,
                'name' => $breadcrumb['name'],
                'item' => $breadcrumb['url'] ?: URL::current()
            ];
        }

        $schema = [
            '@context' => 'https://schema.org',
            '@type' => 'BreadcrumbList',
            'itemListElement' => $listItems
        ];

        return '<script type="application/ld+json">' . PHP_EOL . 
               json_encode($schema, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) . 
               PHP_EOL . '</script>' . PHP_EOL;
    }

    /**
     * Generate organization structured data
     */
    public function getOrganizationStructuredData()
    {
        $schema = [
            '@context' => 'https://schema.org',
            '@type' => 'TravelAgency',
            'name' => 'Triple SR Travelers',
            'url' => url('/'),
            'logo' => asset('logo/logo_website.png'),
            'description' => 'Premium travel agency specializing in Sri Lankan adventures and customized travel experiences.',
            'address' => [
                '@type' => 'PostalAddress',
                'addressCountry' => 'LK'
            ],
            'contactPoint' => [
                '@type' => 'ContactPoint',
                'telephone' => '+94777897147',
                'contactType' => 'customer support',
                'availableLanguage' => ['English', 'Sinhala']
            ],
            'sameAs' => [
                'https://facebook.com/triplesrtravelers',
                'https://instagram.com/triplesrtravelers',
                'https://twitter.com/triplesrtravelers'
            ]
        ];

        return '<script type="application/ld+json">' . PHP_EOL . 
               json_encode($schema, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) . 
               PHP_EOL . '</script>' . PHP_EOL;
    }

    /**
     * Generate travel destination structured data
     */
    public function createDestinationSchema($destination)
    {
        return [
            '@context' => 'https://schema.org',
            '@type' => 'TouristDestination',
            'name' => $destination->name,
            'description' => $destination->description ?? 'Discover the beauty of ' . $destination->name . ' with Triple SR Travelers',
            'url' => url('/fr/exploretrip/' . $destination->id),
            'image' => $destination->firstImage ? asset($destination->firstImage->file_url) : null,
            'geo' => [
                '@type' => 'GeoCoordinates',
                'latitude' => $destination->latitude ?? null,
                'longitude' => $destination->longitude ?? null
            ]
        ];
    }

    /**
     * Generate trip/tour structured data
     */
    public function createTripSchema($trip)
    {
        return [
            '@context' => 'https://schema.org',
            '@type' => 'TouristTrip',
            'name' => $trip->name,
            'description' => $trip->description,
            'url' => url('/fr/exploretrip/' . $trip->id),
            'image' => $trip->firstImage ? asset($trip->firstImage->file_url) : null,
            'provider' => [
                '@type' => 'TravelAgency',
                'name' => 'Triple SR Travelers',
                'url' => url('/')
            ],
            'offers' => [
                '@type' => 'Offer',
                'priceCurrency' => 'LKR',
                'availability' => 'https://schema.org/InStock'
            ]
        ];
    }

    /**
     * Generate hotel structured data
     */
    public function createHotelSchema($hotel)
    {
        return [
            '@context' => 'https://schema.org',
            '@type' => 'Hotel',
            'name' => $hotel->name,
            'description' => $hotel->description,
            'url' => url('/fr/explorehotel/' . $hotel->id),
            'image' => $hotel->firstImage ? asset($hotel->firstImage->file_url) : null,
            'address' => [
                '@type' => 'PostalAddress',
                'addressLocality' => $hotel->city ?? '',
                'addressCountry' => 'LK'
            ],
            'starRating' => [
                '@type' => 'Rating',
                'ratingValue' => $hotel->rating ?? 4
            ]
        ];
    }

    /**
     * Generate review structured data
     */
    public function createReviewSchema($review)
    {
        return [
            '@context' => 'https://schema.org',
            '@type' => 'Review',
            'author' => [
                '@type' => 'Person',
                'name' => $review->name
            ],
            'reviewBody' => $review->comment,
            'reviewRating' => [
                '@type' => 'Rating',
                'ratingValue' => $review->rating ?? 5,
                'bestRating' => 5,
                'worstRating' => 1
            ],
            'datePublished' => $review->created_at->format('Y-m-d')
        ];
    }

    /**
     * Quick setup for homepage
     */
    public function setupHomepage()
    {
        return $this->setTitle('Discover Sri Lanka with Triple SR Travelers - Custom Travel Experiences', false)
                   ->setDescription('Premium travel agency offering customized Sri Lankan adventures. Explore pristine beaches, lush mountains, and rich culture with our expert-guided tours and personalized itineraries.')
                   ->setKeywords(['Sri Lanka travel', 'custom tours', 'travel agency', 'Sri Lankan adventures', 'personalized travel', 'beach holidays', 'mountain tours'])
                   ->setOgImage(asset('slider/one.png'))
                   ->addStructuredData($this->getOrganizationStructuredData());
    }

    /**
     * Quick setup for destination pages
     */
    public function setupDestination($destination)
    {
        return $this->setTitle("Explore {$destination->name} - Triple SR Travelers")
                   ->setDescription("Discover the beauty of {$destination->name} with Triple SR Travelers. Experience authentic Sri Lankan culture, stunning landscapes, and unforgettable adventures.")
                   ->setKeywords(["{$destination->name} travel", 'Sri Lanka destinations', 'travel tours', 'adventure travel'])
                   ->setOgImage($destination->firstImage ? asset($destination->firstImage->file_url) : asset('slider/one.png'))
                   ->setOgType('article')
                   ->addBreadcrumb('Home', url('/'))
                   ->addBreadcrumb('Destinations')
                   ->addBreadcrumb($destination->name)
                   ->addStructuredData($this->createDestinationSchema($destination));
    }

    /**
     * Quick setup for trip pages
     */
    public function setupTrip($trip)
    {
        return $this->setTitle("{$trip->name} - Sri Lankan Adventure Tour")
                   ->setDescription($trip->description ?: "Join us on an exciting {$trip->name} adventure. Experience the best of Sri Lanka with Triple SR Travelers' expertly crafted tour packages.")
                   ->setKeywords(["{$trip->name}", 'Sri Lanka tours', 'adventure travel', 'guided tours'])
                   ->setOgImage($trip->firstImage ? asset($trip->firstImage->file_url) : asset('slider/one.png'))
                   ->setOgType('article')
                   ->addBreadcrumb('Home', url('/'))
                   ->addBreadcrumb('Our Trips', url('/fr/trips'))
                   ->addBreadcrumb($trip->name)
                   ->addStructuredData($this->createTripSchema($trip));
    }

    /**
     * Quick setup for hotel pages
     */
    public function setupHotel($hotel)
    {
        return $this->setTitle("{$hotel->name} - Premium Accommodation in Sri Lanka")
                   ->setDescription($hotel->description ?: "Experience luxury and comfort at {$hotel->name}. Book your stay through Triple SR Travelers for the best rates and personalized service.")
                   ->setKeywords(["{$hotel->name}", 'Sri Lanka hotels', 'accommodation', 'luxury hotels'])
                   ->setOgImage($hotel->firstImage ? asset($hotel->firstImage->file_url) : asset('slider/one.png'))
                   ->setOgType('article')
                   ->addBreadcrumb('Home', url('/'))
                   ->addBreadcrumb('Hotels', url('/fr/hotels'))
                   ->addBreadcrumb($hotel->name)
                   ->addStructuredData($this->createHotelSchema($hotel));
    }
}