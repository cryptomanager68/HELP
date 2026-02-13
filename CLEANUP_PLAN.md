# Code Cleanup Plan

## Files to Remove (Unused/Duplicate)

### 1. Unused Views
- ❌ `resources/views/home.blade.php` - NOT USED (welcome.blade.php is used instead)
- ❌ `resources/views/dashboard.blade.php` - NOT USED (member-dashboard.blade.php is used)
- ❌ `resources/views/navigation-menu.blade.php` - Jetstream default, not used in custom views

### 2. Debug/Development Files
- ❌ `routes/debug.php` - Debug route, should be removed in production
- ❌ Remove debug route require from `routes/web.php`

### 3. Unused Routes to Remove
- Email verification routes (we simplified the flow)
- `subscription/verify-email` route
- `subscription/send-verification` route  
- `email/verify/{id}/{hash}` route
- `subscription/complete` route
- `subscription/resend-password` route

### 4. Unused Controller Methods
In `SubscriptionController.php`:
- `showVerifyEmail()` - Email verification removed
- `sendVerificationEmail()` - Email verification removed
- `verifyEmail()` - Email verification removed
- `successComplete()` - Not used
- `resendPasswordGuest()` - Not used

### 5. Code to Clean

#### routes/web.php
- Remove email verification routes
- Remove debug route require
- Simplify dashboard route logic (remove test mode checks)

#### SubscriptionController.php
- Remove unused methods
- Clean up duplicate error handling
- Remove test mode logic from success()

## Files to Keep

✅ `resources/views/welcome.blade.php` - Main landing page
✅ `resources/views/member-dashboard.blade.php` - Member dashboard
✅ `resources/views/subscription/checkout.blade.php` - Payment page
✅ `resources/views/subscription/lvr-form.blade.php` - LVR submission
✅ `resources/views/subscription/required.blade.php` - Subscription required page
✅ `resources/views/subscription/success.blade.php` - Success page

## Cleanup Actions

1. Delete unused view files
2. Remove debug routes
3. Remove email verification routes
4. Remove unused controller methods
5. Clean up route logic
6. Remove test mode code
7. Verify no syntax errors
