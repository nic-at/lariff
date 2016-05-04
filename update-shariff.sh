#!/bin/bash

git clone https://github.com/heiseonline/shariff-backend-php.git
mv shariff-backend-php/src/* src/.
rm ZendCache.php
rm -r shariff-backend-php/
rm -rf shariff-backend-php/

