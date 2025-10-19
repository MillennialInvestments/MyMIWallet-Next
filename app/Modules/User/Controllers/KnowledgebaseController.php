<?php
/**
 * User Support Dashboard
 * 
 * THINGS TO CREATE/FINISH:
 * 
 * KNOWLEDGE BASE PLANNING
 * 
What questions or topics do your employees or customers ask most often?
What department is overwhelmed by requests for information on a consistent basis?
What is your current response rate to employee and client questions and is that response rate getting longer?
Is productivity within your organization falling because information can’t efficiently be shared?
What serious gaps would exist if certain company employees left the organization and took their knowledge with them?
 * SUBMISSION PROCEDURES
       - Response Setup
       - Bug/Report Conversions within Response Form
       - Adjustment to topic, subject Database Fields
       - Further development of Communications Manager for other functionality in one manager
       - FAQ Development
 * KNOWLEDGEBASE CONSTRUCTION:
 *      - Header with Search Feature
        - Getting Started
 *          - Basic Setup
                - Creating A MyMI Account
 *                  - Account Type Details
 *              - KYC Verification
                    - KYC Process/Requirements                                                          Refer to following: https://www.cftc.gov/IndustryOversight/AntiMoneyLaundering/dsio_amlprograms.html
 *                  - Check KYC Status
                - Configuring Investor Profile
                    - How to update Investor Profile
                    - Investor Profile Parameters and What We Consider
            - Adding Wallets/Trades
                - Intergrating Wallets
                    - Ways to Integrate
                    - How to Manually Track Trades
                    - How to Integrate Brokerage Accounts
                - Trade History & Tracker
            - Analytical Customization
                - Trade Tracker Customization
                - Backtesting & Forecasting
 *                  - Customizable Indicators (Trade Tracker)
 *                  - Ways to Backtest Your Investments
 *                  - Trend Analysis
 *                  - Import/Exporting Real-Time & Historical Data
 *                  - Share Trade Analysis
 *                  - Get The Communnity Involved
 *                  - MyMI Trade Tracker - In-Depth Overview<
        - Types-Of-Accounts
            - Investor Account
 *              - Overview
 *              - Investor Profile & Demographics
 *              - Premium Brokerage Integrations
 *                  - List of Financial Brokerages
 *              - Investor Performance Analysis
 *                  - Initial Investor Analysis
 *                      - Risk/Reward Analysis
 *                      - Current Positioning Analysis
                - Updating Investor Profile                                                             Referred to Configuring Investor Profile
                    - How to update Investor Profile
 *              - Investor Marketplace
 *                  - Purchasing/Selling Financial Data
                - Resources & Tools
 *                  - Main Page/Description
 *                  - Accounting & Analytical Tools
                    - MyMI Wallets                                                                      Refer to Accounting & Analytical Tools KnowledgeBase
                    - Trade Tracker                                                                     Refer to Accounting & Analytical Tools KnowledgeBase
 *                  - What Are Assets                                                                   Refer to Asset Knowledge Base
                    - Asset Creator                                                                     Refer to Asset Knowledge Base
            - Partnerships
                - Partner Account
                    - Register A Partner Account
                    - KYC Verification & Policy                                                         Refer to Account / Billing Knowledge Base - KYC Verification
                    - Partner Service Agreement
                - Creating Partner Assets
                    - What are Partner Assets? 
                    - Partner Asset Creator
                    - MyMI Exchange                                                                     Refer to Exchange Knowledge Base
                    - How to Request Coin Listing                                                       Refer to Exchange Knowledge Base
                    - How Are Assets Valued?                                                            Refer to Exchange Knowledge Base
 *              - Partner Referrals
 *                  - How Partner Referrals Work? 
 *                  - Account Designation/Setup
 *                  - Reporting & Analytics 
 *                  - Revenue Distributions                                                             Refer to Account / Billing Knowledge Base - KYC Verification
            - Referral Program
                - How It Works
                    - Investor Referral
                - Get Started!
 *                  - Referral Program Application
 *                  - MyMI Existing Membership
 *                  - KYC Verification
 *                  - Terms & Agreement
                - Monthly Distributions
 *                  - Schedule of Monthly Distributions                                                 **BUILD/CREATE**
 *                  - How Distributions Are Determined                                                  **BUILD/CREATE**
 *              - KYC Verification                                                                      Refer to Account / Billing Knowledge Base - KYC Verification
 *              - Terms And Agreements                                                                  **BUILD/CREATE**
 *      - KYC Verification
            - Overview
 *              - Anti-Money Laundering Laws
                - Account Type Requirements
                    - Investor Accounts (Individual KYC)                                                                  
                        - Basic Customer Due Diligence
                            - Documentation to verify Name & Location
                    - Partner Accounts (Corporate KYC)
                        - Enhanced Customer Due Diligence
                            - Required Information/Records
                                - Registration Number/EIN
                                - Company Name
                                - Company Address
                                - Status with Secretary of State
                                - Key Management Personnel
                                - Ownership Structure & Percentage of Ownership(s)
                                - Ultimate Beneficial Owners (UBOs)                                     https://www.trulioo.com/blog/ubo 
                                - Verifying Origins of Larger Sums
 *                              - Cash Transaction Threshold Reporting
                            - Periodic Due Diligence Reviews       
                                - Is the account record up-to-date?       
                                - Do the type and amount of transactions match the stated purpose of the account?       
                                - Is the risk-level appropriate for the type and amount of transactions      
                            - Financial Services Compliance                                             https://www.trulioo.com/blog/financial-services-compliance                     
                                - US Regulations                                                                            
                                    - NDAA                                                              https://www.fincen.gov/national-defense-authorization-act   
                                    - Corporate Transparency Act (CTA)                                                             
                                    - Self-Hosted Wallet Proposal                                       https://cointelegraph.com/news/president-biden-freezes-fincen-s-proposed-crypto-wallet-regulations                                                             
                                    - Constitutional Issues                                             https://www.forbes.com/sites/benjessel/2021/01/04/the-treasurys-crypto-reporting-proposal-may-be-a-fourth-amendment-breach/?sh=57e64302a1ee                                                             
                                    - Virtual Assets Red Flag Indicators of Money Laundering            http://www.fatf-gafi.org/publications/fatfrecommendations/documents/Virtual-Assets-Red-Flag-Indicators.html                                                             
                                - UK Regulations                                                             
                                    - 5th Anti-Money Laundering Directive (5AMLD)                       https://www.sygna.io/blog/what-is-amld5-anti-money-laundering-directive-five-a-guide/                                                             
                                    - Digital Finance Package                                           https://ec.europa.eu/malta/news/digital-finance-package-commission-sets-out-new-ambitious-approach-encourage-responsible_en                                                             
                                    - Regulation on Markets in Crypto Assets                            https://eur-lex.europa.eu/legal-content/EN/TXT/?uri=CELEX:52020PC0593                                                             
 *                          - Crypto KYC Verification Requirements                                      https://www.trulioo.com/blog/kyc-crypto                       
 *                          - Expected Issues                       
 *                              - Creating Separate Accounts under Different Names        
 *                              - Initiating Transactions from Non-Trusted IP Addresses        
 *                              - Incomplete or Insufficient KYC Information        
 *                              - Customers declining rquests for KYC documents or inquiries regading the source of funds        
 *                              - Customers providing forged or falsified identity documents or photographs        
 *                              - Customers who are on watch lists        
 *                              - Customers who frequently change their identification information        
 *              - Monitoring
 *                  - KPIs
 *                      - Spikes in Activities                                                            
 *                      - Out of Area or Unusual Cross-Border Activities
 *                      - Inclusion Of People on Sanctions Lists
 *                      - Adverse Media Mentions    
 *                  - Suspicious Activity Reporting
 *                      - Report Requirements                                                        
 *                      - Report Submissions                                                        
 *      - Integrating Wallets
            -   What are Crypto Wallets?
            -   How Do MyMI Wallets Work?
 *          -   Manually Adding/Importing Trades
 *          -   Premium Brokerage Integration
            -   Resources &amp; Tools
        - Trade Tracker
            -   Overview
            -   What is the MyMI Trade Tracker
            -   How Does It Work?
 *      - Announcements
 *      - Accounting/Analytical Tools Knowledge Base
 *          -   MyMI Wallets
 *          -   Trade Tracker
 *      - Account / Billing Knowledge Base
            -   Account Information
                -   Managing Account Information
            -   Partner Integration/Setup
                -   What Is A MyMI Partner?
                -   Upgrading to a Partner
 *                  -   If New Customer                                                                 -> Partner/register
                    -   If Existing Customer                                                            -> Subscriptions
                    -   Registration Process Details
 *                  -   Required Documentation for Partnership Submission
 *              -   Verification Process/Schedule for Approval/Delivery
 *              -   Authorization & Conversion
 *              -   Activation
 *              -   Benefits of Membership
 *                  -   Shared Revenue Streams
 *                      -   Shared Transactional Revenue
            -   Referral Program Application
                -   Get Started Today!
                -   More Information
            -   KYC Verification                                                                        Refer to Account / Billing Knowledge Base - KYC Verification
                -   Individual Requirements                                                                        
                -   Corporate Requirements                                                                        
                -   More Information on KYC Requirements                                                                        
            -   Billing / Payment
                -   May We Introduce MyMI Gold?
                -   How is MyMI Gold Valued?
                -   Billing & Payment Schedule
                -   Payment History
                -   Asset Distribution                                                                 
            -   Customer Support
                -   Contact Support
 *      - Assets Knowledge Base
            -   Overview
            -   What Are Assets
                -   What Are Digital Assets?
                -   What Are MyMI Assets?
                -   Types of MyMI Assets
 *                  -   Auctionable Assets
 *                  -   Currency Assets
 *                  -   Equity Assets
 *                  -   NFT Assets
 *                  -   Reward Assets
 *                  -   Utility Assets
            -   Owning MyMI Assets
                -   How Do You Own MyMI Assets?
                -   MyMI Asset Creator
            -   MyMI Marketplace
 *              -   Purchasing Assets
                -   Listing Assets
 *                  - Private Marketplace
 *                  - Public Marketplaces
                -   How Are MyMI Assets Valued?
                -   Asset Distribution
                -   Coin Redistribution
                -   MyMI Marketplace Requirements
            -   MyMI Exchange
 *              -   Buying/Selling Assets
 *              -   Listing Assets
                -   Exchanging Assets
 *                  -   Buy/Sell/Trade Assets
 *                  -   Shared Revenue Streams
 *                      -   Shared Transactional Fees
                -   How Are Assets Purchased?
                -   What is MyMI Coin?
                -   How is MyMI Coin Valued?
                -   MyMI Exchange Requirements
            -   Asset Support
 *              -   Disputes/Balance Checks
        - MyMI Partner Knowledge Base
            -   What is a MyMI Partner?
            -   Registering/Upgrading to a Partner Membership
            -   Partnership Requirements
                -   Account Information
                    -   Individual Requirements
                    -   Corporate Requirements
                -   Periodic Due Diligence Reporting
            -   MyMI Asset Marketplace (View-File Included)
 *              -   Asset to Fiat Transfers
 *              -   Withdrawals
            -   MyMI Asset Exchange (View-File Included)
            -   Partner Support
 *              ADDITIONAL NOTES (need to minize)
 *              - Partner Account
 *                  - Register A Partner Account
 *                  - KYC Verification & Policy                                                         Refer to Account / Billing Knowledge Base - KYC Verification
 *                  - Partner Service Agreement
 *              - Creating Partner Assets
 *                  - What are Partner Assets? 
 *                  - Partner Asset Creator
 *                  - MyMI Exchange                                                                     Refer to Exchange Knowledge Base
 *                  - How to Request Coin Listing                                                       Refer to Exchange Knowledge Base
 *                  - How Are Assets Valued?                                                            Refer to Exchange Knowledge Base
 *                  - Asset Growth Forecast Overview
 *              - Partner Referrals
 *                  - How Partner Referrals Work? 
 *                  - Account Designation/Setup
 *                  - Reporting & Analytics 
 *                  - Revenue Distributions                                                             Refer to Account / Billing Knowledge Base - KYC Verification
 *          - Referral Program
 *              - How It Works
 *                  - Investor Referral
 *              - Get Started!
 *              - Monthly Distributions
 *                  - Schedule of Monthly Distributions                                                 **BUILD/CREATE**
 *                  - How Distributions Are Determined                                                  **BUILD/CREATE**
 *              - KYC Verification                                                                      Refer to Account / Billing Knowledge Base - KYC Verification
 *              - Terms And Agreements                                                                  **BUILD/CREATE**
        - Technical Support Knowledge Base
            -   Account Security
                -   Managing Account Security
            -   Bug/Reports
                -   Bug/Reports
            -   Support History
 *      - Direct Support Initiation
 *      - Discussion Forums
 * 
 * COMPLETED:
 */


