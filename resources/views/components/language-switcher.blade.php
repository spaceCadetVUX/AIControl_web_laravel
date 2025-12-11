<div class="language-switcher">
    <div class="dropdown">
        <button class="dropdown-toggle" type="button" id="languageDropdown" data-bs-toggle="dropdown" aria-expanded="false">
            @if(current_locale() === 'vi')
                <span class="flag-icon">🇻🇳</span> <span class="lang-text">VI</span>
            @else
                <span class="flag-icon">🇬🇧</span> <span class="lang-text">EN</span>
            @endif
        </button>
        <ul class="dropdown-menu" aria-labelledby="languageDropdown">
            <li>
                <a class="dropdown-item {{ current_locale() === 'vi' ? 'active' : '' }}" 
                   href="{{ switch_locale_url('vi') }}">
                    <span class="flag-icon">🇻🇳</span> Tiếng Việt
                </a>
            </li>
            <li>
                <a class="dropdown-item {{ current_locale() === 'en' ? 'active' : '' }}" 
                   href="{{ switch_locale_url('en') }}">
                    <span class="flag-icon">🇬🇧</span> English
                </a>
            </li>
        </ul>
    </div>
</div>

<style>
.language-switcher {
    display: inline-block;
    margin-left: 15px;
}

.language-switcher .dropdown-toggle {
    background: transparent;
    border: 1px solid rgba(255,255,255,0.2);
    color: #fff;
    padding: 8px 15px;
    border-radius: 5px;
    font-size: 14px;
    cursor: pointer;
    transition: all 0.3s ease;
}

.language-switcher .dropdown-toggle:hover {
    background: rgba(255,255,255,0.1);
    border-color: rgba(255,255,255,0.4);
}

.language-switcher .flag-icon {
    font-size: 18px;
    margin-right: 5px;
}

.language-switcher .lang-text {
    font-weight: 600;
}

.language-switcher .dropdown-menu {
    min-width: 150px;
    border-radius: 8px;
    box-shadow: 0 4px 20px rgba(0,0,0,0.1);
}

.language-switcher .dropdown-item {
    padding: 10px 15px;
    transition: all 0.3s ease;
}

.language-switcher .dropdown-item:hover {
    background: #f8f9fa;
}

.language-switcher .dropdown-item.active {
    background: #34679A;
    color: #fff;
}

.language-switcher .dropdown-item.active:hover {
    background: #2a5480;
}
</style>
