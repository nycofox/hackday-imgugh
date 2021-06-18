## Imgugh Hackday Project

Made as a lightweight clone of Imgur, using S3 (in this case Minio) as a backend for storing images.

### Installation

#### Preparations

You'll need a database, an S3 compatible object storage, an SMTP server and a webserver...

#### Steps

1. Clone the github repository into a directory of your choosing

   `git clone nycofox/hackday-imgugh.git`

2. Edit the .env file and fill it out

3. Run the migrations

   `php artisan migrate`

4. Make sure the web server is configured to point at the `/public` directory.

5. ???
   
6. Profit!
