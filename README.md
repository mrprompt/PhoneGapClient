InPhonex PhoneGap Build Client
================================

## Configuration
To configure application, you do get keys on https://build.phonegap.com/people/edit#show-client

## Install
After download the composer, run:

```
composer.phar install --prefer-dist -o
```

## Usage
To see a list of commands, run application without params:
```
./application.php help
```

## Commands
```
 builder:applications   List all applications on builder
 builder:authorize      Retrieve an access token
 builder:build          Build application
 builder:create         Create application
 builder:delete         Delete an application
 builder:download       Download an application
 builder:pack           Create a zip package from source directory
 builder:status         Retrieve status from an application
 builder:update         Update application
```

## Build Status
[![Build Status](https://travis-ci.org/InPhonex/PhoneGapClient.svg?branch=master)](https://travis-ci.org/InPhonex/PhoneGapClient)
[![SensioLabsInsight](https://insight.sensiolabs.com/projects/62289953-802d-4de8-ae0c-3ecf69ae48a6/mini.png)](https://insight.sensiolabs.com/projects/62289953-802d-4de8-ae0c-3ecf69ae48a6)
