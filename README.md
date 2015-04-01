# Get Google Image Results

This package will enable you to get the response from search query you submit to 
Google API image search service.

## Laravel 5 Support

Service Provider and Facade settings are located in your App/config/app.php.
Open that app.php file and you'll find the **Autoloaded Service Providers** and
**Class Aliases** sections.

Add this to your **Autoloaded Service Providers** section

```
'Aprillins\GoogleImageResults\Support\GoogleImageResultsServiceProvider'
```

Add this to your **Class Aliases** section
```
'GoogleImageResults' => 'Aprillins\GoogleImageResults\Support\GoogleImageResultsFacade'
```