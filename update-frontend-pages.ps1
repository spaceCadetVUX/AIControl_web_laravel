# PowerShell script to update frontend pages with shared components
$pages = @(
    @{file="legrand.blade.php"; title="Thương hiệu Legrand | Giải pháp Smart Building & Hệ thống tích hợp | AIControl"; desc="Legrand – thương hiệu toàn cầu về giải pháp điện và hệ thống tích hợp cho Smart Building. AIControl là đối tác phân phối Legrand tại Việt Nam."; keywords="Legrand, Legrand Việt Nam, smart building, hệ thống tích hợp, điều khiển thông minh, AIControl"; canonical="https://aicontrol.vn/legrand"; og_image="https://aicontrol.vn/assets/img/seo/legrand-brand.jpg"},
    @{file="cpElectronics.blade.php"; title="CP Electronics | Giải pháp Điều khiển Chiếu sáng Tự động | AIControl"; desc="CP Electronics - chuyên gia điều khiển chiếu sáng tự động, cảm biến chuyển động và tiết kiệm năng lượng. AIControl Việt Nam phân phối CP Electronics chính hãng."; keywords="CP Electronics, điều khiển chiếu sáng, cảm biến chuyển động, tiết kiệm năng lượng, AIControl"; canonical="https://aicontrol.vn/cp-electronics"; og_image="https://aicontrol.vn/assets/img/seo/cp-electronics.jpg"},
    @{file="vantage.blade.php"; title="Vantage Controls | Hệ thống Điều khiển Cao cấp | AIControl Việt Nam"; desc="Vantage Controls - hệ thống điều khiển cao cấp cho biệt thự, resort và công trình luxury. AIControl là đối tác phân phối Vantage tại Việt Nam."; keywords="Vantage, Vantage Controls, điều khiển cao cấp, luxury automation, biệt thự thông minh, AIControl"; canonical="https://aicontrol.vn/vantage"; og_image="https://aicontrol.vn/assets/img/seo/vantage.jpg"},
    @{file="lighting_control_solutions.blade.php"; title="Giải pháp Điều khiển Chiếu sáng Thông minh | AIControl"; desc="Giải pháp điều khiển chiếu sáng thông minh tiết kiệm năng lượng đến 80% cho văn phòng, khách sạn, nhà máy. Tư vấn miễn phí từ AIControl."; keywords="điều khiển chiếu sáng, lighting control, smart lighting, tiết kiệm năng lượng, chiếu sáng thông minh"; canonical="https://aicontrol.vn/lighting-control"; og_image="https://aicontrol.vn/assets/img/seo/lighting-control.jpg"},
    @{file="hvac_control_solutions.blade.php"; title="Giải pháp Điều khiển HVAC Thông minh | AIControl"; desc="Hệ thống điều khiển HVAC thông minh tối ưu nhiệt độ, tiết kiệm năng lượng và nâng cao chất lượng không khí cho công trình thương mại."; keywords="điều khiển HVAC, HVAC control, hệ thống lạnh, tiết kiệm năng lượng, BMS"; canonical="https://aicontrol.vn/hvac-control"; og_image="https://aicontrol.vn/assets/img/seo/hvac-control.jpg"},
    @{file="security_solutions.blade.php"; title="Giải pháp An ninh & Kiểm soát Ra vào | AIControl Việt Nam"; desc="Hệ thống an ninh thông minh, kiểm soát ra vào và giám sát toàn diện cho tòa nhà thương mại, văn phòng, nhà máy."; keywords="an ninh, kiểm soát ra vào, access control, camera giám sát, security system"; canonical="https://aicontrol.vn/security"; og_image="https://aicontrol.vn/assets/img/seo/security.jpg"},
    @{file="contact-us-light.blade.php"; title="Liên hệ AIControl | Tư vấn Giải pháp Điều khiển Thông minh"; desc="Liên hệ AIControl để được tư vấn miễn phí các giải pháp điều khiển và quản lý thông minh cho công trình của bạn."; keywords="liên hệ, tư vấn, AIControl, giải pháp thông minh, automation"; canonical="https://aicontrol.vn/contact"; og_image="https://aicontrol.vn/assets/img/seo/contact.jpg"}
)

foreach ($pageInfo in $pages) {
    $filePath = "c:\Users\vusu3\Desktop\Cty\code\ai\aicontrol\resources\views\front\$($pageInfo.file)"
    
    Write-Host "Processing $($pageInfo.file)..." -ForegroundColor Yellow
    
    if (Test-Path $filePath) {
        $content = Get-Content $filePath -Raw -Encoding UTF8
        
        # Replace head section (keep SEO tags, replace CSS includes)
        $content = $content -replace '(?s)(<head>.*?)<meta charset="utf-8">.*?<link rel="stylesheet" href="\{\{ assets\(''assets/css/main\.css''\) \}\}">.*?(</head>)', 
            "`$1<title>$($pageInfo.title)</title>`n    <meta name=`"description`" content=`"$($pageInfo.desc)`">`n    <meta name=`"keywords`" content=`"$($pageInfo.keywords)`">`n    `n    <link rel=`"canonical`" href=`"$($pageInfo.canonical)`">`n    `n    <meta property=`"og:title`" content=`"$($pageInfo.title)`">`n    <meta property=`"og:description`" content=`"$($pageInfo.desc)`">`n    <meta property=`"og:url`" content=`"$($pageInfo.canonical)`">`n    <meta property=`"og:image`" content=`"$($pageInfo.og_image)`">`n    `n    @include('includes.head')`n`$2"
        
        # Replace offcanvas and header sections
        $content = $content -replace '(?s)<!-- offcanvas start -->.*?<!-- header area end -->.*?<!-- header area end -->', '@include(''includes.offcanvas'')@NEWLINE@    @include(''includes.header'')'
        
        # Replace footer and scripts
        $content = $content -replace '(?s)</main>.*?<footer>.*?</footer>.*?</body>', "@NEWLINE@            </main>@NEWLINE@@NEWLINE@            @include('includes.footer')@NEWLINE@@NEWLINE@        </div>@NEWLINE@    </div>@NEWLINE@@NEWLINE@    @include('includes.scripts')@NEWLINE@@NEWLINE@</body>"
        
        # Clean up NEWLINE markers
        $content = $content -replace '@NEWLINE@', "`n    "
        
        # Save updated content
        Set-Content $filePath $content -Encoding UTF8 -NoNewline
        Write-Host "  Updated successfully" -ForegroundColor Green
    } else {
        Write-Host "  File not found: $filePath" -ForegroundColor Red
    }
}

Write-Host ""
Write-Host "All pages updated successfully!" -ForegroundColor Cyan
