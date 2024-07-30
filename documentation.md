## How To

- get token : 127.0.0.1:8000/api/login (method post, form data : email:test@mail.com, password:12345678)
- store data pakaian : 127.0.0.1:8000/api/pakaian (method post, auth bearer token, body json { "jenis": "Adidas", "merk": "Adidas" })
- get data pakaian : 127.0.0.1:8000/api/pakaian (method get, auth bearer token)
- update data pakaian : 127.0.0.1:8000/api/pakaian/{id} (method put, auth bearer token, body json { "jenis": "Adidas", "merk": "Adidas" })
- update data pakaian : 127.0.0.1:8000/api/pakaian/{id} (method delete, auth bearer token)

- command display pakaian list : php artisan app:display-pakaian-data
- greeting and save log : http://127.0.0.1:8000/greetings
- only grreting : http://127.0.0.1:8000/pakaian
- get sentences : http://127.0.0.1:8000/rahman

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[WebReinvent](https://webreinvent.com/)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Jump24](https://jump24.co.uk)**
- **[Redberry](https://redberry.international/laravel/)**
- **[Active Logic](https://activelogic.com)**
- **[byte5](https://byte5.de)**
- **[OP.GG](https://op.gg)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
