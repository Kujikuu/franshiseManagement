# Franchise Management System - AI Coding Guidelines

## Project Overview

This is a **Laravel 12-based franchise management platform** that manages multi-level franchise operations. The system handles franchisors (brand owners), franchisees (unit operators), and various support roles with comprehensive performance tracking, royalty management, and operational workflows.

### Core Business Entities
- **Users** (4 types): `admin`, `franchisor`, `franchisee`, `operator`
- **Units**: Individual franchise locations with performance metrics
- **Performance**: Revenue/sales tracking with monthly targets
- **Royalties**: Franchise fee calculations and payment tracking
- **Tasks**: Operational task management and assignments
- **Collections**: Payment collection and tracking
- **Leads**: Sales lead management
- **Technical Requests**: Support ticket system

### Tech Stack
- **Backend**: Laravel 12, PHP 8.2+
- **Frontend**: Vue.js 2.7, Bootstrap 5, Sass
- **Database**: SQLite (development), MySQL/PostgreSQL (production)
- **Authentication**: Session-based web auth + JWT API auth
- **Build Tools**: Laravel Mix, Composer, NPM
- **Development**: Laravel Boost tools, PHPUnit testing

## Architecture Patterns

### User Type Hierarchy
```php
// Core user types with specific behaviors
$user->isFranchisor()  // Owns brand, manages franchisees
$user->isFranchisee()  // Runs individual units
$user->isOperator()    // Provides operational support
$user->isAdmin()       // System administration
```

### Relationship Patterns
```php
// Franchisor → Franchisees → Units hierarchy
$franchisor->franchisees()     // Has many franchisees
$franchisor->franchisorUnits() // Has many units through franchisees
$franchisee->units()           // Has many units
$unit->franchisee()            // Belongs to franchisee
$unit->franchisor()            // Belongs to franchisor
```

### Performance Tracking
```php
// Monthly performance with targets
$unit->getPerformancePercentage() // Revenue vs monthly target
$user->getTotalRevenue()          // Aggregated from performances
$user->getPerformanceTrend()      // positive/negative/neutral
```

## Critical Workflows

### 1. Dashboard Analytics
```php
// HomeController@dashboard() - Key metrics calculation
$totalFranchisees = User::where('type', 'franchisee')->count();
$totalSales = Performance::where('metric_type', 'revenue')
    ->where('period', 'monthly')
    ->whereYear('date', now()->year)
    ->sum('value');
$monthlyRevenue = Performance::where('metric_type', 'revenue')
    ->selectRaw('MONTH(date) as month, SUM(value) as total')
    ->groupBy('month')->get();
```

### 2. Role-Based Data Access
```php
// Always filter data by user role and relationships
if ($user->isFranchisor()) {
    $units = Unit::where('franchisor_id', $user->id)->get();
} elseif ($user->isFranchisee()) {
    $units = $user->units()->get();
}
```

### 3. Unit Performance Calculations
```php
// Performance percentage against targets
public function getPerformancePercentage() {
    if ($this->monthly_target > 0) {
        return round(($this->revenue / $this->monthly_target) * 100, 2);
    }
    return 0;
}
```

## Laravel Best Practices (Inherited from Laravel Boost)

### Model Relationships & Eloquent
- **Always use Eloquent relationships** over raw queries
- **Eager load relationships** to prevent N+1 queries
- **Use relationship methods** with proper return type hints
- **Avoid `DB::` facade** - prefer `Model::query()`
- **Leverage Laravel's ORM** capabilities

### Controller Patterns
```php
// Form Request validation (always use this)
public function store(CreateUserRequest $request) {
    $user = User::create($request->validated());
    return redirect()->route('users.index');
}
```

### Authentication & Authorization
- **Use Laravel Sanctum** for API authentication
- **Implement gates/policies** for complex authorization
- **JWT for API**, session for web interface
- **Role-based middleware** for route protection

### Database Operations
```php
// Proper relationship usage
$user->franchisees()->with(['units', 'performances'])->get();

// Efficient aggregations
$totalRevenue = Performance::where('metric_type', 'revenue')
    ->whereYear('date', now()->year)
    ->sum('value');
```

## Franchise-Specific Patterns

### 1. User Model Helpers
```php
// Always use these helper methods in views
$user->getDisplayName()      // Brand name for franchisors
$user->getTotalRevenue()     // Calculated from performances
$user->getStatusBadgeClass() // Bootstrap badge styling
$user->getTypeBadgeClass()   // Role-based badge styling
```

### 2. Unit Model Calculations
```php
// Performance and financial calculations
$unit->getPerformancePercentage()
$unit->getFormattedRevenue()
$unit->getTotalRoyalties()
$unit->getPendingRoyalties()
$unit->getPerformanceTrend()
```

### 3. Dashboard Data Preparation
```php
// Always prepare chart data for frontend
$monthlyRevenue = Performance::where('metric_type', 'revenue')
    ->selectRaw('MONTH(date) as month, SUM(value) as total')
    ->groupBy('month')
    ->orderBy('month')
    ->get();
```

