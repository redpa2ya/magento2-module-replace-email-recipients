# Redpa2ya Replace Email Recipients for Magento 2 (Rer)

## How to install & upgrade Redpa2ya_Rer

### 1. Install via composer (recommend)

Run the following command in Magento 2 root folder.

#### 1.1 Install

```
composer require redpa2ya/magento2-module-replace-email-recipients
php bin/magento setup:upgrade
php bin/magento setup:static-content:deploy
```

#### 1.2 Upgrade

```
composer update redpa2ya/magento2-module-replace-email-recipients
php bin/magento setup:upgrade
php bin/magento setup:static-content:deploy
```

Run compile if your store in production mode:

```
php bin/magento setup:di:compile
```

### 2. Copy and paste

If you don't want to install via composer, you can use this way. 

- Download [the latest version here](https://github.com/redpa2ya/magento2-module-replace-email-recipients/archive/master.zip) 
- Extract `magento2-module-replace-email-recipients.zip` file to `app/code/Redpa2ya/Rer` (Make sure you created the folder `app/code/Redpa2ya/Rer` if it doesn't exist).
- Go to Magento root folder and run upgrade command line to install `Redpa2ya_Rer`:

```
php bin/magento setup:upgrade
php bin/magento setup:static-content:deploy
```

## Configuration
#### 1. On the Admin sidebar, go to STORES > Configuration
#### 2. In the left panel, expand REDPA2YA EXTENSIONS and choose Replace Email Recipients underneath.

#### 3. Click to expand the General Configuration section and do the following:
![alt text](https://i.imgur.com/VDBeYZy.png)
* **Module Enable**: choose Yes to enable this module
* **To**: The destination emails, the first is "To" email and Remaining are "Bcc" emails.

#### 4. Click Save Config
#### 5. Flush cache by the following command:
```$xslt
php bin/magento cache:flush
```



