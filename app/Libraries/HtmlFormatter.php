<?php
namespace App\Libraries;

#[\AllowDynamicProperties]
class HtmlFormatter
{
    public function format($html)
    {
        if (empty($html)) {
            // Handle empty HTML content gracefully
            return '';
        }

        // Load the HTML content into a DOMDocument
        $doc = new \DOMDocument();
        libxml_use_internal_errors(true);
        $doc->loadHTML($html, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        libxml_clear_errors();

        // Convert elements to Bootstrap-compatible elements
        $this->convertToBootstrap($doc);

        // Save the formatted HTML
        return $doc->saveHTML();
    }
    
    public function formatHTMLToBootstrap($html)
    {
        if (empty($html)) {
            // Handle empty HTML content gracefully
            return '';
        }

        // Load the HTML content into a DOMDocument
        $doc = new \DOMDocument();
        libxml_use_internal_errors(true);
        $doc->loadHTML($html, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        libxml_clear_errors();

        // Convert elements to Bootstrap-compatible elements
        $this->convertToBootstrap($doc);

        // Save the formatted HTML
        return $doc->saveHTML();
    }

    private function convertToBootstrap($doc)
    {
        // Define common HTML elements and their Bootstrap counterparts
        $elements = [
            'table' => 'table table-bordered',
            'img' => 'img-fluid',
            'form' => 'form-group',
            'button' => 'btn btn-primary',
            'input' => 'form-control',
            'textarea' => 'form-control',
            'select' => 'form-control',
            'nav' => 'nav nav-pills',
            'ul' => 'list-group',
            'li' => 'list-group-item'
        ];

        // Iterate through each element and add Bootstrap classes
        foreach ($elements as $tag => $class) {
            $this->addBootstrapClass($doc, $tag, $class);
        }
    }

    private function addBootstrapClass($doc, $tag, $class)
    {
        $elements = $doc->getElementsByTagName($tag);
        foreach ($elements as $element) {
            $existingClass = $element->getAttribute('class');
            $newClass = $existingClass ? "$existingClass $class" : $class;
            $element->setAttribute('class', $newClass);
        }
    }
}