namespace App\Modules\User\Controllers;

use App\Controllers\UserController; 
use App\Controllers\BaseController;
use Config\Services;
use Myth\Auth\Authorization\GroupModel;
use App\Config\{Auth, SiteSettings, SocialMedia};
use App\Models\{DashboardModel, ExchangeModel, PageSEOModel, PublicModel, SubscribeModel};
use App\Libraries\{MyMIAnalytics, MyMICoin, MyMIUser};
use CodeIgniter\API\ResponseTrait;

#[\AllowDynamicProperties]
class KnowledgebaseController extends UserController
{
    use ResponseTrait;
    protected $auth;
    protected $helpers = ['directory', 'form', 'file', 'url'];
    protected $library;
    protected $session;
    protected $socialMedia;
    protected $uri;
    protected $siteSettings;
    protected $subscribeModel;
    protected $pageSEOModel;
    protected $publicModel;
    protected $userModel;
    protected $userAccount;

    public function __construct()
    {
        $this->auth                                     = service('authentication'); // Use the 'authentication' service
        $this->session                                  = Services::session();
        $this->siteSettings                             = config('SiteSettings');
        $this->socialMedia                              = config('SocialMedia');
        $this->pageSEOModel                             = new PageSEOModel();
        $this->publicModel                              = new PublicModel();
        $this->subscribeModel                           = new SubscribeModel();
        $this->cuID                                     = $this->auth->id() ?? $this->session->get('user_id');
        $this->userAccount                              = $this->getMyMIUser()->getUserInformation($this->cuID);
    }
    // -------------------------------------------------------------------------
    // Main Blog Post Page
    // -------------------------------------------------------------------------
    public function commonData(): array {      
        $this->data = parent::commonData();     
        $this->data['reporting']                        = $this->getMyMIAnalytics()->reporting($this->cuID);
        $this->data['siteSettings']                     = $this->siteSettings;
        $this->data['socialMedia']                      = $this->socialMedia;
        $this->data['uri']                              = $this->request->getUri(); 
        $this->data['beta']                             = (string) $this->siteSettings->beta;
        $this->data['userAgent']                        = $this->request->getUserAgent();
        $this->data['date']                             = $this->siteSettings->date;
        $this->data['time']                             = $this->siteSettings->time;
        $this->data['hostTime']                         = $this->siteSettings->hostTime;
        $this->data['MyMICoinValue']                    = $this->getMyMICoin()->getCoinValue();

        // Add or merge existing $this->data with new values
        $this->data['cuID']                             = $this->cuID;
        if (!empty($userAccount['cuEmail'])) {
            $this->data['cuRole']                       = $this->userAccount['cuRole'];
            $this->data['cuUserType']                   = $this->userAccount['cuUserType'];
            $this->data['cuEmail']                      = $this->userAccount['cuEmail'];
            $this->data['cuUsername']                   = $this->userAccount['cuUsername'];
            $this->data['cuDisplayName']                = $this->userAccount['cuDisplayName'];
            $this->data['cuFirstName']                  = $this->userAccount['cuFirstName'];
            $this->data['cuMiddleName']                 = $this->userAccount['cuMiddleName'];
            $this->data['cuLastName']                   = $this->userAccount['cuLastName'];
            $this->data['cuNameSuffix']                 = $this->userAccount['cuNameSuffix'];
            $this->data['cuNameInitials']               = $this->userAccount['cuNameInitials'];
            $this->data['cuKYC']                        = $this->userAccount['cuKYC'];
            $this->data['cuDOB']                        = $this->userAccount['cuDOB'];
            $this->data['cuSSN']                        = $this->userAccount['cuSSN'];
            $this->data['cuPhone']                      = $this->userAccount['cuPhone'];
            $this->data['cuAddress']                    = $this->userAccount['cuAddress'];
            $this->data['cuCity']                       = $this->userAccount['cuCity'];
            $this->data['cuState']                      = $this->userAccount['cuState'];
            $this->data['cuCountry']                    = $this->userAccount['cuCountry'];
            $this->data['cuZipCode']                    = $this->userAccount['cuZipCode'];
            $this->data['cuMailingAddress']             = $this->userAccount['cuMailingAddress'];
            $this->data['cuEmployment']                 = $this->userAccount['cuEmployment'];
            $this->data['cuOccupation']                 = $this->userAccount['cuOccupation'];
            $this->data['cuSalary']                     = $this->userAccount['cuSalary'];
            $this->data['cuProofIdentity']              = $this->userAccount['cuProofIdentity'];
            $this->data['cuProofAddress']               = $this->userAccount['cuProofAddress'];
            $this->data['cuPublicKey']                  = $this->userAccount['cuPublicKey'];
            $this->data['cuPrivateKey']                 = $this->userAccount['cuPrivateKey'];
            $this->data['cuReferrer']                   = $this->userAccount['cuReferrer'];
            $this->data['cuReferrerCode']               = $this->userAccount['cuReferrerCode'];
        } else {
            
        }

        return $this->data;
}
 
