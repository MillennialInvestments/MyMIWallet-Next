<?php
namespace App\Services;

use App\Libraries\{BaseLoader, SafeProcess};
use CodeIgniter\HTTP\CURLRequest;
use Exception;

class PythonService
{

    private $pythonPath;
    private $flaskUrl;

    /**
     * Constructor to set up paths and URLs
     *
     * @param string $pythonPath - Path to the Python executable.
     * @param string $flaskUrl - URL of the Flask microservice, if used.
     */
    public function __construct($pythonPath = '/usr/bin/python3', $flaskUrl = 'http://127.0.0.1:5000')
    {
        $this->pythonPath = $pythonPath;
        $this->flaskUrl = $flaskUrl;
    }

    /**
     * Execute a Python script directly via shell.
     *
     * @param string $scriptPath - Path to the Python script.
     * @param array $args - Array of arguments for the Python script.
     * @return string - Output from the Python script.
     * @throws Exception
     */
    public function runScript($scriptPath, $args = [])
    {
        $command = array_merge([$this->pythonPath, $scriptPath], array_map('strval', $args));
        $result = SafeProcess::run($command, [$this->pythonPath]);

        if ($result['exitCode'] !== 0) {
            throw new Exception('Python script failed: ' . $result['stderr']);
        }

        return trim($result['stdout']);
    }

    /**
     * Call a Flask endpoint and get JSON response.
     *
     * @param string $endpoint - Endpoint route in the Flask app.
     * @param array $data - Data to send with the request.
     * @param string $method - HTTP method (POST or GET).
     * @return array - Decoded JSON response from Flask.
     * @throws Exception
     */
    public function callFlaskService($endpoint, $data = [], $method = 'POST')
    {
        $curl = service('curlrequest');

        $options = [
            'json' => $data
        ];

        try {
            $response = $curl->request(strtoupper($method), "{$this->flaskUrl}/$endpoint", $options);
            $responseData = json_decode($response->getBody(), true);

            if (json_last_error() !== JSON_ERROR_NONE) {
                throw new Exception('Failed to decode JSON response from Flask.');
            }

            return $responseData;
        } catch (Exception $e) {
            throw new Exception("Error calling Flask service: " . $e->getMessage());
        }
    }

    /**
     * Execute a Python script and save its output to a file.
     *
     * @param string $scriptPath - Path to the Python script.
     * @param string $outputFile - Path where output should be saved.
     * @param array $args - Array of arguments for the Python script.
     * @return string - Path to the output file.
     * @throws Exception
     */
    public function runScriptToFile($scriptPath, $outputFile, $args = [])
    {
        $command = array_merge([$this->pythonPath, $scriptPath], array_map('strval', $args));
        $result = SafeProcess::run($command, [$this->pythonPath]);

        $content = $result['stdout'];
        if ($result['stderr'] !== '') {
            $content .= PHP_EOL . $result['stderr'];
        }

        file_put_contents($outputFile, $content);

        if ($result['exitCode'] !== 0) {
            throw new Exception("Python script failed to execute. Check {$outputFile} for details.");
        }

        return $outputFile;
    }

    /**
     * Read data from a file created by Python.
     *
     * @param string $filePath - Path to the file created by Python.
     * @return string - Contents of the file.
     * @throws Exception
     */
    public function readFileOutput($filePath)
    {
        if (!file_exists($filePath)) {
            throw new Exception("File not found: {$filePath}");
        }

        $contents = file_get_contents($filePath);
        if ($contents === false) {
            throw new Exception("Failed to read file: {$filePath}");
        }

        return trim($contents);
    }

    /**
     * Write data to a temporary file for Python to read.
     *
     * @param string $data - Data to write.
     * @return string - Path to the temporary file.
     * @throws Exception
     */
    public function writeTempFile($data)
    {
        $filePath = tempnam(sys_get_temp_dir(), 'pydata_');
        if (file_put_contents($filePath, $data) === false) {
            throw new Exception("Failed to write data to temp file: {$filePath}");
        }

        return $filePath;
    }

    /**
     * Delete a temporary file after processing.
     *
     * @param string $filePath - Path to the file.
     * @return bool - True on success, False on failure.
     */
    public function deleteTempFile($filePath)
    {
        return file_exists($filePath) ? unlink($filePath) : false;
    }

    /**
     * Example method to demonstrate combining all steps for Python integration.
     *
     * @param string $scriptPath - Path to the Python script.
     * @param array $args - Arguments for the script.
     * @return string - Processed output.
     * @throws Exception
     */
    public function runFullProcess($scriptPath, $args = [])
    {
        // Step 1: Write data to a temp file if needed
        $tempFile = $this->writeTempFile(json_encode($args));

        // Step 2: Run the Python script with the temp file as an argument
        $outputFile = sys_get_temp_dir() . '/output_' . uniqid() . '.txt';
        $this->runScriptToFile($scriptPath, $outputFile, [$tempFile]);

        // Step 3: Read the output file
        $output = $this->readFileOutput($outputFile);

        // Step 4: Clean up temporary files
        $this->deleteTempFile($tempFile);
        $this->deleteTempFile($outputFile);

        return $output;
    }
}
