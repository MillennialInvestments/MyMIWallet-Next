#!/bin/bash

APP_PATH="/home/mymiteam/mymiwallet/site/current"
LOG_PATH="/home/mymiteam/logs/aiops_cron.log"

cd "$APP_PATH" || exit 1

/usr/bin/php spark aiops:cron:autopr >> "$LOG_PATH" 2>&1
