# Habesha Tools - Image Processing Suite

A professional image processing suite that includes background removal and logo/watermark removal tools. Built with Symfony and Python.

## Features

- Background Removal: Remove backgrounds from images using AI-powered technology
- Logo/Watermark Removal: Remove logos and watermarks from images
- User-friendly interface
- Automatic file cleanup
- Google AdSense integration for monetization

## Requirements

- PHP 8.2 or higher
- Python 3.8 or higher
- MySQL 8.0 or higher
- Composer
- Node.js and npm (for asset compilation)

## Installation

1. Clone the repository:
```bash
git clone https://github.com/yourusername/habesha-tools.git
cd habesha-tools
```

2. Install PHP dependencies:
```bash
composer install
```

3. Install Python dependencies:
```bash
cd scripts
python3 -m venv venv
source venv/bin/activate  # On Windows: venv\Scripts\activate
pip install -r requirements.txt
```

4. Configure your environment:
```bash
cp .env .env.local
# Edit .env.local with your configuration
```

5. Create the database:
```bash
php bin/console doctrine:database:create
php bin/console doctrine:schema:create
```

6. Create upload directory:
```bash
mkdir -p public/uploads
chmod 777 public/uploads
```

7. Compile assets:
```bash
npm install
npm run build
```

## Deployment

### Free Hosting Options

1. **Heroku**
   - Create a Heroku account
   - Install Heroku CLI
   - Deploy using Git:
   ```bash
   heroku create your-app-name
   git push heroku main
   ```

2. **InfinityFree**
   - Create an account on InfinityFree
   - Upload files via FTP
   - Configure your domain

3. **000webhost**
   - Create an account on 000webhost
   - Use Git deployment or manual upload
   - Configure your domain

### Setting up Google AdSense

1. Create a Google AdSense account
2. Add your website to AdSense
3. Get your AdSense client ID and ad slot
4. Update the `.env` file with your AdSense credentials:
```
GOOGLE_ADSENSE_CLIENT_ID=your_client_id_here
GOOGLE_ADSENSE_SLOT=your_ad_slot_here
```

### Cron Jobs

Set up the following cron jobs for maintenance:

```bash
# Clean up old images (daily)
0 0 * * * php /path/to/your/project/scripts/cleanup_images.php

# Optimize database (weekly)
0 0 * * 0 php /path/to/your/project/bin/console doctrine:schema:update --force
```

## Monetization Strategies

1. **Google AdSense**
   - Place ads in strategic locations
   - Use responsive ad units
   - Follow AdSense policies

2. **Premium Features**
   - Offer higher resolution downloads
   - Batch processing
   - API access

3. **Affiliate Marketing**
   - Promote image editing software
   - Photography equipment
   - Stock photo websites

## Maintenance

1. Regular updates:
```bash
composer update
npm update
pip install -r requirements.txt --upgrade
```

2. Clear cache:
```bash
php bin/console cache:clear
```

3. Monitor logs:
```bash
tail -f var/log/dev.log
```

## Security

1. Keep dependencies updated
2. Use HTTPS
3. Implement rate limiting
4. Regular backups
5. Monitor for suspicious activity

## Support

For support, please create an issue in the GitHub repository or contact the maintainers.

## License

This project is licensed under the MIT License - see the LICENSE file for details. 