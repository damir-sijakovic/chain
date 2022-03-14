# Dsijak Hook

Basically, does what WP hooks do. Without any unnecessary overcomplicated features.
You assign functions to specific key string and later when you call that key
all functions are executed in order you set with priority argument.

### Install

        composer require dsijak/hook

### Usage

#### Add functions to keyword 'alpha':

        
dsijak\hook('alpha', function(){ print "<h1>hello alpha!</h1>";}, 1);
dsijak\hook('alpha', function(){ print "<h2>hello alpha!</h2>";}, 2);

        
#### Call keyword 'alpha':

	dsijak\hook('alpha');

#### Get number of 'hooks':

    dsijak\hook();
     
### Licence
MIT