    public function index()
    {
        $this->data['pageTitle']                        = 'MyMI Knowledgebase | MyMI Wallet | The Future of Finance';
        $this->commonData(); // Ensure this is correctly populating $this->data
        $this->renderTheme('UserModule\Views\Knowledgebase\index', $this->data);
    }

    public function accountBilling()
    {        
        $this->data['pageTitle']                        = 'Accounts and Billing | MyMI Knowledgebase | MyMI Wallet';
        $this->commonData(); // Ensure this is correctly populating $this->data
        $this->renderTheme('UserModule\Views\Knowledgebase\Account_Billing', $this->data);
    }

    public function assets()
    {        
        $this->data['pageTitle']                        = 'Assets | MyMI Knowledgebase | MyMI Wallet';
        $this->commonData(); // Ensure this is correctly populating $this->data
        $this->renderTheme('UserModule\Views\Knowledgebase\Assets', $this->data);
    }

    public function gettingStarted()
    {        
        $this->data['pageTitle']                        = 'Getting Started | MyMI Knowledgebase | MyMI Wallet';
        $this->commonData(); // Ensure this is correctly populating $this->data
        $this->renderTheme('UserModule\Views\Knowledgebase\Getting_Started', $this->data);
    }

    public function integratingWallets()
    {        
        $this->data['pageTitle']                        = 'Integrating Wallets | MyMI Knowledgebase | MyMI Wallet';
        $this->commonData(); // Ensure this is correctly populating $this->data
        $this->renderTheme('UserModule\Views\Knowledgebase\Integrating_Wallets', $this->data);
    }

