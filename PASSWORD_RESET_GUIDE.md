# Password Reset Guide for Paid Members

## Overview
After completing the LVR submission, paid members receive a welcome email with a password reset link to set their password.

## How It Works

### 1. After LVR Submission
When a user completes the LVR form:
- System generates a secure password reset token
- Welcome email is sent with a prominent "Set Your Password Now" button
- Token is valid for 60 minutes

### 2. Welcome Email Contents
The email includes:
- **Big Red Button**: "🔑 Set Your Password Now" - Primary call-to-action
- **Password Reset Link**: Full URL displayed in case button doesn't work
- **Login Email**: User's registered email address
- **Next Steps**: Clear instructions on what to do

### 3. Setting Password
Users can set their password in 3 ways:

#### Option A: From Welcome Email (Recommended)
1. Open the welcome email
2. Click the red "Set Your Password Now" button
3. Enter new password (twice for confirmation)
4. Submit and login

#### Option B: From Success Page
1. On the subscription success page
2. Click "Resend Password Reset Email" button
3. Check email and follow Option A

#### Option C: From Login Page
1. Go to login page: `/login`
2. Click "Forgot password?" link
3. Enter email address
4. Check email for reset link
5. Click link and set password

## Technical Implementation

### Files Modified
1. **SubscriptionController.php**
   - `submitLvr()` method generates password reset token
   - Creates full reset URL with token and email
   - Sends welcome email with reset link

2. **welcome.blade.php**
   - Displays prominent password reset button
   - Shows full reset URL as fallback
   - Clear instructions for users

3. **success.blade.php**
   - Shows "Check Your Email" message
   - Provides "Resend Password Reset Email" button
   - Clear step-by-step instructions

4. **login.blade.php**
   - Already has "Forgot password?" link
   - Links to Fortify's password reset flow

### Routes
Password reset routes are handled automatically by Laravel Fortify:
- `GET /forgot-password` - Show forgot password form
- `POST /forgot-password` - Send reset link email
- `GET /reset-password/{token}` - Show reset password form
- `POST /reset-password` - Process password reset

### Configuration
- Fortify feature enabled: `Features::resetPasswords()`
- Token expiry: 60 minutes (Laravel default)
- Email sent via Laravel Mail system

## User Flow

```
Payment Success
    ↓
LVR Form Submission
    ↓
Generate Password Reset Token
    ↓
Send Welcome Email with Reset Link
    ↓
User Clicks "Set Your Password Now"
    ↓
User Creates Password
    ↓
Redirect to Login
    ↓
User Logs In
    ↓
Access Dashboard
```

## Troubleshooting

### User Didn't Receive Email
1. Check spam/junk folder
2. Use "Resend Password Reset Email" button on success page
3. Use "Forgot password?" link on login page

### Reset Link Expired
- Links expire after 60 minutes
- User can request new link via "Forgot password?" on login page

### Email Not Sending
- Check mail configuration in `.env`
- Check Laravel logs: `storage/logs/laravel.log`
- Verify SMTP settings are correct

## Testing

### Test Password Reset Flow
1. Complete subscription and LVR form
2. Check email inbox for welcome email
3. Verify reset button is visible and prominent
4. Click button and verify redirect to reset form
5. Set password and verify login works

### Test Resend Functionality
1. On success page, click "Resend Password Reset Email"
2. Verify new email is received
3. Verify new link works

### Test Forgot Password
1. Go to login page
2. Click "Forgot password?"
3. Enter email
4. Verify reset email is received
5. Complete password reset

## Security Features
- Tokens are cryptographically secure
- Tokens expire after 60 minutes
- Tokens are single-use only
- Password must meet minimum requirements
- HTTPS enforced for reset links

## Email Template Highlights
- **Subject**: "Welcome to HELP - Set Your Password"
- **Primary CTA**: Large red button with 🔑 icon
- **Fallback**: Full URL displayed for copy/paste
- **Expiry Warning**: "This link will expire in 60 minutes"
- **Support Info**: Contact details if issues arise

## Future Improvements
- [ ] Add password strength indicator
- [ ] Send reminder email if password not set after 24 hours
- [ ] Add SMS option for password reset
- [ ] Implement magic link login (passwordless)
