## Strategy Validator


#### Introduction
---
This is a zf2 module which is mainly created to be used by Apigility. 
In fact, apigility ships with a number of validators by default and one of them is Zend\Validator\Callable.
StrategyValidator module is very similar to Callable validator in some ways but  does things slightly differently.

In Callable you will have to create an object in advance, which you may never need it. You may have difficulty passing your domain logic's dependencies to it as well since its not a Class and even if it is you would have to create an instance of it beforehand.

What I had in mind when creating this module was to solve these issues. Which was bugging me :)

By using this Validator you will only need to create your own class, resolve its dependencies in a very clean and less vague way then pass it to the StrategyValidator validator.



#### Installation
---
First you need to download this module to either manually, using git or by composer.
It is recommended to use composer, but the choice is yours.

If your are using composer, it will download the module to vendor/ directory by default.
If you are downloading manually, or cloning it using git, then you need to place it under vendor/ directory as composer does.

Then you need to add 'StrategyValidator' to your config/application.config.php file under 'modules' key.

+ For installing using composer you need to run this command in your project's root directory: 
    > `composer require "baghayi/strategy-validator:dev-master"`

+ If you want to directly clone it using git then you need to run this command under vendor/ (or wherever your modules will be loaded from) directory:
    > `git clone https://github.com/baghayi/StrategyValidator`

+ You can also download module in a zip file by clicking on 'Download ZIP' button or use this URL, then place it under vendor/ directory:
    > `https://github.com/baghayi/StrategyValidator/archive/master.zip`

Now you are ready to go.

### Usage
---
