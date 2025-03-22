#!/bin/bash

# Change to the project directory
cd "$(dirname "$0")"

# Run the cleanup command
php bin/console app:cleanup-images --days=7 