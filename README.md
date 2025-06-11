# 🎗️ Buraq Foundation Portal

> A Laravel-based portal to manage community support applications with a multi-stage approval workflow.

🚀 Project Overview
Buraq Foundation portal streamlines the intake, review, and approval of financial/community support applications. Three roles (Data Entry Operator, Admin, Super Admin) collaborate in a clear, multi-step workflow:
1. Data Entry Operators submit detailed applications.
2. Admin reviews and approves/rejects.
3. Super Admin gives final sign-off only after Admin approval (cannot override Admin rejection).

Built solo with Laravel & Blade, this project emphasizes security, data integrity, and a responsive UI foundation.
✨ Key Features
- 🎯 **Role-Based Access & Dashboards**  
  - Data Entry Operator: register/login; submit & track own applications.  
  - Admin: view incoming applications; approve or reject, blocking further escalation on rejection.  
  - Super Admin: manage Admin/Data Entry accounts; final approval step only if Admin approved.  
- 📝 **Comprehensive Application Form**  
  - Captures personal info, family demographics, income/expenses, address, CNIC, education, narrative details.  
  - Validation via Form Requests: required fields, numeric ranges, conditional logic (e.g., rent if not owned).  
  - Soft deletes & timestamps for auditability.  
- 🔄 **Multi-Stage Approval Workflow**  
  - Submission → Admin dashboard → (if approved) → Super Admin dashboard → final decision.  
  - Status tracking visible to each role; hooks for email/notification triggers at each step.  
- 👥 **User & Role Management**  
  - CRUD for Admin & Data Entry Operator accounts by Super Admin.  
  - Role constants (`SUPER_ADMIN_ROLE_ID`, `ADMIN_ROLE_ID`, `DATA_ENTRY_ROLE_ID`) in middleware/policies.  
- 🔒 **Security & Validation**  
  - Laravel Auth for login/registration; middleware to guard routes per role.  
  - Form Requests for robust server-side validation; protection against unauthorized access and mass-assignment.  
- 💾 **Database & Data Integrity**  
  - Migrations & seeders for `users`, `application_forms`, roles, and sample data.  
  - Eloquent relationships: User → Applications; Admin/SuperAdmin associations on approvals.  
- 📱 **Responsive UI Foundation**  
  - Blade templating with Bootstrap 5 (or preferred CSS) for clean layouts.  
  - Sidebar navigation, topbar with user context, responsive form layouts.  
- ✉️ **Notifications (Optional Hooks)**  
  - Mailables & queued jobs to notify Admin/Super Admin on new submissions, and applicants on status changes.  
- 🧪 **Testing & Reliability**  
  - PHPUnit tests for critical flows (submission, approval transitions, auth-protected routes).  
- 📖 **Documentation & Setup**  
  - Clear README instructions for environment setup, migrations/seeders, and running queues.
  - Seeded demo accounts for quick testing of each role.

---

🛠️ Tech Stack
- **Backend:** Laravel (8.x or latest), Eloquent ORM, MySQL
- **Frontend (Blade):** Blade templates, Bootstrap 5, minimal JavaScript/Alpine.js for interactivity
- **Authentication & Authorization:** Laravel Auth, Sanctum or built-in guards, Gates/Policies
- **Data Integrity:** Migrations, seeders, Form Requests, soft deletes
- **Notifications:** Laravel Mailables + Queues (Redis/Database/Beanstalkd as configured)
- **Testing:** PHPUnit
- **DevOps & Deployment:** Git (GitLab/GitHub), Composer, environment variables, queue workers, Forge/Envoyer or custom scripts
- **Version Control:** Git with a clear commit history illustrating iterative improvements

---

📥 Getting Started

### Prerequisites
- PHP >= 7.4 (compatible with chosen Laravel version)
- Composer
- MySQL (or preferred database)
- Node & npm (if using frontend asset compilation or Alpine.js setup)
- Mail driver (SMTP, Mailgun, etc.) configured in `.env`
- Queue driver (database/Redis/etc.) configured in `.env`

How to run project:

1. Clone the repo  
    - composer install
    - npm install    # if using frontend asset build or Alpine.js tooling
    - npm run dev    # optional, if assets need compilation
2. Copy .env.example to .env
    - Configure database credentials, mail settings, and queue driver in .env.
    - Generate app key: php artisan key:generate
3. Database migrations & seeders
    - php artisan migrate
    - php artisan db:seed
4. php artisan serve
