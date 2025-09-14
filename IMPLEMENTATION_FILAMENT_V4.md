# Filament PHP v4 Implementation Guide

Purpose: a clear, opinionated checklist and reference to migrate this Laravel 12 franchise management app to Filament PHP v4.

Contents
- Quickstart (install + publish)
- Filament auth & gating
- Scaffold resources (what to create first)
- Dashboard & widgets
- UI & assets
- Full app mapping: models, controllers, views -> Filament resources/pages/widgets
- Policies, navigation and role rules
- Actions, notifications, and integrations
- Testing, build and deployment
- Troubleshooting & FAQ
- Final checklist

Quickstart
1. Install Filament and core packages:

```bash
composer require filament/filament:"^4.0" --with-all-dependencies
composer require filament/forms filament/tables
composer require filament/notifications --with-all-dependencies
```

2. Publish assets/config/translations:

```bash
php artisan vendor:publish --tag=filament-config
php artisan vendor:publish --tag=filament-assets
php artisan vendor:publish --tag=filament-translations
```

3. Optional (installer):

```bash
php artisan filament:install
```

Filament auth & gating
- Filament uses the `web` guard by default. Confirm `config/auth.php` maps `users` provider to `App\\Models\\User::class`.
- Add a `viewFilament` gate in `app/Providers/AuthServiceProvider.php`:

```php
use Illuminate\\Support\\Facades\\Gate;

public function boot()
{
    // ...existing code...

    Gate::define('viewFilament', function (\\App\\Models\\User $user) {
        return $user->isAdmin();
    });
}
```

- In `config/filament.php` ensure the `auth` section points to the correct guard/provider if you use custom names.

Scaffold resources (recommended order)
1. `UserResource` (admin + roles)
2. `UnitResource` (unit overview + relations)
3. `PerformanceResource` (metrics + charts)
4. `RoyaltyResource` (financial workflows)
5. `CollectionResource`
6. `TaskResource`
7. `TechnicalRequestResource`
8. `LeadResource`
9. `AssociateResource`
10. `AccountResource`
11. `PlanResource`
12. `NotificationResource`
13. `SettingsPage` (site settings)

Commands examples:

```bash
php artisan make:filament-resource User --generate
php artisan make:filament-resource Unit --generate
```

Dashboard & widgets
- Create a Filament `Dashboard` page and add widgets for:
  - Monthly revenue (chart)
  - Total franchisees (stat)
  - Units below target (table or stat)
  - Pending royalties / collections
- Reuse queries in `app/Http/Controllers/HomeController.php` to ensure parity.

UI & assets
- Filament uses Tailwind; merge/copy branding styles into `resources/css` or adapt your build.
- Run `npm install` and `npm run dev` (or `production`) after publishing assets.

Full app mapping

Below is a concrete mapping of existing files to Filament constructs so no feature is missed.

Models (`app/Models`) -> recommended Filament Resource / Page
- `Account.php` -> `AccountResource` (transaction list, balances)
- `Associate.php` -> `AssociateResource` (link to `Unit`/`User`)
- `Collection.php` -> `CollectionResource` (mark paid/refund actions)
- `Lead.php` -> `LeadResource` (status, assignment)
- `Notification.php` -> `NotificationResource` + Filament notifications
- `Performance.php` -> `PerformanceResource` + Charts/Widgets
- `Plan.php` -> `PlanResource` (assignments)
- `Royalty.php` -> `RoyaltyResource` (approve/reject, create collection)
- `Settings.php` -> `SettingsPage` (singletons prefer Page)
- `Task.php` -> `TaskResource` (assignment, states)
- `TechnicalRequest.php` -> `TechnicalRequestResource` (ticket workflow)
- `Unit.php` -> `UnitResource` (detail page with widgets)
- `User.php` -> `UserResource` (roles, filters, badges)

