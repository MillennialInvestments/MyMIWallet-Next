<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\OpsTaskModel;

class OpsExportService
{
    private OpsTaskModel $tasks;

    public function __construct()
    {
        $this->tasks = new OpsTaskModel();
    }

    public function tasksForGrid(): array
    {
        return $this->tasks
            ->select('ops_tasks.*, ops_projects.code as project_code, ops_subprojects.code as subproject_code')
            ->join('ops_projects', 'ops_projects.id = ops_tasks.project_id', 'left')
            ->join('ops_subprojects', 'ops_subprojects.id = ops_tasks.subproject_id', 'left')
            ->orderBy('ops_tasks.updated_at', 'DESC')
            ->findAll();
    }

    public function exportTasksCsv(string $path): string
    {
        $rows = $this->tasksForGrid();
        $headers = $this->taskHeaders();

        $dir = dirname($path);
        if (! is_dir($dir)) {
            mkdir($dir, 0775, true);
        }

        $fp = fopen($path, 'wb');
        fputcsv($fp, $headers);
        foreach ($rows as $row) {
            fputcsv($fp, $this->taskRow($row));
        }
        fclose($fp);

        return $path;
    }

    public function exportWorkbookXlsx(string $path): array
    {
        if (! class_exists(\PhpOffice\PhpSpreadsheet\Spreadsheet::class)) {
            return ['ok' => false, 'error' => 'PhpSpreadsheet is not installed.'];
        }

        $dir = dirname($path);
        if (! is_dir($dir)) {
            mkdir($dir, 0775, true);
        }

        $spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setTitle('Tasks');

        $headers = $this->taskHeaders();
        $sheet->fromArray($headers, null, 'A1');

        $rowIndex = 2;
        foreach ($this->tasksForGrid() as $row) {
            $sheet->fromArray($this->taskRow($row), null, 'A' . $rowIndex);
            $rowIndex++;
        }

        $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
        $writer->save($path);

        return ['ok' => true, 'path' => $path];
    }

    private function taskHeaders(): array
    {
        return ['TaskID', 'ProjectID', 'SubprojectID', 'Area', 'Feature_Surface', 'Title', 'Acceptance', 'Status', 'Severity', 'Priority', 'Owner', 'Due_Date', 'Routes', 'Handler', 'Dependencies', 'Evidence_Link', 'Updated_UTC'];
    }

    private function taskRow(array $row): array
    {
        return [
            $row['code'] ?? '',
            $row['project_code'] ?? '',
            $row['subproject_code'] ?? '',
            $row['area'] ?? '',
            $row['feature_surface'] ?? '',
            $row['title'] ?? '',
            $row['acceptance'] ?? '',
            $row['status'] ?? '',
            $row['severity'] ?? '',
            $row['priority'] ?? '',
            $row['owner'] ?? '',
            $row['due_date'] ?? '',
            $row['routes'] ?? '',
            $row['handler'] ?? '',
            $row['dependencies'] ?? '',
            $row['evidence_link'] ?? '',
            $row['updated_utc'] ?? '',
        ];
    }
}