    public function investorProfile()
    {        
        $this->data['pageTitle']                        = 'Investor Profile | MyMI Knowledgebase | MyMI Wallet';
        $this->commonData(); // Ensure this is correctly populating $this->data
        $this->renderTheme('UserModule\Views\Knowledgebase\Investor_Profile', $this->data);
    }

    public function KYCVerification()
    {        
        $this->data['pageTitle']                        = 'KYC Verification | MyMI Knowledgebase | MyMI Wallet';
        $this->commonData(); // Ensure this is correctly populating $this->data
        $this->renderTheme('UserModule\Views\Knowledgebase\KYC_Verification', $this->data);
    }

    public function partnerships()
    {        
        $this->data['pageTitle']                        = 'MyMI Partnerships | MyMI Knowledgebase | MyMI Wallet';
        $this->commonData(); // Ensure this is correctly populating $this->data
        $this->renderTheme('UserModule\Views\Knowledgebase\Partnerships', $this->data);
    }

    public function promotedArticles()
    {        
        $this->data['pageTitle']                        = 'Promoted Articles | MyMI Knowledgebase | MyMI Wallet';
        $this->commonData(); // Ensure this is correctly populating $this->data
        $this->renderTheme('UserModule\Views\Knowledgebase\Promoted_Articles', $this->data);
    }

