# Lariff is integrated Shariff for Laravel 5
[![Dependency Status](https://www.versioneye.com/user/projects/5729f39ba0ca35004baf83dd/badge.svg?style=flat)](https://www.versioneye.com/user/projects/5729f39ba0ca35004baf83dd)
## Shariff
Shariff is used to determine how often a page is shared in social media, but without generating requests from the displaying page to the social sites.....
[more - project link](https://github.com/heiseonline/shariff-backend-php)

## Lariff
Lariff is mostly inspiered by [Cedricziel - L5Shariff](https://github.com/cedricziel/l5-shariff/)
but we do not use Shariff as Composer depentency.
We was include this package directly because Shareiff is required a bunch of ZendFramework
dependency`s we do not need and wont have in our vendor directory.
All ZendFramework dependency's wos replaced by Laravel equivalents.

### Installation
```bash
composer require nicat/lariff
```

Append Lariff Service Provider to your Application `app.php`
```php
    /*
     * Application Service Providers...
     */
    ...
    Nicat\Lariff\LariffServiceProvider::class
```

Use in your view after yout installed an configured [shariff social media buttons](https://github.com/heiseonline/shariff)
```html
<div class="shariff" data-backend-url="{{ route('lariff') }}" data-url="http://www.nic.at" data-theme="grey" data-orientation="vertical" data-services="[&quot;whatsapp&quot;,&quot;xing&quot;,&quot;twitter&quot;,&quot;facebook&quot;,&quot;googleplus&quot;,&quot;linkedin&quot;]"></div>
```

#### Install Shariff Social Media Buttons CSS/JS
There a multiple ways npm,bower or simple download please view for details [Shariff](https://github.com/heiseonline/shariff)


### Special Thanks too
Cedricziel for [L5Shariff](https://github.com/cedricziel/l5-shariff/)