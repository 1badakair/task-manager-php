# Task Manager PHP
Simple Task Manager application built with PHP (MVC framework), MySQL (PDO prepared statements), and Tailwind CSS. Users can register, login, create, manage, filter, and organize their daily tasks.

# Features
1. Authentication System
- Register
- Login
- Logout
- Session-based access control
2. Task Management
- Create
- Read
- Update
- Delete
- View all tasks
3. Task Properties
- Title
- Status (Pending, In Progress, Completed)
- Priority (Low, Medium, High)
- Due Date
4. Filtering and Sorting
- Filter by status
- Filter by priority
- Sort by due date
- Combine multiple filters
5. Secure
- Password hashing
- Input validation
- Prepared statements to prevent SQL injection
- User-based task isolation

# Structure
```sql
task-manager-php/
├── app/
│   ├── config/
│   │   └── database.php
│   ├── controllers/
│   │   ├── AuthController.php
│   │   └── TaskController.php
│   ├── middleware/
│   │   └── AuthMiddleware.php
│   └── models/
│       ├── Task.php
│       └── User.php
├── database/
│   └── schema.sql
├── views/
│   ├── auth/
│   │   ├── login.php
│   │   └── register.php
│   ├── includes/
│   │   └── header.php
│   └── tasks/
│       ├── create.php
│       ├── dashboard.php
│       ├── delete.php
│       └── edit.php
├── index.php
└── README.md
```