Controllers (`app/Http/Controllers`) -> logic to migrate
- `HomeController` -> Filament `Dashboard` page (copy queries)
- `UserController` -> `UserResource` (move logic into resource actions)
- `UnitController` -> `UnitResource` and `UnitDetail` Page
- `PerformanceController` -> `PerformanceResource` + Charts
- `RoyaltyController` -> `RoyaltyResource` actions
- `CollectionController` -> `CollectionResource` actions
- `TaskController` -> `TaskResource` actions
- `TechnicalRequestController` -> `TechnicalRequestResource`
- `LeadController` -> `LeadResource`
- `AccountController` -> `AccountResource`
- `AssociateController` -> `AssociateResource`
- `PlanController` -> `PlanResource`
- `NotificationController` -> `NotificationResource` and Filament notifications
- `BusinessController` -> Filament Page(s) for franchisor overview

Views (`resources/views`) -> Filament Pages/Widgets
- `resources/views/dashboard/*.blade.php` (associates, leads, myfranchise, performance, profile, royalty, single_unit, tasks, technical_requests, units, users)
  - Migrate these to Filament Pages and Widgets. Example: `single_unit.blade.php` -> `UnitDetail` Page with widgets: PerformanceChart, RecentTasks, Royalties.
- `resources/views/auth/*` -> leave as-is or integrate admin guard with Filament
- `resources/views/layouts/*` -> Filament uses its layout; copy brand fragments (logo, profile_button) into Filament navigation/components

Policies, navigation and role rules
- Use existing user helpers: `isAdmin()`, `isFranchisor()`, `isFranchisee()`, `isOperator()`.
- Implement policies for models (e.g., `UnitPolicy`, `RoyaltyPolicy`) via `php artisan make:policy` and register in `AuthServiceProvider`.
- Control resource visibility using `public static function canViewForNavigation(): bool` inside each Resource.

Actions, notifications, and integrations
- Implement existing controller actions as Resource Actions. Examples:
  - `ApproveRoyaltyAction` — mark royalty approved and create `Collection` entry
  - `MarkCollectionPaidAction` — mark `Collection` as paid and update `Royalty`
  - `AssignLeadAction` — assign `Lead` to a `User`
- Use `filament/notifications` for in-app notices.
- Call service classes or existing controller methods from Resource Actions to reuse business logic and validations.

Testing, build and deployment
- Local dev: `php artisan serve`, `npm run dev`.
- Production: `npm run production`, `composer install --optimize-autoloader --no-dev`, `php artisan config:cache`, `php artisan route:cache`, `php artisan view:cache`.

Troubleshooting & FAQ
- 403 on Filament pages: check `viewFilament` gate and `config/filament.php` auth settings.
- Missing assets: re-run `vendor:publish --tag=filament-assets` and rebuild assets.
- N+1 queries: override `getEloquentQuery()` in Resource to eager load relationships.

Final checklist
- [ ] Install packages & publish assets
- [ ] Configure auth & create `FilamentAdminSeeder`
- [ ] Create resources for all models listed under "Full app mapping"
- [ ] Implement policies and register gates
- [ ] Implement Resource Actions to match controller workflows
- [ ] Create Dashboard page and key widgets
- [ ] Migrate views to Pages/Widgets where needed
- [ ] Test role-based navigation and actions
- [ ] Build production assets and deploy

If you want, I will now scaffold the first four resources: `User`, `Unit`, `Performance`, `Royalty` and add the `FilamentAdminSeeder` plus the `viewFilament` gate. Tell me to proceed and I'll implement them step-by-step.

---

**Full app feature mapping (models, controllers, views)**

To ensure every feature is covered by Filament resources, policies, or pages, map the existing app files to Filament equivalents. The app includes the following models and controllers which should each have a corresponding Filament Resource, Page, or Widget where appropriate.

- Models (in `app/Models`):
    - `Account` — financial account records. Create `AccountResource` and include columns for balances, related `Unit` and transaction history.
    - `Associate` — associates linked to units/franchisees. Create `AssociateResource` with `BelongsToSelect` to `Unit`/`Franchisee`.
    - `Collection` — payment collections. Create `CollectionResource` and actions to mark as paid/refund.
    - `Lead` — sales leads. Create `LeadResource` with statuses, assignment to users, and timeline fields.
    - `Notification` — existing notifications. Map to Filament notifications and create `NotificationResource` for history.
    - `Performance` — monthly performance records. Create `PerformanceResource` and Filament Charts/Widgets for dashboards.
    - `Plan` — pricing/plan records. Create `PlanResource` (CRUD + assign to franchisors/units).
    - `Royalty` — royalty calculation and payment tracking. Create `RoyaltyResource` with actions to approve/reject and to create collection entries.
    - `Settings` — application settings. Create a `SettingsPage` or `SettingsResource` for site-wide configs.
    - `Task` — operational tasks. Create `TaskResource` with assignment, status, and comments.
    - `TechnicalRequest` — support tickets. Create `TechnicalRequestResource` with status workflows.
    - `Unit` — franchise units. Create `UnitResource` with relationship columns and performance metrics.
    - `User` — users (`admin`, `franchisor`, `franchisee`, `operator`). Create `UserResource`, policy and custom forms for role-specific fields.

