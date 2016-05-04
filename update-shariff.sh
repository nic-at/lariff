#!/bin/bash

git clone https://github.com/heiseonline/shariff-backend-php.git
mv shariff-backend-php/src/* src/Shariff/.
rm src/Shariff/ZendCache.php
rm -rf shariff-backend-php/

