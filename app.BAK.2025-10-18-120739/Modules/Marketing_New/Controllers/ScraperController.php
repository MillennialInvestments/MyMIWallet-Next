

namespace App\Modules\Marketing_New\Controllers;

use App\Modules\Marketing_New\Libraries\ContentGenerator;
use App\Modules\Marketing_New\Libraries\WebScraper;
use App\Modules\Marketing_New\Models\MarketingModel;
use CodeIgniter\API\ResponseTrait;
use App\Controllers\UserController;

#[\AllowDynamicProperties]
class ScraperController extends UserController
{
    use ResponseTrait;

    protected $scraper;
    protected $contentGenerator;
    protected $marketingModel;

    public function __construct()
    {
        $this->scraper = new WebScraper();
        $this->contentGenerator = new ContentGenerator();
        $this->marketingModel = new MarketingModel();
    }

    private function scrapeWebsiteWithFallback($url)
    {
        try {
            log_message('debug', 'scrapeWebsiteWithFallback: Scraping URL - ' . $url);
            $scrapedData = $this->scrapeWebsite($url);
            if (empty($scrapedData['content'])) {
                log_message('debug', 'scrapeWebsiteWithFallback: Scraped data is empty, performing Google search fallback');
                $googleSearchResults = $this->scrapeGoogleSearch($url);
                $scrapedLinksData = $this->scrapeLinks($googleSearchResults);
                $scrapedData['google_search_results'] = $scrapedLinksData;
            }
            return $scrapedData;
        } catch (RequestException $e) {
            log_message('error', 'scrapeWebsiteWithFallback: RequestException - ' . $e->getMessage());
            // Skip the URL and proceed
            return ['error' => $e->getMessage()];
        } catch (\Exception $e) {
            log_message('error', 'scrapeWebsiteWithFallback: General error - ' . $e->getMessage());
            // Skip the URL and proceed
            return ['error' => $e->getMessage()];
        }
    }
    
    private function scrapeGoogleSearch($query)
    {
        $searchUrl = 'https://www.google.com/search?q=' . urlencode($query);
        $client = new Client();
        try {
            $response = $client->get($searchUrl);
            if ($response->getStatusCode() == 200) {
                $html = $response->getBody()->getContents();
                $dom = new \DOMDocument();
                libxml_use_internal_errors(true);
                $dom->loadHTML($html);
                libxml_clear_errors();
                $xpath = new \DOMXPath($dom);
                $results = [];
                foreach ($xpath->query('//a[@href]') as $link) {
                    $href = $link->getAttribute('href');
                    if (strpos($href, '/url?q=') === 0) {
                        $href = substr($href, 7, strpos($href, '&') - 7);
                        $text = $link->nodeValue;
                        $results[] = ['href' => $href, 'text' => $text];
                    }
                }
                return $results;
            } else {
                log_message('error', 'scrapeGoogleSearch: Could not retrieve content, HTTP status code - ' . $response->getStatusCode());
                return ['error' => 'Could not retrieve content, HTTP status code - ' . $response->getStatusCode()];
            }
        } catch (RequestException $e) {
            log_message('error', 'scrapeGoogleSearch: RequestException - ' . $e->getMessage());
            return ['error' => 'RequestException error: ' . $e->getMessage()];
        } catch (\Exception $e) {
            log_message('error', 'scrapeGoogleSearch: General error - ' . $e->getMessage());
            return ['error' => 'General error: ' . $e->getMessage()];
        }
        return [];
    }
    
    public function generateContentFromScrapedData($scrapedData, $platform)
    {
        $primaryContent = $this->generatePrimaryContent($scrapedData);
        $socialMediaContent = $this->generateSocialMediaContent($scrapedData);
        $generatedContent = [
            'status' => 'Generated',
            'type' => 'Promotional',
            'content' => $primaryContent,
            'social_media_content' => $socialMediaContent,
            'platform' => $platform,
            'created_on' => date("Y-m-d H:i:s"),
        ];
        $this->marketingModel->storeGeneratedContent($generatedContent);
        return $generatedContent;
    }
    
    private function generatePrimaryContent($scrapedData)
    {
        $summary = "Here is a summary of the latest updates:\n\n";
        $summary .= "Title: " . ($scrapedData['title'] ?? 'No title') . "\n";
        $summary .= "Content: " . substr($scrapedData['content'], 0, 200) . "...\n";
        $summary .= "Read more here: " . ($scrapedData['url'] ?? 'N/A') . "\n\n";
    
        return $summary;
    }
    
}