    public function technicalSupport()
    {        
        $this->data['pageTitle']                        = 'Technical Support | MyMI Knowledgebase | MyMI Wallet';
        $this->commonData(); // Ensure this is correctly populating $this->data
        $this->renderTheme('UserModule\Views\Knowledgebase\Technical_Support', $this->data);
    }

    public function tradeTracker()
    {        
        $this->data['pageTitle']                        = 'Trade Tracker | MyMI Knowledgebase | MyMI Wallet';
        $this->commonData(); // Ensure this is correctly populating $this->data
        $this->renderTheme('UserModule\Views\Knowledgebase\Trade_Tracker', $this->data);
    }

    public function tutorials()
    {        
        $this->data['pageTitle']                        = 'Tutorials | MyMI Knowledgebase | MyMI Wallet';
        $this->commonData(); // Ensure this is correctly populating $this->data
        $this->renderTheme('UserModule\Views\Knowledgebase\Tutorials', $this->data);
    }

    public function typesOfAccounts()
    {        
        $this->data['pageTitle']                        = 'Type of Accounts | MyMI Knowledgebase | MyMI Wallet';
        $this->commonData(); // Ensure this is correctly populating $this->data
        $this->renderTheme('UserModule\Views\Knowledgebase\Types_Of_Accounts', $this->data);
    }

    // Additional methods...
    
    private function ensureSEOData($seoData, $pageTitle)
    {
        if (empty($seoData)) {
            $seoData = [
                'page_name' => $pageTitle,
                'page_title' => $pageTitle,
                'page_url' => current_url(),
                'page_sitemap_url' => base_url('/sitemap.xml'),
                'page_image' => base_url('/assets/images/default-seo-image.png'),
                'meta_description' => 'Default meta description for ' . $pageTitle,
                'meta_keywords' => 'default,keywords,for,' . str_replace(' ', ',', strtolower($pageTitle))
            ];
            
            $this->pageSEOModel->saveOrUpdatePageSEO($seoData);
        }
    
        return $seoData;
    }    
    
    /* end ./application/controllers/home.php */
}
