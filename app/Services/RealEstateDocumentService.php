<?php namespace App\Services;

/**
 * Real Estate Document Service
 *
 * Generates institutional PDF documents:
 *  1. Louisiana Assignable Purchase Agreement & Assignment of Contract (LREC Standard)
 *  2. Lender DSCR Loan Application Package (Institutional 2-Page Memorandum)
 *
 * Lead Sponsor: Timothy Burks Incorporated, LLC.
 * Operating Managers: Timothy Burks & AnneAlicia Burks, Bossier City, Louisiana.
 */
class RealEstateDocumentService
{
    private string $storageDir;

    public function __construct()
    {
        $this->storageDir = WRITEPATH . 'uploads/real_estate_docs/';
        if (! is_dir($this->storageDir)) {
            mkdir($this->storageDir, 0755, true);
        }
    }

    /**
     * Generate Louisiana Assignable Purchase Agreement & Contract Assignment PDF.
     *
     * @param array<string, mixed> $deal
     * @param array<string, mixed> $buyer
     * @return string Path to generated PDF file
     */
    public function generateAssignmentContractPdf(array $deal, array $buyer = []): string
    {
        $filename = 'LREC_Assignment_Agreement_' . preg_replace('/[^A-Za-z0-9_-]/', '_', (string) ($deal['address'] ?? 'Property')) . '_' . date('Ymd_His') . '.pdf';
        $outputPath = $this->storageDir . $filename;

        $jsonPayload = json_encode([
            'deal'  => $deal,
            'buyer' => $buyer,
            'sponsor' => [
                'entity'    => 'Timothy Burks Incorporated, LLC.',
                'managers'  => 'Timothy Burks & AnneAlicia Burks',
                'address'   => 'Bossier City, Louisiana',
                'telephone' => '318-706-9694',
                'email'     => 'info@tbisolutions.com',
            ],
            'output_path' => $outputPath,
        ]);

        $script = ROOTPATH . 'scripts/ops/generate_assignment_contract_pdf.py';
        $cmd = 'python3 ' . escapeshellarg($script) . ' ' . escapeshellarg($jsonPayload);
        $output = [];
        $exitCode = 0;
        exec($cmd, $output, $exitCode);

        if ($exitCode !== 0 || ! file_exists($outputPath)) {
            log_message('error', 'generateAssignmentContractPdf failed: ' . implode("\n", $output));
            throw new \RuntimeException('Failed to generate Assignment Contract PDF.');
        }

        return $outputPath;
    }

    /**
     * Generate 2-Page Institutional Lender DSCR Loan Underwriting Package PDF.
     *
     * @param array<string, mixed> $deal
     * @return string Path to generated PDF file
     */
    public function generateDscrLenderPackagePdf(array $deal): string
    {
        $filename = 'DSCR_Lender_Package_' . preg_replace('/[^A-Za-z0-9_-]/', '_', (string) ($deal['address'] ?? 'Property')) . '_' . date('Ymd_His') . '.pdf';
        $outputPath = $this->storageDir . $filename;

        $jsonPayload = json_encode([
            'deal' => $deal,
            'sponsor' => [
                'entity'    => 'Timothy Burks Incorporated, LLC.',
                'managers'  => 'Timothy Burks & AnneAlicia Burks',
                'address'   => 'Bossier City, Louisiana',
                'telephone' => '318-706-9694',
                'email'     => 'info@tbisolutions.com',
            ],
            'output_path' => $outputPath,
        ]);

        $script = ROOTPATH . 'scripts/ops/generate_dscr_lender_pdf.py';
        $cmd = 'python3 ' . escapeshellarg($script) . ' ' . escapeshellarg($jsonPayload);
        $output = [];
        $exitCode = 0;
        exec($cmd, $output, $exitCode);

        if ($exitCode !== 0 || ! file_exists($outputPath)) {
            log_message('error', 'generateDscrLenderPackagePdf failed: ' . implode("\n", $output));
            throw new \RuntimeException('Failed to generate Lender DSCR Loan Package PDF.');
        }

        return $outputPath;
    }
}
