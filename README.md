# Homeowners Equity & Liquidity Plan (HELP)

A property development syndication gateway platform that connects property owners with equity to property development opportunities.

## About

HELP operates as a property research, facilitation, and development syndication gateway. We identify property development opportunities and facilitate introductions between:

- Property owners with equity
- Property owners or site holders seeking development outcomes

## Features

### Gateway System
- **Equity Participant Gateway**: For property owners with equity looking to participate in development syndicates
- **Property Owner Gateway**: For property owners or site holders seeking development outcomes
- Expression of Interest (EOI) management system

### Admin Panel (Filament)
- User management with roles and permissions
- Expression of Interest tracking
- Accounting features:
  - Statement of Financial Position
  - Statement of Comprehensive Income
  - Cash Flow Statement
- Expense tracking and categorization
- Asset management
- Branch management
- Payroll system
- Activity logging

## Technology Stack

- **Framework**: Laravel 10
- **Admin Panel**: Filament 3
- **Authentication**: Laravel Jetstream with Sanctum
- **Frontend**: Tailwind CSS
- **Database**: MySQL
- **PDF Generation**: DomPDF

## Installation

1. Clone the repository
```bash
git clone <repository-url>
cd loan-management-system-main
```

2. Install dependencies
```bash
composer install
npm install
```

3. Configure environment
```bash
cp .env.example .env
php artisan key:generate
```

4. Configure database in `.env` file

5. Run migrations
```bash
php artisan migrate
```

6. Seed database (optional)
```bash
php artisan db:seed
```

7. Build assets
```bash
npm run build
```

8. Start development server
```bash
php artisan serve
```

Visit `http://127.0.0.1:8000` to see the landing page.
Visit `http://127.0.0.1:8000/admin` to access the admin panel.

## Important Disclaimers

**HELP does not provide financial, legal, tax, or investment advice.** All decisions are at the request of the participant and by their own volition.

Independent advice from accountants and lawyers is mandatory prior to participation.

### Role Separation

Property transactions, where applicable, are coordinated by Globtek & Leasing, a licensed real estate agency. Homeowners Equity & Liquidity Plan operates separately as a property research and syndication facilitation platform.

## License

This project is licensed under the MIT License.

## Support

For support and inquiries, please contact through the admin panel or visit our website.