### 4. Status Management
```php
// Consistent status handling across models
enum Status: string {
    case ACTIVE = 'active';
    case INACTIVE = 'inactive';
    case PENDING = 'pending';
    case SUSPENDED = 'suspended';
}
```

## Development Workflow

### Build Commands
```bash
# Frontend assets
npm run dev          # Development build with hot reload
npm run production   # Production build
composer run dev     # Alternative dev build

# Database
php artisan migrate  # Run migrations
php artisan db:seed  # Seed database

# Testing
php artisan test     # Run test suite
```

### File Structure Conventions
```
app/
├── Models/          # Eloquent models with relationships
├── Http/Controllers/ # Controllers with Form Request validation
├── Services/        # Business logic services
└── Providers/       # Service providers

resources/
├── js/             # Vue.js components
├── sass/           # Stylesheets
└── views/          # Blade templates

database/
├── factories/      # Model factories for testing
├── seeders/        # Database seeders
└── migrations/     # Database schema changes
```

## View-Model Alignment

### Controller Data Preparation
- **Always load relationships** in controllers, not views
- **Calculate metrics** in controllers/models, not views
- **Format data** in models with helper methods
- **Use view composers** for shared data

### View Patterns
```blade
{{-- Use model helper methods --}}
{{ $user->getDisplayName() }}
{{ $unit->getFormattedRevenue() }}

{{-- Leverage relationships --}}
@foreach($user->franchisees as $franchisee)
    {{ $franchisee->getTotalRevenue() }}
@endforeach
```

## Testing Patterns

### Model Factories
```php
// Use factories for test data
User::factory()->franchisor()->create();
Unit::factory()->active()->create();
```

### Feature Tests
```php
// Test complete user workflows
test('franchisor can view dashboard', function () {
    $franchisor = User::factory()->franchisor()->create();
    actingAs($franchisor)
        ->get('/dashboard')
        ->assertOk();
});
```

## Performance Considerations

### Query Optimization
- **Always eager load** relationships: `->with(['franchisees', 'units'])`
- **Use select columns** when only specific data needed
- **Implement caching** for expensive calculations
- **Use database indexes** on frequently queried columns

### N+1 Query Prevention
```php
// ❌ Bad - causes N+1 queries
@foreach($franchisors as $franchisor)
    {{ $franchisor->franchisees->count() }}
@endforeach

// ✅ Good - eager load relationships
$franchisors = User::franchisor()->with('franchisees')->get();
```

## Error Handling & Validation

### Form Requests
```php
class CreateUnitRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'monthly_target' => 'nullable|numeric|min:0',
            'franchisee_id' => 'required|exists:users,id,type,franchisee',
        ];
    }
}
```

### Exception Handling
```php
try {
    $unit->update($request->validated());
    flash('Unit updated successfully')->success();
} catch (\Exception $e) {
    flash('Failed to update unit')->error();
    Log::error('Unit update failed', ['error' => $e->getMessage()]);
}
```

## Security Considerations

### Authorization Gates
```php
Gate::define('manage-unit', function (User $user, Unit $unit) {
    return $user->isFranchisor() && $unit->franchisor_id === $user->id;
});
```

### API Authentication
- **Use Sanctum tokens** for API access
- **Validate token scopes** for different operations
- **Implement rate limiting** on API endpoints

## Deployment & Environment

### Environment Variables
```env
# Database
DB_CONNECTION=sqlite
DB_DATABASE=/absolute/path/to/database/database.sqlite

# JWT Authentication
JWT_SECRET=your-jwt-secret-here
JWT_TTL=525600

# Application
APP_NAME="Franchise Management"
APP_ENV=production
APP_KEY=base64-encoded-key
```

### Build Process
```bash
# Production deployment
composer install --optimize-autoloader --no-dev
npm run production
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

## Key Reference Files

- `app/Models/User.php` - Core user model with franchise relationships
- `app/Models/Unit.php` - Unit model with performance calculations
- `app/Http/Controllers/HomeController.php` - Dashboard analytics logic
- `routes/web.php` - Route definitions with role-based grouping
- `VIEW_MODEL_ALIGNMENT_ANALYSIS.md` - Architecture documentation
- `webpack.mix.js` - Frontend build configuration
- `database/migrations/` - Database schema definitions

## Common Patterns to Follow

1. **Always check user roles** before data access
2. **Use Form Requests** for all data validation
3. **Eager load relationships** to prevent N+1 queries
4. **Calculate metrics in models** using helper methods
5. **Use Laravel's built-in auth** features (Sanctum, Gates, Policies)
6. **Format data in models**, not in views
7. **Test complete workflows**, not just individual methods
8. **Use database transactions** for multi-step operations
9. **Implement proper error handling** with user-friendly messages
10. **Cache expensive calculations** and frequently accessed data

This codebase follows Laravel best practices while implementing complex franchise management workflows. Always reference the existing patterns in the codebase before implementing new features.</content>
<parameter name="filePath">/Users/afifi/franshiseManagement/.github/copilot-instructions.md