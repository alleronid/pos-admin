<?php

namespace App\Http\Controllers\SuperAdmin;

use Exception;
use ZipArchive;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Artisan;

class LandingInstallController extends Controller
{


    private $filePath = [];
    private $ignoreFiles = ['.', '..']; // Example of files/folders to ignore

    /**
     * name of dir which file uplod and divide
     * @param array $mainDir
     */
    private $mainDir = 'landing';

        public function index()
        {
            return view('landing.index');
        }

    private function dividePath(): array
    {
        $data = [];
        $mainDir = $this->mainDir;
        foreach ($this->filePath as $path) {
            $divide = explode($mainDir, $path);

            if (count($divide) > 1) {
                $data[] = [
                    'dir' => $divide[1],
                    'mainDir' => base_path($divide[1]),
                    'updateDir' => $path,
                ];
            } else {
                Log::warning('Failed to divide path: ', ['path' => $path]);
            }
        }

        return $data;
    }

    public function store(Request $request)
    {
        $request->validate([
            'landing_zip_file' => 'required|mimes:zip'
        ]);

        $this->unzipAndStore();

        $filePaths = $this->getFilePath();
        foreach ($filePaths as $filePath) {
            if($filePath['dir'] === '/routes/web.php'){
                $fileLines = file($filePath['mainDir']);
                $diffFileLines = array_diff($fileLines, ["\n"]);

                $existsNeLine = $this->searchWordToGetLineNo($diffFileLines,  "Route::get('/store-dashboard', [DashboardController::class, 'index'])->name('root');\n");
                if($existsNeLine == null){
                    $lineNo = $this->searchWordToGetLineNo($diffFileLines,  "Route::get('/', [DashboardController::class, 'index'])->name('root');");
                    $fileLines[$lineNo] = "    Route::get('/store-dashboard', [DashboardController::class, 'index'])->name('root');\n";
                }

                $updatelines = file($filePath['updateDir']);
                $updatelines = array_diff($updatelines, ["\n"]);

                $i=0;

                foreach($updatelines as $key => $line){
                    $lineNo = $this->searchWordToGetLineNo($diffFileLines,  $line);

                    if($lineNo == null && $line != "<?php\n" && $line != "use Illuminate\Support\Facades\Route;\n"){
                        $fileLines[] = ($i == 0 ? "\n" : "") . $line;
                        $i++;
                    }
                }

                file_put_contents($filePath['mainDir'], implode('', $fileLines));
            }else{
                try{
                    if(file_exists(($filePath['mainDir']))){
                        $mainDir = file($filePath['mainDir']);
                        $updatDir = file($filePath['updateDir']);

                        // Iterate over the lines and compare
                        $numLines = max(count($mainDir), count($updatDir));

                        for ($i = 0; $i < $numLines; $i++) {
                            $line1 = isset($mainDir[$i]) ? rtrim($mainDir[$i]) : null;
                            $line2 = isset($updatDir[$i]) ? rtrim($updatDir[$i]) : null;

                            // Check if lines are different
                            if ($line1 !== $line2) {
                                file_put_contents($filePath['mainDir'], implode('', $updatDir));
                                break;
                            }
                        }
                    }else{
                        $directories = explode('/', $filePath['dir']);
                        $dir = base_path();
                        end($directories);
                        $lastIndex = key($directories);
                        foreach($directories as $key => $directory){
                            $dir .= '/' . $directory;
                            if(!is_dir($dir) && $lastIndex > $key){
                                mkdir($dir);
                            }
                        }
                        copy($filePath['updateDir'], $filePath['mainDir']);
                    }
                }catch(Exception $e){}
            }
        }
        shell_exec('rm -r ' . storage_path('app/public/landing'));

        Artisan::call('optimize:clear');
        return back()->withSuccess(__('File Updated Successfully'));
    }

    private function searchWordToGetLineNo(array $fileLines, $targetWord): int|null
    {
        $lastLineNumber = null;
        foreach($fileLines as $key => $line){
            if (strpos($line, $targetWord) !== false) {
                $lastLineNumber = $key;
                break;
            }
        }

        return $lastLineNumber;
    }


    public function unzipAndStore(): void
    {
        $tempFile = $_FILES['landing_zip_file']['tmp_name'];
        $fileName = $_FILES['landing_zip_file']['name'];
        $fileName = str_replace('.zip', '', $fileName);
        $dir = storage_path('app/public/');
        $zip = new ZipArchive;

        if ($zip->open($tempFile) === TRUE) {
            $zip->extractTo($dir);
            $zip->close();
        }
        if (is_dir($dir . 'landing')) {
            shell_exec('rm -r ' . $dir . 'landing');
        }
        rename($dir . $fileName, $dir . 'landing');
    }

    public function getFilePath(): array
    {
        $destination = storage_path('app/public/landing');
        $directory = scandir($destination);
        $existsDir = array_diff($directory, $this->ignoreFiles);
        foreach ($existsDir as $dirOrFile) {
            $dir = $destination . '/' . $dirOrFile;

            if (is_dir($dir)) {
                $this->scanDirectory($dir);
            } else {
                $this->filePath[] = $dir;
            }
        }

        return $this->dividePath();
    }

    public function scanDirectory($dir): void
    {
        $directory = scandir($dir);
        $existsDir = array_diff($directory, $this->ignoreFiles);

        foreach ($existsDir as $dirOrFile) {
            $path = $dir . '/' . $dirOrFile;
            if (is_dir($path)) {
                $this->scanDirectory($path);
            } else {
                if (!in_array($dirOrFile, ['AppServiceProvider.php', 'RouteServiceProvider.php'])) {
                    $this->filePath[] = $path;
                }
            }
        }
    }

    private function createDirectories($dir): void
    {
        $directories = explode('/', $dir);
        $currentDir = base_path();

        foreach ($directories as $key => $directory) {
            $currentDir .= '/' . $directory;
            if (!is_dir($currentDir)) {
                mkdir($currentDir, 0777, true);
            }
        }
    }
}
