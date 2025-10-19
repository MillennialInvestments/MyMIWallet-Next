<?php
// app/Helpers/content_helper.php

if (!function_exists('formatProcurementTextAsHtml')) {
    function formatProcurementTextAsHtml(string $text): string
    {
        $text = preg_replace('/=\r?\n|\r|\n|=3D/', ' ', $text);
        $text = strip_tags($text);
        $text = preg_replace('/\s+/', ' ', $text);
        $blocks = preg_split('/\*\*|\*/', $text);

        $html = '<div class="text-break">';
        foreach ($blocks as $block) {
            $block = trim($block);
            if (stripos($block, 'Title:') !== false || stripos($block, 'Notice') !== false) {
                $html .= '<p><strong>' . esc($block) . '</strong></p>';
            } else {
                $html .= '<p>' . esc($block) . '</p>';
            }
        }
        $html .= '</div>';
        return $html;
    }
}
if (!function_exists('format_summary_preview')) {
    function format_summary_preview(string $rawText, int $maxLength = 300): string
    {
        $cleaned = preg_replace('/=\r?\n|\r|\n|=3D/', ' ', $rawText);
        $cleaned = preg_replace('/\s+/', ' ', $cleaned);
        $cleaned = strip_tags($cleaned);

        if (stripos($cleaned, 'Procurement Notices:') !== false || stripos($cleaned, '*Title:') !== false) {
            return formatProcurementTextAsHtml($cleaned);
        }

        $preview = mb_strlen($cleaned) > $maxLength
            ? mb_substr($cleaned, 0, $maxLength) . '...'
            : $cleaned;

        return '<p>' . esc($preview) . '</p>';
    }
}
?>
