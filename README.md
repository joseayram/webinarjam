[![alt text][logo]](https://www.webinarjam.com/)

[![Build Status](https://scrutinizer-ci.com/g/joseayram/webinarjam/badges/build.png?b=master)](https://scrutinizer-ci.com/g/joseayram/webinarjam/build-status/master) [![Total Downloads](https://poser.pugx.org/joseayram/webinarjam/d/total.svg)](https://packagist.org/packages/joseayram/webinarjam) [![Latest Stable Version](https://poser.pugx.org/joseayram/webinarjam/v/stable.svg)](https://packagist.org/packages/joseayram/webinarjam) [![Codacy Badge](https://api.codacy.com/project/badge/Grade/776bf90ac949481ea0d3086c0af244af)](https://www.codacy.com/manual/joseayram/webinarjam?utm_source=github.com&amp;utm_medium=referral&amp;utm_content=joseayram/webinarjam&amp;utm_campaign=Badge_Grade) [![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/joseayram/webinarjam/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/joseayram/webinarjam/?branch=master) [![License](https://poser.pugx.org/joseayram/webinarjam/license.svg)](https://packagist.org/packages/joseayram/webinarjam)

# WebinarJam API implementation for PHP >= 7.0

## About

This is a WebinarJam API implementation for PHP (>= 7.0) as documented in the **[official website](https://d3kcv4e58tsh6h.cloudfront.net/api/WebinarJamAPI.pdf)**

## Requirements

1. **PHP >= 7.0**
2. **ext-curl**


## Installation
You can add WebinarJam as a dependency using the composer CLI:
> composer require joseayram/webinarjam

Alternatively, you can specify WebinarJam as a dependency in your project's existing composer.json file:

    {
         "require": {
            "joseayram/webinarjam": "~1.0.2"
        }
    }

After installing, you need to require Composer's autoloader:
> **require** 'vendor/autoload.php';

## Usage

### Instance

    `use joseayram\WebinarJam;`

    `$webinarJam = new WebinarJam(YOUR_API_KEY);`

### Retrieve a full list of all webinars published in your account (getWebinars)

    `$webinarJam->getWebinars();`

### Get details about one particular webinar from your account (getWebinar)

    `$webinarJam->getWebinar(YOUR_WEBICODE);`

### Register a person to a specific webinar (addToWebinar)

    `$webinarJam->addToWebinar($webinarID, $firs_name, $email);`

#### Full Parameters list for this method:

|#|Parameter|Type|Required?|Default|
|--|--|--|--|--|
|1|Webinar ID|String|Yes|none|
|2|First Name|String|Yes|none|
|3|E-mail|String|Yes|none|
|4|Schedule|Integer|Yes|0|
|5|Last Name|String|No|null|
|6|Ip Address|String|No|null|
|7|Country Code|String|No|null|
|8|Phone|String|No|null|

## Credits

The package was build based on the work of [Cory Thompson](https://github.com/coryjthompson) in his [WebinarJam Gist](https://gist.github.com/coryjthompson/a13190bc3887bb5f6ae9)

## Contributing

Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

## License

WebinarJam API implementation for PHP is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
## Copyright

The WebinarJam logo, trademark and product name are property of [Genesis Digital LLC](https://genesisdigital.co).

[logo]: https://www.webinarjam.com/wj-new-footer/images/wj_logo_footer.png "WebinarJam Logo"
