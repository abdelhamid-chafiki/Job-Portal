# Backend Setup & Connection Guide

## Backend Server Information

**Port**: 8000 (default Laravel)
**Start Command**: `php artisan serve`

## How to Connect React Frontend to Backend

### Step 1: Start the Backend Server

```bash
cd Back-end
php artisan serve
```

The backend will run on: `http://localhost:8000`

### Step 2: Start React Frontend

In a new terminal:
```bash
cd React
npm start
```

React will run on: `http://localhost:3000`

## Backend Fixes Applied

### 1. ✅ CORS Configuration
- File: `app/Http/Middleware/Cors.php`
- Allows requests from `http://localhost:3000`
- Supports credentials for token authentication
- Enabled PATCH, OPTIONS methods

### 2. ✅ Bootstrap Middleware Setup
- File: `bootstrap/app.php`
- Fixed middleware callback configuration

### 3. ✅ Enhanced API Endpoints

**Public Endpoints:**
```
GET  /api/jobs                    - Get all jobs with user & category info
GET  /api/jobs/{id}               - Get job details
GET  /api/jobs/locations          - Get all job locations
GET  /api/jobs/levels             - Get experience levels
GET  /api/categories              - Get all categories
POST /api/auth/register           - Register as applicant
POST /api/auth/login              - Login as applicant
POST /api/auth/register-recruiter - Register as recruiter
POST /api/auth/login-recruiter    - Login as recruiter
```

**Protected Endpoints (require token):**
```
POST   /api/jobs                        - Create job (recruiter only)
PUT    /api/jobs/{id}                   - Update job (owner only)
DELETE /api/jobs/{id}                   - Delete job (owner only)
POST   /api/jobs/{id}/apply             - Apply for job (applicant only)
GET    /api/jobs/{id}/applicants        - Get job applicants (recruiter only)
GET    /api/users/{userId}/applications - Get user applications
```

### 4. ✅ Enhanced Response Structure

**Jobs now include:**
- User info (id, name)
- Category info (id, name, icon)

**Applications now include:**
- User details
- Job details

## Frontend Integration

The React frontend expects:
- Backend API at: `http://localhost:8000/api`
- CORS enabled for `http://localhost:3000`
- Token-based authentication (Bearer tokens)

## Database

- Using SQLite by default (no additional setup needed)
- Database file: `database/database.sqlite`

## API Testing

You can test endpoints using tools like:
- Postman
- Thunder Client
- VS Code REST Client

Example request:
```
GET http://localhost:8000/api/jobs
```

## Troubleshooting

| Issue | Solution |
|-------|----------|
| Port 8000 already in use | Change port: `php artisan serve --port=8001` |
| CORS errors | Ensure backend runs on 8000, React on 3000 |
| 401 Unauthorized | Check if token is in Authorization header |
| Database errors | Run migrations: `php artisan migrate` |

## Key Files Modified

- `routes/api.php` - Added new endpoints
- `app/Http/Controllers/Api/JobController.php` - Enhanced job endpoints
- `app/Http/Controllers/Api/ApplicationController.php` - Enhanced application endpoints
- `bootstrap/app.php` - Fixed middleware configuration
- `app/Http/Middleware/Cors.php` - Improved CORS headers
- `config/cors.php` - Already has credentials enabled
