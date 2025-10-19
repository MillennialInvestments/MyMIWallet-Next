<?php
// app/Views/themes/public/layouts/metadata-information.php
// // Fetching class and method using CI4's request object
// $thisController = $pageURIA ?? null;
// $thisMethod = $pageURIB ?? null;
$thisURL = current_url();
// $thisFullURL = current_url();

// if (!empty(str_replace(['/', '-'], ['_', '_'], $thisURL))) {
//     $pageTitle = str_replace(['/', '-'], [' | ', ' '], $thisURL);
// } else {
//     $pageTitle = $pageName;
// }

// Default Values
$siteLogo = 'https://www.mymiwallet.com/assets/images/MyMI-Wallet-Logo-1024x1024.png';
$defaultImage = base_url('/assets/images/Company/MyMI-Wallet-The-Future-Of-Finance-SQ.png');
// print_r($seoData); 
if (!empty($seoData)) {
    if ($pageType === 'Automated') {
        if (empty($seoData)) {
            $page_title 		            = $seoData['page_title'];
            $page_description               = 'Experience the future of personal finance with MyMI Wallet. We provide advanced budgeting and investment portfolio management solutions, empowering individuals to better manage their finances. Streamline your financial journey with our intuitive online fintech application and service.';            
            $page_url                       = $thisURL; 
            $page_sitemap_url 	            = 'https://www.mymiwallet.com/' . $thisURL;
            $page_image 		            = $defaultImage;
            echo
            '<title>' . $page_title . '</title>
            <meta name="description" content="' . $page_description . '">
            <meta property="fb:app_id" content="272102760777052" >
            <meta property="og:type" content="website">
            <meta property="og:url" content="' . $page_url . '" >
            <meta name="twitter:url" content="' . $page_url . '">
            <link rel="canonical" href="' . $page_url . '"/>
            <meta property="og:title" content="' . $page_title . '" >
            <meta name="twitter:title" content="' . $page_title . '" >
            <meta name="image" property="og:image" content="' . $page_image . '" >
            <meta name="twitter:image:" content="' . $page_image . '" >
            <meta property="og:description" content="' . $page_description . '">
            <meta name="twitter:description" content="' . $page_description . '">      
                    
                ';
            $thisControllerChecker          = str_replace('_', '-', $thisController);
            if ($pageURIB === $thisControllerChecker) {
                $thisController             = $pageURIA . '/' . $thisController;
            }
            if ($pageURIC === $thisControllerChecker) {
                $thisController             = $pageURIA . '/' . $pageURIB . '/' . $thisController;
            }
            if ($pageURID === $thisControllerChecker) {
                $thisController             = $pageURIA . '/' . $pageURIB . '/' . $pageURIC . '/' . $thisController;
            }
            // $seoData                        = array(
            //     'page_name'                 => $pageTitle,
            //     'page_title'                => $page_title,
            //     'page_url'                  => $page_url,
            //     'page_sitemap_url'          => $page_url,
            //     'page_internal_url'         => $thisURL,
            //     'page_controller'           => $thisController,
            //     'page_controller_url'       => $thisController . '/' . $thisMethod,
            //     'page_controller_directory' => 'applications/modules/' . $thisController,
            //     'page_file_directory'       => 'applications/modules/' . $thisController . '/views',
            // );
    
            // $this->db->insert('bf_marketing_page_seo', $seoData);
            // $insert_id                      = $this->db->insert_id();
    
            // $this->db->from('bf_management_tasks'); 
            // $this->db->where('page_id', $insert_id); 
            // $checkPageStatus                = $this->db->get(); 
            // if (empty($checkPageStatus->result_array())) {
            //     $data = array(
            //         'status'                => 'Pending', // Assuming there's a status field for tasks
            //         'group'                 => 'Marketing', // Assuming tasks are assigned based on role_id
            //         'task'                  => 'Page SEO Edit',
            //         'title'                 => $page_title,
            //         'description'           => 'Complete SEO for ' . $page_url,
            //         'url'                   => $page_url,
            //         'page_id'               => $insert_id,
            //         'task_url'              => site_url('/Management/Marketing/Page-SEO/' . $insert_id),
            //     );
            //     $this->db->insert('bf_management_tasks', $data);
            // }
        } else {
            // foreach ($seoData as $pageSEO) {
                $page_title 		        = $seoData['page_title'];
                $page_description           = $seoData['page_description'] ?? 'Experience the future of personal finance with MyMI Wallet. We provide advanced budgeting and investment portfolio management solutions, empowering individuals to better manage their finances. Streamline your financial journey with our intuitive online fintech application and service.';
                $page_url 			        = $seoData['page_url'];
                $page_sitemap_url 	        = $seoData['page_sitemap_url'];
                $page_image 		        = $seoData['page_image'];
                echo
                '<title>' . $page_title . '</title>
                <meta name="description" content="' . $page_description . '">
                <meta property="fb:app_id" content="272102760777052" >
                <meta property="og:type" content="product">
                <meta property="og:url" content="'    . $page_url . '" >
                <meta name="twitter:url" content="' . $page_url . '">
                <link rel="canonical" href="'        . $page_url . '"/>
                <meta property="og:title" content="' . $page_title . '" >
                <meta name="twitter:title" content="' . $page_title . '" >
                <meta name="image" property="og:image" content="' . $page_image . '" >
                <meta name="twitter:image:" content="' . $page_image . '" >
                <meta property="og:description" content="' . $page_description . '">
                <meta name="twitter:description" content="' . $page_description . '">      
                        
                    ';
            // }
        }
    }
} else { 
    $page_title 		            = $pageTitle;
    $page_description               = 'Experience the future of personal finance with MyMI Wallet. We provide advanced budgeting and investment portfolio management solutions, empowering individuals to better manage their finances. Streamline your financial journey with our intuitive online fintech application and service.';
    $page_url 			            = $thisURL;
    $page_sitemap_url 	            = $thisURL;
    $page_image 		            = $defaultImage;
    echo
    '<title>' . $page_title . '</title>
    <meta name="description" content="' . $page_description . '">
    <meta property="fb:app_id" content="272102760777052" >
    <meta property="og:type" content="website">
    <meta property="og:url" content="' . $page_url . '" >
    <meta name="twitter:url" content="' . $page_url . '">
    <link rel="canonical" href="' . $page_url . '"/>
    <meta property="og:title" content="' . $page_title . '" >
    <meta name="twitter:title" content="' . $page_title . '" >
    <meta name="image" property="og:image" content="' . $page_image . '" >
    <meta name="twitter:image:" content="' . $page_image . '" >
    <meta property="og:description" content="' . $page_description . '">
    <meta name="twitter:description" content="' . $page_description . '">      
            
        ';
    // $thisControllerChecker          = str_replace('_', '-', $thisController);
    // if ($pageURIB === $thisControllerChecker) {
    //     $thisController             = $pageURIA . '/' . $thisController;
    // }
    // if ($pageURIC === $thisControllerChecker) {
    //     $thisController             = $pageURIA . '/' . $pageURIB . '/' . $thisController;
    // }
    // if ($pageURID === $thisControllerChecker) {
    //     $thisController             = $pageURIA . '/' . $pageURIB . '/' . $pageURIC . '/' . $thisController;
    // }
    // $seoData                        = array(
    //     'page_name'                 => $pageTitle,
    //     'page_title'                => $page_title,
    //     'page_url'                  => $page_url,
    //     'page_sitemap_url'          => $page_url,
    //     'page_internal_url'         => $thisURL,
    //     'page_controller'           => $thisController,
    //     'page_controller_url'       => $thisController . '/' . $thisMethod,
    //     'page_controller_directory' => 'applications/modules/' . $thisController,
    //     'page_file_directory'       => 'applications/modules/' . $thisController . '/views',
    // );

    // $this->db->insert('bf_marketing_page_seo', $seoData);
    // $insert_id                      = $this->db->insert_id();

    // $this->db->from('bf_management_tasks'); 
    // $this->db->where('page_id', $insert_id); 
    // $checkPageStatus                = $this->db->get(); 
    // if (empty($checkPageStatus->result_array())) {
    //     $data = array(
    //         'status'                => 'Pending', // Assuming there's a status field for tasks
    //         'group'                 => 'Marketing', // Assuming tasks are assigned based on role_id
    //         'task'                  => 'Page SEO Edit',
    //         'title'                 => $page_title,
    //         'description'           => 'Complete SEO for ' . $page_url,
    //         'url'                   => $page_url,
    //         'page_id'               => $insert_id,
    //         'task_url'              => site_url('/Management/Marketing/Page-SEO/' . $insert_id),
    //     );
    //     $this->db->insert('bf_management_tasks', $data);
    // }
}
