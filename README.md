
```markdown
# Casino Brands App

A simple Laravel application to display and manage casino brands with Docker support.

## Quick Start

1. Clone the repo:
```bash
git clone https://github.com/yourusername/casino-brands.git
cd casino-brands
```

2. Setup environment:
```bash
cp .env.example .env
docker-compose up -d --build
```

3. Install dependencies:
```bash
docker-compose exec app composer install
docker-compose exec app php artisan key:generate
docker-compose exec app php artisan migrate --seed
docker-compose exec node npm install
docker-compose exec node npm run dev
```

4. Access the app:  
   → [http://localhost](http://localhost)

## Features

- View brands in grid or list layout
- Filter by star rating
- Mobile-friendly design
- Docker-ready development

## Key Commands

| Command | Description |
|---------|-------------|
| `docker-compose up -d` | Start containers |
| `docker-compose down` | Stop containers |
| `docker-compose exec app php artisan [cmd]` | Run Artisan commands |
| `docker-compose exec node npm [cmd]` | Run NPM commands |

## Services

- **app**: Laravel (PHP 8.2)
- **db**: MySQL
- **node**: Frontend assets
- **webserver**: Nginx

## Troubleshooting

If you get permission errors:
```bash
sudo chown -R $USER:$USER .
sudo chmod -R 775 storage bootstrap/cache
```

For port conflicts:
```bash
docker-compose down
sudo lsof -i :80
```
