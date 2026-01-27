#!/usr/bin/env bash
# Quick helper to check XAMPP's PHP and Xdebug presence
set -euo pipefail

XAMPP_PHP=/opt/lampp/bin/php

if [ ! -x "$XAMPP_PHP" ]; then
  echo "XAMPP PHP binary not found at $XAMPP_PHP"
  echo "If XAMPP is installed elsewhere, update this script or run: which php"
  exit 2
fi

echo "Using XAMPP PHP: $XAMPP_PHP"
"$XAMPP_PHP" -v

echo
echo "Checking loaded PHP modules for Xdebug..."
if "$XAMPP_PHP" -m | grep -iq xdebug; then
  echo "Xdebug appears to be installed and loaded." 
else
  echo "Xdebug not found in XAMPP PHP modules."
  echo "Common steps: edit the XAMPP php.ini (often /opt/lampp/etc/php.ini) and add the Xdebug configuration, then restart XAMPP."
fi

echo
echo "php --ini (for XAMPP PHP) will show the loaded configuration files:"
"$XAMPP_PHP" --ini

echo
echo "Check that /opt/lampp/htdocs/starred points to your workspace (symlink):"
if [ -L /opt/lampp/htdocs/starred ] || [ -d /opt/lampp/htdocs/starred ]; then
  ls -ld /opt/lampp/htdocs/starred
else
  echo "/opt/lampp/htdocs/starred does not exist. You can create it with:" 
  echo "  sudo ln -s \"${PWD}\" /opt/lampp/htdocs/starred"
fi

echo
echo "If you need help editing php.ini or adding Xdebug, tell me your XAMPP PHP version (run: /opt/lampp/bin/php -v) and I can provide the exact ini lines to add."