- Controllers (map to Filament Resources/Pages):
    - `AccountController` -> `AccountResource` and Dashboard widgets
    - `AssociateController` -> `AssociateResource`
    - `BusinessController` -> Filament Page(s) for franchisor business overview
    - `CollectionController` -> `CollectionResource` with Actions
    - `HomeController` -> Filament `Dashboard` Page (migrate dashboard queries)
    - `LeadController` -> `LeadResource`
    - `NotificationController` -> `NotificationResource` and Filament notifications
    - `PerformanceController` -> `PerformanceResource` + Charts
    - `PlanController` -> `PlanResource`
    - `RoyaltyController` -> `RoyaltyResource`
    - `TaskController` -> `TaskResource`
    - `TechnicalRequestController` -> `TechnicalRequestResource`
    - `UnitController` -> `UnitResource`
    - `UserController` -> `UserResource`

- Views (map to Filament Pages/Pages + Widgets):
    - `resources/views/dashboard/*.blade.php` — these views represent the main app UI for features: `associates`, `leads`, `myfranchise`, `performance`, `profile`, `royalty`, `single_unit`, `tasks`, `technical_requests`, `units`, `users`.
        - Migrate the logic from these blade templates to Filament Pages (`app/Filament/Pages`) and Widgets. For detail pages like `single_unit.blade.php`, create a `UnitDetail` Filament Page with related `Performance` and `Royalty` widgets.
    - `resources/views/auth/*` — retain login/registration if used; Filament uses the `web` guard for admin login. Ensure routes do not conflict.
    - `resources/views/layouts/*` — Filament has its own layout and design system; copy any brand assets and update templates to match Filament theme where necessary.

Guidance to ensure feature parity
- For each controller action that returns model lists, filters, or custom queries, implement the same query logic in the corresponding Resource `getEloquentQuery()` and Resource `table()` filters or in Page widgets.
- For user-type specific UIs (franchisor vs franchisee), create separate Filament navigation groups and resource visibility checks using `canViewForNavigation()` and policy methods.
- Recreate complex per-unit dashboards (e.g., `single_unit`) as Filament Pages composed of multiple Widgets: Performance chart, Recent Transactions, Pending Tasks, Pending Royalties.
- Implement resource actions for existing controller actions that change state (e.g., approve royalty, mark collection paid, assign lead). Use `Tables\Actions\Action::make()` and wire to Resource `Action` classes.
- For API endpoints or JWT-protected actions, leave API controllers untouched; if you want Filament to trigger the same behavior, call existing controller logic from Filament Actions or Services to avoid duplicating business rules.

Migration verification checklist (feature-focused)
- [ ] Each model has a Filament Resource or Page covering CRUD and important list/detail views.
- [ ] Dashboard pages replicate `HomeController` metrics and the blade `dashboard` views.
- [ ] Role-based navigation and policies map to existing `isAdmin()`, `isFranchisor()`, `isFranchisee()`, `isOperator()` helpers.
- [ ] Notifications appear in Filament (in-app + email if configured).
- [ ] Actions (royalty approval, mark collection paid, task assignment) are available as Resource actions.
- [ ] Views with heavy JS (charts, maps) have equivalent Filament Widgets or Livewire components.

If you want, I can now scaffold all the Filament Resources for the models listed above and create a `Dashboard` page that reproduces `HomeController@dashboard()` metrics. Which resources should I scaffold first? (I recommend starting with `User`, `Unit`, `Performance`, and `Royalty`).
