# ProjectSymfony
# Compte Ã  rebours

ceci est le projet

## Installation

Install php with brew

```bash
brew install php  
```

Install symfony with brew

```bash
  brew install symfony-cli/tap/symfony-cli
```

Install composer 

```bash
  composer install
```

Start symfony

```bash
  symfony server:start  
```

fixture : 

```bash
composer install
php bin/console doctrine:mi:di        
php bin/console doctrine:mi:mi        
php bin/console doctrine:fixtures:load
```

Test

```bash
symfony composer req phpunit --dev
```

## Auteur

- [@Getsugo](https://github.com/Getsugo)
- [@ThomasCast3](https://github.com/ThomasCast3)
- [@EtienneRld](https://github.com/EtienneRld)
- [@VaheKri](https://github.com/VaheKri)
