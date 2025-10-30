# PowerShell script to update all frontend pages with shared components
$pages = @(
    "abb.blade.php",
    "legrand.blade.php",
    "cpElectronics.blade.php",
    "vantage.blade.php",
    "lighting_control_solutions.blade.php",
    "hvac_control_solutions.blade.php",
    "security_solutions.blade.php",
    "contact-us-light.blade.php"
)

foreach ($page in $pages) {
    $filePath = "c:\Users\vusu3\Desktop\Cty\code\ai\aicontrol\resources\views\front\$page"
    
    Write-Host "Processing $page..." -ForegroundColor Yellow
    
    if (Test-Path $filePath) {
        # Backup original file
        Copy-Item $filePath "$filePath.backup" -Force
        Write-Host "  Backup created" -ForegroundColor Green
    } else {
        Write-Host "  File not found: $filePath" -ForegroundColor Red
    }
}

Write-Host ""
Write-Host "All backups created successfully!" -ForegroundColor Cyan
