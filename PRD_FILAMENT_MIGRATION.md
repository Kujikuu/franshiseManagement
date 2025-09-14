Product Requirements Document (PRD): Filament v4 Migration

Project: Migrate Franchise Management App (Laravel 12) to Filament PHP v4
Author: (auto-generated)
Date: 2025-09-15

Overview
-------
Objective: Replace/augment the current admin/user web interface with Filament PHP v4 admin panel components to provide a faster, more maintainable, and consistent admin UX for franchisors, franchisees, and operators while preserving existing business logic and APIs.

Goals
-----
- Provide a unified admin console built on Filament v4 for all internal admin workflows.
- Reuse existing Eloquent models, controllers, and service logic; avoid duplicating business rules.
- Improve discoverability and consistency of features (Users, Units, Performance, Royalties, Collections, Tasks, Leads, Technical Requests, Notifications, Settings).
- Add role-based visibility and actions reflecting `admin`, `franchisor`, `franchisee`, `operator` roles.
- Deliver migration with minimal disruption to current APIs and external integrations.

Success metrics
---------------
- 100% of administrative CRUD operations available in Filament resources or pages.
- Dashboard metrics match current `HomeController` outputs within 1% variance.
- Less than two regressions reported in the first two weeks after rollout.
- Authentication and role-based access unchanged for external API flows.

User roles and personas
-----------------------
- System Admin (`admin`)
  - Goals: Manage users, global settings, monitor system health.
  - Features: Full CRUD across resources, access to all dashboards and reports.

- Franchisor (`franchisor`)
  - Goals: Monitor franchisee performance, approve royalties, manage plans.
  - Features: Browse franchisee list, unit performance, royalty approvals.

- Franchisee (`franchisee`)
  - Goals: View unit performance, submit collections and tasks.
  - Features: Unit dashboard, performance charts, submit technical requests and tasks.

- Operator (`operator`)
  - Goals: Manage operational tasks, resolve technical requests, support franchisee operations.
  - Features: Task list, assign tasks, update statuses, manage technical requests.

User flows
----------
1. Admin: Login -> Dashboard -> Users -> Create/Update User -> Assign Role -> Logout
2. Franchisor: Login -> Dashboard -> Units -> View Unit -> Approve Royalty -> Create Plan
3. Franchisee: Login -> My Units -> View Performance -> Submit Collection -> Raise Technical Request
4. Operator: Login -> Tasks -> Accept Task -> Mark Complete -> Notify Franchisee

Detailed user flow: Approve Royalty (Franchisor)
- Franchisor logs in to Filament.
- Navigates to the `Royalties` resource under their navigation.
- Filters royalties by `pending` status.
- Selects a royalty entry, reviews calculated amounts and associated `Unit` performance.
- Clicks `Approve` action (Resource Action). Backend creates a `Collection` entry, updates `Royalty` status to `approved`, triggers a notification to the franchisee.

User stories and acceptance criteria
-----------------------------------
(organized by priority)

P0 - Authentication & Admin Access
- Story: As an Admin, I want to access the Filament admin panel so I can manage resources.
  - Acceptance: Admins can log in via existing credentials and access `admin` resources. Non-admins attempting Filament receive 403.

P0 - User Management
- Story: As an Admin, I want to create, edit, and delete users.
  - Acceptance: `UserResource` supports create/read/update/delete; roles are editable and displayed as badges.

P0 - Unit Management & Performance
- Story: As a Franchisor, I want to view units and their performance against monthly targets.
  - Acceptance: `UnitResource` displays monthly target, revenue, performance percentage; performance charts available in Unit detail page.

P0 - Royalties & Collections
- Story: As a Franchisor, I want to approve or reject royalty payments and create collection entries.
  - Acceptance: `RoyaltyResource` has Approve/Reject actions which update models and create `Collection` rows.

P1 - Tasks & Technical Requests
- Story: As an Operator, I want to assign and manage tasks and technical requests.
  - Acceptance: `TaskResource` and `TechnicalRequestResource` allow assignment and status changes; notifications sent on status change.

P1 - Leads & Associates
- Story: As Sales, I want to view leads and assign them to franchisees.
  - Acceptance: `LeadResource` supports assigning to users and status updates.

P2 - Settings & Plans
- Story: As Admin, I want to update global settings and plans.
  - Acceptance: `SettingsPage` edits singleton settings; `PlanResource` manages plan records.

Non-functional requirements
---------------------------
- Use Filament v4 components and Livewire for reactive UI.
- Preserve API endpoints and JWT flows for external systems.
- Performance: pages should load in < 1s for default dataset.
- Security: role-based gates and policies enforced for all actions.

Data model mapping & considerations
-----------------------------------
- Reuse models in `app/Models`. Create Filament Resources that reference these models directly.
- For heavy queries (dashboard, charts), reuse controller query logic from `HomeController` or extract into services.
- Ensure relationships are eager loaded in Filament tables to avoid N+1.

Milestones & timeline
---------------------
Week 0 (planning)
- Finalize PRD and confirm resources to scaffold

Week 1
- Install Filament, publish assets, create `FilamentAdminSeeder`, gate
- Scaffold `UserResource`, `UnitResource`, `PerformanceResource`, `RoyaltyResource`
- Implement `Dashboard` page with monthly revenue widget

Week 2
- Scaffold remaining resources (`Collection`, `Task`, `Lead`, `TechnicalRequest`, `Account`, `Associate`, `Plan`, `Notification`, `Settings`)
- Implement policies and navigation rules

Week 3
- Implement Resource Actions (royalty approval, collections)
- Migrate key blade views into Filament Pages/Widgets
- Testing & bug fixing

Week 4
- Performance tuning, finalize styling, prepare deployment
- Run acceptance tests and deploy to staging

Risks & mitigation
------------------
- Risk: Filament auth conflicts with existing web auth flows.
  - Mitigation: Keep web guard untouched; gate Filament access using `viewFilament` gate.
- Risk: Missing UI parity for complex blade pages.
  - Mitigation: Recreate complex pages as Filament Pages with Widgets that embed original blade HTML if needed.
- Risk: Business logic duplication causing regressions.
  - Mitigation: Call existing controllers/services from resource actions; avoid duplicating calculations.

Acceptance & QA
----------------
- Manual acceptance: run through user flows for each persona.
- Automated: add feature tests for critical flows (login, approve royalty, create user, mark collection paid).

Delivery
--------
- Create branch `feature/filament-v4-migration` and open PR with incremental changes.
- Include the PRD and `IMPLEMENTATION_FILAMENT_V4.md` in the repo.

Appendix: next actions I can take now
------------------------------------
- Scaffold `User`, `Unit`, `Performance`, `Royalty` Filament resources.
- Add `FilamentAdminSeeder` and `viewFilament` gate to `AuthServiceProvider`.
- Create a `Dashboard` Filament Page with a monthly revenue widget.

*** End of PRD
