## Strategy Validator


#### Introduction
---
This is a zf2 module which is mainly created to be used by Apigility. 
In fact, apigility ships with a number of validators by default and one of them is Zend\Validator\Callable.
StrategyValidator module is very similar to Callable validator in some ways but  does things slightly differently.

In Callable, you will have to create an object in advance, which you may never use it. You may even have difficulty passing your domain logic's dependencies to it as well since it is not a Class and even if it is you would have to create an instance of it beforehand.

What I had in mind when creating this module was to solve these issues. Which was bugging me :)

By using this Validator you will only need to create your own class, resolve its dependencies in a very clean and less vague way then pass it to the StrategyValidator validator and you're good to go.



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

This validator has already been defined to be used with Apigility and doesn't require you to do anything other than downloading this module and enablding it.

In order to use it, first you will need to create a class which is implementing  the following interface:
> StrategyValidator/Strategy/StrategyInterface.php

This interface has only one method that needs to be implemented:
> isValid($value)

It will get value that needs to be validated as its first argument. After been checked of whether or not it is valid you will need to return a `Boolean` value.

Then you need to register your class as a service in the main service manager.

It could be a factory, invokable or whatever else you want it to be. It only needs to be registered in the main service manager and not in the validator plugin manager or any other managers.


At last you need to pass the service name to the StrategyValidator validator as strategy.

StrategyValidator validstor has 2 main options.
First one like others is 'message' for specifiying a message to be shown whenever validation fails.
The second one is 'strategy' which is for specifying your strategy class. (The class you've aleady created in first step)

After registeting your class in the service manager, you need to set it as 'strategy' for the StrategyValidator validator alongside with the 'message' option.

Adding Strategy and message options in Apigility admin dashboard is pretty straightforward. As it is listed in the select box (in validations section of cource) and could be selected and specified that way.

#### In a nutshell:

+ Create a class.
+ Implement StrategyValidator/Strategy/StrategyInterface.php interface.
+ Register as a service in the main service manager.
+ Pass service name as 'strategy' option to validator.
+ Set 'message' option alongside 'strategy'.

That's pretty much it.
Hope it could have any use.