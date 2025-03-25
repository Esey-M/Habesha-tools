#!/bin/bash

# Get the absolute path of the project
PROJECT_DIR="$( cd "$( dirname "${BASH_SOURCE[0]}" )/.." && pwd )"

# Create the cron job
CRON_JOB="0 * * * * cd $PROJECT_DIR && php bin/console app:cleanup-processed-images >> $PROJECT_DIR/var/log/cleanup.log 2>&1"

# Add the cron job
(crontab -l 2>/dev/null | grep -v "app:cleanup-processed-images"; echo "$CRON_JOB") | crontab -

echo "Cron job has been set up successfully!"
echo "The cleanup command will run every hour."
echo "Logs will be written to: $PROJECT_DIR/var/log/cleanup.log" 